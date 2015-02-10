<div class="form wide padding-all">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'people-form',
		'enableAjaxValidation'=>false,
		'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	)); ?>
	
	<div class="row field_name">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row field_name">
		<?php echo $form->labelEx($model,'caption'); ?>
		<?php echo $form->textArea($model, 'caption', array('id'=>'editor1', 'class'=>'form-control', 'rows' => "3", 'placeholder'=>"caption")); ?>
		<?php echo $form->error($model,'caption'); ?>
	</div>
	
	<?php if($model->old_name): ?>
		<p><?php echo CHtml::encode($model->old_name); ?></p>
	<?php endif; ?>

	<?php echo $form->labelEx($model,'old_name'); ?>
	<?php echo $form->fileField($model,'old_name'); ?>
	<?php echo $form->error($model,'old_name'); ?>


	<div class="form-actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

	<?php $this->endWidget(); ?>
 </div>



	


