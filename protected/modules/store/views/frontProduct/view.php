<?php
/**
 * Product view
 * @var StoreProduct $model
 * @var $this Controller
 */

// Set meta tags
$this->pageTitle = ($model->meta_title) ? $model->meta_title : $model->name;
$this->pageKeywords = $model->meta_keywords;
$this->pageDescription = $model->meta_description;

// Register main script
Yii::app()->clientScript->registerScriptFile($this->module->assetsUrl.'/product.view.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile($this->module->assetsUrl.'/product.view.configurations.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/js/magnific.js', CClientScript::POS_END);
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/css/magnific-popup.css');

// Create breadcrumbs
if($model->mainCategory)
{
	$ancestors = $model->mainCategory->excludeRoot()->ancestors()->findAll();

	foreach($ancestors as $c)
		$this->breadcrumbs[$c->name] = $c->getViewUrl();

	// Do not add root category to breadcrumbs
	if ($model->mainCategory->id != 1)
		$this->breadcrumbs[$model->mainCategory->name] = $model->mainCategory->getViewUrl();
}
?>

<? //print_R($model); die; ?>

<h1><?php echo CHtml::encode($model->name); ?></h1>
<div class="item-panel">
	<ul class="nav nav-pills">
		<li role="overview" class="disabled"><a href="#">Обзор</a></li>
		<li role="description"><a href="#">Описание</a></li>
		<li role="parameters"><a href="#">Характеристики</a></li>
		<li role="to-catalog"><a href="#">Вернуться в каталог</a></li>
	</ul>
</div>
<div class="photo-prices">
	<div class="photo-block"> <!-- col-md-6 -->
		<div class="photo">
			<div class="popup-gallery">
				<?php
					// Main product image
					if($model->mainImage)
						echo CHtml::link(CHtml::image($model->mainImage->getUrl('565x424', 'resize'), $model->mainImage->title), $model->mainImage->getUrl());
					else
						echo CHtml::link(CHtml::image('http://placehold.it/565x424'), 'http://placehold.it/565x424');
				?>
				<ul>
					<?php
						// Display additional images
						foreach($model->imagesNoMain as $image)
						{
							echo CHtml::openTag('li', array('class'=>'span2'));
							echo CHtml::link(CHtml::image($image->getUrl('79x59'), $image->title), $image->getUrl());
							echo CHtml::closeTag('li');
						}
					?>
				</ul>
			</div>
		</div>
	</div>

	<div class="price-block"> <!-- col-md-6 -->
		<div class="price">
			<div class="top">
				<div class="left">
					<!--<a href="#"><span>Хотите дешевле?</span></a>-->
					<span class="price">
						<?php echo StoreProduct::formatPrice($model->toCurrentCurrency()); ?>
						<?php echo Yii::app()->currency->active->symbol; ?>
					</span>
					<p>
						<?php 
							$getAvailabilityItems=StoreProduct::getAvailabilityItems();
							echo $getAvailabilityItems[$model->availability]; 
						?>
					</p>
					<?php
						echo CHtml::form(array('/orders/cart/add'));
						echo CHtml::hiddenField('product_id', $model->id);
						echo CHtml::hiddenField('product_price', $model->price);
						echo CHtml::hiddenField('use_configurations', $model->use_configurations);
						echo CHtml::hiddenField('currency_rate', Yii::app()->currency->active->rate);
						echo CHtml::hiddenField('configurable_id', 0);
						echo CHtml::hiddenField('quantity', 1);

						if($model->isAvailable)
						{
							echo CHtml::ajaxSubmitButton(Yii::t('StoreModule.core','Купить'), array('/orders/cart/add'), array(
								'dataType' => 'json',
								'success'  => 'js:function(data, textStatus, jqXHR){processCartResponse(data, textStatus, jqXHR)}',
							), array(
								'id'=>'buyButton',
								'class'=>'btn btn-info'
							));
						}
						else
						{
							echo CHtml::link('Сообщить о появлении', '#', array(
								'onclick' => 'showNotifierPopup('.$model->id.'); return false;',
							));
						}

						echo CHtml::endForm();
					?>
					<!--<a href="#" class="btn btn-info">Купить</a>
					<a href="#">Быстрый заказ</a>-->
				</div>
				<!--<div class="right">
					<a href="#"><span>Ваш бонус:&nbsp;</span>15 баллов</a>
					<a href="#"><span>Добавить в сравнение</span></a>
					<a href="#"><span>Добавить в закладки</span></a>
				</div>-->
			</div>

			<div class="middle">
				<div class="delivery">
					<div class="address">
						<span>Регион доставки&nbsp;<a href="#">Москва</a></span>
						<p>
							Курьерская доставка: 290 рублей<br/>
							Ближайшая доставка: Завтра, 28.07.2014
							<a href="#">Бесплатная доставка</a>
						</p>
					</div>
				</div>
			</div>

			<div class="bottom">
				<div class="payment">
					<h2 class="wget-name small">Оплата</h2>
					<a href="#">Наличными при получении</a>
					<!--<a href="#">Банковский перевод</a>-->
					<a href="#">Оплата на сайте</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="description-parameters">
	<div class="col-md-4">
		<div class="description">
			<h2 class="wget-name">Описание</h2>
			<?php echo $model->full_description; ?>
		</div>
	</div>
	<div class="col-md-4">
		<div class="parameters">
			<h2 class="wget-name">Характеристики</h2>
			<?php
				$attributes = $model->getEavAttributes();
				if(!empty($attributes))
					$attributes_html = $this->renderPartial('_attributesdl', array('model'=>$model), true);
				echo $attributes_html;
			?>
			<!--<a href="#">Подробные характеристики</a>-->
		</div>
	</div>
	<div class="col-md-4 acs">
		<!--<div class="accessories">
			<h2 class="wget-name">Аксессуары</h2>
			<div class="item" style="background: white url('images/accessories/accessories-background.jpg') no-repeat center bottom; background-size: contain;">
				<span>Paco rabanne Lady Milion  ев жен. 30 мл</span>
				<a href="#">Домашний текстиль</a>
				<a href="#" class="strike-price">
					<span class="strike">20 450</span>
					15 250
				</a>
			</div>
		</div>-->
	</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
	$('.popup-gallery').magnificPopup({
	  delegate: 'a',
	  type: 'image',
	  tLoading: 'Loading image #%curr%...',
	  mainClass: 'mfp-img-mobile',
	  gallery: {
		enabled: true,
		navigateByImgClick: true,
		preload: [0,1] // Will preload 0 - before current, and 1 after the current image
	  },
	  image: {
		tError: '&lt;a href="%url%"&gt;The image #%curr%&lt;/a&gt; could not be loaded.',
		titleSrc: function(item) {
		  return item.el.attr('title');
		}
	  }
	});
});
</script>