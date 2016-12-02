<h1>Abrir desde su disco</h1>

<div class="form" align="center">
	<form name="f" target="#" method="post">
		<div class="row">
			<?php echo CHtml::encode('Selecione el código que desea abrir.');?>
		</div>
		<div class="row">
			<?php echo CHtml::fileField('path','');?>
		</div>
		<div class="row buttons">
			<span class="art-button-wrapper"> <span class="l"></span><span
				class="r"></span><a class="art-button"
				href="javascript:document.f.submit()">Calcular</a>
			</span>
		</div>
	</form>
</div>

