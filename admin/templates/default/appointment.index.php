<?php defined('InShopNC') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3>预约信息</h3>
      <ul class="tab-base">
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_manage'];?></span></a></li>
        
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="get" name="formSearch">
    <input type="hidden" value="appointment" name="act">
    <input type="hidden" value="index" name="op">
    <table class="tb-type1 noborder search">
      <tbody>
        <tr>
          <th><label for="search_title">体验者姓名</label></th>
          <td><input type="text" value="<?php echo $output['search_title'];?>" name="search_title" id="search_title" class="txt"></td>
          <th><label for="search_ac_id">体验项目</label></th>
          <td><select name="search_item_id" id="search_item_id" class="">
              <option value=""><?php echo $lang['nc_please_choose'];?>...</option>
              <?php if(!empty($output['appoint_items']) && is_array($output['appoint_items'])){ ?>
              <?php foreach($output['appoint_items'] as $k => $v){ ?>
              <option <?php if($output['search_item_id'] == $v['item_id']){ ?>selected='selected'<?php } ?> value="<?php echo $v['item_id'];?>"><?php echo $v['appoint_item_name'];?></option>
              <?php } ?>
              <?php } ?>
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
          
          <th>体验者姓名</th>
          <th>体验项目</th>
          <th>联系电话</th>
          <th class="align-center">备注</th>
          <th class="align-center">提交时间</th>
          <th class="w60 align-center"><?php echo $lang['nc_handle'];?></th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($output['appoints']) && is_array($output['appoints'])){ ?>
        <?php foreach($output['appoints'] as $k => $v){ ?>
        <tr class="hover">
          <td><input type="checkbox" name='del_id[]' value="<?php echo $v['appointment_id']; ?>" class="checkitem"></td>
          
          <td><?php echo $v['appointment_name']; ?></td>
          <td><?php echo $v['appoint_item_name']?></td>
          <td><?php echo $v['appointment_mobile']; ?></td>
          <td class="align-center"><?php echo $v['appointment_remark'] ?></td>
          <td class="nowrap align-center"><?php echo date("Y-m-d h:i:s",$v['appointment_time'])?></td>
          <td class="align-center"><?php if($v['appointment_status']==0) {?><a href="javascript:void(0)" onclick="if(confirm('将会短信通知到用户，尽快安排预约事宜')){location.href='index.php?act=appointment&op=send_sms_notice&appointment_id=<?php echo $v['appointment_id']?>&mobile=<?php echo $v["appointment_mobile"]?>';}">确认通知</a><?php }else{?>已通知<?php }?></td>
        </tr>
        <?php } ?>
        <?php }else { ?>
        <tr class="no_data">
          <td colspan="10"><?php echo $lang['nc_no_record'];?></td>
        </tr>
        <?php } ?>
      </tbody>
      <tfoot>
        <?php if(!empty($output['appoints']) && is_array($output['appoints'])){ ?>
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
