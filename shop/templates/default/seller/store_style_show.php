<?php defined('InShopNC') or exit('Access Invalid!');?>
<?php defined('InShopNC') or exit('Access Invalid!');?>

<div class="tabmenu">
  <?php include template('layout/submenu');?>
</div>
<div class="ncsc-form-default"> <div class="alert">
      <ul>
        <li>1. 最多可上传6张风采图片。</li>
        <li>2. 支持jpg、jpeg、gif、png格式上传，建议图片宽度162px、高度在162px、大小1.00M以内的图片。如果低于此尺寸没有放大效果。</li>
        <li>3. <?php echo $lang['store_slide_description_three'];?></li>
        
      </ul>
    </div>
  <div class="elegantLeft_qty">
    <?php if($output["store_info"]['store_style_show']) {?>
	<?php echo str_cut($output["store_info"]['store_style_show'], "300","...")?>
	<?php }else {?>
	山西太常生物科技有限公司是一家专业从事骨病调养，并以此为基础综合改善各类慢性病及亚健康症状的健康调理机构，是国内骨病个性化调养的开创者和领导者。
	<?php }?>
  </div>
  <div class="elegantRight_qty">
	<ul>
	    <?php if(!empty($output['store_style_show_img']) && is_array($output['store_style_show_img'])){?>
	        <?php for($i=0;$i<6;$i++){?>
	        
    		<li>
    		    <?php if($output['store_style_show_img'][$i]==""){?>
    			<img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS?>store_style_<?php echo $i+1?>.jpg">
    			<?php }else{?>
    			<img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS.$output['store_style_show_img'][$i];?>">
    			<?php }?>
    		</li>
    		<?php }?>
    		
    		<?php }else{?>
    		<li>
    			<img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS;?>dstore_style_1.jpg">
    		</li>
    		<li>
    			<img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS;?>dstore_style_2.jpg">
    		</li>
    		<li>
    			<img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS;?>dstore_style_3.jpg">
    		</li>
    		<li>
    			<img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS;?>dstore_style_4.jpg">
    		</li>
    		<li>
    			<img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS;?>dstore_style_5.jpg">
    		</li>
    		<li>
    			<img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS;?>dstore_style_6.jpg">
    		</li>
		<?php }?>
		
	</ul>
  </div>
  
  <form action="index.php?act=store_setting&op=store_style_show" id="store_slide_form" method="post" onsubmit="ajaxpost('store_slide_form', '', '', 'onerror');return false;">
    <input type="hidden" name="form_submit" value="ok" />
    <!-- 图片上传部分 -->
    <ul class="ncsc-store-slider" id="goods_images">
      <?php for($i=0;$i<6;$i++){?>
      <li nc_type="handle_pic" id="thumbnail_<?php echo $i;?>">
        <div class="picture" nctype="file_<?php echo $i;?>">
          <?php if (empty($output['store_style_show_img'][$i])) {?>
          <i class="icon-picture"></i>
          <?php } else {?>
          <img nctype="file_<?php echo $i;?>" src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS.$output['store_style_show_img'][$i];?>" />
          <?php }?>
          <input type="hidden" name="image_path[]" nctype="file_<?php echo $i;?>" value="<?php echo $output['store_style_show_img'][$i];?>" /><a href="javascript:void(0)" nctype="del" class="del" title="移除">X</a></div>
        
        
         <div class="ncsc-upload-btn"> <a href="javascript:void(0);"><span>
          <input type="file" hidefocus="true" size="1" class="input-file" name="file_<?php echo $i;?>" id="file_<?php echo $i;?>"/>
          </span>
          <p><i class="icon-upload-alt"></i><?php echo $lang['store_slide_image_upload'];?></p>
          </a></div></li>
      <?php } ?>
    </ul>
   <div class="bottom"><label class="submit-border"><input type="submit" class="submit" value="<?php echo $lang['store_slide_submit'];?>"></label></div>
  </form>
</div>
<script src="<?php echo RESOURCE_SITE_URL;?>/js/ajaxfileupload/ajaxfileupload.js" charset="utf-8"></script> 
<script src="<?php echo SHOP_RESOURCE_SITE_URL;?>/js/store_slide.js" charset="utf-8"></script>
<!-- 引入幻灯片JS --> 
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.flexslider-min.js"></script> 
<script type="text/javascript">
var SITEURL = "<?php echo SHOP_SITE_URL;?>";
var UPLOADTYPE =8;
var SHOP_TEMPLATES_URL = '<?php echo SHOP_TEMPLATES_URL;?>';
var UPLOAD_SITE_URL = '<?php echo UPLOAD_SITE_URL;?>';
var ATTACH_COMMON = '<?php echo ATTACH_COMMON;?>';
var ATTACH_STORE = '<?php echo ATTACH_STORE;?>';
var SHOP_RESOURCE_SITE_URL = '<?php echo SHOP_RESOURCE_SITE_URL;?>';
</script> 
