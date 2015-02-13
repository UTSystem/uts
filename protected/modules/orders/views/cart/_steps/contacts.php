<fieldset class="panel">
    <a href="#collapseContacts" data-parent="#order_data" data-toggle="collapse" class="">
		<legend id="collapse_legend">Контактные данные</legend>
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
    </div>
</fieldset>

<script>
	$(document).ready(function() {

		jQuery.validator.addMethod("phoneno", function(phone_number, element) {
    	    phone_number = phone_number.replace(/\s+/g, "");
    	    return this.optional(element) || phone_number.length > 9 && 
    	    phone_number.match(/^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/);
    	}, "<br />Введите правильный номер телефона");
		
		
		/*$('button, #collapse_legend').on('click', function() {
			
		});*/
		
		$('button, #collapse_legend').on('click', function() {
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
                        console.log('нажали кнопку');
                        $(validator.errorList[0].element).closest('div.collapse').collapse('show'); 
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
				//onclick: false,
				
			});
			console.log('нажали');
			//if(!form.valid()) return false;
			//console.log(form.valid());
		});
	});
</script>
<style>
.error{
  color: red;
}
</style>