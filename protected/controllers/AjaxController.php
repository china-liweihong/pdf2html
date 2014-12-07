<?php

/**
 * 用户之窗
 */
class AjaxController extends Controller {

    public function init() {
        $this->layout = false;
    }

    /**
     * 通过城市代码获取小区
     */
    public function actionSubArea() {
        $code = Tools::getParam('code',"","post");
        $data = SubareaMgt::SelectSubAreaByCode($code);
        echo json_encode($data);
        exit;
    }

    /**
     * 读取csv文件
     */
    public function actioncsv()
    {
        $path = '/home/wwwroot/pdf2html/documents/AvailData.csv';
        $file = fopen($path,"r");

        while(! feof($file))
        {
            $arr = fgetcsv($file);
            if(isset($arr[3]) && isset($arr[1]) && $arr[3] && $arr[1])
            {
                $model = new Translate();
                $model->code = $arr[3];
                $model->en = $arr[5];
                $model->isNewRecord = true;
                $model->save();

//                $model = new Subarea();
//                $model->code = $arr[3];
//                $model->area_id = $arr[1];
//                $model->isNewRecord = true;

//                $model->save();


            }
        }

        fclose($file);
    }

    /**
     * 政策精选详情
     */
    public function actionCwpolicyView() {
        $this->pageTitle = '政策精选详情';
        $id = $this->getParams('id');
        $sqlData = Cwpolicy::model()->findByPk($id);
        if ($sqlData)
            $data = $sqlData->attributes;
        $this->render('CwpolicyContent', $data);
    }

    /**
     * 常用工具
     */
    public function actionCWTool() {

        $this->pageTitle = '常用工具';
        $Wctools = isset($_GET['Wctools']) ? $_GET['Wctools'] : array();
        $this->_result['recColumn'] = AdminColumn::getColumnByCid(1);
        $this->_result['data'] = Wctools::getArticleList($Wctools);

        if (isset($_GET['_']) && $_GET['_'] > 0) {

            $this->layout = false;
            $this->render('CWToolAjax', $this->_result);
        } else {
            $model = new Wctools();
            $model->title = isset($Wctools['title']) ? trim($Wctools['title']) : '';
            $model->IndustryID = isset($Wctools['IndustryID']) ? trim($Wctools['IndustryID']) : '';
            $model->score = isset($Wctools['score']) ? trim($Wctools['score']) : '';
            $this->_result['model'] = $model;
            $this->render('CWTool', $this->_result);
        }
    }

    /**
     * 软件详情
     */
    public function actionSoft() {
        $this->pageTitle = '软件详情';
        $Theory = isset($_GET['Theory']) ? $_GET['Theory'] : array();
        $id = $this->getParams('id');
        $sqlData = Wctools::model()->findByPk($id);
        if ($sqlData)
            $data = $sqlData->attributes;
        $this->render('sCWToolContent', $data);
    }

    /**
     * 电子期刊
     */
    public function actionCWjournal() {

        $this->pageTitle = '电子期刊';
        $Theory = isset($_GET['Theory']) ? $_GET['Theory'] : array();

        $this->_result['data'] = Journal::getArticleList($Theory);
        $this->_result['recColumn'] = AdminColumn::getColumnByCid(1);

        if (isset($_GET['_']) && $_GET['_'] > 0) {

            $this->layout = false;
            $this->render('CWjournalAjax', $this->_result);
        } else {
            $this->render('CWjournal', $this->_result);
        }
    }

    /*
     * 用户体验
     */

    public function actionCWExperience() {
        $this->pageTitle = '用户体验';
        $CWExperience = isset($_GET['Experience']) ? $_GET['Experience'] : array();

        $this->_result['data'] = Experience::getArticleList($CWExperience);
        $this->_result['recColumn'] = AdminColumn::getColumnByCid(1);

        if (isset($_GET['_']) && $_GET['_'] > 0) {

            $this->layout = false;
            $this->render('CWExperienceAjax', $this->_result);
        } else {
            $model = new Experience;
            $model->title = isset($CWExperience['title']) ? trim($CWExperience['title']) : '';
            $model->IndustryID = isset($CWExperience['IndustryID']) ? trim($CWExperience['IndustryID']) : '';
            $model->score = isset($CWExperience['score']) ? trim($CWExperience['score']) : '';
            $model->cid = isset($CWExperience['cid']) ? trim($CWExperience['cid']) : '';
            $this->_result['model'] = $model;
            $this->render('CWExperience', $this->_result);
        }
    }

}
