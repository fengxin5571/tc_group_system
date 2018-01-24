<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $output['special_file']['special_title']?></title>
    <style>
    #head_box_zn a {
    	color: #69443e;
    }
    .head_list_zn:hover a.name {
        background-color: #B49C8A;
    	color: #e9d9bf;
        font-weight: normal;
    }
    .foot_end_zn a{
	 color: #e9d9bf;
    }
   </style>
    <link rel="stylesheet" href="<?php echo CMS_TEMPLATES_URL?>/css/special/public_zn.css">
    <link rel="stylesheet" href="<?php echo CMS_TEMPLATES_URL?>/css/special/header.css">
    <link rel="stylesheet" href="<?php echo CMS_TEMPLATES_URL?>/css/special/footer.css">
    <link rel="stylesheet" href="<?php echo CMS_TEMPLATES_URL?>/css/special/style1/dyz_index_sxy.css">
    <script src="<?php echo CMS_TEMPLATES_URL ?>/js/jquery.min.js"></script>
    <script src="<?php echo CMS_TEMPLATES_URL ?>/js/animate.js"></script>
    <script type="text/javascript" src="<?php echo RESOURCE_SITE_URL?>/js/ckplayer/ckplayer.js"></script>
</head>
<body>

<!--登录注册-->
<div id="login_zn" style="background-color: #69443e;">
    <p>
        <?php if($_SESSION['is_login'] == '1'){?>
        <span ><a href="<?php echo urlShop('login','logout');?>" style="color: #e9d9bf;">退出</a></span>
        <span style="color: #e9d9bf;">|</span>
        <span><a href="<?php echo urlShop('member','home');?>" style="color: #e9d9bf;">个人中心</a></span>
        <span style="font-size:12px;color:#e5e5e5;margin-left:12px;margin-right:12px;" style="color: #e9d9bf;">|</span>
        <span><a href="<?php echo urlShop('member','home');?>" style="color: #e9d9bf;"><?php echo $_SESSION['member_name'];?></a></span>
        <?php }else {?>
        <span><a href="<?php echo urlShop("login","login")?>" style="color: #e9d9bf;">登录</a></span>
        <span style="color: #e9d9bf;">|</span>
        <span><a href="<?php  echo urlShop("login","register")?>" style="color: #e9d9bf;">注册</a></span>
        <?php }?>
    </p>
</div>
<!--导航条-->
<header id="head_zn" style="background-color: #e9d9bf;">
    <div id="head_box_zn">
        <a href="<?php echo urlCMS("web_special","index",array('special_id'=>$output['special_file']['special_id']))?>" class="login_zn" style="margin-top: 2px;margin-right: 50px;">
            <img src="<?php echo UPLOAD_SITE_URL.DS.'cms'.DS.'special'.DS.$output['special_file']['special_logo']?>" alt="<?php echo $output['special_file']['special_title']?>" width="166" height="60" style="width:166px;height:60px">
        </a>
        <ul id="head_nav_box_zn">
           
            
              <?php if(!empty($output['nav_list']) && is_array($output['nav_list'])){?>
               <?php foreach($output['nav_list'] as $nav){?>
                <?php if($nav['special_id'] == $output["special_file"]['special_id']){?>
                <?php if($nav['nav_title']=="独易品"){?>
                <li class="head_list_zn" id="dyp">
                    <a href="" class="name">
                        独易品
                    </a>
                    <div class="dyw_list">
                        <p><a href="<?php urlShop("index","selfindex")?>">独易网</a></p>
                        <p><a href="<?php echo urlCMS("web_special","index",array("special_id"=>18))?>">独一张</a></p>
                        <p><a href="#">食维健</a></p>
                    </div>
                </li>
                <?php } else {?>
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
        </ul>
        <!--搜索-->
        <div class="search_box" style="border: 1px solid #69443e;">
            <form action="">
                <input type="text" placeholder="搜索关键词" style="background-color: #e9d9bf;">
                <div class="search_zn"></div>
            </form>
        </div>
    </div>
</header>
<!--轮播图-->
 <?php if($output['special_file']['code_info']['screen_list']&&is_array($output['special_file']['code_info']['screen_list'])) {?>
<nav id="banner">
    <ul class="pic">
        <?php foreach ($output['special_file']['code_info']['screen_list'] as $pic) {?>
        <li><a href="<?php echo $pic['pic_url']?>"><img src="<?php echo UPLOAD_SITE_URL.DS.$pic['pic_img']?>" alt=""></a></li>
        <?php }?>
    </ul>
    <ul id="position">
       <?php foreach ($output['special_file']['code_info']['screen_list'] as $key=> $pic) {?>
        <li class="<?php if ($key==1){echo "cur";}?>"></li>
        <?php }?>
    </ul>
    <ul class="banner_arrow">
        <a href="javascript:;" id="prev" class="arrow">
            <img src="<?php echo CMS_TEMPLATES_URL?>/images/special/arrow_03.png" alt="" class="arrow_white">
            <img src="<?php echo CMS_TEMPLATES_URL?>/images/special/arrow_yellow_03.png" alt="" class="arrow_yellow">
        </a>
        <a href="javascript:;" id="next" class="arrow">
            <img src="<?php echo CMS_TEMPLATES_URL?>/images/special/arrow_05.png" alt="" class="arrow_white">
            <img src="<?php echo CMS_TEMPLATES_URL?>/images/special/arrow_yellow_05.png" alt="" class="arrow_yellow">
        </a>
    </ul>
</nav>
<?php }?>
<!--四块介绍-->
<div id="dyz_introduce">
    <ul class="dyz_introduce_list">
        <li>
            <div>
                <img src="<?php echo CMS_TEMPLATES_URL?>/images/special/dyz_index_sxy/dyz_index_03.png" alt="">
                <h1>近千家</h1>
            </div>
            <p>加盟店面遍布全国</p>
        </li>
        <li>
            <div>
                <img src="<?php echo CMS_TEMPLATES_URL?>/images/special/dyz_index_sxy/dyz_index_04.png" alt="">
                <h1>200年</h1>
            </div>
            <p>历史传承 非遗保护</p>
        </li>
        <li>
            <div>
                <img src="<?php echo CMS_TEMPLATES_URL?>/images/special/dyz_index_sxy/dyz_index_05.png" alt="">
                <h1>一站式</h1>
            </div>
            <p>实战培训 广告支持</p>
        </li>
        <li>
            <div>
                <img src="<?php echo CMS_TEMPLATES_URL?>/images/special/dyz_index_sxy/dyz_index_02.png" alt="">
                <h1>100万人</h1>
            </div>
            <p>每年在独一张健康复</p>
        </li>
    </ul>
</div>
<!--视频专区-->
<div id="group_video_view">
<?php echo $output['video_html']?>
</div>

<!--公司简介-->
<div id="company_profile">
    <img src="<?php echo CMS_TEMPLATES_URL?>/images/special/dyz_index_sxy/dyz_index_title_06.png" alt="" class="dyz_index_title">
    <section class="dyz_company">
        <div class="company_img">
            <img src="<?php echo UPLOAD_SITE_URL.DS.'cms'.DS.'special'.DS.$output['special_file']['special_background']?>" alt="<?php echo $output["special_file"]['special_title']?>">
        </div>
        <div class="company_introduce">
            <img src="<?php echo CMS_TEMPLATES_URL?>/images/special/dyz_index_sxy/dyz_index_company_03.png" alt="" class="com_intro_title">
            <div class="company_title">
                <h1>山西太常生物科技有限公司</h1>
                <h2>公/司/文/化</h2>
            </div>
            <p class="company_content">山西太常生物科技有限公司是一家专业从事风湿骨病康复，并以此为基础综合改善各种慢性病及亚健康症状的健康调理机构，是国内风湿骨病、慢性病调理行业的开创者和领导者。</p>
            <p>公司当前在全国共3个生产研发中心，拥有骨病、慢性病调理中行经过市场十年以上验证的四大王牌产品。为给顾客提供更多更好的服务，公司积极推进“互联网+健康调理”工程通过与太常集团独易网的合作， 为顾客提供了多种远程健康服务。同时【太常·独一张】作为太常独易网的实体服务门店，还将全国百行百业的优质产品和生活便利服务提供给顾客，帮助顾客打造优选好生活。</p>
        </div>
    </section>
</div>
<!--关于总部-->
<div id="about_head">
    <img src="<?php echo CMS_TEMPLATES_URL?>/images/special/dyz_index_sxy/dyz_index_title_08.png" alt="" class="dyz_index_title">
    <ul class="about_instrouce">
        <li>
            <a href="<?php echo urlCMS("article","article_list",array("class_id"=>25))?>">
                <div class="about_title">
                    <img src="<?php echo CMS_TEMPLATES_URL?>/images/special/dyz_index_sxy/dyz_index_about_04.png" alt="">
                    <h1>新闻资讯</h1>
                </div>
                <p class="about_line"></p>
                <p class="about_content">内病外治、自然疗法是时间健康发展的大趋势，太常·独一张是国内顶级骨健康及慢性病调理专业机构，有着十年的市场验证！</p>
            </a>
        </li>
        <li>
            <a href="javascript:;">
                <div class="about_title">
                    <img src="<?php echo CMS_TEMPLATES_URL?>/images/special/dyz_index_sxy/dyz_index_about_05.png" alt="">
                    <h1>总部支持</h1>
                </div>
                <p class="about_line"></p>
                <p class="about_content">太常·独一张总部提供品牌支持、培训支持、开业支持、物料支持、宣传支持、管理支持、活动支持、专家支持等全方位支持，并提供全面详细的专业知识培训和内部交流平台。</p>
            </a>
        </li>
        <li>
            <a href="javascript:;">
                <div class="about_title">
                    <img src="<?php echo CMS_TEMPLATES_URL?>/images/special/dyz_index_sxy/dyz_index_about_09.png" alt="">
                    <h1>四大产品</h1>
                </div>
                <p class="about_line"></p>
                <p class="about_content">经过市场十年以上验证的优秀产品</p>
            </a>
        </li>
        <li>
            <a href="javascript:;">
                <div class="about_title">
                    <img src="<?php echo CMS_TEMPLATES_URL?>/images/special/dyz_index_sxy/dyz_index_about_10.png" alt="">
                    <h1>店面展示</h1>
                </div>
                <p class="about_line"></p>
                <p class="about_content">太常·独一张现已在全国范围内开设店近一千家，在全国各地帮助创业者实现人生梦想和财富累积。</p>
            </a>
        </li>
    </ul>
</div>
<!--荣誉资质-->
<?php if($output['special_file']['code_info']['screen_honor_list']&&is_array($output['special_file']['code_info']['screen_honor_list'])) {?>
<div id="dyz_honor">
    <img src="<?php echo CMS_TEMPLATES_URL?>/images/special/dyz_index_sxy/dyz_index_title_10.png" alt="" class="dyz_index_title">
    <ul class="honor_img">
    <?php foreach ($output['special_file']['code_info']['screen_honor_list'] as $pic) {?>
        <li>
            <a href="<?php echo $pic['pic_url']?>">
            <img src="<?php echo UPLOAD_SITE_URL.DS.$pic['pic_img']?>" alt="" title="<?php echo $pic['pic_name']?>">
            </a>
        </li>
    <?php }?>
    </ul>
</div>
<?php }?>
<!--康复案例-->
<?php if($output['special_file']['code_info']['screen_recure_list']&&is_array($output['special_file']['code_info']['screen_recure_list'])) {?>
<div id="case_sharing">
    <img src="<?php echo CMS_TEMPLATES_URL?>/images/special/dyz_index_sxy/dyz_index_title_12.png" alt="" class="dyz_index_title">
    <div  class="case_img">
        <ul class="case_img_box">
            <?php foreach ($output['special_file']['code_info']['screen_recure_list'] as $pic_list) {?>
            
            <li class="sharing_img on">
                <?php foreach ($pic_list['pic_list'] as $pic) {?>
                <div>
                    <a href="<?php echo $pic['pic_url']?>" style="width: 306px;height: 378px;">
                    <img src="<?php echo UPLOAD_SITE_URL.DS.$pic['pic_img'] ?>" alt="<?php echo $pic['pic_name']?>" title="<?php echo $pic['pic_name']?>" width="306" height="378">
                    </a>
                </div>
                <?php }?>
            </li>
            <?php }?>
        </ul>
    </div>
    <div class="change_case">
        <img src="<?php echo CMS_TEMPLATES_URL?>/images/special/dyz_index_sxy/dyz_index_case_07.png" alt="">
        <p>换一批</p>
    </div>
</div>
<?php }?>
<!--店面展示-->
<?php if($output['special_file']['code_info']['screen_store_list']&&is_array($output['special_file']['code_info']['screen_store_list'])) {?>
<div id="show_shop">
    <img src="<?php echo CMS_TEMPLATES_URL?>/images/special/dyz_index_sxy/dyz_index_title_14.png" alt="" class="dyz_index_title">
    <div class="shop_img">
        <ul class="shop_img_box">
            <?php foreach ($output['special_file']['code_info']['screen_store_list'] as $pic_list ) {?>
            <li class="show_img on">
                 <?php foreach ($pic_list['pic_list'] as $key=>$pic) {?>
                <div class="<?php if($key==2||$key==3){echo "shop_small";}else{echo "shop_big";}?>">
                   <a href="<?php $pic['[pic_url']?>" style="width:241px;height:297">
                   <?php if($key==2||$key==3) {?>
                     <img src="<?php echo UPLOAD_SITE_URL.DS.$pic['pic_img']?>" alt="<?php echo $pic['pic_name']?>" title="<?php echo $pic['pic_name']?>" width="223" height="274">
                    <?php }else {?>
                    <img src="<?php echo UPLOAD_SITE_URL.DS.$pic['pic_img']?>" alt="<?php echo $pic['pic_name']?>" title="<?php echo $pic['pic_name']?>" width="241" height="297">
                    <?php }?>
                    </a>
                </div>
                <?php }?>
            </li>
            <?php }?>
        </ul>
    </div>
    <div class="change_shop">
        <img src="<?php echo CMS_TEMPLATES_URL?>/images/special/dyz_index_sxy/dyz_change_shop_03.png" alt="">
        <p >换一批</p>
    </div>
</div>
<?php }?>
<!--招商加盟-->
<?php if($output['special_file']['code_info']['screen_canvass_list']&&is_array($output['special_file']['code_info']['screen_canvass_list'])) {?>
<div id="dyz_merchants">
    <img src="<?php echo CMS_TEMPLATES_URL?>/images/special/dyz_index_sxy/dyz_index_title_16.png" alt="" class="dyz_index_title">
    <div class="dyz_merchants_box">
        <div class="merchants">
            <ul>
                <?php foreach ($output['special_file']['code_info']['screen_canvass_list'] as $pic){ ?>
                <li class="hidden">
                    <P><?php echo $pic['pic_name']?></P>
                    <img src="<?php echo UPLOAD_SITE_URL.DS.$pic['pic_img']?>" alt="<?php echo $pic['pic_name']?>" title="<?php echo $pic['pic_name']?>">
                </li>
              <?php }?>
            </ul>
        </div>
    </div>
</div>
<?php }?>
<!--底部-->
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
    <p class="friendship_zn">
    <?php if(is_array($output['$link_list']) && !empty($output['$link_list'])) { ?>
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
</body>
</html>
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
    //banner轮播图
    //第一张显示
    $(".pic li").eq(0).show();
    //鼠标滑过手动切换，淡入淡出
    $("#position li").mouseover(function () {
        $(this).addClass('cur').siblings().removeClass("cur");
        var index = $(this).index();
        i = index;//不加这句有个bug，鼠标移出小圆点后，自动轮播不是小圆点的后一个
        // $(".pic li").eq(index).show().siblings().hide();
        $(".pic li").eq(i).fadeIn(1500).siblings().fadeOut(1500);
    });
    //自动轮播
    var i = 0;
    var timer = setInterval(play, 3000);
    //向右切换
    function play() {
        i++;
        i = i > 2 ? 0 : i;
        $("#position li").eq(i).addClass('cur').siblings().removeClass("cur");
        $(".pic li").eq(i).fadeIn(1500).siblings().fadeOut(1500);
    }

    //向左切换
    function playLeft() {
        i--;
        i = i < 0 ? 2 : i;
        $("#position li").eq(i).addClass('cur').siblings().removeClass("cur");
        $(".pic li").eq(i).fadeIn(1500).siblings().fadeOut(1500);
    }
    //鼠标移入移出效果
    $("#banner").hover(function () {
        clearInterval(timer);
    }, function () {
        timer = setInterval(play, 3000);
    });
    //左右点击切换
    $("#prev").click(function () {
        playLeft();
    })
    $("#next").click(function () {
        play();
    })

    //视频轮播图
    let box = $('.video_box')[0];
    let imgbox = $('.video_box .video_lists')[0];
    let toparrow = $('.video_arrow .top')[0];
    let bottomarrow = $('.video_arrow .bottom')[0];
    let height = parseInt(getComputedStyle(box, null).height);
    let flag = true;
    function move() {
        animate(imgbox, {top: -height / 4}, 500, function () {
            flag = true;
            let first = imgbox.firstElementChild;
            imgbox.appendChild(first);
            imgbox.style.top = '0';
        });

    }
    let t = setInterval(move, 2600);
    box.onmouseover = function () {
        clearInterval(t);
    }
    box.onmouseout = function () {
        t = setInterval(move, 2600);
    }
    function mover() {
        let first = imgbox.firstElementChild;
        let last = imgbox.lastElementChild;
        imgbox.insertBefore(last, first);
        imgbox.style.top = -height / 4 + 'px';
        animate(imgbox, {top: 0}, 500, function () {
            flag = true;
        });
    }
    toparrow.onclick = function () {
        if (flag) {
            flag = false;
            move();
        }
    }
    bottomarrow.onclick = function () {
        if (flag) {
            flag = false;
            mover();
        }
    }
    //视频点击事件
    $('.video_list .video_lists li').click(function () {
        //点击先移除全部选中效果
        $('.video_list .video_lists li').find('.shade').hide();
        $('.video_list .video_lists li').find('p').removeClass('active');
        //给对应的添加选中效果
        $(this).find('.shade').toggle();
        $(this).find('p').toggleClass('active');
        let video_url = $(this).find('input').val()
        $('.video_play input').val(video_url);
    });

    //招商入驻图片
    $('#dyz_merchants li').click(function () {
        $('#dyz_merchants li').addClass('hidden');
        $(this).removeClass('hidden');
    });

    //换一批
    function change(a, b, c) {
        let box = $(a);//最外层盒子
        let imgs = $(b);//图片li
        let right = $(c);//右键头
        let now = 0;
        let next = 0;
        let flag = true;

        function move(way = 'right') {
            if (way == 'right') {
                next = now + 1;
                if (next >= imgs.length) {
                    next = 0;
                }//图片到最后一张后，就要返回到第一张
            } else if (way == 'left') {
                next = now - 1;
                if (next < 0) {
                    next = imgs.length - 1;
                }//图片到最后一张后，就要返回到第一张
            }
            imgs.eq(next).animate({opacity: 1}, 300, function () {
                flag = true;
            }).end().eq(now).animate({opacity: 0}, 300);
            now = next;
        }
        right.click(function () {
            move('right')
        });
    }
    <?php if(count($output['special_file']['code_info']['screen_recure_list'])>1) {?>
    change('.case_img_box','.sharing_img','.change_case');
    <?php }?>
    <?php if(count($output['special_file']['code_info']['screen_store_list'])>1) {?>
    change('.shop_img_box','.show_img','.change_shop')
    <?php }?>
</script>
