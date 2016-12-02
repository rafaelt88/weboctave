<?php
class ImprimirController extends Controller{

	public function actionCode(){
		$this->render('code');
	}
	
	public function actionResul(){
		$this->render('resul');
	}
	
}