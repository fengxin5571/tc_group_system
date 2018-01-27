<?php defined('InShopNC') or exit('Access Invalid!');?>
<link rel="stylesheet" href="<?php echo CMS_TEMPLATES_URL;?>/css/cms/swiper.min.css">
<link rel="stylesheet" href="<?php echo CMS_TEMPLATES_URL;?>/css/cms/business_system_sxy.css">
<script src="<?php echo CMS_TEMPLATES_URL;?>/js/swiper.min.js"></script>
<!--banner图片开始-->
<div class="banner">
    <?php echo loadadv(12);?>
</div>
<!--banner图片结束-->
<!--新零售门店开始-->
<div class="new_retail">
    <div class="big_title">
        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/business_system_sxy/system_title_03.png" alt="">
    </div>
    <ul class="store_list">
        <li>
            <div class="store_title">
                <i class="iconfont">&#xe6b2;</i>
                <p>渠道一体化</p>
                <span>...</span>
            </div>
            <h1>no.1</h1>
            <pre class="store_desc">将企业部分优势资源杂糅到
营销渠道中，组成新的渠道体系，达到
渠道完全一体化。</pre>
            <div class="cross_line"></div>
        </li>
        <li>
            <div class="store_title">
                <i class="iconfont">&#xe599;</i>
                <p>经营数据化</p>
                <span>...</span>
            </div>
            <h1>no.2</h1>
            <pre class="store_desc">将企业部分优势资源杂糅到
营销渠道中，商品+会员+专属服务+
推广+交易+...。</pre>
            <div class="cross_line"></div>
        </li>
        <li>
            <div class="store_title">
                <i class="iconfont">&#xe616;</i>
                <p>卖场智能化</p>
                <span>...</span>
            </div>
            <h1>no.3</h1>
            <pre class="store_desc">智能触屏（电子咨询）+
Wifi+(电子货架+价格)+可穿戴设备等。
</pre>
            <div class="cross_line"></div>
        </li>
        <li>
            <div class="store_title">
                <i class="iconfont">&#xe693;</i>
                <p>商品社会化</p>
                <span>...</span>
            </div>
            <h1>no.4</h1>
            <pre class="store_desc">建立商品共享体系，友商货
上架门店，预售货加多样化展示。</pre>
            <div class="cross_line"></div>
        </li>
    </ul>
    <div class="cgyjc">
        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/business_system_sxy/tc_index_title_07.png" alt="">
    </div>
</div>
<!--新零售门店结束-->
<!--轮播图开始-->
<div class="system_lb">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php if($output['code_focus_list']&&is_array($output['code_focus_list'])) {?>
            <?php foreach ($output['code_focus_list']['code_info'] as$key=> $value) {?>
                <div class="swiper-slide shuffing_box">
                    <div class="shuffing_left">
                        <div class="shuffing_left_top">
                            <div  class="img_top1">
                                <a href="<?php echo $value['pic_list'][1]['pic_url']?>" title="<?php echo $value['pic_list'][1]['pic_name']?>">
                                	<img src="<?php echo UPLOAD_SITE_URL.DS.$value['pic_list'][1]['pic_img']?>" alt="">
                                </a>
                            </div>
                            <div  class="img_top2">
                                <a href="<?php echo $value['pic_list'][2]['pic_url']?>" title="<?php echo $value['pic_list'][2]['pic_name']?>">
                                	<img src="<?php echo UPLOAD_SITE_URL.DS.$value['pic_list'][2]['pic_img']?>" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="shuffing_left_middle">
                            <div class="img_middle1">
                                <a href="<?php echo $value['pic_list'][4]['pic_url']?>" title="<?php echo $value['pic_list'][4]['pic_name']?>">
                                	<img src="<?php echo UPLOAD_SITE_URL.DS.$value['pic_list'][4]['pic_img']?>" alt="">
                                </a>
                            </div>
                            <div class="shuffing_text">
                                <h1><?php if($key==1){echo "独一张门店";}elseif($key==2){echo "独易网";}elseif($key==3){echo "食维健门店";}?></h1>
                                <h2>The store display</h2>
                                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/business_system_sxy/system_line.png" alt="">
                                <p><?php echo $value['pic_list'][4]['pic_txt'] ?></p>
                            </div>
                        </div>
                        <div class="shuffing_left_bottom">
                            <div class="img_bottom1">
                                <a href="<?php echo $value['pic_list'][5]['pic_url']?>" title="<?php echo $value['pic_list'][5]['pic_name']?>">
                                	<img src="<?php echo UPLOAD_SITE_URL.DS.$value['pic_list'][5]['pic_img']?>" alt="">
                                </a>
                            </div>
                            <div class="img_bottom2">
                                <a href="<?php echo $value['pic_list'][6]['pic_url']?>" title="<?php echo $value['pic_list'][6]['pic_name']?>">
                                	<img src="<?php echo UPLOAD_SITE_URL.DS.$value['pic_list'][6]['pic_img']?>" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="shuffing_rigth">
                        <div class="img_right1">
                            <a href="<?php echo $value['pic_list'][3]['pic_url']?>" title="<?php echo $value['pic_list'][3]['pic_name']?>">
                            	<img src="<?php echo UPLOAD_SITE_URL.DS.$value['pic_list'][3]['pic_img']?>" alt="">
                            </a>
                        </div>
                        <div class="img_right2">
                            <a href="<?php echo $value['pic_list'][7]['pic_url']?>" title="<?php echo $value['pic_list'][7]['pic_name']?>">
                            	<img src="<?php echo UPLOAD_SITE_URL.DS.$value['pic_list'][7]['pic_img']?>" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            <?php }?>
           </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <?php }?>
    </div>
</div>
<div class="cgyjc">
    <img src="<?php echo CMS_TEMPLATES_URL;?>/img/business_system_sxy/tc_index_title_07.png" alt="">
</div>
<!--轮播图结束-->
<!--独易网开始-->
<div class="duyiwang">
    <div class="big_title">
        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/business_system_sxy/system_title_07.png" alt="">
    </div>
    <div class="duyiwang_content">
        <div class="duyiwang_desc">
            <div class="duyiwang_title">
                <h1>独易网</h1>
                <h2>network technology</h2>
                <h3>科技创造生活</h3>
                <span></span>
            </div>
            <div class="content_desc">
                <h1>科技改变生活</h1>
                <p><?php echo loadadv(37);?> </p>
            </div>
            <div class="jump_net">
                <a href="http://www.duyiwang.cn/">进入官网<img src="<?php echo CMS_TEMPLATES_URL;?>/img/business_system_sxy/jump_arrow_05.png" alt=""></a>
            </div>
        </div>
        <div class="duyiwang_img">
            <?php echo loadadv(38);?>
        </div>
    </div>
    <div class="cgyjc">
        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/business_system_sxy/tc_index_title_07.png" alt="">
    </div>
</div>
<!--独易网结束-->
<script>
    let swiper = new Swiper('.swiper-container', {
        spaceBetween: 0,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>