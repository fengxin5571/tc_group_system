<?php defined('InShopNC') or exit('Access Invalid!');?> 
<link href="<?php echo SHOP_TEMPLATES_URL;?>/dw/css/appoint_qty.css" rel="stylesheet" type="text/css">
<!-- 预约体验 satart -->
<style>
body{background: #F8F8F8;}

</style>
<div class="appointBox_qty">
<div class="appointSmallBox_qty">
	
	<!--预约体验立即预约开始-->
		<div class="appointImgBox_qty">
			<ul>
				<li>
					<?php echo rec(13);?>
				</li>
				<li>
					<?php echo rec(14);?>
				</li>
				<li>
					<?php echo rec(15);?>
				</li>
				<li>
					<?php echo rec(16);?>
				</li>
			</ul>
		</div>
	<!--预约体验立即预约结束-->
	<!--预约体验介绍开始-->
		<div class="appointIntroduce_qty">
			<!--预约体验左边开始-->
				<div class="appointLeft_qty">
					<div class="appointSmallLeft_qty">
						<h2>预约体验介绍</h2>
						<p> 山西太常生物科技有限公司是一家专业从事骨病调养，并以此为基础综合改善各类慢性病及亚健康症状的健康调理机构，是国内骨病个性化调养的开创者和领导者。</p>
						<span>请记住我们的网址：<a href="">www.sxtaichang.com</a> </span>
						<h3>预约填单</h3>
						<div class="tableBox_qty">
							<form  method="post">
							    <input type="hidden" value="appointment" name="act">
    							<input type="hidden" value="index" name="op">
    							<input type="hidden" name="form_submit" value="ok" />
								<table border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td>名字</td>
										<td>预约项目</td>
									</tr>
									<tr>
										<td>
											<input type="text" name="appoint[appointment_name]" id="appointment_name" value="" />
										</td>
										<td>
											<select name="appoint[appointment_item]">
												<option value="0">-请选择-</option>
												<?php if($output['appoint_items']&&is_array($output['appoint_items'])) {?>
												<?php foreach ($output['appoint_items'] as $item) {?>
												<option value="<?php echo $item['item_id']?>"><?php echo $item['appoint_item_name']?></option>
												<?php }?>
												<?php }?>
											</select>
										</td>
									</tr>
									<tr>
										<td colspan="2">联系电话</td>
									</tr>
									<tr>
										<td colspan="2">
											<input type="text" name="appoint[appointment_mobile]" id="appointment_mobile" value="<?php if($output['member_info']['member_mobile']){echo $output['member_info']['member_mobile'];}else{echo "";}?>" class="input_qty"/>
										</td>
									</tr>
									
									
									
									<tr>
										<td colspan="2">备注</td>
									</tr>
									<tr>
										<td colspan="2">
											<textarea name="appoint[appointment_remark]" rows="4" cols="" class="input_qty"></textarea>
										</td>
									</tr>
								</table>
								<div class="sumbit_qty">
									<input type="submit" name="" id="" value="提交" />
								</div>
							</form>
						</div>
					</div>
				</div>
			<!--预约体验左边结束-->
			<!--预约体验右边开始-->
						<div class="appointRight_qty">
							<h2>预约须知</h2>
            				<ul>
            					<li>
            						
            				<p>
            					1.注意清淡饮食，不要吃一些大鱼大肉类的事物，最好选择蔬菜类，体检前一天晚饭早些吃，晚上十点以后就不要再吃东西或者喝水了。
            				</p>
            					</li>
            					<li>
            						
            				<p>
            					2.要注意休息好，不要做过于劳累的体力劳动，要保证睡眠，体检前一天最好在晚上十点左右就睡觉，以保证明天精力充沛。
            				</p>
            					</li>
            					<li>
            						
            				<p>
            					3.不要饮酒，因为酒精留存人体的时间可以达到10到20个小时，根据个人体质不同，所以，体检前饮酒肯定会影响体检结果。
            				</p>
            					</li>
            				</ul>
							<h1>预约流程</h1>
							<div class="proces_qty">
								<ul>
									<li>
										<p><span>1</span>&nbsp;&nbsp;请详细填写“预约体验”信息，或拨打门店电话进行预约</p>
									</li>
									<li>
										<p><span>2</span>&nbsp;&nbsp;门店人员电话回访，确认到店体验时间和体验注意事项</p>
									</li>
									<li>
										<p><span>3</span>&nbsp;&nbsp;请您准时到店进行免费体验</p>
									</li>
								</ul>
							</div>
						</div>
						<!--预约体验右边结束-->
		</div>
	<!--预约体验介绍结束-->
	</div>
</div>


<!-- 预约体验 end -->