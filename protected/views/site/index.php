<link href="./css/indexstyle.css" type="text/css" rel="stylesheet">
<body>
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
				 <?php foreach($arealist as $item):?>
                  <li><a href="#"><?php echo Yii::t('Area',$item->code)?></a></li>
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
          <h3 class="panel-title">HOUSING TYPES</h3>
        </div>
        <div class="panel-body" id="housingtypes"> Panel content </div>
      </div>
    </div>
    <!-- /.col-sm-4 -->
    <div class="col-sm-3">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">AGE DISTRIBUTION</h3>
        </div>
        <div class="panel-body" id="AGEDISTRIBUTION"> Panel content </div>
      </div>
    </div>
    <!-- /.col-sm-4 -->
    <div class="col-sm-3">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">ETIAM QUIS</h3>
        </div>
        <div class="panel-body" id="ETIAMQUIS1"> Panel content </div>
      </div>
    </div>
    <!-- /.col-sm-4 -->
    <div class="col-sm-3">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">ETIAM QUIS</h3>
        </div>
        <div class="panel-body" id="ETIAMQUIS2"> Panel content </div>
      </div>
    </div>
    <!-- /.col-sm-4 -->
  </div>
</div>
<!--FEATURED PROPERTIES-->
<div class="container featured ">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">FEATURED PROPERTIES</h3>
  </div>
  <!-- FEATURED PROPERTIES -->
  <div class="row">
    <div class="panel-body col-lg-4 "> <img alt="200x200" class="img-thumbnail no-border"style="width: 100%; height: 100%" src="./images/house1.jpg">
      <div class="col-sm-12">
        <div class="col-xs-6 col-sm-4 line4">coquitlam</div>
        <div class="col-xs-6 col-sm-4 line2">
          <p>5bedrooms,</p>
          <p>2bathrooms</p>
        </div>
        <div class="col-xs-6 col-sm-4 line4">3000 sqt</div>
      </div>
    </div>
    <div class="panel-body col-lg-4 "> <img alt="200x200" class="img-thumbnail no-border"style="width: 100%; height: 100%" src="./images/house1.jpg">
      <div class="col-sm-12">
        <div class="col-xs-6 col-sm-4 line4">coquitlam</div>
        <div class="col-xs-6 col-sm-4 line2">
          <p>5bedrooms,</p>
          <p>2bathrooms</p>
        </div>
        <div class="col-xs-6 col-sm-4 line4">3000 sqt</div>
      </div>
    </div>
    <div class="panel-body col-lg-4 "> <img alt="200x200" class="img-thumbnail no-border"style="width: 100%; height: 100%" src="./images/house1.jpg">
      <div class="col-sm-12">
        <div class="col-xs-6 col-sm-4 line4">coquitlam</div>
        <div class="col-xs-6 col-sm-4 line2">
          <p>5bedrooms,</p>
          <p>2bathrooms</p>
        </div>
        <div class="col-xs-6 col-sm-4 line4">3000 sqt</div>
      </div>
    </div>
    <!-- END FEATURED PROPERTIES -->
  </div>
</div>
<!--FEATURED PROPERTIES-->
<div class="container featured ">
  <div class="panel panel-warning">
    <div class="panel-heading">
      <h3 class="panel-title">LAST VIEWED</h3>
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



<script src="./js/JSClass/FusionCharts.js"></script>
<script type="text/javascript">
	   var chart = new FusionCharts("./Charts/Doughnut2D.swf", "ChartId", "100%", "100%", "0", "0");
	   chart.setDataURL("./data/Doughnut2D.xml");		   
	   chart.render("housingtypes");
	   
	   var chart2 = new FusionCharts("./Charts/Doughnut2D.swf", "ChartId", "100%", "100%", "0", "0");
	   chart2.setDataURL("./data/Doughnut2D.xml");		   
	   chart2.render("AGEDISTRIBUTION");
	   
	    var chart3 = new FusionCharts("./Charts/Bar2D.swf", "ChartId", "100%", "100%", "0", "0");
		   chart3.setDataURL("./data/Bar2D.xml");		   
		   chart3.render("ETIAMQUIS1");
		   
		var chart4 = new FusionCharts("./Charts/Column3D.swf", "ChartId", "100%", "100%", "0", "0");
		   chart4.setDataURL("./data/Column3D.xml");		   
		   chart4.render("ETIAMQUIS2");
	   
</script>
</body>
</html>