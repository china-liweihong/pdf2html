<?php
/**
 * Created by PhpStorm.
 * User: living
 * Date: 14-11-3
 * Time: 上午10:57
 */
  $key = 'translate_cn';
  $cacheData = Tools::TCache($key);
//$cacheData = array();
  if(!$cacheData)
  {
      $cacheData = array();
      $data = Translate::model()->findAll();
      foreach($data as $i)
      {
          $cacheData[$i->code] = $i->cn?$i->cn:$i->en;
      }
      $cacheData['all'] = $cacheData;
      Tools::TCache($key,$cacheData,86400);
  }
return $cacheData;

