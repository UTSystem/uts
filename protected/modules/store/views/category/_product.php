<?php

/**
 * @var StoreProduct $data
 */
?>
<div class="item">
	<div class="inner">
		<span class="title" href="#"><?php echo CHtml::link(CHtml::encode($data->name), array('frontProduct/view', 'url'=>$data->url),array('class'=>'title')) ?></span>
		<?php
			if($data->mainImage)
				$imgSource = $data->mainImage->getUrl('149x96');
			else
				$imgSource = 'http://placehold.it/149x96';
			echo CHtml::link(CHtml::image($imgSource, $data->mainImageTitle), array('frontProduct/view', 'url'=>$data->url));
		?>
		<div class="specs">
			<?php 
				$attributes = $data->getEavAttributes();
				if(!empty($attributes))
					$attributes_html = $this->renderPartial('../frontProduct/_attributes', array('model'=>$data, 'count'=>2), true);
				echo $attributes_html;
			?>
		</div>
		<div class="specs-extend">
			<?php 
				$attributes = $data->getEavAttributes();
				if(!empty($attributes))
					$attributes_html = $this->renderPartial('../frontProduct/_attributes', array('model'=>$data), true);
				echo $attributes_html;
			?>
		</div>
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
					echo '<p class="error">Нет в наличии</p>';
					/*echo CHtml::link('Нет в наличии', '#', array(
						'onclick' => 'showNotifierPopup('.$data->id.'); return false;',
						'class'   => 'notify_link',
					));*/
				}
			?>
			<?php echo CHtml::endForm() ?>
		</div>
	</div>
</div>