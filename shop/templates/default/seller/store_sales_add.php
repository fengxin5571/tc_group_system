<?php defined('InShopNC') or exit('Access Invalid!');?>

<div class="tabmenu">
  <?php include template('layout/submenu');?>
</div>
<div class="ncsc-form-default">
  <form id="add_form" action="<?php echo urlShop('store_member_sales', 'sales_add');?>" method="post">
    
    <input  type="hidden" name="form_submit" value="ok"/>
    <dl>
      <dt><i class="required">*</i>请输入会员手机或卡号<?php echo $lang['nc_colon'];?></dt>
      <dd> <input type="text" name="member_condition"  id="member_condition" placeholder="请输入会员手机或卡号" onblur="get_member()"/><span></span>
        <p class="hint"></p>
      </dd>
    </dl>
    <div id="member_div" style="display:none">
      <table class="ncsc-default-table" >
          <thead>
            <tr><th class="w60"></th>
             <th class="tl w200">会员卡号</th>
              <th class="tl w100">会员姓名</th>
              <th class="tl w150">会员手机</th>
              <th class="w160">最后登录</th>
              <th class="w60">积分</th>
            </tr>
          </thead>
          <tbody id="member_table">
          </tbody>
        </table>
    </div>
    <div id="member_sales_add" style="display:none">
        <dl>
         <dt><i class="required">*</i>选择消费产品<?php echo $lang['nc_colon'];?></dt>
          <dd> 
          <div class="ncsc-account-container">
                 <h4>只显示上架商品</h4>
                 <?php if($output['goods_list']&&is_array($output['goods_list'])) {?>
                 <ul class="ncsc-account-container-list">
               
                  <?php foreach ($output['goods_list'] as $k=>$goods) {?>
                   
                   <li style="height:auto">
                      <input id="good_add" class="checkbox good_add" name="goods[]" value="<?php echo  $output['storage_array'][$goods['goods_commonid']]['goods_id']?>"  type="checkbox"  price="<?php  echo $goods['goods_price']?>"  >
                      <label for="good_add_<?php echo $k?>"><?php echo str_cut($goods['goods_name'], 13)?></label><br/>
                      <input type="hidden" name="goods_sales_name_<?php echo  $output['storage_array'][$goods['goods_commonid']]['goods_id']?>" value="<?php echo $goods['goods_name']?>"/>
                      <label for="good_add_<?php echo $k?>">价格：<span class="ncsc-order-amount">￥<?php echo $goods['goods_price']?></span></label><br/>
                      <input type="hidden" name="goods_sales_price_<?php echo  $output['storage_array'][$goods['goods_commonid']]['goods_id']?>" value="<?php echo $goods['goods_price']?>"/>
                      <label for="good_add_<?php echo $k?>">数量：<input  type="text" name="goods_sales_num_<?php echo  $output['storage_array'][$goods['goods_commonid']]['goods_id']?>" class="text w60 goods_sales_num" id="goods_sales_num" disabled/></label>
                      <span></span>
                     
                    </li>

                    <?php }?>
                  </ul>
                 
                  <?php }?>
          </div>
        
            <p class="hint"></p>
          </dd>
        </dl>
        <dl>
          <dt><i class="required">*</i>消费金额<?php echo $lang['nc_colon'];?></dt>
          <dd> <input type="text" name="sales_price"  id="sales_price" placeholder="请输入消费金额" /><span></span>
            <p class="hint"><span style="color: #27A9E3;">会自动计算总价，也可根据实际情况填写实际的金额</span></p>
          </dd>
        </dl>
        <div class="bottom">
          <label class="submit-border">
            <input type="submit" class="submit" value="结算">
          </label>
        </div>
        </div>
  </form>
</div>
<script>
$(document).keypress(function(e) {  
    // 回车键事件  
       if(e.which == 13) {  
    	   get_member();
    	   return false;
       }  
   }); 

	 

function get_member(){
	if($('#member_condition').val()==""){
			return ;
		}
	$.ajax({  
        type:"GET",  
        url:'<?php echo urlShop('store_member_manage', 'ajax_get_member');?>',  
        async:false,  
        dataType:"json",
        data:{member_condition: $('#member_condition').val()},  
        success: function(data){ 
            console.log(data);
            if(data.code==200){
                    var html="";
					$.each(data.member_list,function(k,v){
							      html='<tr class="bd-line">';
								  html+='<td></td>';
								  html+=' <td class="tl w200">'+v.member_card+'</td>';
								  html+=' <td class="tl w100">'+v.member_truename+'</td>';
					              html+=' <td class="tl w150">'+v.member_mobile+'</td>';
					              html+='<td class="w150">'+v.member_login_time+'</td>';
					              html+='<td class="w60">'+v.member_points+'</td>';
					              html+='</tr>';
					              html+='<input type="hidden" name="member_id" value="'+v.member_id+'" />'
					              html+='<input type="hidden" name="member_name" value="'+v.member_truename+'" />'
					              html+='<input type="hidden" name="member_mobile" value="'+v.member_mobile+'" />'
					              $("#member_table").html(html);
					              $("#member_sales_add").show();
					              
						});
            }else{
            	var html='<tr><td colspan="20" class="norecord"><div class="warning-option"><i class="icon-warning-sign"></i><span><?php echo $lang['no_record'];?></span></div></td></tr>';		
           	 	$("#member_table").html(html);
              	 $("#member_sales_add").hide();
                }
            $('#member_div').show();
        }  
    });  
}

$(document).ready(function(){
    $('#add_form').validate({
        onkeyup: false,
        errorPlacement: function(error, element){
            console.log();
        element.nextAll('span').first().after(error);
        },
        rules: { 
        	"goods[]":{
        		required:true,
            	},
            sales_price:{
            	required:true,
            	min:1
                }
        },
        messages: {
        	"goods[]":{
            	required: '<br><i class="icon-exclamation-sign"></i>请选择消费产品',
                },
                sales_price:{
                	required:'<i class="icon-exclamation-sign"></i>请输入消费金额',
                	min:'<i class="icon-exclamation-sign"></i>请输入正确的消费金额'
                    }
        }
    });
    $(".good_add").change(function(){
        var price=$("#sales_price").val();
		 if($(this).is(':checked')){
			 $("input[name='goods_sales_num_"+$(this).val()+"']").removeAttr("disabled");
		 }else{
			 var num=$("input[name='goods_sales_num_"+$(this).val()+"']").val();
			 num=num||0;
			 price=price-parseFloat($(this).attr("price"))*parseInt(num);
			 $("input[name='goods_sales_num_"+$(this).val()+"']").attr("disabled","disabled");
			 $("input[name='goods_sales_num_"+$(this).val()+"']").val("");
			 
		 }
		 $("#sales_price").attr("value",price);
	 });
    $('.goods_sales_num').blur(function(){
    	var price=0;
		$.each($(".good_add"),function(k,v){
				if($(v).is(':checked')){
					 var num=$("input[name='goods_sales_num_"+$(v).val()+"']").val();
					 if(num==""){
							return;
						 }
					 price=price+parseFloat($(this).attr("price"))*parseInt(num);
					}
				 
			});
		$("#sales_price").attr("value",price);
        });
    
});
</script> 
