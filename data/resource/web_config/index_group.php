 <div id="container">
    <ul class="pic">
         <?php if (is_array($output['code_screen_list']['code_info']) && !empty($output['code_screen_list']['code_info'])) { ?>
         <?php foreach ($output['code_screen_list']['code_info'] as $key => $val) { ?>
        <li><a href="<?php echo $val['pic_url']?>"><img src="<?php echo UPLOAD_SITE_URL.'/'.$val['pic_img'];?>" alt="pic1"></a></li>
        <?php }?>
    </ul>
    <ul id="position">
         <?php foreach ($output['code_screen_list']['code_info'] as $key => $val) { ?>
        <li class="cur"></li>
        <?php }?>
    </ul>
    <a href="javascript:;" id="prev" class="arrow">
            <img src="<?php echo SHOP_SITE_URL?>/templates/default/group/image/image_zn/arrow_03.png" alt="" class="arrow_white">
            <img src="<?php echo SHOP_SITE_URL?>/templates/default/group/image/image_zn/arrow_yellow_03.png" alt="" class="arrow_yellow">
        </a>
    <a href="javascript:;" id="next" class="arrow">
        <img src="<?php echo SHOP_SITE_URL?>/templates/default/group/image/image_zn/arrow_05.png" alt="" class="arrow_white">
        <img src="<?php echo SHOP_SITE_URL?>/templates/default/group/image/image_zn/arrow_yellow_05.png" alt="" class="arrow_yellow">
    </a>
    <?php }?>
</div>
        
