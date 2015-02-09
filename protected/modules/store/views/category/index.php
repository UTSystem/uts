<?php

/**
 * Site start view
  $this->widget('application.modules.store.widgets.SAttributesTableRenderer', array(
 *        // SProduct model
 *        'model'=>$model,
 *         // Optional. Html table attributes.
 *        'htmlOptions'=>array('class'=>'...', 'id'=>'...', etc...)
 *    ));
 */
 
?>

<div class="category">
<?php

// Create jstree to filter products
$this->widget('application.modules.store.widgets.SCategoryRender', array(
	'id'=>'SCategoryRender',
	'data'=>StoreCategoryNode::fromArray(StoreCategory::model()->findAllByPk(1), array('displayCount'=>false)),
));
?>
</div>