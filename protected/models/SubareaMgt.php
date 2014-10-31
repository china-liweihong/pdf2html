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
        foreach($sqldata as $row)
        {

            $data[$row->area_id][] = $row->code;
        }
        return $data;
    }
} 