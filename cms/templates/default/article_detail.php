<?php defined('InShopNC') or exit('Access Invalid!');?>
<link rel="stylesheet" href="<?php echo CMS_TEMPLATES_URL;?>/css/cms/news_detail_sxy.css">
<!--中间内容部分-->
<section class="content_sxy">
    <!--左边列表-->
    <div class="left_content">
        <!--二级导航开始-->
        <div class="second_nav">
            <span>当前位置</span>
            <i>|</i>
            <a href="<?php echo urlCMS("index","index" )?>">首页</a>
            <img src="<?php echo CMS_TEMPLATES_URL?>/img/newslist_sxy/arrow_03.png" alt="">
            <a href="<?php echo urlCMS("article","article_index")?>">公司信息</a>
            <img src="<?php echo CMS_TEMPLATES_URL?>/img/newslist_sxy/arrow_03.png" alt="">
            <a href="<?php echo urlCMS("article",'article_list')?>">新闻列表</a>
            <img src="<?php echo CMS_TEMPLATES_URL?>/img/newslist_sxy/arrow_03.png" alt="">
            <a href="javascript:;" class="active">文章详情</a>
        </div>
        <!--二级导航结束-->
        <!--文章标题开始-->
        <div class="article_title">
            <h1><?php echo $output['article_detail']['article_title']?></h1>
            <div class="article_info">
                <div class="author"><span>发表人：</span><i><?php echo $output['article_detail']['article_author']?></i></div>
                <p></p>
                <div class="time"><?php echo $output['article_detail']['article_publish_time']?></div>
            </div>
        </div>
        <!--文章标题结束-->
        <!--文章内容开始-->
        <div class="article_content">
            <?php echo $output['article_detail']['article_content']?>
        </div>
        <!--文章内容结束-->
        <div class="article_copyright">
            <p>原创文章，作者：<?php echo $output['article_detail']['article_author']?>，如若转载，请注明出处：http://www.sxtaichang.com/</p>
            <p>更多资讯文章，可关注独一张微信公众号：sxtaichang</p>
        </div>
        <!--点赞开始-->
        <section id="like">
            <div class="article_like">
                <i class="iconfont">&#xe60d;</i>
                <h1>赞</h1>
                <span class="bracket_left">(</span>
                <p class="number_like"><?php echo $output["article_detail"]['article_click']?></p>
                <span>)</span>
            </div>
        </section>
        <script>
            $('.article_like').one('click', function () {
                $(this).addClass('had_like');
                let num = $('.number_like').html();
                num++;
                $('.number_like').html(num);
            })
        </script>
        <!--点赞结束-->
        <!--上一篇  下一篇开始-->
        <div class="up_low">
            <ul id="up_low_list">
                <li class="left">
                    <a href="<?php  if($output['pre_article']) {echo urlCMS("article","article_detail",array("article_id"=>$output['pre_article']['article_id']));}else {echo "javascript:;";}?>">
                        <img src="<?php echo CMS_TEMPLATES_URL?>/img/news_detail_sxy/news_detail_arrow_03.png" alt="">
                         <?php if($output['pre_article']) {?>
                        	<h1><?php echo str_cut($output['pre_article']['article_title'], 16)?></h1>
                        <?php }else{ ?>
                        	<h1>没有上一篇文章</h1>
                        <?php }?>
                        <span>上一篇</span>
                    </a>
                </li>
                <li class="right">
                    <a href="<?php  if($output['next_article']) {echo urlCMS("article","article_detail",array("article_id"=>$output['next_article']['article_id']));}else {echo "javascript:;";}?>">
                        <span>下一篇</span>
                         <?php if($output['next_article']) {?>
                        	<h1><?php echo str_cut($output['next_article']['article_title'], 16)?></h1>
                         <?php }else{ ?>
                        	<h1>没有下一篇文章</h1>
                        <?php }?>
                        <img src="<?php echo CMS_TEMPLATES_URL?>/img/news_detail_sxy/news_detail_arrow_06.png" alt="">
                    </a>
                </li>
            </ul>
        </div>
        <!--上一篇  下一篇结束-->
        <!--您可能感兴趣的文章开始-->
        <?php  if ($output['article_link_list']&&is_array($output['article_link_list'])) {?>
            <div class="interested_in">
                <div class="interest_title">
                    <img src="<?php echo CMS_TEMPLATES_URL?>/img/news_detail_sxy/interest_03.png" alt="">
                    <p>您可能感兴趣的文章</p>
                </div>
                <ul class="interest_list">
                    <?php foreach ($output['article_link_list'] as  $article) {?>
                        <li>
                            <a href="<?php echo urlCMS('article',"article_detail",array("article_id"=>$article['article_id']))?>" class="interest_img">
                                <img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_CMS.DS.'article/'.$article['article_image']['path'].'/'.$article['article_image']['name'];?>" alt="" width=183 height=121>
                            </a>
                            <a href="<?php echo urlCMS('article',"article_detail",array("article_id"=>$article['article_id']))?>" class="h1"><?php echo str_cut($article['article_title'], 20) ?></a>
                            <p><?php echo str_cut($article['article_abstract'], 80)?></p>
                        </li>
                    <?php }?>
                </ul>
            </div>
        <?php }?>
        <!--您可能感兴趣的文章结束-->
    </div>
    <!--右边-->
    <div class="right_content">
        <div class="top_img">
            <?php echo loadadv(11);?>
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
