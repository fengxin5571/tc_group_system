<?php defined('InShopNC') or exit('Access Invalid!');?>
<!--  <div class="cms-content">
<?php 
$index_file = BASE_UPLOAD_PATH.DS.ATTACH_CMS.DS.'index_html'.DS.'index.html';
if(is_file($index_file)) {
    require($index_file);
}
?>
</div>-->

<!--banner轮播图开始-->
<div class="swiper-container_lb" id="banner">

    <div class="swiper-wrapper pic">
     <?php if (is_array($output['code_screen_list']['code_info']) && !empty($output['code_screen_list']['code_info'])) { ?>
          <?php foreach ($output['code_screen_list']['code_info'] as $key => $val) { ?>
        <div class="swiper-slide">
            <a href="<?php echo $val['pic_url']?>"><img src="<?php echo UPLOAD_SITE_URL.'/'.$val['pic_img'];?>" alt=""></a>
        </div>
    	<?php }?>
    <?php }?>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
</div>
<!--banner轮播图结束-->

<!--初识太常开始-->
<div class="tc_meet_one">
    <div class="tc_title_img">
        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/tc_index_title_03.png" alt="">
    </div>
    <div class="meet_one_box">
        <div class="left_meet">
            <ul class="tc_instro_img">
                <li>
                    <?php echo loadadv(39);?>
                </li>
                <li>
                    <p class="left_title">太常简介</p>
                </li>
                <li>
                    <?php echo loadadv(40);?>
                </li>
                <li>
                    <?php echo loadadv(41);?>
                    <a href="<?php echo urlCMS("article","tc_introduce")?>" class="tc_introduce">+</a>
                </li>
            </ul>
            <h2>太常生物科技有限公司</h2>
            <p class="text">山西太常生物科技有限公司是一家专业从事风湿骨病康复，并以此为基础综合改善各种慢性病及亚健康症状的健康调理机构，是国内风湿骨病、慢性病调理行业的开创者和领导者。</p>
        </div>
        <div class="right_meet">
            <ul class="news_list">
             <?php foreach($output['commend_article'] as $key=>$article){?>
                <li>
                    <span></span>
                    <div class="news_text">
                        <h3>0<?php echo $key+1;?></h3>
                        <div class="news_cont">
                            <a href=""><?php echo str_cut($article['article_title'],25)?></a>
                            <p><?php echo str_cut($article['article_abstract'],64)?></p>
                        </div>
                    </div>
                </li>
             <?php }?>
            </ul>
            <div class="news_tc">
                <p>太常新闻</p >
                <a href="" class="news_img"><img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_CMS.DS.'article/'.$output['commend_image_article']['article_image']['path'].'/'.$output['commend_image_article']['article_image']['name'];?>" alt=""></a>
                <a href="<?php echo urlCMS('article','article_list')?>" class="click_more">+</a>
            </div>
        </div>
    </div>
    <div class="cgyjc">
        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/tc_index_title_07.png" alt="">
    </div>
</div>
<!--初识太常结束-->
<!--企业文化开始-->
<div class="company_culture">
    <div class="tc_title_img">
        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/tc_index_title_11.png" alt="">
    </div>
    <ul class="culture_box">
        <li>
            <div class="culture_text">
                <p><?php echo loadadv(44);?></p>
            </div>
            <div class="culture_img">
               <?php echo loadadv(43);?>
            </div>
        </li>
        <li>
            <div class="culture_text">
                <p><?php echo loadadv(48);?></p>
            </div>
            <div class="culture_img">
                <?php echo loadadv(47);?>
            </div>
        </li>
        <li>
            <div class="culture_text">
                <p><?php echo loadadv(51);?></p>
            </div>
            <div class="culture_img">
                <?php echo loadadv(49);?>
            </div>
        </li>
        <li>
            <div class="culture_text">
                <p><?php echo loadadv(45);?></p>
            </div>
            <div class="culture_img">
               <?php echo loadadv(46);?>
            </div>
        </li>
        <li>
            <div class="culture_text">
                <p><?php echo loadadv(52);?></p>
            </div>
            <div class="culture_img">
                <?php echo loadadv(50);?>
            </div>
        </li>
    </ul>
    <div class="view_more">
        <a href="<?php echo urlCMS("article","enterprise_culture")?>"><img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/more_03.png" alt=""></a>
    </div>
    <div class="cgyjc" style="margin-top: 16px">
        	<img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/tc_index_title_07.png" alt="">
    </div>
</div>
<!--企业文化结束-->
<!--业务体系开始-->
<div class="business_system">
    <div class="tc_title_img">
        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/tc_index_title_14.png" alt="">
    </div>
    <div class="system_box">
        <div class="system_left">
            <div class="system_text">
                <h1><span>示例-文字</span></h1>
                <p>
                    新零售，就是更高效率的零售。我们要从线上回到线下但不是原路返回，而是要用互联网的工具和方法，提升传统零售的效率，实现融合。新零售，就是更高效率的零售。我们要从线上回到线下，但不是原路返回，而是要用互联网的工具和方法，提升传统零售的效率，实现融合。新零售，就是更高效率的零售。我们要从线上回到线下，但不是原路返回，而是要用互联网的工具和方法，提升传统零售的效率，实现融合。</p>
            </div>
            <div class="system_big_img">
                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/system_bg_img_03.png" alt="">
            </div>
        </div>
        <div class="system_right">
            <!-- Swiper -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                 <?php if (is_array($output['code_focus_list']['code_info']) && !empty($output['code_focus_list']['code_info'])) { ?>
                   <?php foreach ($output['code_focus_list']['code_info'] as $key => $val) { ?>
                  
                    <div class="swiper-slide">
                        <ul class="system_list">
                         <?php foreach($val['pic_list'] as $k => $v) { ?>
                            <li>
                                <img src="<?php echo UPLOAD_SITE_URL.'/'.$v['pic_img'];?>" alt="" class="system_list_img">
                                <div class="system_mask">
                                    <p class="system_list_title"><?php echo str_cut($v['pic_name'],8)?></p>
                                    <span></span>
                                </div>
                                <input type="hidden" class="system_list_text" value="<?php echo str_cut($v['pic_content'],340)?>">
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                   
                    <?php }?>
                    <?php }?>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
    <div class="view_more">
        <a href="business_system_sxy.html"><img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/more_white_03.png" alt=""></a>
    </div>
    <div class="cgyjc" style="margin-top: 16px">
        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/tc_index_title_07.png" alt="">
    </div>
</div>
<!--业务体系结束-->
<!--待定开始-->
<div class="tc_shuffling">
    <div class="tc_title_img">
        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/tc_index_title_14.png" alt="">
    </div>
    <div class="shuffling_box">
        <ul class="shuffling_lb">
            <li>
                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/shuffling_03.png" alt="">
                <input type="hidden" class="shuffling_text_title" value="示例-文字1">
                <input type="hidden" class="shuffling_text_cont" value="新零售，就是更高效率的零售。我们要从线上回到线下但不是原路返回，而是要用互联网的工具和方法，提升传统零售的效率，实现融合。新零售，就是更高效率的零售。我们要从线上回到线下，但不是原路返回，而是要用互联网...">
                <input type="hidden" class="shuffling_text_url" value="1111">
            <li>
                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/shuffling_01.png" alt="">
                <input type="hidden" class="shuffling_text_title" value="示例-文字2">
                <input type="hidden" class="shuffling_text_cont" value="新零售，就是更高效率的零售。我们要从线上回到线下但不是原路返回，而是要用互联网的工具和方法，提升传统零售的效率，实现融合。新零售，就是更高效率的零售。我们要从线上回到线下，但不是原路返回，而是要用互联网...">
                <input type="hidden" class="shuffling_text_url" value="2222">
            </li>
            <li>
                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/shuffling_02.png" alt="">
                <input type="hidden" class="shuffling_text_title" value="示例-文字3">
                <input type="hidden" class="shuffling_text_cont" value="新零售，就是更高效率的零售。我们要从线上回到线下但不是原路返回，而是要用互联网的工具和方法，提升传统零售的效率，实现融合。新零售，就是更高效率的零售。我们要从线上回到线下，但不是原路返回，而是要用互联网...">
                <input type="hidden" class="shuffling_text_url" value="3333">
            </li>
            <li>
                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/qy2.png" alt="">
                <input type="hidden" class="shuffling_text_title" value="示例-文字4">
                <input type="hidden" class="shuffling_text_cont" value="新零售，就是更高效率的零售。我们要从线上回到线下但不是原路返回，而是要用互联网的工具和方法，提升传统零售的效率，实现融合。新零售，就是更高效率的零售。我们要从线上回到线下，但不是原路返回，而是要用互联网...">
                <input type="hidden" class="shuffling_text_url" value="4444">
            </li>
        </ul>
        <ul class="shuffling_arrow">
            <li class="arrow_left">
                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/arrow_lb_03.png" alt="" class="active">
                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/arrow_03.png" alt="" class="unactive">
            </li>
            <li class="arrow_right">
                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/arrow_lb_04.png" alt="" class="active">
                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/arrow_04.png" alt="" class="unactive">
            </li>
        </ul>
        <div class="shuffling_text">
            <h1>示例-文字</h1>
            <i></i>
            <p>新零售，就是更高效率的零售。我们要从线上回到线下但不是原路返回，而是要用互联网的工具和方法，提升传统零售的效率，实现融合。新零售，就是更高效率的零售。我们要从线上回到线下，但不是原路返回，而是要用互联网...</p>
            <a href="javascript:;">查看</a>
        </div>
    </div>
    <div class="view_more">
        <a href=""><img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/more_03.png" alt=""></a>
    </div>
    <div class="cgyjc" style="margin-top: 16px">
        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/tc_index_title_07.png" alt="">
    </div>
</div>
<!--待定结束-->
<!--健康讲堂开始-->
<div class="health_class">
    <div class="tc_title_img">
        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/tc_index_title_20.png" alt="">
    </div>
    <ul class="health_class_list">
        <li class="video_play">
            <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/health_list_03.png" alt="" class="health_class_img">
            <div class="health_mask">
                <a href="video_play.html?url=http://www.duyiwang.cn/data/upload/video/第一讲.mp4"><img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/play_button_03.png" alt=""></a>
            </div>
            <input type="hidden" class="health_video_url">
        </li>
        <li class="video_play">
            <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/health_list_07.png" alt="" class="health_class_img">
            <div class="health_mask">
                <a href="video_play.html?url=http://www.duyiwang.cn/data/upload/video/炙骨宁.mp4"><img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/play_button_03.png" alt=""></a>
            </div>
            <input type="hidden" class="health_video_url">
        </li>
        <li>
            <span></span>
            <div class="health_text">
                <h1>示例文字</h1>
                <h2>Sample text</h2>
                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/health_arrow_03.png" alt="">
            </div>
            <span></span>
        </li>
        <li>
            <span></span>
            <div class="health_text">
                <h1>示例文字</h1>
                <h2>Sample text</h2>
                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/health_arrow_07.png" alt="">
            </div>
            <span></span>
        </li>
        <li class="video_play">
            <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/health_list_11.png" alt="" class="health_class_img">
            <div class="health_mask">
                <a href="video_play.html?url=http://www.duyiwang.cn/data/upload/video/第三讲.mp4"><img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/play_button_03.png" alt=""></a>
            </div>
            <input type="hidden" class="health_video_url">
        </li>
        <li class="video_play">
            <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/health_list_10.png" alt="" class="health_class_img">
            <div class="health_mask">
                <a href="video_play.html?url=http://www.duyiwang.cn/data/upload/video/老膏药3分钟.mp4"><img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/play_button_03.png" alt=""></a>
            </div>
            <input type="hidden" class="health_video_url">
        </li>
    </ul>
    <div class="view_more">
        <a href="<?php echo urlCMS('video','video_list')?>"><img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/more_03.png" alt=""></a>
    </div>
    <div class="cgyjc" style="margin-top: 16px">
        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/tc_index_title_07.png" alt="">
    </div>
</div>
<!--健康讲堂结束-->

<script>
    $(window).scroll(function(){
        if($(window).scrollTop()>=200){
            $('.header_sxy').css('background','#0457b7')
        }else{
            $('.header_sxy').css('background','rgba(0,0,0,0)')
        }
    })
    //banner轮播图
    let swiper_lb = new Swiper('.swiper-container_lb', {
        spaceBetween: 0,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
    });

    //设置企业文化 文本高度
    let h = $('.culture_img').height();
    $('.culture_text').height(h);
    //设置企业文化 文本高度    中间
    let hh = $('.culture_box li:nth-child(2) .culture_img').height();
    $('.culture_box li:nth-child(2) .culture_text').height(hh);
    //监测屏幕变化刷新页面，防止企业文化板块不适应
    window.onresize = function () {
        if ($(window).width() > 1200) {
            location.reload();
        }
    }

    //业务体系轮播图
    var swiper = new Swiper('.swiper-container', {
        spaceBetween: 0,
        centeredSlides: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    //业务体系左侧默认显示
    let system_list_title=$('.system_list li:first-child').find('.system_list_title').html();
    let system_list_text=$('.system_list li:first-child').find('.system_list_text').val();
    let system_list_img=$('.system_list li:first-child').find('.system_list_img').attr('src');
    $('.system_text h1 span').html(system_list_title);
    $('.system_text p').html(system_list_text);
    $('.system_big_img img').attr('src',system_list_img);

    //业务体系点击切换文字效果
    $('.system_list li').click(function () {
        let system_list_title=$(this).find('.system_list_title').html();
        let system_list_text=$(this).find('.system_list_text').val();
        let system_list_img=$(this).find('.system_list_img').attr('src');
        $('.system_text h1 span').html(system_list_title);
        $('.system_text p').html(system_list_text);
        $('.system_big_img img').attr('src',system_list_img);
    });
    
    //层叠轮播
    function cascading_lb() {
        function switch_cont() {
            let shuffling_text_title=$('.shuffling_lb li:first-child').find('.shuffling_text_title').val();
            let shuffling_text_cont=$('.shuffling_lb li:first-child').find('.shuffling_text_cont').val();
            let shuffling_text_url=$('.shuffling_lb li:first-child').find('.shuffling_text_url').val();
            $('.shuffling_text h1').html(shuffling_text_title);
            $('.shuffling_text p').html(shuffling_text_cont);
            $('.shuffling_text a').attr('href',shuffling_text_url);
        }
        switch_cont();
        function cascading_r() {
            //第一个元素放到最后
            let box_img=$('.shuffling_lb')[0];
            let first = box_img.firstElementChild;
            box_img.appendChild(first);
            //文字显示切换
            switch_cont();
        }
        function cascading_l(){
            //最后一个元素插到第一个元素之前
            let box_img=$('.shuffling_lb')[0];
            let first = box_img.firstElementChild;
            let last = box_img.lastElementChild;
            box_img.insertBefore(last, first);
            //文字显示切换
            switch_cont();
        }
        $('.arrow_right').click(function () {
            cascading_r();
        });
        $('.arrow_left').click(function () {
            cascading_l();
        });
        setInterval(function () {
            cascading_r();
        },3000);
    }
    cascading_lb();
</script>
