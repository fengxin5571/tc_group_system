<?php defined('InShopNC') or exit('Access Invalid!');?>
<!-- 指导老师主页 start -->
<link rel="stylesheet" href="<?php echo SHOP_TEMPLATES_URL?>/dw/css/doctorCategory_yyt.css">
<link href="<?php echo SHOP_TEMPLATES_URL;?>/dw/css/healthSchool_qty.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.min.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/member.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/dialog/dialog.js" id="dialog_js" charset="utf-8"></script>
</head>

<style>
body{
background-color: #f8f8f8;
}
</style>
<div class="docCate_con">
    <div id="append_parent"></div>
    <div class="dicCate_header"></div>
    <div class="dicCate_one">
        <a href="javascript:;" class="dicCate_left">
            <img src="<?php if ($output['master_info']['member_avatar']!='') { echo UPLOAD_SITE_URL.'/'.ATTACH_AVATAR.DS.$output['master_info']['member_avatar']; } else { echo UPLOAD_SITE_URL.'/'.ATTACH_COMMON.DS.C('default_user_portrait'); } ?>" alt="" width="240" height="240">
            
        </a>
        <div class="dicCate_right">
            <div class="docCate_right_top">
                <span class="docCate_nameYyt"><?php echo !empty($output['master_info']['member_truename'])?$output['master_info']['member_truename']:$output['master_info']['member_name'];?></span>
                <span class="docCate_listYyt">健康用药指导老师</span>
               
                <?php if ($output['relation'] == '3'){?>
                <span><a href="index.php?act=member_information&op=member" title="<?php echo $lang['sns_edit_data'];?>" class="edit_member_adviso"><?php echo $lang['sns_edit_data'];?></a></span>
                <?php }?>
            </div>
            <ul class="dicCate_right_bottom">
                <li><b>工作时间 : </b><?php echo $output['master_info']['member_work_time']?></li>
                <li><b>联系电话 : </b><?php if($output['master_info']['member_mobile']) { ?><?php echo $output['member_info']['member_mobile']; }else{?>未绑定手机<?php }?></li>
                <li><b>所在地区: </b><?php echo $output['master_info']['member_areainfo']?></li>
                <li><b>资历说明 : </b><?php echo $output['master_info']['member_service']?></li>
                <li><b>医师评价 : </b><?php echo $output['master_info']['member_description'] ?></li>
            </ul>
        </div>
        <!--625   70-->
    </div>
    <?php if($output['relation'] == 3){?>
          <div class="button"><a id="open_uploader" href="JavaScript:void(0);" class="ncsc-btn ncsc-btn-acidblue "><i class="icon-cloud-upload"></i>请上传照片</a></div>
          <div class="upload-con" id="uploader" style="display: none;">
            <form method="post" action="" id="fileupload" enctype="multipart/form-data">
              <input type="hidden" name="category_id" value="<?php echo $output['pic_class']['ac_id']?>">
              <div class="upload-con-div">
                <div class="ncsc-upload-btn"> <a href="javascript:void(0);"><span>
                  <input type="file" hidefocus="true" size="1" class="input-file" name="file" multiple="multiple" />
                  </span>
                  <p>选择图片上传</p>
                  </a> </div>
              </div>
              <div nctype="file_msg"></div>
              <div class="upload-pmgressbar" nctype="file_loading"></div>
              <div class="upload-txt"><span>支持Jpg、Gif、Png格式，大小不超过<?php echo $output['setting_config']['image_max_filesize'].'KB';?>;浏览文件时可以按住ctrl或shift键多选。</span> </div>
            </form>
          </div>
    <?php }?>
    <div class="dicCate_two">
        <img src="<?php echo SHOP_TEMPLATES_URL;?>/dw/image/honor_wall_zdw.png"/>
        <ul>
            <?php if($output['pic_list']&&is_array($output['pic_list'])) {?>
            <?php foreach ($output['pic_list'] as $v) {?>
            <li>
            <img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_MALBUM.DS.str_ireplace('.', '_240.', $v['ap_cover']);?>" width="288" height="298"/>
            <?php if($output['relation'] == 3) {?>
            <div style="text-align:center"><a href="javascript:void(0)" onclick="ajax_get_confirm('您确定进行该操作吗?\n注意：使用中的图片也将被删除','index.php?act=sns_album&amp;op=album_pic_del&amp;id=<?php echo $v[ap_id]?>');" class="delete_img_m"><i></i>删除</a></div>
            <?php }?>
            </li>
            
            
            <?php }?>
            <?php } else {?>
            <div class="sns-norecord" style="margin-left: 450px;"><i class="pictures pngFix">&nbsp;</i><span>还没有上传过照片哦~ <br><a href="javascript:void(0)">请上传一些照片</a>与大家分享吧！</span></div>
            <?php }?>
        </ul>
        
    </div>
    <?php if($output['queststion_list']&&is_array($output['queststion_list'])) {?>
    <div class="dicCate_three">
        <img src="<?php echo SHOP_TEMPLATES_URL;?>/dw/image/wtjl_zdw.png"/>
        <div class="dicCate_three_left">
            <h2>健康用药指导老师回答</h2>
            <h2><?php echo str_cut($output['queststion_list'][0]["question_title"], 100)?></h2>
            <p><?php echo  str_cut($output['queststion_list'][0]["answer_content"], 750,"...")?>
            </p>
        </div>
        <div class="dicCate_three_right">
            <ul>
                <?php  foreach ($output['queststion_list'] as $k=> $question) {?>
                <?php if($k>0) {?>
                <li class="question_a_yyt">
                    <a href="<?php echo urlShop("question","question_show",array("qid"=>$question['question_id']))?>"> · <?php echo str_cut($question['question_title'], 70)?></a>
                </li>
                <?php }?>
                <?php }?>

            </ul>
        </div>
    </div>
    <?php }?>
    <div class="healthSchoolSmallBox_qty">
<!--小保健讲堂开始-->
		<div class="healthBox_qty">
			<div class="healthImgBox_qty">
				<img src="<?php echo SHOP_TEMPLATES_URL;?>/dw/image/health_jt_title.jpg" />
			</div>
			<div class="healthRightBox_qty">
				<div class="healthTopFont_qty">
					
				</div>
				<div class="healthBottomFont_qty">
					
				</div>
			</div>
		</div>
		<!--小保健讲堂结束-->
		<!--保健讲堂开始-->
		<div class="healthRoom_qty">
			<div class="healthRoomLeft_qty">
        	<?php echo loadadv(1055);?>
        	</div>
			<div class="healthRoomRight_qty">
				<div class="healthRoomTop_qty">
					<ul>
					    <?php foreach ($output['video_recommend'][1]['code_info'] as $k=>$screen){?>
					    <?php if($k<=2) {?>
						<li><a href="<?php echo $screen['pic_url']?>"> <img src="<?php echo UPLOAD_SITE_URL.DS.$screen['pic_img']?>" />
					    <div class="heathRoomFont_qty">
						<span style="text-align:center;"><?php echo $screen['pic_name']?></span>
						
						</div>	
						</a></li>
						<?php }?>
						<?php }?>
					</ul>
				</div>
				<div class="healthRoomBottom_qty">
					<ul class="img_qty">
					    <?php foreach ($output['video_recommend'][0]['code_info'] as $focus){?>
					    <?php foreach ($focus['pic_list'] as $child_focus) {?>
					    <?php if($child_focus['pic_img']) {?>
						<li><a href="<?php echo $child_focus['pic_url']?>"> <img src="<?php echo UPLOAD_SITE_URL.DS.$child_focus['pic_img']?>" />
								<div class="healthRoomBs_qty"><?php echo $child_focus['pic_name'] ?></div>
						</a></li>
						
						
						<?php }?>
						<?php }?>
						<?php }?>
					</ul>
					<ul class="lrbtns_qty">
						<li class="lbtns_qty">&lt;</li>
						<li class="rbtns_qty">&gt;</li>
					</ul>
				</div>
			</div>
		</div>
		<!--保健讲堂结束-->
</div>
</div>
<script src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.masonry.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/fileupload/jquery.iframe-transport.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/fileupload/jquery.ui.widget.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/fileupload/jquery.fileupload.js" charset="utf-8"></script>


<?php if($output['relation'] == '3'){?>
<script type="text/javascript">
$(function(){
    // ajax 上传图片
    var upload_num = 0; // 上传图片成功数量
    
    $('#fileupload').fileupload({
        
        dataType: 'json',
        url: '<?php echo SHOP_SITE_URL;?>/index.php?act=sns_album&op=swfupload',
        add: function (e,data) {
            $.each(data.files, function (index, file) {
                
                $('<div nctype=' + file.name.replace(/\./g, '_') + '><p>'+ file.name +'</p><p class="loading"></p></div>').appendTo('div[nctype="file_loading"]');
            });
            data.submit();
        },
        done: function (e,data) {
            var param = data.result;
            $this = $('div[nctype="' + param.origin_file_name.replace(/\./g, '_') + '"]');
            $this.fadeOut(3000, function(){
                $(this).remove();
                if ($('div[nctype="file_loading"]').html() == '') {
                    setTimeout("window.location.reload()", 1000);
                }
            });
            if(param.state == 'true'){
                upload_num++;
                $('div[nctype="file_msg"]').html('<i class="icon-ok-sign">'+'</i>'+'<?php echo $lang['album_upload_complete_one'];?>'+upload_num+'<?php echo $lang['album_upload_complete_two'];?>');
            } else {
                $this.find('.loading').html(param.message).removeClass('loading');
            }
        }
       
    });
});
</script>
<?php }?>



<script>
//跑马车效果
var imgW=$('.img_qty li').width();
var index=0;
var s=setInterval(move,2000)
function move(){
	 $('.img_qty').stop(true,true)
     $('.img_qty').animate({marginLeft:-imgW},function(){
   	 $('.img_qty li:first').appendTo($('.img_qty'))
     $('.img_qty').css({marginLeft:0})
   })
}
$('.rbtns_qty').click(function(){
	move();
})
$('.lbtns_qty').click(function(){
	 $('.img_qty').stop(true,true)
	 $('.img_qty li:last').prependTo($('.img_qty'))
	 $('.img_qty').css({marginLeft:-imgW});
	 $('.img_qty').animate({marginLeft:0});
})
$('.healthRoomBottom_qty').hover(function(){
	clearInterval(s)
},function(){
	s=setInterval(move,2000)
})


</script>
<!-- 指导老师主页 end -->




















