<?php

/**
 * Display cart
 * @var Controller $this
 * @var SCart $cart
 * @var $totalPrice integer
 */

Yii::app()->clientScript->registerScriptFile($this->module->assetsUrl.'/cart.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScript('cartScript', "var orderTotalPrice = '$totalPrice';", CClientScript::POS_HEAD);

$this->pageTitle = Yii::t('OrdersModule.core', 'Оформление заказа');

if(empty($items))
{
	echo CHtml::openTag('h2');
	echo Yii::t('OrdersModule.core', 'Корзина пуста');
	echo CHtml::closeTag('h2');
	return;
}
?>

<?php echo CHtml::form() ?>
<table width="100%">
	<tr>
		<th>Товар</th>
		<th>&nbsp;</th>
		<th class="th-number" width="110px">Количество</th>
		<th class="th-price">Цена</th>
		<th class="th-total">Стоимость</th>
	</tr>
	<?php foreach($items as $index=>$product): ?>
		<tr>
			<td width="110px" align="center">
				<?php
					// Display image
					if($product['model']->mainImage)
						$imgSource = $product['model']->mainImage->getUrl('149x96');
					else
						$imgSource = 'http://placehold.it/149x96';
					echo CHtml::image($imgSource, '', array('class'=>''));
				?>
			</td>
			<td class="description">
				<?php echo CHtml::link(CHtml::encode($product['model']->name), array('/store/frontProduct/view', 'url'=>$product['model']->url)); ?>
				<span>Артикул: АА 2703823</span>
				<ul>
					<li>Размер: евро <a href="#">изменить</a></li>
					<li>Ткань: сатин</li>
					<li>Цвет: синий <a href="#">изменить</a></li>
				</ul>
				
				<?php 
					if($product['model']->availability==1) echo '<p class="success">'.StoreProduct::getAvailabilityItems()[$product['model']->availability].'</p>';
					else echo '<p class="failure">'.StoreProduct::getAvailabilityItems()[$product['model']->availability].'</p>';
				?>
			</td>
			<td valign="top">
				<input id="quantities_<?php echo $index;?>" name="quantities[<?php echo $index;?>]" type="number" min="1" class="number numb-value" value="<?php echo $product['quantity'];?>"/>
			</td>
			<td class="price" valign="top">
				<?php
					$price = StoreProduct::calculatePrices($product['model'], $product['variant_models'], $product['configurable_id']);
					echo StoreProduct::formatPrice(Yii::app()->currency->convert($price));
				?>
			</td>
			<td class="total-price" valign="top">
				<div class="price">
					<span>
						<?php
							echo CHtml::openTag('span', array('class'=>'price'));
							echo StoreProduct::formatPrice(Yii::app()->currency->convert($price * $product['quantity']));
							echo ' '.Yii::app()->currency->active->symbol;
							echo CHtml::closeTag('span');
						?>
					</span>
					<?php echo CHtml::link('<i>Удалить</i>', array('/orders/cart/remove', 'index'=>$index), array('class'=>'price-extend delete')) ?>
				</div>
			</td>
		</tr>
	<?php endforeach ?>
		<tr class="cart-controls">
			<td colspan="2"></td>
			<td colspan="3">
				<p class="Total"><strong>Итого:</strong>&nbsp;<?php echo StoreProduct::formatPrice($totalPrice) ?></p>

				<p><strong>Стоимость заказа, без учета доставки:</strong>&nbsp;<?php echo StoreProduct::formatPrice($totalPrice) ?></p>
				<button class="btn btn-info" type="submit" name="create" value="1">Оформить заказ</button>
			</td>
		</tr>
	</table>	
<?php echo CHtml::endForm() ?>	