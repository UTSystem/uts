<?php

/**
 * Display cart
 * @var Controller $this
 * @var SCart $cart
 * @var $totalPrice integer
 */

Yii::app()->clientScript->registerScriptFile($this->module->assetsUrl.'/jquery.validate.min.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile($this->module->assetsUrl.'/additional-methods.min.js', CClientScript::POS_END);
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

<?php echo CHtml::form('','post',array('id'=>'cartId')) ?>
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
									reloadSmallCart();
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
									reloadSmallCart()
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
					'success' => "function(data)
					{
						$('#cart_table').html(data);
						if(data.length<30) $('#order_data').html('');
						reloadSmallCart();
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

<?php echo CHtml::errorSummary($this->form); ?>
<div id="order_data" class="panel-group">
	<?php $this->renderPartial('_steps/auth'); ?>
	<?php $this->renderPartial('_steps/contacts'); ?>
	<?php $this->renderPartial('_steps/delivery'); ?>
	<?php $this->renderPartial('_steps/date'); ?>
	<?php //$this->renderPartial('_steps/confirm'); ?>
</div>
<?php echo CHtml::endForm() ?>

<script>
	$(document).ready(function() {

		jQuery.validator.addMethod("phoneno", function(phone_number, element) {
    	    phone_number = phone_number.replace(/\s+/g, "");
    	    return this.optional(element) || phone_number.length > 9 && 
    	    phone_number.match(/^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/);
    	}, "<br />Введите правильный номер телефона");
		
		$('.panel_collapse').hide();
		
		<?php if(!Yii::app()->user->isGuest): ?>
		$('#collapseAuth').html('');
		<?php else: ?>
		$('#collapseAuth').show();
		<?php endif; ?>
		
		$('.link_collapse').on('click', function() {
			id_this = $(this).closest('fieldset').find('.panel_collapse').attr('id');
			$('fieldset > div.panel_collapse').hide();
			$('#'+id_this).show();
			
			
			 /*$('fieldset > div.collapse').each(function() { 
				 var ids = $(this).attr('id');
				 if(ids!=id_this) {console.log(ids); $('#'+ids).hide();}
			 });*/
			
			//$('#collapseDelivery').collapse('hide');
			
			//$(this).closest('fieldset').find('.collapse').collapse('toggle');
			//$('#'+id_this).collapse('toggle');
			
		});
		
		$('.continue_panel_collapse').on('click', function() {
			id_this = $(this).closest('fieldset').find('.panel_collapse').attr('id');
			id_next =$(this).closest('fieldset').next('fieldset').find('.panel_collapse').attr('id');
			
			console.log(id_next);
			
			$('fieldset > div.panel_collapse').hide();
			$('#'+id_this).hide();
			//$('#'+id_next).find('input').focus();
			$('#'+id_next).show();
		});
		
		$('button').on('click', function() {
			var form = $( "#cartId" );
			
			//i=0;
			
			$.validator.setDefaults({
				ignore: []
			});
			
			form.validate({
				focusInvalid: true,
				invalidHandler: function(form, validator) {
                    var errors = validator.numberOfInvalids();
					if (errors) {
                        $('fieldset > div.panel_collapse').hide();
                        $(validator.errorList[0].element).closest('div.panel_collapse').show(); 
						validator.errorList[0].element.focus();
						return false;
                    }
                },
				/*showErrors: function (errorMap, errorList) {
					//console.log(this.currentElements);
					
					if (errorList.length) {
						console.log(errorList.length);
						$(errorList[0].element).closest('div.collapse').collapse('show'); 
					}
				},*/
				rules: {
					'OrderCreateForm[phone]': {
						required: true,
						phoneno: true
					},
					'OrderCreateForm[email]': {
						required: true,
						email: true
					},
					'OrderCreateForm[user_city]': {
						required: true,
						minlength: 2
					}
				},
				messages:{
					'OrderCreateForm[phone]':{
						required: "Это поле обязательно для заполнения",
						minlength: "Логин должен быть минимум 4 символа",
						maxlength: "Максимальное число символо - 16",
					},
					'OrderCreateForm[email]':{
						required: "Это поле обязательно для заполнения",
						minlength: "Email должен быть минимум 6 символа",
						maxlength: "Email должен быть максимум 16 символов",
					},
					'OrderCreateForm[user_city]':{
						required: "Это поле обязательно для заполнения",
						minlength: "Пароль должен быть минимум 6 символа",
						maxlength: "Пароль должен быть максимум 16 символов",
					},
				},
				/*highlight: function(element, errorClass, validClass) {
					console.log("elem="+$(element).closest('div.collapse')[0]);
					
					//console.log('elem_valid'+$(element).valid());
					i++;
										
					
					//console.log($(element).closest('div.collapse').eq(0));
					if(i==1) 
					{
						$(element).closest('div.collapse').collapse('hide');
						
						
						
						$(element).closest('div.collapse').eq(0).collapse('show'); 
						return false;
					}
					
					
					//console.log(i);
					
				},*/
				onclick: false,
				
			});
			//if(!form.valid()) return false;
			//console.log(form.valid());
		});
	});
	
	var delivery_date = $('#delivery_date').datepicker().on('changeDate', function(ev) {
        delivery_date.hide();
    }).data('datepicker');
	
	$('#delivery_time').timepicker({'timeFormat': 'H:i'});
	
	
</script>
<style>
.panel{
	box-shadow: none;
	margin-top: 0px !important;
}

.panel-group .panel {
    border-radius: 0px;
    margin: 0;
    margin-top: 0px !important;
}

fieldset
{
	border-top:0 !important;
	border-bottom:0 !important;
}
.error{
  color: red;
}
</style>