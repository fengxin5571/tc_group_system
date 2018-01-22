<?php defined('InShopNC') or exit('Access Invalid!');?>

<div class="tabmenu">
  <?php include template('layout/submenu');?>
</div>
<div class="ncsc-form-default">
  <form id="add_form" action="<?php echo urlShop('store_member_manage', 'member_points_manage');?>" method="post">
    <input type="hidden" name="member_id" value="<?php echo $output['store_member_info']['member_id']?>" />
    <input  type="hidden" name="form_submit" value="ok"/>
    <dl>
      <dt><i class="required">*</i>会员账号名<?php echo $lang['nc_colon'];?></dt>
      <dd> <?php echo $output['store_member_info']['member_name'];?> <span></span>
        <p class="hint"></p>
      </dd>
    </dl>
    <dl>
    <dl>
      <dt><i class="required">*</i>当前积分数<?php echo $lang['nc_colon'];?></dt>
      <dd> <?php echo $output['store_member_info']['member_points'];?> <span></span>
        <p class="hint"></p>
      </dd>
    </dl>
    <dl>
      <dt><i class="required">*</i>会员姓名<?php echo $lang['nc_colon'];?></dt>
      <dd> <?php echo $output['store_member_info']['member_truename'] ?>
        <span></span>
        <p class="hint"></p>
      </dd>
    </dl>
    <dl>
      <dt><i class="required">*</i>会员卡号<?php echo $lang['nc_colon'];?></dt>
      <dd> <?php echo $output['store_member_info']['member_card']?>
                 
        <span></span>
        <p class="hint"></p>
      </dd>
    </dl>
    <dl>
      <dt><i class="required">*</i>会员手机<?php echo $lang['nc_colon'];?></dt>
      <dd> <?php echo $output['store_member_info']['member_mobile'] ?>
        
        <span></span>
        <p class="hint"></p>
      </dd>
    </dl>
    <dl>
      <dt><i class="required">*</i>增减类型<?php echo $lang['nc_colon'];?></dt>
      <dd> <select id='operatetype' name="operatetype">
       			<option value='1'>增加</option>
       			<option value='2'>减少</option>
      			 </select>
        <p class="hint"></p>
      </dd>
    </dl>
    <dl>
      <dt><i class="required">*</i>积分值<?php echo $lang['nc_colon'];?></dt>
      <dd>
          <input type="text" id="pointsnum" name="pointsnum"/><span></span>
        <p class="hint"></p>
      </dd>
    </dl>
    <dl>
    <dt>描述<?php echo $lang['nc_colon'];?></dt>
    <dd>
    <textarea name="pointsdesc" rows="6" class="tarea" cols="30"></textarea>
    <p class="hint">描述信息将显示在积分明细相关页，会员和管理员都可见</p>
    </dd>
    </dl>
    <div class="bottom">
      <label class="submit-border">
        <input type="submit" class="submit" value="<?php echo $lang['nc_submit'];?>">
      </label>
    </div>
  </form>
</div>
<script>

$(document).ready(function(){
    $('#add_form').validate({
        onkeyup: false,
        errorPlacement: function(error, element){
            element.nextAll('span').first().after(error);
        },
        rules: {
        	pointsnum:{
        		required:true,
        		min:1
            	},
          
        },
        messages: {
        	pointsnum:{
            	required: '<i class="icon-exclamation-sign"></i>请填写积分值',
            	min:'<i class="icon-exclamation-sign"></i>请填写正确的积分值'
                },
        	
        }
    });
});
</script> 
