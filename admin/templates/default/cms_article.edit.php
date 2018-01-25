<?php defined('InShopNC') or exit('Access Invalid!');?>
<link  href="<?php echo ADMIN_TEMPLATES_URL;?>/css/public.css" rel="stylesheet" type="text/css"/>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['nc_cms_article_manage'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=cms_article&op=cms_article_list"><span><?php echo $lang['nc_manage'];?></span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span>编辑</span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="article_form" method="post" name="articleForm">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2 nobdb">
      <tbody>
        <tr>
          <td colspan="2" class="required"><label class="validation" for="cate_id">所属分类:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><select name="class_id" id="class_id" required>
              <option value=""><?php echo $lang['nc_please_choose'];?>...</option>
              <?php if(!empty($output['parent_list']) && is_array($output['parent_list'])){ ?>
              <?php foreach($output['parent_list'] as $k => $v){ ?>
              <option <?php if($output['article_detail']['article_class_id'] == $v['class_id']){ ?>selected='selected'<?php } ?> value="<?php echo $v['class_id'];?>"><?php echo $v['class_name'];?></option>
              <?php } ?>
              <?php } ?>
            </select></td>
          <td class="vatop tips"></td>
        </tr>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation">文章标题:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['article_detail']['article_title']?>" name="article_title" id="article_title" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation">短标题:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['article_detail']['article_title_short']?>" name="article_title_short" id="article_title_short" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
         <tr class="noborder">
          <td colspan="2" class="required"><label class="validation">摘要:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><textarea id="article_abstract" class="textarea" name="article_abstract" style="width: 700px;height: 85px;"><?php echo $output['article_detail']['article_abstract']?></textarea></td>
          <td class="vatop tips"></td>
        </tr>
         <tr>
          <td colspan="2" class="required"><label class="validation">文章正文:</label></td>
        </tr>
        <tr class="noborder">
          <td colspan="2" class="vatop rowform"><?php showEditor('article_content',$output['article_detail']['article_content']);?></td>
        </tr>
         <tr>
          <td colspan="2" ><label class="validation">作者:</label></td>
        </tr>
        <tr class="noborder">
          <td colspan="2" class="vatop rowform"><input id="article_author" class="text w100 valid" name="article_author" type="text" value="<?php echo $output['article_detail']['article_author']?>"></td>
        </tr>
<!--         <tr> -->
<!--           <td colspan="2" ><label class="validation">相关商品:</label></td> -->
<!--         </tr> -->
<!--         <tr class="noborder"> -->
<!--           <td colspan="2" class="vatop rowform"> -->
<!--           <ul id="article_goods_list" class="article-goods-list"> -->
        <?php if($output['article_goods_list']&&is_array($output['article_goods_list'])) {?>
          <?php foreach ($output['article_goods_list'] as $good) {?>
<!--           <li nctype="btn_goods_select"> -->
<!--           <dl> -->
          <!--    <dt class="name"><a href="<?php echo $good['url'];?>" target="_blank"> <?php echo $good['title']?></a></dt>
            <dd class="image"><img title="<?php echo $good['title']?>" src="<?php echo $good['image']?>"></dd>
            <dd class="price">价格：<em style="color: #F30;font-weight: 400"><?php echo $good['price'];?></em></dd>
<!--           </dl> -->
<!--           <i>选择添加为关联的商品</i> -->
       <!--    <input name="article_goods_url[]" value="<?php echo $good['url']?>" type="hidden">
          <input name="article_goods_title[]" value="<?php echo $good['title']?>" type="hidden"><input name="article_goods_image[]" value="<?php echo $good['image']?>" type="hidden">
          <input name="article_goods_price[]" value="<?php echo $good['price']?>" type="hidden">
          <input name="article_goods_type[]" value="<?php echo $good['type'];?>" type="hidden"> -->
<!--           </li> -->
          <?php }?>
          <?php }?>
<!--                           </ul> -->
<!--           <p> -->
<!--           <input id="goods_search_type_url" value="goods_url" name="goods_search_type" type="radio" checked=""> -->
<!--           <label for="goods_search_type_url">商品链接</label> -->
<!--           <input id="goods_search_type_title" value="goods_name" name="goods_search_type" type="radio"> -->
<!--           <label for="goods_search_type_title">商品名称</label> -->
<!--          </p> -->
           <!--  <input id="goods_search_keyword" class="text w380" name="goods_search_keyword" type="text" style="width:380px">-->
<!--             <input id="btn_goods_search" class="btn-type-s" type="button" value="添加"> -->
<!--             <div id="div_goods_select"> </div> -->
<!--             <div class="hint">将商品网址复制到输入框可直接添加相关商品；或通过搜索商品名称选择要关联的商品。最多添加3件商品。</div> -->
<!--           </td> -->
<!--         </tr> -->
        <tr>
          <td colspan="2" ><label class="validation">相关文章:</label></td>
        </tr>
        <tr class="noborder">
          <td colspan="2" class="vatop rowform">
          <input id="article_link" name="article_link" type="hidden" value="<?php if(!empty($output['article_detail'])) echo $output['article_detail']['article_link'];?>">
          <ul id="article_link_list" class="article-link-list">
          <?php if($output['article_link_list']&&is_array($output['article_link_list'])) {?>
          <?php foreach($output['article_link_list'] as $article) {?>
          <li nctype="btn_article_select" article_id="<?php echo $article['article_id']?>">
          <a href="<?php echo getCMSArticleUrl($article['article_id'])?>" target="_blank"> <?php echo $article['article_title']?></a> <i>选择删除相关文章</i> 
          </li>
          <?php }?>
          <?php }?>
                          </ul>
         <p>
              <input id="article_search_type_id" name="article_search_type" type="radio" value="article_id" checked="">
              <label for="article_search_type_id">文章编号</label>
              <input id="article_search_type_title" name="article_search_type" value="article_keyword" type="radio">
              <label for="article_search_type_title">文章标题</label>
            </p>
            <input id="article_search_keyword" class="text w380" name="article_search_keyword" type="text"  style="width:380px">
            <input id="btn_article_search" class="btn-type-s" type="button" value="搜索">
            <div id="div_article_select"> </div>
            <div class="hint">直接搜索文章名称或输入文章编号进行关联；文章编号指文章网址的ID号，例：article_detail&amp;article_id=1 则文章编号为“1”。</div></div>
          </td>
        </tr>
        <tr>
          <td colspan="2" class=""><label class="" for="cate_id">文章标签:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><select name="tag_id" id="tag_id">
              <option value=""><?php echo $lang['nc_please_choose'];?>...</option>
              <?php if(!empty($output['tag_list']) && is_array($output['tag_list'])){ ?>
              <?php foreach($output['tag_list'] as $k => $v){ ?>
              <option   value="<?php echo $v['tag_id'];?>" <?php if($output['article_detail']["article_tag"]==$v['tag_id']){echo "selected";}?>><?php echo $v['tag_name'];?></option>
              <?php } ?>
              <?php } ?>
            </select></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="articleForm">链接:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['article_detail']['article_origin_address']?>" name="article_url" id="article_url" class="txt"></td>
          <td class="vatop tips"><?php echo $lang['article_add_url_tip'];?></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label>是否显示:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform onoff"><label for="article_show1" class="cb-enable selected" ><span><?php echo $lang['nc_yes'];?></span></label>
            <label for="article_show0" class="cb-disable" ><span><?php echo $lang['nc_no'];?></span></label>  
            <input id="article_show1" name="article_show"  value="1" type="radio" <?php if($output['article_detail']['article_state']==3){echo "checked='checked'";}?>>
            <input id="article_show0" name="article_show" value="0" type="radio" <?php if($output['article_detail']['article_state']!=3){echo "checked='checked'";}?>>
          
            </td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><?php echo $lang['nc_sort'];?>: 
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['article_detail']['article_sort']?>" name="article_sort" id="article_sort" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required">是否推荐: 
        </tr>
        <tr class="noborder">
          <td class="vatop rowform onoff"><label for="article_recommend1" class="cb-enable selected" ><span><?php echo $lang['nc_yes'];?></span></label>
            <label for="article_recommend0" class="cb-disable" ><span><?php echo $lang['nc_no'];?></span></label>
            <input id="article_recommend1" name="article_recommend"  value="1" type="radio" <?php if($output['article_detail']['article_commend_flag']==1){echo "checked='checked'";}?>>
            <input id="article_recommend0" name="article_recommend" value="0" type="radio" <?php if($output['article_detail']['article_commend_flag']==0){echo "checked='checked'";}?>></td>
          <td class="vatop tips"></td>
        </tr>
       
        <tr>
          <td colspan="2" class="required">图片上传:</td>
        </tr>
        <tr class="noborder">
          <td colspan="3" id="divComUploadContainer"><input type="file" multiple="multiple" id="fileupload" name="fileupload" /></td>
        </tr>
        <tr>
          <td colspan="2" class="required">已上传的图片:</td>
        <tr>
          <td colspan="2"><ul id="thumbnails" class="thumblists">
              <?php if(is_array($output['article_detail']['article_image_all'])){?>
              <?php foreach($output['article_detail']['article_image_all'] as $k => $v){ ?>
              <li id="<?php echo substr($v['name'], 0,strpos($v['name'],"."));?>" class="picture" style="width:120px" >
                <input type="hidden" name="file_id[]" value="<?php echo $v['name'].",".$v['path'];?>" />
                <div class="size-64x64"><span class="thumb"><i></i><img src="<?php echo getCMSArticleImageUrl($v['path'],$v['name'],"max")?>" alt="<?php echo $v['name'];?>" width='64' height="64"/></span></div>
                <p style="width:160px">
                <span style="width:35px"><a href="javascript:insert_editor('<?php echo getCMSArticleImageUrl($v['path'],$v['name'],"max");?>');">插入 </a></span>
                <span style="width:35px"><a href="javascript:insert_article_image('<?php echo getCMSArticleImageUrl($v['path'],$v['name'],"max");?>','<?php echo $v['name']?>');">封面 </a></span>
                <span style="width:35px"><a href="javascript:del_file_upload('<?php echo $v['name'];?>');"><?php echo $lang['nc_del'];?></a></span></p>
              </li>
              <?php } ?>
              <?php } ?>
            </ul><div class="tdare">
              
          </div></td>
        </tr>
         <tr>
          <td colspan="2" class="required">封面: 尺寸w:207*h:136
        </tr>
        <tr class="noborder">
          <td class="vatop rowform" id="article_img">
          <?php if(is_array($output['article_detail']['article_image'])) {?>
          <img src="<?php echo getCMSArticleImageUrl($output['article_detail']['article_image']['path'],$output['article_detail']['article_image']['name'],"max")?>"/>
          <?php }?>
          </td>
          <td class="vatop tips"></td>
        </tr>
      </tbody>
      <tfoot>
        <tr class="tfoot">
          <td colspan="15" ><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span><?php echo $lang['nc_submit'];?></span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/fileupload/jquery.iframe-transport.js" charset="utf-8"></script> 
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/fileupload/jquery.ui.widget.js" charset="utf-8"></script> 
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/fileupload/jquery.fileupload.js" charset="utf-8"></script> 
<script>
//按钮先执行验证再提交表单
$(function(){$("#submitBtn").click(function(){
    if($("#article_form").valid()){
     $("#article_form").submit();
	}
	});
});
//
$(document).ready(function(){
	$('#article_form').validate({
        errorPlacement: function(error, element){
			error.appendTo(element.parent().parent().prev().find('td:first'));
        },
        rules : {
            class_id:{
            	required   : true
            },
            article_title : {
                required   : true
            },
			
			article_url : {
				url : true
            },
			article_content : {
                required   : true
            },
            article_sort : {
                number   : true
            }
        },
        messages : {
            class_id:{
            	required   : '请选择所属分类'
            },
            article_title : {
                required   : '文章标题不能为空'
            },
			
			article_url : {
				url : '<?php echo $lang['article_add_url_wrong'];?>'
            },
			article_content : {
                required   : '文章正文不能为空'
            },
            article_sort  : {
                number   : '<?php echo $lang['article_add_sort_int'];?>'
            }
        }
    });
    // 图片上传
    $('#fileupload').each(function(){
        $(this).fileupload({
            dataType: 'json',
            url: 'index.php?act=cms_article&op=article_image_upload',
            done: function (e,data) {
                if(data .status!= 'fail'){
                	add_uploadedfile(data.result);
                }
            }
        });
    });
});


function add_uploadedfile(file_data)
{

    var newImg = '<li id="' + file_data.file_name.substring(0,file_data.file_name.lastIndexOf('.')) + '" class="picture" style="width: 120px;"><input type="hidden" name="file_id[]" value="' + file_data.file_name +','+file_data.file_path+ '" /><div class="size-64x64"><span class="thumb"><i></i><img src="'+file_data.file_url+'" alt="' + file_data.file_name + '" width="64px" height="64px"/></span></div><p style="width:160px"><span style="width:35px"><a href="javascript:insert_editor(\'' + file_data.file_url + '\');">插入</a></span><span style="width:35px"><a href="javascript:insert_article_image(\'' +file_data.file_url + '\',\''+file_data.file_name+'\');">封面</a></span><span style="width:35px"><a href="javascript:del_file_upload(\'' + file_data.file_name + '\');"><?php echo $lang['nc_del'];?></a></span></p></li>';
    $('#thumbnails').prepend(newImg);
}
function insert_editor(file_path){
	KE.appendHtml('article_content', '<img src="'+ file_path + '" alt="'+ file_path + '">');
}
function insert_article_image(file_path,file_name){
	var html="<img src='"+file_path+"'  width='202' height='126' >";
	      html+="<input  type='hidden' name='article_image' value='"+file_name+"'/>";
	$("#article_img").html(html);
}
function del_file_upload(file_id)
{
    if(!window.confirm('<?php echo $lang['nc_ensure_del'];?>')){
        return;
    }
    $.getJSON('index.php?act=cms_article&op=article_image_drop&image_name='+file_id, function(result){
        if(result.status=="success"){
            $('#' + file_id.substring(0,file_id.lastIndexOf("."))).remove();
        }else{
            alert('<?php echo $lang['article_add_del_fail'];?>');
        }
    });
}
//添加商品按钮文字
$("[name='goods_search_type']").click(function(){
    var search_type = $("[name='goods_search_type']:checked").val();
    if(search_type == 'goods_url') {
        $("#btn_goods_search").val("添加");
    } else {
        $("#btn_goods_search").val("搜索");
    }
});
//商品搜索
$("#btn_goods_search").click(function(){
    if($("#article_goods_list li").length < 3) { 
        var search_type = $("[name='goods_search_type']:checked").val();
        var search_keyword = $("#goods_search_keyword").val();
        $("#goods_search_keyword").val("");
        if(search_keyword != "") {
            if(search_type == "goods_url") {
                var url = encodeURIComponent(search_keyword);
                $.getJSON("index.php?act=cms_article&op=goods_info_by_url", { url: url}, function(data){
                    if(data.result == "true") {
                        var temp = '<li nctype="btn_goods_select"><dl>'; 
                        temp += '<dt class="name"><a href="'+data.url+'" target="_blank">'+data.title+'</a></dt>';
                        temp += '<dd class="image"><img title="'+data.title+'" src="'+data.image+'" /></dd>';
                        temp += '<dd class="price">价格：<em>'+data.price+'</em></dd>';
                        temp += '</dl><i>选择删除相关商品</i>';
                        temp += '<input name="article_goods_url[]" value="'+data.url+'" type="hidden" />';
                        temp += '<input name="article_goods_title[]" value="'+data.title+'" type="hidden" />';
                        temp += '<input name="article_goods_image[]" value="'+data.image+'" type="hidden" />';
                        temp += '<input name="article_goods_price[]" value="'+data.price+'" type="hidden" />';
                        temp += '<input name="article_goods_type[]" value="'+data.type+'" type="hidden" />';
                        temp += '</li>';
                        $("#article_goods_list").append(temp);
                    } else {
                        alert(data.message);
                    }
                });
            } else {
                $("#div_goods_select").load("index.php?act=cms_article&op=goods_list&search_type="+search_type+"&search_keyword="+search_keyword);
            }
        }
    }
});
//商品添加
$("#goods_search_list [nctype='btn_goods_select']").live("click",function(){
    if($("#article_goods_list li").length < 3) { 
        var temp = '<li nctype="btn_goods_select">'+$(this).html();
        temp += '<input name="article_goods_url[]" value="'+$(this).attr("goods_url")+'" type="hidden" />';
        temp += '<input name="article_goods_title[]" value="'+$(this).attr("goods_title")+'" type="hidden" />';
        temp += '<input name="article_goods_image[]" value="'+$(this).attr("goods_image")+'" type="hidden" />';
        temp += '<input name="article_goods_price[]" value="'+$(this).attr("goods_price")+'" type="hidden" />';
        temp += '<input name="article_goods_type[]" value="'+$(this).attr("goods_type")+'" type="hidden" />';
        temp += '</li>';
        $("#article_goods_list").append(temp);
    }
});

//商品删除
$("#article_goods_list [nctype='btn_goods_select']").live("click",function(){
    $(this).remove();
});
//文章搜索
$("#btn_article_search").click(function(){
    var search_type = $("[name='article_search_type']:checked").val();
    var search_keyword = $("#article_search_keyword").val();
    if(search_keyword != "") {
        $("#div_article_select").load("index.php?act=cms_article&op=article_list&search_type="+search_type+"&search_keyword="+search_keyword);
    }
});

//文章选择翻页
$("#div_article_select .demo").live('click',function(e){
    $("#div_article_select").load($(this).attr('href'));
    return false;
});

//文章添加
$("#article_search_list [nctype='btn_article_select']").live("click",function(){
    var temp = $("<div />").append($(this).clone()).html();
    $("#article_link_list").append(temp);
    $("#article_link_list").last("li").find("i").text("选择删除相关文章");
    refresh_article_link();
});

//文章删除
$("#article_link_list [nctype='btn_article_select']").live("click",function(){
    $(this).remove();
    refresh_article_link();
});
function refresh_article_link() {
    var cms_article_selected = '';
    $("#article_link_list [nctype='btn_article_select']").each(function(){
        cms_article_selected += $(this).attr("article_id") + ",";
    });
    $("#article_link").val(cms_article_selected.substring(0, cms_article_selected.length-1));
} 
</script>