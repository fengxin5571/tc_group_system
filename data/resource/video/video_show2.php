<?php
defined('InShopNC') or exit('Access Invalid!');?>
<!--视频专区-->
 <?php if($video_list&&is_array($video_list)) {?>
<div id="dyz_video">
    <img src="<?php echo CMS_TEMPLATES_URL?>/images/special/dyz_index_sxy/dyz_index_title_03.png" alt="" class="dyz_index_title">
    <section class="video_area">
        <div class="video_play" id="player">
            
            
            <input type="hidden">
        </div>
        <div class="video_list">
            <ul class="video_arrow">
                <li class="top"><img src="<?php echo CMS_TEMPLATES_URL?>/images/special/dyz_index_sxy/dyz_index_video_04.png" alt=""></li>
                <li class="bottom"><img src="<?php echo CMS_TEMPLATES_URL?>/images/special/dyz_index_sxy/dyz_index_video_14.png" alt=""></li>
            </ul>
            <div class="video_box">
                <ul class="video_lists">
                   <?php foreach ($video_list as $video){?>
                    <li>
                        <div class="video_img"  video_url="<?php echo$video['video_ad_url'] ?>">
                            <div class="shade"></div>
                            <img src="<?php echo UPLOAD_SITE_URL.'/shop/article/'.$video['file_name']?>" alt="" width="117" height="68">
                            <img src="<?php echo CMS_TEMPLATES_URL?>/images/special/dyz_index_sxy/dyz_index_video_07.png" alt="" class="button_play">
                        </div>
                        <p><?php echo str_cut($video['video_title'], 14)?></p>
                        <input type="hidden" value="111">
                    </li>
                   <?php }?>
                    
                </ul>
            </div>
        </div>
    </section>
    <input  type="hidden" name="video_url" value="<?php echo $video_url?>" id="video_url"/>
</div>
<script>
//播放器
var video_url=$("#video_url").val();
var videoObject = {
 		container: '#player', //容器的ID或className
 		variable: 'player',
 		debug:true,//开启调试模式
 		flashplayer: false, //是否需要强制使用flashplayer
 		//poster: 'material/poster.jpg', //封面图片
 		video: video_url
 	};
var player = new ckplayer(videoObject);
$('.video_img').on("click",function(){
 	if($(this).attr('video_url')){
	 	var video_url=$(this).attr('video_url');
		$.ajax({
		    type:"POST",
		    url:"/index.php?act=video&op=ajax_video",
		    data:{type:2,video_url:video_url,video_recommend:<?php echo $video_recommend;?>},
		    dataType:"text",
		    success:function(data){
			     $("#group_video_view").html(data);
			    }
			});

	 	}
});
</script>
<?php }?>