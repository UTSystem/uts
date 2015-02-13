<fieldset>
    <a href="#" class="link_collapse">
		<legend>Контактные данные</legend>
	</a>

	<div class="panel_collapse" id="collapseContacts" style="height: auto; width: 392px">
		<span>Укажите контактные данные человека, который будет получать заказ</span>

		<div class="form-group">
			<?php echo CHtml::activeTextField($this->form, 'name', array('placeholder'=>"Имя и фамилия")); ?>
		</div>
		<div class="form-group">
			<?php echo CHtml::activeTextField($this->form, 'email', array('placeholder'=>"E-mail")); ?>
			<i>Для получения уведомлений о статусе заказа</i>
		</div>
		<div class="form-group hint">
			<?php echo CHtml::activeTextField($this->form, 'phone', array('placeholder'=>'Телефон')); ?>
			<p>Мы позвоним вам, чтобы еще подтвердить ваш заказ Будьте на связи! Мы не сможем доставить заказ, если он не подтвержден</p>
		</div>
		<div class="form-group">
			<?php echo CHtml::activeTextArea($this->form,'comment', array('placeholder'=>"Примечание")); ?>
		</div>
		<button class="btn-flat continue_panel_collapse">Продолжить</button>
    </div>
</fieldset>