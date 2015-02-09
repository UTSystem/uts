<?php

/**
 * Site start view
  $this->widget('application.modules.store.widgets.SAttributesTableRenderer', array(
 *        // SProduct model
 *        'model'=>$model,
 *         // Optional. Html table attributes.
 *        'htmlOptions'=>array('class'=>'...', 'id'=>'...', etc...)
 *    ));
 */
 
?>
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
				<img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/images/banner/banner2.jpg" alt="...">
				<div class="carousel-caption">
					В честь торжественного открытия нашего магазина <a href="#">скидка на ножи 20%</a>
				</div>
			</div>
			<div class="item">
				<img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/images/banner/banner.gif" alt="...">
				<div class="carousel-caption">
					В честь торжественного открытия нашего магазина <a href="#">скидка на ножи 20%</a>
				</div>
			</div>
			<div class="item">
				<img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/images/banner/banner3.jpg" alt="...">
				<div class="carousel-caption">
					В честь торжественного открытия нашего магазина <a href="#">скидка на ножи 20%</a>
				</div>
			</div>
			<div class="item">
				<img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/images/banner/banner4.jpg" alt="...">
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
<div class="category">
<?php

// Create jstree to filter products
$this->widget('application.modules.store.widgets.SCategoryRender', array(
	'id'=>'SCategoryRender',
	'data'=>StoreCategoryNode::fromArray(StoreCategory::model()->findAllByPk(1), array('displayCount'=>false)),
));
?>
</div>

<div class="brands">
	<h2 class="wget-name">Популярные бренды</h2>
	<ul width="100%" style="list-style-type:none; padding:0px;">
		<?php
			//$model = new StoreManufacturer('search');
			$brands = StoreManufacturer::model()->findAll();
			
			foreach($brands as $key=>$row)
			{
				echo '<li  style="float:left; padding:10px;"><img alt="'.$row->name.'" src="'.Yii::app()->theme->baseUrl.'/assets/images/brands/anabella-logo.jpg" width="114" height="30"/></li>';
			}
		?>
	</ul>
</div>