<?php defined('InShopNC') or exit('Access Invalid!');?>
<div class="tabmenu">
  <?php include template('layout/submenu');?>
  <a href="javascript:void(0)" class="ncsc-btn ncsc-btn-green" onclick="go('index.php?act=store_member_manage&op=member_add');" title="会员开卡">会员开卡</a> </div>
<form method="get" action="index.php">
  <table class="search-form">
    <input type="hidden" name="act" value="store_member_manage" />
    <input type="hidden" name="op" value="store_member_list" />
    <tr>
      <td>&nbsp;</td>
      <th>查找条件</th>
      <td class="w160"><select name="search_type" class="w150">
          <option value="0"><?php echo $lang['nc_please_choose'];?></option>
          <option value="1">会员卡卡号</option>
          <option value="2">手机号</option>
          <option value="3">会员姓名</option>
        </select></td>
      
      <td class="w160"><input type="text" class="text w150" name="keyword" value="<?php echo $_GET['keyword']; ?>"/></td>
      <td class="tc w70"><label class="submit-border">
          <input type="submit" class="submit" value="<?php echo $lang['nc_search'];?>" />
        </label></td>
    </tr>
  </table>
</form>

<table class="ncsc-default-table">
  <thead>
    <tr><th class="w60"></th>
     <th class="tl w200">会员卡号</th>
      <th class="tl w100">会员姓名</th>
      <th class="tl w150">会员手机</th>
      <th class="w40">登录次数</th>
      <th class="w160">最后登录</th>
      <th class="w60">积分</th>
      <th class="w100"><?php echo $lang['nc_handle'];?></th>
    </tr>
  </thead>
  <tbody>
    <?php if(!empty($output['store_member_list']) && is_array($output['store_member_list'])){?>
    <?php foreach($output['store_member_list'] as $key => $value){?>
    <tr class="bd-line">
    <td></td>
      <td class="tl w200"><?php echo $value['member_card']?></td>
      <td class="tl w100"><?php echo $value["member_truename"]?></td>
      <td class="tl w150"><?php echo $value['member_mobile']?></td>
      <td class="w60"><?php echo $value['member_login_num']?></td>
      <td class="w150"><?php echo $value['member_login_time']?></td>
      <td class="w60"><?php echo $value['member_points']?></td>
      <td class="nscs-table-handle">
          <span><a href="<?php echo urlShop('store_member_manage', 'member_edit', array('member_id' => $value['member_id']));?>" class="btn-blue"><i class="icon-edit"></i>
        <p><?php echo $lang['nc_edit'];?></p></a>
          </span><span><a nctype="btn_del_account" data-seller-id="<?php echo $value['member_id'];?>" href="javascript:;" class="btn-red"><i class="icon-trash"></i>
        <p><?php echo $lang['nc_del'];?></p></a></span>
      </td>
    </tr>
    <?php }?>
    <?php }else{?>
    <tr>
      <td colspan="20" class="norecord"><div class="warning-option"><i class="icon-warning-sign"></i><span><?php echo $lang['no_record'];?></span></div></td>
    </tr>
    <?php }?>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="20"><div class="pagination"><?php echo $output['show_page']; ?></div></td>
    </tr>
  </tfoot>
</table>
<form id="del_form" method="post" action="<?php echo urlShop('store_member_manage', 'member_del');?>">
  <input id="del_seller_id" name="member_id" type="hidden" />
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $('[nctype="btn_del_account"]').on('click', function() {
            var seller_id = $(this).attr('data-seller-id');
            if(confirm('确认删除？')) {
                $('#del_seller_id').val(seller_id);
                ajaxpost('del_form', '', '', 'onerror');
            }
        });
    });
</script> 
