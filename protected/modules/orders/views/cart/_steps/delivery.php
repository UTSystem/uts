<fieldset class="empty">
	<a href="#collapseDelivery" data-parent="#order_data" data-toggle="collapse" class="">
		<legend>Способ получения заказа и адрес доставки</legend>
	</a>
	
	<div class="panel-collapse collapse" id="collapseDelivery" style="height: auto; width: 460px">
		<span class="pseudo-title">Выберите способ получения заказа</span>
		<div class="link-controls">
			<a href="#courier" data-toggle="tab" class="sel"><span>Курьерская доставка</span></a>
			<a href="#myself" data-toggle="tab"><span>Заберу сам</span></a>
		</div>
		
		<div class="tab-content">
			
			<div class="tab-pane fade in active" id="courier">
				<legend class="sub">Адрес доставки</legend>
				<div class="form-group-address form-group">
					<?php echo CHtml::activeHiddenField($this->form, 'delivery_id', array('value'=>'14')); ?>
					<?php echo CHtml::activeTextField($this->form, 'user_city', array('class'=>'city', 'placeholder'=>"Город")); ?>
					<?php echo CHtml::activeTextField($this->form, 'user_index', array('class'=>'index', 'placeholder'=>"Индекс")); ?>
					<?php echo CHtml::activeTextField($this->form, 'user_street', array('class'=>'street', 'placeholder'=>"Улица")); ?>
					<?php echo CHtml::activeTextField($this->form, 'user_house', array('class'=>'house', 'placeholder'=>"Дом")); ?>
					<?php echo CHtml::activeTextField($this->form, 'user_corp', array('class'=>'corp', 'placeholder'=>"Корпус")); ?>
					<?php echo CHtml::activeTextField($this->form, 'user_stro', array('class'=>'stro', 'placeholder'=>"Строение")); ?>
					<?php echo CHtml::activeTextField($this->form, 'user_appartaments', array('class'=>'appartaments', 'placeholder'=>"Квартира")); ?>
					<?php echo CHtml::activeTextField($this->form, 'user_floor', array('class'=>'floor', 'placeholder'=>"Этаж")); ?>
					<?php echo CHtml::activeTextArea($this->form, 'user_delivery_comment', array('placeholder'=>"Здесь можно указать код домофона или любую другую информацию, которая будет полезна для курьерской службы")); ?>
				</div>
			</div>

			<div class="tab-pane fade" id="myself">
				<legend class="sub">Пункты самовывоза</legend>
				<div class="map-area">
					<?php echo CHtml::activeHiddenField($this->form, 'delivery_id', array('value'=>'15')); ?>
					<a href="#" class="address act"><span>г. Москва, ул. Марии Расковой, 27</span></a>
					<div class="media">
						<span class="media-left">
							<img src="images/map.jpg">
						</span>
						<div class="media-body">
							<ul>
								<li>Время работы: с <a href="#">09:00 до 20:00</a></li>
								<li>Телефон: <a href="#">+7 (495) 333-33-33</a></li>
								<li>Варианты оплаты: <a href="#">Наличными, безналичными</a></li>
								<li>Ориентировочный срок доставки: <a href="#">27 марта 2015 г.</a></li>
							</ul>
							<a href="#" class="btn btn-info">Выбрать</a>
						</div>
						<a href="#" class="hider">Свернуть</a>
					</div>
					<a href="#" class="address"><span>г. Москва, ул. Марии Расковой, 17</span></a>
					<a href="#" class="address"><span>г. Москва, ул. Марии Расковой, 57</span></a>
				</div>
			</div>
		</div>
		<a href="#" id="cart_delivery_continue" class="btn-flat">Продолжить</a>
	</div>
</fieldset>

<script>
	$('#cart_delivery_continue').on('click', function() {
		$('.collapse').collapse('hide');
		$('#collapseDate').collapse('show');
		return false;
    });
</script>