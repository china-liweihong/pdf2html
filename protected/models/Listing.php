<?php

/**
 * This is the model class for table "{{listing}}".
 *
 * The followings are the available columns in table '{{listing}}':
 * @property string $sysid
 * @property string $mls_code
 * @property string $st
 * @property string $pid
 * @property string $broker_recip_flag
 * @property string $publish_listing_on_internet
 * @property integer $images
 * @property string $board_id
 * @property double $list_price
 * @property double $orig_price
 * @property string $list_date
 * @property string $exp_date
 * @property integer $fire_places
 * @property integer $full_baths
 * @property integer $half_baths
 * @property integer $total_baths
 * @property integer $total_bedroom
 * @property double $total_floor_area
 * @property double $floor_area_main
 * @property double $floor_area_above_main
 * @property double $floor_area_below_main
 * @property double $floor_area_basement
 * @property double $floor_area_unfinished
 * @property string $locker
 * @property integer $units_in_dev
 * @property double $strata_maint_fee
 * @property string $mgt_co_name
 * @property string $view
 * @property string $view_specify
 * @property string $rltr_remarks
 * @property string $public_remarks
 * @property string $sold_date
 * @property double $frontage
 * @property string $depth
 * @property double $lot_size
 * @property string $last_img_trans_date
 * @property string $last_trans_code
 * @property string $last_trans_date
 * @property string $zoning_id
 */
class Listing extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Listing the static model class
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
		return '{{listing}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sysid, last_trans_code', 'required'),
			array('images, fire_places, full_baths, half_baths, total_baths, total_bedroom, units_in_dev', 'numerical', 'integerOnly'=>true),
			array('list_price, orig_price, total_floor_area, floor_area_main, floor_area_above_main, floor_area_below_main, floor_area_basement, floor_area_unfinished, strata_maint_fee, frontage, lot_size', 'numerical'),
			array('sysid, mls_code, pid, locker', 'length', 'max'=>20),
			array('st, broker_recip_flag, publish_listing_on_internet, view', 'length', 'max'=>8),
			array('board_id', 'length', 'max'=>256),
			array('mgt_co_name, view_specify', 'length', 'max'=>100),
			array('depth', 'length', 'max'=>80),
			array('last_trans_code', 'length', 'max'=>40),
			array('zoning_id', 'length', 'max'=>32),
			array('list_date, exp_date, rltr_remarks, public_remarks, sold_date, last_img_trans_date, last_trans_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('sysid, mls_code, st, pid, broker_recip_flag, publish_listing_on_internet, images, board_id, list_price, orig_price, list_date, exp_date, fire_places, full_baths, half_baths, total_baths, total_bedroom, total_floor_area, floor_area_main, floor_area_above_main, floor_area_below_main, floor_area_basement, floor_area_unfinished, locker, units_in_dev, strata_maint_fee, mgt_co_name, view, view_specify, rltr_remarks, public_remarks, sold_date, frontage, depth, lot_size, last_img_trans_date, last_trans_code, last_trans_date, zoning_id', 'safe', 'on'=>'search'),
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
            'PropertyFile'=>array(self::BELONGS_TO,'PropertyFile','pid')
        );
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'sysid' => 'Sysid',
			'mls_code' => 'Mls Code',
			'st' => 'St',
			'pid' => 'Pid',
			'broker_recip_flag' => 'Broker Recip Flag',
			'publish_listing_on_internet' => 'Publish Listing On Internet',
			'images' => 'Images',
			'board_id' => 'Board',
			'list_price' => 'List Price',
			'orig_price' => 'Orig Price',
			'list_date' => 'List Date',
			'exp_date' => 'Exp Date',
			'fire_places' => 'Fire Places',
			'full_baths' => 'Full Baths',
			'half_baths' => 'Half Baths',
			'total_baths' => 'Total Baths',
			'total_bedroom' => 'Total Bedroom',
			'total_floor_area' => 'Total Floor Area',
			'floor_area_main' => 'Floor Area Main',
			'floor_area_above_main' => 'Floor Area Above Main',
			'floor_area_below_main' => 'Floor Area Below Main',
			'floor_area_basement' => 'Floor Area Basement',
			'floor_area_unfinished' => 'Floor Area Unfinished',
			'locker' => 'Locker',
			'units_in_dev' => 'Units In Dev',
			'strata_maint_fee' => 'Strata Maint Fee',
			'mgt_co_name' => 'Mgt Co Name',
			'view' => 'View',
			'view_specify' => 'View Specify',
			'rltr_remarks' => 'Rltr Remarks',
			'public_remarks' => 'Public Remarks',
			'sold_date' => 'Sold Date',
			'frontage' => 'Frontage',
			'depth' => 'Depth',
			'lot_size' => 'Lot Size',
			'last_img_trans_date' => 'Last Img Trans Date',
			'last_trans_code' => 'Last Trans Code',
			'last_trans_date' => 'Last Trans Date',
			'zoning_id' => 'Zoning',
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

		$criteria->compare('sysid',$this->sysid,true);
		$criteria->compare('mls_code',$this->mls_code,true);
		$criteria->compare('st',$this->st,true);
		$criteria->compare('pid',$this->pid,true);
		$criteria->compare('broker_recip_flag',$this->broker_recip_flag,true);
		$criteria->compare('publish_listing_on_internet',$this->publish_listing_on_internet,true);
		$criteria->compare('images',$this->images);
		$criteria->compare('board_id',$this->board_id,true);
		$criteria->compare('list_price',$this->list_price);
		$criteria->compare('orig_price',$this->orig_price);
		$criteria->compare('list_date',$this->list_date,true);
		$criteria->compare('exp_date',$this->exp_date,true);
		$criteria->compare('fire_places',$this->fire_places);
		$criteria->compare('full_baths',$this->full_baths);
		$criteria->compare('half_baths',$this->half_baths);
		$criteria->compare('total_baths',$this->total_baths);
		$criteria->compare('total_bedroom',$this->total_bedroom);
		$criteria->compare('total_floor_area',$this->total_floor_area);
		$criteria->compare('floor_area_main',$this->floor_area_main);
		$criteria->compare('floor_area_above_main',$this->floor_area_above_main);
		$criteria->compare('floor_area_below_main',$this->floor_area_below_main);
		$criteria->compare('floor_area_basement',$this->floor_area_basement);
		$criteria->compare('floor_area_unfinished',$this->floor_area_unfinished);
		$criteria->compare('locker',$this->locker,true);
		$criteria->compare('units_in_dev',$this->units_in_dev);
		$criteria->compare('strata_maint_fee',$this->strata_maint_fee);
		$criteria->compare('mgt_co_name',$this->mgt_co_name,true);
		$criteria->compare('view',$this->view,true);
		$criteria->compare('view_specify',$this->view_specify,true);
		$criteria->compare('rltr_remarks',$this->rltr_remarks,true);
		$criteria->compare('public_remarks',$this->public_remarks,true);
		$criteria->compare('sold_date',$this->sold_date,true);
		$criteria->compare('frontage',$this->frontage);
		$criteria->compare('depth',$this->depth,true);
		$criteria->compare('lot_size',$this->lot_size);
		$criteria->compare('last_img_trans_date',$this->last_img_trans_date,true);
		$criteria->compare('last_trans_code',$this->last_trans_code,true);
		$criteria->compare('last_trans_date',$this->last_trans_date,true);
		$criteria->compare('zoning_id',$this->zoning_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}



    /**
     * 搜索
     */
    public static function getSearchList()
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition('st="A"');
        $criteria->select = 't.*';
        $criteria->order = 'list_date asc';
        $criteria->limit = 3;
        $sqlData = self::model()->findAll($criteria);
        $cacheData = array();
        foreach($sqlData as $i)
        {
            $arr = $i->attributes;
            $cacheData[] = $arr;
        }
        return $cacheData;
    }


}