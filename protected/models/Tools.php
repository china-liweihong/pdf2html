<?php

class Tools 
{
	/**
	 * 获取参数
	 */
	public static function getParam($name,$default='',$method='get')
	{
		if($method == 'post')
			$var = filter_input(INPUT_POST, $name, FILTER_SANITIZE_SPECIAL_CHARS);
		else 
			$var = filter_input(INPUT_GET, $name, FILTER_SANITIZE_SPECIAL_CHARS);
		if(is_null($var))
			$var = $default;
		return $var;
	}

    /**
     * 设置cookie
     */
    public static function TCookie($key,$val=null,$time=31536000)
    {

        if(empty($val))
        {
            $lg = Yii::app()->request->cookies[$key];
            if($lg){
                $result=$lg->value;
                return $result;
            }
        }else{

            $obj = Yii::app()->request->cookies[$key];
            if($obj){
                $obj->value = $val;
            }else
            {
                $obj = new CHttpCookie($key,$val);
                //把$ck对象放入cookie组件里边
            }
            if($time)
                $obj -> expire = time()+$time;

            Yii::app()->request->cookies[$key] = $obj;

        }
    }


    /**
     * 设置cache
     */
    public static function TCache($key,$val=null,$time=31536000)
    {

        if(empty($val))
        {
            $cacheData = Yii::app()->cache->get($key);
            return $cacheData;

        }else{
            $cacheData = Yii::app()->cache->set($key,$val,$time);
        }
    }



    /**
     * php array to js array
     */
    public static  function phparrtojsarr($arr)
    {
        $str = '';
        foreach($arr as $k=>$v)
        {
            $str .='["'.$k.'",'.$v.'],';
        }
        $str = substr($str,0,-1);
        return $str;
    }

    public static  function phparrtojsarr2($arr)
    {
        $str = '';
        foreach($arr as $k=>$v)
        {
            $str .='['.$k.',"'.$v.'"],';
        }
        $str = substr($str,0,-1);
        return $str;
    }

}
