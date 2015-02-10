<?php

// Display product custom options table.
if($model->getEavAttributes())
{
	$this->widget('application.modules.store.widgets.SAttributesTableRenderer', array(
		'model'=>$model,
		'count'=>$count,
		'htmlOptions'=>array(
			'class'=>'attributes'
		),
	));
}
