<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="language" content="en" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">


<!-- blueprint CSS framework -->


<?php
    Yii::app()->clientScript->registerCoreScript('jquery');
?>
    <script language="javascript" type="text/javascript">
        var httpUrl = '<?php echo Yii::app()->params['siteUrl'] ?>';
        var cssUrl = <?php echo Yii::app()->request->baseUrl.'/css/'; ?>;
        var jsUrl = <?php echo Yii::app()->request->baseUrl.'/js/'; ?>;
    </script>
</head>
<body>
<div class="main">
  <?php echo $content; ?>
    <div id="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <p id="copyright-section"> @Copyright 2014 Company Name.All Rights Reserved.|Copyright Inforrmation</p>
                </div>
                <div class="col-rg-5">
                    <p id="love">Codiqa is grown with <span class="love-icon"></span> in Madison, Wisconsin </p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo Yii::app()->params['siteUrl']; ?>/js/bootstrap.min.js"></script>
</body>
</html>

