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
var SHOP_SITE_URL = "<?php echo SHOP_SITE_URL; ?>";
var UPLOAD_SITE_URL = "<?php echo UPLOAD_SITE_URL; ?>";
var ATTACH_ADV = "<?php echo ATTACH_ADV; ?>";
var screen_adv_list = new Array();//焦点大图广告数据
var screen_adv_append = '';
var focus_adv_append = '';

var adv_info = new Array();
var ap_id = 0;
<?php if(!empty($output['screen_adv_list']) && is_array($output['screen_adv_list'])){ ?>
<?php foreach ($output['screen_adv_list'] as $key => $val) { ?>
adv_info = new Array();
ap_id = "<?php echo $val['ap_id'];?>";
adv_info['ap_id'] = ap_id;
adv_info['ap_name'] = "<?php echo $val['ap_name'];?>";
adv_info['ap_img'] = "<?php echo $val['default_content'];?>";
screen_adv_list[ap_id] = adv_info;
screen_adv_append += '<option value="'+ap_id+'">'+adv_info['ap_name']+'</option>';
<?php } ?>
<?php } ?>
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
    function submit_delete_batch(){
        /* 获取选中的项 */
        var items = '';
        $('.checkitem:checked').each(function(){
            items += this.value + ',';
        });
        if(items != '') {
            items = items.substr(0, (items.length - 1));
            submit_delete(items);
        }  
        else {
            alert('<?php echo $lang['nc_please_select_item'];?>');
        }
    }
    function submit_delete(id){
        if(confirm('您确定要删除吗?')) {
            $('#add_form').attr('method','post');
            $('#add_form').attr('action','index.php?act=web_special&op=special_nav_drop');
            $('#special_nav_id').val(id);
            
            $('#add_form').submit();
        }
    }

    /*推荐文章*/
    function submit__recommend_batch(){
   	 var items = '';
   	 $('.checkitem_article:checked').each(function(){
         items += this.value + ',';
     });
    	if(items != '') {
            items = items.substr(0, (items.length - 1));
            if(confirm("您确定要推荐吗？")){
            	$('#add_form').attr('method','post');
                $('#add_form').attr('action','index.php?act=web_special&op=special_article');
                $('#add_form').submit();
            }
        }  
    	else {
            alert('<?php echo $lang['nc_please_select_item'];?>');
        }
     }
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
  
  <table class="table tb-type2">
   <tbody>
    <tr class="noborder">
      <td class="required">专题页首页banner<?php echo $lang['nc_colon'];?></td>
      <td class="vatop tips"><span class="vatop rowform">专题首页广告banner</span></td>
    </tr>
   <!-- 专题首页banner start -->
        <tr class="noborder">
        	<td class="vatop rowform" colspan="2">
        		<div  class="homepage-focus" id="homepageFocusTab" style="margin-top: 0px">
        			<ul class="tab-menu">
                      <li class="current" form="upload_screen_form"><?php echo '首页全屏(背景)焦点大图';?></li>
                      <?php if($output['special_detail']['special_type']==2) {?>
                      <li  form="upload_honor_form">荣誉资质</li>
                      <li form="upload_recure_form">康复案例</li>
                      <li form="upload_store_form">店面展示</li>
                      <li form="upload_canvass_form">招商加盟</li>
                      <?php }?>
                    </ul>
                    <!-- 首页banner start -->
                     <form id="upload_screen_form" class="tab-content" name="upload_screen_form" enctype="multipart/form-data" method="post" action="index.php?act=web_special&op=screen_pic" target="upload_pic">
                      <input type="hidden" name="form_submit" value="ok" />
                      <input type="hidden" name="special_id" value="<?php echo $output['code_screen_list']['special_id'];?>">
                      <input type="hidden" name="code_id" value="<?php echo $output['code_screen_list']['code_id'];?>">
                      <input type="hidden" name="key" value="">
                      <div class="full-screen-slides" style="width: 800px;margin: 0 auto;">
                        <ul style="overflow: hidden;">
                          <?php if (is_array($output['code_screen_list']['code_info']) && !empty($output['code_screen_list']['code_info'])) { ?>
                          <?php foreach ($output['code_screen_list']['code_info'] as $key => $val) { ?>
                          <?php if (is_array($val) && $val['ap_id'] > 0) { ?>
                          <li ap="1" screen_id="<?php echo $val['pic_id'];?>" title="可上下拖拽更改显示顺序">
                            广告调用
                                <a class="del" href="JavaScript:del_screen(<?php echo $val['pic_id'];?>,'upload_screen');" title="<?php echo $lang['nc_del'];?>">X</a>
                            <div class="focus-thumb" onclick="select_screen(<?php echo $val['pic_id'];?>,'upload_screen');" style="background-color:<?php echo $val['color'];?>;" title="点击编辑选中区域内容">
                                <img title="<?php echo $val['pic_name'];?>" src="<?php echo UPLOAD_SITE_URL.'/'.$val['pic_img'];?>"/></div>
                            <input name="screen_list[<?php echo $val['pic_id'];?>][pic_id]" value="<?php echo $val['pic_id'];?>" type="hidden">
                            <input name="screen_list[<?php echo $val['pic_id'];?>][ap_id]" value="<?php echo $val['ap_id'];?>" type="hidden">
                            <input name="screen_list[<?php echo $val['pic_id'];?>][pic_name]" value="<?php echo $val['pic_name'];?>" type="hidden">
                            <input name="screen_list[<?php echo $val['pic_id'];?>][color]" value="<?php echo $val['color'];?>" type="hidden">
                            <input name="screen_list[<?php echo $val['pic_id'];?>][pic_img]" value="<?php echo $val['pic_img'];?>" type="hidden">
                          </li>
                          <?php }else { ?>
                          <li ap="0" screen_id="<?php echo $val['pic_id'];?>" title="可上下拖拽更改显示顺序">
                            图片调用
                                <a class="del" href="JavaScript:del_screen(<?php echo $val['pic_id'];?>,'upload_screen');" title="<?php echo $lang['nc_del'];?>">X</a>
                            <div class="focus-thumb" onclick="select_screen(<?php echo $val['pic_id'];?>,'upload_screen');" style="background-color:<?php echo $val['color'];?>;" title="点击编辑选中区域内容">
                                <img title="<?php echo $val['pic_name'];?>" src="<?php echo UPLOAD_SITE_URL.'/'.$val['pic_img'];?>"/></div>
                            <input name="screen_list[<?php echo $val['pic_id'];?>][pic_id]" value="<?php echo $val['pic_id'];?>" type="hidden">
                            <input name="screen_list[<?php echo $val['pic_id'];?>][pic_name]" value="<?php echo $val['pic_name'];?>" type="hidden">
                            <input name="screen_list[<?php echo $val['pic_id'];?>][pic_url]" value="<?php echo $val['pic_url'];?>" type="hidden">
                            <input name="screen_list[<?php echo $val['pic_id'];?>][color]" value="<?php echo $val['color'];?>" type="hidden">
                            <input name="screen_list[<?php echo $val['pic_id'];?>][pic_img]" value="<?php echo $val['pic_img'];?>" type="hidden">
                          </li>
                          <?php } ?>
                          <?php } ?>
                          <?php } ?>
                        </ul>
                        <div class="add-focus"><a class="btn-add-nofloat" href="JavaScript:add_screen('pic','upload_screen');"><?php echo '图片调用';?></a>
                            <?php if(!empty($output['screen_adv_list']) && is_array($output['screen_adv_list'])){ ?>
                            <a class="btn-add-nofloat" href="JavaScript:add_screen('adv');"><?php echo '广告调用';?></a>
                            <?php } ?>
                            <span class="s-tips"><i></i><?php echo '小提示：单击图片选中修改，拖动可以排序，添加最多不超过5个，保存后生效。';?></span></div>
                      </div>
                      <table id="ap_screen" class="table tb-type2" style="display:none;">
                        <tbody>
                          <tr>
                            <td colspan="2" class="required"><?php echo '广告位'.$lang['nc_colon'];?></td>
                          </tr>
                          <tr class="noborder">
                            <td class="vatop rowform"><input type="hidden" name="ap_pic_id" value="">
                              <select id="ap_id_screen" name="ap_id_screen" class=" w200" onchange="select_ap_screen();"></select></td>
                            <td class="vatop tips">调用的数据是宽度为1920像素，高度为481像素的图片类广告位。</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="required"><label><?php echo '背景颜色'.$lang['nc_colon'];?></label></td>
                          </tr>
                          <tr class="noborder">
                            <td class="vatop"><input id="ap_color" name="ap_color" value="" class="" type="text"></td>
                            <td class="vatop tips">为确保显示效果美观，可设置首页全屏焦点图区域整体背景填充色用于弥补图片在不同分辨率下显示区域超出图片时的问题，可根据您焦点图片的基础底色作为参照进行颜色设置。</td>
                          </tr>
                        </tbody>
                      </table>
                      <table id="upload_screen" class="table tb-type2" style="display:none;">
                        <tbody>
                          <tr>
                            <td colspan="2" class="required"><?php echo '文字标题'.$lang['nc_colon'];?></td>
                          </tr>
                          <tr class="noborder">
                            <td class="vatop rowform"><input type="hidden" name="screen_id" value="">
                              <input class="txt" type="text" name="screen_pic[pic_name]" value=""></td>
                            <td class="vatop tips">图片标题文字将作为图片Alt形式显示。</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="required"><label><?php echo '图片跳转链接'.$lang['nc_colon'];?></label></td>
                          </tr>
                          <tr class="noborder">
                            <td class="vatop rowform"><input name="screen_pic[pic_url]" value="" class="txt" type="text"></td>
                            <td class="vatop tips">输入图片要跳转的URL地址，正确格式应以"http://"开头，点击后将以"_blank"形式另打开页面。</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="required"><?php echo "广告图片上传".$lang['nc_colon'];?></td>
                          </tr>
                          <tr class="noborder">
                            <td class="vatop rowform"><span class="type-file-box">
                              <input type='text' name='textfield' id='textfield1' class='type-file-text' />
                              <input type='button' name='button' id='button1' value='' class='type-file-button' />
                              <input name="pic" id="pic" type="file" class="type-file-file" size="30">
                              </span></td>
                            <td class="vatop tips">为确保显示效果正确，请选择最小不低于W:776px H:300px、最大不超过W:1920px H:481px的清晰图片作为全屏焦点图。</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="required"><label><?php echo '背景颜色'.$lang['nc_colon'];?></label></td>
                          </tr>
                          <tr class="noborder">
                            <td class="vatop"><input id="screen_color" name="screen_pic[color]" value="" class="" type="text"></td>
                            <td class="vatop tips">为确保显示效果美观，可设置首页全屏焦点图区域整体背景填充色用于弥补图片在不同分辨率下显示区域超出图片时的问题，可根据您焦点图片的基础底色作为参照进行颜色设置。</td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="margintop"><a href="JavaScript:void(0);" onclick="$('#upload_screen_form').submit();" class="btn"><span>保存</span></a>
                      <input  type="hidden" name="obj_name" value="upload_screen"/>
                       <!--  <a href="index.php?act=web_api&op=html_update&web_id=<?php echo $output['code_screen_list']['web_id'];?>" class="btn"><span>更新板块内容</span></a>--> 
                        <span class="web-save-succ" style="display:none;">保存成功</span>
                        </div>
                    </form>
                    <!-- 首页banner end -->
                    <?php if($output['special_detail']['special_type']==2) {?>
                    <!-- 荣誉资质 start -->
                      <form id="upload_honor_form" class="tab-content" name="upload_screen_form" enctype="multipart/form-data" method="post" action="index.php?act=web_special&op=screen_pic" target="upload_pic" style="display: none">
                      <input type="hidden" name="form_submit" value="ok" />
                      <input type="hidden" name="special_id" value="<?php echo $output['code_screen_honor_list']['special_id'];?>">
                      <input type="hidden" name="code_id" value="<?php echo $output['code_screen_honor_list']['code_id'];?>">
                      <input type="hidden" name="key" value="">
                      <div class="full-screen-slides" style="width: 800px;margin: 0 auto;">
                        <ul style="overflow: hidden;">
                          <?php if (is_array($output['code_screen_honor_list']['code_info']) && !empty($output['code_screen_honor_list']['code_info'])) { ?>
                          <?php foreach ($output['code_screen_honor_list']['code_info'] as $key => $val) { ?>
                          <?php if (is_array($val) && $val['ap_id'] > 0) { ?>
                          <li ap="1" screen_id="<?php echo $val['pic_id'];?>" title="可上下拖拽更改显示顺序">
                            广告调用
                                <a class="del" href="JavaScript:del_screen(<?php echo $val['pic_id'];?>,'upload_honor');" title="<?php echo $lang['nc_del'];?>">X</a>
                            <div class="focus-thumb" onclick="select_screen(<?php echo $val['pic_id'];?>,'upload_honor');" style="background-color:<?php echo $val['color'];?>;" title="点击编辑选中区域内容">
                                <img title="<?php echo $val['pic_name'];?>" src="<?php echo UPLOAD_SITE_URL.'/'.$val['pic_img'];?>"/></div>
                            <input name="screen_honor_list[<?php echo $val['pic_id'];?>][pic_id]" value="<?php echo $val['pic_id'];?>" type="hidden">
                            <input name="screen_honor_list[<?php echo $val['pic_id'];?>][ap_id]" value="<?php echo $val['ap_id'];?>" type="hidden">
                            <input name="screen_honor_list[<?php echo $val['pic_id'];?>][pic_name]" value="<?php echo $val['pic_name'];?>" type="hidden">
                            <input name="screen_honor_list[<?php echo $val['pic_id'];?>][color]" value="<?php echo $val['color'];?>" type="hidden">
                            <input name="screen_honor_list[<?php echo $val['pic_id'];?>][pic_img]" value="<?php echo $val['pic_img'];?>" type="hidden">
                          </li>
                          <?php }else { ?>
                          <li ap="0" screen_id="<?php echo $val['pic_id'];?>" title="可上下拖拽更改显示顺序">
                            图片调用
                                <a class="del" href="JavaScript:del_screen(<?php echo $val['pic_id'];?>,'upload_honor');" title="<?php echo $lang['nc_del'];?>">X</a>
                            <div class="focus-thumb" onclick="select_screen(<?php echo $val['pic_id'];?>,'upload_honor');" style="background-color:<?php echo $val['color'];?>;" title="点击编辑选中区域内容">
                                <img title="<?php echo $val['pic_name'];?>" src="<?php echo UPLOAD_SITE_URL.'/'.$val['pic_img'];?>"/></div>
                            <input name="screen_honor_list[<?php echo $val['pic_id'];?>][pic_id]" value="<?php echo $val['pic_id'];?>" type="hidden">
                            <input name="screen_honor_list[<?php echo $val['pic_id'];?>][pic_name]" value="<?php echo $val['pic_name'];?>" type="hidden">
                            <input name="screen_honor_list[<?php echo $val['pic_id'];?>][pic_url]" value="<?php echo $val['pic_url'];?>" type="hidden">
                            <input name="screen_honor_list[<?php echo $val['pic_id'];?>][color]" value="<?php echo $val['color'];?>" type="hidden">
                            <input name="screen_honor_list[<?php echo $val['pic_id'];?>][pic_img]" value="<?php echo $val['pic_img'];?>" type="hidden">
                          </li>
                          <?php } ?>
                          <?php } ?>
                          <?php } ?>
                        </ul>
                        <div class="add-focus"><a class="btn-add-nofloat" href="JavaScript:add_screen('pic','upload_honor');"><?php echo '图片调用';?></a>
                            <?php if(!empty($output['screen_adv_list']) && is_array($output['screen_adv_list'])){ ?>
                            <a class="btn-add-nofloat" href="JavaScript:add_screen('adv');"><?php echo '广告调用';?></a>
                            <?php } ?>
                            <span class="s-tips"><i></i><?php echo '小提示：单击图片选中修改，拖动可以排序，添加最多不超过4个，保存后生效。';?></span></div>
                      </div>
                      <table id="ap_screen" class="table tb-type2" style="display:none;">
                        <tbody>
                          <tr>
                            <td colspan="2" class="required"><?php echo '广告位'.$lang['nc_colon'];?></td>
                          </tr>
                          <tr class="noborder">
                            <td class="vatop rowform"><input type="hidden" name="ap_pic_id" value="">
                              <select id="ap_id_screen" name="ap_id_screen" class=" w200" onchange="select_ap_screen();"></select></td>
                            <td class="vatop tips">调用的数据是宽度为1920像素，高度为481像素的图片类广告位。</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="required"><label><?php echo '背景颜色'.$lang['nc_colon'];?></label></td>
                          </tr>
                          <tr class="noborder">
                            <td class="vatop"><input id="ap_color" name="ap_color" value="" class="" type="text"></td>
                            <td class="vatop tips">为确保显示效果美观，可设置首页全屏焦点图区域整体背景填充色用于弥补图片在不同分辨率下显示区域超出图片时的问题，可根据您焦点图片的基础底色作为参照进行颜色设置。</td>
                          </tr>
                        </tbody>
                      </table>
                      <table id="upload_honor_screen" class="table tb-type2" style="display:none;">
                        <tbody>
                          <tr>
                            <td colspan="2" class="required"><?php echo '文字标题'.$lang['nc_colon'];?></td>
                          </tr>
                          <tr class="noborder">
                            <td class="vatop rowform"><input type="hidden" name="screen_id" value="">
                              <input class="txt" type="text" name="screen_pic[pic_name]" value=""></td>
                            <td class="vatop tips">图片标题文字将作为图片Alt形式显示。</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="required"><label><?php echo '图片跳转链接'.$lang['nc_colon'];?></label></td>
                          </tr>
                          <tr class="noborder">
                            <td class="vatop rowform"><input name="screen_pic[pic_url]" value="" class="txt" type="text"></td>
                            <td class="vatop tips">输入图片要跳转的URL地址，正确格式应以"http://"开头，点击后将以"_blank"形式另打开页面。</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="required"><?php echo "广告图片上传".$lang['nc_colon'];?></td>
                          </tr>
                          <tr class="noborder">
                            <td class="vatop rowform"><span class="type-file-box">
                              <input type='text' name='textfield' id='textfield1' class='type-file-text' />
                              <input type='button' name='button' id='button1' value='' class='type-file-button' />
                              <input name="pic" id="pic" type="file" class="type-file-file" size="30">
                              </span></td>
                            <td class="vatop tips">为确保显示效果正确，请选择W:214px H:264px的清晰图片作为全屏焦点图。</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="required"><label><?php echo '背景颜色'.$lang['nc_colon'];?></label></td>
                          </tr>
                          <tr class="noborder">
                            <td class="vatop"><input id="screen_color" name="screen_pic[color]" value="" class="" type="text"></td>
                            <td class="vatop tips">为确保显示效果美观，可设置首页全屏焦点图区域整体背景填充色用于弥补图片在不同分辨率下显示区域超出图片时的问题，可根据您焦点图片的基础底色作为参照进行颜色设置。</td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="margintop"><a href="JavaScript:void(0);" onclick="$('#upload_honor_form').submit();" class="btn"><span>保存</span></a>
                      <input  type="hidden" name="obj_name" value="upload_honor"/>
                       <!--  <a href="index.php?act=web_api&op=html_update&web_id=<?php echo $output['code_screen_list']['web_id'];?>" class="btn"><span>更新板块内容</span></a>--> 
                        <span class="web-save-succ" style="display:none;">保存成功</span>
                        </div>
                    </form>
                    <!-- 荣誉资质 end -->
      
                    <!-- 康复案例 start -->
                  <form id="upload_recure_form" class="tab-content" name="upload_screen_form" enctype="multipart/form-data" method="post" action="index.php?act=web_special&op=focus_pic" target="upload_pic" style="display:none;">
                      <input type="hidden" name="form_submit" value="ok" />
                      <input type="hidden" name="special_id" value="<?php echo $output['code_screen_recure_list']['special_id'];?>">
                      <input type="hidden" name="code_id" value="<?php echo $output['code_screen_recure_list']['code_id'];?>">
                      <input type="hidden" name="key" value="">
                      <div class="focus-trigeminy">
                        <?php if (is_array($output['code_screen_recure_list']['code_info']) && !empty($output['code_screen_recure_list']['code_info'])) { ?>
                        <?php foreach ($output['code_screen_recure_list']['code_info'] as $key => $val) { ?>
                        <div focus_id="<?php echo $key;?>" class="focus-trigeminy-group" title="<?php echo '可上下拖拽更改图片组显示顺序';?>">
                            <?php if (is_array($val['pic_list']) && $val['pic_list'][1]['ap_id'] > 0) { ?>
                            广告调用
                            <a class="del" href="JavaScript:del_focus(<?php echo $key;?>,'upload_recure');" title="<?php echo $lang['nc_del'];?>">X</a>
                          <ul>
                            <?php foreach($val['pic_list'] as $k => $v) { ?>
                            <li list="adv" pic_id="<?php echo $k;?>" onclick="select_focus(<?php echo $key;?>,this,'upload_recure');" title="<?php echo '可左右拖拽更改图片排列顺序';?>">
                                <div class="focus-thumb"><img title="<?php echo $v['pic_name'];?>" src="<?php echo UPLOAD_SITE_URL.'/'.$v['pic_img'];?>"/></div>
                              <input name="screen_recure_list[<?php echo $key;?>][pic_list][<?php echo $v['pic_id'];?>][pic_id]" value="<?php echo $v['pic_id'];?>" type="hidden">
                              <input name="screen_recure_list[<?php echo $key;?>][pic_list][<?php echo $v['pic_id'];?>][pic_name]" value="<?php echo $v['pic_name'];?>" type="hidden">
                              <input name="screen_recure_list[<?php echo $key;?>][pic_list][<?php echo $v['pic_id'];?>][ap_id]" value="<?php echo $v['ap_id'];?>" type="hidden">
                              <input name="screen_recure_list[<?php echo $key;?>][pic_list][<?php echo $v['pic_id'];?>][pic_img]" value="<?php echo $v['pic_img'];?>" type="hidden">
                            </li>
                            <?php } ?>
                          </ul>
                            <?php }else { ?>
                            图片调用
                            <a class="del" href="JavaScript:del_focus(<?php echo $key;?>,'upload_recure');" title="<?php echo $lang['nc_del'];?>">X</a>
                          <ul>
                            <?php foreach($val['pic_list'] as $k => $v) { ?>
                            <li list="pic" pic_id="<?php echo $k;?>" onclick="select_focus(<?php echo $key;?>,this,'upload_recure');" title="<?php echo '可左右拖拽更改图片排列顺序';?>">
                                <div class="focus-thumb"><img title="<?php echo $v['pic_name'];?>" src="<?php echo UPLOAD_SITE_URL.'/'.$v['pic_img'];?>"/></div>
                              <input name="screen_recure_list[<?php echo $key;?>][pic_list][<?php echo $v['pic_id'];?>][pic_id]" value="<?php echo $v['pic_id'];?>" type="hidden">
                              <input name="screen_recure_list[<?php echo $key;?>][pic_list][<?php echo $v['pic_id'];?>][pic_name]" value="<?php echo $v['pic_name'];?>" type="hidden">
                              <input name="screen_recure_list[<?php echo $key;?>][pic_list][<?php echo $v['pic_id'];?>][pic_url]" value="<?php echo $v['pic_url'];?>" type="hidden">
                              <input name="screen_recure_list[<?php echo $key;?>][pic_list][<?php echo $v['pic_id'];?>][pic_img]" value="<?php echo $v['pic_img'];?>" type="hidden">
                            </li>
                            <?php } ?>
                          </ul>
                            <?php } ?>
                        </div>
                        <?php } ?>
                        <?php } ?>
                        <div class="add-tab" id="btn_add_list"> <a class="btn-add-nofloat" href="JavaScript:add_focus('pic','upload_recure');"><?php echo '图片组';?></a>
                            <?php if(!empty($output['focus_adv_list']) && is_array($output['focus_adv_list'])){ ?>
                            <a class="btn-add-nofloat" href="JavaScript:add_focus('adv');"><?php echo '广告组';?></a>
                            <?php } ?>
                            <span class="s-tips"><i></i>小提示：可添加每组3张，最多5组联动广告图，单击图片为单张编辑，拖动排序，保存生效。</span></div>
                      </div>
                      <table id="ap_focus" class="table tb-type2" style="display:none;">
                        <tbody>
                          <tr>
                            <td colspan="2" class="required"><?php echo '广告位'.$lang['nc_colon'];?></td>
                          </tr>
                          <tr class="noborder">
                            <td class="vatop rowform">
                              <select id="ap_id_focus" name="ap_id_focus" class=" w200" onchange="select_ap_focus();"></select></td>
                            <td class="vatop tips">调用的数据是宽度为259像素，高度为180像素的图片类广告位。</td>
                          </tr>
                        </tbody>
                      </table>
                      <table id="upload_recure_table" class="table tb-type2" style="display:none;">
                        <tbody>
                          <tr>
                            <td colspan="2" class="required"><?php echo '文字标题'.$lang['nc_colon'];?></td>
                          </tr>
                          <tr class="noborder">
                            <td class="vatop rowform"><input type="hidden" name="slide_id" value="">
                              <input type="hidden" name="pic_id" value="">
                              <input class="txt" type="text" name="focus_pic[pic_name]" value=""></td>
                            <td class="vatop tips">图片标题文字将作为图片Alt形式显示。</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="required"><label><?php echo '图片跳转链接'.$lang['nc_colon'];?></label></td>
                          </tr>
                          <tr class="noborder">
                            <td class="vatop rowform"><input name="focus_pic[pic_url]" value="" class="txt" type="text"></td>
                            <td class="vatop tips">输入图片要跳转的URL地址，正确格式应以"http://"开头，点击后将以"_blank"形式另打开页面。</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="required"><?php echo  '广告图片上传'.$lang['nc_colon'];?></td>
                          </tr>
                          <tr class="noborder">
                            <td class="vatop rowform"><span class="type-file-box">
                              <input type='text' name='textfield' id='textfield1' class='type-file-text' />
                              <input type='button' name='button' id='button1' value='' class='type-file-button' />
                              <input name="pic" id="pic" type="file" class="type-file-file" size="30">
                              </span></td>
                            <td class="vatop tips">为确保显示效果正确，请选择W:306px H:378px的清晰图片作为联动广告图组单图。</td>
                          </tr>
                        </tbody>
                      </table>
                      <a href="JavaScript:void(0);" onclick="$('#upload_recure_form').submit();" class="btn"><span>保存</span></a>
                      <input type="hidden" name="obj_name" value="upload_recure" />
                    <!--   <a href="index.php?act=web_api&op=html_update&web_id=<?php echo $output['code_screen_list']['web_id'];?>" class="btn"><span><?php echo $lang['web_config_web_html'];?></span></a>--> 
                      <span class="web-save-succ" style="display:none;"><?php echo $lang['nc_common_save_succ'];?></span>
                    </form>
                    <!-- 康复案例 end-->
                    
                    <!-- 店面展示 start -->
                     <form id="upload_store_form" class="tab-content" name="upload_screen_form" enctype="multipart/form-data" method="post" action="index.php?act=web_special&op=focus_pic" target="upload_pic" style="display:none;">
                      <input type="hidden" name="form_submit" value="ok" />
                      <input type="hidden" name="special_id" value="<?php echo $output['code_screen_store_list']['special_id'];?>">
                      <input type="hidden" name="code_id" value="<?php echo $output['code_screen_store_list']['code_id'];?>">
                      <input type="hidden" name="key" value="">
                      <div class="focus-trigeminy">
                        <?php if (is_array($output['code_screen_store_list']['code_info']) && !empty($output['code_screen_store_list']['code_info'])) { ?>
                        <?php foreach ($output['code_screen_store_list']['code_info'] as $key => $val) { ?>
                        <div focus_id="<?php echo $key;?>" class="focus-trigeminy-group" title="<?php echo '可上下拖拽更改图片组显示顺序';?>">
                            <?php if (is_array($val['pic_list']) && $val['pic_list'][1]['ap_id'] > 0) { ?>
                            广告调用
                            <a class="del" href="JavaScript:del_focus(<?php echo $key;?>,'upload_store');" title="<?php echo $lang['nc_del'];?>">X</a>
                          <ul>
                            <?php foreach($val['pic_list'] as $k => $v) { ?>
                            <li list="adv" pic_id="<?php echo $k;?>" onclick="select_focus(<?php echo $key;?>,this,'upload_store');" title="<?php echo '可左右拖拽更改图片排列顺序';?>">
                                <div class="focus-thumb"><img title="<?php echo $v['pic_name'];?>" src="<?php echo UPLOAD_SITE_URL.'/'.$v['pic_img'];?>"/></div>
                              <input name="screen_store_list[<?php echo $key;?>][pic_list][<?php echo $v['pic_id'];?>][pic_id]" value="<?php echo $v['pic_id'];?>" type="hidden">
                              <input name="screen_store_list[<?php echo $key;?>][pic_list][<?php echo $v['pic_id'];?>][pic_name]" value="<?php echo $v['pic_name'];?>" type="hidden">
                              <input name="screen_store_list[<?php echo $key;?>][pic_list][<?php echo $v['pic_id'];?>][ap_id]" value="<?php echo $v['ap_id'];?>" type="hidden">
                              <input name="screen_store_list[<?php echo $key;?>][pic_list][<?php echo $v['pic_id'];?>][pic_img]" value="<?php echo $v['pic_img'];?>" type="hidden">
                            </li>
                            <?php } ?>
                          </ul>
                            <?php }else { ?>
                            图片调用
                            <a class="del" href="JavaScript:del_focus(<?php echo $key;?>,'upload_store');" title="<?php echo $lang['nc_del'];?>">X</a>
                          <ul>
                            <?php foreach($val['pic_list'] as $k => $v) { ?>
                            <li list="pic" pic_id="<?php echo $k;?>" onclick="select_focus(<?php echo $key;?>,this,'upload_store');" title="<?php echo '可左右拖拽更改图片排列顺序';?>">
                                <div class="focus-thumb"><img title="<?php echo $v['pic_name'];?>" src="<?php echo UPLOAD_SITE_URL.'/'.$v['pic_img'];?>"/></div>
                              <input name="screen_store_list[<?php echo $key;?>][pic_list][<?php echo $v['pic_id'];?>][pic_id]" value="<?php echo $v['pic_id'];?>" type="hidden">
                              <input name="screen_store_list[<?php echo $key;?>][pic_list][<?php echo $v['pic_id'];?>][pic_name]" value="<?php echo $v['pic_name'];?>" type="hidden">
                              <input name="screen_store_list[<?php echo $key;?>][pic_list][<?php echo $v['pic_id'];?>][pic_url]" value="<?php echo $v['pic_url'];?>" type="hidden">
                              <input name="screen_store_list[<?php echo $key;?>][pic_list][<?php echo $v['pic_id'];?>][pic_img]" value="<?php echo $v['pic_img'];?>" type="hidden">
                            </li>
                            <?php } ?>
                          </ul>
                            <?php } ?>
                        </div>
                        <?php } ?>
                        <?php } ?>
                        <div class="add-tab" id="btn_add_list"> <a class="btn-add-nofloat" href="JavaScript:add_focus('pic','upload_store');"><?php echo '图片组';?></a>
                            <?php if(!empty($output['focus_adv_list']) && is_array($output['focus_adv_list'])){ ?>
                            <a class="btn-add-nofloat" href="JavaScript:add_focus('adv');"><?php echo '广告组';?></a>
                            <?php } ?>
                            <span class="s-tips"><i></i>小提示：可添加每组4张，最多5组联动广告图，单击图片为单张编辑，拖动排序，保存生效。</span></div>
                      </div>
                      <table id="ap_focus" class="table tb-type2" style="display:none;">
                        <tbody>
                          <tr>
                            <td colspan="2" class="required"><?php echo '广告位'.$lang['nc_colon'];?></td>
                          </tr>
                          <tr class="noborder">
                            <td class="vatop rowform">
                              <select id="ap_id_focus" name="ap_id_focus" class=" w200" onchange="select_ap_focus();"></select></td>
                            <td class="vatop tips">调用的数据是宽度为259像素，高度为180像素的图片类广告位。</td>
                          </tr>
                        </tbody>
                      </table>
                      <table id="upload_store_table" class="table tb-type2" style="display:none;">
                        <tbody>
                          <tr>
                            <td colspan="2" class="required"><?php echo '文字标题'.$lang['nc_colon'];?></td>
                          </tr>
                          <tr class="noborder">
                            <td class="vatop rowform"><input type="hidden" name="slide_id" value="">
                              <input type="hidden" name="pic_id" value="">
                              <input class="txt" type="text" name="focus_pic[pic_name]" value=""></td>
                            <td class="vatop tips">图片标题文字将作为图片Alt形式显示。</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="required"><label><?php echo '图片跳转链接'.$lang['nc_colon'];?></label></td>
                          </tr>
                          <tr class="noborder">
                            <td class="vatop rowform"><input name="focus_pic[pic_url]" value="" class="txt" type="text"></td>
                            <td class="vatop tips">输入图片要跳转的URL地址，正确格式应以"http://"开头，点击后将以"_blank"形式另打开页面。</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="required"><?php echo '广告图片上传'.$lang['nc_colon'];?></td>
                          </tr>
                          <tr class="noborder">
                            <td class="vatop rowform"><span class="type-file-box">
                              <input type='text' name='textfield' id='textfield1' class='type-file-text' />
                              <input type='button' name='button' id='button1' value='' class='type-file-button' />
                              <input name="pic" id="pic" type="file" class="type-file-file" size="30">
                              </span></td>
                            <td class="vatop tips">为确保显示效果正确，请选择W:241px H:297px的清晰图片作为联动广告图组单图。</td>
                          </tr>
                        </tbody>
                      </table>
                      <a href="JavaScript:void(0);" onclick="$('#upload_store_form').submit();" class="btn"><span>保存</span></a>
                      <input type="hidden" name="obj_name" value="upload_store" />
                    <!--   <a href="index.php?act=web_api&op=html_update&web_id=<?php echo $output['code_screen_list']['web_id'];?>" class="btn"><span><?php echo $lang['web_config_web_html'];?></span></a>--> 
                      <span class="web-save-succ" style="display:none;"><?php echo $lang['nc_common_save_succ'];?></span>
                    </form>
                    <!-- 店面展示 end -->
                    <!-- 招商加盟 start -->
                       <form id="upload_canvass_form" class="tab-content" name="upload_screen_form" enctype="multipart/form-data" method="post" action="index.php?act=web_special&op=screen_pic" target="upload_pic" style="display: none">
                      <input type="hidden" name="form_submit" value="ok" />
                      <input type="hidden" name="special_id" value="<?php echo $output['code_screen_canvass_list']['special_id'];?>">
                      <input type="hidden" name="code_id" value="<?php echo $output['code_screen_canvass_list']['code_id'];?>">
                      <input type="hidden" name="key" value="">
                      <div class="full-screen-slides" style="width: 800px;margin: 0 auto;">
                        <ul style="overflow: hidden;">
                          <?php if (is_array($output['code_screen_canvass_list']['code_info']) && !empty($output['code_screen_canvass_list']['code_info'])) { ?>
                          <?php foreach ($output['code_screen_canvass_list']['code_info'] as $key => $val) { ?>
                          <?php if (is_array($val) && $val['ap_id'] > 0) { ?>
                          <li ap="1" screen_id="<?php echo $val['pic_id'];?>" title="可上下拖拽更改显示顺序">
                            广告调用
                                <a class="del" href="JavaScript:del_screen(<?php echo $val['pic_id'];?>,'upload_canvass');" title="<?php echo $lang['nc_del'];?>">X</a>
                            <div class="focus-thumb" onclick="select_screen(<?php echo $val['pic_id'];?>,'upload_canvass');" style="background-color:<?php echo $val['color'];?>;" title="点击编辑选中区域内容">
                                <img title="<?php echo $val['pic_name'];?>" src="<?php echo UPLOAD_SITE_URL.'/'.$val['pic_img'];?>"/></div>
                            <input name="screen_canvass_list[<?php echo $val['pic_id'];?>][pic_id]" value="<?php echo $val['pic_id'];?>" type="hidden">
                            <input name="screen_canvass_list[<?php echo $val['pic_id'];?>][ap_id]" value="<?php echo $val['ap_id'];?>" type="hidden">
                            <input name="screen_canvass_list[<?php echo $val['pic_id'];?>][pic_name]" value="<?php echo $val['pic_name'];?>" type="hidden">
                            <input name="screen_canvass_list[<?php echo $val['pic_id'];?>][color]" value="<?php echo $val['color'];?>" type="hidden">
                            <input name="screen_canvass_list[<?php echo $val['pic_id'];?>][pic_img]" value="<?php echo $val['pic_img'];?>" type="hidden">
                          </li>
                          <?php }else { ?>
                          <li ap="0" screen_id="<?php echo $val['pic_id'];?>" title="可上下拖拽更改显示顺序">
                            图片调用
                                <a class="del" href="JavaScript:del_screen(<?php echo $val['pic_id'];?>,'upload_canvass');" title="<?php echo $lang['nc_del'];?>">X</a>
                            <div class="focus-thumb" onclick="select_screen(<?php echo $val['pic_id'];?>,'upload_canvass');" style="background-color:<?php echo $val['color'];?>;" title="点击编辑选中区域内容">
                                <img title="<?php echo $val['pic_name'];?>" src="<?php echo UPLOAD_SITE_URL.'/'.$val['pic_img'];?>"/></div>
                            <input name="screen_canvass_list[<?php echo $val['pic_id'];?>][pic_id]" value="<?php echo $val['pic_id'];?>" type="hidden">
                            <input name="screen_canvass_list[<?php echo $val['pic_id'];?>][pic_name]" value="<?php echo $val['pic_name'];?>" type="hidden">
                            <input name="screen_canvass_list[<?php echo $val['pic_id'];?>][pic_url]" value="<?php echo $val['pic_url'];?>" type="hidden">
                            <input name="screen_canvass_list[<?php echo $val['pic_id'];?>][color]" value="<?php echo $val['color'];?>" type="hidden">
                            <input name="screen_canvass_list[<?php echo $val['pic_id'];?>][pic_img]" value="<?php echo $val['pic_img'];?>" type="hidden">
                          </li>
                          <?php } ?>
                          <?php } ?>
                          <?php } ?>
                        </ul>
                        <div class="add-focus"><a class="btn-add-nofloat" href="JavaScript:add_screen('pic','upload_canvass');"><?php echo '图片调用';?></a>
                            <?php if(!empty($output['screen_adv_list']) && is_array($output['screen_adv_list'])){ ?>
                            <a class="btn-add-nofloat" href="JavaScript:add_screen('adv');"><?php echo '广告调用';?></a>
                            <?php } ?>
                            <span class="s-tips"><i></i><?php echo '小提示：单击图片选中修改，拖动可以排序，添加最多不超过5个，保存后生效。';?></span></div>
                      </div>
                      <table id="ap_screen" class="table tb-type2" style="display:none;">
                        <tbody>
                          <tr>
                            <td colspan="2" class="required"><?php echo '广告位'.$lang['nc_colon'];?></td>
                          </tr>
                          <tr class="noborder">
                            <td class="vatop rowform"><input type="hidden" name="ap_pic_id" value="">
                              <select id="ap_id_screen" name="ap_id_screen" class=" w200" onchange="select_ap_screen();"></select></td>
                            <td class="vatop tips">调用的数据是宽度为1920像素，高度为481像素的图片类广告位。</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="required"><label><?php echo '背景颜色'.$lang['nc_colon'];?></label></td>
                          </tr>
                          <tr class="noborder">
                            <td class="vatop"><input id="ap_color" name="ap_color" value="" class="" type="text"></td>
                            <td class="vatop tips">为确保显示效果美观，可设置首页全屏焦点图区域整体背景填充色用于弥补图片在不同分辨率下显示区域超出图片时的问题，可根据您焦点图片的基础底色作为参照进行颜色设置。</td>
                          </tr>
                        </tbody>
                      </table>
                      <table id="upload_canvass_screen" class="table tb-type2" style="display:none;">
                        <tbody>
                          <tr>
                            <td colspan="2" class="required"><?php echo '文字标题'.$lang['nc_colon'];?></td>
                          </tr>
                          <tr class="noborder">
                            <td class="vatop rowform"><input type="hidden" name="screen_id" value="">
                              <input class="txt" type="text" name="screen_pic[pic_name]" value=""></td>
                            <td class="vatop tips">图片标题文字将作为图片Alt形式显示。</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="required"><label><?php echo '图片跳转链接'.$lang['nc_colon'];?></label></td>
                          </tr>
                          <tr class="noborder">
                            <td class="vatop rowform"><input name="screen_pic[pic_url]" value="" class="txt" type="text"></td>
                            <td class="vatop tips">输入图片要跳转的URL地址，正确格式应以"http://"开头，点击后将以"_blank"形式另打开页面。</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="required"><?php echo "广告图片上传".$lang['nc_colon'];?></td>
                          </tr>
                          <tr class="noborder">
                            <td class="vatop rowform"><span class="type-file-box">
                              <input type='text' name='textfield' id='textfield1' class='type-file-text' />
                              <input type='button' name='button' id='button1' value='' class='type-file-button' />
                              <input name="pic" id="pic" type="file" class="type-file-file" size="30">
                              </span></td>
                            <td class="vatop tips">为确保显示效果正确，请选择W:417px H:354px的清晰图片作为全屏焦点图。</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="required"><label><?php echo '背景颜色'.$lang['nc_colon'];?></label></td>
                          </tr>
                          <tr class="noborder">
                            <td class="vatop"><input id="screen_color" name="screen_pic[color]" value="" class="" type="text"></td>
                            <td class="vatop tips">为确保显示效果美观，可设置首页全屏焦点图区域整体背景填充色用于弥补图片在不同分辨率下显示区域超出图片时的问题，可根据您焦点图片的基础底色作为参照进行颜色设置。</td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="margintop"><a href="JavaScript:void(0);" onclick="$('#upload_canvass_form').submit();" class="btn"><span>保存</span></a>
                      <input  type="hidden" name="obj_name" value="upload_canvass"/>
                       <!--  <a href="index.php?act=web_api&op=html_update&web_id=<?php echo $output['code_screen_list']['web_id'];?>" class="btn"><span>更新板块内容</span></a>--> 
                        <span class="web-save-succ" style="display:none;">保存成功</span>
                        </div>
                    </form>
                    
                    <!-- 招商加盟 end -->
                    <?php }elseif($output['special_detail']['special_type']==1){?>
                    <?php }?>
        		</div>
        	</td>
        </tr>
        </tbody>
        </table>
        <!-- 专题首页banner end -->
  
  
  
  
  
  <form id="add_form" method="post" enctype="multipart/form-data" action="index.php?act=web_special&op=special_save" name="add_form">
    <input name="special_id" type="hidden" value="<?php if(!empty($output['special_detail'])) echo $output['special_detail']['special_id'];?>" />
    <input  type="hidden" id="special_nav_id" value="" name="special_nav_id"/>
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
                <select name="special_type" disabled="disabled">
                   <option value="1" <?php if($output['special_detail']['special_type']==1){echo "selected";}?>>食维健</option> 
                   <option value="2" <?php if($output['special_detail']['special_type']==2){echo "selected";}?>>独一张</option> 

                   <input type="hidden" name="special_type" value="<?php echo $output['special_detail']['special_type']?>"/>

                </select>
            </td>
          <td class="vatop tips">专题页面呈现的效果</td>
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
          <td class="vatop tips"><span class="vatop rowform"><?php if($output['special_detail']['special_type']==2) {echo "图片尺寸940*370";}else{echo '背景图即专题页面CSS属性中"body{ background-image}"值，选择本地图片上传作为页面整体背景。';}?></span></td>
        </tr>
        <!--  
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
        -->
        <tr class="noborder">
          <td c class="required">专题页首页导航<?php echo $lang['nc_colon'];?></td>
          <td class="vatop tips"><span class="vatop rowform">专题首页头部导航添加</span></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform" colspan="2">
        
          
           <table class="table tb-type2" style="margin-top: 0px;">
              <thead>
                <tr class="space">
                  <th colspan="15"><h3 style="width: 110px;float:left">专题导航<?php echo $lang['nc_list'];?> </h3>
                      <ul class="tab-base">
                        <li><a href="index.php?act=web_special&op=navigation_add&special_type=<?php echo $output['special_detail']['special_type']?>&special_id=<?php echo $output['special_detail']['special_id']?>" ><span><?php echo $lang['nc_new'];?></span></a></li>
                        </ul>
      			</th>
                </tr>
                <tr class="thead">
                  <th>&nbsp;</th>
                  <th><?php echo $lang['nc_sort'];?></th>
                  <th>标题</th>
                  <th>链接</th>
                  <th class="align-center">所在位置</th>
                  <th class="align-center">新窗口打开</th>
                  <th class="align-center"><?php echo $lang['nc_handle'];?></th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($output['navigation_list']) && is_array($output['navigation_list'])){ ?>
                <?php foreach($output['navigation_list'] as $k => $v){ ?>
                <tr class="hover">
                  <td class="w24"><input type="checkbox" name="del_id[]" value="<?php echo $v['nav_id'];?>" class="checkitem"></td>
                  <td class="w48 sort"><span title="<?php echo $lang['nc_editable'];?>" style="cursor:pointer;"  ajax_branch='nav_sort' datatype="number" fieldid="<?php echo $v['nav_id'];?>" fieldname="nav_sort" nc_type="inline_edit" class="editable"><?php echo $v['nav_sort'];?></span></td>
                  <td><?php echo $v['nav_title'];?></td>
                  <td><?php echo $v['nav_url'];?></td>
                  <td class="w150 align-center"><?php echo $v['nav_location'];?></td>
                  <td class="w150 align-center"><?php echo $v['nav_new_open'];?></td>
                  <td class="w72 align-center"><a href="index.php?act=navigation&op=navigation_edit&nav_id=<?php echo $v['nav_id'];?>&special_type=<?php echo $output['special_detail']['special_type']?>&special_navigation=1&special_id=<?php echo $output['special_detail']['special_id']?>"><?php echo $lang['nc_edit'];?></a> | <a href="javascript:if(confirm('<?php echo $lang['nc_ensure_del'];?>'))window.location = 'index.php?act=navigation&op=navigation_del&special_flag=1&&special_id=<?php echo  $output['special_detail']['special_id']?>&nav_id=<?php echo $v['nav_id'];?>';"><?php echo $lang['nc_del'];?></a></td>
                </tr>
                <?php } ?>
                <?php }else { ?>
                <tr class="no_data">
                  <td colspan="15"><?php echo $lang['nc_no_record'];?></td>
                </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <?php if(!empty($output['navigation_list']) && is_array($output['navigation_list'])){ ?>
                <tr class="tfoot">
                  <td><input type="checkbox" class="checkall" id="checkallBottom"></td>
                  <td colspan="16"><label for="checkallBottom"><?php echo $lang['nc_select_all']; ?></label>
                    &nbsp;&nbsp;<a href="JavaScript:void(0);" class="btn" onclick="submit_delete_batch()"><span><?php echo $lang['nc_del'];?></span></a>
                    <div class="pagination"> <?php echo $output['page'];?> </div></td>
                </tr>
                <?php } ?>
              </tfoot>
            </table>
           
          </td>
        </tr>
       <!--   <tr class="noborder">
          <td c class="required">专题集团新闻文章<?php echo $lang['nc_colon'];?></td>
          <td class="vatop tips"><span class="vatop rowform">专题首页集团类推荐文章,点击编辑，针对单个文章编辑与推荐操作，点击底部推荐按钮，可操作多个文章推荐</span></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform" colspan="2">
           <table class="table tb-type2" style="margin-top: 0px;">
              <thead>
                <tr class="space">
                  <th colspan="15"><h3 style="width: 110px;float:left">推荐文章<?php echo $lang['nc_list'];?> </h3>
                      <ul class="tab-base">
                        <li></li>
                        </ul>
      			</th>
                </tr>
                <tr class="thead">
                  <th class='w24'>&nbsp;</th>
                  <th class="w28"><?php echo $lang['nc_sort'];?></th>
                  <th>标题</th>
                  <th>是否推荐</th>
                  <th class="align-center">文章分类</th>
                  <th class="align-center">显示</th>
                  <th class="align-center">添加时间</th>
                  <th class="align-center"><?php echo $lang['nc_handle'];?></th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($output['article_list']) && is_array($output['article_list'])){ ?>
                <?php foreach($output['article_list'] as $k => $v){ ?>
                <tr class="hover">
                  <td><input type="checkbox" name='article_id[]' value="<?php echo $v['article_id']; ?>" class="checkitem_article"></td>
                  <td><?php echo $v['article_sort']; ?></td>
                  <td><?php echo $v['article_title']; ?></td>
                  <td><?php  if($v['article_recommend'] == 0){echo $lang['nc_no'];}else{echo $lang['nc_yes'];}?></td>
                  <td><?php echo $v['ac_name']; ?></td>
                  <td class="align-center"><?php if($v['article_show'] == '0'){echo $lang['nc_no'];}else{echo $lang['nc_yes'];} ?></td>
                  <td class="nowrap align-center"><?php echo $v['article_time']; ?></td>
                  <td class="align-center"><a href="index.php?act=article&op=article_edit&article_id=<?php echo $v['article_id']; ?>"><?php echo $lang['nc_edit'];?></a></td>
                </tr>
                <?php } ?>
                <?php }else { ?>
                <tr class="no_data">
                  <td colspan="15"><?php echo $lang['nc_no_record'];?></td>
                </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <?php if(!empty($output['article_list']) && is_array($output['article_list'])){ ?>
                <tr class="tfoot">
                  <td><input type="checkbox" class="checkall_article" id="checkallarticle"></td>
                  <td colspan="16"><label for="checkallarticle"><?php echo $lang['nc_select_all']; ?></label>
                    &nbsp;&nbsp;<a href="JavaScript:void(0);" class="btn" onclick="submit__recommend_batch()"><span>推荐</span></a>
                    <div class="pagination"> <?php echo $output['page'];?> </div></td>
                </tr>
                <?php } ?>
              </tfoot>
            </table>
          </td>
        </tr>
        -->
        <?php if($output['special_detail']['special_id']) { ?>
       <!--  <tr class="space">

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
        </tr>--> 
        <?php }?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="2"><a href="JavaScript:void(0);" class="btn" id="btn_draft"><span>保存草稿</span></a> <a href="JavaScript:void(0);" class="btn"  id="btn_publish"><span>发布专题</span></a></td>
        </tr>
    </table>
  </form>
  
  
<iframe style="display:none;" src="" name="upload_pic"></iframe>
<link href="<?php echo RESOURCE_SITE_URL;?>/js/colorpicker/evol.colorpicker.css" rel="stylesheet" type="text/css">
<script src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/jquery.ui.js"></script>
<script src="<?php echo RESOURCE_SITE_URL;?>/js/colorpicker/evol.colorpicker.min.js"></script>
<script src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.mousewheel.js"></script>
<script src="<?php echo RESOURCE_SITE_URL;?>/js/waypoints.js"></script>
<script src="<?php echo RESOURCE_SITE_URL;?>/web_config/special_focus.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.edit.js" charset="utf-8"></script>