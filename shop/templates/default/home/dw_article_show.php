<?php defined('InShopNC') or exit('Access Invalid!');?>
<link href="<?php echo SHOP_TEMPLATES_URL;?>/dw/css/problem_details_zdw.css" rel="stylesheet" type="text/css">
<link href="<?php echo SHOP_TEMPLATES_URL;?>/dw/css/all.css" rel="stylesheet" type="text/css">
<!-- 文章详情页 start -->
<section>
    
    <div class="main">
        <div class="header">
            <h1><?php echo $output['article']['article_title']?></h1>
            <ul>
                
                <li><a href="#"><?php echo date("Y-m-d",$output['article']['article_time'])?></a></li>
            </ul>
        </div>
        <div class="content">
            <?php echo $output['article']['article_content'];?>
        </div>
    </div>

</section>


<!-- 文章详情页 end -->