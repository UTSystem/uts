<?php
/**
 * This is the model class for table "Slider".
 *
 * The followings are the available columns in table 'Pages':
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $url
 * @property string $short_description
 * @property string $full_description
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $created
 * @property string $updated
 * @property string $publish_date
 * @property string $status
 * @property string $layout
 * @property string $view
 * @property PageTranslate $translate
 *
 * TODO: Set DB indexes
 */
class Slider extends BaseModel
{

	public $_statusLabel;

	/**
	 * Status to allow display page on the front.
	 */
	public $publishStatus = 'published';

	/**
	 * Multilingual attrs
	 */
	public $old_name;

	/**
	 * Returns the static model of the specified AR class.
	 * @return Page the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Slider';
	}

	public function defaultScope()
	{
		return array(
			'order'=>'publish_date DESC',
		);
	}

	public function scopes()
	{
		return array(
		);
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('caption', 'type', 'type'=>'string'),
			array('url', 'required'),
			array('url', 'LocalUrlValidator'),
			array('url', 'length', 'max'=>255),
			array('old_name, new_name', 'safe'),
			// The following rule is used by search().
			array('id, user_id, title, url, caption, created, updated, publish_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			
		);
	}

	/**
	 * @return array
	 */
	public function behaviors()
	{
		return array(
            // наше поведение для работы с файлом
            'uploadableFile'=>array(
                'class'=>'application.modules.pages.behaviors.UploadableFileBehavior',
				'attributeName' => 'old_name',
				'savePathAlias' => 'webroot.uploads.slider',
				'fileTypes' => 'jpg, jpeg, png, gif, csv, doc, docx, xls, xlsx, odt, pdf',
				'maxSize' => 80240000, // 80 мб
				'upload_model' => 'Slider' // модель откуда приходит форма
            )
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => Yii::t('PagesModule.core', 'Автор'),
			'title' => Yii::t('PagesModule.core', 'Наименование'),
			'url' => Yii::t('PagesModule.core', 'URL'),
			'caption' => Yii::t('PagesModule.core', 'Текст на картинке'),
			'created' => Yii::t('PagesModule.core', 'Дата создания'),
			'updated' => Yii::t('PagesModule.core', 'Дата обновления'),
			'publish_date' => Yii::t('PagesModule.core', 'Дата публикации'),
			'status' => Yii::t('PagesModule.core', 'Статус'),
			'layout' => Yii::t('PagesModule.core', 'Макет'),
			'view' => Yii::t('PagesModule.core', 'Шаблон'),
			'image' => Yii::t('PagesModule.core', 'Изображение'),
		);
	}

	/**
	 * @return array
	 */
	public static function statuses()
	{
		return array(
			'published'=>Yii::t('PagesModule.core', 'Опубликован'),
			'waiting'=>Yii::t('PagesModule.core', 'Ждет одобрения'),
			'draft'=>Yii::t('PagesModule.core', 'Черновик'),
			'archive'=>Yii::t('PagesModule.core', 'Архив'),
		);
	}

	/**
	 * @return mixed
	 */
	public function getStatusLabel()
	{
		$statuses = $this->statuses();
		return $statuses[$this->status];
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions. Used in admin search.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.url',$this->url,true);
		$criteria->compare('t.created',$this->created,true);
		$criteria->compare('t.updated',$this->updated,true);
		$criteria->compare('t.publish_date',$this->publish_date,true);
		$criteria->compare('t.status',$this->status);

		// Create sorting by translation title
		$sort=new CSort;
		$sort->attributes=array(
			'*',
		);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination'=>array(
				'pageSize'=>20,
			)
		));
	}
}
