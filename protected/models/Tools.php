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


    /**
     * 创建翻页超链接
     * totalpages:总页数
     * page：当前页
     * pages：显示多少页
     */
    public static function createpages($totalpages,$page,$pages=5,$route,$params)
    {

        $result = array();
        $showstart = $showend = 1;

        $showstart = $page-1>0?1:0;
        $showend = $page+1>=$totalpages?0:1;

        $midpage = ceil($pages/2);
        $avgpage = intval($pages/2);
        $s = $page-$avgpage>0?$page-$avgpage:1;
        $e = $page+$avgpage>=$totalpages?$totalpages:$page+$avgpage;
        for($i=$s;$i<=$e;$i++)
        {
            $params['page'] = $i;
            $result['pages'][$i] = Yii::app()->createUrl($route,$params);
        }

        $html = '<ul class=" pager">';
        if(count($result['pages'])>1){
            if($showstart ==1){
                $params['page'] =$page-1;
                $html .=' <li><a href="'.Yii::app()->createUrl($route,$params).'">«</a></li>';
            }
            foreach($result['pages'] as $k=>$v)
            {
                $class = $page== $k? 'style="background-color:#CCC"':"";
                $html .='<li><a href="'.$v.'" '.$class.' >'.$k.'</a></li>';
            }
            if($showend==1){
                $params['page'] = $page+1>$totalpages?$totalpages:$page+1;
                $html .=' <li><a href="'.Yii::app()->createUrl($route,$params).'">»</a></li>';
            }
        }else{
            $html .='';
        }
        $html .='</ul>';
        return $html;
    }
}
