<?php defined('InShopNC') or exit('Access Invalid!');?>
<link href="<?php echo SHOP_TEMPLATES_URL;?>/dw/css/detailList.css" rel="stylesheet" type="text/css">
<!-- 文章列表页 start -->
<style>
.nch-breadcrumb-layout{background: #F8F8F8;}
a:hover{text-decoration: none;}
</style>
<div class="detailListBox_qty">
<div class="detailSmallListBox_qty">
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
	<!--健康资讯列表开始-->
	<div class="detailSmallBox_qty">
		<div class="detailList_qty">
			<ul class="list_qty">
			    <?php if($output['article']&&is_array($output['article'])) {?>
			    <?php foreach ($output['article'] as $k=>$article){?>
				<li>
					<div class="listSmall_qty">
						<h3><?php echo sprintf("%02d",$k+1)?></h3>
						<div class="listImgBox_qty">
							<img src="<?php if($article[file_name]){echo UPLOAD_SITE_URL.'/shop/article/'.$article['file_name'];}else{echo UPLOAD_SITE_URL.'/shop/common/loading.gif';}?>" width="418" height="169" data-url="<?php echo UPLOAD_SITE_URL;?>/shop/common/loading.gif"/>
						</div>
						<div class="detailRightBox_qty">
							<h5 ><?php echo $article['article_title']?></h5>
							<span class="english_qty">HEALTH IS ALWAYS AROUND YOU</span>
							<span class="time_qty"><?php echo date("Y-m-d",$article['article_time'])?></span>
							<p>
							    <?php echo mb_substr(strip_tags($article[article_content]), 0,100,"utf-8")?>

							</p>
						</div>
					</div>
					<div class="more_qty"><a <?php if($article['article_url']!=''){?>target="_blank"<?php }?> href="<?php if($article['article_url']!='')echo $article['article_url'];else echo urlShop('article', 'show', array('article_id'=>$article['article_id'],"childshow"=>1));?>">查看</a></div>
				</li>
				<?php }?>
				<?php }else {?>
				<li style="text-align: center;padding-top: 50px;font-size: 18px"><?php echo $lang['article_article_no_new_article'];?></li>
				<?php }?>
			</ul>
		</div>
		<!--咨询列表分页开始-->
		<?php if($output['article']&&is_array($output['article'])) {?>
		<div class="pageBox_qty">
			 <div class="pagination"><?php echo $output['show_page'];?></div>
	 	</div>
	 	<?php }?>
		<!--咨询列表分页结束-->
	</div>
	<!--健康咨询列表结束-->
	</div>
</div>


<!-- 文章列表页 end -->