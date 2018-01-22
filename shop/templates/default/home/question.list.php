<?php defined('InShopNC') or exit('Access Invalid!');?>

<link href="<?php echo SHOP_TEMPLATES_URL;?>/dw/css/answerList.css" rel="stylesheet" type="text/css">
<!-- 问答列表start -->
<<style>
body{background: #F8F8F8;}
</style>
<div class="answerBox">
	<div class="answerSmallBox">
		
		<!--问题列表开始-->
		<div class="healthBox_qty">
			<div class="healthImgBox_qty">
				<img src="<?php echo SHOP_TEMPLATES_URL;?>/dw/image/store_qty.png"/>
			</div>
			<div class="healthRightBox_qty">
				<div class="healthTopFont_qty">
					热点<span>提问</span>
				</div>
				<div class="healthBottomFont_qty">
					HOT<span>QUESTIONS</span>
				</div>
			</div>
		</div>
		<ul class="twzq-nav">
            <li class="active" id="bgc_2"><a href="<?php echo urlShop("question","question_list",array("question_status"=>3))?>" >全部</a></li>
            <li id="bgc_0"><a href="<?php echo urlShop("question","question_list",array("question_status"=>0))?>" >待解决</a></li>
            <li id="bgc_99"><a href="<?php echo urlShop("question","question_list",array("question_status"=>1))?>" >已解决</a></li>
            
        </ul>
		<!--问题结束-->
		<!--问题列表开始-->
		<div class="answerListBox_qty">
			<ul class="answerSmalllistBox_qty">
			    <?php if($output['question_list']&&is_array($output['question_list'])) {?>
			    <?php foreach ($output['question_list'] as $question) {?>
				<li>
				    
					<div class="answerLeft_qty">
					    
						<div class="answer_qty">
							<a href="<?php echo urlShop("question","question_show",array("qid"=>$question['question_id']))?>"><h4>Q：<?php echo str_cut($question['question_title'], 44)?><span><?php echo date("Y.m.d",$question['question_time'])?></span><span ><?php if($question['member_truename']){echo $question['member_truename'];}else{echo $question['member_name'];}?>的提问</span></h4></a>
						</div>
						<?php if($question['answer_list']&&is_array($question['answer_list'])) {?>
						<?php foreach ($question['answer_list'] as $answer) {?>
						<div class="answer_qty">
							<h4 class="color_qty">A：</h4>
							
							<p><?php echo $answer['answer_content']?></p>
						</div>
						
						<div class="anony_qty">
							
							<span class="anonyR_qty"><?php if($answer['member_truename']){echo $answer['member_truename'];}else{echo $answer['member_name'];}?>的回答</span>
						</div>
						<?php }?>
						<?php }?>
					</div>
					<div class="answerRight_qty">
						<a href="">
							<img src="<?php echo SHOP_TEMPLATES_URL;?>/dw/image/doctor_qty.png"/>
							<span class="doctor_qty"><?php if($question['member_truename']){echo $question['member_truename'];}else{echo $question['member_name'];}?>欢迎您<span>预约</span></span>
						</a>
					</div>
					
				</li>
				<?php }?>
				<?php }?>
			</ul>
		</div>
		<!--问题列表结束-->
		<!--分页开始-->
		<div class="pageBox_qty">
				<div class="pagination"> <?php echo $output['show_page'];?> </div>
		 	</div>
		<!--分页结束-->
	</div>
</div>





<!-- 问答列表end -->