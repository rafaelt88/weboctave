<h1>Registro de Usuario</h1>

<?php // echo $this->renderPartial('_form', array('model'=>$model));?>

<div class="wide form create-form">

	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'usuario-form',
			'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nick'); ?>
		<?php echo $form->textField($model,'nick',array('size'=>40,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'nick'); ?>
		</div>
	<div class="row">
		<?php echo $form->labelEx($model,'pass'); ?>
		<?php echo $form->passwordField($model,'pass',array('size'=>40,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'pass'); ?>		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'conf_pass'); ?>
		<?php echo $form->passwordField($model,'conf_pass',array('size'=>40,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'conf_pass'); ?>		
	</div>	
	
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>40,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>40,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'OcupacionId'); ?>
		<?php echo $form->dropDownList($model, 'OcupacionId', CHtml::listData(Ocupacion::model()->findAll(),'Id','name'),array('empty'=>'')); ?>
		<?php echo $form->error($model,'OcupacionId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'InstitutoId'); ?>
		<?php echo $form->dropDownList($model, 'InstitutoId', CHtml::listData(Instituto::model()->findAll(),'Id','name'),array('empty'=>'')); ?>
		<?php echo $form->error($model,'InstitutoId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Registrar'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div>
<!-- form -->
