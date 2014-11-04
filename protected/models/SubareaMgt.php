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
            $data[] = array('code'=>$row->code,'data_name'=>$translate[$row->code]);
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