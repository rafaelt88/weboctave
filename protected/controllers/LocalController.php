<?php
class LocalController extends Controller{

	public function actionOpen(){
		$this->render('open');
	}
	
	public function actionsave(){
		$this->render('save');
	}
	
}