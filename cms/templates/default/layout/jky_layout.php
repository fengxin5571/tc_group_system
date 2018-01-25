<?php defined('InShopNC') or exit('Access Invalid!');?>
<?php if ($output['index_sign']=="index") {?>
<?php require CMS_BASE_TPL_PATH.'/layout/tc_top.php';}else{?>
<?php require CMS_BASE_TPL_PATH.'/layout/jky_top.php';?>
<?php }?>
<div class="pt20">
    <?php require_once($tpl_file);?>
</div>
<?php require CMS_BASE_TPL_PATH.'/layout/jky_footer.php';?>
