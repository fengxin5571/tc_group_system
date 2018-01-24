<?php defined('InShopNC') or exit('Access Invalid!');?>

<div class="tabmenu">
  <?php include template('layout/submenu');?>
   <a href="javascript:void(0)" class="ncsc-btn ncsc-btn-green" onclick="go('index.php?act=store_member_sales&op=sales_add');" title="会员消费">会员消费</a> 
</div>
<form method="get" action="index.php" target="_self">
  <table class="search-form">
    <input type="hidden" name="act" value="store_member_points" />
    <input type="hidden" name="op" value="pointslog" />
    <?php if ($_GET['state_type']) { ?>
    <input type="hidden" name="state_type" value="<?php echo $_GET['state_type']; ?>" />
    <?php } ?>
    <tr>
      <td>&nbsp;</td>
      <td><select name="stage">
      <option value="" <?php if (!$_GET['stage']){echo 'selected=selected';}?>>操作阶段</option>
      <option value="regist" <?php if ($_GET['stage'] == 'regist'){echo 'selected=selected';}?>>注册</option>
              <option value="login" <?php if ($_GET['stage'] == 'login'){echo 'selected=selected';}?>>登录</option>
              <option value="comments" <?php if ($_GET['stage'] == 'comments'){echo 'selected=selected';}?>>商品评论</option>
              <option value="order" <?php if ($_GET['stage'] == 'order'){echo 'selected=selected';}?>>订单消费</option>
              <option value="system" <?php if ($_GET['stage'] == 'system'){echo 'selected=selected';}?>>积分管理</option>
              <option value="member_sales" <?php if ($_GET['stage'] == '"member_sales"'){echo 'selected=selected';}?>>线下消费</option>
              <option value="from_store" <?php if ($_GET['stage'] == '""from_store""'){echo 'selected=selected';}?>>会员开卡</option>
              <option value="pointorder" <?php if ($_GET['stage'] == 'pointorder'){echo 'selected=selected';}?>>礼品兑换</option>
              <option value="app" <?php if ($_GET['stage'] == 'app'){echo 'selected=selected';}?>>积分兑换</option>
      </select>
      </td>
      <th>添加时间</th>
      <td class="w240"><input type="text" class="text w70" name="query_start_date" id="query_start_date" value="<?php echo $_GET['query_start_date']; ?>" /><label class="add-on"><i class="icon-calendar"></i></label>&nbsp;&#8211;&nbsp;<input id="query_end_date" class="text w70" type="text" name="query_end_date" value="<?php echo $_GET['query_end_date']; ?>" /><label class="add-on"><i class="icon-calendar"></i></label></td>
      <th class="w80">会员名称</th>
      <td class="w100"><input type="text" class="text w80" name="mname" value="<?php echo $_GET['mname']; ?>" /></td>
      <th class="w80">管理员名称</th>
      <td class="w160"><input type="text" class="text w80" name="aname" value="<?php echo $_GET['aname']; ?>" /></td>
      <td class="w70 tc"><label class="submit-border">
          <input type="submit" class="submit" value="搜索" />
        </label></td>
    </tr>
  </table>
</form>
<table class="ncsc-default-table order">
  <thead>
    <tr>
      <th class="w10"></th>
      <th class="w100">会员名称</th>
      <th class="w100">管理员名称</th>
      <th class="w40">积分值</th>
      <th class="w110">添加时间</th>
      <th class="w120">操作阶段</th>
      <th class="w100">描述</th>
      
    </tr>
  </thead>
  <?php if (is_array($output['list_log']) and !empty($output['list_log'])) { ?>
  <?php foreach($output['list_log'] as  $log) { ?>
  <tbody>
    <tr>
    
      <td></td>
      <td><?php echo $log['pl_membername'] ?></td>
      <td><?php echo $log['pl_adminname'] ?></td>
      <td><?php echo $log['pl_points'] ?></td>
      <td><?php echo date("Y-m-d",$log['pl_addtime']) ?></td>
      <td>
      <?php 
      switch ($log['pl_stage']){
              		case 'regist':
              			echo '注册';
              			break;
              		case 'login':
              			echo '登录';
              			break;
              		case 'comments':
              			echo "商品评论";
              			break;
              		case 'order':
              			echo '订单消费';
              			break;
              		case 'system':
              			echo '积分管理';
              			break;
              		case 'pointorder':
	              		echo '礼品兑换';
	              		break;
              		case 'app':
	              		echo '积分兑换';
	              		break; 
              		case 'from_store':
              		    echo "会员开卡";
              		    break;
          		    case 'member_sales':
          		        echo "线下消费";
          		        break;
	          }?>
      </td>
      <td><?php echo $log['pl_desc']?></td>
    </tr>

    <?php } } else { ?>
    <tr>
      <td colspan="20" class="norecord"><div class="warning-option"><i class="icon-warning-sign"></i><span><?php echo $lang['no_record'];?></span></div></td>
    </tr>
    <?php } ?>
  </tbody>
  <tfoot>
    <?php if (is_array($output['list_log']) and !empty($output['list_log'])) { ?>
    <tr>
      <td colspan="20"><div class="pagination"><?php echo $output['show_page']; ?></div></td>
    </tr>
    <?php } ?>
  </tfoot>
</table>
<script charset="utf-8" type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/i18n/zh-CN.js" ></script>
<link rel="stylesheet" type="text/css" href="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/themes/ui-lightness/jquery.ui.css"  />
<script type="text/javascript">
$(function(){
    $('#query_start_date').datepicker({dateFormat: 'yy-mm-dd'});
    $('#query_end_date').datepicker({dateFormat: 'yy-mm-dd'});
    $('.checkall_s').click(function(){
        var if_check = $(this).attr('checked');
        $('.checkitem').each(function(){
            if(!this.disabled)
            {
                $(this).attr('checked', if_check);
            }
        });
        $('.checkall_s').attr('checked', if_check);
    });
    $('#skip_off').click(function(){
        url = location.href.replace(/&skip_off=\d*/g,'');
        window.location.href = url + '&skip_off=' + ($('#skip_off').attr('checked') ? '1' : '0');
    });
});
</script> 
