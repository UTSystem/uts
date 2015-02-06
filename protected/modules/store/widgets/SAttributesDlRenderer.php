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
class SAttributesDlRenderer extends CWidget
{

	/**
	 * @var BaseModel with EAV behavior enabled
	 */
	public $model;

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
		$this->_attributes = $this->model->getEavAttributes();

		$data = array();
		foreach($this->getModels() as $model)
			$data[$model->title] = $model->renderValue($this->_attributes[$model->name]);

		if(!empty($data))
		{
			echo CHtml::openTag('dl');
			foreach($data as $title=>$value)
			{
				//echo CHtml::openTag('dt');
				echo '<dt>'.CHtml::encode($title).'</dt>';
				echo '<dd>'.CHtml::encode($value).'</dd>';
				//echo CHtml::closeTag('dt');
			}
			echo CHtml::closeTag('dl');
		}
	}
	
	/**
	 * @return array of used attribute models
	 */
	public function getModels()
	{
		if(is_array($this->_models))
			return $this->_models;

		$this->_models = array();
		$cr = new CDbCriteria;
		$cr->addInCondition('StoreAttribute.name', array_keys($this->_attributes));
		$query = StoreAttribute::model()
			->displayOnFront()
			->findAll($cr);

		foreach($query as $m)
			$this->_models[$m->name] = $m;

		return $this->_models;
	}
}
