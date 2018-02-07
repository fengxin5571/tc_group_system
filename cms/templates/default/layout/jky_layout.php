<?php defined('InShopNC') or exit('Access Invalid!');?>
<?php 
$wapurl = WAP_SITE_URL;
$agent = $_SERVER['HTTP_USER_AGENT'];
if(strpos($agent,"comFront") || strpos($agent,"iPhone") || strpos($agent,"MIDP-2.0") || strpos($agent,"Opera Mini") || strpos($agent,"UCWEB") || strpos($agent,"Android") || strpos($agent,"Windows CE") || strpos($agent,"SymbianOS")){
    global $config;
    if(!empty($config['wap_site_url'])){
        $url = $config['wap_site_url'];
        switch ($_GET['act']){
            case 'goods':
                $url .= '/tmpl/product_detail.html?goods_id=' . $_GET['goods_id'];
                break;
            case 'store_list':
                $url .= '/shop.html';
                break;
            case 'show_store':
                $url .= '/tmpl/store.html?store_id=' . $_GET['store_id'];
                break;
            case 'article':
                $url .= '/tmpl/article_detail_wap.html?article_id=' . $_GET['article_id'];
                break;
        }
    } else {
        $header("Location:$wapurl");
    }
    header('Location:' . "http://m.sxtaichang.com/");
    exit();
}
?>
<?php if ($output['index_sign']=="index") {?>
<?php require CMS_BASE_TPL_PATH.'/layout/tc_top.php';}else{?>
<?php require CMS_BASE_TPL_PATH.'/layout/jky_top.php';?>
<?php }?>
<div class="pt20">
    <?php require_once($tpl_file);?>
</div>
<?php require CMS_BASE_TPL_PATH.'/layout/jky_footer.php';?>
