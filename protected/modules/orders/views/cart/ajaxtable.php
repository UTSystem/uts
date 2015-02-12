<?php

if(empty($items))
{
	echo CHtml::openTag('h2');
	echo Yii::t('OrdersModule.core', 'Корзина пуста');
	echo CHtml::closeTag('h2');
	return;
}
?>

<table width="100%" id='cart_table'>
	<tr>
		<th>Товар</th>
		<th>&nbsp;</th>
		<th class="th-number" width="110px">Количество</th>
		<th class="th-price">Цена</th>
		<th class="th-total">Стоимость</th>
	</tr>
	<?php foreach($items as $index=>$product): ?>
		<tr id='cart_<?php echo $index;?>'>
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
				<!--<span>Артикул: АА 2703823</span>-->
				<?php 
					$attributes = $product['model']->getEavAttributes();
					if(!empty($attributes))
						$attributes_html = $this->renderPartial('../../../store/views/frontProduct/_attributesdl', array('model'=>$product['model']), true);
					echo $attributes_html;
				?>
				
				<?php 
					$getAvailabilityItems=StoreProduct::getAvailabilityItems();

					if($product['model']->availability==1) echo '<p class="success">'.$getAvailabilityItems[$product['model']->availability].'</p>';
					else echo '<p class="failure">'.$getAvailabilityItems[$product['model']->availability].'</p>';
				?>
			</td>
			<td valign="top">
				<span class="number-wrap">
					<span class="arr-down">
						<?php
							echo CHtml::Ajaxlink('-', array('/cart/CountDown/'.$index), array('class'=>'price-extend delete',
								'data' => array('recount' => '1' ), // посылаем значения
								'success' => "function(data)
								{
									$('#cart_table').html(data);
								}",
							), array('id'=>'down_'.$index)); 
						?>
					</span>
					<span class="numb-value"><?php echo $product['quantity'];?></span>
					<input id="quantities_<?php echo $index;?>" name="quantities[<?php echo $index;?>]" type="number" min="1" class="number numb-value" value="<?php echo $product['quantity'];?>"/>
					<span class="arr-up">
						<?php 
							echo CHtml::Ajaxlink('+', array('/cart/CountUp/'.$index), array('class'=>'price-extend delete',
								'data' => array('recount' => '1' ), // посылаем значения
								'success' => "function(data)
								{
									$('#cart_table').html(data);
								}",
							), array('id'=>'up_'.$index));
						?>
					</span>
				</span>
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
					<?php echo CHtml::Ajaxlink('<i>Удалить</i>', array('/orders/cart/remove', 'index'=>$index), array('class'=>'price-extend delete',
					'success' => "function( data )
					{
						console.log(data);
					}",
					)) ?>
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