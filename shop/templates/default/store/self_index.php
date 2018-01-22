<?php defined('InShopNC') or exit('Access Invalid!');?>

<!-- 店铺详情页 start -->

<link rel="stylesheet" type="text/css" href="<?php echo SHOP_TEMPLATES_URL?>/dw/css/public_qty.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo SHOP_TEMPLATES_URL?>/dw//css/dyw_pc.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo SHOP_TEMPLATES_URL?>/dw/css/store_detail_zn.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo SHOP_TEMPLATES_URL?>/dw/css/storeDetail_qty.css"/>
<style>
*{box-sizing: inherit;}
</style>
<div class="detailBox_qty">
			<div class="detailSmallBox_qty">
				<!--面包屑-->
				<div class="detailHome_qty">
					<div class="homeFont"><a style="color: #9CC813;" href="<?php echo urlShop("index")?>">首页</a> <span>&gt</span><a href="<?php echo urlShop("store_list")?>">门店</a> <span>&gt</span> <a href="javascript:void(0)">门店详情</a></div>
				</div>
			</div>
				<!--面包屑-->
			<!--所在店-->
			<div class="ownedStoreBigBox_qty">
				<div class="ownedStoreBox_qty">
					<div class="ownImg_qty"></div>
					所在店面：
					<span class="owneFont_qty"><?php echo $output['store_info']['store_name']?></span>
				</div>
			</div>
				
			<!--所在店-->
			<!--宣传位-->
			<div class="storePropaganda_qty">
			    <?php if(!empty($output['store_info']['store_banner'])) {?>
				<img src="<?php echo getStoreLogo($output['store_info']['store_banner'],'store_logo');?>" alt="<?php echo $output['store_info']['store_name']; ?>" title="<?php echo $output['store_info']['store_name']; ?>"/>
				<?php }else {?>	
				<img src="<?php echo SHOP_TEMPLATES_URL.'/store/style/default/images/header.jpg'?>"/>
				<?php }?>
			</div>
			<!--宣传位-->
			<!--门店介绍开始-->
			<div class="storeIntroduceBox_qty">
				<div class="storeIntroduceSmallBox_qty">
					<div class="storeIntroduceFont_qty">
						门/店/介/绍
					</div>
					<div class="storeEnglish_qty">
						Stores are introduced
					</div>
					<div class="store_box_zn">
					    <div class="store_pic_zn">
					        <div class="pic_box_zn">
					            <?php if(!empty($output['store_slide']) && is_array($output['store_slide'])){?>
					            <?php for($i=0;$i<5;$i++){?>
        						<?php if($output['store_slide'][$i] != ''){?>
					            <a <?php if($output['store_slide_url'][$i] != '' && $output['store_slide_url'][$i] != 'http://'){?>href="<?php echo $output['store_slide_url'][$i];?>"<?php }?>>
					            <img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS.$output['store_slide'][$i];?>" alt=""/>
					            </a>
					            <?php }?>
					            <?php }?>
					            <?php }else{?>
					             <a href="javascript:void(0)"><img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS;?>f01.jpg"></a>
                                 <a href="javascript:void(0)"><img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS;?>f02.jpg"></a>
                                 <a href="javascript:void(0)"><img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS;?>f03.jpg"></a>
                                 <a href="javascript:void(0)"><img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS;?>f04.jpg"></a>
					            <?php }?>
					        </div>
					        <ul class="list_zn">
					            <?php if(!empty($output['store_slide']) && is_array($output['store_slide'])){?>
					            <?php for($i=0;$i<5;$i++){?>
        						<?php if($output['store_slide'][$i] != ''){?>
					            <li>
					                <img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS.$output['store_slide'][$i];?>" alt=""/>
					                <div class="mask_zn"><?php echo sprintf("%02d",$i+1)?></div>
					            </li>
					            <?php }?>
					            <?php }?>
					            <?php } else{?>
					            <li>
					                <img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS;?>f01.jpg" alt=""/>
					                <div class="mask_zn">01</div>
					            </li>
					            <li>
					                <img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS;?>f02.jpg" alt=""/>
					                <div class="mask_zn">02</div>
					            </li>
					            <li>
					                <img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS;?>f03.jpg" alt=""/>
					                <div class="mask_zn">03</div>
					            </li>
					            <li>
					                <img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS;?>f04.jpg" alt=""/>
					                <div class="mask_zn">04</div>
					            </li>
					            <?php }?>
					        </ul>
					    </div>
					    <div class="address_zn" id="map_show">
					        
					    </div>
					</div>
					<div class="develop_zn_box">
					    <div class="develop_title_zn">
					        <p class="develop_title">发展历程</p>
					        <p class="english_develop">Development history</p>
					    </div>
					    <div class="develop_box_zn">
					        <div class="develop_box_left">
					            <div class="xiantiao_zn"></div>
					            <div class="develop_left_zn">
					               <?php if($output["store_info"]["store_develop"]) {?>
					               <?php echo str_cut($output["store_info"]["store_develop"], 300,"...")?>
					               <?php }else{?>
					               山西太常生物科技有限公司是一家专业从事骨病调养，并以此为基础综合改善各类慢性病及亚健康症状的健康调理机构，是国内骨病个性化调养的开创者和领导者。
					               <?php }?>
					            </div>
					        </div>
					        <div class="develop_box_right">
					            <div class="develop_right_zn">
					                <div class="phone_and_address_zn">
					                    <div class="phone_zn">
					                        <i></i>
					                        <p><?php if($output['store_info']['store_phone']){echo $output['store_info']['store_phone'];}else{echo "暂无联系方式";}?></p>
					                    </div>
					                    <div class="address_zn_detail">
					                        <i></i>
					                        <p><?php echo $output['store_info']['live_store_address'];?></p>
					                    </div>
					                </div>
					            </div>
					        </div>
					    </div>
					</div>
				</div>
			</div>
			<!--门店介绍结束-->
			<!--店员介绍开始-->
			<div class="advisorBox_qty">
				<div class="advisorSmallBox_qty">
					<div class="storeIntroduceFont_qty">
						店/员/介/绍
					</div>
					<div class="storeEnglish_qty">
						Introduction of physicians
					</div>
					<!--店员介绍轮播图开始-->
				<div class="healthBannerRight">
				    <?php if($output['store_seller_list']&&is_array($output["store_seller_list"])) {?>
					<ul class="ImgBox_qty">
					    <?php foreach ($output['store_seller_list'] as $k=> $member) {?>
						<li>
							<div class="bgcc_qty"></div>
							<div class="lineBox_qty"></div>
							<div class="imgBox_qty">
								<img src="<?php if ($member['member_avatar']!='') { echo UPLOAD_SITE_URL.'/'.ATTACH_AVATAR.DS.$member['member_avatar']; } else { echo UPLOAD_SITE_URL.'/'.ATTACH_COMMON.DS.C('default_user_portrait'); } ?>" width="240" height="240"/>
							</div>
							<div class="seeBox_qty">
								<a href="javascript:void(0)"><?php if($member['is_admin']){echo "店长";}else{echo "店员";}?></a>
							</div>
							<div class="nameStore_qty">
								<span class="name_qty"><?php if($member['member_truename']){echo $member['member_truename'];}else{echo $member['seller_name'];}?></span>&nbsp/
								<span class="store_qty"><?php echo $output["store_info"]["store_name"]?></span>
							</div>
							<div class="teleBox_qty"><?php if($member["member_mobile"]){echo $member['member_mobile'];}else{echo "暂无联系方式";}?></div>
							<p>
							    <?php if($member['seller_description']) {?>
							    <?php echo str_cut($member['seller_description'], 150,"...")?>
							    <?php }else {?>
								专业知识扎实，学习成绩优异，有较强的组织协调能力专业知识扎实，学习成绩优异专业知识扎实，学习成绩优异，有较强的组织协调能力专业知识扎实，学习成绩优异又以优异...
								<?php }?>
							</p>
							<div class="mathBox_qty">
								<span><?php echo sprintf("%02d",$k+1)?></span>/<?php echo sprintf("%02d",count($output['store_seller_list']))?>
							</div>
						</li>
						<?php }?>
					</ul>
					<div class="lrbtn_qty">
						<div class="left_qty"></div>
						<div class="right_qty"></div>
					</div>
					<?php }?>
				</div>
				<!--店员介绍轮播图结束-->
				</div>
			</div>
			<!--店员介绍结束-->
			<!--风采展示开始-->
			<div class="elegantShowBox_qty">
				<div class="elegantShowSmallBox_qty">
					<div class="storeIntroduceFont_qty">
						风/采/展/示
					</div>
					<div class="storeEnglish_qty">
						team showcasing  
					</div>
					<div class="elegantShowBottomBox_qty">
						<div class="elegantLeft_qty">
						    <?php if($output["store_info"]['store_style_show']) { ?>
							<?php echo str_cut($output["store_info"]['store_style_show'], "500","...")?>
							<?php }else {?>
							 山西太常生物科技有限公司是一家专业从事骨病调养，并以此为基础综合改善各类慢性病及亚健康症状的健康调理机构，是国内骨病个性化调养的开创者和领导者。
							<?php }?>
						</div>
						<div class="elegantRight_qty">
							<ul>
							    <?php if(!empty($output['store_style_show_img']) && is_array($output['store_style_show_img'])){?>
								<?php for($i=0;$i<6;$i++){?>
								<li>
								<?php if($output['store_style_show_img'][$i]==""){?>
                        			<img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS?>store_style_<?php echo $i+1?>.jpg">
                        			<?php }else{?>
                        			<img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS.$output['store_style_show_img'][$i];?>">
                        			<?php }?>
                        		</li>
								<?php }?>
								<?php }else{?>
								<li>
									<img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS?>store_style_1.jpg"/>
								</li>
								<li>
									<img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS?>store_style_2.jpg"/>
								</li>
								<li>
									<img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS?>store_style_3.jpg"/>
								</li>
								<li>
									<img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS?>store_style_4.jpg"/>
								</li>
								<li>
									<img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS?>store_style_5.jpg"/>
								</li>
								<li>
									<img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS?>store_style_6.jpg"/>
								</li>
								<?php }?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!--风采展示结束-->
			<!--预约体验开始-->
			<div class="bookExperienceBox_qty">
				<div class="bookExperienceSmallBox_qty">
					<div class="storeIntroduceFont_qty">
						商/品/展/示
					</div>
					<div class="storeEnglish_qty">
						Merchandise display
					</div>
					<div class="experienceBox_qty">
					    <?php if(!empty($output['recommended_goods_list']) && is_array($output['recommended_goods_list'])){?>
						<ul>
						    <?php foreach($output['recommended_goods_list'] as $value){?>
							<li>
							   
								<div class="experImgBox_qty">
								    <a href="<?php echo urlShop('goods', 'index', array('goods_id'=>$value['goods_id']));?>"> 
									<div class="bookImg_qty">
										<img src="<?php echo thumb($value, 240);?>" alt="<?php echo $value['goods_name'];?>"/>
									</div>
									
									<div class="priceBox_qty">
									    <?php if (is_array($value['image'])) {?>
									    <?php $i=0;foreach ($value['image'] as $val) {$i++?>
										<div class="smallBox_qty">
											<img src="<?php echo thumb($val, 60);?>"/>
										</div>
										<?php }?>
										<?php } else {?>
										<?php }?>
									</div>
									<div class="descriptionBox_qty" title="<?php echo $value['goods_name']?>">
										<?php echo $value['goods_name']?>
									</div>
									<div class="colorPriceBox_qty">
										<span class="priceColor_qty">￥<span><?php echo $value['goods_promotion_price']?></span></span>
										<span class="sale_qty">已售<span><?php echo $value['goods_salenum'];?></span>件</span>
									</div>
									</a>
								</div>
								
							</li>
							<?php }?>
						</ul>
						<?php }?>
					</div>
					<div class="moreBox_qty">
						<a href="<?php echo urlShop("show_store","goods_all",array("store_id"=>$output['store_info']['store_id']))?>">更多</a>
					</div>
				</div>
			</div>
			<!--预约体验结束-->
			<!--问题咨询开始-->
			<div class="problemBox_qty">
			    <form  method="post" action="index.php?act=question&op=question">
				<div class="problemSmallBox_qty">
					<div class="storeIntroduceFont_qty">
						问/题/咨/询
					</div>
					<div class="storeEnglish_qty">
						Problem consultation
					</div>
					<div class="problemBottomBox_qty">
						<div class="problemLeft_qty">
							<div class="problemLeftSmall_qty">
								<div class="question_qty">请输入您的问题</div>
								<textarea name="question_title" rows="" cols=""></textarea>
								<div class="tiwenBox_qty"><input type="submit" value="立即提问" class="tiwenBox_qty_submit"/></div>
							</div>
						</div>
						<div class="problemRight_qty">
							<div class="whatBpx_qty">
								<span></span>他们问过
							</div>
							<?php if($output['question_list']&&is_array($output['question_list'])) {?>
							<a href="<?php echo urlShop("question","question_show",array("qid"=>$output['question_list'][0]['question_id']));?>">
							<div class="fengwhatBpx_qty">
								<span></span><?php echo str_cut($output['question_list'][0]['question_title'], 70)?>
							</div>
							</a>
							<?php if($output['question_list'][0]["answers"]&&is_array($output['question_list'][0]["answers"])){?>
							<div class="answer_qty">
								<span></span>答
							</div>
							
							<?php foreach ($output['question_list'][0]["answers"] as $key=>$answer) {?>
							<div class="num_qty">
								<?php echo $key+1?>、<?php echo str_cut($answer['answer_content'], 150,"...")?>
							</div>
							
							<?php }?>
							<?php }?>
							<div class="seeSmallBox_qty">
								<a href="<?php echo urlShop("question","question_list",array("question_status"=>3))?>">查看更多</a>
							</div>
							<?php }?>
						</div>
					</div>
				</div>
			</div>
			</form>
			<!--问题咨询结束-->
		</div>
<script type="text/javascript">
	//门店介绍缩略图
	$(document).on('click','.list_zn li',function(){
				$(this).children('.mask_zn').css('display','block').css('z-index','20');
		$(this).siblings().children('.mask_zn').css('display','none');
		$('.pic_box_zn a ').eq($(this).index()).css('display','block');
		$('.pic_box_zn a ').eq($(this).index()).siblings().css('display','none');
	})
	
	
	//预约体验缩略图
	$(".smallBox_qty img").on("mouseover",function(){
		$(this).parent().parent().prev().children().attr("src", this.src.replace('_60.', '_240.'));
		$(this).parent().css("border","1px solid #d93600").siblings().css("border","1px solid #E8E8E8")
	})
	
	//店员介绍轮播图
	$(function(){
	    var box=$('.healthBannerRight');
	    var imgbox=$('.ImgBox_qty');
	    var imgboxa=$('.ImgBox_qty>li');
	    var rbtn=$('.right_qty');
	    var lbtn=$('.left_qty');
	    var btn=$('.btn_qty');
	    var length=imgboxa.length;
	    var flag=true;
	    imgboxa.css('left','100%').eq(0).css('left','0');
	    var $lis=$('.btn_qty>li');
	    var now=0;
	    var next=0;
	    var time=3000;
	    var t=setInterval(moveR,time);
	    function moveR(){
	        next++;
	        if(next==length){
	            next=0;
	        }
	        imgboxa.eq(next).css('left','100%');
	        imgboxa.eq(now).animate({'left':'-100%'});
	        imgboxa.eq(next).animate({'left':'0'},function(){
	            flag=true;
	        });
	        now=next;
	    }
	
	     function moveL(){
	        next--;
	        if(next<0){
	            next=imgboxa.length-1;
	        }
	        imgboxa.eq(next).css('left','-100%');
	        imgboxa.eq(now).animate({'left':'100%'});
	        imgboxa.eq(next).animate({'left':'0'},function(){
	            flag=true;
	        });			  
	        now=next;
	    }
	
	    $lis.click(function(){
	        if(!flag){return;}
	        flag=false;
	        var i=$(this).index();
	        if(now==i){
	            return;
	        }
	        if(now<i){
	            imgboxa.eq(i).css('left','100%');
	            imgboxa.eq(now).animate({'left':'-100%'},2000);
	            imgboxa.eq(i).animate({'left':'0'},2000);
	        }else if(now>i){
	            imgboxa.eq(i).css('left','-100%');
	            imgboxa.eq(now).animate({'left':'100%'},2000);
	            imgboxa.eq(i).animate({'left':'0'},2000);
	        }
	        imgboxa.eq(now).animate({left:'100%'},2000);
	        imgboxa.eq(i).animate({left:'0'},2000,function(){
	            flag=true;
	        });
	        next=now=i;
	    })
	    box.mouseover(function(){
	        clearInterval(t);
	    })
	    box.mouseout(function(){
	        t=setInterval(moveR,time);
	    })
	    rbtn.click(function(){
	        if(flag){
	            flag=false;
	             moveR();
	        }
	       
	    })
	    lbtn.click(function(){
	        if(flag){
	            flag=false;
	             moveL();
	        }
	       
	    })
	})
</script>
<!--  <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=cWVfWssKBdVtcbH85hzFcOrgPsUOVswf"></script>-->
<script type="text/javascript">
var cityName = "<?php echo $output['store_info']['store_address'];?>";
var address = "<?php echo $output['store_info']['live_store_address'];?>";
var store_name = "<?php echo $output['store_info']['store_company_name'];?>"; 
function initialize_self() {
	map = new BMap.Map("map_show");
	localCity = new BMap.LocalCity();
	map.enableScrollWheelZoom(); 
	localCity.get(function(cityResult){
	  if (cityResult) {
	  	var level = cityResult.level;
	  	if (level < 13) level = 13;
	    map.centerAndZoom(cityResult.center, level);
	    cityResultName = cityResult.name;
	    if (cityResultName.indexOf(cityName) >= 0) cityName = cityResult.name;
	    	    	getPoint1();
	    	  }
	});
}
function getPoint1(){
	var myGeo = new BMap.Geocoder();
	myGeo.getPoint(address, function(point){
	  if (point) {
	    setPoint1(point);
	  }
	}, cityName);
}
function setPoint1(point){
	  if (point) {
		console.log(point);
	    map.centerAndZoom(point, 16);
	    var marker = new BMap.Marker(point);
	    map.addOverlay(marker);
	    console.log(marker);
	  }
}
function loadScript_self() {
	var script = document.createElement("script");
	script.src = "http://api.map.baidu.com/api?v=1.2&callback=initialize_self";
	document.body.appendChild(script);
}

</script> 

<script>
$(function(){
	loadScript_self();
	var store_id = "<?php echo $output['store_info']['store_id']; ?>";
	var goods_id = "<?php echo $_GET['goods_id']; ?>";
	var act = "<?php echo trim($_GET['act']); ?>";
	var op  = "<?php echo trim($_GET['op']) != ''?trim($_GET['op']):'index'; ?>";
	$.getJSON("index.php?act=show_store&op=ajax_flowstat_record",{store_id:store_id,goods_id:goods_id,act_param:act,op_param:op});
});
</script>


<!-- 店铺详情页 end -->


<!-- 引入幻灯片JS --> 
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.flexslider-min.js"></script> 
<!-- 绑定幻灯片事件 --> 
<script type="text/javascript">
	$(window).load(function() {
		$('.flexslider').flexslider();


	    // 图片切换效果
	    $('.goods-thumb-scroll-show').find('a').mouseover(function(){
	        $(this).parents('li:first').addClass('selected').siblings().removeClass('selected');
	        var _src = $(this).find('img').attr('src');
	        _src = _src.replace('_60.', '_240.');
	        $(this).parents('dt').find('.goods-thumb').find('img').attr('src', _src);
	    });
	});
</script>

