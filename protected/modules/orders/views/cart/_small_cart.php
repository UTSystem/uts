<?php

/**
 * Small cart.
 * This template is loaded thru ajax request after new product added to cart.
 */
?>
<div class="left">
	<span class="badge active"><?php echo Yii::app()->cart->countItems() ?></span>
</div>
<div class="right">
	<span><?php echo StoreProduct::formatPrice(Yii::app()->currency->convert(Yii::app()->cart->getTotalPrice())) ?></span>
	<a class="btn btn-transparent" href="/cart">оформить</a>
</div>