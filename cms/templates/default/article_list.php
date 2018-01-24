<?php defined('InShopNC') or exit('Access Invalid!');?>
 <link rel="stylesheet" href="<?php echo CMS_TEMPLATES_URL;?>/css/cms/news_list_sxy.css">
 <script src="<?php echo RESOURCE_SITE_URL;?>/js/cms/cms_jquery.pagination.js"></script>
<!--中间内容部分--> 
<section class="sxy_content">
    <div id="cont_box">
        <div id="news_left">
            <!--标题--> 
            <div class="jump_title">
                <p><a href="<?php echo urlShop('index','groupindex')?>">首页</a></p>
                <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/news_list_03.png';?>" alt="">
                <p><a href="<?php echo urlCMS('index','index')?>">健康云</a></p>
                <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/news_list_03.png';?>" alt="">
               <?php foreach($output['article_class'] as $class){?>
                <p class="show"><?php if($_GET['class_id']==$class['class_id']){echo $class['class_name'];}?></p>
                <?php }?>
            </div>
            <!--选项卡导航-->
            <div class="title_taichang">
                <div class="title_info">
                    <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/news_list_07.png';?>" alt="">
                    <p>太常资讯</p>
                </div>
                <ul class="nav">
               <?php foreach($output['article_class'] as $class){?>
                  
                    <li>
                        <p <?php if($_GET['class_id']==$class['class_id']){?>class="nav_active"<?php }?>><a href="<?php echo urlCMS('article','article_list',array('class_id'=>$class['class_id']))?>"><?php echo $class['class_name']?></a></p><span></span>
                    </li>
                <?php }?>    
                </ul>
            </div>
            <!--选项卡内容-->
           
             <div class="news_cont_list on">
                <ul class="news_list">
                     <?php foreach($output['article_list'] as $list){?>
                    <li>
                        <a href="<?php echo urlCMS('article','article_detail',array('article_id'=>$list['article_id']))?>">
                            <div class="news_title">
                                <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_day_06.png';?>" alt="" class="gray">
                                <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_day_05.png';?>" alt="" class="orange">
                                <p><?php echo $list['article_title']?></p>
                            </div>
                            <h1><?php echo $list['article_publish_time'];?></h1>
                        </a>
                        
                    </li>
                    <?php }?>
                </ul>
                
            </div>
            
            <div class="pagination"><?php echo $output['show_page'];?></div>
			
        </div>
        <div id="cont_right">
            <div class="actity_img">
                <?php echo loadadv(1056);?>
            </div>
            <div class="weixin_account">
                <div class="weixin_orange"></div>
                <div class="weixin_title">
                    <p></p>
                    <h1>微信公众号</h1>
                </div>
                <ul class="weixin_list">
                    <li>
                        <div class="list_top">
                            <div class="wei_img">
                                <img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_CMS.DS.'health_day_03.jpg';?>" alt="" width='65' height="65">
                            </div>
                            <div class="list_text">
                                <a href="">坚持午睡竟有这么多好处!!!</a>
                                <p>美国阿勒格尼学院研究人员的最新研究发现，如果工作压力人员的最新研究如果工作压力人员的最新研究</p>
                            </div>
                        </div>
                        <div class="list_bottom">
                            <span>09/27</span>
                            <p>独一张</p>
                        </div>
                    </li>
                    <li>
                        <div class="list_top">
                            <div class="wei_img">
                                <img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_CMS.DS.'health_day_03.jpg';?>" alt="" width='65' height="65">
                            </div>
                            <div class="list_text">
                                <a href="">坚持午睡竟有这么多好处!!!</a>
                                <p>美国阿勒格尼学院研究人员的最新研究发现，如果工作压力人员的最新研究如果工作压力人员的最新研究</p>
                            </div>
                        </div>
                        <div class="list_bottom">
                            <span>09/27</span>
                            <p>独一张</p>
                        </div>
                    </li>
                    <li>
                        <div class="list_top">
                            <div class="wei_img">
                                <img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_CMS.DS.'health_day_03.jpg';?>" alt="" width='65' height="65">
                            </div>
                            <div class="list_text">
                                <a href="">坚持午睡竟有这么多好处!!!</a>
                                <p>美国阿勒格尼学院研究人员的最新研究发现，如果工作压力人员的最新研究如果工作压力人员的最新研究</p>
                            </div>
                        </div>
                        <div class="list_bottom">
                            <span>09/27</span>
                            <p>独一张</p>
                        </div>
                    </li>
                    <li>
                        <div class="list_top">
                            <div class="wei_img">
                                <img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_CMS.DS.'health_day_03.jpg';?>" alt="" width='65' height="65">
                            </div>
                            <div class="list_text">
                                <a href="">坚持午睡竟有这么多好处!!!</a>
                                <p>美国阿勒格尼学院研究人员的最新研究发现，如果工作压力人员的最新研究如果工作压力人员的最新研究</p>
                            </div>
                        </div>
                        <div class="list_bottom">
                            <span>09/27</span>
                            <p>独一张</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
</body>
</html>
<script>
    //移上去下拉 独易品
    let wait;
    $('#dyp').hover(
        function () {
            wait = setTimeout(() => {
                $('.dyw_list').slideDown('normal')
            }, 200)
        },
        function () {
            clearTimeout(wait);
            $('.dyw_list').slideUp('normal')
        }
    )
    //选项卡
    $('.nav li').click(function () {
        $(".nav li").find('p').removeClass('nav_active');
        $(".nav li").eq($(this).index()).find('p').addClass("nav_active");
        $(".news_cont_list").hide().eq($(this).index()).show();
    });
</script>














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