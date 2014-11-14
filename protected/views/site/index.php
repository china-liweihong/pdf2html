<link href="./css/indexstyle.css" type="text/css" rel="stylesheet">
<header id="cta" class="background-showcase">
  <div class="navbar">
    <div class="container">
      <!-- Place everything within .nav-collapse to hide it until above 768px -->
      <div class="nav-collapse collapse navbar-responsive-collapse">
        <ul class="nav navbar-nav pull-right">
          <li class="active"><a href="javascript:void(0);">Home</a></li>
          <li><a href="/msearch"><?php echo Yii::t('Base','MAP SEARCH')?></a></li>
		  <li><a href="/search"><?php echo Yii::t('Base','SEARCH')?></a></li>
          <li><?php if (Yii::app()->language != 'es'):?><a href="?lg=es"  class="active">English</a><?php else: ?><a href="?lg=zh_cn"  class="active">Chinese</a><?php endif;?></li>
        </ul>
      </div>
      <!-- /.nav-collapse -->
    </div>
  </div>
  <div class="container">
    <div id="cta-text" class="row">
      <div class="col-lg-6">
        <h1><?php echo Yii::t('Base','FIND HOME FOR SALE.')?></h1>
		<form action="/search" method="get">
        <p class="lead">
          <label for="join_waitlist_email" class="sr-only">Email address</label>
          <input type="email" size="40" placeholder="<?php echo Yii::t('Base','Enter Search Keywords')?>" name="keyword" id="join_waitlist_email" data-parsley-type="email" data-parsley-trigger="change" data-parsley-required="true" data-parsley-error-message="!" class="form-control input-lg waitlist-email" data-parsley-id="4464">
          <em class="icon-cog icon-search"></em> </p>
        <div class="navbar ">
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="dropdown active"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span id="city_label"><?php echo Yii::t('Base','area')?> </span><span class="caret"></span></a>
                <ul role="menu" class="dropdown-menu" id="select_city">
				 <?php foreach($arealist as $k=>$n):?>
                  <li data="<?=$n?>" data-name="<?php echo Yii::t('Area',$n)?>"><a href="javascript:void(0);"><?php echo Yii::t('Area',$n)?></a></li>
				  <?php endforeach;?>
                 
                </ul>
              </li>
              <li class="dropdown active"> <a data-toggle="modal" data-target="#myModal" class="dropdown-toggle" href="#"><span id="Community_label"><?php echo Yii::t('Base','subarea')?></span> <span class="caret"></span></a>
               
              </li>
			  <li class="dropdown active"> <a data-toggle="modal" data-target="#myModalHouseType" class="dropdown-toggle" href="#"><span id="HouseType_label"><?php echo Yii::t('Base','House Types')?></span><span class="caret"></span></a>
                
              </li>
              <li class="dropdown active"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span id="price_label"><?php echo Yii::t('Base','Any price range')?></span><span class="caret"></span></a>
                <ul role="menu" class="dropdown-menu active" id="select_Price">
                   <?php foreach($searchPrice as $k=>$n):?>
                  <li data="<?=$k?>" data-name="<?=$k?>"><a href="javascript:void(0);"><?=$n?></a></li>
				  <?php endforeach;?>
                </ul>
              </li>
            </ul>
          </div>
          <!--/.nav-collapse -->
        </div>
        <p>
          <a href="/msearch"><button class="btn btn-map" type="button" ><?php echo Yii::t('Base','MAP SEARCH')?></button></a>
          <button class="btn btn-search" type="submit"><?php echo Yii::t('Base','SEARCH')?></button>
        </p>
        <!--
      <a href="#">Or watch a video</a>
      -->
	  	<input type="hidden" name="city"  id="city"/>
		<input type="hidden" name="community" id="community" />
		<input type="hidden" name="price" id="price" />
		<input type="hidden" name="housetype" id="housetype" />
	  </form>
      </div>
      <div class="col-lg-6"></div>
    </div>
  </div>
</header>
<div id="main">
<div class="container padded ">
  <div class="row">
    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo Yii::t('Base','HOUSING TYPES')?></h3>
        </div>
        <div class="panel-body" ><div class="draw_inner_div" id="housingtypes"></div></div>
      </div>
    </div>
    <!-- /.col-sm-4 -->
    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo Yii::t('Base','AGE DISTRIBUTION')?></h3>
        </div>
        <div class="panel-body"><div class="draw_inner_div" id="AGEDISTRIBUTION"></div></div>
      </div>
    </div>
    <!-- /.col-sm-4 -->
    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo Yii::t('Base','Home Size in Sq. Ft.')?></h3>
        </div>
        <div class="panel-body"><div class="draw_inner_div" id="HomeSizeinSqFt"></div> </div>
      </div>
    </div>
    <!-- /.col-sm-4 -->
    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo Yii::t('Base','Year Built')?></h3>
        </div>
        <div class="panel-body"><div class="draw_inner_div"  id="YearBuilt" ></div> </div>
      </div>
    </div>
    <!-- /.col-sm-4 -->
  </div>
</div>
<!--FEATURED PROPERTIES-->




<!-- 小区model end-->
<div class="container featured ">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo Yii::t('Base','FEATURED PROPERTIES')?></h3>
  </div>
  <!-- FEATURED PROPERTIES -->
  <div class="row">
  <?php foreach($recommendHouse as $item):?>
    <div class="panel-body col-lg-4 "> <a href="/detail?sid=<?=$item['sysid']?>" target="_blank"><img alt="200x200" class="img-thumbnail no-border"style="width: 100%; height: 100%" src="./images/house1.jpg"></a>
      <div class="col-sm-12">
        <div class="col-xs-6 col-sm-4 line4"><?=$item['street_name']?></div>
        <div class="col-xs-6 col-sm-4 line2">
          <p><?=$item['total_bedroom']?>bedrooms,</p>
          <p><?=$item['total_baths']?>bathrooms</p>
        </div>
        <div class="col-xs-6 col-sm-4 line4"><?=$item['total_floor_area']?> sqt</div>
      </div>
    </div>
	<?php endforeach;?>
    <!-- END FEATURED PROPERTIES -->
  </div>
</div>
</div>
<!--FEATURED PROPERTIES-->
<div class="container featured ">
  <div class="panel panel-warning">
    <div class="panel-heading">
      <h3 class="panel-title"><?php echo Yii::t('Base','LAST VIEWED')?></h3>
    </div>
    <div class="row">
     <?php foreach($visitedlist as $item):?>
    <div class="panel-body col-lg-4 "> <a href="/detail?sid=<?=$item['sysid']?>" target="_blank"><img alt="200x200" class="img-thumbnail no-border"style="width: 100%; height: 100%" src="./images/house1.jpg"></a>
      <div class="col-sm-12">
        <div class="col-xs-6 col-sm-4 line4">coquitlam</div>
        <div class="col-xs-6 col-sm-4 line2">
          <p><?=$item['total_bedroom']?>bedrooms,</p>
          <p><?=$item['total_baths']?>bathrooms</p>
        </div>
        <div class="col-xs-6 col-sm-4 line4"><?=$item['total_floor_area']?> sqt</div>
      </div>
    </div>
	<?php endforeach;?>
    </div>
  </div>
</div>
</div>
<!-- 小区model-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo Yii::t('Base','Select Subarea')?></h4>
      </div>
      <div class="modal-body">
        <div class="row" id="subarealist">
 			
		</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo Yii::t('Base','Close')?></button>
        <button type="button" class="btn btn-primary" id="select_subarea_ok"><?php echo Yii::t('Base','OK')?></button>
      </div>
    </div>
  </div>
</div>
</div>

<!-- 房型model-->
<div class="modal fade" id="myModalHouseType" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo Yii::t('Base','Select Subarea')?></h4>
      </div>
      <div class="modal-body">
        <div class="row" id="subarealist">
 			<?php foreach($searchhouseType as $k=>$v):?>
				<div class="col-lg-4 "><input type="checkbox" value="<?=$k?>" name="housetype[]" /><?=$v?></div>
			<?php endforeach;?>
		</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo Yii::t('Base','Close')?></button>
        <button type="button" class="btn btn-primary" id="select_housetype_ok"><?php echo Yii::t('Base','OK')?></button>
      </div>
    </div>
  </div>
</div>
<script src="./js/echart/esl.js"></script>
<script src="./js/global_draw.js"></script>
<script src="./js/common.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
	$("#select_city li").bind("click",function(){
		var select_city_code = $(this).attr("data");
		var select_city_name = $(this).attr("data-name");
		$("#city_label").text(select_city_name);
		
		$("#city").val(select_city_code);
		var data = "code="+select_city_code;
		ajaxCity('SubArea','json',data,'reloadselectdata()');
	});
	
	$("#select_Price li").bind("click",function(){
		var select_city_code = $(this).attr("data");
		var select_city_name = $(this).attr("data-name");
		$("#price_label").text(select_city_name);		
		$("#price").val(select_city_code);
	});
	
	$("#select_subarea_ok").bind("click",function(){
		var subarea = $('input[name="subarea[]"]');
		var subarea_str = '';
		$.each(subarea,function(k,v){
			if($(v).is(':checked'))
				subarea_str +=v.value+',';
		});
		if(subarea_str){
			subarea_str = subarea_str.substring(0,subarea_str.length-1);
			$("#community").val(subarea_str);
		}
		$('#myModal').modal('hide');
	});
	
	$("#select_housetype_ok").bind("click",function(){
		var housetype = $('input[name="housetype[]"]');
		var housetype_str = '';
		$.each(housetype,function(k,v){
			if($(v).is(':checked'))
				housetype_str +=v.value+',';
		});
		if(housetype_str){
			housetype_str = housetype_str.substring(0,housetype_str.length-1);
			$("#housetype").val(housetype_str);
		}
		$('#myModalHouseType').modal('hide');
	});
	
});
</script>
<script type="text/javascript">


	 var xdata = ['<?=$draw['HomeSizeinSqFt']['keys']?>'];
	 var ydata = [<?=$draw['HomeSizeinSqFt']['vals']?>];
	 draw_bar('HomeSizeinSqFt',xdata,ydata);
	 
	 var xdata = ['<?=$draw['YearBuilt']['keys']?>'];
	 var ydata = [<?=$draw['YearBuilt']['vals']?>];
	 draw_bar('YearBuilt',xdata,ydata);
	 
	 // draw_donut_pie2("housingtypes");
		
    </script>
	
	<script language="javascript">					
 var housingtypes_option = {
  tooltip: {
    trigger: 'item',
    formatter: "{a} <br/>{b} : {c} ({d}%)"
  },
  calculable: false,
  series: [{
    name: '<?php echo Yii::t('Base','HOUSING TYPES')?>',
    type: 'pie',
    selectedMode: 'single',
    radius: [0, 70],
    itemStyle: {
      normal: {
        label: {
          position: 'inner'
        },
        labelLine: {
          show: false
        }
      }
    },
    data: [

    ]
  },
  {
    name: '<?php echo Yii::t('Base','HOUSING TYPES')?>',
    type: 'pie',
    radius: [80, 140],
    data: <?=$draw['housingtypes']?>
  }]
};

var AGEDISTRIBUTION_option = {
  tooltip: {
    trigger: 'item',
    formatter: "{a} <br/>{b} : {c} ({d}%)"
  },
  calculable: false,
  series: [{
    name: '<?php echo Yii::t('Base','AGE DISTRIBUTION')?>',
    type: 'pie',
    selectedMode: 'single',
    radius: [0, 70],
    itemStyle: {
      normal: {
        label: {
          position: 'inner'
        },
        labelLine: {
          show: false
        }
      }
    },
    data: [
    ]
  },
  {
    name: '<?php echo Yii::t('Base','AGE DISTRIBUTION')?>',
    type: 'pie',
    radius: [80, 140],
    data: <?=$draw['AGEDISTRIBUTION']?>
  }]
};
</script>
<script src="./js/echart/echartsExample.js"></script>
</body>
</html>