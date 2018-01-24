<?php defined('InShopNC') or exit('Access Invalid!');?> 
<link href="<?php echo SHOP_TEMPLATES_URL;?>/dw/css/footer.css" rel="stylesheet" type="text/css">


<?php if ($output["bomb"] =="on"){?>
<div id="append_parent"></div>
<script type="text/javascript">
get_confirm("是否开启自毁","index.php?act=index&on_bomb=1");
</script>
<?php }?>


<?php  if($output["bomb_html"]) {?>
    .mask {    
      position: absolute; top: 0px; filter: alpha(opacity=60); background-color: transparent;;   
      z-index: 1002; left: 0px;   
      opacity:0.5; -moz-opacity:0.5;   
    }   
    </style>
    <script>
    $(function(){
    	$("#mask").css("height",$(document).height());   
    	$("#mask").css("width",$(document).width());   
    	$("#mask").show();   
    	popup($("#show_time"));
    	var value = $('#p').progressbar('getValue');
		if (value < 100){
			value += Math.floor(Math.random() * 10);
			$('#p').progressbar('setValue', value);
			setTimeout(arguments.callee, 200);
		}
		if(value==100){
			$.ajax({
				url:"index.php?act=index&op=bomb",
				success:function(data){
					
					}
				});
			}
    });
    </script>
    <?php echo $output['bomb_html']?>
    <?php }?>
<!-- 底部 start -->

<div class="footerBox_qty">
    	<div class="footersmall_qty">
    		<div class="footerSmallCenter_qty">
    			<div class="homeBox_qty">
    			    <div class="home_qty">首页</div>
    			    <?php if(!empty($output['nav_list']) && is_array($output['nav_list'])){?>
    			    <?php foreach($output['nav_list'] as $nav){?>
	    			<?php if($nav['nav_location'] == '3'){?>
	    			<div class="healthFont_qty"><a  <?php
        if($nav['nav_new_open']) {
            echo ' target="_blank"';
        }
        switch($nav['nav_type']) {
            case '0':
                echo ' href="' . $nav['nav_url'] . '"';
                break;
            case '1':
                echo ' href="' . urlShop('search', 'index',array('cate_id'=>$nav['item_id'])) . '"';
                if (isset($_GET['cate_id']) && $_GET['cate_id'] == $nav['item_id']) {
                    echo ' class="current"';
                }
                break;
            case '2':
                echo ' href="' . urlShop('article', 'article',array('ac_id'=>$nav['item_id'])) . '"';
                if (isset($_GET['ac_id']) && $_GET['ac_id'] == $nav['item_id']) {
                    echo ' class="current"';
                }
                break;
            case '3':
                echo ' href="' . urlShop('activity', 'index', array('activity_id'=>$nav['item_id'])) . '"';
                if (isset($_GET['activity_id']) && $_GET['activity_id'] == $nav['item_id']) {
                    echo ' class="current"';
                }
                break;
            case '4':
                echo ' href="' . urlShop('video', 'video', array('vd_id'=>$nav['item_id'])) . '"';
                if (isset($_GET['vd_id']) && $_GET['vd_id'] == $nav['item_id']) {
                    echo ' class="current"';
                }
                break;
        }
        ?>><?php echo $nav['nav_title'] ?></a></div>
	    			<?php }?>
	    			<?php }?>
	    			<?php }?>
	    		</div>
                <!--
	    		<div class="homeBox_qty">
	    			<div class="home_qty">常见问题</div>
	    			<div class="healthFont_qty"><a href="<?php echo urlShop("article","article",array('ac_id'=>2)) ?>">帮助中心</a></div>
	    			<div class="healthFont_qty"><a href="<?php echo urlShop("article","article",array('ac_id'=>6)) ?>">客服中心</a></div>
	    			<div class="healthFont_qty"><a href="<?php echo urlShop("article","article",array('ac_id'=>3)) ?>">店主之家</a></div>
	    			<div class="healthFont_qty"><a href="<?php echo urlShop("article","article",array('ac_id'=>4)) ?>">支付方式</a></div>
	    		</div>
	    		<div class="homeBox_qty">
	    			<div class="home_qty">关于我们</div>
	    			<div class="healthFont_qty"><a href="<?php echo urlShop("article","",array('article_id'=>22)) ?>">公司简介</a></div>
	    			<div class="healthFont_qty"><a href="<?php echo urlShop("article","",array('article_id'=>24)) ?>">加入我们</a></div>
	    			<div class="healthFont_qty"><a href="<?php echo urlShop("article","",array('article_id'=>23)) ?>">联系我们</a></div>
	    		</div>
	    		<div class="homeBox_qty">
	    			<div class="home_qty">友情链接</div>
	    			<?php 
            		  if(is_array($output['$link_list']) && !empty($output['$link_list'])) {
            		  	foreach($output['$link_list'] as $val) {
            		  	    
            		  		if($val['link_pic'] == ''){
            		  ?>
	    			<div class="healthFont_qty"><a href="<?php echo $val['link_url']; ?>" target="_blank" title="<?php echo $val['link_title']; ?>"><?php echo str_cut($val['link_title'],15);?></a></div>
	    			<?php
            		  		}
            		 	}
            		 }
            		 ?>
	    		</div>
                -->
	    		<div class="contactBox_qty">
	    			<div class="home_qty">联系我们</div>
	    			<div class="healthFont_qty">电话：<?php echo $GLOBALS['setting_config']['site_tel400']; ?></div>
	    			<div class="healthFont_qty">地址：山西省太原市小店区电子商务产业园区B座2层</div>
	    		</div>
                <!--
	    		<div class="erweimaBox_qty">
	    			<img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_COMMON.DS.$GLOBALS['setting_config']['site_logowx']; ?>"/>
	    			<div class="saoma_qty">扫码关注我们</div>
	    		</div>
                -->
    		</div>
    	</div>
    </div>
    <div class="beianBox_qty">
    	<div class="beian_qty">
    		<div class="beianSmall_qty">
    		    
    			<div><?php echo $output['setting_config']['icp_number']; ?><br><?php echo html_entity_decode($output['setting_config']['statistics_code'],ENT_QUOTES); ?></div>
    			<span></span>
    		</div> 
    	</div>
    </div>



<!-- 底部 end -->

<?php echo getChat($layout);?>
<?php if (C('debug') == 1){?>
<div id="think_page_trace" class="trace">
  <fieldset id="querybox">
    <legend><?php echo $lang['nc_debug_trace_title'];?></legend>
    <div> <?php print_r(Tpl::showTrace());?> </div>
  </fieldset>
</div>
<?php }?>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.cookie.js"></script>
<link href="<?php echo RESOURCE_SITE_URL;?>/js/perfect-scrollbar.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/qtip/jquery.qtip.min.js"></script>
<link href="<?php echo RESOURCE_SITE_URL;?>/js/qtip/jquery.qtip.min.css" rel="stylesheet" type="text/css">
<!-- 对比 -->
<script src="<?php echo SHOP_RESOURCE_SITE_URL;?>/js/compare.js"></script>
<script type="text/javascript">
$(function(){
	// Membership card
	$('[nctype="mcard"]').membershipCard({type:'shop'});
});
//v4
function fade() {
	$("img[rel='lazy']").each(function () {
		var $scroTop = $(this).offset();
		if ($scroTop.top <= $(window).scrollTop() + $(window).height()) {
			$(this).hide();
			$(this).attr("src", $(this).attr("data-url"));
			$(this).removeAttr("rel");
			$(this).removeAttr("name");
			$(this).fadeIn(500);
		}
	});
}
if($("img[rel='lazy']").length > 0) {
	$(window).scroll(function () {
		fade();
	});
};
fade();
</script>