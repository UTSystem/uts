<?php
Yii::import('application.modules.pages.models.Slider');
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
class SSlider extends CWidget
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
		$slider = Slider::model()->findAll();
		
		echo '<div class="banner">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">';
		
		echo CHtml::openTag('ol', array('class'=>'carousel-indicators'));
		foreach($slider as $key=>$row)
		{
			echo CHtml::openTag('li', array('data-target'=>'#carousel-example-generic', 'data-slide-to'=>$key));
			echo CHtml::closeTag('li');
		}
		echo CHtml::closeTag('ol');
		
		
		echo '<div class="carousel-inner" role="listbox">';
		foreach($slider as $key=>$row)
		{
			echo '<div class="item'.($key==0?' active':'').'">
				<a href="'.$row->url.'"><img src="'.Yii::app()->baseUrl.'/uploads/slider/'.$row->new_name.'" alt="..."></a>
				<div class="carousel-caption">
					'.$row->caption.'
				</div>
			</div>';
		}
		echo '</div>';
		
		echo '</div></div">';
	}

}
