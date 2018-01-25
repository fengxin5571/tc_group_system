<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <link href="<?php echo CMS_TEMPLATES_URL;?>/css/base.css" rel="stylesheet" type="text/css">
	<link href="<?php echo CMS_TEMPLATES_URL;?>/css/layout.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo CMS_TEMPLATES_URL;?>/css/cms/commonality.css">
    <link rel="stylesheet" href="<?php echo CMS_TEMPLATES_URL;?>/css/cms/tc_index_header.css">
    <link rel="stylesheet" href="<?php echo CMS_TEMPLATES_URL;?>/css/cms/swiper.min.css">
    <script src="<?php echo CMS_TEMPLATES_URL;?>/js/swiper.min.js"></script>
    <link rel="stylesheet" href="<?php echo CMS_TEMPLATES_URL;?>/css/cms/tc_index.css">
    <link rel="stylesheet" href="<?php echo CMS_TEMPLATES_URL;?>/css/cms/footer_sxy.css">
    
    <script src="<?php echo CMS_TEMPLATES_URL;?>/js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="<?php echo CMS_TEMPLATES_URL;?>/ckplayer/ckplayer.js"></script>
</head>
<body>
<!--头部导航开始-->
<div class="header_sxy">
    <div class="header_box">
        <div class="logo">
            <a href="http://taichang"><img src="<?php echo CMS_TEMPLATES_URL;?>/img/newslist_sxy/logo.png" alt=""></a>
        </div>
        <ul class="big_nav">
        <?php foreach($output['nav_list'] as $value){?>
            <li>
                <div class="line"></div>
                <a href="<?php echo $value['navigation_link']?>" class="title">
                    <p><?php echo $value['navigation_title']?></p>
                    <h5>information</h5>
                </a>
                <div class="line"></div>
            </li>
          <?php }?>
        </ul>
        <div class="search">
            <input type="text">
            <img src="<?php echo CMS_TEMPLATES_URL;?>/img/newslist_sxy/search_03.png" alt="" class="search_">
        </div>
    </div>
</div>
<!--头部导航结束-->