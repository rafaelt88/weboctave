<?php

/**
 * This is the model class for table "repositorio".
 *
 * The followings are the available columns in table 'repositorio':
 * @property integer $Id
 * @property integer $UsuarioId
 * @property string $date
 * @property string $title
 * @property string $text
 *
 * The followings are the available model relations:
 * @property Usuario $usuario
 */
class Repositorio extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Repositorio the static model class
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
		return 'repositorio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('UsuarioId, date, title, text', 'required', 'message'=>'El campo "{attribute}" no puede estar vacio.'),
				array('UsuarioId', 'numerical', 'integerOnly'=>true),
				array('title', 'length', 'max'=>15),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('Id, UsuarioId, date, title, text', 'safe', 'on'=>'search'),
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
				'usuario' => array(self::BELONGS_TO, 'Usuario', 'UsuarioId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
				'Id' => 'ID',
				'UsuarioId' => 'Usuario',
				'date' => 'Fecha',
				'title' => 'Titulo',
				'text' => 'Código',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{

		return new CActiveDataProvider($this, array(
				'criteria'=>array(
						'condition'=>'UsuarioId='.Yii::app()->user->ID,
						'order'=>'date DESC',
				),
				'pagination'=>array(
						'pageSize'=>10,
				),
		));
	}
}