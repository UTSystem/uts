<?php 
	$this->widget('application.modules.store.widgets.SSlider');
?>

<div class="items grid-block">
	<h2 class="wget-name">Лидеры продаж</h2>
	<?php
		foreach($leaders as $p)
			$this->renderPartial('_product', array('data'=>$p));
	?>
</div>
<style>
.right-column .items.grid-block .item .price input{
    font-size: 13px;
    font-weight: 300;
    line-height: 13px;
    margin-top: 19px;
    text-transform: none;
}
</style>
<div class="items grid-block newest">
	<h2 class="wget-name">Новинки</h2>
	<?php
	foreach($newest as $p)
		$this->renderPartial('_product', array('data'=>$p));
	?>
</div>

<div class="info grid-block">
	<h2 class="wget-name">о компании</h2>
	<p>Интернет-магазин основан в 1998 году. официальным днем открытия магазина  Приказчик слушал и улыбался, желая<br/> запомнить для употребления сколько можно больше из умных разговоров. А мы были два ненавидящих друг друга <br/>колодника, связанных одной цепью, отравляющие жизнь друг другу и старающиеся не видать этого. <br/><br/>Я еще не знал тогда, что 0,99 супружеств живут в таком же аду, как и я жил, и что это не может быть иначе. Тогда я еще не знал этого ни про других, ни про себя.<br/><br/> А мы были два ненавидящих друг друга колодника, связанных одной цепью, отравляющие жизнь друг другу и старающиеся не видать этого.</p>
</div>