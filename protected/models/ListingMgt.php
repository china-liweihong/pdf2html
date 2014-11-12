<?php
/**
 * Created by PhpStorm.
 * User: living
 * Date: 14-10-29
 * Time: 下午3:47
 */
class ListingMgt extends  Listing{



    /**
     * 记录访问历史
     * $sysid propertyfile表id
     */
    public static function recordListingHistory($sysid)
    {

        $key = 'listing';
        $listing = Tools::TCookie($key);
        $listing_arr =  explode("_",$listing);
        if(!in_array($sysid,$listing_arr))
        {

            if($listing)
            {
                $listing_arr_n =  array_slice($listing_arr,-3,2);

                $listing_str = implode("_",$listing_arr_n);
                $listing_str =$sysid.'_'.$listing_str;

            }else{
                $listing_str =$sysid;
            }
        }else{
            echo 4;
            $listing_arr_n = array();
            foreach($listing_arr as $a)
            {
                if($a != $sysid)
                    $listing_arr_n[] = $a;
            }
            $listing_str = implode("_",$listing_arr_n);
            $listing_str =$sysid.'_'.$listing_str;
        }

        Tools::TCookie($key,$listing_str);
    }

    /**
     * 搜索
     */
    public static function getSearchList($searchData,$page=1,$pagesize = 20)
    {

        $where = 'where 1 ';
        if(isset($searchData['code']) && $searchData['code'])
            $where .=' and sa.area_id="'.$searchData['code'].'"';

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

        $connection = Yii::app()->db;
        $sql = 'select DISTINCT listing.*,addr.street_name from  '.SubareaMgt::model()->tableName().'
                as sa
                LEFT JOIN '.AddressMgt::model()->tableName().' as addr on addr.subarea_id=sa.code
              join '.PropertyFileMgt::model()->tableName().' as pf on pf.address_id=addr.id
              join '.ListingMgt::tableName().' as listing on listing.pid=pf.id '.$where;
        $sql_count = 'select count(*) as count from ('.$sql.') as aaa';
        $command = $connection->createCommand($sql_count);
        $row = $command->queryRow();
        $total = $row['count'];
        $rows = array();
        $totalpages = ceil($total/$pagesize);
        if($total>0)
        {

            if($page>$totalpages)
                $page = $totalpages;
            $pstart = $pagesize*($page-1);
            $qsql = $sql.' limit '.$pstart.','.$pagesize;
            $command = $connection->createCommand($qsql);
            $rows = $command->queryAll();
        }

        $result = array('data'=>$rows,'total'=>$total,'pagesize'=>$pagesize,'totalpages'=>$totalpages,'page'=>$page);

        return $result;
    }

    /**
     * 获取搜索价格区间
     */
    public static function searchPrice()
    {
        $key = 'searchPrice';
        $cacheData = Tools::TCache($key);
        if(!$cacheData)
        {
            $sqlData = Yii::app()->db
                ->createCommand("select MIN(list_price) as minprice,MAX(list_price) as maxprice from ".self::tableName())
                ->queryRow();

            $minprice = $sqlData['minprice'];
            $maxprice = $sqlData['maxprice'];
            $avgprice = ($maxprice-$minprice)/4;
            $result = array();
            for($i=0;$i<5;$i++)
            {
                $compsizemin = $minprice*$i;
                $compsizemax = $minprice*($i+1);
                if($i==0)
                    $compsizemin = 'less';
                else if($i==4)
                    $compsizemax = 'more';
                if(!isset($result[$compsizemin.'-'.$compsizemax]))
                    $result[$compsizemin.'-'.$compsizemax] = 0;
                $result[$compsizemin.'-'.$compsizemax] = number_format($minprice*$i).'-'.number_format($minprice*($i+1));
            }
            $cacheData = $result;
            Tools::TCache($key,$cacheData,86400);
        }
        return $cacheData;
    }


    /**
     * 房型选择
     *
     */
    public static function houseTypeSelect()
    {
        $criteria = new CDbCriteria;
        $criteria->select = 'board_id';
        $criteria->group = 'board_id';
        $criteria->addCondition('st="A"');
        $sqlData = ListingMgt::model()->findAll($criteria);
        $houseType = array();
        foreach($sqlData as $item)
        {
            $houseType[$item->board_id] = $item->board_id;
        }
       return $houseType;
    }
    /**
     * 推荐房源
     */
    public static function RecommendHouse()
    {
        $key = 'RecommendHouse';
        $cacheData = Tools::TCache($key);
        if(!$cacheData)
        {
            $cacheData =  array();
            $criteria = new CDbCriteria;
            $criteria->select = 't.*';
            $criteria->addCondition('propertyFile.actualusecode<100');
            $criteria->order = 'rand()';
            $criteria->join = ' INNER JOIN '.PropertyFile::model()->tableName().' as propertyFile
                            ON t.pid = propertyFile.id';
            $criteria->limit = 3;
            $sqldata = self::model()->with('PropertyFile')->findAll($criteria);

            foreach($sqldata as $item)
            {
                $arr = $item->attributes;
                $address_id = $item->PropertyFile->address_id;
                $address = Address::model()->findByPk($address_id);
                $arr['street_name'] = $address?$address->street_name:"";
                $cacheData[] = $arr;
            }
            Tools::TCache($key,$cacheData,3600);
        }
        return $cacheData;
    }


    /**
     * 获取高端房源
     *
     */
    public function getVisitedList()
    {
        $key = 'listing';
        $listing = Tools::TCookie($key);
        $listing_arr =  str_replace("_","','",$listing);

            $cacheData =  array();
            $criteria = new CDbCriteria;
            $criteria->select = 't.*';
            $criteria->addCondition('t.sysid in (\''.$listing_arr.'\')');

            $criteria->order = 'rand()';
            $criteria->join = ' INNER JOIN '.PropertyFile::model()->tableName().' as propertyFile
                            ON t.pid = propertyFile.id';

            $sqldata = self::model()->with('PropertyFile')->findAll($criteria);

            foreach($sqldata as $item)
            {
                $arr = $item->attributes;
                $address_id = $item->PropertyFile->address_id;
                $address = Address::model()->findByPk($address_id);
                $arr['street_name'] = $address?$address->street_name:"";
                $cacheData[] = $arr;
            }


        return $cacheData;
    }
}