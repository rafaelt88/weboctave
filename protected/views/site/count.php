<?php   
if( !Visitas::model()->findByAttributes(array('ip'=>$_SERVER['REMOTE_ADDR']) ) ){
	$model = new Visitas();
	$model->ip = $_SERVER['REMOTE_ADDR'];
	$model->insert();
}
echo "Numero de Visitas [ ".Visitas::model()->count()." ]";
?>