<?php defined('InShopNC') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3>加盟意向</h3>
      <ul class="tab-base">
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_manage'];?></span></a></li>
        
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="get" name="formSearch">
    <input type="hidden" value="join_message" name="act">
    <input type="hidden" value="index" name="op">
    <table class="tb-type1 noborder search">
      <tbody>
        <tr>
          <th><label for="search_title">意向人姓名或手机</label></th>
          <td><input type="text" value="<?php echo $output['search_title'];?>" name="search_title" id="search_title" class="txt"></td>
          <th><label for="search_ac_id">加盟意向项目</label></th>
          <td><select name="search_join_id" id="search_item_id" class="">
              <option value=""><?php echo $lang['nc_please_choose'];?>...</option>
             <option  value="1">独一张</option>
             <option  value="2">食维健</option>
            </select></td>
          <td><a href="javascript:document.formSearch.submit();" class="btn-search " title="<?php echo $lang['nc_query'];?>">&nbsp;</a>
            <?php if($output['search_title'] != '' or $output['search_ac_id'] != ''){?>
            <a href="index.php?act=article&op=article" class="btns " title="<?php echo $lang['nc_cancel_search'];?>"><span><?php echo $lang['nc_cancel_search'];?></span></a>
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
            <li><?php echo $lang['article_index_help1'];?></li>
          </ul></td>
      </tr>
    </tbody>
  </table>
  <form method="post" id="form_article">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2">
      <thead>
        <tr class="thead">
          <th class="w24"></th>
          
          <th>意向人姓名</th>
          <th>加盟意向项目</th>
          <th>联系电话</th>
          <th class="align-center">提交时间</th>
          <th class="w60 align-center"><?php echo $lang['nc_handle'];?></th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($output['join_messages']) && is_array($output['join_messages'])){ ?>
        <?php foreach($output['join_messages'] as $k => $v){ ?>
        <tr class="hover">
          <td><input type="checkbox" name='del_id[]' value="<?php echo $v['join_message_id']; ?>" class="checkitem"></td>
          
          <td><?php echo $v['join_message_name']; ?></td>
          <td><?php if($v['join_message_type']==1){echo "独一张";}elseif ($v['join_message_type']==2){echo "食维健";}?></td>
          <td><?php echo $v['join_message_mobile']; ?></td>
          <td class="align-center"><?php echo date("Y-m-d h:i:s",$v['join_message_time'])?></td>
          
          <td class="align-center"><?php if($v['join_message_status']==0) {?><a href="javascript:void(0)" onclick="if(confirm('将会短信通知到用户，尽快安排相关事宜')){location.href='index.php?act=join_message&op=send_sms_notice&join_message_id=<?php echo $v['join_message_id']?>&mobile=<?php echo $v["join_message_mobile"]?>';}">确认通知</a><?php }else{?>已通知<?php }?></td>
        </tr>
        <?php } ?>
        <?php }else { ?>
        <tr class="no_data">
          <td colspan="10"><?php echo $lang['nc_no_record'];?></td>
        </tr>
        <?php } ?>
      </tbody>
      <tfoot>
        <?php if(!empty($output['join_messages']) && is_array($output['join_messages'])){ ?>
        <tr class="tfoot">
          <td><input type="checkbox" class="checkall" id="checkallBottom"></td>
          <td colspan="16"><label for="checkallBottom"><?php echo $lang['nc_select_all']; ?></label>
            &nbsp;&nbsp;<a href="JavaScript:void(0);" class="btn" onclick="if(confirm('<?php echo $lang['nc_ensure_del'];?>')){$('#form_article').submit();}"><span><?php echo $lang['nc_del'];?></span></a>
            <div class="pagination"> <?php echo $output['page'];?> </div></td>
        </tr>
        <?php } ?>
      </tfoot>
    </table>
  </form>
</div>
