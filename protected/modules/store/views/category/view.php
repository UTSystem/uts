<?php

/**
 * Category view
 * @var $this CategoryController
 * @var $model StoreCategory
 * @var $provider CActiveDataProvider
 * @var $categoryAttributes
 */

// Set meta tags
$this->pageTitle = ($this->model->meta_title) ? $this->model->meta_title : $this->model->name;
$this->pageKeywords = $this->model->meta_keywords;
$this->pageDescription = $this->model->meta_description;

// Create breadcrumbs
$ancestors = $this->model->excludeRoot()->ancestors()->findAll();

foreach($ancestors as $c)
	$this->breadcrumbs[$c->name] = $c->getViewUrl();

$this->breadcrumbs[] = $this->model->name;

?>

<style>
.right-column .items.grid-block .item .price input{
    font-size: 13px;
    font-weight: 300;
    line-height: 13px;
    margin-top: 19px;
    text-transform: none;
}
</style>

<div class="category-list">
</div>

<div class="filter-constructor">
	<div class="controls">
		<div class="right">
			<span>Показывать</span>
			<a <?php if($itemView==='_product') echo 'class="active"'; ?> href="<?php echo Yii::app()->request->removeUrlParam('/store/category/view', 'view') ?>"><span class="icon dots"></span>Картинками</a>
			<a <?php if($itemView==='_product_wide') echo 'class="active"'; ?> href="<?php echo Yii::app()->request->addUrlParam('/store/category/view',  array('view'=>'wide')) ?>"><span class="icon lines"></span>Списком</a>
		</div>
	</div>
</div>

<div class="items grid-block custom-grid <?php if($itemView==='_product_wide') echo 'custom-grid-list'; ?>">
	<?php
		$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$provider,
			'ajaxUpdate'=>false,
			'template'=>'{items}</div></div>{pager}</nav>',
			'itemView'=>$itemView,
			'sortableAttributes'=>array(
				'name', 'price'
			),
			'pagerCssClass' => 'pagi',
			'pager'=> array(     
				
				'header' => '<nav>',
				'firstPageLabel' => 'Первая страница&#160;',
				'lastPageLabel' => 'Последняя страница&#160;',
				'prevPageLabel' => 'Предыдущая&#160;',
				'nextPageLabel' => 'Следующая&#160;',
				'maxButtonCount' => 10,
				
				'firstPageCssClass'=>'',//default "first"
				'lastPageCssClass'=>'',//default "last"
				'previousPageCssClass'=>'pager_previous',//default "previours"
				'nextPageCssClass'=>'pager_next',//default "next"
				'internalPageCssClass'=>'page',//default "page"
				'selectedPageCssClass'=>'page disabled',//default "selected"
				'hiddenPageCssClass'=>'disabled',//default "hidden"        
				
				'htmlOptions' => array(
					'class' => 'pagination'
				),
				'footer' => '</nav>',	
			),
		));
	?>
</div>