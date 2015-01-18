
<link href="./css/bootstrap.min.css" rel="stylesheet">
<link href="./css/bootstrap-theme.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="./css/piestyle.css" media="screen">
<link rel="stylesheet" type="text/css" href="./css/chartspie.css" media="screen">
<link rel="stylesheet" type="text/css" href="./css/mmap.css" media="screen">
<!-- Custom styles for this template -->
<link href="./css/dashboard.css" rel="stylesheet">
<link href="./css/detail.css" rel="stylesheet">
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="/">
            <span class="glyphicon glyphicon-home">
            </span>
          </a>
        </div>
        <div class="navbar-collapse collapse">
		 <div class="col-sm-6">
		  <?php $this->renderPartial('../search/searchbox2');?> 
         </div>
		 <div class="col-sm-5">   
        <ul class="nav navbar-nav pull-right">
          <li ><a href="javascript:void(0);">Home</a></li>
          <li class="active"><a href="/msearch"><?php echo Yii::t('Base','MAP SEARCH')?></a></li>
		  <li><a href="/search"><?php echo Yii::t('Base','SEARCH')?></a></li>
          <li><?php if (Yii::app()->language != 'es'):?><a href="?lg=es"  class="active">English</a><?php else: ?><a href="?lg=zh_cn"  class="active">Chinese</a><?php endif;?></li>
        </ul>
		</div>
		</div>
        
      </div>
	 
</div>     
    
 </div>   
<div class="container-map-list">

    <div class="col-sm-3 col-md-3 sidebar" id="houselist">
      <h4><?php echo Yii::t('Base','Recommended for you')?></h4>
      <ul class="nav">
	  <?php foreach($listing['data'] as $k=>$v):?>
        <li class="active">
          <div class="leftlistrow"> <a href="/detail?sid=<?=$v['sysid']?>" target="_blank"><img src="./images/house1.jpg" width="100%" height="100%">
            <div class="row rowtitle">
              <div class="col-xs-6 col-sm-4 line4"><?=$v['street_name']?></div>
              <div class="col-xs-6 col-sm-4 line2">
                <p><?=$v['total_bedroom']?> bedrooms,</p>
                <p><?=$v['total_baths']?> bathrooms</p>
              </div>
              <div class="col-xs-6 col-sm-4 line4"><?=$v['total_floor_area']?> sqt</div>
            </div>
            </a> </div>
        </li>
		<?php endforeach;?>
      
      </ul>
      <div class="pagelist">
       <?php 
			if($listing['data']){
				echo Tools::createpages($listing['totalpages'],$listing['page'],5,'search',$searchData);
			 }
		?>
      </div>
	  
    </div>
	  
    <div class="col-sm-9  col-md-offset-3 mmap" id="mmap">
	<div id="map_result_barimg_hide" class="mapbut"></div>
      <div id="map_content" style="position: relative; z-index: 0; background-color: rgb(243, 241, 236); color: rgb(0, 0, 0); text-align: left;"></div> 
  <div class="map_swi"> 
   <a href="javascript:void(0);" title="3维地图" class="icon1"></a> 
   <a href="javascript:void(0);" title="平面地图" class="icon2"></a> 
   <a href="javascript:void(0);" title="3维地图" class="icon3"></a> 
   <a href="javascript:void(0);" title="平面地图" class="icon4"></a> 
  </div> 

  <div class="map_tools"> 
   <a href="javascript:void(0);" title="放大" class="iconenlarge"><span class="glyphicon glyphicon-plus"></span></a> 
   <a href="javascript:void(0);" title="缩小" class="iconnarrowing"><span class="glyphicon glyphicon-minus"></span></a> 
  </div>
  
   <div class="map_draw"> 
    <a class="iconNarrow" title="缩小" href="javascript:void(0);"><span class="glyphicon glyphicon-minus"></span></a>
    <div class="chart"> 
     <div id="chart1" class="jqplot-target"></div> 
    </div> 
    <div class="chart"> 
     <div style="width: 110px; height: 110px; line-height: 110px;" class="percentage-light easyPieChart" data-percent="95">
      <span>95</span>%
      <canvas width="110" height="110"></canvas>
     </div> 
    </div> 
    <div class="chart"> 
   
     <div style="width: 110px; height: 110px; line-height: 110px;" class="percentage-light easyPieChart" data-percent="45">
      <span>45</span>%
      <canvas width="110" height="110"></canvas>
     </div> 
    </div> 
    <div style="clear:both;"></div> 
   </div> 
  </div> 
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->


<script src="./js/json.js"></script>

<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5shiv.min.js"></script>
<script type="text/javascript" src="js/excanvas.js"></script>
<![endif]-->


<script type="text/javascript" src="./js/easyPieChart.js"></script>
<script type="text/javascript" src="./js/jquery.jqplot.min.js"></script>
<script type="text/javascript" src="./js/jqplot.pieRenderer.min.js"></script>
<script type="text/javascript" src="./js/jqplot.donutRenderer.min.js"></script>


 <script type="text/javascript" src="http://dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=7.0"></script> 

  <script type="text/javascript" src="./js/draw.js"></script> 
  <script type="text/javascript" src="./js/mmap.js"></script> 
  <script type="text/javascript">
var w = 0.7;
$(document).ready(function(){
 setTimeout(function (){
 		drawpie();
 		initPieChart();
 	},1000);
});
$(".iconNarrow").bind({
		click:function () {
				$(".map_draw").css('visibility', 'hidden');
		}
			
});
  $("#map_result_barimg_hide").bind({
  click:function(){
			 if($("#houselist").is(':visible'))
			 {
				$("#houselist").hide();
				$("#mmap").removeClass("col-sm-9  col-md-offset-3").addClass("col-sm-12");
				w=0.95;
				$(this).attr("class","mapbutb");
			 }else{
				$("#houselist").show();
				$("#mmap").removeClass("col-sm-12").addClass("col-sm-9  col-md-offset-3");
				w=0.7;
			 }
			sizeChange();
		  },
	mouseover:function()
			{
				if($("#houselist").is(':visible'))
			 	{
					$(this).attr("class","mapbuta");
				}else{
					$(this).attr("class","mapbutc");
				}		
			},
	mouseout:function()
			{
				if($("#houselist").is(':visible'))
			 	{
					$(this).attr("class","mapbut");
				}else{
					$(this).attr("class","mapbutb");
				}	
			}
  
  });
  
</script> 
