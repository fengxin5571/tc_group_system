<?php defined('InShopNC') or exit('Access Invalid!');?>

  <ul class="banner_con">
        <?php if (is_array($output['code_index_screen_list']['code_info']) && !empty($output['code_index_screen_list']['code_info'])) { ?>
        <?php foreach ($output['code_index_screen_list']['code_info'] as $key => $val) { ?>
        <li class="banner_b" style='background: <?php echo $val[color]?>;'>
            <div class="banner_s">
                <a class="banner_link" href="<?php echo $val['pic_url'];?>" title="<?php echo $val['pic_name'];?>">
                    <img src="<?php echo UPLOAD_SITE_URL.'/'.$val['pic_img'];?>" alt="">
                </a>
            </div>
        </li>
        <?php } ?>
        <div class="banner_btn">
            <?php foreach ($output['code_index_screen_list']['code_info'] as $key => $val) { ?>
            <div class="btn_one"></div>
            <?php }?>
        </div>
        <div class="btn_left"></div>
        <div class="btn_right"></div>
        <?php }?>
    </ul>

 




  
