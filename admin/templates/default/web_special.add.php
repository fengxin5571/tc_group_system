<?php defined('InShopNC') or exit('Access Invalid!');?>
<style type="text/css">
h3.dialog_head { margin: 0 !important;}
.dialog_content { padding: 0 15px 15px !important; overflow: hidden;}
</style>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/jquery.ui.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/dialog/dialog.js" id="dialog_js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/fileupload/jquery.iframe-transport.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/fileupload/jquery.ui.widget.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/fileupload/jquery.fileupload.js" charset="utf-8"></script>
<link media="all" rel="stylesheet" href="<?php echo RESOURCE_SITE_URL;?>/js/jquery.imgareaselect/imgareaselect-animated.css" type="text/css" />
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.imgareaselect/jquery.imgareaselect.min.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.nyroModal/custom.min.js" charset="utf-8"></script>
<link href="<?php echo RESOURCE_SITE_URL;?>/js/jquery.nyroModal/styles/nyroModal.css" rel="stylesheet" type="text/css" id="cssfile2" />
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/cms/cms_special.js" charset="utf-8"></script>
<script type="text/javascript">
    $(document).ready(function(){
    $("#btn_draft").click(function() {
        $("#special_state").val("draft");
        $("#add_form").submit();
    });
    $("#btn_publish").click(function() {
        $("#special_state").val("publish");
        $("#add_form").submit();
    });
    $('#add_form').validate({
        errorPlacement: function(error, element){
            error.appendTo(element.parents("tr").prev().find('td:first'));
        },
        rules : {
            special_title: {
                required : true,
                maxlength : 24,
                
            }
        },
        messages : {
            special_title: {
                required : "专题标题不能空",
                maxlength : "专题标题超过24字", 
                
            }
        }
    });


    });
</script>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['nc_cms_special_manage'];?></h3>
      <ul class="tab-base">
        <?php   foreach($output['menu'] as $menu) {  if($menu['menu_type'] == 'text') { ?>
        <li><a href="<?php echo $menu['menu_url'];?>" class="current"><span><?php echo $menu['menu_name'];?></span></a></li>
        <?php }  else { ?>
        <li><a href="<?php echo $menu['menu_url'];?>" ><span><?php echo $menu['menu_name'];?></span></a></li>
        <?php  } }  ?>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="add_form" method="post" enctype="multipart/form-data" action="index.php?act=web_special&op=special_save">
    <input name="special_id" type="hidden" value="<?php if(!empty($output['special_detail'])) echo $output['special_detail']['special_id'];?>" />
    <input id="special_state" name="special_state" type="hidden" value="" />
    <table class="table tb-type2">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label for="special_title" class="validation">标题</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input id="special_title" name="special_title" class="txt" type="text" value="<?php if(!empty($output['special_detail'])) echo $output['special_detail']['special_title'];?>"/></td>
          <td class="vatop tips">标题不能超过24个字</td>
        </tr>
        <tr class="noborder">
          <td colspan="2" class="required"><label for="special_title" class="validation">专题样式</label></td>
        </tr>
        <tr class="noborder">
            <td class="vatop rowform">
                <select name="special_type">
                   <option value="1">食维健</option> 
                   <option value="2">独一张</option> 
                </select>
            </td>
          <td class="vatop tips">专题页面呈现的效果,请谨慎选择一旦确定将不可更改</td>
        </tr>
        
        <tr class="space">
          <th colspan="2"><?php echo $lang['cms_special_background'];?></th>
        </tr>
        <tr>
          <td colspan="2" class="required">专题logo</td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><span class="type-file-show"> <a href="<?php if(!empty($output['special_detail']['special_logo'])){ echo getCMSSpecialImageUrl($output['special_detail']['special_logo']);} else {echo ADMIN_TEMPLATES_URL . '/images/preview.png';}?>" nctype="nyroModal"><img class="show_image" src="<?php echo ADMIN_TEMPLATES_URL;?>/images/preview.png"></a>
            </span> <span class="type-file-box">
            <input name="special_logo" type="file" class="type-file-file" id="special_logo" size="30" hidefocus="true" nctype="cms_image">
            <input name="old_special_logo" type="hidden" value="<?php echo $output['special_detail']['special_logo'];?>" />
            </span></td>
          <td class="vatop tips"><span class="vatop rowform">专题logo为专题页头部左侧logo</span></td>
        </tr>
        <tr>
          <td colspan="2" class="required">专题背景图</td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><span class="type-file-show"> <a href="<?php if(!empty($output['special_detail']['special_background'])){ echo getCMSSpecialImageUrl($output['special_detail']['special_background']);} else {echo ADMIN_TEMPLATES_URL . '/images/preview.png';}?>" nctype="nyroModal"><img class="show_image" src="<?php echo ADMIN_TEMPLATES_URL;?>/images/preview.png"></a>
            </span> <span class="type-file-box">
            <input name="special_background" type="file" class="type-file-file" id="special_background" size="30" hidefocus="true" nctype="cms_image">
            <input name="old_special_background" type="hidden" value="<?php echo $output['special_detail']['special_background'];?>" />
            </span></td>
          <td class="vatop tips"><span class="vatop rowform">背景图即专题页面CSS属性中"body{ background-image}"值，选择本地图片上传作为页面整体背景。</span></td>
        </tr>
        
        <tr>
          <td colspan="2" class="required">背景图填充方式</td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><label class="mr10">
                  <input name="special_repeat" type="radio" value="no-repeat" <?php if($output['special_detail']['special_repeat'] == 'no-repeat') echo 'checked';?> />
              不重复</label>
            <label class="mr10">
              <input name="special_repeat" type="radio" value="repeat" <?php if($output['special_detail']['special_repeat'] == 'repeat') echo 'checked';?>/>
              平铺</label>
            <label class="mr10">
              <input name="special_repeat" type="radio" value="repeat-x" <?php if($output['special_detail']['special_repeat'] == 'repeat-x') echo 'checked';?>/>
              x轴平铺</label>
            <label class="mr10">
              <input name="special_repeat" type="radio" value="repeat-y" <?php if($output['special_detail']['special_repeat'] == 'repeat-y') echo 'checked';?>/>
              y轴平铺</label></td>
          <td class="vatop tips"><span class="vatop rowform">背景图填充方式即专题页面CSS属"body{ background-repeat}"值，选择不重复(no-repeat)|平铺(repeat)|x轴平铺(repeat-x)|y轴平铺(repeat-y)为背景图的填充方式。</span></td>
        </tr>
        <?php if($output['special_detail']['special_id']) { ?>
        <tr class="space">
          <th colspan="2">专题内容<?php echo $lang['nc_colon'];?></th>
        </tr>
        <tr>
          <td colspan="2" class="cms-special-tab">
          <div class="nav-bar">
          <input id="btn_content_view" type="button" value="<?php echo $lang['cms_text_view'];?>" class="tab-btn actived" />
          <input id="btn_content_edit" type="button" value="<?php echo $lang['nc_edit'];?>" class="tab-btn" />
          </div>
          <div class="tab-content" style=" background-color: <?php echo $output['special_detail']['special_background_color'];?>; background-image: url(<?php if(!empty($output['special_detail']['special_background'])){echo getCMSSpecialImageUrl($output['special_detail']['special_background']);}?>); background-repeat: <?php echo $output['special_detail']['special_repeat'];?>; background-position: top center; width: 100%; padding: 0; margin: 0; overflow: hidden;"><div id="div_content_view" style=" background-color: transparent; background-image: none; width: 1000px; margin-top: <?php echo $output['special_detail']['special_margin_top']?>px; margin-right: auto; margin-bottom: 0; margin-left: auto; border: 0; overflow: hidden;"></div></div>
          <div id="div_content_edit" class="tab-content" style="display:none;">
          <textarea id="special_content" name="special_content" rows="50" cols="80"><?php echo $output['special_detail']['special_content'];?></textarea>
          </div>
        </td>
        </tr>
        <?php }?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="2"><a href="JavaScript:void(0);" class="btn" id="btn_draft"><span>保存草稿</span></a> <a href="JavaScript:void(0);" class="btn"  id="btn_publish"><span>发布专题</span></a></td>
        </tr>
    </table>
  </form>
  
