<?php
 $arr = array('listings' => Array
        (
           '49.308636_-123.06602'=>array(//lat_lon作为数组的key值
                '0' => Array//如果该坐标值下有多个房源，则用多个数组表示
                    (
                        'labels' => Array
                            (
                                'beds' => 'Beds',
                                'bathrooms' => 'Baths',
                                'square_feet' => 'Sqft',
                                'link' => 'View Details',
                            ),

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
                       'labels' => Array
                       (
                           'beds' => 'Beds',
                           'bathrooms' => 'Baths',
                           'square_feet' => 'Sqft',
                           'link' => 'View Details',
                       ),

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
           ),
           '49.308636_-123.06602'=>array(
               '0' => Array
               (
                   'labels' => Array
                   (
                       'beds' => 'Beds',
                       'bathrooms' => 'Baths',
                       'square_feet' => 'Sqft',
                       'link' => 'View Details',
                   ),

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
		),
    'pagination_caption' => 'Page 1 of 1',
    'page' => 1,
    'total_pages' => 1,
    'total_results' => 11
)

 );
print_r($arr);
