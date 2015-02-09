<?php
/**
 * @var StoreProduct $data
 */
?>

<div class="item">
	<div class="inner">
		<div class="image-wrap">
			<?php
				if($data->mainImage)
					$imgSource = $data->mainImage->getUrl('149x96');
				else
					$imgSource = 'http://placehold.it/149x96';
				echo CHtml::link(CHtml::image($imgSource, $data->mainImageTitle), array('frontProduct/view', 'url'=>$data->url), array('class'=>'thumbnail'));
			?>
		</div>
		<div class="tech-info">
			<span class="title" href="#"><?php echo CHtml::link(CHtml::encode($data->name), array('frontProduct/view', 'url'=>$data->url)) ?></span>
			<div class="specs">
				<span>Размер: евро</span>
				<span>Ткань: сатин</span>
			</div>
			<div class="specs-extend">
				<table>

					<tr>
						<td>Размер:</td>
						<td>евро</td>
					</tr>
					<tr>
						<td>Ткань:</td>
						<td>сатин</td>
					</tr>
					<tr>
						<td>Пододеяльник:</td>
						<td>200*220</td>
					</tr>
					<tr>
						<td>Простыня:</td>
						<td>240*260</td>
					</tr>
					<tr>
						<td>Наволочка:</td>
						<td>50*70 (2шт)<br/>
							70*70 (2шт)
						</td>
					</tr>
				</table>
			</div>
		</div>

		<div class="price-info">
			<div class="price">
				<span>
					<?php
						if($data->appliedDiscount)
							echo '<span style="color:red; "><s>'.$data->toCurrentCurrency('originalPrice').'</s></span>';
						?>
					<?php echo $data->priceRange(); ?>
				</span>
				<?php
					echo CHtml::form(array('/orders/cart/add'));
					echo CHtml::hiddenField('product_id', $data->id);
					echo CHtml::hiddenField('product_price', $data->price);
					echo CHtml::hiddenField('use_configurations', $data->use_configurations);
					echo CHtml::hiddenField('currency_rate', Yii::app()->currency->active->rate);
					echo CHtml::hiddenField('configurable_id', 0);
					echo CHtml::hiddenField('quantity', 1);

					if($data->getIsAvailable())
					{
						echo CHtml::ajaxSubmitButton(Yii::t('StoreModule.core','Купить'), array('/orders/cart/add'), array(
							'id'=>'addProduct'.$data->id,
							'dataType'=>'json',
							'success'=>'js:function(data, textStatus, jqXHR){processCartResponseFromList(data, textStatus, jqXHR, "'.Yii::app()->createAbsoluteUrl('/store/frontProduct/view', array('url'=>$data->url)).'")}',
						), array('class'=>'btn btn-info btn-buy'));
					}
					else
					{
						echo CHtml::link('Нет в наличии', '#', array(
							'onclick' => 'showNotifierPopup('.$data->id.'); return false;',
							'class'   => 'notify_link',
						));
					}
				?>
				<?php echo CHtml::endForm() ?>
			</div>
			<!--<div class="price-extend">-->
			<!---->
			<!--</div>-->
		</div>
	</div>
</div>