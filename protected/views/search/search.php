
<!-- Bootstrap core CSS -->
<link href="<?php echo Yii::app()->params['siteUrl']; ?>/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo Yii::app()->params['siteUrl']; ?>/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="<?php echo Yii::app()->params['siteUrl']; ?>/css/global.css" rel="stylesheet">
<!-- Custom styles for this template -->



<link href="<?php echo Yii::app()->params['siteUrl']; ?>/css/secondstyle.css" rel="stylesheet">

 <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">
              Toggle navigation
            </span>
            <span class="icon-bar">
            </span>
            <span class="icon-bar">
            </span>
            <span class="icon-bar">
            </span>
          </button>
          <a class="navbar-brand" href="#">
            <span class="glyphicon glyphicon-home">
            </span>
          </a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="#">
                About Us
              </a>
            </li>
            <li>
              <a href="#" class="active">
                Englist
              </a>
            </li>
            <li>
              <a href="#">
                Chinese
              </a>
            </li>
            <li>
              <a href="#">
                Help
              </a>
            </li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </div>
<div class="container">

<div class="masthead">
  <h3 class="text-muted"><?php echo Yii::t('Base','LIST SEARCH')?></h3>
   <?php $this->renderPartial('../search/searchbox2');?> 
</div>
<div class="navbar-collapse collapse  hourse-type">
  <ul class="nav navbar-nav">
    <li>&nbsp;&nbsp;<span class="badge greencolor">&nbsp;&nbsp;</span>&nbsp;&nbsp;<?php echo Yii::t('Base','HOUSE FOR SALE')?></li>
   
    <li>&nbsp;&nbsp;<span class="badge redcolor">&nbsp;&nbsp;</span>&nbsp;&nbsp;<?php echo Yii::t('Base','CONDO')?></li>
  </ul>
</div>

<div class="houselist_row">

 <?php foreach($listing['data'] as $item):?>
  <div class="list-line">
    <div class="col-md-3"><img alt="200x200" class="img-thumbnail"  style="width: 100%; height: 100%;" src="<?php echo Yii::app()->params['siteUrl']; ?>/images/house1.jpg"></div>
    <div class="col-md-6">
      <ul class="list-group">
        <li class="list-group-item"><?=$item['street_name']?>&nbsp;&nbsp;<span class="badge greencolor graycolor">&nbsp;&nbsp;</span></li>
        <li class="list-group-item">
          <div class="well desc">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed diam eget risus varius blandit sit amet non magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
        </li>
        <li class="list-group-item house-properties">
          <div class="col-md-4"><?=$item['total_bedroom']?> BEDS</div>
          <div class="col-md-4"><?=$item['total_baths']?> BATHS</div>
          <div class="col-md-4"><?=$item['total_floor_area']?> JSHNSON ST.</div>
        </li>
      </ul>
    </div>
    <div class="col-md-3">
      <div class="row list-line-button">
        <div class="price"><strong>$<?=number_format($item['list_price']);?></strong></div>
        <div class="detail"><a href="/detail?sid=<?=$item['sysid']?>" target="_blank"> 
          <button class="btn btn-lg btn-success" type="button"><?php echo Yii::t('Base','VIEW DETAILS')?></button>
          </a></div>
      </div>
    </div>
  </div>
 <?php endforeach;?>

  
  
</div>


<!-- /container -->

<?php 
	if($listing['data']){
  		echo Tools::createpages($listing['totalpages'],$listing['page'],5,'search',$searchData);
 	 }
?>


</div>
