    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
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
         <ul class="nav navbar-nav pull-right">
          <li><a href="/">Home</a></li>
          <li><a href="/msearch"><?php echo Yii::t('Base','MAP SEARCH')?></a></li>
		  <li><a href="/search"><?php echo Yii::t('Base','SEARCH')?></a></li>
          <li><?php if (Yii::app()->language != 'es'):?><a href="?lg=es"  class="active">English</a><?php else: ?><a href="?lg=zh_cn"  class="active">Chinese</a><?php endif;?></li>
        </ul>
          
        
        </div>
      </div>
    </div>
    <div role="main" class="container theme-showcase">
      <div class="page-header">
        <h1>
          YALETOWN PENTHOUSE
        </h1>
      </div>
      <div data-ride="carousel" class="carousel slide" id="carousel-example-generic">
        <ol class="carousel-indicators">
          <li class="active" data-slide-to="0" data-target="#carousel-example-generic">
          </li>
          <li data-slide-to="1" data-target="#carousel-example-generic" class="">
          </li>
          <li data-slide-to="2" data-target="#carousel-example-generic" class="">
          </li>
        </ol>
        <div class="carousel-inner">
          <div class="item active">
            <img alt="First slide" data-src="holder.js/1140x500/auto/#777:#555/text:First slide"
            src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMTQwIiBoZWlnaHQ9IjUwMCI+PHJlY3Qgd2lkdGg9IjExNDAiIGhlaWdodD0iNTAwIiBmaWxsPSIjNzc3Ii8+PHRleHQgdGV4dC1hbmNob3I9Im1pZGRsZSIgeD0iNTcwIiB5PSIyNTAiIHN0eWxlPSJmaWxsOiM1NTU7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LXNpemU6NzFweDtmb250LWZhbWlseTpBcmlhbCxIZWx2ZXRpY2Esc2Fucy1zZXJpZjtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsIj5GaXJzdCBzbGlkZTwvdGV4dD48L3N2Zz4=">
          </div>
          <div class="item">
            <img alt="Second slide" data-src="holder.js/1140x500/auto/#666:#444/text:Second slide"
            src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMTQwIiBoZWlnaHQ9IjUwMCI+PHJlY3Qgd2lkdGg9IjExNDAiIGhlaWdodD0iNTAwIiBmaWxsPSIjNjY2Ii8+PHRleHQgdGV4dC1hbmNob3I9Im1pZGRsZSIgeD0iNTcwIiB5PSIyNTAiIHN0eWxlPSJmaWxsOiM0NDQ7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LXNpemU6NzFweDtmb250LWZhbWlseTpBcmlhbCxIZWx2ZXRpY2Esc2Fucy1zZXJpZjtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsIj5TZWNvbmQgc2xpZGU8L3RleHQ+PC9zdmc+">
          </div>
          <div class="item">
            <img alt="Third slide" data-src="holder.js/1140x500/auto/#555:#333/text:Third slide"
            src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMTQwIiBoZWlnaHQ9IjUwMCI+PHJlY3Qgd2lkdGg9IjExNDAiIGhlaWdodD0iNTAwIiBmaWxsPSIjNTU1Ii8+PHRleHQgdGV4dC1hbmNob3I9Im1pZGRsZSIgeD0iNTcwIiB5PSIyNTAiIHN0eWxlPSJmaWxsOiMzMzM7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LXNpemU6NzFweDtmb250LWZhbWlseTpBcmlhbCxIZWx2ZXRpY2Esc2Fucy1zZXJpZjtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsIj5UaGlyZCBzbGlkZTwvdGV4dD48L3N2Zz4=">
          </div>
        </div>
        <a data-slide="prev" role="button" href="#carousel-example-generic" class="left carousel-control">
          <span class="glyphicon glyphicon-chevron-left">
          </span>
        </a>
        <a data-slide="next" role="button" href="#carousel-example-generic" class="right carousel-control">
          <span class="glyphicon glyphicon-chevron-right">
          </span>
        </a>
      </div>

    <div role="navigation" class="navbar navbar-inverse searchbox">
      <?php $this->renderPartial('../search/searchbox2');?> 
	  
	</div>
</div>
    </div>
    <div class="container featured basic_info">
      <div class="panel">
        <div class="panel-heading">
          <span class="panel-title">
            BASIC INFORMATION
          </span>
        </div>
        <div class="row">
          <div class="panel-body col-lg-3 ">
            <div class="col-sm-12">
              <ul class="list-group">
                <li class="list-group-item">
                  <span class="glyphicon glyphicon-map-marker"></span><div class="street">Vancouver<br>1290 Harvard Street</div>
                </li>
                <li class="list-group-item">
                  <span class="glyphicon glyphicon-usd"></span> <span class="glyphicon price">239,900</span>
                </li>
              </ul>
            </div>
          </div>
          <div class="panel-body col-lg-9">
            text-decoration: none 默认。定义标准的文本。 underline 定义文本下的一条线。 overline 定义文本上的一条线。
            line-through 定义穿过文本下的一条线。 blink 定义闪烁的文本。 修饰的颜色由 "color" 属性设置 追问 多谢你回答这么详细。
            我想把underline 定义成dashed #red 怎么写？ 回答 用text-decoration不能定义dashed 只能用别的方法：
            比如去掉下划线，设置border-bottom a { text-decoration: none; border-bottom: thin
            dashed #FF0000;
          </div>
        </div>
      </div>
    </div>
 
    <div class="container featured basic_info">
      <div class="panel">
        <div class="panel-heading">
          <span class="panel-title">
            BASIC INFORMATION
          </span>
        </div>
        <div class="focus ">
          <div id="prev" class="f-l scrollbtn">
          </div>
          <div class="focuspic">
            <div class="indexbanner">
              <img alt="" src="images/bg.jpg" width="100%">
            </div>
            <div class="indexbanner ">
              <img alt="" src="images/bg.jpg" width="100%">
            </div>
            <div class="indexbanner ">
              <img alt="" src="images/bg.jpg" width="100%">
            </div>
            <div class="indexbanner ">
              <img alt="" src="images/bg.jpg" width="100%">
            </div>
            <div class="indexbanner ">
              <img alt="" src="images/bg.jpg" width="100%">
            </div>
            <div class="indexbanner ">
              <img alt="" src="images/bg.jpg" width="100%">
            </div>
          </div>
          <!--focuspic end-->
          <div class="scrollbox">
            <div class="f-l scrollpic">
              <ul>
                <li class="current">
                  <img alt="" src="images/house1.jpg" height="150" width="150">
                </li>
                <li class="">
                  <img alt="" src="images/house1.jpg" height="150" width="150">
                </li>
                <li class="">
                  <img alt="" src="images/house1.jpg" height="150" width="150">
                </li>
                <li class="">
                  <img alt="" src="images/house1.jpg" height="150" width="150">
                </li>
                <li class="">
                  <img alt="" src="images/house1.jpg" height="150" width="150">
                </li>
                <li class="">
                  <img alt="" src="images/house1.jpg" height="150" width="150">
                </li>
              </ul>
            </div>
          </div>
          <!--scrollbox end-->
          <div id="next" class="f-r scrollbtn">
          </div>
        </div>
        <!--focus end-->
      </div>
      <!-- map info-->
      <div class="container featured basic_info">
        <div class="panel">
          <div class="panel-heading">
            <span class="panel-title">
              BASIC INFORMATION
            </span>
          </div>
          <div class="row">
            <div class="col-lg-3 ">
              <div class="col-sm-12">
                <div id="container" style="height: 220px; overflow: hidden; position: relative; z-index: 0; background-color: rgb(243, 241, 236); color: rgb(0, 0, 0); text-align: left;">
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                      PROPERTY AGE
                    </th>
                    <th>
                      BUILT IN 2000(14 YRS OLD)
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      GROSS TAXES FOR 2014
                    </td>
                    <td>
                      $2,155
                    </td>
                  </tr>
                  <tr>
                    <td>
                      2
                    </td>
                    <td>
                      Jacob
                    </td>
                  </tr>
                  <tr>
                    <td>
                      3
                    </td>
                    <td>
                      Larry
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
	
	
	      <!-- map info-->
      <div class="container featured basic_info">
        <div class="panel">
          <div class="panel-heading">
            <span class="panel-title">
              HISTORY
            </span>
          </div>
          <div class="row">
            <div class="col-lg-5">
              <div class="col-sm-12">
               <div class="draw_inner_div" id="draw_property_history_div"></div>
              </div>
            </div>
          
          </div>
        </div>
      </div>
	  
	  
	  
  </body>
  <script src="./js/carousel.js">
  </script>
  <script src="./js/echart/esl.js"></script>
  <script src="./js/global_draw.js"></script>
   <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"> </script>
  <!-- add google map api -->
  <script type="text/javascript">
    $(document).ready(function() {
      initialize();
    });
    function initialize() {
      var point = new google.maps.LatLng(39.916527, 116.397128); // location, （纬度, 经度）
      var option = {
        zoom: 12,
        center: point,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      var obj = document.getElementById("container"); // container
      var map = new google.maps.Map(obj, option); // show map
    }
  </script>
  
 <script language="javascript">
 var line_option = {

    tooltip : {
        trigger: 'axis'
    },
    
    toolbox: {
        show : false
       
    },
    calculable : true,
    xAxis : [
        {
            type : 'category',
            boundaryGap : false,
            data : ['周一','周二','周三','周四','周五','周六','周日']
        }
    ],
    yAxis : [
        {
            type : 'value',
            axisLabel : {
                formatter: '{value} °C'
            }
        }
    ],
    series : [
        {
            name:'最高气温',
            type:'line',
            data:[11, 11, 15, 13, 12, 13, 10],
            markPoint : {
                data : [
                    {type : 'max', name: '最大值'},
                    {type : 'min', name: '最小值'}
                ]
            },
            markLine : {
                data : [
                    {type : 'average', name: '平均值'}
                ]
            }
        }
    ]
};
 </script>
<script src="./js/echart/echartsdetail.js"></script>