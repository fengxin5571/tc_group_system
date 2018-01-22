<?php defined('InShopNC') or exit('Access Invalid!');?>
<link href="<?php echo SHOP_TEMPLATES_URL;?>/dw/css/all.css" rel="stylesheet" type="text/css">
<link href="<?php echo SHOP_TEMPLATES_URL;?>/dw/css/wenda_zdw.css" rel="stylesheet" type="text/css">
<!--  问答首页 start -->

<section>
   
    <!--提问专区-->
    <div class="twzq">
        <img src="<?php echo SHOP_TEMPLATES_URL?>/dw/image/wd-twzq_zdw.png"/>
        
        <div class="banner">
            <img src="<?php echo SHOP_TEMPLATES_URL?>/dw/image/wd_banner_zdw.png"/>
            <form method="post" action="index.php?act=question&op=question">
               
                <ul>
                    <li>
                        <label>您的问题是</label>
                        <input name="question_title" value="" size="64" placeholder="标题：写下你的问题"/>
                    </li>
                    <li>
                        
                        <textarea name="question_content" class="que" placeholder="选填，详细说明您的问题，以便获得更好的答案"></textarea>
                    </li>
                    
                    <li>
                        <a href="#">我们的指导老师，将及时回答您的问题</a>
                    </li>
                    <li>
                        平台咨询电话：<?php echo $GLOBALS['setting_config']['site_tel400']; ?>
                    </li>
                    
                </ul>
                <input class="btn" type="submit" value="立即询问"/>
            </form>
        </div>
    </div>
    <!--热点问题-->
    <div class="rdtw">
        <div class="rdtw">
            <img src="<?php echo SHOP_TEMPLATES_URL?>/dw/image/wd_rdtw_zdw.png"/>
        </div>
        <?php if($output['question_list']&&is_array($output['question_list'])) {?>
        <?php foreach ($output['question_list'] as $quesion) {?>
        <div class="rdtw_qa">
            <div>
                <ul class="rdtw_qqq">
                    <b><a style="color: #f69c1c;" href="<?php echo urlShop("question","question_show",array("qid"=>$quesion['question_id']))?>"><?php echo str_cut($quesion['question_title'], 40)?></a></b>
                    <span style="margin-left: 10px"><?php echo date("Y.m.d",$quesion['question_time'])?></span><br/>
                </ul>
                <?php if($quesion['answer_list']) {?>
                <ul class="rdtw_aaa">
                <p>
                 <?php echo str_cut($quesion['answer_list']['answer_content'], 250,"...")?>
                </p>
                </ul>
                <?php }?>
            </div>
            <ul class="rdtw_bottom">
                <li class="lf"><a href="#"><?php if($quesion['member_truename']){echo $quesion['member_truename'];}else{echo $quesion['member_name'];}?>的提问</a></li>
                <li class="rt"><a href="#"><?php if($quesion['answer_list']['member_truename']){echo $quesion['answer_list']['member_truename'];}else{echo $quesion['answer_list']['member_name'];}?>的回答</a></li>
            </ul>
            <img src="<?php echo SHOP_TEMPLATES_URL?>/dw/image/wd_yisheng_zdw.png"/>
            <button><?php if($quesion['member_truename']){echo $quesion['member_truename'];}else{echo $quesion['member_name'];}?> | 欢迎预约 </button>
        </div>
        <?php }?>
        <?php }?>
        <!--查看更多-->
        <button><a href="<?php echo urlShop("question","question_list",array("question_status"=>3))?>" style="color: #fff">查看更多</a></button>
    </div>
</section>


<!--  问答首页 end -->