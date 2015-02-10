<?php
Yii::import('application.modules.store.components.StoreUploadedImage');
class SliderController extends SAdminController {

	/**
	 * Display pages list.
	 */
	public function actionIndex()
	{
		$model = new Slider('search');

		if (!empty($_GET['Slider']))
			$model->attributes = $_GET['Slider'];

		$dataProvider = $model->search();
		$dataProvider->pagination->pageSize = Yii::app()->settings->get('core', 'productsPerPageAdmin');

		$this->render('index', array(
			'model'=>$model,
			'dataProvider'=>$dataProvider
		));
	}

	public function actionCreate()
	{
		$this->actionUpdate(true);
	}

	/**
	 * Create or update new banner
	 * @param boolean $new
	 */
	public function actionUpdate($new = false)
	{
		if ($new === true)
		{
			$model = new Slider;
			$model->publish_date = date('Y-m-d H:i:s');
		}
		else
		{
			$model = Slider::model()
				->findByPk($_GET['id']);
		}

		if (!$model)
			throw new CHttpException(404, Yii::t('PagesModule.core', 'Страница не найдена.'));

		$form = new CForm('application.modules.pages.views.admin.slider.sliderForm', $model);
		
		if (Yii::app()->request->isPostRequest)
		{
			$model->attributes = $_POST['Slider'];

			if ($model->isNewRecord)
				$model->created = date('Y-m-d H:i:s');
			$model->updated = date('Y-m-d H:i:s');

			//$images = CUploadedFile::getInstancesByName('Slider');
			
			$model->image=CUploadedFile::getInstance($model,'image');
			
			if ($model->image){
				$sourcePath = pathinfo($model->image->getName());	
				$fileName = $model->id.'-slider.'.$sourcePath['extension'];
				//$model->image = $fileName;
			}	

			if ($model->validate())
			{
				$model->save();

				if ($model->image){				
					//сохранить файл на сервере в каталог images/2011 под именем 
					//month-day-alias.jpg
					$file = Yii::getPathOfAlias('webroot.uploads').'/slider/'.$fileName;
					$model->image->saveAs($file);
				}
				
				$this->setFlashMessage(Yii::t('PagesModule.core', 'Изменения успешно сохранены'));

				if (isset($_POST['REDIRECT']))
					$this->smartRedirect($model);
				else
					$this->redirect(array('index'));
			}
		}

		$this->render('update', array(
			'model'=>$model,
			'form'=>$form,
		));
	}

	/**
	 * Delete page by Pk
	 */
	public function actionDelete()
	{
		if (Yii::app()->request->isPostRequest)
		{
			$model = Slider::model()->findAllByPk($_REQUEST['id']);

			if (!empty($model))
			{
				foreach($model as $page)
					$page->delete();
			}

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect('index');
		}
	}
	
	/**
	 * @param Slider $model
	 */
	public function handleUploadedImages(Slider $model)
	{
		$images = CUploadedFile::getInstancesByName('SliderImage');

		if($images && sizeof($images) > 0)
		{
			/** var $image CUploadedFile */
			foreach($images as $image)
			{
				if(!StoreUploadedImage::hasErrors($image))
					$model->addImage($image);
				else
					$this->setFlashMessage(Yii::t('StoreModule.admin', 'Ошибка загрузки изображения {name}', array('{name}'=>$image->getName())));
			}
		}
	}
}