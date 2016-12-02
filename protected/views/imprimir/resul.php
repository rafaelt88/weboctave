<?php
if( !isset(Yii::app()->user->OUT) )	return;

Yii::createComponent('application.extensions.MPDF54.mpdf');
date_default_timezone_set('America/Caracas');

$pdf = new mPDF('UTF-8', 'LETTER');
$pdf->SetFontSize('Arial','12');
$pdf->SetAuthor('Rafael J Torres');
$pdf->SetTitle(Yii::app()->name);
$pdf->SetSubject(Yii::app()->user->name);
$pdf->SetKeywords(date("d-M-Y H:i:s"));

$aux = preg_split('/(<div align=center>|<\/div>)/',Yii::app()->user->OUT);

foreach( $aux as $it ){
	$temp = preg_split('/(<img src=..\/|width=600 height=600\/>)/',$it);
	if( count($temp) > 1 ){
		$pdf->imagen = file_get_contents($temp[1]);
		$pdf->Image('var: imagen',0,0);
	}
	else
		$pdf->WriteHTML(preparePreText($temp[0]));
}

$pdf->Output('assets/temp/resul.pdf','F');
?>

<embed src='/assets/temp/resul.pdf#view=FitH&toolbar=1' width='870' height='470'/>