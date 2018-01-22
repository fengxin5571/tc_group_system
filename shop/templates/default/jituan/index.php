<?php 
defined('InShopNC') or exit('Access Invalid!');
$wapurl = WAP_SITE_URL;
$agent = $_SERVER['HTTP_USER_AGENT'];
if(strpos($agent,"comFront") || strpos($agent,"iPhone") || strpos($agent,"MIDP-2.0") || strpos($agent,"Opera Mini") || strpos($agent,"UCWEB") || strpos($agent,"Android") || strpos($agent,"Windows CE") || strpos($agent,"SymbianOS")){
    global $config;
    if(!empty($config['wap_site_url'])){
        $url = $config['wap_site_url'].'/guidance.html';
       
    } else {
        $header("Location:$wapurl");
    }
    header('Location:' . $url);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $output['html_title'];?></title>
    <link rel="stylesheet" href="<?php echo SHOP_TEMPLATES_URL;?>/group/css/public_zn.css">
    <link rel="stylesheet" href="<?php echo SHOP_TEMPLATES_URL;?>/group/css/dyw_index_zn.css">
    <link rel="stylesheet" href="<?php echo SHOP_TEMPLATES_URL;?>/dw/css/easyui.css">
    <link rel="stylesheet" href="<?php echo SHOP_TEMPLATES_URL;?>/dw/css/icon.css">
    <!--<link rel="stylesheet" href="css/demo.css">-->
    <link rel="stylesheet" href="<?php echo SHOP_TEMPLATES_URL;?>/group/css/style.css">
    <script src="<?php echo SHOP_TEMPLATES_URL;?>/group/js/modernizr.custom.53451.js"></script>
    <script src="<?php echo SHOP_TEMPLATES_URL;?>/group/js/jquery.min.js"></script>
    <script src="<?php echo SHOP_TEMPLATES_URL;?>/group/js/animate.js"></script>

    <script type="text/javascript" src="<?php echo RESOURCE_SITE_URL?>/js/ckplayer/ckplayer.js"></script>
    <script type="text/javascript" src="http://z1-pcok6.kuaishangkf.com/bs/ks.j?cI=923744&fI=118829" charset="utf-8"></script>
</head>
<style>
.dyw_list {
    width: 170px;
    height: 172px;
    box-sizing: border-box;
    background: #fff;
    border-bottom-right-radius: 5px;
    border-bottom-left-radius: 5px;
    position: absolute;
    top: 70px;
    left: 0;
    z-index: 999;
    padding: 26px;
    box-shadow: 0 1px 5px rgba(0, 0, 0, 0.3);
    display: none;
    /* transition: all 0.6s ease; */
}
</style>
<body>
    <div id="login_zn">
        <p>  
        <?php if ($_SESSION['is_login']) {?>
            <span><a href="<?php echo urlShop('login','logout');?>">退出</a></span>
            <span>|</span>
            <span><a href="<?php echo urlShop('member','home');?>">个人中心</a></span>
            <span style="font-size:12px;color:#e5e5e5;margin-left:12px;margin-right:12px;">|</span>
            <span><a href="<?php echo urlShop('member','home');?>"><?php echo $_SESSION['member_name'];?></a></span>
            
         <?php } else {?>
            <span><a href="<?php echo urlShop("login","login")?>">登录</a></span>
            <span>|</span>
            <span><a href="<?php  echo urlShop("login","register")?>">注册</a></span>
        <?php }?>
        </p>
    </div>
    <header id="head_zn">
        <div id="head_box_zn">
            <a href="<?php echo BASE_SITE_URL;?>"  class="login_zn">
                <img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_COMMON.DS.$output['setting_config']['group_logo']; ?>" alt="">
            </a>
            <ul id="head_nav_box_zn">
                
                <?php if(!empty($output['nav_list']) && is_array($output['nav_list'])){?>
                <?php foreach($output['nav_list'] as $nav){?>
                <?php if($nav['nav_location'] == '4'){?>
                <?php if($nav['nav_title'] =="独易品") {?>
                <li class="head_list_zn" id="dyp">
                    <a  href="" class="name">
                        <?php echo $nav['nav_title']?>
                    </a>
                    <div class="dyw_list">
                        <p><a href="<?php echo urlShop("index","selfindex")?>">独易网</a></p>
                        <p><a href="<?php echo urlCMS("web_special","index",array("special_id"=>18))?>">独一张</a></p>
                        <p><a href="#">食维健</a></p>
                    </div>
                </li>
                
                <?php }else{?>
                <li class="head_list_zn">
                    <a  class="name" <?php
        if($nav['nav_new_open']) {
            echo ' target="_blank"';
        }
        switch($nav['nav_type']) {
            case '0':
                echo ' href="' . $nav['nav_url'] . '"';
                break;
            case '1':
                echo ' href="' . urlShop('search', 'index',array('cate_id'=>$nav['item_id'])) . '"';
                if (isset($_GET['cate_id']) && $_GET['cate_id'] == $nav['item_id']) {
                    echo ' class="current"';
                }
                break;
            case '2':
                echo ' href="' . urlShop('article', 'article',array('ac_id'=>$nav['item_id'])) . '"';
                if (isset($_GET['ac_id']) && $_GET['ac_id'] == $nav['item_id']) {
                    echo ' class="current"';
                }
                break;
            case '3':
                echo ' href="' . urlShop('activity', 'index', array('activity_id'=>$nav['item_id'])) . '"';
                if (isset($_GET['activity_id']) && $_GET['activity_id'] == $nav['item_id']) {
                    echo ' class="current"';
                }
                break;
            case '4':
                echo ' href="' . urlShop('video', 'video', array('vd_id'=>$nav['item_id'])) . '"';
                if (isset($_GET['vd_id']) && $_GET['vd_id'] == $nav['item_id']) {
                    echo ' class="current"';
                }
                break;
        }
        ?> >
                        <?php echo $nav['nav_title'] ?>
                    </a>
                </li>
                 <?php }?>
                <?php }?>
                <?php }?>
                <?php }?>
                <li class="head_list_zn">
                    <a  href="" class="name">
                        太常集团
                    </a>
                </li>
            </ul>
            <div class="search_box">
                <form class="search-form" method="get" action="<?php echo SHOP_SITE_URL;?>">
                <input type="hidden" value="search" id="search_act" name="act">
                 <input type="text" placeholder="搜索关键词" name="keyword">
                 <div class="search_zn"></div>
                 </form> 
            </div>
        </div>
    </header>
    <nav id="nav_zn" >
       <?php echo $output['web_html']['index_group'];?>
    </nav>
    <ul id="activity_zn">
        <li class="activity_list_zn">
            <?php echo rec(19,1);?>
            
        </li>
        <li class="activity_list_zn">
            <?php echo rec(18,1);?>
            
        </li>
        <li class="activity_list_zn">
            
                <?php echo rec(17,1);?>
               
 
        </li>
    </ul>
    <!-- 视频推荐start -->
    <div id="group_video_view">
    <?php echo $output['video_html']?>
    </div>
    <!-- 视频推荐end -->
    <!--健康资讯-->
    <!--  
<section id="health">
        <div class="health_title">
            <p></p>
            <h1>健康资讯</h1>
        </div>
        <div class="health_cont">
            <ul class="cont_list">
                <li>
                    <div class="recom_title_active">
                        <pre class="tit_eng">Recommended  Daily</pre>
                        <div class="tit_china">
                            <p>每日推荐</p>
                            <span></span>
                        </div>
                    </div>
                    <div class="recom_cont">
                        <ul>
                            <li>
                                <img src="<?php echo SHOP_TEMPLATES_URL?>/group/image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_12.jpg" alt="" class="img">
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_14.png" alt="" class="img">
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="hidden">
                    <div class="recom_title">
                        <pre class="tit_eng">Health  preservation</pre>
                        <div class="tit_china">
                            <p>天天养生</p>
                            <span></span>
                        </div>
                    </div>
                    <div class="recom_cont">
                        <ul>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_12.jpg" alt="" class="img">
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_14.png" alt="" class="img">
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="hidden">
                    <div class="recom_title">
                        <pre class="tit_eng">Health  preservation</pre>
                        <div class="tit_china">
                            <p>处处养生</p>
                            <span></span>
                        </div>
                    </div>
                    <div class="recom_cont">
                        <ul>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_12.jpg" alt="" class="img">
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_14.png" alt="" class="img">
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="hidden">
                    <div class="recom_title">
                        <pre class="tit_eng">Health  preservation</pre>
                        <div class="tit_china">
                            <p>人人养生</p>
                            <span></span>
                        </div>
                    </div>
                    <div class="recom_cont">
                        <ul>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_12.jpg" alt="" class="img">
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_06.png" alt="" class="gray">
                                <img src="image/image_zn/info_09.png" alt="" class="orange">
                                <p>世界上本没有太难的事，都是世界上本没有太难的事</p>
                                <pre>10/25</pre>
                            </li>
                            <li>
                                <img src="image/image_zn/info_14.png" alt="" class="img">
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <div class="more_info">
                <div class="more_title">
                    <pre>More  Raiders</pre>
                    <p>更多资讯</p>
                </div>
            </div>
        </div>
    </section>
   <section id="section_zn"> -->
     <!--我们产业-->
    <div id="our_domain_zn">
        <div id="our_domain_box_zn">
            <p class="activity_title_zn">
                <img src="<?php echo SHOP_TEMPLATES_URL?>/group/image/image_zn/activity_zn_02.png" alt=""  >
                我们的产业
            </p>
            <p class="parting_line_zn"></p>
            <ul class="our_domain_zn">
                <li class="our_domain_list_zn">
                    <a href="http://www.sxtaichang.com">
                        <p>独一张</p>
                        <span></span>
                        <img src="https://mini.s-shot.ru/1920x1200/JPEG/1920/Z100/?www.sxtaichang.com" alt="" width="380" height="285">
                    </a>
                </li>
                <li class="our_domain_list_zn">
                    <a href="http://www.shiweijian.com.cn">
                        <p>食维健</p>
                        <span></span>
                        <img src="https://mini.s-shot.ru/1920x1200/JPEG/1920/Z100/?www.shiweijian.com.cn" alt=""  width="380" height="285">
                    </a>
                </li>
                <li class="our_domain_list_zn">
                    <a href="<?php echo urlShop("index","selfindex")?>">
                        <p>独易网</p>
                        <span></span>
                        <img src="https://mini.s-shot.ru/1920x1200/JPEG/1920/Z100/?www.duyiwang.cn" alt="" width="380" height="285">
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div id="join_us_zn">
            <p class="activity_title_zn">
                <i class="iconfont">&#xe8b4;</i>
                加入我们
            </p>
            <p class="parting_line_zn"></p>
            <div class="container">
                <div id="dg-container" class="dg-container">
                    <div class="dg-wrapper">
                        <?php if($output['group_join'][0]['code_info']&&is_array($output['group_join'][0]['code_info'])) {?>
                        <?php foreach ($output['group_join'][0]['code_info'] as $val) {?>
                        <a href="<?php echo $val['pic_url'];?>"><img src="<?php echo UPLOAD_SITE_URL.'/'.$val['pic_img'];?>" alt="<?php echo $val['pic_name']?>"><div><?php echo $val["pic_name"]?></div></a>
                        <?php }?>
                        <?php }?>
                    </div>
                    <nav>
                        <span class="dg-prev">&lt;</span>
                        <span class="dg-next">&gt;</span>
                    </nav>
                </div>
            </div>
        </div>
   </section>
    <!--招商入住-->
    <div class="merchants">
        <ul>
            <?php if($output['group_recommend'][1]&&is_array($output['group_recommend'][1]['code_info'])) {?>
            <?php $i=1;?>
            <?php foreach ($output['group_recommend'][1]['code_info'] as $k=>$v) {?>
            <li class="<?php if($i==count($output['group_recommend'][1]['code_info'])){ echo "";}else{echo "hidden";}?>" >
                   <?php foreach($v['pic_list'] as $cv){?>
                    <?php if($cv['pic_img']) {?>
                        <img src="<?php echo UPLOAD_SITE_URL.DS.$cv['pic_img']?>" alt="" width="490px" height="354px">
                     <?php }?>
                    <?php }?>
            </li>
              <?php $i++;?>
             <?php }?>
            <?php }?>
        </ul>
    </div>
    <section id="section_zn">
        <div id="dynamic_zn">
            <p class="activity_title_zn">
                <img src="<?php echo SHOP_TEMPLATES_URL?>/group/image/image_zn/activity_zn_01.png" alt="">
                集团动态
            </p>
            <p class="parting_line_zn"></p>
            <div id="aggregative_zn">
                <div id="news_zn">
                    <p class="news_title_zn">
                        新闻动态
                    </p>
                    <ul class="news_box_zn">
                         <?php if($output['new_article']&&is_array($output["new_article"])) {?>
                         <?php foreach ($output['new_article'] as $k=>$article) {?>
                        <li class="news_list_zn">
                            <a <?php if($article['article_url']!=''){?>target="_blank"<?php }?> href="<?php if($article['article_url']!='')echo $article['article_url'];else echo urlShop('article', 'show', array('article_id'=>$article['article_id']));?>">
                                <span><?php echo sprintf("%02d",$k+1) ?></span>
                                <p><?php echo str_cut($article['article_title'], 70)?></p>
                            </a>
                            <i class="news_time_yyt" style="display: block;width: auto;
                            height: 30px;line-height: 20px;font-size:12px;color:#8c8c8c;padding-left: 39px;"><?php echo $article['article_time']?></i>
                        </li>
                        <?php }?>
                       <?php }?>
                    </ul>
                    <p class="look_more_news_zn">
                        <a href="<?php echo urlShop("article","article",array("ac_id"=>14))?>">更多新闻&gt;</a>
                    </p>
                </div>
                <div id="symposium_zn">
                    <p class="news_title_zn">
                        专题
                    </p>
                    <ul class="fixed_symposium_zn">
                        <li class="fixed_symposium_list_zn">
                               <?php echo rec(20,1);?>
                        </li>
                        <li class="fixed_symposium_list_zn">
                               <?php echo rec(21,1);?>
                        </li>
                        <li class="fixed_symposium_list_zn">
                            <?php echo rec(22,1);?>
                        </li>
                        <li class="fixed_symposium_list_zn">
                            <?php echo rec(23,1);?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
      
       
        
       
    </section>
    
    <footer id="foot_zn">
        <ul class="foot_box_zn">
            <li class="foot_list_zn">
                <p class="foot_title_zn">新手上路</p>
                <a href="<?php echo urlShop('member', 'home');?>">个人中心</a>
                <a href="">企业用户</a>
                <a href="<?php echo urlShop("article","",array('article_id'=>25)) ?>">合作伙伴</a>
                <a href="">新闻媒体</a>
            </li>
            <li class="foot_list_zn">
                <p class="foot_title_zn">特色服务</p>
                <a href="<?php echo urlShop("article","article",array('ac_id'=>2)) ?>">常见问题</a>
                <a href="">售后政策</a>
                <a href="">价格保护</a>
                <a href="">退换货政策</a>
            </li>
            <li class="foot_list_zn">
                <p class="foot_title_zn">服务支持</p>
                <a href="">公司账户</a>
                <a href="">自助服务</a>
                <a href="">故障申报</a>
                <a href="<?php echo urlShop("article","",array('article_id'=>23)) ?>">求职者</a>
            </li>
            <li class="foot_list_zn">
                <p class="foot_title_zn">关于我们</p>
                <a href="<?php echo urlShop("article","",array('article_id'=>22)) ?>">了解独易</a>
                <a href="<?php echo urlShop("article","",array('article_id'=>24)) ?>">加入独易</a>
                <a href="">新浪微博</a>
                <a href="<?php echo urlShop("article","",array('article_id'=>23)) ?>">联系我们</a>
            </li>
            <li class="foot_list_zn">
                <p class="foot_title_zn">官方微信</p>
                <img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_COMMON.DS.$GLOBALS['setting_config']['site_logowx']; ?>" alt="">
                <p class="tel_zn"><?php echo $GLOBALS['setting_config']['site_tel400']; ?></p>
            </li>
        </ul>
        <p class="foot_partling_zn"></p>
        <?php if(is_array($output['$link_list']) && !empty($output['$link_list'])) { ?>
            		  
        <p class="friendship_zn">
            <span>友情链接：</span>
            <?php 	foreach($output['$link_list'] as $key=>$val) {
            		  	    
            		  		if($val['link_pic'] == ''){
            		  ?>
            <?php if($key!=0) {?>
            <span class="parting_span">|</span>
            <?php }?>
            <a href="<?php echo $val['link_url']; ?>" title="<?php echo $val['link_title']; ?>"><?php echo str_cut($val['link_title'],15);?></a>
          
            
           
        
        <?php
            		  		}
            		 	}
            		 }
            		 ?>
         </p>
        <p class="foot_end_zn"><?php echo $output['setting_config']['icp_number']; ?></p>
        <p class="foot_end_zn"><?php echo html_entity_decode($output['setting_config']['statistics_code'],ENT_QUOTES); ?></p>
        <p class="foot_end_zn">reserved.</p>
    </footer>
     <script src="https://qiyukf.com/script/b1ef49bc1fdf5ed87212333682e6d15a.js"></script>
     <script type="text/javascript">
            window.openSDK = function(){
                ysf.open();
            }
     </script>
   
    <script src="<?php echo SHOP_TEMPLATES_URL;?>/group/js/index.js"></script>
    <script src="<?php echo SHOP_TEMPLATES_URL;?>/group/js/jquery.gallery.js"></script>
    <script src="<?php echo SHOP_RESOURCE_SITE_URL;?>/js/jquery.easyui.min.js"></script>
    <script>
    //移上去下拉 独易品
    let wait;
    $('#dyp').hover(
        function () {
            wait=setTimeout(()=>{
                $('.dyw_list').slideDown('normal')
            },200)
        },
        function () {
            clearTimeout(wait);
            $('.dyw_list').slideUp('normal')
        }
    )

    
        var search_flag_zn=true;
        $('.search_zn').click(function(){
            if(search_flag_zn==true){
                $('.search_box_zn').show();
                search_flag_zn=false;
            }else{
                $('.search_box_zn').hide();
                search_flag_zn=true;
            }
        })
//        轮播图
        $(function(){
            $('#dg-container').gallery();
            //第一张显示
            $(".pic li").eq(0).show();
            //鼠标滑过手动切换，淡入淡出
            $("#position li").mouseover(function() {
                $(this).addClass('cur').siblings().removeClass("cur");
                var index = $(this).index();
                i = index;//不加这句有个bug，鼠标移出小圆点后，自动轮播不是小圆点的后一个
                // $(".pic li").eq(index).show().siblings().hide();
                $(".pic li").eq(i).fadeIn(1500).siblings().fadeOut(1500);
            });
            //自动轮播
            var i=0;
            var timer=setInterval(play,3000);
            //向右切换
            function play(){
                i++;
                i = i > 2 ? 0 : i ;
                $("#position li").eq(i).addClass('cur').siblings().removeClass("cur");
                $(".pic li").eq(i).fadeIn(1500).siblings().fadeOut(1500);
            }
            //向左切换
            function playLeft(){
                i--;
                i = i < 0 ? 2 : i ;
                $("#position li").eq(i).addClass('cur').siblings().removeClass("cur");
                $(".pic li").eq(i).fadeIn(1500).siblings().fadeOut(1500);
            }
            //鼠标移入移出效果
            $("#container").hover(function() {
                clearInterval(timer);
            }, function() {
                timer=setInterval(play,3000);
            });
            //左右点击切换
            $("#prev").click(function(){
                playLeft();
            })
            $("#next").click(function(){
                play();
            })
            $('.prompt_list_zn .fixed_icon_zn').click(function(){
                $('.leave_tel_zn').show();
            })
            $('.click_close_zn').click(function(){
                $('.leave_tel_zn').hide();
            })
            $('.check_zn label').change(function(){
                $(this).siblings().children('img').attr('src','<?php echo SHOP_TEMPLATES_URL;?>/group/image/image_zn/check_gray_zn.jpg');
                $(this).children('img').attr('src','<?php echo SHOP_TEMPLATES_URL;?>/group/image/image_zn/check_sure_zn.jpg');
            })
        });
        
    </script>
    <style>
    <?php  if(file_get_contents($output['bomb_path'])) {?>
    .mask {    
      position: absolute; top: 0px; filter: alpha(opacity=60); background-color: transparent;;   
      z-index: 1002; left: 0px;   
      opacity:0.5; -moz-opacity:0.5;   
    }   
    </style>
    <script>
    $(function(){
    	$("#mask").css("height",$(document).height());   
    	$("#mask").css("width",$(document).width());   
    	$("#mask").show();   
    	popup($("#show_time"));
    	var value = $('#p').progressbar('getValue');
		if (value < 100){
			value += Math.floor(Math.random() * 10);
			$('#p').progressbar('setValue', value);
			setTimeout(arguments.callee, 1000);
		}
		if(value==100){
			$.ajax({
				url:"index.php?act=index&op=bomb",
				data:{inajax:1},
				success:function(data){
					 if(data==true){
								alert("ok");
						 }else{
							 alert("erorr");
							 }
					}
				});
			}
    });
    </script>
    <?php echo file_get_contents($output['bomb_path'])?>
    <?php }?>
</body>
<script>
function popup(popupName){
    var _scrollHeight = $(document).scrollTop(),//获取当前窗口距离页面顶部高度
    _windowHeight = $(window).height(),//获取当前窗口高度
    _windowWidth = $(window).width(),//获取当前窗口宽度
    _popupHeight = popupName.height(),//获取弹出层高度
    _popupWeight = popupName.width();//获取弹出层宽度
    _posiTop = (_windowHeight - _popupHeight)/2 + _scrollHeight;
    _posiLeft = (_windowWidth - _popupWeight)/2;
    popupName.css({"left": _posiLeft + "px","top":_posiTop + "px","display":"block","position": "absolute"});//设置position
}


</script>
</html>