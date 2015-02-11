<?php

return array(
	'cart'=>'orders/cart/index',
	'cart/add'=>'orders/cart/add',
	'cart/remove/<index>'=>'orders/cart/remove',
	'cart/CountDown/<index>'=>'orders/cart/CountDown',
	'cart/CountUp/<index>'=>'orders/cart/CountUp',
	'cart/clear'=>'orders/cart/clear',
	'cart/renderSmallCart'=>'orders/cart/renderSmallCart',
	'cart/renderBottomCart'=>'orders/cart/renderBottomCart',
	'cart/view/<secret_key>'=>'orders/cart/view',
	'processPayment/*'=>'orders/payment/process',
	'orders/cart'=>'site/error',
);