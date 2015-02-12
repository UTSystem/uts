<fieldset class="panel">
    <a href="#collapseAuth" data-parent="#order_data" data-toggle="collapse">
		<legend>Авторизация</legend>
	</a>   
	
    <div class="panel-collapse collapse in" id="collapseAuth" style="height: auto; ">
		<div class="left">
			<span class="pseudo-title">Войти с учетной записью</span>
			<div class="form-group">
				<input type="text" id="UserLoginForm_username" name="UserLoginForm[username]" placeholder="Логин">
			</div>
			<div class="form-group">
				<input type="password" id="UserLoginForm_password" name="UserLoginForm[password]" placeholder="Пароль">
			</div>
			<div class="form-group">
				<?php 
					echo CHtml::AjaxButton('войти', array('/users/login/'), array(
						'type' => 'POST',
						'data' => array('YII_CSRF_TOKEN'=>Yii::app()->request->csrfToken,'UserLoginForm[username]' => 'js:$("#UserLoginForm_username").val()', 'UserLoginForm[password]' => 'js:$("#UserLoginForm_password").val()'),
						'success' => "function(data)
						{
							window.location.href = '/cart';
							return false;
						}",
					),array('class'=>'btn-flat'));
				?>
				<a href="/users/remind">Забыли пароль?</a>
			</div>
		</div>

		<div class="buy-type">
			<div><a href="/users/register" class="btn btn-info">зарегестрироваться</a><p>Получайте бонусы, экономте деньги и время при следующих покупках<br/> Регистрация займет не более 2-х минут</p></div>
			<div>
			<!--<a href="#" id="not_register" data-toggle="collapse" data-parent="#order_data" href="#collapseAuth" class="btn btn-gray">Купить без регистрации</a>-->
			<button data-toggle="collapse" data-parent="#order_data" href="#collapseContacts" class="btn btn-gray">Купить без регистрации</button>
			<p>При следующей покупке необходимо заполнять контктные данные и адрес доставки<br/>Незарегистрированные пользователи не могу пользоваться бонусами и накопительными скидками</p></div>
		</div>
	</div>
</fieldset>

<?php if(!Yii::app()->user->isGuest): ?>
<script>
	$('#collapseAuth').html('');
</script>
<?php endif; ?>

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
</style>