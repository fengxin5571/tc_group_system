<?php defined('InShopNC') or exit('Access Invalid!');?>
<link href="<?php echo SHOP_TEMPLATES_URL;?>/css/layout.css" rel="stylesheet" type="text/css">
<link href="<?php echo SHOP_TEMPLATES_URL;?>/dw/css/healthList_qty.css" rel="stylesheet" type="text/css">
<style>
.nch-breadcrumb-layout {
	background: #F8F8F8;
}
</style>
<!-- 视频列表页 start -->
<?php $parent_id= $_REQUEST["parent_id"]?>
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
				<ul>
				    <?php if($output['article']&&is_array($output['article'])) {?>
				    <?php foreach ($output['article'] as $video) {?>
					<li>
						<div class="healthVideoS_qty">
							<a href="<?php echo urlShop('video','show',array('video_id'=>$video['video_id'],"parent_id"=>$parent_id))?>">
								<img src="<?php if($video[file_name]){echo UPLOAD_SITE_URL.'/shop/article/'.$video['file_name'];}else{echo UPLOAD_SITE_URL.'/shop/common/loading.gif';}?>" alt="">
								<div class="healthVideoSmallBottom_qty">
									<div class="videoSmall_qty">
										<span><?php echo mb_substr($video['video_title'], 0,10,"utf-8")?></span>
										<div>
										
											<img src="<?php echo SHOP_TEMPLATES_URL?>/dw/image/eye_qty_03.png"/>
											<span><?php echo $video['video_count']?></span>
										
										</div>
									</div>
								</div>
							</a>
						</div>
					</li>
					<?php }?>
					<?php }?>
				</ul>
			</div>
			<!--健康讲堂视频右边开始-->
		</div>
		<!--健康讲堂视频结束-->
		<div class="">
			<div class="pagination"> <?php echo $output['show_page'];?> </div>
		</div>
	</div>
</div>



<!-- 视频列表页 end -->