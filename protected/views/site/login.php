<h1>Entrar a su cuenta</h1>

<div class="form" align="center">
	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
					'validateOnSubmit'=>true,
			),
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>

	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Acceso'); ?>
	</div>

	<?php $this->endWidget(); ?>
</div>
<!-- form -->

<p>
	Si no estás registrado, puede
	<?php echo CHtml::link("Registrarse Ahora", array('/usuario/create')); ?>.
</p>
