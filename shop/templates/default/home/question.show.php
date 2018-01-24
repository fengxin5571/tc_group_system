<?php defined('InShopNC') or exit('Access Invalid!');?>

<link href="<?php echo SHOP_TEMPLATES_URL;?>/dw/css/question_detail_yyt.css" rel="stylesheet" type="text/css">
<!-- 问答显示页start -->
<style>
body{background: #F8F8F8;}
</style>
<div class="question_con_yyt">
    <div class="queDet_title_yyt"><?php echo $output["question"]['question_title']?></div>
    <div class="queDet_time_yyt">
        <div class="QD_left_yyt">
            <div class="QD_one_yyt"><?php if($output["question"]['member_truename']){echo $output["question"]['member_truename'];}else{echo $output["question"]['member_name'];}?>的提问</div>
            <div class="QD_two_yyt"><?php if(count($output["question"]["answer_list"])>0){echo "已回答";}else{echo "未回答";}?></div>
            <?php if($output['question']['question_status'] ==0){?>
            <?php if($output['question']['question_member']==$output['member_info']['member_id']) {?>
            <div class="QD_three_yyt" onclick="javascript:location.href='index.php?act=question&op=resolve_question&qid=<?php echo $output["question"]["question_id"]?>'">将问题设为已解决</div>
            <?php }?>
            <?php }else {?>
            <div class="QD_three_yyt" >已解决</div>
            <?php }?>
        </div>
        <div class="QD_right_yyt"><?php echo date('Y.m.d',$output["question"]['question_time'])?></div>
    </div>
    <?php if($output["question"]['question_content']) {?>
    <div class="question_yyt"><?php echo $output["question"]['question_content']?></div>
    <?php }?>
    <?php if($output["question"]["answer_list"]&&is_array($output["question"]["answer_list"])) {?>
    <ul class="answer_yyt">
        <?php foreach ($output["question"]["answer_list"] as $answer) {?>
        <li class="answer_a_yyt">
            <div class="answer_name_yyt">
                <div class="name_left_yyt"><?php if($answer['member_truename']){echo $answer['member_truename'];}else{echo $answer['member_name'];}?>的回答</div>
                <div class="name_right_yyt">发布于 <?php echo date("Y.m.d",$answer['answer_time'])?></div>
            </div>
            <div class="answer_b_yyt"><?php echo $answer['answer_content']?></div>
        </li>
        <?php }?>
    </ul>
    <?php }?>
    <?php if($output['member_info']['member_advisor']==1&&$output['question']['question_member']!=$output['member_info']['member_id']&&$output['question']['question_status']==0) {?>
    <div class="docAns_yyt">
        <div class="answer_name_yyt">
            <div class="name_left_yyt">医师的回答</div>
            <div class="name_right_yyt">发布于 2016.03.05</div>
        </div>
        <form action="index.php?act=question&op=answer_question" method="post">
            <input type="hidden" name="qid" value="<?php echo $output['question']['question_id'] ?>">
            <textarea class="answer_b_yyt" rows="3" cols="20" placeholder="请输入您的回答..." name="answer_content"></textarea>
            <input type="submit" class="submit_yyt" value="提交">
        </form>
    </div>
    <?php }?>
</div>
<!-- 问答显示页end -->