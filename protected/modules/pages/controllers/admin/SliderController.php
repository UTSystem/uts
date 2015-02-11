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

	public function actionCreate(){
        $model = new Slider();

        if (Yii::app()->request->isPostRequest)
		{
			$model->attributes = $_POST['Slider'];

			 $model->attachBehavior('UploadableFileBehavior', array(
                'class'=>'application.modules.pages.behaviors.UploadableFileBehavior',
            ));
			
			if ($model->isNewRecord)
				$model->created = date('Y-m-d H:i:s');
			$model->updated = date('Y-m-d H:i:s');
            
			if ($model->save(false))
			{
				$this->setFlashMessage(Yii::t('PagesModule.core', 'Изменения успешно сохранены'));

				if (isset($_POST['REDIRECT']))
					$this->smartRedirect($model);
				else
					$this->redirect(array('index'));
			}
			else {$this->setFlashMessage(Yii::t('PagesModule.core', $model->getErrors()));}
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

	public function actionUpdate($id) {
        $model = $this->loadModel($id);

        if (Yii::app()->request->isPostRequest)
		{
			$model->attributes = $_POST['Slider'];

			 $model->attachBehavior('UploadableFileBehavior', array(
                'class'=>'application.modules.pages.behaviors.UploadableFileBehavior',
            ));
			
			if ($model->isNewRecord)
				$model->created = date('Y-m-d H:i:s');
			$model->updated = date('Y-m-d H:i:s');
            
			if ($model->save(false))
			{
				$this->setFlashMessage(Yii::t('PagesModule.core', 'Изменения успешно сохранены'));

				if (isset($_POST['REDIRECT']))
					$this->smartRedirect($model);
				else
					$this->redirect(array('index'));
			}
			else {$this->setFlashMessage(Yii::t('PagesModule.core', $model->getErrors()));}
        }

        $this->render('update', array(
            'model' => $model,
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
				$model->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect('index');
		}
	}
	
	/**
	 * Delete page by Pk
	 */
	public function actionDeleteImage()
	{
		if (Yii::app()->request->isPostRequest)
		{
			$model = Slider::model()->findByPk((int)$_REQUEST['id']);
			$image = $model->new_name;
			
			if ($image!='' && file_exists(Yii::getPathOfAlias('webroot.uploads.slider') . DIRECTORY_SEPARATOR . $image))
			{
				if(unlink(Yii::getPathOfAlias('webroot.uploads.slider') . DIRECTORY_SEPARATOR . $image))
				{
					Yii::app()->db->createCommand("UPDATE slider set old_name='', new_name='' where id='".$model->id."'")->execute();
				}
			}
		}
	}
	
	public function loadModel($id) {
        $model = Slider::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
}