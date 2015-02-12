<fieldset class="panel">
    <a href="#collapseContacts" data-parent="#order_data" data-toggle="collapse" class="">
		<legend>Контактные данные</legend>
	</a>
	
	<div class="panel-collapse collapse" id="collapseContacts" style="height: auto; width: 392px">
		<span>Укажите контактные данные человека, который будет получать заказ</span>

		<div class="form-group">
			<?php echo CHtml::activeTextField($this->form,'name', array('placeholder'=>"Имя и фамилия")); ?>
		</div>
		<div class="form-group">
			<?php echo CHtml::activeTextField($this->form,'email', array(
							'placeholder'=>"E-mail", 
			)); ?>
			<i>Для получения уведомлений о статусе заказа</i>
		</div>
		<div class="form-group hint">
			<?php echo CHtml::activeTextField($this->form,'phone', array(
							'placeholder'=>'Телефон',
							
			)); ?>
			<p>Мы позвоним вам, чтобы еще подтвердить ваш заказ Будьте на связи! Мы не сможем доставить заказ, если он не подтвержден</p>
		</div>
		<div class="form-group">
			<?php echo CHtml::activeTextArea($this->form,'comment', array('placeholder'=>"Примечание")); ?>
		</div>

		<button data-toggle="collapse" data-parent="#order_data" href="#collapseDelivery" class="btn-flat">Продолжить</button>
		<!--<a href="#" class="btn-flat" id="cart_contacts_continue">Продолжить</a>-->
    </div>
</fieldset>

<script>
	$(document).ready(function() {
		jQuery.validator.addMethod("phoneno", function(phone_number, element) {
    	    phone_number = phone_number.replace(/\s+/g, "");
    	    return this.optional(element) || phone_number.length > 9 && 
    	    phone_number.match(/^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/);
    	}, "<br />Please specify a valid phone number");
		
		
		$('button').on('click', function() {
			var form = $( "#cartId" );
			
			 $.validator.setDefaults({
				ignore: []
			});
			
			form.validate({
				debug: true,
				rules: {
					'OrderCreateForm[phone]': {
						required: true,
						phoneUS: true
					},
					'OrderCreateForm[email]': {
						required: true,
						email: true
					},
					username: {
						required: true,
						minlength: 2
					},
					password: {
						required: true,
						minlength: 5
					},
					confirm_password: {
						required: true,
						minlength: 5,
						equalTo: "#password"
					},
					email: {
						required: true,
						email: true
					},
					topic: {
						required: "#newsletter:checked",
						minlength: 2
					},
					agree: "required"
				},
				messages:{
					'OrderCreateForm[phone]':{
						required: "Это поле обязательно для заполнения",
						minlength: "Логин должен быть минимум 4 символа",
						maxlength: "Максимальное число символо - 16",
					},

					'OrderCreateForm[email]':{
						required: "Это поле обязательно для заполнения",
						minlength: "Пароль должен быть минимум 6 символа",
						maxlength: "Пароль должен быть максимум 16 символов",
					},
				},
				 highlight: function(element, errorClass, validClass) {
					
					console.log(element);
					
					//$(element).find('fieldset').addClass(errorClass).removeClass(validClass);
					//$(element.form).find("label[for=" + element.id + "]").addClass(errorClass);
					$(element).closest('fieldset').collapse('show');
					console.log($(element).closest('fieldset'));
				},
				showErrors: function (errorMap, errorList) {
					console.log(errorList);
					console.log(errorMap);
					if (errorList.length) {
						$("span").html(errorList[0].message);
					}
				}
			});
			if(!form.valid()) return false;;
		});
	});
</script>
<style>
.error{
  color: red;
}
</style>