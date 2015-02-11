<?php
/**
 * Images tabs
 */
Yii::import('ext.jqPrettyPhoto');
Yii::import('application.modules.store.components.StoreImagesConfig');

// Register view styles
Yii::app()->getClientScript()->registerCss('infoStyles', "
	table.imagesList {
		float: left;
		width: 45%;
		min-width:250px;
		margin-right: 15px;
		margin-bottom: 15px;
	}
	div.MultiFile-list {
		margin-left:190px
	}
");
/*
// Upload button
echo CHtml::openTag('div', array('class'=>'row'));
echo CHtml::label(Yii::t('PagesModule.core', 'Выберите изображения'), 'files');
	$this->widget('system.web.widgets.CMultiFileUpload', array(
		'name'=>'old_name',
		'model'=>$model,
		'attribute'=>'files',
		'accept'=>implode('|', StoreImagesConfig::get('extensions')),
	));
echo CHtml::closeTag('div');*/

// Images

if($model->new_name)
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'id'=>'ProductImage'.$model->id,
	'htmlOptions'=>array(
		'class'=>'detail-view imagesList',
	),
	'attributes'=>array(
		array(
			'label'=>Yii::t('PagesModule.core', 'Изображение'),
			'type'=>'raw',
			'value'=>CHtml::link(
				CHtml::image('/uploads/slider/'.$model->new_name, CHtml::encode($model->old_name), array('height'=>'150px',)),
				'/uploads/slider/'.$model->new_name,
				array('target'=>'_blank', 'class'=>'pretty', 'title'=>CHtml::encode($model->old_name))
			),
		),
		'id',
		'date_uploaded',
		array(
			'label'=>Yii::t('PagesModule.core', 'Действия'),
			'type'=>'raw',
			'value'=>CHtml::ajaxLink(Yii::t('PagesModule.core', 'Удалить'), $this->createUrl('deleteImage', array('id'=>$model->id)),
				array(
					'type'=>'POST',
					'data'=>array(Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken),
					'success'=>"js:$('#ProductImage$model->id').hide().remove()",
				),
				array(
					'id'=>'DeleteImageLink'.$model->id,
					'confirm'=>Yii::t('PagesModule.core', 'Вы действительно хотите удалить это изображение?'),
				)
			),
		),
	),
));

// Fancybox ext
$this->widget('application.extensions.fancybox.EFancyBox', array(
	'target'=>'a.pretty',
	'config'=>array(),
));