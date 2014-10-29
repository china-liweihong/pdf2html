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
                $listing_arr_n =  array_slice($listing_arr,-2,2);
                $listing_str = implode("_",$listing_arr_n);
                $listing_str =$sysid.'_'.$listing_str;
            }else{
                $listing_str =$sysid;
            }
        }else{
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

}