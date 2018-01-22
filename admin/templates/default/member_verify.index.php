<?php defined('InShopNC') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3>指导老师审核</h3>
      <ul class="tab-base">
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_manage']?></span></a></li>
        
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="get" name="formSearch" id="formSearch">
    <input type="hidden" value="member_advisor" name="act">
    <input type="hidden" value="member_verify" name="op">
    <table class="tb-type1 noborder search">
      <tbody>
        <tr>
          <td>申请人：</td>
          <td><input type="text" value="<?php echo $output['search_field_value'];?>" name="member_name" class="txt"></td>
          <td></td>
          <td><select name="verify_status" >
              <option <?php if($_GET['verify_status'] == ''){ ?>selected='selected'<?php } ?> value="">审核状态</option>
              <option <?php if($_GET['verify_status'] == '0'){ ?>selected='selected'<?php } ?> value="0">审核中</option>
              <option <?php if($_GET['verify_status'] == '1'){ ?>selected='selected'<?php } ?> value="1">已通过</option>
              <option <?php if($_GET['verify_status'] == '2'){ ?>selected='selected'<?php } ?> value="1">已拒绝</option>
            </select></td>
          <td></td>
          <td><a href="javascript:void(0);" id="ncsubmit" class="btn-search " title="<?php echo $lang['nc_query'];?>">&nbsp;</a>
            <?php if($output['search_field_value'] != '' or $output['search_sort'] != ''){?>
            <a href="index.php?act=member_advisor&op=member_verify" class="btns "><span><?php echo $lang['nc_cancel_search']?></span></a>
            <?php }?></td>
        </tr>
      </tbody>
    </table>
  </form>
  <table class="table tb-type2" id="prompt">
    <tbody>
      <tr class="space odd">
        <th colspan="12"><div class="title">
            <h5><?php echo $lang['nc_prompts'];?></h5>
            <span class="arrow"></span></div></th>
      </tr>
      <tr>
        <td><ul>
            <li>通过审核管理，你可以进行查看、编辑指导老师审核等操作</li>
            <li>你可以根据条件搜索审核信息，然后选择相应的操作</li>
          </ul></td>
      </tr>
    </tbody>
  </table>
  <form method="post" id="form_member">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2 nobdb">
      <thead>
        <tr class="thead">
          <th>&nbsp;</th>
          <th colspan="2"><?php echo $lang['member_index_name']?></th>
          <th style="text-align:center;">提交时间</th>
          <th style="text-align:center;">审核状态</th>
          <th class="align-center"><?php echo $lang['nc_handle']; ?></th>
        </tr>
      <tbody>
        <?php if(!empty($output['member_advisor_verify_list']) && is_array($output['member_advisor_verify_list'])){ ?>
        <?php foreach($output['member_advisor_verify_list'] as $k => $v){ ?>
        <tr class="hover member">
          <td class="w24"><input type="checkbox" name='del_id[]' value="<?php echo $v['verify_id']; ?>" class="checkitem"></td>
          <td class="w48 picture"><div class="size-44x44"><span class="thumb size-44x44"><i></i><img src="<?php if ($v['member_avatar'] != ''){ echo UPLOAD_SITE_URL.DS.ATTACH_AVATAR.DS.$v['member_avatar'];}else { echo UPLOAD_SITE_URL.'/'.ATTACH_COMMON.DS.C('default_user_portrait');}?>?<?php echo microtime();?>"  onload="javascript:DrawImage(this,44,44);"/></span></div></td>
          <td style="width:500px"><p class="name" ><strong><?php echo $v['member_name']; ?></strong>(<?php echo $lang['member_index_true_name']?>: <?php echo $v['member_truename']; ?>)</p>
            <p class="smallfont"><?php echo $lang['member_index_reg_time']?>:&nbsp;<?php echo date("Y-m-d",$v['member_time']); ?></p>
            
              <div class="im"><span class="email" >
                <?php if($v['member_email'] != ''){ ?>
                <a href="mailto:<?php echo $v['member_email']; ?>" class=" yes" title="<?php echo $lang['member_index_email']?>:<?php echo $v['member_email']; ?>"><?php echo $v['member_email']; ?></a><?php echo $v['member_email']; ?></span>
                <?php }else { ?>
                <a href="JavaScript:void(0);" class="" title="<?php echo $lang['member_index_null']?>" ><?php echo $v['member_email']; ?></a></span>
                <?php } ?>
                <?php if($v['member_ww'] != ''){ ?>
                <a target="_blank" href="http://web.im.alisoft.com/msg.aw?v=2&uid=<?php echo $v['member_ww'];?>&site=cnalichn&s=11" class="" title="WangWang: <?php echo $v['member_ww'];?>"><img border="0" src="http://web.im.alisoft.com/online.aw?v=2&uid=<?php echo $v['member_ww'];?>&site=cntaobao&s=2&charset=<?php echo CHARSET;?>" /></a>
                <?php } ?>
                <?php if($v['member_qq'] != ''){ ?>                
                <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $v['member_qq'];?>&site=qq&menu=yes" class=""  title="QQ: <?php echo $v['member_qq'];?>"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $v['member_qq'];?>:52"/></a>
                <?php } ?>
                <!--v3-b11 显示手机号码-->
               <?php if($v['member_mobile'] != ''){ ?>
               <div style="font-size:13px; padding-left:10px">&nbsp;&nbsp;<?php echo $v['member_mobile']; ?></div>
               <?php } ?>
              </div></td>
          <td class="align-center"><?php echo date('Y-m-d',$v['verify_time']); ?></td>
          <td class="align-center"><?php if($v['verify_status']==0){?>审核中<?php }elseif($v['verify_status']==1){?>已通过<?php }else{?>未通过<?php }?></td>
          
          <td class="align-center"><?php if($v['verify_status']==0) {?><a href="index.php?act=member_advisor&op=operate&member_id=<?php echo $v['member_id']?>&flag=pass&verify_id=<?php echo $v['verify_id']; ?>">通过</a> | <a href="index.php?act=member_advisor&op=operate&flag=reject&verify_id=<?php echo $v['verify_id']; ?>">拒绝</a><?php }?></td>
        </tr>
        <?php } ?>
        <?php }else { ?>
        <tr class="no_data">
          <td colspan="11"><?php echo $lang['nc_no_record']?></td>
        </tr>
        <?php } ?>
      </tbody>
      <tfoot class="tfoot">
        <?php if(!empty($output['member_advisor_verify_list']) && is_array($output['member_advisor_verify_list'])){ ?>
        <tr>
        <td class="w24"><input type="checkbox" class="checkall" id="checkallBottom"></td>
          <td colspan="16">
          <label for="checkallBottom"><?php echo $lang['nc_select_all']; ?></label>
            &nbsp;&nbsp;<a href="JavaScript:void(0);" class="btn" onclick="if(confirm('<?php echo $lang['nc_ensure_del']?>')){$('#form_member').submit();}"><span><?php echo $lang['nc_del'];?></span></a>
            <div class="pagination"> <?php echo $output['page'];?> </div></td>
        </tr>
        <?php } ?>
      </tfoot>
    </table>
  </form>
</div>
<script>
$(function(){
    $('#ncsubmit').click(function(){
    	$('input[name="op"]').val('member_verify');$('#formSearch').submit();
    });	
});
</script>
