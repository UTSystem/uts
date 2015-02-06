<?php

// Display product custom options table.
if($model->getEavAttributes())
{
	$this->widget('application.modules.store.widgets.SAttributesDlRenderer', array(
		'model'=>$model,
		'htmlOptions'=>array(
			'class'=>'attributes'
		),
	));
}
