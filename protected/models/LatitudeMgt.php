<?php
/**
 * Created by PhpStorm.
 * User: living
 * Date: 14-12-28
 * Time: 下午11:28
 */
class LatitudeMgt extends Latitude{

    /**
     * 获取地图数据
     */
    public  function getMapData($searchData)
    {
        $where = 'where 1 ';
        if(isset($searchData['SubareaCode']) && $searchData['SubareaCode'])
            $where .=' and SubareaCode="'.$searchData['SubareaCode'].'"';

        if(isset($searchData['community']) && $searchData['community'])
        {
            $community_arr = explode(",",$searchData['community']);
            if(count($community_arr)>1)
            {
                $community_str = implode('","',$community_arr);
                $where .=' and sa.code in ("'.$community_str.'")';
            }else{
                $where .=' and sa.code="'.$searchData['community'].'"';
            }
        }

        if(isset($searchData['housetype']) && $searchData['housetype'])
        {
            $housetype_arr = explode(",",$searchData['housetype']);
            if(count($housetype_arr)>1)
            {
                $housetype_str = implode('","',$housetype_arr);
                $where .=' and listing.board_id in ("'.$housetype_str.'")';
            }else{
                $where .=' and listing.board_id="'.$searchData['housetype'].'"';
            }
        }

        if(isset($searchData['keyword']) && $searchData['keyword'])
            $where .=' and pf.code="'.$searchData['keyword'].'"';

        $sqldata = self::model()->findAllByAttributes($searchData);
        $translate = Yii::t('Translate','all') ;
        $result = array();
        foreach($sqldata as $row)
        {

            $result[$row['SubareaCode']][] = array('lat'=>$row->lat,'lon'=>$row->lon);
        }
        return $result;
    }
}