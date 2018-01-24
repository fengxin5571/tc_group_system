<?php defined('InShopNC') or exit('Access Invalid!');?>
<link href="<?php echo SHOP_TEMPLATES_URL;?>/css/layout.css" rel="stylesheet" type="text/css">
<link href="<?php echo SHOP_TEMPLATES_URL;?>/dw/css/video_qty.css" rel="stylesheet" type="text/css">
<style>
.nch-breadcrumb-layout {
	background: #F8F8F8;
}
</style>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL?>/js/ckplayer/ckplayer.js"></script>

<!-- 视频展示页 start -->
<div class="healthListBox_qty">
<div class="healthListSmallBox_qty">
	
	<!--健康讲堂视频开始-->
	<div class="healthVideoBox_qty">
		<!--健康讲堂视频左边开始-->
		<div class="healthVideoLeft_qty">
			<div class="videoFont_qty">视频分类</div>
			<?php foreach($output['sub_class_list'] as $class) {?>
				<div class="videoBottom_qty">
					<!--视频分类-->
					<div class="healthBox_qty">
						<div class="healthImgBox_qty">
							<img src="<?php echo SHOP_TEMPLATES_URL;?>/dw/image/store_qty.png"/>
						</div>
						<div class="healthRightBox_qty">
							<div class="healthTopFont_qty">
								<span><a href="<?php echo urlShop("video","video",array("parent_id"=>$class["vd_parent_id"],"childlist"=>1,"vd_id"=>$class['vd_id']))?>"><?php echo $class['vd_name']?></a></span>
							</div>
							<div class="healthBottomFont_qty">
								VID<span>EO</span>
							</div>
						</div>
					</div>
					<!--视频分类-->
					<?php if($class['child']&&is_array($class['child'])) {?>
					<div class="videoUl_qty">
						<ul>
						    <?php foreach($class['child'] as $childc){?>
							<li>
								<a href="<?php echo urlShop("video","video",array("parent_id"=>$class["vd_parent_id"],"childlist"=>1,"vd_id"=>$childc['vd_id']))?>"><?php echo mb_substr($childc['vd_name'], 0,4,"utf-8")?></a>
							</li>
							
							<?php }?>
							<li>
								<a href="<?php echo urlShop("video","video",array("parent_id"=>$class["vd_parent_id"],"childlist"=>1,"vd_id"=>$class['vd_id']))?>">全部&nbsp;&nbsp;&nbsp;&nbsp;》</a>
							</li>
						</ul>
					</div>
					<?php }?>
					<!--四小-->				
				</div>
				<?php }?>
		</div>
		<!--健康讲堂视频左边结束-->
		<!--健康讲堂视频右边开始-->
		<div class="healthVideoRight_qty">
			<div class="healthVideoSmallBox_qty" >
				<div class="healthVideoRightLeft_qty" >
                <div id="video_view" style="width:100%;height:100%"></div>
				
				</div>
				<div class="healthVideoRightRight_qty">
					<div class="sendBox_qty">留言板</div>
					<div class="scrool_qty">
						<div class="scroolBox_qty">
							<div class="message_qty">
								<div class="messageImg">
									<img src="themes/image/message_qty_03.png"/>
									<span>张三：</span>
									<p>仪年堂怎么用啊</p>
								</div>
							</div>
						</div>
					</div>
					<div class="scroolBottom_qty">
						<div class="scrolCenter_qty">
							<h3>历史留言</h3>
							<div class="input_qty">
								<input type="text" name="" id="" value="" />
								<div>发送</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<h1>相关推荐</h1>
			<ul class="list_qty">
			     <?php $j=0;?>
			     <?php foreach ($output['video_recommend'][0]['code_info'] as $focus){?>
			     <?php foreach ($focus['pic_list'] as $child_focus) {?>
			     <?php if($j<4) {?>
			     <?php if($child_focus['pic_img']) {?>
				<li>
					<div class="listLis_qty">
						<a href="<?php echo $child_focus['pic_url']?>">
							<img src="<?php echo UPLOAD_SITE_URL.DS.$child_focus['pic_img']?>" alt="">
							<div class="listLismall_qty"><?php echo $child_focus['pic_name']?></div>
						</a>
					</div>
				</li>
				<?php $j++;?>
				<?php }?>
				<?php }?>
				<?php }?>
				<?php }?>
			</ul>
		</div>
		<!--健康讲堂视频右边开始-->
	</div>
	<!--健康讲堂视频结束-->
	<!--<div class="more_qty">
		<a href="">更多</a>
	</div>-->
	</div>
</div>
<script type="text/javascript">
var videoObject = {
		container: '#video_view', //容器的ID或className
		variable: 'player',
		debug:true,//开启调试模式
		flashplayer: false, //是否需要强制使用flashplayer
		video: '<?php echo  $output['article']["video_ad_url"]?>'
	};
	var player = new ckplayer(videoObject);
</script>

<!-- 视频展示页 end -->