<?php defined('InShopNC') or exit('Access Invalid!');?>
<link rel="stylesheet" href="<?php echo CMS_TEMPLATES_URL?>/css/cms/video_detail_sxy.css">
<script type="text/javascript" src="<?php echo CMS_TEMPLATES_URL?>/ckplayer/ckplayer.js"></script>
<!--二级导航开始-->
<div class="nav">
    <div class="second_nav">
        <span>当前位置</span>
        <i>|</i>
        <a href="<?php echo urlCMS("index","index")?>">首页</a>
        <img src="<?php echo CMS_TEMPLATES_URL?>/img/newslist_sxy/arrow_03.png" alt="">
        <a href="" class="active">视频详情</a>
    </div>
</div>
<!--二级导航结束-->
<!--视频播放开始-->
<div class="video_box">
    <div class="video_title">
        <span></span>
        <p><?php echo $output["video"]["vd_name"]?></p>
    </div>
    <section>
        <!--视频播放器开始-->
        <div class="video_play" id="video">

        </div>
        <!--视频播放器结束-->
        <div class="video_list">
            <div class="video_play_title">
                <p class="title"><?php echo str_cut($output['video']['video_title'], 20)?></p>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL?>/img/video_detail_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span></h2>
                </div>
            </div>
            <div class="video_bottom">
                <div class="about_video">
                    <span></span>
                    <p>相关视频</p>
                </div>
                <ul class="about_list">
                     <?php if($output["video_related"]&&is_array($output["video_related"])) {?>
                        <?php foreach ($output["video_related"] as $video) {?>
                            <li>
                                <a href="<?php echo urlCMS("video","video_detail",array("video_id"=>$video['video_id']))?>" class="about_img">
                                    <img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_ARTICLE.'/'.$video['file_name']?>" alt="">
                                </a>
                                <div class="about_text">
                                    <a href="" class="ab_titlt"><?php echo str_cut($video['video_title'], 15)?></a>
                                    <div class="about_num">
                                        <img src="<?php echo CMS_TEMPLATES_URL?>/img/video_detail_sxy/rank_03.png" alt="">
                                        <p><?php echo $video['video_count']?></p>
                                    </div>
                                </div>
                            </li>
                        <?php }?>
                   <?php }?>
                </ul>
            </div>
        </div>
    </section>
</div>
<!--视频播放结束-->
<!--热门视频推荐开始-->
<div class="video_category">
    <section class="bottom_content">
        <div class="category_title">
            <span></span>
            <h1>热门视频推荐</h1>
        </div>
        <ul class="cate_list">
               <?php if($output["video_recommend"]&&is_array($output["video_recommend"])) {?>
               <?php foreach ($output["video_recommend"] as $video) {?>
                    <li>
                        <a href="<?php echo urlCMS("video","video_detail",array("video_id"=>$video['video_id']))?>">
                            <div class="video_img">
                                <img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_ARTICLE.'/'.$video['file_name']?>" alt="">
                            </div>
                            <p><?php echo str_cut($video['video_title'], 20)?></p>
                        </a>
                        <div class="upload_info">
                            <div>
                                <img src="<?php echo CMS_TEMPLATES_URL?>/img/videolist_sxy/rank_03.png" alt="">
                                <p><?php echo $video['video_count']?></p>
                            </div>
                            <h2>上传于<span><?php echo date("Y-m-d",$output['video']['video_time'])?></span> </h2>
                        </div>
                    </li>
                <?php }?>
            <?php }?>
        </ul>
    </section>
</div>
<!--热门视频推荐结束-->
<script>
    var videoObject = {
        container:'#video',
        variable:'player',
        autoplay:false,
        debug:false,//开启调试模式
        poster:"<?php echo UPLOAD_SITE_URL.'/'.ATTACH_ARTICLE.'/'.$output['video']['file_name']?>",
        video:'http://www.duyiwang.cn/data/upload/video/<?php echo $output['video']['video_ad_url']?>'
    };
    var player=new ckplayer(videoObject);
</script>