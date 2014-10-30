<link href="./css/indexstyle.css" type="text/css" rel="stylesheet">
<link href="./css/jquery.jqplot.min.css" type="text/css" rel="stylesheet">

<header id="cta" class="background-showcase">

  <div class="container">
    <div id="cta-text" class="row">
      <div class="col-lg-6">
        <h1><?php echo Yii::t('Base','FIND HOME FOR SALE.')?></h1>
        <p class="lead">
          <label for="join_waitlist_email" class="sr-only">Email address</label>
          <input type="email" size="40" placeholder="<?php echo Yii::t('Base','Enter Search Keywords')?>" name="email" id="join_waitlist_email" data-parsley-type="email" data-parsley-trigger="change" data-parsley-required="true" data-parsley-error-message="!" class="form-control input-lg waitlist-email" data-parsley-id="4464">
          <em class="icon-cog icon-search"></em> </p>
        <div class="navbar ">
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="dropdown active"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo Yii::t('Base','area')?> <span class="caret"></span></a>
                <ul role="menu" class="dropdown-menu ">
				 <?php foreach($arealist as $k=>$n):?>
                  <li><a href="#"><?php echo Yii::t('Area',$n)?></a></li>
				  <?php endforeach;?>
                 
                </ul>
              </li>
              <li class="dropdown active"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo Yii::t('Base','subarea')?> <span class="caret"></span></a>
                <ul role="menu" class="dropdown-menu active">
                  <li><a href="#">Action</a></li>_
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="dropdown active"> <a data-toggle="dropdown" class="dropdown-toggle" href="#">Any price range <span class="caret"></span></a>
                <ul role="menu" class="dropdown-menu active">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                </ul>
              </li>
            </ul>
          </div>
          <!--/.nav-collapse -->
        </div>
        <p>
          <a href="/?r=msearch"><button class="btn btn-map" type="button" >MAP SEARCH</button></a>
          <a href="/?r=search"><button class="btn btn-search" type="button">SEARCH</button></a>
        </p>
        <!--
      <a href="#">Or watch a video</a>
      -->
      </div>
      <div class="col-lg-6"></div>
    </div>
  </div>
</header>
<div id="main">
<div class="container padded ">
  <div class="row">
    <div class="col-sm-3">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo Yii::t('Base','HOUSING TYPES')?></h3>
        </div>
        <div class="panel-body" id="housingtypes"> <div class="jqplot-axis jqplot-xaxis" style=" position:absolute; height: 14px; left: 0px; bottom: 0px;"></div> </div>
      </div>
    </div>
    <!-- /.col-sm-4 -->
    <div class="col-sm-3">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo Yii::t('Base','AGE DISTRIBUTION')?></h3>
        </div>
        <div class="panel-body" id="AGEDISTRIBUTION"> <div class="jqplot-axis jqplot-xaxis" style=" position:absolute; height: 14px; left: 0px; bottom: 0px;"></div> </div>
      </div>
    </div>
    <!-- /.col-sm-4 -->
    <div class="col-sm-3">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo Yii::t('Base','Home Size in Sq. Ft.')?></h3>
        </div>
        <div class="panel-body" id="HomeSizeinSqFt"> <div class="jqplot-axis jqplot-xaxis" style=" position:absolute; height: 14px; left: 0px; bottom: 0px;"></div></div>
      </div>
    </div>
    <!-- /.col-sm-4 -->
    <div class="col-sm-3">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Year Built</h3>
        </div>
        <div class="panel-body" id="YearBuilt"> <div class="jqplot-axis jqplot-xaxis" style=" position:absolute; height: 14px; left: 0px; bottom: 0px;"></div> </div>
      </div>
    </div>
    <!-- /.col-sm-4 -->
  </div>
</div>
<!--FEATURED PROPERTIES-->
<div class="container featured ">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo Yii::t('Base','FEATURED PROPERTIES')?></h3>
  </div>
  <!-- FEATURED PROPERTIES -->
  <div class="row">
  <?php foreach($featured as $item):?>
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
      <div class="panel-body col-lg-4 "> <img alt="200x200" class="img-thumbnail no-border"style="width: 100%; height: 100%" src="./images/house1.jpg">
        <div class="col-md-6">
          <div class="col-xs-6 col-sm-4 line4">coquitlam</div>
          <div class="col-xs-6 col-sm-4 line2">
            <p>5bedrooms,</p>
            <p>2bathrooms</p>
          </div>
          <div class="col-xs-6 col-sm-4 line4">3000 sqt</div>
        </div>
      </div>
      <div class="panel-body col-lg-4"> <img alt="200x200" class="img-thumbnail no-border" data-src="holder.js/200x200" style="width: 100%; height: 100%" src="./images/house1.jpg">
        <div class="col-md-6">
          <div class="col-xs-6 col-sm-4 line4">coquitlam</div>
          <div class="col-xs-6 col-sm-4 line2">
            <p>5bedrooms,</p>
            <p>2bathrooms</p>
          </div>
          <div class="col-xs-6 col-sm-4 line4">3000 sqt</div>
        </div>
      </div>
      <div class="panel-body col-lg-4"> <img alt="200x200" class="img-thumbnail no-border" data-src="holder.js/200x200" style="width: 100%; height: 100%" src="./images/house1.jpg">
        <div class="col-md-6">
          <div class="col-xs-6 col-sm-4 line4">coquitlam</div>
          <div class="col-xs-6 col-sm-4 line2">
            <p>5bedrooms,</p>
            <p>2bathrooms</p>
          </div>
          <div class="col-xs-6 col-sm-4 line4">3000 sqt</div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script type="text/javascript" src="./js/jqplot/jquery.jqplot.min.js"></script>
<script type="text/javascript" src="./js/jqplot/jqplot.barRenderer.min.js"></script>
<script type="text/javascript" src="./js/jqplot/jqplot.pieRenderer.min.js"></script>
<script type="text/javascript" src="./js/jqplot/jqplot.donutRenderer.min.js"></script>
<script type="text/javascript" src="./js/jqplot/jqplot.categoryAxisRenderer.min.js"></script>
<script type="text/javascript" src="./js/jqplot/jqplot.pointLabels.min.js"></script>
<script src="./js/global_draw.js"></script>
<script language="javascript">
	$(document).ready(function(){
		 var s1 = [<?=$draw['HomeSizeinSqFt']['vals']?>];
         var ticks = ['<?=$draw['HomeSizeinSqFt']['keys']?>'];
		 draw_bar_ver(ticks,s1,'HomeSizeinSqFt');
		 var data = [[['a',1], ['b',2], ['c',3], [10,4]]];
		 draw_bar_cross(data,'YearBuilt');

		 //var pie_data = [[['a',25],['b',14],['c',7]]];
		 var pie_data = [<?=$draw['housingtypes']?>];
		 draw_donut_pie(pie_data,"housingtypes",'s');
		 
		 var pie_data = [<?=$draw['AGEDISTRIBUTION']?>];
		 draw_donut_pie(pie_data,"AGEDISTRIBUTION",'s');
		 
	});
</script>


<script src="./js/JSClass/FusionCharts.js"></script>
<script type="text/javascript">
	  /* var chart = new FusionCharts("./Charts/Doughnut2D.swf", "ChartId", "100%", "100%", "0", "0");
	   chart.setDataURL("./data/Doughnut2D.xml");		   
	   chart.render("housingtypes");*/
	   
	  /* var chart2 = new FusionCharts("./Charts/Doughnut2D.swf", "ChartId", "100%", "100%", "0", "0");
	   chart2.setDataURL("./data/Doughnut2D.xml");		   
	   chart2.render("AGEDISTRIBUTION");
	   */
	  /*  var chart3 = new FusionCharts("./Charts/Bar2D.swf", "ChartId", "100%", "100%", "0", "0");
		   chart3.setDataURL("./data/Bar2D.xml");		   
		   chart3.render("ETIAMQUIS1");*/
		   
		/*var chart4 = new FusionCharts("./Charts/Column3D.swf", "ChartId", "100%", "100%", "0", "0");
		   chart4.setDataURL("./data/Column3D.xml");		   
		   chart4.render("ETIAMQUIS2");*/
	   
</script>
</body>
</html>