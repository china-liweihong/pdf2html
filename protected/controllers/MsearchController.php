<?php

class MsearchController extends Controller
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
        $searchdata = array();
        $searchdata['city'] = Tools::getParam('city');
        $searchdata['page'] = Tools::getParam('page',1);
        $searchdata['community'] = Tools::getParam('community');
        $searchdata['housetype'] = Tools::getParam('housetype');
        $searchdata['keyword'] = Tools::getParam('keyword');
        $data = array();
        $data['listing'] = ListingMgt::getSearchList($searchdata,$searchdata['page'],20);
        $data['searchData'] = $searchdata;
        $this->render('msearch',$data);
	}
}
