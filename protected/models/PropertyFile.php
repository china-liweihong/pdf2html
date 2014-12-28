<?php

/**
 * This is the model class for table "{{propertyfile}}".
 *
 * The followings are the available columns in table '{{propertyfile}}':
 * @property string $id
 * @property string $neighborhood_id
 * @property string $zoning_id
 * @property string $manual_class
 * @property string $land_use_id
 * @property string $actual_land_use_id
 * @property string $formatted_legal_desc
 * @property string $roll_num
 * @property string $num_of_owners
 * @property string $owner_1_name_1
 * @property string $owner_1_name_2
 * @property string $owner_1_addr_l1
 * @property string $owner_1_addr_l2
 * @property string $owner_1_addr_l3
 * @property string $owner_1_addr_l4
 * @property string $owner_1_addr_l5
 * @property string $owner_1_addr_l6
 * @property string $owner_1_zip_code
 * @property string $owner_2_name_1
 * @property string $owner_2_name_2
 * @property string $owner_2_addr_l1
 * @property string $owner_2_addr_l2
 * @property string $owner_2_addr_l3
 * @property string $owner_2_addr_l4
 * @property string $owner_2_addr_l5
 * @property string $owner_2_addr_l6
 * @property string $owner_2_zip_code
 * @property string $extra_pid_2
 * @property string $extra_pid_3
 * @property string $extra_pid_4
 * @property string $extra_pid_5
 * @property string $extra_pid_flag
 * @property integer $is_virtual
 * @property integer $school_catch_id
 * @property integer $address_id
 * @property integer $bedrooms
 * @property integer $carports
 * @property double $width
 * @property string $depth
 * @property double $lot_size
 * @property string $lot_size_desc
 * @property string $total_finished_area
 * @property string $effective_year
 * @property double $stories
 * @property string $foundation
 * @property string $full_bathrooms
 * @property string $partial_baths
 * @property string $water_connection_year
 * @property string $year_improvement_built
 * @property string $single_car_garages
 * @property string $multi_car_garage
 * @property integer $actualusecode
 */
class PropertyFile extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PropertyFile the static model class
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
		return '{{propertyfile}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('is_virtual, school_catch_id, address_id, bedrooms, carports, actualusecode', 'numerical', 'integerOnly'=>true),
			array('width, lot_size, stories', 'numerical'),
			array('id, owner_1_zip_code, owner_2_zip_code, extra_pid_2, extra_pid_3, extra_pid_4, extra_pid_5, effective_year, full_bathrooms, partial_baths, water_connection_year, year_improvement_built, single_car_garages, multi_car_garage', 'length', 'max'=>20),
			array('neighborhood_id, foundation', 'length', 'max'=>100),
			array('zoning_id, land_use_id, actual_land_use_id', 'length', 'max'=>32),
			array('manual_class, formatted_legal_desc, num_of_owners, owner_1_name_1, owner_1_name_2, owner_1_addr_l1, owner_1_addr_l2, owner_1_addr_l3, owner_1_addr_l4, owner_1_addr_l5, owner_1_addr_l6, owner_2_name_1, owner_2_name_2, owner_2_addr_l1, owner_2_addr_l2, owner_2_addr_l3, owner_2_addr_l4, owner_2_addr_l5, owner_2_addr_l6, extra_pid_flag, lot_size_desc', 'length', 'max'=>256),
			array('roll_num, total_finished_area', 'length', 'max'=>40),
			array('depth', 'length', 'max'=>80),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, neighborhood_id, zoning_id, manual_class, land_use_id, actual_land_use_id, formatted_legal_desc, roll_num, num_of_owners, owner_1_name_1, owner_1_name_2, owner_1_addr_l1, owner_1_addr_l2, owner_1_addr_l3, owner_1_addr_l4, owner_1_addr_l5, owner_1_addr_l6, owner_1_zip_code, owner_2_name_1, owner_2_name_2, owner_2_addr_l1, owner_2_addr_l2, owner_2_addr_l3, owner_2_addr_l4, owner_2_addr_l5, owner_2_addr_l6, owner_2_zip_code, extra_pid_2, extra_pid_3, extra_pid_4, extra_pid_5, extra_pid_flag, is_virtual, school_catch_id, address_id, bedrooms, carports, width, depth, lot_size, lot_size_desc, total_finished_area, effective_year, stories, foundation, full_bathrooms, partial_baths, water_connection_year, year_improvement_built, single_car_garages, multi_car_garage, actualusecode', 'safe', 'on'=>'search'),
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
            'Listing'=>array(self::HAS_MANY, 'Listing', 'pid'),
            'Address'=>array(self::BELONGS_TO,'Address','id')
        );
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'neighborhood_id' => 'Neighborhood',
			'zoning_id' => 'Zoning',
			'manual_class' => 'Manual Class',
			'land_use_id' => 'Land Use',
			'actual_land_use_id' => 'Actual Land Use',
			'formatted_legal_desc' => 'Formatted Legal Desc',
			'roll_num' => 'Roll Num',
			'num_of_owners' => 'Num Of Owners',
			'owner_1_name_1' => 'Owner 1 Name 1',
			'owner_1_name_2' => 'Owner 1 Name 2',
			'owner_1_addr_l1' => 'Owner 1 Addr L1',
			'owner_1_addr_l2' => 'Owner 1 Addr L2',
			'owner_1_addr_l3' => 'Owner 1 Addr L3',
			'owner_1_addr_l4' => 'Owner 1 Addr L4',
			'owner_1_addr_l5' => 'Owner 1 Addr L5',
			'owner_1_addr_l6' => 'Owner 1 Addr L6',
			'owner_1_zip_code' => 'Owner 1 Zip Code',
			'owner_2_name_1' => 'Owner 2 Name 1',
			'owner_2_name_2' => 'Owner 2 Name 2',
			'owner_2_addr_l1' => 'Owner 2 Addr L1',
			'owner_2_addr_l2' => 'Owner 2 Addr L2',
			'owner_2_addr_l3' => 'Owner 2 Addr L3',
			'owner_2_addr_l4' => 'Owner 2 Addr L4',
			'owner_2_addr_l5' => 'Owner 2 Addr L5',
			'owner_2_addr_l6' => 'Owner 2 Addr L6',
			'owner_2_zip_code' => 'Owner 2 Zip Code',
			'extra_pid_2' => 'Extra Pid 2',
			'extra_pid_3' => 'Extra Pid 3',
			'extra_pid_4' => 'Extra Pid 4',
			'extra_pid_5' => 'Extra Pid 5',
			'extra_pid_flag' => 'Extra Pid Flag',
			'is_virtual' => 'Is Virtual',
			'school_catch_id' => 'School Catch',
			'address_id' => 'Address',
			'bedrooms' => 'Bedrooms',
			'carports' => 'Carports',
			'width' => 'Width',
			'depth' => 'Depth',
			'lot_size' => 'Lot Size',
			'lot_size_desc' => 'Lot Size Desc',
			'total_finished_area' => 'Total Finished Area',
			'effective_year' => 'Effective Year',
			'stories' => 'Stories',
			'foundation' => 'Foundation',
			'full_bathrooms' => 'Full Bathrooms',
			'partial_baths' => 'Partial Baths',
			'water_connection_year' => 'Water Connection Year',
			'year_improvement_built' => 'Year Improvement Built',
			'single_car_garages' => 'Single Car Garages',
			'multi_car_garage' => 'Multi Car Garage',
			'actualusecode' => 'Actualusecode',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('neighborhood_id',$this->neighborhood_id,true);
		$criteria->compare('zoning_id',$this->zoning_id,true);
		$criteria->compare('manual_class',$this->manual_class,true);
		$criteria->compare('land_use_id',$this->land_use_id,true);
		$criteria->compare('actual_land_use_id',$this->actual_land_use_id,true);
		$criteria->compare('formatted_legal_desc',$this->formatted_legal_desc,true);
		$criteria->compare('roll_num',$this->roll_num,true);
		$criteria->compare('num_of_owners',$this->num_of_owners,true);
		$criteria->compare('owner_1_name_1',$this->owner_1_name_1,true);
		$criteria->compare('owner_1_name_2',$this->owner_1_name_2,true);
		$criteria->compare('owner_1_addr_l1',$this->owner_1_addr_l1,true);
		$criteria->compare('owner_1_addr_l2',$this->owner_1_addr_l2,true);
		$criteria->compare('owner_1_addr_l3',$this->owner_1_addr_l3,true);
		$criteria->compare('owner_1_addr_l4',$this->owner_1_addr_l4,true);
		$criteria->compare('owner_1_addr_l5',$this->owner_1_addr_l5,true);
		$criteria->compare('owner_1_addr_l6',$this->owner_1_addr_l6,true);
		$criteria->compare('owner_1_zip_code',$this->owner_1_zip_code,true);
		$criteria->compare('owner_2_name_1',$this->owner_2_name_1,true);
		$criteria->compare('owner_2_name_2',$this->owner_2_name_2,true);
		$criteria->compare('owner_2_addr_l1',$this->owner_2_addr_l1,true);
		$criteria->compare('owner_2_addr_l2',$this->owner_2_addr_l2,true);
		$criteria->compare('owner_2_addr_l3',$this->owner_2_addr_l3,true);
		$criteria->compare('owner_2_addr_l4',$this->owner_2_addr_l4,true);
		$criteria->compare('owner_2_addr_l5',$this->owner_2_addr_l5,true);
		$criteria->compare('owner_2_addr_l6',$this->owner_2_addr_l6,true);
		$criteria->compare('owner_2_zip_code',$this->owner_2_zip_code,true);
		$criteria->compare('extra_pid_2',$this->extra_pid_2,true);
		$criteria->compare('extra_pid_3',$this->extra_pid_3,true);
		$criteria->compare('extra_pid_4',$this->extra_pid_4,true);
		$criteria->compare('extra_pid_5',$this->extra_pid_5,true);
		$criteria->compare('extra_pid_flag',$this->extra_pid_flag,true);
		$criteria->compare('is_virtual',$this->is_virtual);
		$criteria->compare('school_catch_id',$this->school_catch_id);
		$criteria->compare('address_id',$this->address_id);
		$criteria->compare('bedrooms',$this->bedrooms);
		$criteria->compare('carports',$this->carports);
		$criteria->compare('width',$this->width);
		$criteria->compare('depth',$this->depth,true);
		$criteria->compare('lot_size',$this->lot_size);
		$criteria->compare('lot_size_desc',$this->lot_size_desc,true);
		$criteria->compare('total_finished_area',$this->total_finished_area,true);
		$criteria->compare('effective_year',$this->effective_year,true);
		$criteria->compare('stories',$this->stories);
		$criteria->compare('foundation',$this->foundation,true);
		$criteria->compare('full_bathrooms',$this->full_bathrooms,true);
		$criteria->compare('partial_baths',$this->partial_baths,true);
		$criteria->compare('water_connection_year',$this->water_connection_year,true);
		$criteria->compare('year_improvement_built',$this->year_improvement_built,true);
		$criteria->compare('single_car_garages',$this->single_car_garages,true);
		$criteria->compare('multi_car_garage',$this->multi_car_garage,true);
		$criteria->compare('actualusecode',$this->actualusecode);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}