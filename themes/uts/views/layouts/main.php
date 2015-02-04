<?php
/**
 * Created by PhpStorm.
 * User: PekopT
 * Date: 13.01.15
 * Time: 22:31
 */
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>utc idx</title>

    <!-- Bootstrap -->
    <link href="http://fonts.googleapis.com/css?family=Ubuntu:300,400,700,400italic&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/css/app.css" rel="stylesheet">

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
                    <a href="#" alt="">Войти</a>
                    <a href="#" alt="">Регистрация</a>
                </div>
            </div> <!-- top navi -->
        </div>
    </div>
    <div class="row header">
        <div class="container">
            <div class="info-block">
                <div class="col-md-5 logotype">
                    <a href="#"><img src="images/logotype.png" width="397" height="65" title="" /></a>
                </div>
                <div class="col-md-3 phones">
                    <a href="tel:88003222223">8 800<span>322 22 23</span></a>
                    <a href="#">Заказать обратный звонок</a>
                </div>
                <div class="col-md-4">
                    <div class="cart-panel">
                        <div class="left">
                            <span class="badge active">4</span>
                        </div>
                        <div class="right">
                            <span>88 540</span>
                            <a href="#" class="btn btn-transparent">оформить</a>
                        </div>
                    </div>
                </div>
            </div> <!-- info block -->
        </div>
    </div> <!-- header -->
    <div class="row content two-columns helper-block main">
        <div class="container">
            <div class="col-md-4 left-column">
                <a href="#" class="btn btn-info">каталог товаров</a>
                <ul>
                    <li><a href="#">Книги</a></li>
                    <li>
                        <a href="#">Посуда</a>
                        <ul>
                            <li><a href="#">Бокалы, кружки</a></li>
                            <li><a href="#">Емкости для специй</a></li>
                            <li><a href="#">Контейнеры</a></li>
                            <li><a href="#">Кухонные наборы</a></li>
                            <li><a href="#">Разделовчные доски</a></li>
                            <li><a href="#">Сервировка стола</a></li>
                            <li><a href="#">Сковороды, кастрюли</a></li>
                            <li><a href="#">Специальные приспособления</a></li>
                            <li><a href="#">Столовые приборы</a></li>
                            <li><a href="#">Тарелки, миски</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Домашний текстиль</a></li>
                    <li><a href="#">Компьютеры и комплектующие</a></li>
                    <li><a href="#">садовая техника</a></li>
                    <li><a href="#">Товары для отопления</a></li>
                    <li><a href="#">Товары и комплектующие</a></li>
                </ul>

                <div class="widget">
                    <h2 class="wget-name">Новости</h2>
                    <div class="news">
                        <div>
                            <h3>
                                <p>04.07.2014</p>
                                Обновленная линейка телевизоров
                            </h3>
                            <p>
                                Рыба. ьакая рыба. отличная рыба Ни за что … <a href="#">Подробнее</a>
                            </p>
                        </div>
                        <div>
                            <h3>
                                <p>04.07.2014</p>
                                JIинейка телевизоров и тепловизоров
                            </h3>
                            <p>
                                Отличная рыба, для новости; Лучше не бывает. Ни за что … <a href="#">Подробнее</a>
                            </p>
                        </div>
                        <div>
                            <h3>
                                <p>04.07.2014</p>
                                Обновленная
                            </h3>
                            <p>
                                Рыба. ьакая рыба. отличная рыба, для новости; Лучше не бывает. Ни за что … <a href="#">Подробнее</a>
                            </p>
                        </div>
                    </div>
                    <a href="#" class="wget-anchor">Все новости</a>
                </div>
            </div>
            <div class="col-md-8 right-column">
                <form class="global-form">
                    <fieldset></fieldset>
                    <input type="text" name="" placeholder="Введите слово для поиска среди 12.000 товаров">
                    <button class="btn btn-info">Найти</button>
                    <a href="#">Расширенный поиск</a>
                </form>
                <div class="banner">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                            <!--<li data-target="#carousel-example-generic" data-slide-to="2"></li>-->
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="images/banner/banner2.jpg" alt="...">
                                <div class="carousel-caption">
                                    В честь торжественного открытия нашего магазина <a href="#">скидка на ножи 20%</a>
                                </div>
                            </div>
                            <div class="item">
                                <img src="images/banner/banner.gif" alt="...">
                                <div class="carousel-caption">
                                    В честь торжественного открытия нашего магазина <a href="#">скидка на ножи 20%</a>
                                </div>
                            </div>
                            <div class="item">
                                <img src="images/banner/banner3.jpg" alt="...">
                                <div class="carousel-caption">
                                    В честь торжественного открытия нашего магазина <a href="#">скидка на ножи 20%</a>
                                </div>
                            </div>
                            <div class="item">
                                <img src="images/banner/banner4.jpg" alt="...">
                                <div class="carousel-caption">
                                    В честь торжественного открытия нашего магазина <a href="#">скидка на ножи 20%</a>
                                </div>
                            </div>
                        </div>

                        <!-- Controls -->
                        <!--<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">-->
                        <!--<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>-->
                        <!--<span class="sr-only">Previous</span>-->
                        <!--</a>-->
                        <!--<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">-->
                        <!--<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>-->
                        <!--<span class="sr-only">Next</span>-->
                        <!--</a>-->
                    </div> <!-- carousel -->
                </div>

                <div class="items grid-block">
                    <h2 class="wget-name">Лидеры продаж</h2>
                    <div class="item">
                        <div class="inner">
                            <a class="title" href="#">Постельное белье из ранфорса TAC RANFORCE BLOSSOM бело-розовое полутороспальное</a>
                            <img src="images/test-item.jpg" width="149" height="96">
                            <div class="price">
                                <span>15 840</span>
                                <a href="#" class="btn btn-info btn-buy">Купить</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="inner">
                            <a class="title" href="#">Постельное белье из ранфорса TAC RANFORCE BLOSSOM бело-розовое полутороспальное</a>
                            <img src="images/test-item.jpg" width="149" height="96">
                            <div class="price">
                                <span>15 840</span>
                                <a href="#" class="btn btn-info btn-buy">Купить</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="inner">
                            <a class="title" href="#">Постельное белье из ранфорса TAC RANFORCE BLOSSOM бело-розовое полутороспальное</a>
                            <img src="images/test-item.jpg" width="149" height="96">
                            <div class="price">
                                <span>15 840</span>
                                <a href="#" class="btn btn-info btn-buy">Купить</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="inner">
                            <a class="title" href="#">Постельное белье из ранфорса TAC RANFORCE BLOSSOM бело-розовое полутороспальное</a>
                            <img src="images/test-item.jpg" width="149" height="96">
                            <div class="price">
                                <span>15 840</span>
                                <a href="#" class="btn btn-info btn-buy">Купить</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="inner">
                            <a class="title" href="#">Постельное белье из ранфорса TAC RANFORCE BLOSSOM бело-розовое полутороспальное</a>
                            <img src="images/test-item.jpg" width="149" height="96">
                            <div class="price">
                                <span>15 840</span>
                                <a href="#" class="btn btn-info btn-buy">Купить</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="inner">
                            <a class="title" href="#">Постельное белье из ранфорса TAC RANFORCE BLOSSOM бело-розовое полутороспальное</a>
                            <img src="images/test-item.jpg" width="149" height="96">
                            <div class="price">
                                <span>15 840</span>
                                <a href="#" class="btn btn-info btn-buy">Купить</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="inner">
                            <a class="title" href="#">Постельное белье из ранфорса TAC RANFORCE BLOSSOM бело-розовое полутороспальное</a>
                            <img src="images/test-item.jpg" width="149" height="96">
                            <div class="price">
                                <span>15 840</span>
                                <a href="#" class="btn btn-info btn-buy">Купить</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="inner">
                            <a class="title" href="#">Постельное белье из ранфорса TAC RANFORCE BLOSSOM бело-розовое полутороспальное</a>
                            <img src="images/test-item.jpg" width="149" height="96">
                            <div class="price">
                                <span>15 840</span>
                                <a href="#" class="btn btn-info btn-buy">Купить</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="items grid-block newest">
                    <h2 class="wget-name">Новинки</h2>
                    <div class="item">
                        <div class="inner">
                            <a class="title" href="#">Постельное белье из ранфорса TAC RANFORCE BLOSSOM бело-розовое полутороспальное</a>
                            <img src="images/test-item.jpg" width="149" height="96">
                            <div class="price">
                                <span>15 840</span>
                                <a href="#" class="btn btn-info btn-buy">Купить</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="inner">
                            <a class="title" href="#">Постельное белье из ранфорса TAC RANFORCE BLOSSOM бело-розовое полутороспальное</a>
                            <img src="images/test-item.jpg" width="149" height="96">
                            <div class="price">
                                <span>15 840</span>
                                <a href="#" class="btn btn-info btn-buy">Купить</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="inner">
                            <a class="title" href="#">Постельное белье из ранфорса TAC RANFORCE BLOSSOM бело-розовое полутороспальное</a>
                            <img src="images/test-item.jpg" width="149" height="96">
                            <div class="price">
                                <span>15 840</span>
                                <a href="#" class="btn btn-info btn-buy">Купить</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="inner">
                            <a class="title" href="#">Постельное белье из ранфорса TAC RANFORCE BLOSSOM бело-розовое полутороспальное</a>
                            <img src="images/test-item.jpg" width="149" height="96">
                            <div class="price">
                                <span>15 840</span>
                                <a href="#" class="btn btn-info btn-buy">Купить</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="inner">
                            <a class="title" href="#">Постельное белье из ранфорса TAC RANFORCE BLOSSOM бело-розовое полутороспальное</a>
                            <img src="images/test-item.jpg" width="149" height="96">
                            <div class="price">
                                <span>15 840</span>
                                <a href="#" class="btn btn-info btn-buy">Купить</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="inner">
                            <a class="title" href="#">Постельное белье из ранфорса TAC RANFORCE BLOSSOM бело-розовое полутороспальное</a>
                            <img src="images/test-item.jpg" width="149" height="96">
                            <div class="price">
                                <span>15 840</span>
                                <a href="#" class="btn btn-info btn-buy">Купить</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="inner">
                            <a class="title" href="#">Постельное белье из ранфорса TAC RANFORCE BLOSSOM бело-розовое полутороспальное</a>
                            <img src="images/test-item.jpg" width="149" height="96">
                            <div class="price">
                                <span>15 840</span>
                                <a href="#" class="btn btn-info btn-buy">Купить</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="inner">
                            <a class="title" href="#">Постельное белье из ранфорса TAC RANFORCE BLOSSOM бело-розовое полутороспальное</a>
                            <img src="images/test-item.jpg" width="149" height="96">
                            <div class="price">
                                <span>15 840</span>
                                <a href="#" class="btn btn-info btn-buy">Купить</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info grid-block">
                    <h2 class="wget-name">о компании</h2>
                    <p>Интернет-магазин основан в 1998 году. официальным днем открытия магазина  Приказчик слушал и улыбался, желая<br/> запомнить для употребления сколько можно больше из умных разговоров. А мы были два ненавидящих друг друга <br/>колодника, связанных одной цепью, отравляющие жизнь друг другу и старающиеся не видать этого. <br/><br/>Я еще не знал тогда, что 0,99 супружеств живут в таком же аду, как и я жил, и что это не может быть иначе. Тогда я еще не знал этого ни про других, ни про себя.<br/><br/> А мы были два ненавидящих друг друга колодника, связанных одной цепью, отравляющие жизнь друг другу и старающиеся не видать этого.</p>
                </div>
            </div>
        </div>
    </div> <!-- content -->
    <div class="row footer">
        <div class="container">
            <div class="col-md-4">
                <img src="images/logotype-footer.png" width="220" height="115">
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
                        <li><a href="#">Вакансии</a></li>
                        <li><a href="#">Реквизиты</a></li>
                        <li><a href="#">О компании</a></li>
                    </ul>
                    <ul>
                        <li class="heading">Помощь</li>
                        <li><a href="#">Как сделать заказ</a></li>
                        <li><a href="#">Доставка</a></li>
                        <li><a href="#">Оплата</a></li>
                        <li><a href="#">Гарантии</a></li>
                        <li><a href="#">Помощь</a></li>
                    </ul>
                    <ul>
                        <li class="heading">Обратная связь</li>
                        <li><a href="#">Зарабатывайте с нами</a></li>
                        <li><a href="#">Продавайте Ваши товары</a></li>
                        <li><a href="#">Зарабатывайте на партнерской программе</a></li>
                        <li><a href="#">Размещайте рекламу</a></li>
                        <li><a href="#">Открывайте пункты выдачи заказов</a></li>
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
            <a href="#">Обратная связь</a>
        </div>
        <div class="widgets">
            <div class="compare">
                <p>В сравнение</p>
                <span class="badge">0</span>
            </div>
            <div class="bookmarks">
                <p>Закладки</p>
                <span class="badge">2</span>
            </div>
            <div class="cart">
                <p>Корзина</p>
                <span class="badge">0</span>
                <i>88 540</i>
                <a href="#" class="btn btn-transparent">оформить</a>
            </div>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!--<script src="js/bootstrap.min.js"></script>-->
<script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/carousel.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/app.js"></script>
</body>
</html>