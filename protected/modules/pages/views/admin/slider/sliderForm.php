<?php

/*** Create/update page form ***/

return array(
	'id'=>'sliderUpdateForm',
	'showErrorSummary'=>true,
	'enctype'=>'multipart/form-data',
	'elements'=>array(
		'content'=>array(
			'type'=>'form',
			'title'=>Yii::t('pagesModule.core', 'Содержимое'),
			'elements'=>array(
				'title'=>array(
					'type'=>'text',
				),
				'url'=>array(
					'type'=>'text',
				),
				'caption'=>array(
					'type'=>'SRichTextarea',
				),
				'image'=>array(
					'type'=>'file',
				),
			),
		),
	),
);

