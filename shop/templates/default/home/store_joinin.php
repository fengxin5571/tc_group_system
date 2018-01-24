<?php defined('InShopNC') or exit('Access Invalid!');?>
<div class="banner">
  <div class="user-box">
    <?php if($_SESSION['is_login'] == '1'){?>
    <div class="user-joinin">
      <h3>亲爱的：<?php echo $_SESSION['member_name'];?></h3>
      <dl>
        <dt><?php echo $lang['welcome_to_site'].$output['setting_config']['site_name']; ?></dt>
        <dd> 若您还没有填写入驻申请资料<br/>
          请点击“<a href="<?php echo urlShop('store_joinin', 'step0');?>" target="_blank">我要入住</a>”进行入驻资料填写</dd>
        <dd>若您的店铺还未开通<br/>
          请通过“<a href="<?php echo urlShop('store_joinin', 'index');?>" target="_blank">查看入驻进度</a>”了解店铺开通的最新状况 </dd>
      </dl>
      <div class="bottom"><a href="<?php echo urlShop('store_joinin', 'step0');?>" target="_blank">我要入住</a><a href="<?php echo urlShop('store_joinin', 'index');?>" target="_blank">查看入驻进度</a></div>
    </div>
     <?php }else { ?>
    <div class="user-login">
      <h3>商务登录<em>（使用已注册的会员账号）</em></h3>
      <form id="login_form" action="index.php?act=login" method="post">
        <?php Security::getToken();?>
        <input type="hidden" name="form_submit" value="ok" />
        <input name="nchash" type="hidden" value="<?php echo getNchash();?>" />
        <dl>
          <dt><?php echo $lang['login_index_username'];?>：</dt>
          <dd>
            <input type="text" class="text" autocomplete="off"  name="user_name" id="user_name">
            <label></label>
          </dd>
        </dl>
        <dl>
          <dt><?php echo $lang['login_index_password'];?>：</dt>
          <dd>
            <input type="password" class="text" name="password" autocomplete="off"  id="password">
            <label></label>
          </dd>
        </dl>
        <?php if(C('captcha_status_login') == '1') { ?>
        <dl>
          <dt><?php echo $lang['login_index_checkcode'];?>：</dt>
          <dd>
            <input type="text" name="captcha" class="text w50 fl" id="captcha" maxlength="4" size="10" />
            <a href="JavaScript:void(0);" onclick="javascript:document.getElementById('codeimage').src='index.php?act=seccode&op=makecode&nchash=<?php echo getNchash();?>&t=' + Math.random();" class="change" title="<?php echo $lang['login_index_change_checkcode'];?>">
            <img src="index.php?act=seccode&op=makecode&nchash=<?php echo getNchash();?>" class="fl ml5" name="codeimage" id="codeimage" border="0"/></a>
            <label></label>
          </dd>
        </dl>
        <?php } ?>
        <dl>
          <dt></dt>
          <dd>
            <input type="hidden" value="<?php echo SHOP_SITE_URL?>/index.php?act=show_joinin" name="ref_url">
            <input name="提交" type="submit" class="button" value="登&nbsp;&nbsp;录">
            <a href="index.php?act=login&op=forget_password" target="_blank"><?php echo $lang['login_index_forget_password'];?></a></dd>
        </dl>
      </form>
      <div class="register">还没有成为我们的合作伙伴？ <a href="index.php?act=login&op=register" target="_blank">快速注册</a></div>
    </div>
    <?php } ?>
  </div>
  <ul id="fullScreenSlides" class="full-screen-slides">
    <?php $pic_n = 0;?>
    <?php if(!empty($output['pic_list']) && is_array($output['pic_list'])){ ?>
    <?php foreach($output['pic_list'] as $key => $val){ ?>
    <?php if(!empty($val)){ $pic_n++; ?>
    <li style="background-color: #F1A595; background-image: url(<?php echo UPLOAD_SITE_URL.'/'.ATTACH_COMMON.'/'.$val;?>)" ></li>
    <?php } ?>
    <?php } ?>
    <?php } ?>
  </ul>
</div>
<div class="indextip">
  <div class="container"> <span class="title"><i></i>
    <h3>贴心提示</h3>
    </span> <span class="content"><?php echo $output['show_txt'];?></span></div>
</div>
<div class="main mt30">
  <div class="pro_head">
				<div class="line"></div>
				<div class="tit">
					<h2>入驻流程</h2>
					<p>SETTLED  PROCESS</p>
				</div>
			</div>
  <div class="pro_con">
				<ul class="clearfix">
					<li class="con1">
						<a href="javascript:void(0);">
							<div class="con_icon"></div>
							<h2>注册并登录</h2>
							<p>注册成为网站会员并</p>
							<p>登录进入商家入驻平台</p>
						</a>
						<div class="num"><span>1</span><i class="triangle_topleft"></i></div>
						<div class="arrow"><span></span></div>
					</li>
					<li class="con2">
						<a href="javascript:void(0);">
							<div class="con_icon"></div>
							<h2>提交入驻资料</h2>
							<p>签署入驻协议</p>
							<p>提交个人/企业资质信息</p>
						</a>
						<div class="num"><span>2</span><i class="triangle_topleft"></i></div>
						<div class="arrow"><span></span></div>
					</li>
					<li class="con3">
						<a href="javascript:void(0);">
							<div class="con_icon"></div>
							<h2>等待审核</h2>
							<p>等待平台工作</p>
							<p>人员审核相关资质</p>
						</a>
						<div class="num"><span>3</span><i class="triangle_topleft"></i></div>
						<div class="arrow"><span></span></div>
					</li>
					<li class="con4">
						<a href="javascript:void(0);">
							<div class="con_icon"></div>
							<h2>缴纳保证金</h2>
							<p>缴纳保证金</p>
							<p>提交缴纳相关凭据</p>
						</a>
						<div class="num"><span>4</span><i class="triangle_topleft"></i></div>
						<div class="arrow"><span></span></div>
					</li>
					<li class="con5">
						<a href="javascript:void(0);">
							<div class="con_icon"></div>
							<h2>店铺开通</h2>
							<p>开通店铺</p>
							<p>登录卖家管理中心发布商品</p>
						</a>
						<div class="num"><span>5</span><i class="triangle_topleft"></i></div>
						<div class="arrow"><span></span></div>
					</li>
				</ul>
			</div>
			<div class="s_join_btn">
				<a href="<?php echo urlShop('store_joinin', 'step0');?>">我要入驻</a>
			</div>
			
			<div class="s_hot_class">
			<div class="s_hot_head">
				<div class="head_l">
					<h2>热招类目</h2>
				</div>
				<div class="head_r">
					<h2>店主之家</h2>
					<span class="more"><a href="<?php echo SHOP_SITE_URL;?>/index.php?act=article&op=article&ac_id=3">更多公告<i class="jt">&gt;</i></a></span>
				</div>
			</div>
			<div class="s_hot_con">
				<div class="con_l">
					<ul>
					    <?php if($output['goods_class']&&is_array($output['goods_class'])) {?>
					    <?php foreach ($output["goods_class"] as $good_class) {?>
						<li><a href="<?php echo urlShop("search","index",array("cate_id"=>$good_class['gc_id']))?>"><?php echo $good_class['gc_name']?></a></li>
						<?php }?>
						<?php }?>
					</ul>
				</div>
				<div class="con_r">
					<ul>
												<li><em class="time">06-30</em><a href="<?php echo SHOP_SITE_URL;?>/index.php?act=article&op=show&article_id=15" title="如何开店">如何开店</a></li>
												<li><em class="time">06-30</em><a href="<?php echo SHOP_SITE_URL;?>/index.php?act=article&op=show&article_id=11" title="店铺管理">店铺管理</a></li>
												<li><em class="time">10-16</em><a href="<?php echo SHOP_SITE_URL;?>/index.php?act=article&op=show&article_id=12" title="售中商品">售中商品</a></li>
												<li><em class="time">10-20</em><a href="<?php echo SHOP_SITE_URL;?>/index.php?act=article&op=show&article_id=14" title="商品促销">商品促销</a></li>
												<li><em class="time">10-21</em><a href="<?php echo SHOP_SITE_URL;?>/index.php?act=article&op=show&article_id=42" title="在线交易">在线交易</a></li>
												<li><em class="time">10-26</em><a href="<?php echo SHOP_SITE_URL;?>/index.php?act=article&op=show&article_id=44" title="免责声明">免责声明</a></li>
											</ul>
				</div>
			</div>
		</div>
  <h2 class="index-title">入驻指南</h2>
  <div class="joinin-info">
    <ul class="tabs-nav">
      <?php if(!empty($output['help_list']) && is_array($output['help_list'])){ $i = 0;?>
      <?php foreach($output['help_list'] as $key => $val){ $i++;?>
      <li class="<?php echo $i==1 ? 'tabs-selected':'';?>">
        <h3><?php echo $val['help_title'];?></h3>
      </li>
      <?php } ?>
      <?php } ?>
    </ul>
      <?php if(!empty($output['help_list']) && is_array($output['help_list'])){ $i = 0;?>
      <?php foreach($output['help_list'] as $key => $val){ $i++;?>
    <div class="tabs-panel <?php echo $i==1 ? '':'tabs-hide';?>"><?php echo $val['help_info'];?></div>
      <?php } ?>
      <?php } ?>
  </div>
</div>
<script>
$(document).ready(function(){
	$("#login_form ").validate({
        errorPlacement: function(error, element){
            var error_td = element.parent('dd');
            error_td.find('label').hide();
            error_td.append(error);
        },
		rules: {
			user_name: "required",
			password: "required"
			<?php if(C('captcha_status_login') == '1') { ?>
            ,captcha : {
                required : true,
                minlength: 4,
                remote   : {
                    url : '<?php echo SHOP_SITE_URL?>/index.php?act=seccode&op=check&nchash=<?php echo getNchash();?>',
                    type: 'get',
                    data:{
                        captcha : function(){
                            return $('#captcha').val();
                        }
                    }
                }
            }
			<?php } ?>
		},
		messages: {
			user_name: "<?php echo $lang['login_index_input_username'];?>",
			password: "<?php echo $lang['login_index_input_password'];?>"
			<?php if(C('captcha_status_login') == '1') { ?>
            ,captcha : {
                required : '<?php echo $lang['login_index_input_checkcode'];?>',
                minlength: '<?php echo $lang['login_index_input_checkcode'];?>',
				remote	 : '<?php echo $lang['login_index_wrong_checkcode'];?>'
            }
			<?php } ?>
		}
	});
});
</script>
<?php if( $pic_n > 1) { ?>
<script type="text/javascript" src="<?php echo SHOP_RESOURCE_SITE_URL;?>/js/home_index.js" charset="utf-8"></script>
<?php }else { ?>
<script>
$(document).ready(function(){
    $(".tabs-nav > li > h3").bind('mouseover', (function(e) {
    	if (e.target == this) {
    		var tabs = $(this).parent().parent().children("li");
    		var panels = $(this).parent().parent().parent().children(".tabs-panel");
    		var index = $.inArray(this, $(this).parent().parent().find("h3"));
    		if (panels.eq(index)[0]) {
    			tabs.removeClass("tabs-selected").eq(index).addClass("tabs-selected");
    			panels.addClass("tabs-hide").eq(index).removeClass("tabs-hide");
    		}
    	}
    }));
});
</script>
<?php } ?>
