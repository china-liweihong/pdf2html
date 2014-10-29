<?php
/**
 * Created by PhpStorm.
 * User: living
 * Date: 14-10-29
 * Time: 下午3:58
 */
class PropertyFileMgt extends PropertyFile{

    /**
     * 首页图表
     */
    public static function draw_housing_type()
    {
        //House 独立屋
        $query_arr_1 = array(0,32,60);
        echo  self::draw_data($query_arr_1);
exit;
        //Duplex 叠拼屋
        $query_arr_2 = array(33,34,35,47,49);
        //Townhouse 联排别墅
        $query_arr_3 = array(39,57);
        //Condo 公寓
        $query_arr_4 = array(30,54,58,59);
        //Agricultural 农业用地
        $query_arr_5 = '100-199';

    }
    /**
     * 首页图表 查数据库
     */
    public static function draw_data($actualusecode)
    {
        $querystr = '';
        if(is_array($query_arr))
        {
            $querystr = '('.implode(",",$query_arr).')';
        }
        $where = 'actualusecode in '.$querystr;
        $count = PropertyFile::model()->count($where);
        return $count;
    }
}