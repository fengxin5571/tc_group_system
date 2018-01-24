<?php defined('InShopNC') or exit('Access Invalid!');?>
<script type="text/javascript">
    <?php if (is_array($output['pic']) && !empty($output['pic'])) { ?>
    <?php if($output['flag']==1){?>
    parent.screen_index_pic("<?php echo $output['pic']['pic_id'];?>","<?php echo $output['pic']['pic_img'];?>");
    <?php }elseif($output['flag']==2){?>
    parent.screen_group_pic("<?php echo $output['pic']['pic_id'];?>","<?php echo $output['pic']['pic_img'];?>");
    <?php }else{?>
	parent.screen_pic("<?php echo $output['pic']['pic_id'];?>","<?php echo $output['pic']['pic_img'];?>","<?php echo $output['obj_name']?>");
	<?php } ?>
	<?php } ?>
    <?php if (!empty($output['ap_pic_id'])) { ?>
	parent.screen_ap("<?php echo $output['ap_pic_id'];?>","<?php echo $output['ap_color'];?>");
	<?php } ?>

</script>