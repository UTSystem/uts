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
					<input type="text" class="city" placeholder="Город">
					<input type="text" class="index" placeholder="Индекс">
					<input type="text" class="street" placeholder="Улица">
					<input type="text" class="house" placeholder="Дом">
					<input type="text" class="appartaments" placeholder="Квартира">
					<input type="text" class="corp" placeholder="Корпус">
					<input type="text" class="stro" placeholder="Строение">
					<input type="text" class="floor" placeholder="Этаж">
					<textarea placeholder="Здесь можно указать код домофона или любую другую информацию, которая будет полезна для курьерской службы"></textarea>
				</div>
			</div>

			<div class="tab-pane fade" id="myself">
				<legend class="sub">Пункты самовывоза</legend>
				<div class="map-area">
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
	</div>
</fieldset>
