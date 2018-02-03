<?php defined('InShopNC') or exit('Access Invalid!');?>
<link rel="stylesheet" href="<?php echo CMS_TEMPLATES_URL;?>/css/cms/videolist_sxy.css">
<!--中间内容部分-->
<section class="content_sxy">
    <!--上半部分-->
    <div class="top_content">
        <!--左边-->
        <div class="left_content">
            <!--二级导航开始-->
            <div class="second_nav">
                <span>当前位置</span>
                <i>|</i>
                <a href="<?php echo urlCMS("index","index" )?>">首页</a>
                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/newslist_sxy/arrow_03.png" alt="">
                <a href="<?php echo urlCMS("video","video_list" ,array("class_id"=>0))?>" class="active">视频列表</a>
            </div>
            <!--二级导航结束-->
            <!--精品视频推荐开始-->
            <div class="video_title">
                <span></span>
                <p>精品视频推荐</p>
            </div>
            <ul class="video_list">
                <li>
                    <a href="<?php echo $output['code_screen_list']['code_info']['1']['pic_url']?>"><img src="<?php echo UPLOAD_SITE_URL.'/'.$output['code_screen_list']['code_info']['1']['pic_img'];?>" alt="" width="534" height="303"></a>
                   <p class="video_Title"><?php echo str_cut($output['code_screen_list']['code_info']['1']['pic_name'], 12)?></p>
                </li>
                <li>
                    <a href="<?php echo $output['code_screen_list']['code_info']['2']['pic_url']?>"><img src="<?php echo UPLOAD_SITE_URL.'/'.$output['code_screen_list']['code_info']['2']['pic_img'];?>" alt="" width="262" height="149"></a>
                    <p class="video_Title"><?php echo str_cut($output['code_screen_list']['code_info']['2']['pic_name'], 12)?></p>
                </li>
                <li>
                    <a href="<?php echo $output['code_screen_list']['code_info']['3']['pic_url']?>"><img src="<?php echo UPLOAD_SITE_URL.'/'.$output['code_screen_list']['code_info']['3']['pic_img'];?>" alt="" width="262" height="149"></a>
                    <p class="video_Title"><?php echo str_cut($output['code_screen_list']['code_info']['3']['pic_name'], 12)?></p>
                </li>
            </ul>
            <ul class="video_list1">
             	<?php if (is_array($output['code_focus_list']['code_info']) && !empty($output['code_focus_list']['code_info'])) { ?>
        		<?php foreach ($output['code_focus_list']['code_info'] as $key => $val) { ?>
                <?php foreach($val['pic_list'] as $k => $v) { ?>
                <li>
                    <a href="<?php echo $v['pic_url']?>"><img src="<?php echo UPLOAD_SITE_URL.'/'.$val['pic_img'];?>" alt=""></a>
                    <p class="video_Title"><?php echo $v['pic_name']?></p>
                </li>
                <?php }?>
                <?php }?>
                <?php }?>
               
            </ul>
            <!--精品视频推荐结束-->
        </div>
        <!--右边视频排行开始-->
        <div class="right_rank">
            <div class="rank_line"></div>
            <div class="rank_box">
                <h1>
                    <span></span>
                    <i>视频排行</i>
                </h1>
                <ul class="rank_list">
                 <?php if($output['video_ranking']&&is_array($output['video_ranking'])){?>
                  <?php foreach ($output['video_ranking'] as $key=>$video_ranking) {?>
                      <?php if(($key+1)<4){?>
                        <li class="rank_after">
                            <div class="rank_num"><p>0<?php echo ($key+1)?></p></div>
                            <div class="rank_title">
                                <a href="<?php echo urlCMS("video","video_detail" ,array("video_id"=>$video_ranking['video_id']))?>"><?php echo str_cut($video_ranking['video_title'], 20)?></a>
                                <div class="rank_author">
                                    <p>作者：<span><?php echo $video_ranking['video_author']?></span></p>
                                    <div class="play_time">
                                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                                        <span><?php echo $video_ranking['video_count']?></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php }else{?>
                     	<li class="rank_after">
                            <p>0<?php echo ($key+1)?></p>
                            <a href="<?php echo urlCMS("video","video_detail" ,array("video_id"=>$video_ranking['video_id']))?>"><?php echo str_cut($video_ranking['video_title'], 20)?></a>
                            <div class="play_time">
                                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_06.png" alt="">
                                <span><?php echo $video_ranking['video_count']?></span>
                            </div>
                        </li>
                    <?php }?>
                    <?php }?>
                    <?php }?>
                </ul>
            </div>
        </div>
        <!--右边视频排行结束-->
    </div>
    <!--下半部分-->
    <section class="bottom_content">
        <div class="category_title">
            <span></span>
            <h1>视频分类</h1>
            <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/arrow_03.png" alt="">
            <ul class="video_category">
            
             	<li class="active" id="class_0">
                    <p>全部</p>
                    <i></i>
                </li>
                <?php if($output['video_class']&&is_array($output['video_class'])){?>
                <?php foreach ($output['video_class'] as $video_class) {?>
                    <li id="class_<?php $video_class['vd_id']?>">
                        <p><?php echo $video_class['vd_name']?></p>
                        <i></i>
                    </li>
                <?php }?>
                <?php }?>
            </ul>
        </div>
         
         <ul class="cate_list on">
         <?php if($output['video_all']&&is_array($output['video_all'])){?>
        <?php foreach ($output['video_all'] as $video_all) {?>
            <li>
                <a href="<?php echo urlCMS("video","video_detail" ,array("video_id"=>$video_all['video_id']))?>">
                    <div class="video_img">
                        <img src="<?php echo $video_all['file_name']?>" alt="">
                    </div>
                    <p><?php echo str_cut($video_all['video_title'], 20)?></p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p><?php echo $video_all['video_count']?></p>
                    </div>
                    <h2>上传于<span><?php echo $video_all['video_time']?></span> </h2>
                </div>
            </li>
                    <?php }?>
        <?php }?>
        </ul>

        <?php if($output['video_list']&&is_array($output['video_list'])){?>
        <?php foreach ($output['video_list'] as $video_list) {?>
        <ul class="cate_list" >
            <?php foreach ($video_list as $list) {?>
                <li>
                <a href="<?php echo urlCMS("video","video_detail" ,array("video_id"=>$list['video_id']))?>">
                    <div class="video_img">
                        <img src="<?php echo $list['file_name']?>" alt="">
                    </div>
                    <p><?php echo str_cut($list['video_title'], 20)?></p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p><?php echo $list['video_count']?></p>
                    </div>
                    <h2>上传于<span><?php echo $list['video_time']?></span> </h2>
                </div>
            </li>     
            <?php }?>      
        </ul>
       	<?php }?>
       	<?php }?>
       
    </section>
    	
</section>

<script>
    //选项卡
    $('.video_category li').click(function () {
        $(".video_category li").removeClass('active');
        $(".video_category li").eq($(this).index()).addClass("active");
        $(".cate_list").removeClass('on').eq($(this).index()).addClass('on');
    });
    //右边视频排行
    $('.rank_list li:nth-child(1)').removeClass('rank_after');
    $('.rank_list li:nth-child(2)').removeClass('rank_after');
    $('.rank_list li:nth-child(3)').removeClass('rank_after');
    $('.rank_list li:nth-child(1)').find('.rank_num').html('<i class="iconfont">&#xe635;</i>');
    $('.rank_list li:nth-child(2)').find('.rank_num').html('<i class="iconfont">&#xe636;</i>');
    $('.rank_list li:nth-child(3)').find('.rank_num').html('<i class="iconfont">&#xe637;</i>');
</script>