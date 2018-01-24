<?php defined('InShopNC') or exit('Access Invalid!');?>
 <link rel="stylesheet" href="<?php echo CMS_TEMPLATES_URL;?>/css/cms/newslist_sxy.css">
 <link rel="stylesheet" href="<?php echo CMS_TEMPLATES_URL;?>/css/cms/group_page.css">
 <script src="<?php echo RESOURCE_SITE_URL;?>/js/cms/cms_jquery.pagination.js"></script>

<!--中间内容部分-->
<section class="content_sxy">
    <!--左边列表-->
    <div class="left_content">
        <!--二级导航开始-->
        <div class="second_nav">
            <span>当前位置</span>
            <i>|</i>
            <a href="<?php echo urlCMS("index","index" )?>">首页</a>
            <img src="<?php echo CMS_TEMPLATES_URL ?>/img/newslist_sxy/arrow_03.png" alt="">
             <a href="<?php echo urlCMS("article","article_index")?>">公司信息</a>
            <img src="<?php echo CMS_TEMPLATES_URL ?>/img/newslist_sxy/arrow_03.png" alt="">
            <a href="<?php echo urlCMS("article","article_list" ,array("class_id"=>0))?>" class="active">新闻列表</a>
        </div>
        <!--二级导航结束-->
        <!--文章列表开始-->
        <!--文章分类开始-->
        <ul class="article_cate">
            <li class="<?php if($output['class_id']==0){echo 'active';}?>">
               <a href="<?php echo urlCMS("article","article_list" ,array("class_id"=>0))?>">
                    <p>全/部/新/闻</p>
                    <span>|</span>
                </a>
            </li>
            <?php if($output['article_class']&&is_array($output['article_class'])){?>
               <?php foreach ($output['article_class'] as $article_class) {?>
                    <li class="<?php if($output['class_id']==$article_class['class_id']){echo 'active';}?>">
                        <a href="<?php echo urlCMS("article","article_list" ,array("class_id"=>$article_class['class_id']))?>">
                            <p><?php echo $article_class['class_name']?></p>
                            <span>|</span>
                        </a>
                    </li>
                <?php }?>
           <?php }?>
        </ul>
        <!--文章分类结束-->
       
       
        <ul class="article_list on">
         <?php if($output['article_list']&&$output["article_list"]) {?>
          <?php foreach ($output['article_list']as $article){?>
        
            <li>
                    <div class="article_img">
                        <img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_CMS.DS.'article/'.$article['article_image']['path'].'/'.$article['article_image']['name'];?>" alt="" width="207" height='136'>
                    </div>
                    <div class="art_detail">
                        <div class="art_title">
                            <p class="news_title"><?php echo str_cut($article['article_title'], 20)?></p>
                            <span class="news_time"><?php echo $article['article_publish_time']?></span>
                        </div>
                        <div class="news_detail">
                            <?php echo str_cut($article['article_abstract'], 140)?>
                        </div>
                        <div class="news_bot">
                            <div class="news_push">
                                <p class="publish_people">发表人：<span><?php echo $article['article_author']?></span></p>
                                <i>|</i>
                                <p class="like_people">点赞人数：<span><?php echo $article['article_click']?></span></p>
                            </div>
                            <a href="<?php echo urlCMS("article","article_detail",array('article_id'=>$article['article_id']))?>" class="check_details">查看详情</a>
                        </div>
    
                    </div>
                
            </li>
         <?php }?>
         <?php }?>
        </ul>
        
        <!--分页-->
        <div class="pagination">
            <?php echo $output['show_page'];?>
            
        </div>
        <!--文章列表结束-->
    </div>
    <!--右边-->
    <div class="right_content">
        <div class="top_img">
            <?php echo loadadv(1);?>
        </div>
        <div class="weixin_account">
            <div class="weixin_orange"></div>
            <div class="weixin_title">
                <p></p>
                <h1>微信公众号</h1>
            </div>
            <ul class="weixin_list">
                <?php  if($output["wx_article_list"]&&is_array($output["wx_article_list"])) {?>
                    <?php foreach ($output["wx_article_list"] as $article) {?>
                    <li>
                        <div class="list_top">
                            <div class="list_text">
                                <a href="<?php echo urlCMS("article","article_detail",array('article_id'=>$article['article_id']))?>" title="<?php echo $article["article_title"]?>"><?php echo str_cut($article['article_title'], 35)?></a>
                                <p><?php echo str_cut($article['article_abstract'], 150)?></p>
                            </div>
                        </div>
                        <div class="list_bottom">
                            <span><?php echo $article['article_publish_time']?></span>
                            <p><?php echo $article['article_author']?></p>
                        </div>
                    </li>
                    <?php }?>
                <?php }?>
            </ul>
        </div>
    </div>
</section>













<!-- 
<?php defined('InShopNC') or exit('Access Invalid!');?>
<script type="text/javascript">
    $(document).ready(function(){
        $(".image_lazy_load").nc_lazyload();
    });
</script>
<div class="warp-all article-layout-a">
  <div class="mainbox">
    <div class="sitenav-bar">
        <div class="sitenav"><?php echo $lang['current_location'];?><?php echo $lang['nc_colon'];?> <a href="<?php echo CMS_SITE_URL;?>"><?php echo $lang['cms_site_name'];?></a> > <a href="<?php echo CMS_SITE_URL.DS.'index.php?act=article&op=article_list';?>"><?php echo $lang['cms_article'];?></a><?php echo empty($_GET['class_id'])?'':' > '.$output['article_class_list'][$_GET['class_id']]['class_name'];?></div>
      <div class="browse-list"><span title="<?php echo $lang['cms_classical'];?>"><?php echo $lang['cms_classical'];?></span><a href="index.php?act=article&op=article_list&class_id=<?php echo $_GET['class_id'];?>&type=modern" title="<?php echo $lang['cms_modern'];?>">&nbsp;</a></span></div>
    </div>
    <?php if(!empty($output['article_list']) && is_array($output['article_list'])) {?>
    <ul class="article-list">
      <?php foreach($output['article_list'] as $value) {?>
      <?php $article_url = getCMSArticleUrl($value['article_id']);?>
      <li>
        <h3 class="article-title"> <a href="<?php echo $article_url;?>" target="_blank"> <?php echo $value['article_title'];?> </a> </h3>
        <div class="article-sub"><span class="PV" title="<?php echo $lang['cms_text_view_count'];?>"><i></i><?php echo $value['article_click'];?></span><span class="author"><?php echo $lang['cms_text_publisher'];?><?php echo $lang['nc_colon'];?><?php echo empty($value['article_author'])?$lang['cms_text_guest']:$value['article_author'];?></span><span class="source"><?php echo $lang['cms_text_origin'];?><?php echo $lang['nc_colon'];?> <a href="<?php echo empty($value['article_origin_address'])?CMS_SITE_URL:$value['article_origin_address'];?>" target="_blank"> <?php echo empty($value['article_origin'])?C('site_name'):$value['article_origin'];?> </a></span><span class="date"><?php echo date('Y-m-d',$value['article_publish_time']);?></span></div>
        <div class="article-preface"><?php echo $value['article_abstract'];?><a href="<?php echo $article_url;?>" target="_blank"><?php echo $lang['cms_read_more'];?></a></div>
        <?php if(!empty($value['article_image'])) { ?>
        <div class="article-cover"><a href="<?php echo $article_url;?>" target="_blank"> <img class="image_lazy_load" data-src="<?php echo getCMSArticleImageUrl($value['article_attachment_path'], $value['article_image'], 'list');?>" src="<?php echo getLoadingImage();?>" alt="" /></a></div>
        <?php } ?>
        <div class="article-tag"><?php echo $lang['cms_keyword'];?><?php echo $lang['nc_colon'];?>
          <?php if(!empty($value['article_keyword'])) { ?>
          <?php $article_keyword_array = explode(',', $value['article_keyword']);?>
          <?php foreach ($article_keyword_array as $value) {?>
          <a href="<?php echo CMS_SITE_URL.DS;?>index.php?act=article&op=article_search&keyword=<?php echo rawurlencode($value);?>" target="_blank"><?php echo $value;?></a>
          <?php } ?>
          <?php } ?>
        </div>
      </li>
      <?php } ?>
    </ul>
    <div class="pagination"> <?php echo $output['show_page'];?> </div>
    <?php } else { ?>
    <div class="no-content-b"><i class="article"></i><?php echo $lang['no_record'];?></div>
    <?php } ?>
  </div>
  <div class="sidebar">
    <?php require('article_list.sidebar.php');?>
  </div>
</div> -->