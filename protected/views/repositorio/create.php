<h1>Guardar en Repositorio</h1>

<div class="art-postmetadataheader">
	<div class="form" align="center">

		<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'repositorio-form',
				'enableAjaxValidation'=>false,
)); ?>

		<?php 
		$model->setAttribute('UsuarioId', Yii::app()->user->ID);
		$model->setAttribute('date', date('Y-m-d'));
		$model->setAttribute('text', Yii::app()->user->TEXT);
		?>

		<div class="row">
			<?php echo $form->hiddenField($model,'UsuarioId'); ?>
			<?php echo $form->error($model,'UsuarioId'); ?>
		</div>

		<div class="row">
			<?php echo $form->hiddenField($model,'date'); ?>
			<?php echo $form->error($model,'date'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'title'); ?>
			<?php echo $form->textField($model,'title',array('size'=>15,'maxlength'=>15)); ?>
			<?php echo $form->error($model,'title'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'text'); ?>
			<?php echo $form->textArea($model,'text',array('rows'=>8, 'cols'=>105)); ?>
			<?php echo $form->error($model,'text'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton('Guardar'); ?>
		</div>

		<?php $this->endWidget(); ?>

	</div>
</div>
