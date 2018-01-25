<?php defined('InShopNC') or exit('Access Invalid!');?>
 <link rel="stylesheet" href="<?php echo CMS_TEMPLATES_URL;?>/css/cms/footer_sxy.css">
<!--底部开始-->
<div class="footer_sxy">
    <div class="footer_box">
        <a  href="javascript:scroll(0,0)" class="return_top">
            <img src="<?php echo CMS_TEMPLATES_URL;?>/img/newslist_sxy/return_top_03.png" alt="">
        </a>
        <ul class="footer_nav">
            <li>
                <p class="foot_title_zn">了解更多</p>
            </li>
            <?php foreach ($output['footer_article_class'] as$key=> $article_class) {?>
                 <?php if($article_class['parent_id']==4) {?>
                    <li>
                        <p class="foot_title_zn"><?php echo $article_class['class_name']?></p>
                        <?php  foreach ($output['footer_article_list']as $article) {?>
                            <?php if($article['article_class_id']==$key) {?>
                                <a href="<?php echo urlCMS("article","article_detail",array("article_id"=>$article['article_id']))?>"><?php echo $article['article_title']?></a>
                            <?php }?>
                        <?php }?>
                    </li>
                <?php }?>
            <?php }?>
        </ul>
        <p class="foot_partling_zn"><?php echo $output['setting_config']['icp_number']; ?></p>
        <p class="foot_partling_zn mar"><?php echo html_entity_decode($output['setting_config']['statistics_code'],ENT_QUOTES); ?></p>
    </div>
</div>
<!--底部结束-->

<?php defined('InShopNC') or exit('Access Invalid!');?>
<!--v3-b12-->
<!-- 
<div class="clear">&nbsp;</div>
<!-- 代码开始 -->
<!--  
<?php if($_GET['op'] != 'special_detail'){?>
<div id="tbox">
    <?php if($_SESSION['is_login'] == '1'){?>
    <a id="publishArticle" href="<?php echo CMS_SITE_URL;?>/index.php?act=publish&op=publish_article" target="_blank" title="<?php echo $lang['cms_article_commit'];?>">&nbsp;</a>
    <a id="publishPicture" href="<?php echo CMS_SITE_URL;?>/index.php?act=publish&op=publish_picture" target="_blank" title="<?php echo $lang['cms_picture_commit'];?>">&nbsp;</a>
    <?php } ?>
    <a id="gotop" href="JavaScript:void(0);" title="<?php echo $lang['cms_go_top'];?>" style="display:none;">&nbsp;</a> </div>
<?php } ?>
<!-- 代码结束 -->
<?php if (C('debug') == 1){?>
<div id="think_page_trace" class="trace">
  <fieldset id="querybox">
    <legend><?php echo $lang['nc_debug_trace_title'];?></legend>
    <div> <?php print_r(Tpl::showTrace());?> </div>
  </fieldset>
</div>
<?php }?>
</body></html>


