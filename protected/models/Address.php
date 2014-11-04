<?php

/**
 * This is the model class for table "{{address}}".
 *
 * The followings are the available columns in table '{{address}}':
 * @property integer $id
 * @property string $unit
 * @property string $street_num
 * @property string $street_name
 * @property string $street_type
 * @property string $street_dir
 * @property double $longitude
 * @property double $latitude
 * @property string $postal_code
 * @property string $raw_str
 * @property string $subarea_id
 */
class Address extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Address the static model class
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
		return '{{address}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('longitude, latitude', 'numerical'),
			array('unit, street_type, street_dir, postal_code', 'length', 'max'=>20),
			array('street_num, street_name', 'length', 'max'=>100),
			array('raw_str', 'length', 'max'=>128),
			array('subarea_id', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, unit, street_num, street_name, street_type, street_dir, longitude, latitude, postal_code, raw_str, subarea_id', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'unit' => 'Unit',
			'street_num' => 'Street Num',
			'street_name' => 'Street Name',
			'street_type' => 'Street Type',
			'street_dir' => 'Street Dir',
			'longitude' => 'Longitude',
			'latitude' => 'Latitude',
			'postal_code' => 'Postal Code',
			'raw_str' => 'Raw Str',
			'subarea_id' => 'Subarea',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('unit',$this->unit,true);
		$criteria->compare('street_num',$this->street_num,true);
		$criteria->compare('street_name',$this->street_name,true);
		$criteria->compare('street_type',$this->street_type,true);
		$criteria->compare('street_dir',$this->street_dir,true);
		$criteria->compare('longitude',$this->longitude);
		$criteria->compare('latitude',$this->latitude);
		$criteria->compare('postal_code',$this->postal_code,true);
		$criteria->compare('raw_str',$this->raw_str,true);
		$criteria->compare('subarea_id',$this->subarea_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}