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
        $str = json_encode($data);
        echo $str;
        exit();
    }

    /**
     * 地图加载、搜索
     */
    public function actionMapSearch()
    {
        $searchData = array();
//        $searchData['SubareaCode'] = 'VCQRP';
        $data = LatitudeMgt::getMapData($searchData);
//        $str = 'var points = new Array(';
//        foreach($data as $k=>$v)
//        {
//            $str.='new VELatLong('.$v['lon'].','.$v['lat'].', 0, VEAltitudeMode. RelativeToGround),';
//        }
//        $str.=' );';
//        echo $str;
      echo json_encode($data);
        exit;
    }


    /**
     * 读取csv文件
     */
    public function actioncsv()
    {
        $path = '/home/living/wwwroot/pdf2html.com/documents/lat2.csv';
        $file = fopen($path,"r");
        while(! feof($file))
        {
            $arr = fgetcsv($file);
            if(isset($arr[1]))
            {
                $model = new Latitude();
                $model->SubareaCode = $arr[1];
                $model->Name = $arr[2];
                $model->Jurisdiction = $arr[3];
                $model->Orig_fid = $arr[4];
                $model->lat = $arr[5];
                $model->lon = $arr[6];
                $model->save();

//                $model = new Subarea();
//                $model->code = $arr[3];
//                $model->area_id = $arr[1];
//                $model->isNewRecord = true;

//                $model->save();


            }
        }

        fclose($file);
        exit("all over");
    }

    function actionSearchFilter()
    {
        $searchData = Tools::getParam('search_filters','post');
        $data = array();
//        $data['searchPrice'] = ListingMgt::searchPrice();
//        $data['searchhouseType'] =  ListingMgt::houseTypeSelect();
//        $data['search_zip_code_filter'] = PropertyFileMgt::getZipCode();
        $data['search_bedroom_filter'] = ListingMgt::searchListingPro('total_bedroom',4);
        $data['search_baths_filter'] = ListingMgt::searchListingPro('total_baths',4);
        $data['search_baths_filter'] = ListingMgt::searchListingPro('total_baths',4);
        $data['search_floor_area_filter'] = ListingMgt::searchListingPro('total_floor_area',4);
        $data['search_area_main_filter'] = ListingMgt::searchListingPro('floor_area_main',4);

        $data['search_street_filter'] = ListingMgt::searchListingPro('total_floor_area',4);
        $data['search_street_species_filter'] = ListingMgt::searchListingPro('floor_area_main',4);
        $data['search_age_filter'] = ListingMgt::searchListingPro('floor_area_main',4);
        $data['search_sales_times_filter'] = ListingMgt::searchListingPro('total_floor_area',4);
        $data['search_plan_filter'] = ListingMgt::searchListingPro('floor_area_main',4);
        echo json_encode($data);
        exit;
    }

    function actionSearchPics()
    {
        $searchData = Tools::getParam('search_filters','post');
        $data = array();
        $data['draw']['housingtypes'] = json_encode(PropertyFileMgt::draw_housing_type());
        $data['draw']['AGEDISTRIBUTION'] = json_encode(PropertyFileMgt::AGEDISTRIBUTION());
        $data['draw']['HomeSizeinSqFt'] = PropertyFileMgt::HomeSizeinSqFt();
        $data['draw']['YearBuilt'] = PropertyFileMgt::YearBuilt();
        echo json_encode($data);
        exit;
    }
}
