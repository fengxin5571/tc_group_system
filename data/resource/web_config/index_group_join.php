 <?php if (is_array($output['code_index_screen_list']['code_info']) && !empty($output['code_index_screen_list']['code_info'])) { ?>
<?php foreach ($output['code_index_screen_list']['code_info'] as $key => $val) { ?>
<a href="<?php echo $val['pic_url'];?>"><img src="<?php echo UPLOAD_SITE_URL.'/'.$val['pic_img'];?>" alt="<?php echo $val['pic_name']?>"><div><?php echo $val["pic_name"]?></div></a>

<?php }?>
<?php }?>