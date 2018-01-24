<?php defined('InShopNC') or exit('Access Invalid!');?>
<style>
.nch-breadcrumb-layout{background: #F8F8F8;}
a:hover{text-decoration: none;}
</style>
<link href="<?php echo SHOP_TEMPLATES_URL;?>/css/layout.css" rel="stylesheet" type="text/css">
<link href="<?php echo SHOP_TEMPLATES_URL;?>/dw/css/detail_qty.css" rel="stylesheet" type="text/css">

<!-- 文章频道页 start -->


<div class="detailBox_qty">
	<div class="detailSmallBox_qty">
		
		<!--健康咨询开始-->
		<div class="healthBox_qty">
			<div class="healthImgBox_qty">
				<img src="<?php echo SHOP_TEMPLATES_URL;?>/dw/image/store_qty.png"/>
			</div>
			<div class="healthRightBox_qty">
				<div class="healthTopFont_qty">
					健康<span>资讯</span>
				</div>
				<div class="healthBottomFont_qty">
					HEALTH<span>INFORMATION</span>
				</div>
			</div>
		</div>
		<!--健康资讯结束-->
		<!--健康养生四个开始-->
		<div class="healthDis_qty">
			<ul class="list_qty">
			    <?php foreach ($output['sub_class_list'] as $k=>$v){?>
			    <?php if($v[type]==1) {?>
				<li <?php if($k==0) {?>class="color_qty" <?php }?>><a href="<?php echo urlShop('article', 'article', array('ac_id'=>$v['ac_id'],'childlist'=>1));?>"><?php echo $v['ac_name']?></a></li>
				<?php }}?>
			</ul>
			<!--banner列表开始-->
			<div class="healthBannerBox_qty">
				<?php foreach ($output['sub_class_list'] as $k=>$v){?>
				<?php if($v[type]==1) {?>
				<div class="healthBanner_qty">
					<div class="healthBannerLeft_qty">
					    <?php echo loadadv("105".$k);?>
					</div>
					<div class="healthBannerRight_qty">
					   <?php if(!empty($output['article']) and is_array($output['article'])){?>
					    <?php $j=0;?>
					    <?php foreach ($output['article'] as $k=>$article) {?>
					    
					    <?php if($article['ac_id']==$v['ac_id']&&$j<3) {?>
					    <a <?php if($article['article_url']!=''){?>target="_blank"<?php }?> href="<?php if($article['article_url']!='')echo $article['article_url'];else echo urlShop('article', 'show', array('article_id'=>$article['article_id'],'childshow'=>1));?>">
						<div class="healthRightSmall_qty">
							<div class="healthSmall_qty">
								<h4>&nbsp;<span><?php echo sprintf("%02d",$j+1)?></span><?php echo $article[article_title] ?></h4>
								<div class="time_qty"><?php echo date("Y-m-d",$article[article_time])?></div>
							</div>
							<div class="healthBottomSmall_qty">
							     
								<?php echo  str_cut(strip_tags($article[article_content]),160,"...")?>
							</div>
							<div class="jiantouBox_qty"> <a href=""><span>&gt</span></a></div>
						</div>
						</a>
						<?php $j++;}?>
						<?php }?>
						<?php }else{?>
                        <li><?php echo $lang['article_article_no_new_article'];?></li>
                        <?php }?>
						<!--更多-->
					</div>
					<?php if(!empty($output['article']) and is_array($output['article'])){?>
					<div class="moreBox"><a href="<?php echo urlShop('article', 'article', array('ac_id'=>$v['ac_id'],'childlist'=>1));?>">更多</a></div>
					<?php }?>
				</div>
				<?php }}?>
			</div>
		</div>
		<!--banner列表结束-->
		<!--健康养生四个结束-->

		<!--<div class="moreBox"><a href="">更多</a></div>-->
		<!--热点咨询开始-->
		<div class="healthBox_qty">
			<div class="healthImgBox_qty">
				<img src="<?php echo SHOP_TEMPLATES_URL;?>/dw/image/store_qty.png"/>
			</div>
			<div class="healthRightBox_qty">
				<div class="healthTopFont_qty">
					热点<span>资讯</span>
				</div>
				<div class="healthBottomFont_qty">
					HOT&nbsp;<span>SPOT INFORMATION</span>
				</div>
			</div>
		</div>
		<!--热点资讯结束-->
		<!--热点资讯列表开始-->
		<ul class="hotBigBox_qty">
		
		   <?php if(!empty($output['article']) and is_array($output['article'])){?>
		   <?php $j=0;?>
		   <?php foreach ($output['article'] as $k=>$article) {?>
		   <?php if($article['article_recommend']&&$j<6){?>
			<li class="hotSmallBox_qty">
				<a <?php if($article['article_url']!=''){?>target="_blank"<?php }?> href="<?php if($article['article_url']!='')echo $article['article_url'];else echo urlShop('article', 'show', array('article_id'=>$article['article_id'],'childshow'=>1));?>">
					<div class="hotSmall_qty">
						<div class="hotTopFontBox_qty">
							<span class="bTime_qty"><?php echo date("Y-m-d",$article['article_time'])?></span>
							<span class="bFont_qty"><?php echo $article['ac_name']?></span>
						</div>
						<div class="hotImgBox_qty">
						    
							<img src="<?php if($article[file_name]){echo UPLOAD_SITE_URL.'/shop/article/'.$article['file_name'];}else{echo UPLOAD_SITE_URL.'/shop/common/loading.gif';}?>" width="330" height="132" data-url="<?php echo UPLOAD_SITE_URL;?>/shop/common/loading.gif"/>
						</div>
						<div class="hotFont_qty">
							<h5 style="font-weight: bold;"><?php echo str_cut($article['article_title'], 35,"...")?></h5>
						</div>
						<div class="hotFontCenter_qty">
							<?php echo str_cut(strip_tags($article[article_content]),120,"...")?>
						</div>
						<div class="rItBox_qty">
							<div href="">&lt</div>
						</div>
					</div>
				</a>
			</li>
			<?php }?>
			<?php $j++;}}?>

		</ul>
		<!--热点资讯列表结束-->
		
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$(".list_qty li").mouseover(function(){
			$(".list_qty li").eq($(this).index()).addClass("color_qty").siblings().removeClass('color_qty');
			$(".healthBanner_qty").hide().eq($(this).index()).show();
		});
	});
</script>
<!-- 文章频道页 end -->
