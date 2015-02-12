<?php
Yii::app()->getClientScript()->registerCSSFile(Yii::app()->theme->baseUrl.'/assets/css/datepicker.css');
Yii::app()->getClientScript()->registerCSSFile(Yii::app()->theme->baseUrl.'/assets/css/jquery.timepicker.css');
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/js/bootstrap-datepicker.js');
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/js/jquery.timepicker.js');

if ($_POST['OrderCreateForm']['delivery_date'])	$delivery_date = $_POST['OrderCreateForm']['delivery_date'];
else $delivery_date = date("d.m.Y");

if ($_POST['OrderCreateForm']['delivery_time'])	$delivery_time = $_POST['OrderCreateForm']['delivery_time'];
else $delivery_time = '10:00';

?>
<fieldset>
	<a href="#collapseDate" data-parent="#order_data" data-toggle="collapse" class="">
		<legend>Дата и стоимость доставки</legend>
	</a>
	<div class="panel-collapse collapse" id="collapseDate" style="height: auto;">
		<div class="form-group">
			<span class="pseudo-title">Выберите дату доставки</span>
			<?php echo CHtml::activeTextField($this->form, 'delivery_date', array('style' => "width:200px;", "id" => "delivery_date", 'class' => "form-control", 'data-date-format' => 'dd.mm.yyyy', 'value' => $delivery_date)); ?>
			<i>По умолчанию, установлена ближайшая возможная дата доставки</i>
		</div>
		<div class="form-group">
			<span class="pseudo-title">Выберите время доставки</span>
			<?php echo CHtml::activeTextField($this->form, 'delivery_time', array('style' => "width:200px;", "id" => "delivery_time", 'class' => "time ui-timepicker-input", 'value' => $delivery_time)); ?>
		</div>

		<p class="preview-price"><strong>Стоимость доставки:</strong> 2000 рублей</p>
		<a href="#" class="btn btn-info">Продолжить</a>
	</div>
</fieldset>

<script>
    var delivery_date = $('#delivery_date').datepicker().on('changeDate', function(ev) {
        //console.log(dt);
        delivery_date.hide();
    }).data('datepicker');
	
	$('#delivery_time').timepicker({'timeFormat': 'H:i'});
	
</script>