<?php

/**
 * Render product attributes table.
 * Basically used on product view page.
 * Usage:
 *     $this->widget('application.modules.store.widgets.SAttributesTableRenderer', array(
 *        // SProduct model
 *        'model'=>$model,
 *         // Optional. Html table attributes.
 *        'htmlOptions'=>array('class'=>'...', 'id'=>'...', etc...)
 *    ));
 */
class SCategoryRender extends CWidget
{

	/**
	 * @var BaseModel with EAV behavior enabled
	 */
	public $model;

	/**
	 * @var BaseModel with EAV behavior enabled
	 */
	public $data;
	
	/**
	 * @var array table element attributes
	 */
	public $htmlOptions = array();

	/**
	 * @var array model attributes loaded with getEavAttributes method
	 */
	protected $_attributes;

	/**
	 * @var array of StoreAttribute models
	 */
	protected $_models;

	/**
	 * Render attributes table
	 */
	public function run()
	{
		//echo CHtml::openTag('ul');
		$this->createHtmlTree($this->data);
		//echo CHtml::closeTag('ul');
	}

	/**
	 * Create ul html tree from data array
	 * @param string $data
	 */
	private function createHtmlTree($data, $child=0)
	{
		foreach($data as $key=>$node)
		{
			
			if($node->id>1)
			{

				if(!$child) echo '<div class="col-md-6"><div class="media">';
				if($child) echo CHtml::link(CHtml::encode($node->name), array(Yii::app()->createUrl($node->privateGet('full_path'))));
				if(!$child) echo CHtml::link('<img alt="..." src="'.Yii::app()->theme->baseUrl.'/assets/images/category-item.jpg">', array(), array('class'=>'media-left'));
				
				if ($node['hasChildren'] === true)
				{
					echo '<div class="media-body">';
					if(!$child) echo '<h4 class="media-heading">'.CHtml::link(CHtml::encode($node->name), array(Yii::app()->createUrl($node->privateGet('full_path')))).'</h4>';
					$this->createHtmlTree($node['children'],1);
					echo '</div>';
					
				}
				else
				{
					echo '<div class="media-body">';
					if(!$child) echo '<h4 class="media-heading">'.CHtml::link(CHtml::encode($node->name), array(Yii::app()->createUrl($node->privateGet('full_path')))).'</h4>';
					echo '</div>';
				}
				if(!$child)	echo '</div></div>';
			}
			else $this->createHtmlTree($node['children']);
			
		}
	}
}
