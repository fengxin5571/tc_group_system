<!doctype html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET;?>">
<title><?php echo C('cms_seo_title');?></title>
<meta name="keywords" content="<?php echo $output['seo_keywords']; ?>" />
<meta name="description" content="<?php echo $output['seo_description']; ?>" />
<link href="<?php echo CMS_TEMPLATES_URL;?>/css/base.css" rel="stylesheet" type="text/css">
 <link rel="stylesheet" href="<?php echo CMS_TEMPLATES_URL;?>/css/cms/commonality.css">
 <link rel="stylesheet" href="<?php echo CMS_TEMPLATES_URL;?>/css/cms/header_sxy.css">

<script>
var COOKIE_PRE = '<?php echo COOKIE_PRE;?>'; var _CHARSET = '<?php echo strtolower(CHARSET);?>'; var APP_SITE_URL = '<?php echo CMS_SITE_URL;?>'; var SITEURL = '<?php echo SHOP_SITE_URL;?>'; var SHOP_SITE_URL = '<?php echo SHOP_SITE_URL;?>'; var RESOURCE_SITE_URL = '<?php echo RESOURCE_SITE_URL;?>';

</script>
<script type="text/javascript" src="<?php echo CMS_TEMPLATES_URL;?>/js/jquery-1.9.1.min.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/jquery.ui.js"></script>
<script id="dialog_js" type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/dialog/dialog.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/common.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo CMS_RESOURCE_SITE_URL;?>/js/common.js" charset="utf-8"></script>
<link href="<?php echo RESOURCE_SITE_URL;?>/js/perfect-scrollbar.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript">
var PRICE_FORMAT = '<?php echo $lang['currency'];?>%s';
var LOADING_IMAGE = '<?php echo getLoadingImage();?>';
$(function(){
	//search
	$("#searchCMS").children('ul').children('li').click(function(){
		$(this).parent().children('li').removeClass("current");
		$(this).addClass("current");
        $("#form_search").attr("action", $(this).attr("action"));
        $("#act").val($(this).attr("act"));
        $("#op").val($(this).attr("op"));
	});
    var search_current_item = $("#searchCMS").children('ul').children('li.current');
    $("#form_search").attr("action", search_current_item.attr("action"));
    $("#act").val(search_current_item.attr("act"));
    $("#op").val(search_current_item.attr("op"));
});
</script>
<style>
a :hover{
	text-decoration: none;
}
</style>
</head>
<body>
<!--头部nav开始-->

<div class="header_sxy">
    <div class="header_box">
        <div class="logo">
            <a href="<?php  echo urlCMS('index','index');?>">
            <?php if(empty($output['setting_config']['cms_logo'])) { ?>
           	<img src="<?php echo CMS_TEMPLATES_URL;?>/img/newslist_sxy/logo.png" alt="">
          	<?php } else { ?>
           	<img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_CMS.DS.$output['setting_config']['cms_logo'];?>">
           <?php } ?>
           </a>
        </div>
        <ul class="big_nav">
            <?php if(!empty($output['navigation_list']) && is_array($output['navigation_list'])) {?>
            <?php foreach($output['navigation_list'] as $value) {?>
            <li >
                <div class="line "></div>
                <a href="<?php echo $value['navigation_link']?>" class="title" <?php if($value['navigation_open_type']==1){echo "target='_blank'";}?>>
                    <p><?php echo $value['navigation_title']?></p>
                    <h5><?php echo $value['navigation_subtitle']?></h5>
                </a>
                <div class="line "></div>
            </li>
            <?php }?>
            <?php }?>
        </ul>
        <div class="search">
            <input type="text">
            <img src="<?php echo CMS_TEMPLATES_URL;?>/img/newslist_sxy/search_03.png" alt="" class="search_">
        </div>
    </div>
</div>
<!--头部nav结束-->




