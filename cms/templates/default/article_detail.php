<?php defined('InShopNC') or exit('Access Invalid!');?>
<link rel="stylesheet" href="<?php echo CMS_TEMPLATES_URL;?>/css/cms/jky_details_sxy.css">
<script src="<?php echo RESOURCE_SITE_URL;?>/js/cms/cms_animate.js"></script>
<style>

</style>
<div class="details_content">
    <div id="details_box">
        <div id="details_left">
            <!--标题-->
           	<div class="jump_title">
            <p><a href="<?php echo urlShop('index','groupindex')?>">首页</a></p>
            <img src="<?php echo CMS_TEMPLATES_URL.DS.'/images/cms/news_list_03.png';?>" alt="">
            <p><a href="<?php echo urlCMS('index','index');?>">健康云</a></p>
            <img src="<?php echo  CMS_TEMPLATES_URL.DS.'/images/cms/news_list_03.png';?>" alt="">
            <p class="show"><?php echo $output['article_detail']['article_title'];?></p>
            </div>
            <!--文章内容-->
  			<div class="article_details">
                <h1 class="article_title"><?php echo $output['article_detail']['article_title'];?></h1>
                <div class="article_author">
                    <p class="author"><?php echo $output['article_detail']['article_author'];?></p>
                    <span></span>
                    <p class="article_time"><?php echo date('Y.m.d',$output['article_detail']['article_publish_time']);?></p>
                </div>
               
   				<?php echo $output['article_detail']['article_content']; echo'<br/><br/><br/>'?>
   				
                <div class="article_copyright">
                    <p>原创文章，作者：<?php echo $output['article_detail']['article_author'];?>，如若转载，请注明出处：<?php if($output['article_detail']['article_origin_address']){echo $output['article_detail']['article_origin_address'];}else{echo 'www,duyiwang.cn';}?></p>
                    <p>如果您的产品或项目希望被独易网报道，欢迎联系独易网公众号，微信号：dyw20170922</p>
                </div>
                <!--点赞-->
                <section id="like">
                    <div class="article_like">
                        <i class="iconfont">&#xe600;</i>
                        <h1>赞</h1>
                        <span class="bracket_left">(</span>
                        <p class="number_like">22</p>
                        <span>)</span>
                    </div>
                </section>
                <script>
                    //                    $('.article_like').click(function () {
                    //                        if($(this).hasClass('had_like')){
                    //                           let num=$('.number_like').html();
                    //                            num++;
                    //                            $('.number_like').html(num);
                    //                        }else{
                    //                            $(this).addClass('had_like');
                    //                            let num=$('.number_like').html();
                    //                            num++;
                    //                            $('.number_like').html(num);
                    //                        }
                    //                    });

                    $('.article_like').one('click', function () {
                        $(this).addClass('had_like');
                        let num = $('.number_like').html();
                        num++;
                        $('.number_like').html(num);
                    })
                </script>
                <!--上一篇  下一篇-->
                <div class="up_low">
                    <ul id="up_low_list">
                    <?php if(!empty($output['pre_article']) && is_array($output['pre_article'])){?>
                        <li class="left">
                            <a href="<?php echo urlCMS('article','article_detail',array('article_id'=>$output['pre_article']['article_id']))?>">
                                <img src="<?php echo CMS_TEMPLATES_URL.DS.'/images/cms/details_sxy_08.png';?>" alt="">
                                <h1><?php echo str_cut($output['pre_article']['article_title'], 18);?></h1>
                                <span>上一篇</span>
                            </a>
                        </li>
                    <?php }else{?>
                    	<li class="left">
                            <a href="">
                                <img src="<?php echo CMS_TEMPLATES_URL.DS.'/images/cms/details_sxy_08.png';?>" alt="">
                                <h1><?php echo '没有上一篇文章'?></h1>
                                <span>上一篇</span>
                            </a>
                        </li>
                    <?php }?>
                    <?php if(!empty($output['next_article']) && is_array($output['next_article'])){?>
                        <li class="right">
                            <a href="<?php echo urlCMS('article','article_detail',array('article_id'=>$output['next_article']['article_id']))?>">
                                <span>下一篇</span>
                                <h1><?php echo str_cut($output['next_article']['article_title'], 18)?></h1>
                                <img src="<?php echo CMS_TEMPLATES_URL.DS.'/images/cms/details_sxy_09.png';?>" alt="">
                            </a>
                        </li>
                    <?php }else{?>
                        <li class="right">
                            <a href="">
                                <span>下一篇</span>
                                <h1><?php echo '没有下一篇文章'?></h1>
                                <img src="<?php echo CMS_TEMPLATES_URL.DS.'/images/cms/details_sxy_09.png';?>" alt="">
                            </a>
                    	</li>
                    <?php }?>
                    </ul>
                </div>
            </div>
            <!--您可能感兴趣的文章-->
            <?php if(is_array($output['article_link_list']) && !empty($output['article_link_list'])){?>
            <div class="interest_article">
                <div class="interest_title">
                    <img src="<?php echo CMS_TEMPLATES_URL.DS.'/images/cms/details_sxy_10.jpg';?>" alt="">
                    <p>您可能感兴趣的文章</p>
                </div>
                <ul class="int_art_list">
               <?php foreach($output['article_link_list'] as $article_link){?> 
                    <li>
                        <div class="int_art_img">
                            <img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_CMS.DS.'article/admin_1/'.$article_link['article_image']['name'];?>" alt="">
                        </div>
                        <a href=""><?php echo str_cut($article_link['article_title'], 30);?></a>
                        <p><?php echo str_cut($article_link['article_abstract'], 70);?></p>
                    </li>
                <?php }?>                     
                </ul>
            </div>
            <?php }else{echo '<br/><br/><br/>';}?>
            <!--评论区域-->
            <div class="article_comment">
             <?php if(intval(C('cms_comment_flag')) === 1) { ?>
                  <section class="article-comment"> 
                    <!-- 评论 -->
                    <?php require('comment.php');?>
                  </section>
                <?php } ?>
<!--                 <div class="art_com_title"> -->
<!--                     <img src="image/jky_details_sxy/details_sxy_12.png" alt=""> -->
<!--                     <p>参与评论</p> -->
<!--                 </div> -->
<!--                 <div class="comment_area"> -->
<!--                     <div class="com_area_bg"> -->
<!--                         <textarea id="comment_content">请登录后参与评论...</textarea> -->
<!--                     </div> -->
<!--                     <div class="comment_button"> -->
<!--                         <p>登录后即可参与评论</p> -->
<!--                         <button class="submit_comment">提交评论</button> -->
<!--                     </div> -->
<!--                 </div> -->
                <!--评论列表-->
<!--                 <div class="comment_list"> -->
<!--                     <div class="comment_list_title"> -->
<!--                         <img src="image/jky_details_sxy/details_sxy_13.png" alt=""> -->
<!--                         <p>全部评论</p> -->
<!--                         <span></span> -->
<!--                     </div> -->
<!--                     <div class="comment_lists"> -->
<!--                         <div class="no_comment"> -->
<!--                             <img src="image/jky_details_sxy/details_sxy_14.png" alt=""> -->
<!--                             <p>还没有人来评论哦~</p> -->
<!--                         </div> -->
<!--                         <ul id="com_list"> -->
                            <!--<li>-->
                            <!--<div class="com_person_img">-->
                            <!--<img src="image/jky_details_sxy/person_img_03.png" alt="">-->
                            <!--</div>-->
                            <!--<div class="com_cont">-->
                            <!--<p class="com_name">数字小姐</p>-->
                            <!--<p class="comment_content">哇，看来必须注意了</p>-->
                            <!--<div class="com_time">-->
                            <!--<p class="time">09/26 09:00</p>-->
                            <!--<p class="reply">回复</p>-->
                            <!--<div class="com_like">-->
                            <!--<i class="iconfont">&#xe600;</i>-->
                            <!--<span>(</span>-->
                            <!--<p class="number_like">0</p>-->
                            <!--<span>)</span>-->
                            <!--</div>-->
                            <!--</div>-->
                            <!--<div class="reply_area">-->
                            <!--<div class="reply_area_bg">-->
                            <!--<textarea id="comment_reply">写评论...</textarea>-->
                            <!--</div>-->
                            <!--<button class="submit_reply">发表</button>-->
                            <!--</div>-->
                            <!--&lt;!&ndash;回复内容&ndash;&gt;-->
                            <!--<div class="replay_content">-->
                            <!--&lt;!&ndash;<div class="replay_list">&ndash;&gt;-->
                            <!--&lt;!&ndash;<p class="replay_name">数字小姐</p>&ndash;&gt;-->
                            <!--&lt;!&ndash;<span>：</span>&ndash;&gt;-->
                            <!--&lt;!&ndash;<p class="replay_cont">啦啦啦</p>&ndash;&gt;-->
                            <!--&lt;!&ndash;</div>&ndash;&gt;-->
                            <!--</div>-->
                            <!--</div>-->
                            <!--</li>-->
<!--                         </ul> -->
<!--                     </div> -->
<!--                 </div> -->
            </div>
        </div>
        <div id="details_right">
            <div class="art_author_jieshao">
                <div class="author_photo">
                    <div>
                        <?php if($output['article_detail']['article_type']==1) {?>
                        <img src="<?php echo CMS_TEMPLATES_URL."/images/cms/dywadmin.png";?>" alt="">
                        <?php }else {?>
                        <?php if($output['article_detail']['member_info']['member_avatar']) {?>
                        <img src="<?php echo UPLOAD_SITE_URL."/shop/avatar/".$output['article_detail']['member_info']['member_avatar'];?>" alt="">
                        <?php }else{?>
                        <img src="<?php echo UPLOAD_SITE_URL."/shop/common/default_user_portrait.gif";?>" alt="">
                        <?php }?>
                        <?php }?>
                    </div>
                </div>
                <div class="author_name">
                    <p class="name_"><?php echo $output['article_detail']['article_author'];?></p>
                    <span></span>
                    <p class="position"><?php if($output['article_detail']['article_type']=='1'){echo '独易网管理员';}else{echo "独易网会员";}?></p>
                </div>
                <?php if($output['article_detail']['article_type']=='1') {?>
                <div class="author_info">独易网管理员 ，微信：dyw20170922</div>
                <?php }else {?>
                <div class="author_info">独易网会员 ，邮箱：<?php echo $output['article_detail']['member_info']['member_email']?></div>
                <?php }?>
                <div class="author_works">
                    <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/details_sxy_10.jpg';?>" alt="">
                    <span>共发表</span>
                    <p class="article_num"><?php echo count($output['author_article_list'])?></p>
                    <span>篇</span>
                </div>
                <ul class="author_art_list">
                    <?php if($output['author_article_list']&&is_array($output['author_article_list'])) { $num=0; ?>
                    <?php foreach ($output['author_article_list'] as $key=> $article) {?>
                    <?php if($num>4){break;}?>
                    <li>
                        <a href="<?php echo urlCMS("article","article_detail",array("article_id"=>$article['article_id']))?>" class="author_art_list_title"><?php echo str_cut($article['article_title'], 20)?></a>
                        <div>
                            <p class="author_art_list_time"><?php echo date("Y-m-d h:i:s",$article['article_publish_time'])?></p>
                            <p class="author_art_list_from">健康云</p>
                        </div>
                    </li>
                  <?php $num++;} ?>
                  <?php }?>
                </ul>
            </div>
            <div class="right_img">
            <?php echo loadadv(1061);?>
<!--                 <img src="image/jky_details_sxy/details_sxy_11.png" alt=""> -->
            </div>
            <div class="right_img">
            <?php echo loadadv(1062);?>
               <!--  <img src="image/jky_details_sxy/details_sxy_11.png" alt=""> -->
            </div>
        </div>
    </div>
</div>
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

    //点赞
    $('#com_list').on('click', '.com_like', function (e) {
        var zNum = $(this).find('.number_like').html();
        if ($(this).is('.active')) {
            zNum--;
            $(this).removeClass('active');
            $(this).find('.number_like').html(zNum);
        } else {
            zNum++;
            $(this).addClass('active');
            $(this).find('.number_like').html(zNum);
        }

    })
</script>



<!--
<script type="text/javascript" src="<?php echo CMS_RESOURCE_SITE_URL;?>/js/waypoints.js"></script>
<script type="text/javascript">
 $(document).ready(function(){
	//侧边滚动上传图片列表
	 $('#articleTool-holder').waypoint(function(event, direction) {
        $(this).parent().parent().toggleClass('sticky', direction === "down");
        event.stopPropagation();
    }); 
});

//更改字体大小
var status0='';
var curfontsize=10;
var curlineheight=18;
function fontZoomA(){
  if(curfontsize>8){
    document.getElementById('text').style.fontSize=(--curfontsize)+'pt';
 document.getElementById('text').style.lineHeight=(--curlineheight)+'pt';
  }
}
function fontZoomB(){
  if(curfontsize<64){
    document.getElementById('text').style.fontSize=(++curfontsize)+'pt';
 document.getElementById('text').style.lineHeight=(++curlineheight)+'pt';
  }
}
</script>

<div class="warp-all article-layout-a">
  <div class="mainbox">
    <div class="sitenav-bar">
      <div class="sitenav"><?php echo $lang['current_location'];?><?php echo $lang['nc_colon'];?> <a href="<?php echo CMS_SITE_URL;?>"><?php echo $lang['cms_site_name'];?></a> > <a href="<?php echo CMS_SITE_URL.DS.'index.php?act=article&op=article_list';?>"><?php echo $lang['cms_article'];?></a></div>
    </div>
    <article class="article-detail-content">
      <header id="articleTool-holder">
        <h1 class="article-title"><?php echo $output['article_detail']['article_title'];?></h1>
        <p class="article-sub"> <span class="author"><?php echo $lang['cms_text_publisher'];?><?php echo $lang['nc_colon'];?><?php echo empty($output['article_detail']['article_author'])?$lang['cms_text_guest']:$output['article_detail']['article_author'];?></span> <span class="source"><?php echo $lang['cms_text_origin'];?><?php echo $lang['nc_colon'];?> <a href="<?php echo empty($output['article_detail']['article_origin_address'])?CMS_SITE_URL:$output['article_detail']['article_origin_address'];?>" target="_blank"> <?php echo empty($output['article_detail']['article_origin'])?C('site_name'):$output['article_detail']['article_origin'];?> </a></span><span class="date"><?php echo date('Y-m-d',$output['article_detail']['article_publish_time']);?></span> <span class="PV" title="<?php echo $lang['cms_text_view_count'];?>"><i></i><?php echo $lang['cms_text_view'];?><em>(<b><?php echo $output['article_detail']['article_click'];?></b>)</em></span> <span id="btn_sns_share" data-title="<?php echo $output['article_detail']['article_title'];?>" data-image="<?php echo getCMSArticleImageUrl($output['article_detail']['article_attachment_path'], $output['article_detail']['article_image'], 'list');?>" data-publisher="<?php echo empty($output['article_detail']['article_author'])?$lang['cms_text_guest']:$output['article_detail']['article_author'];?>" data-origin="<?php echo empty($output['article_detail']['article_origin'])?C('site_name'):$output['article_detail']['article_origin'];?>" data-publish_time="<?php echo date('Y-m-d',$output['article_detail']['article_publish_time']);?>" data-abstract="<?php echo $output['article_detail']['article_abstract'];?>" class="cms-share" title="<?php echo $lang['cms_text_share_count'];?>"><i></i><font><?php echo $lang['cms_text_share'];?></font><em>(<b><?php echo $output['article_detail']['article_share_count'];?></b>)</em></span> </p>
        <ul class="article-toolbar" id="articleTool">
          <li><a href="javascript:fontZoomB()" class="zoomb" title="<?php echo $lang['font_zoom_b'];?>"><?php echo $lang['font_zoom_b'];?></a></li>
          <li><a href="javascript:fontZoomA()" class="zooma" title="<?php echo $lang['font_zoom_a'];?>"><?php echo $lang['font_zoom_a'];?></a></li>
          <li class="none"><a href="Javascript: void(0);" onmousedown="document.execCommand('saveAs');" title="<?php echo $lang['cms_text_saveas'];?>" class="saveas"><?php echo $lang['cms_text_saveas'];?></a></li>
          <li><a href="Javascript: void(0);" onmousedown="window.print();" class="print" title="<?php echo $lang['cms_text_print'];?>"><?php echo $lang['cms_text_print'];?></a></li>
          <li><a href="Javascript: void(0);" onmousedown="window.close();" class="close" title="<?php echo $lang['cms_text_close'];?>"><?php echo $lang['cms_text_close'];?></a></li>
        </ul>
      </header>
      <p class="article-preface"><?php echo $output['article_detail']['article_abstract'];?></p>
      <!-- 正文 -->
   <!--    <section class="article-body" id="text"><?php echo $output['article_detail']['article_content'];?>
        <?php if(!empty($output['article_goods_list'])) { ?>
        <div class="article-related-goods"> 
          <!-- 相关商品 -->
 <!--           <h3><?php echo $lang['cms_article_goods'];?></h3>
          <?php foreach($output['article_goods_list'] as $value) { ?>
          <dl>
            <dt class="goods-name"><a target="_blank" href="<?php echo $value['url']?>"> <?php echo $value['title'];?> </a> </dt>
            <dd class="goods-pic"><a target="_blank" href="<?php echo $value['url']?>"><img src="<?php echo $value['image'];?>" title="<?php echo $value['title'];?>"> </a></dd>
            <dd class="goods-price"><?php echo $lang['cms_price'];?><?php echo $lang['nc_colon'];?><em><?php echo $value['price'];?></em></dd>
            <dd class="goods-handle"><a target="_blank" href="<?php echo $value['url']?>"><?php echo $lang['cms_goods_detail'];?></a></dd>
          </dl>
          <?php } ?>
        </div>
        <?php } ?>
        <!-- 关键字 -->
    <!--     <div class="article-tag"><?php echo $lang['cms_keyword'];?><?php echo $lang['nc_colon'];?>
          <?php if(!empty($output['article_detail']['article_keyword'])) { ?>
          <?php $article_keyword_array = explode(',', $output['article_detail']['article_keyword']);?>
          <?php foreach ($article_keyword_array as $value) {?>
          <a href="<?php echo CMS_SITE_URL.DS;?>index.php?act=article&op=article_search&keyword=<?php echo $value;?>" target="_blank"><?php echo $value;?></a>
          <?php } ?>
          <?php } ?>
        </div>
      </section>
      <section class="article-related-articles"> 
        <!-- 相关文章 -->
          <?php if(!empty($output['article_link_list'])) { ?>
   <!--     <h3><?php echo $lang['cms_other_article'];?></h3>
        <ul>
          <?php foreach($output['article_link_list'] as $value) { ?>
          <li><a target="_blank" href="<?php echo getCMSArticleUrl($value['article_id']);?>"> <?php echo $value['article_title'];?> </a> </li>
          <?php } ?>
        </ul>
          <?php } ?>
      </section>
      <?php if(intval(C('cms_attitude_flag')) === 1) { ?>
      <section  class="article-attitude"> 
        <!-- 心情 -->
        <?php // require('article_attitude.php');?>
  <!--     </section>
      <?php } ?>
      <?php if(intval(C('cms_comment_flag')) === 1) { ?>
      <section class="article-comment"> 
        <!-- 评论 -->
        <?php //require('comment.php');?>
  <!--   </section>
      <?php } ?>
    </article>
  </div>
  <div class="sidebar">
    <?php //require('article_list.sidebar.php');?>
  </div>
</div>
<?php //require('widget_sns_share.php');?> 
 -->  

