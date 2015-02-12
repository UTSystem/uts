<fieldset class="normal">
	<a href="#collapseAuth" data-parent="#order_data" data-toggle="collapse" class="">
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
				<input type="submit" class="btn-flat" value="войти">
				<a href="/users/remind">Забыли пароль?</a>
			</div>
		</div>

		<div class="buy-type">
			<div><a href="/users/register" class="btn btn-info">зарегестрироваться</a><p>Получайте бонусы, экономте деньги и время при следующих покупках<br/> Регистрация займет не более 2-х минут</p></div>
			<div><a href="#" id="not_register" class="btn btn-gray">Купить без регистрации</a><p>При следующей покупке необходимо заполнять контктные данные и адрес доставки<br/>Незарегистрированные пользователи не могу пользоваться бонусами и накопительными скидками</p></div>
		</div>
	</div>
</fieldset>

<?php if(!Yii::app()->user->isGuest): ?>
<script>
	$('#collapseAuth').html('');
</script>
<?php else: ?>
<script>
	$('#not_register').on('click', function() {
		$('#collapseAuth').collapse('hide');
		$('#collapseContacts').collapse('show');
		return false;
    });
</script>
<?php endif; ?>