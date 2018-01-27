<?php defined('InShopNC') or exit('Access Invalid!');?>
<?php if(!empty($output['video_list']) && is_array($output['video_list'])){ ?>

<div class="article-select-box">
  <div class="arrow"></div>
  <ul id="article_search_list" class="article-search-list">
    <?php foreach($output['video_list'] as $value){ ?>
    <li nctype="btn_article_select" video_id="<?php echo $value['video_id'];?>"><a href="<?php echo getCMSVideoUrl($value['video_id']);?>" target="_blank"> <?php echo $value['video_title'];?> </a> <i><?php echo $lang['api_article_add'];?></i> </li>
    <?php } ?>
  </ul>
</div>
<?php }else { ?>
<div class="no-record"><?php echo $lang['no_record'];?></div>
<?php } ?>
