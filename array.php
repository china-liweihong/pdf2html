<?php
 $arr = array('listings' => Array
        (
           '49.308636_-123.06602'=>array(//lat_lon作为数组的key值
                '0' => Array//如果该坐标值下有多个房源，则用多个数组表示
                    (
                        'id' => 1369985,//数据库中的id
                        'photo' => 'http://assets0.rew.ca/property/image/V1087795/20-288-st-davids-avenue-north-vancouver-2069_261287812-1369985-0_listings_unbranded.jpg',//图片地址
                        'price' => '$498,000',//售价
                        'beds' => 2,//beds数量
                        'bathrooms' => 2,//bathrooms数量
                        'floor_area' => 939,//居住面积
                        'land_area' =>3000,//土地面积
                        'address' => '20-288 St Davids Avenue',//地址
                        'office' => 'Prudential Sussex Realty',//显示title，暂留，或许后面会有用
                        'url' => '/properties/V1087795/20-288-st-davids-avenue-north-vancouver',//跳转url，可以是详情或是别的url地址
                        'coordinates' => Array//坐标值
                            (
                                'lat' => 49.308636,
                                'lon' => -123.06602,
                            ),

                        'featured' => '',//特殊功能，暂留，或许后面会用到
                        'property_type' => 'townhouse',//房源类型
                        'mls_num' => 'v1087795'//mls
                    ),
                '1' => Array//表明该坐标值下有两个房源，有多少个房源就放多少个数组
                   (
                       'id' => 1369986,
                       'photo' => 'http://assets0.rew.ca/property/image/V1087795/20-288-st-davids-avenue-north-vancouver-2069_261287812-1369985-0_listings_unbranded.jpg',
                       'price' => '$498,000',
                       'beds' => 2,
                       'bathrooms' => 2,
                       'floor_area' => 939,
                       'address' => '20-288 St Davids Avenue',
                       'office' => 'Prudential Sussex Realty',
                       'url' => '/properties/V1087795/20-288-st-davids-avenue-north-vancouver',
                       'coordinates' => Array
                       (
                           'lat' => 49.308636,
                           'lon' => -123.06602,
                       ),

                       'featured' => '',
                       'property_type' => 'townhouse',
                       'mls_num' => 'v1087795'
                   )
           ),
           '49.308636_-123.06608'=>array(
               '0' => Array
               (

                   'id' => 1369985,
                   'photo' => 'http://assets0.rew.ca/property/image/V1087795/20-288-st-davids-avenue-north-vancouver-2069_261287812-1369985-0_listings_unbranded.jpg',
                   'price' => '$498,000',
                   'beds' => 2,
                   'bathrooms' => 2,
                   'floor_area' => 939,
                   'address' => '20-288 St Davids Avenue',
                   'office' => 'Prudential Sussex Realty',
                   'url' => '/properties/V1087795/20-288-st-davids-avenue-north-vancouver',
                   'coordinates' => Array
                   (
                       'lat' => 49.308636,
                       'lon' => -123.06602,
                   ),

                   'featured' => '',
                   'property_type' => 'townhouse',
                   'mls_num' => 'v1087795'

           )
		)
),
    'labels' => Array
    (
        'types'=>array('House'=>1,'Apartment'=>2),//所有房源类型都要显示，如果没有的值请为0,比如“House (2)”写入为‘House’=>2
        'beds' => array('0'=>1,'1'=>10,'2'=>19),//所有beds数量，比如“3 Bedrooms (5)”写入为'3'=>5
        'price' => array('$0 to $4999,999'=>1,'$500,000 to $999,999'=>10,'$1,500,000 to $1,999,999'=>19),//所有价格段内的数量，比如“$1,500,000 to $1,999,999”内有19套房源则写入为'$1,500,000 to $1,999,999'=>19
    ),
     'page' => 1,//当前页
     'total_pages' => 1,//总页数
     'total_results' => 11,//坐标值内房源数
     'chart'=>array(
         'chart1'=>array('Heavy Industry'=>12,'Retail'=>9,'Light Industry'=>41),//饼图，至少需要一个数值
         'chart2'=>array('percent'=>95,'span'=>'95%','desc'=>'95desc'),//百分比图，需要一个数值
         'chart3'=>array('percent'=>65,'span'=>'65%','desc'=>'65desc')//百分比图，需要一个数值
     ),

 );

print_r($arr);
