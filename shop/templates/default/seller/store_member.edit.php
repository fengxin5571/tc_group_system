<?php defined('InShopNC') or exit('Access Invalid!');?>

<div class="tabmenu">
  <?php include template('layout/submenu');?>
</div>
<div class="ncsc-form-default">
  <form id="add_form" action="<?php echo urlShop('store_member_manage', 'member_edit_save');?>" method="post">
    <input type="hidden" name="member_id" value="<?php echo $output['store_member_info']['member_id']?>" />
    <dl>
      <dt><i class="required">*</i>会员账号名<?php echo $lang['nc_colon'];?></dt>
      <dd> <?php echo $output['store_member_info']['member_name'];?> <span></span>
        <p class="hint"></p>
      </dd>
    </dl>
    <dl>
      <dt><i class="required">*</i>会员密码<?php echo $lang['nc_colon'];?></dt>
      <dd> <input type="password" name="member_passwd"/>
        <p class="hint">留空表示不修改密码</p>
      </dd>
    </dl>
    <dl>
      <dt><i class="required">*</i>会员姓名<?php echo $lang['nc_colon'];?></dt>
      <dd> <input type="text" name="member_truename" id="member_truename"  value="<?php echo $output['store_member_info']['member_truename'] ?>"/>
        <span></span>
        <p class="hint"></p>
      </dd>
    </dl>
    <dl>
      <dt><i class="required">*</i>会员卡号<?php echo $lang['nc_colon'];?></dt>
      <dd> <input type="text" name="member_card" id="member_card"  value="<?php echo $output['store_member_info']['member_card']?>"/>
                 <input type="hidden" name="old_member_card"  id="old_member_card" value="<?php echo $output['store_member_info']['member_card']?>"/>
        <span></span>
        <p class="hint"></p>
      </dd>
    </dl>
    <dl>
      <dt><i class="required">*</i>会员手机<?php echo $lang['nc_colon'];?></dt>
      <dd> <input type="text" name="member_mobile"  id="member_mobile" value="<?php echo $output['store_member_info']['member_mobile'] ?>"/>
        <input type="hidden" name="old_member_mobile" id="old_member_mobile" value="<?php echo $output['store_member_info']['member_mobile']?>"/>
        <span></span>
        <p class="hint"></p>
      </dd>
    </dl>
    <dl>
      <dt></i>会员性别<?php echo $lang['nc_colon'];?></dt>
      <dd>
          <label for="member_sex_0" class="mr30 __web-inspector-hide-shortcut__">
          <input id="member_sex_0" type="radio" class="radio vm mr5" name="member_sex" value="0" <?php if($output['store_member_info']['member_sex']==0){echo "checked";}?>>
          保密</label>
          <label for="member_sex_1" class="mr30 __web-inspector-hide-shortcut__">
          <input id="member_sex_1" type="radio" class="radio vm mr5" name="member_sex" value="1" <?php if($output['store_member_info']['member_sex']==1){echo "checked";}?>>
          男</label>
          <label for="member_sex_2" class="mr30 __web-inspector-hide-shortcut__">
          <input id="member_sex_2" type="radio" class="radio vm mr5" name="member_sex" value="2" <?php if($output['store_member_info']['member_sex']==2){echo "checked";}?>>
          女</label>
        <p class="hint"></p>
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
	jQuery.validator.addMethod("check_mobile", function(value, element, params) { 
	    var result = true;
	    var mobile = /^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/; 
	    if(!mobile.test(value)){
	        $.validator.messages.check_mobile = "手机号码不正确";
	        result = false;
	        
		 }
	    return result;
	}, '');
	jQuery.validator.addMethod("check_member_mobile", function(value, element, params) { 
	    var result = true;
	    var mobile = /^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/; 
	    if(!mobile.test(value)){
	        $.validator.messages.check_member_mobile = "手机号码不正确";
	        result = false;
	        return result;
		 }
		 var member_mobile=$('#member_mobile').val();
		 var old_member_mobile=$('#old_member_mobile').val()
		 if(member_mobile!=old_member_mobile){
    			 $.ajax({  
    			        type:"GET",  
    			        url:'<?php echo urlShop('store_member_manage', 'check_member_mobile');?>',  
    			        async:false,  
    			        data:{member_mobile: $('#member_mobile').val(),member_id:<?php echo $output['store_member_info']['member_id']?>},  
    			        success: function(data){  
    			            if(data != 'true') {
    			                $.validator.messages.check_member_mobile = "此手机号已存在";
    			                result = false;
    			            }
    			        }  
    			    });  
			 }
	    
	    return result;
	}, '');
	jQuery.validator.addMethod("check_member_card", function(value, element, params) { 
		var result = true;
		var member_card=$('#member_card').val();
		var old_member_card=$('#old_member_card').val()
		if(member_card!=old_member_card){
    			$.ajax({  
    		        type:"GET",  
    		        url:'<?php echo urlShop('store_member_manage', 'check_member_card');?>',  
    		        async:false,  
    		        data:{member_card: $('#member_card').val(),member_id:<?php echo $output['store_member_info']['member_id']?>},  
    		        success: function(data){  
    		            if(data != 'true') {
    		                $.validator.messages.check_member_card = "此会员卡号已存在";
    		                result = false;
    		            }
    		        }  
    		    });  
			}
	    
	    return result;
	}, '');
    $('#add_form').validate({
        onkeyup: false,
        errorPlacement: function(error, element){
            element.nextAll('span').first().after(error);
        },
        rules: {
        	member_truename:{
        		required:true,
            	},
           member_mobile:{
        	   required:true,
        	   check_mobile:true,
        	   check_member_mobile:true
        	  
               },
           member_card:{
        	   required:true,
        	   check_member_card:true
              }
        },
        messages: {
            member_truename:{
            	required: '<i class="icon-exclamation-sign"></i>请填写会员姓名',
                },
        	member_mobile: {
                required: '<i class="icon-exclamation-sign"></i>请填写会员手机',
            
            },
        member_card: {
            required: '<i class="icon-exclamation-sign"></i>请填写会员卡号',
        
        }
        }
    });
});
</script> 
