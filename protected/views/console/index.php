<?php
$this->pageTitle=Yii::app()->name . ' - Web Octave';
?>
<div class="art-postmetadataheader">                         
	<div class="form" align="center">
		<form name="f" action="" method="post">
			<div class="row">
				<textarea cols=105 rows=15 name="input"><?php
					if( isset($_REQUEST['input']) )
						echo $_REQUEST['input'];
					else
						if( isset(Yii::app()->user->TEXT) )
						echo Yii::app()->user->TEXT;
					else
						include("blank.m");
					?></textarea>
			</div>
			<hr>
			<div class="row buttons">
				<span class="art-button-wrapper"> <span class="l"></span><span
					class="r"></span><a class="art-button"
					href="javascript:document.f.submit()">Calcular</a>
				</span>
			</div>
	
		</form>
	</div>
</div>
<?php	require_once("process.php");	?>