<?php
/**
 * Created by PhpStorm.
 * User: living
 * Date: 14-10-31
 * Time: 下午5:41
 */

class SubareaMgt  extends Subarea{
    /**
     * 通过code查找subarea
     */
    public static function SelectSubAreaByCode($code)
    {
        $data = array();
        $sqldata = self::model()->findAllByAttributes(array('area_id'=>$code));
        $translate = Yii::t('Translate','all') ;
        foreach($sqldata as $row)
        {
            $data_name = isset($translate[$row->code]) && $translate[$row->code]?$translate[$row->code]:$row->code;
            $data[] = array('code'=>$row->code,'data_name'=>$data_name,'label'=>$data_name,'value'=>$row->code);
        }
        return $data;
    }

    public function relations()
    {
        return array(
            'Area'=>array(self::BELONGS_TO, 'Area', 'code'),
        );
    }
} 