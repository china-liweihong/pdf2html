
<!-- Bootstrap core CSS -->
<link href="./css/bootstrap.min.css" rel="stylesheet">
<link href="./css/bootstrap-theme.min.css" rel="stylesheet">
<link href="./css/global.css" rel="stylesheet">
<!-- Custom styles for this template -->

<link href="./css/justified-nav.css" rel="stylesheet">

<link href="./css/secondstyle.css" rel="stylesheet">


<div class="container">
<div class="masthead">
  <h3 class="text-muted">LIST SEARCH</h3>
  <ul class="nav nav-justified">
 
    <li class="active"><div class="dropdown txt-center">
            <button data-toggle="dropdown" id="dropdownMenu1" type="button" class="btn btn-default dropdown-toggle">
              910 MAINLAND ST. VANCOUVER<span class="caret"></span>
            </button>
            <div class="dropdown-menu">
            <ul aria-labelledby="dropdownMenu1" class="dropdown-menu-ul col-lg-4" role="menu">
              <li role="presentation">
                <input type="checkbox" checked="">
                  House
              </li>
              <li role="presentation">
                <input type="checkbox" checked="">
                  Apartment
              </li>
              <li role="presentation">
                 <input type="checkbox" checked="">
                  Duplex
              </li>
             <li role="presentation">
                <input type="checkbox" checked="">
                  Townhouse
              </li>
              <li role="presentation">
                <input type="checkbox" checked="">
                  Other
              </li>
            </ul>
            <div class="divider-vertical-100"></div>
             <ul aria-labelledby="dropdownMenu1" class="dropdown-menu-ul col-lg-7" role="menu">
              <li role="presentation">
                <h5> Mount Pleasan East Vancle</h5>
              </li>
              <li role="presentation">
                House(11)
              </li>
              <li role="presentation">
                 Duplex(1)
              </li>
             
              <li role="presentation">
                Triplex(1)
              </li>
            </ul>
            </div>
         
            </div></li>
            
    <li><div class="dropdown txt-center">
            <button data-toggle="dropdown" id="dropdownMenu1" type="button" class="btn btn-default dropdown-toggle">
              3 BEDS<span class="caret"></span>
            </button>
            <div class="dropdown-menu">
            <ul aria-labelledby="dropdownMenu1" class="dropdown-menu-ul col-lg-4" role="menu">
              <li role="presentation">
                <input type="checkbox" checked="">
                  House
              </li>
              <li role="presentation">
                <input type="checkbox" checked="">
                  Apartment
              </li>
              <li role="presentation">
                 <input type="checkbox" checked="">
                  Duplex
              </li>
             <li role="presentation">
                <input type="checkbox" checked="">
                  Townhouse
              </li>
              <li role="presentation">
                <input type="checkbox" checked="">
                  Other
              </li>
            </ul>
            <div class="divider-vertical-100"></div>
             <ul aria-labelledby="dropdownMenu1" class="dropdown-menu-ul col-lg-7" role="menu">
              <li role="presentation">
                <h5> Mount Pleasan East Vancle</h5>
              </li>
              <li role="presentation">
                House(11)
              </li>
              <li role="presentation">
                 Duplex(1)
              </li>
             
              <li role="presentation">
                Triplex(1)
              </li>
            </ul>
            </div>
          </div></li>
    <li>
    
    <div class="dropdown txt-center">
            <button data-toggle="dropdown" id="dropdownMenu1" type="button" class="btn btn-default dropdown-toggle">
              2 BATHS<span class="caret"></span>
            </button>
            <div class="dropdown-menu">
            <ul aria-labelledby="dropdownMenu1" class="dropdown-menu-ul col-lg-4" role="menu">
              <li role="presentation">
                <input type="checkbox" checked="">
                  House
              </li>
              <li role="presentation">
                <input type="checkbox" checked="">
                  Apartment
              </li>
              <li role="presentation">
                 <input type="checkbox" checked="">
                  Duplex
              </li>
             <li role="presentation">
                <input type="checkbox" checked="">
                  Townhouse
              </li>
              <li role="presentation">
                <input type="checkbox" checked="">
                  Other
              </li>
            </ul>
            <div class="divider-vertical-100"></div>
             <ul aria-labelledby="dropdownMenu1" class="dropdown-menu-ul col-lg-7" role="menu">
              <li role="presentation">
                <h5> Mount Pleasan East Vancle</h5>
              </li>
              <li role="presentation">
                House(11)
              </li>
              <li role="presentation">
                 Duplex(1)
              </li>
             
              <li role="presentation">
                Triplex(1)
              </li>
            </ul>
            </div>
          </div>
    </li>
    <li><div class="dropdown txt-center">
            <button data-toggle="dropdown" id="dropdownMenu1" type="button" class="btn btn-default dropdown-toggle">
              100,000-150,000<span class="caret"></span>
            </button>
            <div class="dropdown-menu">
            <ul aria-labelledby="dropdownMenu1" class="dropdown-menu-ul col-lg-4" role="menu">
              <li role="presentation">
                <input type="checkbox" checked="">
                  House
              </li>
              <li role="presentation">
                <input type="checkbox" checked="">
                  Apartment
              </li>
              <li role="presentation">
                 <input type="checkbox" checked="">
                  Duplex
              </li>
             <li role="presentation">
                <input type="checkbox" checked="">
                  Townhouse
              </li>
              <li role="presentation">
                <input type="checkbox" checked="">
                  Other
              </li>
            </ul>
            <div class="divider-vertical-100"></div>
             <ul aria-labelledby="dropdownMenu1" class="dropdown-menu-ul col-lg-7" role="menu">
              <li role="presentation">
                <h5> Mount Pleasan East Vancle</h5>
              </li>
              <li role="presentation">
                House(11)
              </li>
              <li role="presentation">
                 Duplex(1)
              </li>
             
              <li role="presentation">
                Triplex(1)
              </li>
            </ul>
            </div>
          </div></li>
   
    <li> 
      <button data-toggle="dropdown" id="dropdownMenu1" type="button" class="btn btn-success navbar-right">
              <?php echo Yii::t('Base','UPDATE FILTERS')?>
      </button>
      </li>
  </ul>
</div>
<div class="navbar-collapse collapse  hourse-type">
  <ul class="nav navbar-nav">
    <li><span class="badge greencolor">&nbsp;&nbsp;</span>&nbsp;&nbsp;HOUSE FOR SALE</li>
    <li><span class="badge bluecolor">&nbsp;&nbsp;</span>&nbsp;&nbsp;TOWNHOUSE</li>
    <li><span class="badge redcolor">&nbsp;&nbsp;</span>&nbsp;&nbsp;CONDO</li>
  </ul>
</div>
<div class="row">

 <?php foreach($listing as $item):?>
  <div class="list-line">
    <div class="col-md-3"><img alt="200x200" class="img-thumbnail"  style="width: 100%; height: 100%;" src="./images/house1.jpg"></div>
    <div class="col-md-6">
      <ul class="list-group">
        <li class="list-group-item">Pinetree Way and Johnson St.<span class="badge greencolor graycolor">&nbsp;&nbsp;</span></li>
        <li class="list-group-item">
          <div class="well desc">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed diam eget risus varius blandit sit amet non magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
        </li>
        <li class="list-group-item house-properties">
          <div class="col-md-4">3 BEDS</div>
          <div class="col-md-4">2 BATHS</div>
          <div class="col-md-4">2590 JSHNSON ST.</div>
        </li>
      </ul>
    </div>
    <div class="col-md-3">
      <div class="row list-line-button">
        <div class="price"><strong>$175,000</strong></div>
        <div class="detail"><a href="/detail?sid=<?=$item['sysid']?>" target="_blank"> 
          <button class="btn btn-lg btn-success" type="button"><?php echo Yii::t('Base','VIEW DETAILS')?></button>
          </a></div>
      </div>
    </div>
  </div>
 <?php endforeach;?>

  
  
</div>


<!-- /container -->
<ul class=" pager">
  <li><a href="#">«</a></li>
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#">»</a></li>
</ul>
</div>
