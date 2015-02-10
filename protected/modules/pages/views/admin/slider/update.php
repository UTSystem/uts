<?php

/**
 * Create/update delivery methods
 */

$this->topButtons = $this->widget('admin.widgets.SAdminTopButtons', array(
	'form'=>$form,
	'langSwitcher'=>!$model->isNewRecord,
	'deleteAction'=>$this->createUrl('/pages/admin/slider/delete', array('id'=>$model->id))
));

$title = ($model->isNewRecord) ? Yii::t('PagesModule.admin', 'Создание элемента слайдера') :
	Yii::t('PagesModule.admin', 'Редактирование элемента слайдера');

$this->breadcrumbs = array(
	'Home'=>$this->createUrl('/admin'),
	Yii::t('PagesModule.admin', 'Слайды')=>$this->createUrl('index'),
	($model->isNewRecord) ? Yii::t('PagesModule.admin', 'Слайдер') :'',
);

$this->pageHeader = $title;

?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
<!-- Use padding-all class with SidebarAdminTabs -->
<div class="form wide padding-all">
	<?php //echo $form; ?>
</div>

<?php echo $this->renderPartial('_images',array('model'=>$model)); ?>

