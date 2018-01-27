<?php defined('InShopNC') or exit('Access Invalid!');?>
<link rel="stylesheet" href="<?php echo CMS_TEMPLATES_URL;?>/css/cms/company_info_sxy.css">
<link rel="stylesheet" href="<?php echo CMS_TEMPLATES_URL;?>/css/cms/swiper.min.css">
<script src="<?php echo CMS_TEMPLATES_URL;?>/js/swiper.min.js"></script>
<script src="<?php echo CMS_TEMPLATES_URL;?>/js/animate.js"></script>

<!--banner图片开始-->
<div class="banner">
    <?php echo loadadv(4);?>
</div>
<!--banner图片结束-->
<!--公司新闻开始-->
<div class="company_news">
    <div class="company_title">
        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/company_info_sxy/company_title_03.png" alt="">
    </div>
    <div class="company_news_box">
        <div class="left_news">
            <div class="left_top">
                <div class="left_top_left">
                    <h1>news</h1>
                    <h2>太常快讯</h2>
                </div>
                <div class="left_top_right">
                    <?php echo loadadv(2);?>
                </div>
            </div>
            <ul class="left_news_list">
                <?php if($output['article_left_list']&&is_array($output['article_left_list'])) {?>
                	<?php foreach ($output['article_left_list'] as $key =>$article) {?>
                        <li class="<?php if ($key==0){echo "on";}?>">
                            <div class="news_time">
                                <span class="day"><?php echo $article['month']?></span>
                                <span class="line"></span>
                                <i>/</i>
                                <span class="month"><?php echo $article['day']?></span>
                            </div>
                            <div class="news_title">
                                <a href="<?php echo urlCMS("article","article_detail",array("article_id"=>$article['article_id']))?>"><?php echo str_cut($article['article_title'], 45)?></a>
                                <p><?php echo str_cut($article['article_abstract'], 100,"...")?></p>
                            </div>
                        </li>
                    <?php }?>
               <?php }?>
            </ul>
            <div class="left_bottom">
                <div class="left_bottom_left">
                    <?php echo loadadv(3);?>
                </div>
                <div class="left_bottom_right">
                    <a href="<?php echo urlCMS("article","article_list")?>">更多资讯<span></span> </a>
                    <h2>传国医精粹|布健康功德</h2>
                </div>
            </div>
        </div>
        <div class="right_news">
            <div class="right_top">
                <h1>太常帮您了解</h1>
                <p>为您提供实时健康资讯，为您提供实时健康为您提供实时健康资讯资讯</p>
            </div>
            <div class="right_img">
                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/company_info_sxy/news_right_05.png" alt="">
            </div>
            <div class="news_hot">
                <div class="news_hot_title">
                    <img src="<?php echo CMS_TEMPLATES_URL;?>/img/company_info_sxy/news_title_03.png" alt="">
                </div>
                <div class="swiper-container news_lb">
                    <div class="swiper-wrapper">
                       <?php if($output['article_right_list']&&is_array($output['article_right_list'])) {?>
                             <?php foreach ($output['article_right_list'] as $key=>$article) {?>
                                <?php if ($key==0) {?>
                                <ul class="swiper-slide">
                                <?php }?>
                                    <?php if($key<=3) {?>
                                    <li>
                                        <div class="hot_news_rank"><?php echo sprintf("%02d",$key+1)?></div>
                                        <a href="<?php echo urlCMS("article","article_detail",array("article_id"=>$article['article_id']))?>"><?php echo str_cut($article['article_title'], 32)?></a>
                                        <div class="hot_news_time"><?php echo $article['article_publish_time']?></div>
                                    </li>
                                    <?php }?>
                                <?php if ($key==3) {?>
                                </ul>
                                <?php }?>
                                <?php if ($key==4) {?>
                                <ul class="swiper-slide">
                                <?php }?>
                                    <?php if($key>=4) {?>
                                    <li>
                                        <div class="hot_news_rank"><?php echo sprintf("%02d",$key+1)?></div>
                                        <a href="<?php echo urlCMS("article","article_detail",array("article_id"=>$article['article_id']))?>"><?php echo str_cut($article['article_title'], 32)?></a>
                                        <div class="hot_news_time"><?php echo $article['article_publish_time']?></div>
                                    </li>
                                    <?php }?>
                                 <?php if ($key==7) {?>
                                </ul>
                                <?php }?>
                            <?php }?>
                        <?php }?>
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="cgyjc">
        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/tc_index_title_07.png" alt="">
    </div>
</div>
<!--公司新闻结束-->
<!--发展历程开始-->
<div class="development_history">
    <div class="company_title">
        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/company_info_sxy/company_title_06.png" alt="">
    </div>
    <div class="development">
        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/company_info_sxy/development_bg_02.png" alt="" class="development_bg">
        <div class="dev_history">
            <ul class="history">
                <li>
                    <div class="coordinates">
                        <span></span>
                        <h6></h6>
                        <p></p>
                    </div>
                    <div class="history_content">
                        <p>1、5月9日全国第一家独一张骨康复连锁机构—山西太原旗舰店开业。<br/>2、直至年底，独一张骨康复连锁机构在全国已有80家门店。</p>
                        <div class="history_img">
                            <img src="<?php echo CMS_TEMPLATES_URL;?>/img/company_info_sxy/history_img_03.png" alt="">
                        </div>
                    </div>
                    <div class="history_time">2015年</div>
                </li>
                <li>
                    <div class="coordinates">
                        <span></span>
                        <h6></h6>
                        <p></p>
                    </div>
                    <div class="history_content">
                        <p>1、2月，公司正式更名为太常生物科技有限公司。<br/>2、直至年底，【太常·独一张】骨康复连锁机构在全国已有1000家门店。</p>
                    </div>
                    <div class="history_time">2016年</div>
                </li>
                <li>
                    <div class="coordinates">
                        <span></span>
                        <h6></h6>
                        <p></p>
                    </div>
                    <div class="history_content">
                        <div class="history_img">
                            <img src="<?php echo CMS_TEMPLATES_URL;?>/img/company_info_sxy/history_img_06.png" alt="">
                        </div>
                        <p>1、打造50家旗舰店+30家样板店、打造50名优秀店长,校企深度合作，助力学子圆梦。<br/>2、公司广告陆续登录各大卫视,食维健项目启动。<br/>3、独易网挂牌上市。</p>
                    </div>
                    <div class="history_time">2017年</div>
                </li>
                <li>
                    <div class="coordinates">
                        <span></span>
                        <h6></h6>
                        <p></p>
                    </div>
                    <div class="history_content">
                        <p>示例文字示例文字示例文文字示例文文字示例文字示例文文文字示例文字示例文文字示例文字示例文字示例字示例文字字示例文字示例文字示例文字示例字示例文字示例文字示例文字示例</p>
                        <div class="history_img">
                            <img src="<?php echo CMS_TEMPLATES_URL;?>/img/company_info_sxy/history_img_09.png" alt="">
                        </div>
                    </div>
                    <div class="history_time">2015年</div>
                </li>
                <li>
                    <div class="coordinates">
                        <span></span>
                        <h6></h6>
                        <p></p>
                    </div>
                    <div class="history_content">
                        <p>示例示例文文字示例文字示例示例示例文文字示例文字示例文示例示例文例文示例示例文文字示例例文示例示例文文字示例例文示例示例文文字示例例文示例示例文文字示例文字示例文字示例文示例示例文文字示例文字示例文文文文字示例文字示例文文字示例文字示例文字示例字示例文字字示例文字示例文字示例文字示例字示例文字示例文字示例文字示例</p>
                    </div>
                    <div class="history_time">2015年</div>
                </li>
            </ul>
        </div>

    </div>
</div>
<!--发展历程结束-->
<!--管理团队开始-->
<div class="manage_team">
    <div class="company_title">
        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/company_info_sxy/company_title_08.png" alt="">
    </div>
    <div class="people_info_box">
        <div class="manage_detail">
            <div class="people_img">
                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/company_info_sxy/company_team_03.png" alt="">
                <span></span>
                <i></i>
            </div>
            <div class="people_instroduce">
                <h1>太常集团-公司职位</h1>
                <h2>示例名字</h2>
                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/company_info_sxy/company_team_04.png" alt="" class="line">
                <h3>示例文字</h3>
                <p>示例文字示例文字示例文字示例文字示例，文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文。字示例文字示例文字示例示例文字示例文字示例文字示例文字示例文字示例文字字示例文字示...</p>
                <span></span>
                <a href=""><i>查看详情</i><img src="<?php echo CMS_TEMPLATES_URL;?>/img/company_info_sxy/company_arrow_03.png" alt=""></a>
            </div>
        </div>
    </div>
    <div class="manage_people">
        <div class="manage_arrow">
            <div class="arrow_left">
                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/company_info_sxy/n_03.png" alt="">
            </div>
            <div class="arrow_right">
                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/company_info_sxy/n_05.png" alt="">
            </div>
        </div>
        <div class="team_lb">
            <ul class="team_img">
                <li>
                    <img src="<?php echo CMS_TEMPLATES_URL;?>/img/company_info_sxy/company_team_03.png" alt="">
                    <div class="people_mask"></div>
                    <input type="hidden" class="people_position" value="1前端工程师">
                    <input type="hidden" class="people_name" value="娜娜">
                    <input type="hidden" class="people_link" value="">
                    <input type="hidden" class="people_desc" value="111示例文字示例文字示例文字示例文字示例，文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文。字示例文字示例文字示例示例文字示例文字示例文字示例文字示例文字示例文字字示例">
                </li>
                <li>
                    <img src="<?php echo CMS_TEMPLATES_URL;?>/img/company_info_sxy/company_team_03.png" alt="">
                    <div class="people_mask"></div>
                    <input type="hidden" class="people_position" value="2前端工程师">
                    <input type="hidden" class="people_name" value="娜娜">
                    <input type="hidden" class="people_link" value="">
                    <input type="hidden" class="people_desc" value="222示例文字示例文字示例文字示例文字示例，文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文。字示例文字示例文字示例示例文字示例文字示例文字示例文字示例文字示例文字字示例">
                </li>
                <li>
                    <img src="<?php echo CMS_TEMPLATES_URL;?>/img/company_info_sxy/company_team_03.png" alt="">
                    <div class="people_mask"></div>
                    <input type="hidden" class="people_position" value="3前端工程师">
                    <input type="hidden" class="people_name" value="娜娜">
                    <input type="hidden" class="people_link" value="">
                    <input type="hidden" class="people_desc" value="333示例文字示例文字示例文字示例文字示例，文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文。字示例文字示例文字示例示例文字示例文字示例文字示例文字示例文字示例文字字示例">
                </li>
                <li>
                    <img src="<?php echo CMS_TEMPLATES_URL;?>/img/company_info_sxy/company_team_03.png" alt="">
                    <div class="people_mask"></div>
                    <input type="hidden" class="people_position" value="4前端工程师">
                    <input type="hidden" class="people_name" value="娜娜">
                    <input type="hidden" class="people_link" value="">
                    <input type="hidden" class="people_desc" value="444示例文字示例文字示例文字示例文字示例，文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文。字示例文字示例文字示例示例文字示例文字示例文字示例文字示例文字示例文字字示例">
                </li>
                <li>
                    <img src="<?php echo CMS_TEMPLATES_URL;?>/img/company_info_sxy/company_team_03.png" alt="">
                    <div class="people_mask"></div>
                    <input type="hidden" class="people_position" value="5前端工程师">
                    <input type="hidden" class="people_name" value="娜娜">
                    <input type="hidden" class="people_link" value="">
                    <input type="hidden" class="people_desc" value="555示例文字示例文字示例文字示例文字示例，文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文。字示例文字示例文字示例示例文字示例文字示例文字示例文字示例文字示例文字字示例">
                </li>
                <li>
                    <img src="<?php echo CMS_TEMPLATES_URL;?>/img/company_info_sxy/company_team_03.png" alt="">
                    <div class="people_mask"></div>
                    <input type="hidden" class="people_position" value="6前端工程师">
                    <input type="hidden" class="people_name" value="娜娜">
                    <input type="hidden" class="people_link" value="">
                    <input type="hidden" class="people_desc" value="666示例文字示例文字示例文字示例文字示例，文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文。字示例文字示例文字示例示例文字示例文字示例文字示例文字示例文字示例文字字示例">
                </li>
                <li>
                    <img src="<?php echo CMS_TEMPLATES_URL;?>/img/company_info_sxy/company_team_03.png" alt="">
                    <div class="people_mask"></div>
                    <input type="hidden" class="people_position" value="7前端工程师">
                    <input type="hidden" class="people_name" value="娜娜">
                    <input type="hidden" class="people_link" value="">
                    <input type="hidden" class="people_desc" value="777示例文字示例文字示例文字示例文字示例，文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文字示例文。字示例文字示例文字示例示例文字示例文字示例文字示例文字示例文字示例文字字示例">
                </li>
            </ul>
        </div>
    </div>
    <div class="view_more">
        <a href=""><img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/more_03.png" alt=""></a>
    </div>
    <div class="cgyjc" style="margin-top: 26px">
        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/tc_index_title_07.png" alt="">
    </div>
</div>
<!--管理团队结束-->
<!--社会使命开始-->
<div class="social_mission">
    <div class="company_title">
        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/company_info_sxy/company_title_10.png" alt="">
    </div>
    <ul class="social">
        <li>
            <h1><?php echo loadadv(10);?></h1>
            <p><?php echo loadadv(9);?></p>
        </li>
        <li>
            <?php echo loadadv(5);?>
        </li>
        <li>
           <?php echo loadadv(8);?>
        </li>
        <li>
            <?php echo loadadv(6);?>
        </li>
        <li>
            <?php echo loadadv(7);?>
        </li>
    </ul>
    <div class="cgyjc">
        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/tc_index/tc_index_title_07.png" alt="">
    </div>
</div>
<!--社会使命结束-->
<script src="<?php echo CMS_TEMPLATES_URL;?>/js/company_info_sxy.js"></script>