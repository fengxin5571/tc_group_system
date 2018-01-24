<?php
defined('InShopNC') or exit('Access Invalid!');?>
<!-- 视频推荐start -->
    <?php if($video_list&&is_array($video_list)) {?>
    <div id="video">
        <p class="video_title">
            <i class="iconfont">&#xe614;</i>
            健康云
        </p>
        <p class="parting_line_zn"></p>
        <section class="video_area">
            <div class="video_play" id="player" >
                
                
               
            </div>
            <div class="video_list">
                <ul class="video_arrow">
                    <li class="top"><img src="<?php echo SHOP_TEMPLATES_URL?>/group/image/image_zn/arrow_video_03.png" alt=""></li>
                    <li class="bottom"><img src="<?php echo SHOP_TEMPLATES_URL?>/group/image/image_zn/arrow_video_06.png" alt=""></li>
                </ul>
                <div class="video_box">
                    <ul class="video_lists">
                       <?php foreach ($video_list as $video){?>
                        <li>
                            <div class="video_img" video_url="<?php echo$video['video_ad_url'] ?>">
                                <div class="shade"></div>
                                <img src="<?php echo UPLOAD_SITE_URL.'/shop/article/'.$video['file_name']?>" alt="" width="117" height="68">
                                <img src="<?php echo SHOP_TEMPLATES_URL?>/group/image/image_zn/video_play_14.png" alt="" class="button_play">
                            </div>
                            <p><?php echo str_cut($video['video_title'], 14)?></p>
                            
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
				    url:"index.php?act=video&op=ajax_video",
				    data:{type:1,video_url:video_url,video_recommend:0},
				    dataType:"text",
				    success:function(data){
					     $("#group_video_view").html(data);
					    }
					});

			 	}
	   });
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
           clearInterval(t);
           move();
       }
   }
   bottomarrow.onclick = function () {
       if (flag) {
           flag = false;
           clearInterval(t);
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
    </script>
    <!-- 视频推荐end -->
    <?php }?>