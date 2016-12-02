<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $Id
 * @property string $nick
 * @property string $pass
 * @property string $name
 * @property string $email
 * @property integer $OcupacionId
 * @property integer $InstitutoId
 *
 * The followings are the available model relations:
 * @property Repositorio[] $repositorios
 * @property Instituto $instituto
 * @property Ocupacion $ocupacion
 */
class Usuario extends CActiveRecord
{
	
	public $conf_pass;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nick, pass, name, ,email, OcupacionId, InstitutoId', 'required', 'message'=>'"{attribute}" no puede ir en blanco.'),
			array('OcupacionId, InstitutoId', 'numerical', 'integerOnly'=>true),
			array('nick, pass, conf_pass', 'length', 'min'=>6, 'max'=>15),
			array('conf_pass', 'compare', 'compareAttribute'=>'pass', 'message'=>'La contrase�a no coincide con la anterior.'),
			array('name', 'length', 'max'=>30),
			array('email', 'length', 'max'=>45),
			array('email', 'email', 'message'=>'El "{attribute}" no cumple con el formato adecuado.'),
			array('nick, email', 'unique', 'message'=>'El "{attribute}" ya est� registrado en el sistema.'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, nick, pass, name, email, OcupacionId, InstitutoId', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'repositorios' => array(self::HAS_MANY, 'Repositorio', 'UsuarioId'),
			'instituto' => array(self::BELONGS_TO, 'Instituto', 'InstitutoId'),
			'ocupacion' => array(self::BELONGS_TO, 'Ocupacion', 'OcupacionId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'nick' => 'Usuario',
			'pass' => 'Contraseña',
			'conf_pass' => 'Confirmación de Contraseña',
			'name' => 'Nombre y Apellido',
			'email' => 'Correo Electrónico',
			'OcupacionId' => 'Ocupación',
			'InstitutoId' => 'Instituto',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('Id',$this->Id);
		$criteria->compare('nick',$this->nick,true);
		$criteria->compare('pass',$this->pass,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('OcupacionId',$this->OcupacionId);
		$criteria->compare('InstitutoId',$this->InstitutoId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}