<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate(){

		$model = Usuario::model()->findByAttributes(array('nick'=>$this->username));

		if( !isset($model) )
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif( $model->pass != $this->password )
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else{
			$this->errorCode=self::ERROR_NONE;
			Yii::app()->user->setState('ID', $model->Id);
			Yii::app()->user->setState('text', '');
			Yii::app()->user->setState('name', $model->name);
		}
		return !$this->errorCode;
	}
}