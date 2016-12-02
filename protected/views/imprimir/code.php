<?php
if( !isset(Yii::app()->user->TEXT) )	return;

Yii::createComponent('application.extensions.MPDF54.mpdf');
date_default_timezone_set('America/Caracas');

$pdf = new mPDF('UTF-8', 'LETTER');
$pdf->SetFontSize('Arial','12');
$pdf->SetAuthor('Rafael J Torres');
$pdf->SetTitle(Yii::app()->name);
$pdf->SetSubject(Yii::app()->user->name);
$pdf->SetKeywords(date("d-M-Y H:i:s"));
$pdf->WriteHTML(preparePreText(Yii::app()->user->TEXT));
$pdf->Output('assets/temp/code.pdf','F');
?>

<?php
	if( !preg_match("#(Windows)#",$_SERVER['HTTP_USER_AGENT'])){
		echo "<h6>Su navegador no permite visualizar archivos PDF</h6>";
		echo "<h6>Su navegador no permite visualizar archivos PDF</h6>";
		echo "Para descargar el archivo, haga click ";
		echo "<a href='/assets/temp/code.pdf' target='_blank'>AQUI</a>";
	}else
		echo "<embed src='/assets/temp/code.pdf#view=FitH&toolbar=1' width='870' height='470' border='2'/>";
?>

