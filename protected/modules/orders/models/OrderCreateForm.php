<?php

Yii::import('store.models.StoreDeliveryMethod');

/**
 * Used in cart to create new order.
 */
class OrderCreateForm extends CFormModel
{
	public $name;
	public $email;
	public $phone;
	//public $address;
	public $comment;
	public $delivery_id;
	public $user_city;
	public $user_index;
	public $user_street;
	public $user_house;
	public $user_appartaments;
	public $user_corp;
	public $user_stro;
	public $user_floor;
	public $user_delivery_comment;
	public $delivery_date;
	public $delivery_time;

	public function init()
	{
		if(!Yii::app()->user->isGuest)
		{
			$profile=Yii::app()->user->getModel()->profile;
			$this->name=$profile->full_name;
			$this->phone=$profile->phone;
			//$this->address=$profile->delivery_address;
			$this->email=Yii::app()->user->email;
		}
	}

	/**
	 * Validation
	 * @return array
	 */
	public function rules()
	{
		return array(
			array('name, email', 'required'),
			array('email', 'email'),
			array('comment', 'length', 'max'=>'500'),
			//array('address', 'length', 'max'=>'255'),
			array('email', 'length', 'max'=>'100'),
			array('phone', 'length', 'max'=>'30'),
			array('user_city', 'length', 'max'=>'255'),
			array('user_city, user_index, user_street, user_house, user_appartaments, user_corp, user_stro, user_floor, user_delivery_comment, delivery_date, delivery_time', 'safe'),
			array('delivery_id', 'validateDelivery'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'name'        => Yii::t('OrdersModule.core', 'Имя'),
			'email'       => Yii::t('OrdersModule.core', 'Email'),
			'comment'     => Yii::t('OrdersModule.core', 'Комментарий'),
			//'address'     => Yii::t('OrdersModule.core', 'Адрес доставки'),
			'phone'       => Yii::t('OrdersModule.core', 'Номер телефона'),
			'delivery_id' => Yii::t('OrdersModule.core', 'Способ доставки'),
			'user_city' => Yii::t('OrdersModule.core', 'Город'),
		);
	}

	/**
	 * Check if delivery method exists
	 */
	public function validateDelivery()
	{
		if(StoreDeliveryMethod::model()->countByAttributes(array('id'=>$this->delivery_id)) == 0)
			$this->addError('delivery_id', Yii::t('OrdersModule.core', 'Необходимо выбрать способ доставки.'));
	}
}
