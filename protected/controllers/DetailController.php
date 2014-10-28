<?php

class DetailController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        $data = array();
        $key = 'listing';
        $listing = Tools::TCookie($key);
        $sysid = Tools::getParam('sid');
        echo $sysid;exit;
        $listing_arr =  explode("_",$listing);
        if(!in_array($sysid,$listing_arr))
        {
            $listing_arr_n =  array_slice($listing_arr,0,-4);
            $listing_str = implode("_",$listing_arr_n);
            $listing_str .='_'.$sysid;
        }

        $this->render('detail',$data);

	}


}
