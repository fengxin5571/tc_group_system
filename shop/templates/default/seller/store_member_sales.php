<?php defined('InShopNC') or exit('Access Invalid!');?>

<div class="tabmenu">
  <?php include template('layout/submenu');?>
   <a href="javascript:void(0)" class="ncsc-btn ncsc-btn-green" onclick="go('index.php?act=store_member_sales&op=sales_add');" title="会员消费">会员消费</a> 
</div>
<form method="get" action="index.php" target="_self">
  <table class="search-form">
    <input type="hidden" name="act" value="store_member_sales" />
    <input type="hidden" name="op" value="member_sales" />
    <?php if ($_GET['state_type']) { ?>
    <input type="hidden" name="state_type" value="<?php echo $_GET['state_type']; ?>" />
    <?php } ?>
    <tr>
      <td>&nbsp;</td>
      
      <th>下单时间</th>
      <td class="w240"><input type="text" class="text w70" name="query_start_date" id="query_start_date" value="<?php echo $_GET['query_start_date']; ?>" /><label class="add-on"><i class="icon-calendar"></i></label>&nbsp;&#8211;&nbsp;<input id="query_end_date" class="text w70" type="text" name="query_end_date" value="<?php echo $_GET['query_end_date']; ?>" /><label class="add-on"><i class="icon-calendar"></i></label></td>
      <th class="w80">手机号</th>
      <td class="w100"><input type="text" class="text w150" name="buyer_mobile" value="<?php echo $_GET['buyer_mobile']; ?>" /></td>
      <th class="w80">消费单号</th>
      <td class="w160"><input type="text" class="text w150" name="sales_sn" value="<?php echo $_GET['sales_sn']; ?>" /></td>
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
      <th colspan="2">商品</th>
      <th class="w100">单价（元）</th>
      <th class="w40">数量</th>
      <th class="w110">买家</th>
      <th class="w120">消费金额</th>
      <th class="w100">操作人</th>
      <th class="w150">交易操作</th>
    </tr>
  </thead>
  <?php if (is_array($output['member_sales_list']) and !empty($output['member_sales_list'])) { ?>
  <?php foreach($output['member_sales_list'] as $order_id => $sales) { ?>
  <tbody>
    <tr>
      <td colspan="20" class="sep-row"></td>
    </tr>
    <tr>
      <th colspan="20"><span class="ml10"><?php echo '消费单号'.$lang['nc_colon'];?><em><?php echo $sales['sales_sn']; ?></em>
        <?php if ($order['order_from'] == 2){?>
        <i class="icon-mobile-phone"></i>
        <?php }?>
</span> <span>下单时间<?php echo $lang['nc_colon'];?><em class="goods-time"><?php echo date("Y-m-d H:i:s",$sales['add_time']); ?></em></span> 
<span class="fr mr5"> </span>
 </th>
    </tr>
    <?php $i = 0;?>
    <?php foreach($sales['extend_order_goods'] as $k => $goods) { ?>
    <?php $i++;?>
    <tr>
      <td class="bdl"></td>
      <td class="w70"><div class="ncsc-goods-thumb"><a href="<?php echo urlShop("goods","",array('goods_id'=>$goods['goods_id'])) ?>" target="_blank"><img src="<?php echo $goods['image_60_url'];?>" onMouseOver="toolTip('<img src=<?php echo $goods['image_240_url'];?>>')" onMouseOut="toolTip()"/></a></div></td>
      <td class="tl"><dl class="goods-name">
          <dt><a target="_blank" href="<?php echo urlShop("goods","",array('goods_id'=>$goods['goods_id'])) ?>"><?php echo $goods['goods_name']; ?></a></dt>
          <dd>
            <?php if (!empty($goods['goods_type_cn'])){ ?>
            <span class="sale-type"><?php echo $goods['goods_type_cn'];?></span>
            <?php } ?>
          </dd>
        </dl></td>
      <td>￥<?php echo $goods['goods_price']; ?></td>
      <td><?php echo $goods['goods_num']; ?></td>

      <!-- S 合并TD -->
      <?php if ((count($sales['extend_order_goods']) > 1 && $k ==0) || (count($sales['extend_order_goods'])) == 1){ ?>
      <td class="bdl" rowspan="<?php echo count($sales['extend_order_goods']);?>"><div class="buyer"><?php echo $sales['buyer_name'];?>
          <p member_id="<?php echo $sales['buyer_id'];?>">
            <?php if(!empty($sales['extend_member']['member_qq'])){?>
            <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $sales['extend_member']['member_qq'];?>&site=qq&menu=yes" title="QQ: <?php echo $sales['extend_member']['member_qq'];?>"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $sales['extend_member']['member_qq'];?>:52" style=" vertical-align: middle;"/></a>
            <?php }?>
            <?php if(!empty($sales['extend_member']['member_ww'])){?>
            <a target="_blank" href="http://amos.im.alisoft.com/msg.aw?v=2&uid=<?php echo $sales['extend_member']['member_ww'];?>&site=cntaobao&s=2&charset=<?php echo CHARSET;?>" ><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid=<?php echo $sales['extend_member']['member_ww'];?>&site=cntaobao&s=2&charset=<?php echo CHARSET;?>" alt="Wang Wang" style=" vertical-align: middle;" /></a>
            <?php }?>
          </p>
          <p><span style="color: #27A9E3;">积分：<?php echo $sales['extend_member']['member_points']?></span></p>
          <div class="buyer-info"> <em></em>
            <div class="con">
              <h3><i></i><span>联系信息</span></h3>
              <dl>
                <dt><?php echo "姓名".$lang['nc_colon'];?></dt>
                <dd><?php echo $sales['extend_member']['member_truename'];?></dd>
              </dl>
              <dl>
                <dt><?php echo "电话".$lang['nc_colon'];?></dt>
                <dd><?php echo $sales['extend_member']['member_mobile'];?></dd>
              </dl>
              <dl>
                <dt><?php echo "卡号".$lang['nc_colon'];?></dt>
                <dd><?php echo $sales['extend_member']['member_card'];?></dd>
              </dl>
            </div>
          </div>
        </div></td>
      <td class="bdl" rowspan="<?php echo count($sales['extend_order_goods']);?>"><p class="ncsc-order-amount">￥<?php echo $sales['sales_amount']; ?></p>
        
       </td>
      <td class="bdl bdr" rowspan="<?php echo count($sales['extend_order_goods'])?>">
      
      <p>
       <?php echo $sales['sales_operate_name']?>
        </p>

	</td>

      <!-- 删除订单 -->
      <td class="bdl bdr" rowspan="<?php echo count($sales['extend_order_goods'])?>">
        
        <p><a href="javascript:void(0)" class="ncsc-btn ncsc-btn-red mt5"  onclick="get_confirm('确认删除消费单？','index.php?act=store_member_sales&op=dropSales&sales_id=<?php echo $sales['sales_id']; ?>')" /><i class="icon-remove-circle"></i>删除消费单</a></p>
        
        
        <!-- 查看详单 -->
        <!-- 
        <p><a href="<?php echo urlShop("store_member_sales","show_sales",array('sales_id'=>$sales['sales_id']))?>" class="ncsc-btn ncsc-btn-green mt5"   /><i class="icon-pencil"></i>查看消费单</a></p>
         -->
         </td>

      <?php } ?>
      <!-- E 合并TD -->
    </tr>

    <!-- S 赠品列表 -->
    <?php if (!empty($order['zengpin_list']) && $i == count($order['goods_list'])) { ?>
    <tr>
      <td class="bdl"></td>
      <td colspan="4" class="tl"><div class="ncsc-goods-gift">赠品：
      <ul><?php foreach ($order['zengpin_list'] as $zengpin_info) { ?><li>
      <a title="赠品：<?php echo $zengpin_info['goods_name'];?> * <?php echo $zengpin_info['goods_num'];?>" href="<?php echo $zengpin_info['goods_url'];?>" target="_blank"><img src="<?php echo $zengpin_info['image_60_url'];?>" onMouseOver="toolTip('<img src=<?php echo $zengpin_info['image_240_url'];?>>')" onMouseOut="toolTip()"/></a></li></ul>
      <?php } ?>
      </div></td>
    </tr>
    <?php } ?>
    <!-- E 赠品列表 -->

    <?php }?>
    <?php } } else { ?>
    <tr>
      <td colspan="20" class="norecord"><div class="warning-option"><i class="icon-warning-sign"></i><span><?php echo $lang['no_record'];?></span></div></td>
    </tr>
    <?php } ?>
  </tbody>
  <tfoot>
    <?php if (is_array($output['member_sales_list']) and !empty($output['member_sales_list'])) { ?>
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
