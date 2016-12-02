<?php

class UsuarioController extends Controller
{

	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('create'),
				'users'=>array('@'),
			),
		);
	}

	public function actionCreate()
	{
		$model=new Usuario;

//		$this->performAjaxValidation($model);

		if(isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
			if($model->save())
				$this->redirect((Yii::app()->request->baseUrl)."/site/login");
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
