<?php

/**
 * Small cart.
 * This template is loaded thru ajax request after new product added to cart.
 */
?>

<p>Корзина</p>
<span class="badge"><?php echo Yii::app()->cart->countItems() ?></span>
<i><?php echo StoreProduct::formatPrice(Yii::app()->currency->convert(Yii::app()->cart->getTotalPrice())) ?></i>
<a class="btn btn-transparent" href="/cart">оформить</a>