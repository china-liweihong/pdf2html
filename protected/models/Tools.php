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


}
