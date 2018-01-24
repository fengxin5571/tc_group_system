<?php defined('InShopNC') or exit('Access Invalid!');?>
<!-- 指导老师列表页 start -->
<link rel="stylesheet" href="<?php echo SHOP_TEMPLATES_URL?>/dw/css/doctorList_yyt.css">

<style>
body{
background-color: #f8f8f8;
}
</style>
<div class="doctor_con">
    <div class="doctor_title"></div>
    <div class="doctor_ad"></div>
    <ul class="doctor_list">
       <?php if($output['member_advisor_list']&&is_array($output['member_advisor_list'])) {?>
       <?php foreach ($output['member_advisor_list'] as $member_advisor) {?>
       <li class="doctor_one">
           <a href="" class="doctor_one_photo">
           <img src="<?php if ($member_advisor['member_avatar']!='') { echo UPLOAD_SITE_URL.'/'.ATTACH_AVATAR.DS.$member_advisor['member_avatar']; } else { echo UPLOAD_SITE_URL.'/'.ATTACH_COMMON.DS.C('default_user_portrait'); } ?>" width="150" height="150" alt="<?php echo $member_advisor['member_truename']?>">
           </a>
           <a href="" class="doctor_oneName"><?php echo !empty($member_advisor['member_truename'])?$member_advisor['member_truename']:$member_advisor['member_name'];?></a>
           <span class="doctor_icon"></span>
           <span class="doctor_phoneNum"><?php if($member_advisor['member_mobile']){ echo $member_advisor['member_mobile'];}else {echo "未绑定手机";}?></span>
           <div class="doctor_md">所在地区：<?php echo $member_advisor['member_areainfo']?></div>
           <div class="doctor_md_ab"><?php echo str_cut($member_advisor['member_description'], 150,"...")?></div>
           <a href="<?php echo urlShop("member_advisohome","index",array("mid"=>$member_advisor['member_id']))?>" class="doctor_one_more">查看详情</a>
       </li>
       <?php }?>
       <?php }?>

    </ul>
    <div class=""><div class="pagination"> <?php echo $output['show_page'];?> </div></div>
</div>





<!-- 指导老师列表页 end -->