<?php defined('InShopNC') or exit('Access Invalid!');?>
<<<<<<< HEAD
=======
<link rel="stylesheet" href="<?php echo CMS_TEMPLATES_URL;?>/css/cms/health_cloud_sxy.css">
>>>>>>> e952056bbed5fda5a855c30d809e4e11941c6b99
<!--  <div class="cms-content">
<?php 
$index_file = BASE_UPLOAD_PATH.DS.ATTACH_CMS.DS.'index_html'.DS.'index.html';
if(is_file($index_file)) {
    require($index_file);
}
?>
<<<<<<< HEAD
</div>-->

<!--banner轮播图开始-->
<div class="swiper-container_lb" id="banner">
   <?php echo $output['web_html']['index_big'];?>
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
                    <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/taichang1.png" alt="">
                </li>
                <li>
                    <p class="left_title">太常简介</p>
                </li>
                <li>
                    <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/taichang2.png" alt="">
                </li>
                <li>
                    <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/taichang3.png" alt="">
                    <a href="tc_introduce_sxy.html">+</a>
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
                <h1>示例标题</h1>
                <p>示例文字示例文字示例文字示例文字示例文字示例文</p>
            </div>
            <div class="culture_img">
                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/qy1.png" alt="">
            </div>
        </li>
        <li>
            <div class="culture_text">
                <h1>示例标题</h1>
                <p>示例文字示例文字示例文字示例文字示例文字示例文示例文字示例文字示例文字示例文字示例文字示例文示例文字示例文字示例文字示例文字示例文字示例文</p>
            </div>
            <div class="culture_img">
                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/index_03.png" alt="">
            </div>
        </li>
        <li>
            <div class="culture_text">
                <h1>示例标题</h1>
                <p>示例文字示例文字示例文字示例文字示例文字示例文</p>
            </div>
            <div class="culture_img">
                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/qy4.png" alt="">
            </div>
        </li>
        <li>
            <div class="culture_text">
                <h1>示例标题</h1>
                <p>示例文字示例文字示例文字示例文字示例文字示例文</p>
            </div>
            <div class="culture_img">
                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/qy2.png" alt="">
            </div>
        </li>
        <li>
            <div class="culture_text">
                <h1>示例标题</h1>
                <p>示例文字示例文字示例文字示例文字示例文字示例文示例文字示例文字示例文字示例文字示例文字示例文</p>
            </div>
            <div class="culture_img">
                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/qy5.png" alt="">
            </div>
        </li>
    </ul>
    <div class="view_more">
        <a href="enterprise_culture_sxy.html"><img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/more_03.png" alt=""></a>
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
                    <div class="swiper-slide">
                        <ul class="system_list">
                            <li>
                                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/system_list_03.png" alt="" class="system_list_img">
                                <div class="system_mask">
                                    <p class="system_list_title">示例文字</p>
                                    <span></span>
                                </div>
                                <input type="hidden" class="system_list_text" value="111新零售，就是更高效率的零售。我们要从线上回到线下但不是原路返回，而是要用互联网的工具和方法，提升传统零售的效率，实现融合。新零售，就是更高效率的零售。我们要从线上回到线下，但不是原路返回，而是要用互联网的工具和方法，提升传统零售的效率，实现融合。新零售，就是更高效率的零售。">
                            </li>
                            <li>
                                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/system_list_05.png" alt="" class="system_list_img">
                                <div class="system_mask">
                                    <p class="system_list_title">示例文字</p>
                                    <span></span>
                                </div>
                                <input type="hidden" class="system_list_text" value="222新零售，就是更高效率的零售。我们要从线上回到线下但不是原路返回，而是要用互联网的工具和方法，提升传统零售的效率，实现融合。新零售，就是更高效率的零售。我们要从线上回到线下，但不是原路返回，而是要用互联网的工具和方法，提升传统零售的效率，实现融合。新零售，就是更高效率的零售。">
                            </li>
                            <li>
                                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/system_list_09.png" alt="" class="system_list_img">
                                <div class="system_mask">
                                    <p class="system_list_title">示例文字</p>
                                    <span></span>
                                </div>
                                <input type="hidden" class="system_list_text" value="333新零售，就是更高效率的零售。我们要从线上回到线下但不是原路返回，而是要用互联网的工具和方法，提升传统零售的效率，实现融合。新零售，就是更高效率的零售。我们要从线上回到线下，但不是原路返回，而是要用互联网的工具和方法，提升传统零售的效率，实现融合。新零售，就是更高效率的零售。">
                            </li>
                            <li>
                                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/system_list_11.png" alt="" class="system_list_img">
                                <div class="system_mask">
                                    <p class="system_list_title">示例文字</p>
                                    <span></span>
                                </div>
                                <input type="hidden" class="system_list_text" value="444新零售，就是更高效率的零售。我们要从线上回到线下但不是原路返回，而是要用互联网的工具和方法，提升传统零售的效率，实现融合。新零售，就是更高效率的零售。我们要从线上回到线下，但不是原路返回，而是要用互联网的工具和方法，提升传统零售的效率，实现融合。新零售，就是更高效率的零售。">
                            </li>
                        </ul>
                    </div>
                    <div class="swiper-slide">
                        <ul class="system_list">
                            <li>
                                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/system_list_05.png" alt="" class="system_list_img">
                                <div class="system_mask">
                                    <p class="system_list_title">示例文字</p>
                                    <span></span>
                                </div>
                                <input type="hidden" class="system_list_text" value="555新零售，就是更高效率的零售。我们要从线上回到线下但不是原路返回，而是要用互联网的工具和方法，提升传统零售的效率，实现融合。新零售，就是更高效率的零售。我们要从线上回到线下，但不是原路返回，而是要用互联网的工具和方法，提升传统零售的效率，实现融合。新零售，就是更高效率的零售。">
                            </li>
                            <li>
                                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/system_list_11.png" alt="" class="system_list_img">
                                <div class="system_mask">
                                    <p class="system_list_title">示例文字</p>
                                    <span></span>
                                </div>
                                <input type="hidden" class="system_list_text" value="666新零售，就是更高效率的零售。我们要从线上回到线下但不是原路返回，而是要用互联网的工具和方法，提升传统零售的效率，实现融合。新零售，就是更高效率的零售。我们要从线上回到线下，但不是原路返回，而是要用互联网的工具和方法，提升传统零售的效率，实现融合。新零售，就是更高效率的零售。">
                            </li>
                            <li>
                                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/system_list_09.png" alt="" class="system_list_img">
                                <div class="system_mask">
                                    <p class="system_list_title">示例文字</p>
                                    <span></span>
                                </div>
                                <input type="hidden" class="system_list_text" value="777新零售，就是更高效率的零售。我们要从线上回到线下但不是原路返回，而是要用互联网的工具和方法，提升传统零售的效率，实现融合。新零售，就是更高效率的零售。我们要从线上回到线下，但不是原路返回，而是要用互联网的工具和方法，提升传统零售的效率，实现融合。新零售，就是更高效率的零售。">
                            </li>
                            <li>
                                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/system_list_03.png" alt="" class="system_list_img">
                                <div class="system_mask">
                                    <p class="system_list_title">示例文字</p>
                                    <span></span>
                                </div>
                                <input type="hidden" class="system_list_text" value="888新零售，就是更高效率的零售。我们要从线上回到线下但不是原路返回，而是要用互联网的工具和方法，提升传统零售的效率，实现融合。新零售，就是更高效率的零售。我们要从线上回到线下，但不是原路返回，而是要用互联网的工具和方法，提升传统零售的效率，实现融合。新零售，就是更高效率的零售。">
                            </li>
                        </ul>
                    </div>
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
        <a href="videolist_sxy.html"><img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/more_03.png" alt=""></a>
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


=======

</div>-->
<!--中间主体部分-->
<section class="sxy_content">
    <div id="cont_box">
        <section id="cont_left">
         <?php foreach($output['article_class'] as $class){?>
         <?php if($class['class_id']==15){?>
            <!--天天养生-->
            <div id="health_day">
                <!--标题部分-->
                <div class="cont_title">
                    <p class="tit_eng"><span>Keeping  health</span><i>every day</i></p>
                    <p class="tit_china"><?php echo $class['class_name']?></p>
                </div>
                <!--文章部分-->
                <div class="cont_part">
                    <ul class="cont_pic">
                             <?php foreach($output['dayday_article'] as $dayarticle){?>
                        <li>
                            <a href="<?php echo urlCMS('article','article_detail',array('article_id'=>$dayarticle['article_id']))?>">
                                <div class="img_box">
                                    <img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_CMS.DS.'article/'.$dayarticle['article_image']['path'].'/'.$dayarticle['article_image']['name'];?>" alt="">
                                </div>
                                <p><?php echo str_cut($dayarticle['article_title'], 25);?></p>
                            </a>
                        </li>
                              <?php }?>
                    </ul>
                    <div class="cont_list">
                        <!--轮播图-->
                        <div class="article_img">
                            <ul class="pic">
                            	<?php echo loadadv(1057);?>
                                <!-- <li class="on">
                                    <a href="javascript:;"><img src="image/hcloud_sxy/health_day_03.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:;"><img src="image/hcloud_sxy/health_day_04.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:;"><img src="image/hcloud_sxy/health_day_03.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:;"><img src="image/hcloud_sxy/health_day_04.jpg" alt=""></a>
                                </li> -->
                            </ul>
                            <ul class="point">
                                <li class="active"></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                        </div>
                        <ul class="article_list">
                         <?php foreach($output['dayday_article_right'] as $dayarticle_right){?>
                            <li>
                                <a href="<?php echo urlCMS('article','article_detail',array('article_id'=>$dayarticle_right['article_id']))?>">
                                    <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_day_06.png';?>" alt="" class="gray">
                                    <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_day_05.png';?>" alt="" class="orange">
                                    <p><?php echo str_cut($dayarticle_right['article_title'], 50);?></p>
                                    <pre><?php echo $dayarticle_right['article_publish_time'];?></pre>
                                </a>
                            </li>
                            <?php }?>
                            <li class="more_art">
                                <a href="<?php echo urlCMS('article','article_list',array('class_id'=>$class['class_id']))?>">
                                    <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_day_02.png';?>" alt="">
                                    <h1>查看更多</h1>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php }elseif($class['class_id']==22){?>
            <!--人人养生-->
            <div class="health_person" id="he_person">
                <!--标题部分-->
                <div class="cont_title">
                    <p class="tit_eng"><span>Health preser</span><i>vation</i></p>
                    <p class="tit_china"><?php echo $class['class_name']?></p>
                </div>
                <!--主体部分-->
                <div class="cont_top">
                    <!--轮播图-->
                    <div class="article_img">
                        <ul class="pic">
                        	<?php echo loadadv(1058);?>
                           <!--  <li class="on">
                                <a href="javascript:;"><img src="image/hcloud_sxy/health_day_03.jpg" alt=""></a>
                            </li>
                            <li>
                                <a href="javascript:;"><img src="image/hcloud_sxy/health_day_04.jpg" alt=""></a>
                            </li>
                            <li>
                                <a href="javascript:;"><img src="image/hcloud_sxy/health_day_03.jpg" alt=""></a>
                            </li>
                            <li>
                                <a href="javascript:;"><img src="image/hcloud_sxy/health_day_04.jpg" alt=""></a>
                            </li> -->
                        </ul>
                        <ul class="point">
                            <li class="active"></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <!--热门推荐-->
                    <div class="recommend">
                        <div class="recom_title">
                            <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_day_05.png';?>" alt="">
                            <p>热门推荐</p>
                        </div>
                        <?php foreach($output['person_hot_article'] as $hot_article){?>
                        <div class="recom_img">
                            <img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_CMS.DS.'article/'.$hot_article['article_image']['path'].'/'.$hot_article['article_image']['name'];?>" alt="">
                        </div>
                        <div class="recon_info">        
                            <a href="<?php echo urlCMS('article','article_detail',array('article_id'=>$hot_article['article_id']))?>" class="recon_info_title"><?php echo str_cut($hot_article['article_title'], 30);?></a>
                            <div class="recom_time">
                                <span>|【<?php echo str_cut($hot_article['article_publisher_name'], 5)?>】|</span>
                                <i>|</i>
                                <p><?php echo $hot_article['article_publish_time'];?></p>
                                <a href="javascript:;"><img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_person.png';?>" alt=""></a>           
                            </div>                   
                        </div>
                         <?php }?>
                    </div>
                </div>
                <div class="cont_line"></div>
                <div class="cont_bottom">
                    <div class="person_list">
                        <ul class="article_list">
                        <?php foreach($output['person_article'] as $personarticle){?>
                            <li>
                                <a href="<?php echo urlCMS('article','article_detail',array('article_id'=>$personarticle['article_id']))?>">
                                   <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_day_06.png';?>" alt="" class="gray">
                                    <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_day_05.png';?>" alt="" class="orange">
                                    <p><?php echo str_cut($personarticle['article_title'], 50);?></p>
                                    <pre><?php echo $personarticle['article_publish_time'];?></pre>
                                </a>
                            </li>
                        <?php }?>
                        </ul>
                        <div class="person_more">
                            <a href="<?php echo urlCMS('article','article_list',array('class_id'=>$class['class_id']))?>">
                                <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_day_02.png';?>" alt="">
                                <p>查看更多</p>
                            </a>
                        </div>
                    </div>
                    <div class="top_img_box">
                        <ul class="topic_img">
                           <?php echo loadadv(1059);?>
                           <!-- <li class="hidden">
                                <img src="image/hcloud_sxy/health_day_03.jpg" alt="">
                            </li>
                            <li class="hidden">
                                <img src="image/hcloud_sxy/health_day_04.jpg" alt="">
                            </li>
                            <li>
                                <img src="image/hcloud_sxy/health_day_03.jpg" alt="">
                            </li>  -->
                        </ul>
                    </div>

                </div>
            </div>
            <?php }elseif ($class['class_id']==23){?>
            <!--处处养生-->
            <div class="health_person health_every">
                <!--标题部分-->
                <div class="cont_title">
                    <p class="tit_eng"><span>Health preser</span><i>vation</i></p>
                    <p class="tit_china"><?php echo $class['class_name']?></p>
                </div>
                <!--主体部分-->
                <div class="cont_top">
                    <!--轮播图-->
                    <div class="article_img">
                        <ul class="pic">
                        <?php echo loadadv(1060);?>
                           <!--  <li class="on">
                                <a href="javascript:;"><img src="image/hcloud_sxy/health_day_03.jpg" alt=""></a>
                            </li>
                            <li>
                                <a href="javascript:;"><img src="image/hcloud_sxy/health_day_04.jpg" alt=""></a>
                            </li>
                            <li>
                                <a href="javascript:;"><img src="image/hcloud_sxy/health_day_03.jpg" alt=""></a>
                            </li>
                            <li>
                                <a href="javascript:;"><img src="image/hcloud_sxy/health_day_04.jpg" alt=""></a>
                            </li> -->
                        </ul>
                        <ul class="point">
                            <li class="active"></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <!--热门推荐-->
                    <div class="recommend">
                        <div class="recom_title">
                            <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_day_05.png';?>" alt="">
                            <p>热门推荐</p>
                        </div>
                        <?php foreach($output['chuchu_hot_article'] as $hotarticle){?>
                            <div class="recom_img">
                                <img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_CMS.DS.'article/'.$hotarticle['article_image']['path'].'/'.$hotarticle['article_image']['name'];?>" alt="">
                            </div>
                        	<div class="recon_info">                    	
                                <a href="<?php echo urlCMS('article','article_detail',array('article_id'=>$hotarticle['article_id']))?>"class="recon_info_title"><?php echo str_cut($hotarticle['article_title'], 30);?></a>
                                <div class="recom_time">
                                    <span>|【<?php echo $hotarticle['article_publisher_name']?>】|</span>
                                    <i>|</i>
                                    <p><?php echo $hotarticle['article_publish_time']?></p>
                                    <a href="javascript:;"><img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_person.png';?>" alt=""></a>
                            	</div>       
                        	</div>
                         <?php }?>
                    </div>
                </div>
                <div class="cont_line"></div>
                <div class="cont_bottom">
                    <ul class="article_list">
                    <?php foreach($output['chuchu_article'] as $cc_article){?>
                            <li>
                                <a href="<?php echo urlCMS('article','article_detail',array('article_id'=>$cc_article['article_id']))?>">
                                   <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_day_06.png';?>" alt="" class="gray">
                                    <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_day_05.png';?>" alt="" class="orange">
                                    <p><?php echo str_cut($cc_article['article_title'],50);?></p>
                                    <pre><?php echo $cc_article['article_publish_time'];?></pre>
                                </a>
                            </li>
                        <?php }?>
                        <li id="click_more">
                            <a href="<?php echo urlCMS('article','article_list',array('class_id'=>$class['class_id']))?>">
                                <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_day_05.png';?>" alt="">
                                <p>查看更多</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
         	 <?php }?>
       <?php }?>
            <!--健康问答-->
            <?php if(is_array($output['question_list']) && !empty($output['question_list'])){?>
            <div id="health_answer">
                <!--标题部分-->
                <div class="cont_title">
                    <p class="tit_eng"><span>Health questi</span><i>on and answer</i></p>
                    <p class="tit_china">健康问答</p>
                </div>
                <!--主体部分-->
                <div class="answer_cont">
                    <div class="answer_left">
                        <div class="answer_img">
                        <?php echo loadadv(1063);?>
<!--                             <img src="image/hcloud_sxy/health_day_03.jpg" alt=""> -->
                        </div>
                        <ul class="answer_list">
                  		 <?php foreach($output['question_list'] as $question){?>
                            <li>
                                <a href="<?php echo urlShop('question','question_show',array('qid'=>$question['question_id']))?>">
                                    <span></span>
                                    <p><?php echo str_cut($question['question_title'], 50);?></p>
                                    <i><?php echo $question['question_member']?></i>
                                </a>
                            </li>
                            <?php }?>                           
                        </ul>
                    </div>
                    <div class="answer_right">
                    <?php echo loadadv(1064);?>
<!--                         <img src="image/hcloud_sxy/health_day_04.jpg" alt=""> -->
                    </div>
                </div>
                <div class="answer_more">
                    <a href="<?php echo urlShop('question','question_list',array('question_status'=>3))?>">
                        <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_day_05.png';?>" alt="">
                        <p>查看更多</p>
                    </a>
                </div>
            </div>
            <?php }else{echo '<br/><br/><br/><br/>';}?>
            <!--视频专区-->
            <?php if(is_array($output['video_list']) && !empty($output['video_list'])){?>
            <div id="health_video">
                <!--标题部分-->
                <div class="cont_title">
                    <p class="tit_eng"><span>Health video </span><i>special zone</i></p>
                    <p class="tit_china">视频专区</p>
                </div>
                <!--主体部分-->
                <ul class="video_list">                
                    <?php foreach($output['video_list'] as $video){?>
                        <li>
                            <a href="<?php echo urlshop('video','show',array('video_id'=>$video['video_id']))?>">
                               <img src="<?php echo UPLOAD_SITE_URL.DS."shop/article/".$video['file_name']?>" alt="" onerror="this.src='<?php echo CMS_TEMPLATES_URL.DS.'images/cms/video_sxy_03.png';?>'">
                            </a>
                        </li>
                   <?php }?>                   
                                
                </ul>
                <div class="answer_more">
                    <a href="<?php echo urlShop('video','video',array('vd_id'=>4))?>">
                        <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_day_05.png';?>" alt="">
                        <p>查看更多</p>
                    </a>
                </div>
            </div>
            <?php }else{echo '<br/><br/><br/><br/>';}?> 
        </section>
        <section id="cont_right">
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
        </section>
    </div>
</section>

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
    //手风琴
    $('.cont_bottom .topic_img li').click(function () {
        $('.cont_bottom .topic_img li').addClass('hidden');
        $(this).removeClass('hidden');
    });
    
    //轮播图
    function lb(a,b,c) {
        let box=$(a);//最外层盒子
        let imgs=$(b);//图片li
        let cirs=$(c);//点li
        let now=0;
        let next=0;
        let flag=true;
        function move(way='right'){
            if(way=='right'){
                next=now+1;
                if(next>=imgs.length){
                    next=0;
                }//图片到最后一张后，就要返回到第一张
            }else if(way=='left'){
                next=now-1;
                if(next<0){
                    next=imgs.length-1;
                }//图片到最后一张后，就要返回到第一张
            }
            imgs.eq(next).animate({opacity:1},300,function(){
                flag=true;
            }).end().eq(now).animate({opacity:0},300);
            cirs.eq(next).addClass('active').end().eq(now).removeClass('active');
            now=next;
        }
        let t=setInterval(move,1500);
        box.hover(function(){
            clearInterval(t);
        },function(){
            t=setInterval(move,1500);
        })
        cirs.click(function(){
            imgs.eq($(this).index()).animate({opacity:1},300).end().eq(now).animate({opacity:0},300);
            cirs.eq($(this).index()).addClass('active').end().eq(now).removeClass('active');
            now=$(this).index();
        })
    }
    lb('.cont_part .article_img','.cont_part .article_img .pic  li','.cont_part .article_img .point  li');
    lb('#he_person .article_img','#he_person .article_img .pic  li','#he_person .article_img .point  li');
    lb('.health_every .article_img','.health_every .article_img .pic  li','.health_every .article_img .point  li');
</script>

>>>>>>> e952056bbed5fda5a855c30d809e4e11941c6b99
