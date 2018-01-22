<?php defined('InShopNC') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3>会场签到</h3>
      <ul class="tab-base">
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_manage'];?></span></a></li>
        
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="get" name="formSearch">
    <input type="hidden" value="sign" name="act">
    <input type="hidden" value="signList" name="op">
    <table class="tb-type1 noborder search">
      <tbody>
        <tr>
          <th><label for="search_title">签到人姓名或手机</label></th>
          <td><input type="text" value="<?php echo $output['search_title'];?>" name="search_title" id="search_title" class="txt"></td>
          <th><label for="search_ac_id">签到人身份</label></th>
          <td><select name="search_join_id" id="search_item_id" class="">
              <option value=""><?php echo $lang['nc_please_choose'];?>...</option>
             <option  value="1"<?php if($output['search_join_id']==1){echo "selected";}?>>经销商</option>
             <option  value="2"<?php if($output['search_join_id']==2){echo "selected";}?>>加盟商</option>
             <option  value="3"<?php if($output['search_join_id']==3){echo "selected";}?>>其他</option>
            </select></td>
          <td><a href="javascript:document.formSearch.submit();" class="btn-search " title="<?php echo $lang['nc_query'];?>">&nbsp;</a>
            <?php if($output['search_title'] != '' or $output['search_join_id'] != ''){?>
            <a href="index.php?act=sign&op=signList" class="btns " title="<?php echo $lang['nc_cancel_search'];?>"><span><?php echo $lang['nc_cancel_search'];?></span></a>
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
          
          <th>签到人人姓名</th>
          <th>签到人身份</th>
          <th>地区</th>
          <th>联系电话</th>
          <th class="align-center">提交时间</th>
          <th class="w60 align-center"><?php echo $lang['nc_handle'];?></th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($output['sign_list']) && is_array($output['sign_list'])){ ?>
        <?php foreach($output['sign_list'] as $k => $v){ ?>
        <tr class="hover">
          <td><input type="checkbox" name='del_id[]' value="<?php echo $v['id']; ?>" class="checkitem"></td>
          
          <td><?php echo $v['sign_name']; ?></td>
          <td><?php if($v['sign_role']==1){echo "经销商";}elseif ($v['sign_role']==2){echo "加盟商";}else {echo "其他";}?></td>
          <td><?php echo $v['sign_areainfo']; ?></td>
          <td><?php echo $v['sign_mobile']; ?></td>
          <td class="align-center"><?php echo date("Y-m-d h:i:s",$v['sign_time'])?></td>
          
          <td class="align-center"></td>
        </tr>
        <?php } ?>
        <?php }else { ?>
        <tr class="no_data">
          <td colspan="10"><?php echo $lang['nc_no_record'];?></td>
        </tr>
        <?php } ?>
      </tbody>
      <tfoot>
        <?php if(!empty($output['sign_list']) && is_array($output['sign_list'])){ ?>
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
