<?php defined('InShopNC') or exit('Access Invalid!');?>
<link href="<?php echo ADMIN_TEMPLATES_URL;?>/css/up6/up6.css" type="text/css" rel="Stylesheet"/>
<script>
var base_site_url='<?php echo BASE_SITE_URL;?>';
</script>
<link rel="stylesheet" type="text/css" href="<?php echo  RESOURCE_SITE_URL?>/webuploader/webuploader.css">
<style>


</style>
<!--引入JS-->
<script type="text/javascript" src="<?php echo  RESOURCE_SITE_URL?>/webuploader/webuploader.js"></script>
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['video_index_manage'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=video&op=video"><span><?php echo $lang['nc_manage'];?></span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_new'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <table class="table tb-type2 nobdb">
   <tr>
          <td colspan="2" class="required" id="video_upload"><label class="validation" >视频上传:&nbsp;&nbsp;&nbsp;请勿上传文件名相同的视频</label>
          
          </td>
        </tr>
        <tr class="noborder">
          <td colspan="3" id="divComUploadContainer">
         
         <div id="uploader" class="wu-example"> 
    <!--用来存放文件信息-->
            <div id="thelist" class="uploader-list"></div>
            <div class="btns">
                <div id="picker" class="webuploader-container">
                <div class="webuploader-pick">选择文件</div>
                </div>
                
            </div>
        </div>

          </td>
        </tr>
  </table>
  <form id="article_form" method="post" name="articleForm">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2 nobdb">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation"><?php echo $lang['article_index_title'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" name="video_title" id="article_title" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label class="validation" for="cate_id"><?php echo $lang['article_add_class'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><select name="vd_id" id="ac_id">
              <option value=""><?php echo $lang['nc_please_choose'];?>...</option>
              <?php if(!empty($output['parent_list']) && is_array($output['parent_list'])){ ?>
              <?php foreach($output['parent_list'] as $k => $v){ ?>
              <option <?php if($output['vd_id'] == $v['vd_id']){ ?>selected='selected'<?php } ?> value="<?php echo $v['vd_id'];?>"><?php echo $v['vd_name'];?></option>
              <?php } ?>
              <?php } ?>
            </select></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="articleForm"><?php echo $lang['article_add_url'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" name="video_url" id="article_url" class="txt"></td>
          <td class="vatop tips"><?php echo $lang['article_add_url_tip'];?></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label><?php echo $lang['article_add_show'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform onoff"><label for="article_show1" class="cb-enable selected" ><span><?php echo $lang['nc_yes'];?></span></label>
            <label for="article_show0" class="cb-disable" ><span><?php echo $lang['nc_no'];?></span></label>
            <input id="article_show1" name="video_show" checked="checked" value="1" type="radio">
            <input id="article_show0" name="video_show" value="0" type="radio"></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><?php echo $lang['nc_sort'];?>: 
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="255" name="video_sort" id="article_sort" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required">推荐位置: 
        </tr>
        <tr class="noborder">
          <td class="vatop rowform " style="width: 500px;">
            <input id="" name="video_recommend" checked="checked" value="0" type="radio">
            <label>不推荐</label>
            <input id="" name="video_recommend" value="1" type="radio">
            <label>集团推荐</label>
            <input id="" name="video_recommend" value="2" type="radio">
            <label>健康云</label>
            <?php if($output['special_list']&&is_array($output['special_list'])){?>
            <?php foreach ($output['special_list'] as $special) {?>
             <input id="" name="video_recommend" value="<?php echo $special['special_id']?>" type="radio">
             <label><?php echo $special['special_title']?></label>
            <?php }?>
            <?php }?>
            </td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label class="validation">视频简介:</label></td>
        </tr>
        <tr class="noborder">
          <td colspan="2" class="vatop rowform"><?php showEditor('video_content');?></td>
        </tr>
        <tr>
          <td colspan="2" class="required" id="video_pic_upload">视频封面:</td>
        </tr>
        <tr class="noborder">
          <td colspan="3" id="divComUploadContainer"><input type="file" multiple="multiple" id="fileupload" name="fileupload" /></td>
        </tr>
        <tr>
          <td colspan="2" class="required">已上传图片:</td>
        <tr>
          <td colspan="2"><ul id="thumbnails" class="thumblists">
              <?php if(is_array($output['file_upload'])){?>
              <?php foreach($output['file_upload'] as $k => $v){ ?>
              <li id="<?php echo $v['upload_id'];?>" class="picture" >
                <input type="hidden" name="file_id[]" value="<?php echo $v['upload_id'];?>" />
                <div class="size-64x64"><span class="thumb"><i></i><img src="<?php echo $v['upload_path'];?>" alt="<?php echo $v['file_name'];?>" onload="javascript:DrawImage(this,64,64);"/></span></div>
                <p><span><a href="javascript:insert_editor('<?php echo $v['upload_path'];?>');"><?php echo $lang['article_add_insert'];?></a></span><span><a href="javascript:del_file_upload('<?php echo $v['upload_id'];?>');"><?php echo $lang['nc_del'];?></a></span></p>
              </li>
              <?php } ?>
              <?php } ?>
            </ul><div class="tdare">
              
          </div></td>
        </tr>
       
      </tbody>
      <tfoot>
        <tr class="tfoot">
          <td colspan="15" >
          <a href="JavaScript:void(0);" class="btn" id="submitBtn"><span><?php echo $lang['nc_submit'];?></span></a>
           <input  type="hidden" name="video_ad_url" value="" id="video_ad_url"/>
         
          </td>
        </tr>
      </tfoot>
    </table>
    
  </form>
  
</div>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/fileupload/jquery.iframe-transport.js" charset="utf-8"></script> 
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/fileupload/jquery.ui.widget.js" charset="utf-8"></script> 
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/fileupload/jquery.fileupload.js" charset="utf-8"></script> 
<script type="text/javascript">
var uploader = WebUploader.create({

    // swf文件路径
    swf: '<?php RESOURCE_SITE_URL?>/webuploader/Uploader.swf',

    // 文件接收服务端。
    server: '<?php echo ADMIN_SITE_URL?>/index.php?act=video&op=update_video',
    auto:"true",
    // 选择文件的按钮。可选。
    // 内部根据当前运行是创建，可能是input元素，也可能是flash.
    pick: '#picker',
    chunked :true,
    chunkSize :20485760,
    accept: {
        title: 'MP4',
        extensions: 'mp4',
        mimeTypes: 'flv-application/octet-stream'
    },
    // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
    resize: false
});
//当有文件被添加进队列的时候
uploader.on( 'fileQueued', function( file ) {
    $('#thelist').append( '<div id="' + file.id + '" class="item">' +
        '<h4 class="info">' + file.name + '</h4>' +
        '<p class="state">等待上传...</p>' +
    '</div>' );
});
//文件上传过程中创建进度条实时显示。
uploader.on( 'uploadProgress', function( file, percentage ) {
    var $li = $( '#'+file.id ),
        $percent = $li.find('.progress .progress-bar');
    // 避免重复创建
    if ( !$percent.length ) {
        $percent = $('<div class="progress progress-striped active">' +
          '<div class="progress-bar" role="progressbar" style="width: 0%">' +
          '<span class="sr-only">0%</span>'+
          '</div>' +
        '</div>').appendTo( $li ).find('.progress-bar');
    }

    $li.find('p.state').text('上传中');
    $(".sr-only").html(Math.floor(percentage * 100) + '%');
    $percent.css( 'width', percentage * 100 + '%' );
});
uploader.on("error",function(type){
	if (type=="Q_TYPE_DENIED"){
	 alert("请上传MP4格式的文件");
    }
	
});
//上传失败的时候
uploader.on( 'uploadError', function( file ) {
    $( '#'+file.id ).find('p.state').text('上传出错');
});
uploader.on( 'uploadSuccess', function( file ) {
	$('#video_ad_url').val(file.name);
    $( '#'+file.id ).find('p.state').text('已上传');
});

</script>
<script>
//按钮先执行验证再提交表单
$(function(){$("#submitBtn").click(function(){
	if($("#video_ad_url").val()==""){//判断视频是否为空
			$("#video_upload").append('<label for="video_content" class="error">视频不能为空</label>');
			return;
		}
	if($(".picture").length==0){
		$("#video_pic_upload").append('<label for="video_content" class="error">视频封面为空</label>')
	}
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
            video_title : {
                required   : true
            },
			vd_id : {
                required   : true
            },
			video_url : {
				url : true
            },
			video_content : {
                required   : true
            },
            video_sort : {
                number   : true
            },
          
        },
        messages : {
            video_title : {
                required   : '<?php echo $lang['article_add_title_null'];?>'
            },
			vd_id : {
                required   : '<?php echo $lang['article_add_class_null'];?>'
            },
			video_url : {
				url : '<?php echo $lang['article_add_url_wrong'];?>'
            },
			video_content : {
                required   : '<?php echo $lang['article_add_content_null'];?>'
            },
            video_sort  : {
                number   : '<?php echo $lang['article_add_sort_int'];?>'
            },
            
        }
    });
    // 图片上传
    $('#fileupload').each(function(){
        $(this).fileupload({
            dataType: 'json',
            url: 'index.php?act=video&op=video_pic_upload',
            done: function (e,data) {
                if(data != 'error'){
                	add_uploadedfile(data.result);
                }
            }
        });
    });
});


function add_uploadedfile(file_data)
{
    var newImg = '<li id="' + file_data.file_id + '" class="picture"><input type="hidden" name="file_id[]" value="' + file_data.file_id + '" /><div class="size-64x64"><span class="thumb"><i></i><img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_ARTICLE.'/';?>' + file_data.file_name + '" alt="' + file_data.file_name + '" width="64px" height="64px"/></span></div><p><span><a href="javascript:insert_editor(\'<?php echo UPLOAD_SITE_URL.'/'.ATTACH_ARTICLE.'/';?>' + file_data.file_name + '\');"><?php echo $lang['article_add_insert'];?></a></span><span><a href="javascript:del_file_upload(' + file_data.file_id + ');"><?php echo $lang['nc_del'];?></a></span></p></li>';
    $('#thumbnails').prepend(newImg);
}
function insert_editor(file_path){
	KE.appendHtml('video_content', '<img src="'+ file_path + '" alt="'+ file_path + '">');
}
function del_file_upload(file_id)
{
    if(!window.confirm('<?php echo $lang['nc_ensure_del'];?>')){
        return;
    }
    $.getJSON('index.php?act=video&op=ajax&branch=del_file_upload&file_id=' + file_id, function(result){
        if(result){
            $('#' + file_id).remove();
        }else{
            alert('<?php echo $lang['article_add_del_fail'];?>');
        }
    });
}


</script>