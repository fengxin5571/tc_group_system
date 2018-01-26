<?php defined('InShopNC') or exit('Access Invalid!');?>
<link rel="stylesheet" href="<?php echo CMS_TEMPLATES_URL;?>/css/cms/swiper.min.css">
 <link rel="stylesheet" href="<?php echo CMS_TEMPLATES_URL;?>/css/cms/enterprise_culture_sxy.css">
<script src="<?php echo CMS_TEMPLATES_URL;?>/js/swiper.min.js"></script>
<script src="<?php echo CMS_TEMPLATES_URL;?>/js/animate.js"></script>
<!--banner图片开始-->
<div class="banner">
    <?php echo loadadv(13);?>
</div>
<!--banner图片结束-->
<div class="culture_title">
    <img src="<?php echo CMS_TEMPLATES_URL;?>/img/enterprise_culture_sxy/culture_title_03.png" alt="">
</div>
<!--管理理念开始-->
<div class="company_vision">
    <div class="vision_box">
        <div class="company_img">
            <img src="<?php echo CMS_TEMPLATES_URL;?>/img/enterprise_culture_sxy/vision_img_03.png" alt="">
        </div>
        <div class="company_desc">
            <h1>公司愿景</h1>
            <h2>Staff presence</h2>
            <img src="<?php echo CMS_TEMPLATES_URL;?>/img/enterprise_culture_sxy/vision_line_03.png" alt="">
            <p><?php echo loadadv(14);?></p>
        </div>
    </div>
    <div class="vision_lb">
       <?php if($output["code_index_screen_list"]&&is_array($output["code_index_screen_list"])) {?>
            <div class="vision_arrow">
                <div class="arrow_l">
                    <img src="<?php echo CMS_TEMPLATES_URL;?>/img/enterprise_culture_sxy/n_03.png" alt="">
                </div>
                <div class="arrow_r">
                    <img src="<?php echo CMS_TEMPLATES_URL;?>/img/enterprise_culture_sxy/n_05.png" alt="">
                </div>
            </div>
            <div class="vision_lb_box">
                <ul class="vision_img_list">
                    <?php foreach ($output['code_index_screen_list']['code_info'] as $value) {?>
                         <a href="<?php echo $value['pic_url']?>" title="<?php echo $value['pic_name']?>">
                            <li>
                                <img src="<?php echo UPLOAD_SITE_URL.DS.$value['pic_img'];?>" alt="" >
                                <div class="vision_mask"></div>
                            </li>
                        </a>
                    <?php }?>
                </ul>
            </div>
        <?php }?>
    </div>
</div>
<div class="cgyjc">
    <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/tc_index_title_07.png" alt="">
</div>
<!--管理理念结束-->
<!--公司使命开始-->
<div class="company_mission">
    <ul class="mission_list">
        <li>
            <?php echo loadadv(15);?>
        </li>
        <li>
            <div class="mission_title">
                <section>
                    <h1>company mission</h1>
                    <h2>公司使命</h2>
                </section>
            </div>
            <p><?php echo loadadv(16);?></p>
        </li>
        <li>
            <img src="<?php echo CMS_TEMPLATES_URL;?>/img/enterprise_culture_sxy/mission_03.png" alt="">
        </li>
        <li>
            <div class="mission_title">
                <section>
                    <h1>values</h1>
                    <h2>价值观</h2>
                </section>
            </div>
            <p><?php echo loadadv(18);?></p>
        </li>
        <li>
            <?php echo loadadv(17);?>
        </li>
    </ul>
</div>
<div class="cgyjc" style="margin-bottom: 40px">
    <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/tc_index_title_07.png" alt="">
</div>
<!--公司使命结束-->
<!--员工风采开始-->
<div class="staff_presence">
    <div class="staff_box">
        <div class="staff_desc">
            <h1>员工风采</h1>
            <h2>Staff presence</h2>
            <img src="<?php echo CMS_TEMPLATES_URL;?>/img/enterprise_culture_sxy/vision_line_03.png" alt="">
            <p><?php echo loadadv(19);?></p>
        </div>
        <div class="staff_img">
            <img src="<?php echo CMS_TEMPLATES_URL;?>/img/enterprise_culture_sxy/vision_img_03.png" alt="">
        </div>
    </div>
    <div class="staff_lb">
        <?php if($output["code_screen_list"]&&is_array($output["code_screen_list"])) {?>
            <div class="staff_arrow">
                <div class="arrow_left">
                    <img src="<?php echo CMS_TEMPLATES_URL;?>/img/enterprise_culture_sxy/n_03.png" alt="">
                </div>
                <div class="arrow_right">
                    <img src="<?php echo CMS_TEMPLATES_URL;?>/img/enterprise_culture_sxy/n_05.png" alt="">
                </div>
            </div>
            <div class="staff_lb_box">
                <ul class="staff_img_list">
                   <?php foreach ($output["code_screen_list"]['code_info'] as $value) {?>
                       <a href="<?php echo $value['pic_url']?>" title="<?php echo $value['pic_name']?>">
                            <li>
                                <img src="<?php echo UPLOAD_SITE_URL.DS.$value['pic_img'];?>" alt="" >
                                <div class="staff_mask"></div>
                            </li>
                       </a>
                   <?php }?>
                </ul>
            </div>
         <?php }?>
    </div>
</div>
<div class="cgyjc">
    <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/tc_index_title_07.png" alt="">
</div>
<!--员工风采结束-->
<!--办公环境开始-->
<div class="office_environment">
    <ul class="environment">
        <li>
            <?php echo loadadv(20);?>
        </li>
        <li>
            <h1>办公环境</h1>
            <h2>Staff presence</h2>
            <img src="<?php echo CMS_TEMPLATES_URL;?>/img/enterprise_culture_sxy/staff_07.png" alt="">
            <p><?php echo loadadv(22);?></p>
        </li>
        <li>
            <?php echo loadadv(21);?>
        </li>
    </ul>
    <ul class="development">
        <li>
            <h1>人才发展</h1>
            <h2>Staff presence</h2>
            <img src="<?php echo CMS_TEMPLATES_URL;?>/img/enterprise_culture_sxy/staff_07.png" alt="">
            <p><?php echo loadadv(23);?></p>
        </li>
        <li>
            <?php echo loadadv(24);?>
        </li>
        <li>
            <?php echo loadadv(25);?>
        </li>
    </ul>
</div>
<div class="cgyjc">
    <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/tc_index_title_07.png" alt="">
</div>
<!--办公环境结束-->
<script src="<?php echo CMS_TEMPLATES_URL;?>/js/enterprise_culture_sxy.js"></script>