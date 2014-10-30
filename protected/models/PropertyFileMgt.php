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
        $data = self::draw_data();
        $query_arr_1_total = 0;
        foreach($query_arr_1 as $i)
        {
            $c = isset($data[$i])?$data[$i]:0;
            $query_arr_1_total += $c;
        }

        //Duplex 叠拼屋
        $query_arr_2 = array(33,34,35,47,49);
        $query_arr_2_total = 0;
        foreach($query_arr_2 as $i)
        {
            $c = isset($data[$i])?$data[$i]:0;
            $query_arr_2_total += $c;
        }

        //Townhouse 联排别墅
        $query_arr_3 = array(39,57);
        $query_arr_3_total = 0;
        foreach($query_arr_3 as $i)
        {
            $c = isset($data[$i])?$data[$i]:0;
            $query_arr_3_total += $c;
        }

        //Condo 公寓
        $query_arr_4 = array(30,54,58,59);
        $query_arr_4_total = 0;
        foreach($query_arr_4 as $i)
        {
            $c = isset($data[$i])?$data[$i]:0;
            $query_arr_4_total += $c;
        }
        //Agricultural 农业用地
        $query_arr_5 = '100-199';
        $query_arr_5_total = 0;
        foreach($data as $k=>$v)
        {
            if($k>=100 && $k<=199)
                 $query_arr_5_total += $v;
        }
        //Industrial and commercial 工商业用地
        $query_arr_6 = '200-299,400-499';
        $query_arr_6_total = 0;
        foreach($data as $k=>$v)
        {
            if(($k>=200 && $k<=299) || ($k>=400 && $k<=499))
                $query_arr_6_total += $v;
        }


        //Public Work 市政用地
        $query_arr_7 = '500-699';
        $query_arr_7_total = 0;
        foreach($data as $k=>$v)
        {
            if($k>=500 && $k<=699)
                $query_arr_5_total += $v;
        }
        //其它住宅用地
        $query_arr_8 = '0-99';
        $query_arr_8_total = 0;
        foreach($data as $k=>$v)
        {
            if($k>=0 && $k<=99)
                $query_arr_8_total += $v;
        }
        $query_arr_8_total = $query_arr_8_total-$query_arr_4_total-$query_arr_3_total-$query_arr_2_total-$query_arr_1_total;

        //其他用途
        $query_arr_9_total = $data['999999']-$query_arr_8_total-$query_arr_7_total-$query_arr_6_total-$query_arr_5_total-$query_arr_4_total-$query_arr_3_total-$query_arr_2_total-$query_arr_1_total;

        $result = array(
            'House'=>$query_arr_1_total,
            'Duplex'=>$query_arr_2_total,
            'Townhouse'=>$query_arr_3_total,
            'Condo'=>$query_arr_4_total,
            'Agricultural'=>$query_arr_5_total,
            'Industrial'=>$query_arr_6_total,
            'Public Work'=>$query_arr_7_total,
            'Other House'=>$query_arr_8_total,
//            'Other'=>$query_arr_9_total,
        );

        if(count($result)>5)
        {

            $tmp = array_flip($result);
            krsort($tmp);

            $i = 0;
            $result_n = array();
            $total = $data['999999'];
            foreach($tmp as $k=>$v)
            {
                if($i<5){
                    $total -= $k;
                    $result_n[$k] = $v;
                }

                $i++;
            }
            $result_n = array_flip($result_n);
            $result_n['other'] = $total;
        }else{
            $result_n = $result;
        }

        return $result_n;
    }

    /**
     * 年龄分布
     */
    public static function AGEDISTRIBUTION()
    {
        $data = self::draw_data('year_improvement_built');
        $year_n = date('Y');
        $builddata = array();
        $builddata['all new'] = $builddata['new']= $builddata['half new'] = $builddata['old'] =0;
        foreach($data as $k=>$v)
        {
            if($k>=$year_n)
            {
                $builddata['all new'] += $v;
            }else if($k>=($year_n-10))
            {
                $builddata['new'] += $v;
            }else if($k<($year_n-11) && $k>=($year_n-30))
            {
                $builddata['half new'] += $v;
            }else if($k<($year_n-30))
            {
                $builddata['old'] += $v;
            }
        }
        return $builddata;
    }

    /**
     * 房屋面积分布
     * Home Size in Sq. Ft.
     */
    public static function HomeSizeinSqFt()
    {
        $data = self::draw_data('total_finished_area');
        unset($data['999999']);
        $sqsize = array_keys($data);
        $totalsize = max($sqsize);
        $totalnum = count($sqsize);
        $avg_size =  ceil(($totalsize-$totalsize*0.1)/7);

        $result = array();
        for($i=0;$i<8;$i++)
        {
            $compsizemin = $avg_size*$i;
            $compsizemax = $compsizemin + $avg_size;

            foreach($data as $k=>$v)
            {
//                $v = number_format($v/$totalnum,2);
                if($k<=$compsizemax && $k>$compsizemin)
                {
                    if($i==0)
                        $compsizemin = 'less';
                    else if($i==7)
                        $compsizemax = 'more';
                    if(!isset($result[$compsizemin.'-'.$compsizemax]))
                        $result[$compsizemin.'-'.$compsizemax] = 0;
                    $result[$compsizemin.'-'.$compsizemax] += $v;
                }
            }
        }


        return array('keys'=>implode("','",array_keys($result)),'vals'=>implode(",",array_values($result)));
    }

    /**
     * 首页图表 查数据库
     */
    public static function draw_data($fild='actualusecode')
    {
        $key = self::tableName().'_'.$fild;
        $cacheData = Yii::app()->cache->get($key);
//        $cacheData = array();
        $total = 0;
        if(!$cacheData)
        {
            $sql = "SELECT ".$fild.",count(*) as acount FROM ".self::tableName()." where ".$fild."!='' group by ".$fild;
            $command = Yii::app()->db->createCommand($sql);
            $sqldata = $command->queryAll();
            $cacheData = array();
            foreach($sqldata as $k=>$v)
            {
                $cacheData[$v[$fild]] = $v['acount'];
                $total += $v['acount'];
            }
            $cacheData['999999'] = $total;
            Yii::app()->cache->set($key, $cacheData,86400);
        }
        return $cacheData;
    }
}