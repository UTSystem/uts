<?php

	Yii::import('application.modules.store.components.SCompareProducts');
	Yii::import('application.modules.store.models.wishlist.StoreWishlist');

	$assetsManager = Yii::app()->clientScript;
	$assetsManager->registerCoreScript('jquery');
	$assetsManager->registerCoreScript('jquery.ui');

	// jGrowl notifications
	Yii::import('ext.jgrowl.Jgrowl');
	Jgrowl::register();

	// Disable jquery-ui default theme
	$assetsManager->scriptMap=array(
		'jquery-ui.css'=>false,
	);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <!-- Bootstrap -->
    <link href="http://fonts.googleapis.com/css?family=Ubuntu:300,400,700,400italic&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/css/app.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/css/item.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/css/jquery.raty.css" rel="stylesheet">
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/common.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container-fluid">
    <div class="row top">
        <div class="container">
            <div class="top-block">
                <div class="col-md-6">
                    <a href="#" alt="">Как заказать</a>
                    <a href="#" alt="">Оплата</a>
                    <a href="#" alt="">Доставка</a>
                    <a href="#" alt="">Контакты</a>
                </div>
                <div class="col-md-6">
					<?php if(Yii::app()->user->isGuest): ?>
						<?php echo CHtml::link(Yii::t('core','Войти'), array('/users/login/login'), array('class'=>'light')) ?>
						
						<?php echo CHtml::link(Yii::t('core','Регистрация'), array('/users/register'), array('class'=>'light')) ?>
					<?php else: ?>
						<?php echo CHtml::link(Yii::t('core','Личный кабинет'), array('/users/profile/index'), array('class'=>'light')) ?>
						
						<?php echo CHtml::link(Yii::t('core','Мои заказы'), array('/users/profile/orders'), array('class'=>'light')) ?>
						
						<?php echo CHtml::link(Yii::t('core','Выход'), array('/users/login/logout'), array('class'=>'light')) ?>
					<?php endif; ?>
                </div>
            </div> <!-- top navi -->
        </div>
    </div>
	
    <div class="row header">
        <div class="container">
            <div class="info-block">
                <div class="col-md-5 logotype">
                    <a href="/"><img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/images/logotype.png" width="397" height="65" title="" /></a>
                </div>
                <div class="col-md-3 phones">
                    <a href="tel:88003222223">8 800<span>322 22 23</span></a>
                    <a href="#">Заказать обратный звонок</a>
                </div>
                <div class="col-md-4">
                    <div class="cart-panel" id="cart">
                        <div class="left">
                            <span class="badge active"><?php echo Yii::app()->cart->countItems() ?></span>
                        </div>
                        <div class="right">
                            <span><?php echo StoreProduct::formatPrice(Yii::app()->currency->convert(Yii::app()->cart->getTotalPrice())) ?></span>
                            <a href="<?php echo Yii::app()->createUrl('/cart') ?>" class="btn btn-transparent">оформить</a>
                        </div>
                    </div>
                </div>
            </div> <!-- info block -->
        </div>
    </div> <!-- header -->
	
	<div class="row helper-block">
        <div class="container">
            <div class="col-md-4">
                <a href="<?php echo $this->createUrl('/store/category'); ?>" class="btn btn-info">каталог товаров</a>
            </div>
            <div class="col-md-8">
                <?php echo CHtml::form($this->createUrl('/store/category/search'),'', array('class'=>'global-form')) ?>
					<fieldset></fieldset>
					<input type="text" placeholder="Введите слово для поиска среди 12.000 товаров" name="q" id="searchQuery"/>
					<button class="btn btn-info">Найти</button>
					<a href="#">Расширенный поиск</a>
				<?php echo CHtml::endForm() ?>
            </div>
        </div>
    </div>
	
	<div class="row breadcrumb-block">
		<div class="container">
			<?php if (isset($this->breadcrumbs)): ?>
 
				<?php
				$this->widget('zii.widgets.CBreadcrumbs', array(
					'links' => $this->breadcrumbs,
					'homeLink' => '<li><a href="/"><i class="fa fa-home"></i> Главная</a></li>',
					'separator' => '',
					'tagName' => 'ol',
					'activeLinkTemplate' => '<li class="active"><a href="{url}">{label}</a></li>',
					'inactiveLinkTemplate' => '<li>{label}</li>',
					'htmlOptions' => array('class' => 'breadcrumb', 'style'=>'position:relative; float:none; top:0px;'),
				));
				?><!-- breadcrumbs -->
				
			<?php endif ?>
		</div>
	</div>
	
	<div class="row content item-card">
        <div class="container">
            <div class="col-md-12">
				<?php echo $content; ?>
            </div>
        </div>
    </div>
	
    <div class="row footer">
        <div class="container">
            <div class="col-md-4">
                <img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/images/logotype-footer.png" width="220" height="115">
            </div>
            <div class="col-md-8">
                <div class="left-side">
                    <div class="contacts">
                        <a href="#">8 800<span>322 22 33</span></a>
                        <a href="mailto:info@uts.ru">info@uts.ru</a>
                    </div>
                    <div class="social">
                        <div class="socialfacebook">
                            <a href="#" alt="vk"></a>
                        </div>
                        <div class="socialtwitter">
                            <a href="#" title="fb"></a>
                        </div>
                        <div class="socialvkontakte">
                            <a href="#" title="tv"></a>
                        </div>
                    </div>
                </div>
                <div class="menu">
                    <ul>
                        <li class="heading">О компании</li>
                        <li><a href="#">Пресс-центр</a></li>
                        <li><a href="#">Вакансии</a></li>
                        <li><a href="#">Реквизиты</a></li>
                        <li><a href="#">О компании</a></li>
                    </ul>
                    <ul>
                        <li class="heading">Помощь</li>
                        <li><a href="#">Как сделать заказ</a></li>
                        <li><a href="#">Доставка</a></li>
                        <li><a href="#">Оплата</a></li>
                        <li><a href="#">Гарантии</a></li>
                        <li><a href="#">Помощь</a></li>
                    </ul>
                    <ul>
                        <li class="heading">Обратная связь</li>
                        <li><a href="#">Зарабатывайте с нами</a></li>
                        <li><a href="#">Продавайте Ваши товары</a></li>
                        <li><a href="#">Зарабатывайте на партнерской программе</a></li>
                        <li><a href="#">Размещайте рекламу</a></li>
                        <li><a href="#">Открывайте пункты выдачи заказов</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bottom-block">
    <div class="container">
        <div class="left-side">
            <span class="to-top"></span>
            <!--<a href="#">Обратная связь</a>-->
        </div>
        <div class="widgets">
            <!--<div class="compare">
                <p>В сравнение</p>
                <span class="badge">0</span>
            </div>
             <div class="bookmarks">
               <p>Закладки</p>
                <span class="badge">2</span>
            </div>-->
            <div class="cart" id="cart-bottom">
                <p>Корзина</p>
                <span class="badge"><?php echo Yii::app()->cart->countItems() ?></span>
                <i><?php echo StoreProduct::formatPrice(Yii::app()->currency->convert(Yii::app()->cart->getTotalPrice())) ?></i>
                <a href="<?php echo Yii::app()->createUrl('/cart') ?>" class="btn btn-transparent">оформить</a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
 
$(function() {
	$('.to-top').hide();
	$(window).scroll(function() {
	 
		if($(this).scrollTop() != 0) {
		 
			$('.to-top').fadeIn();
		 
		} else {
		 
			$('.to-top').fadeOut();
		 
		}
	 
	});
	 
	$('.to-top').click(function() {
	 
		$('body,html').animate({scrollTop:0},800);
	 
	});
 
});
 
</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!--<script src="js/bootstrap.min.js"></script>-->
<script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/carousel.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/app.js"></script>
</body>
</html>