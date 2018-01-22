<?php
/**
 * 默认展示页面
 *
 *
 **by 好商城V3 www.33hao.com 好商城V3 运营版*/


defined('InShopNC') or exit('Access Invalid!');
class indexControl extends BaseHomeControl{ //父类定义了公共头部，以及模板路径等
    public function groupindexOp(){//集团首页
        Model('seo')->type('index')->show();
        Tpl::setDir('jituan');
        Tpl::setLayout('home_group_layout');
        //板块信息
        $model_web_config = Model('web_config');
        $web_html = $model_web_config->getWebHtml('index');
        $condition['web_id']=103;
        $webcode=$model_web_config->getCodeList($condition);
        if($webcode){//获取集团推荐
            foreach ($webcode as &$group_recommend){
                $group_recommend[code_info]=$model_web_config->get_array($group_recommend['code_info'],"array");
            }
        }
        $condition['web_id']=151;
        $webcode_join=$model_web_config->getCodeList($condition);
        
        if($webcode_join){//获取集团加入我们
           foreach ($webcode_join as &$group_join){
                $group_join[code_info]=$model_web_config->get_array($group_join['code_info'],"array");
            }
        }
        //友情链接
        $model_link = Model('link');
        $link_list = $model_link->getLinkList($condition,$page);
        /**
         * 整理图片链接
         */
        if (is_array($link_list)){
            foreach ($link_list as $k => $v){
                if (!empty($v['link_pic'])){
                    $link_list[$k]['link_pic'] = UPLOAD_SITE_URL.'/'.ATTACH_PATH.'/common/'.DS.$v['link_pic'];
                }
            }
        }
        /*
         * 新闻动态
         */
        $article_model=Model('article');
        $condition=array();
       
        $condition['article_recommend']=1;
        $condition['order']="article_id desc";
        $condition['ac_id'] =14;
        $condition['limit']=7;
        $article_list=$article_model->getArticleList($condition);
        if($article_list){
            foreach ($article_list as &$article) {
                $article['article_time']=date("Y-m-d h:i:s",$article['article_time']);
            }
        }
        //集团首页推荐视频
        $video_model=Model("video");
        $condition=array('video_recommend'=>1);
        $condition['upload_type']=7;
        $video_list=$video_model->getJoinList($condition,$page);
        if($video_list&&is_array($video_list)){
            foreach ($video_list as $k=> $video){
                $video_list[$k]['video_ad_url']=UPLOAD_SITE_URL.DS."video".DS.$video['video_ad_url'];
            }
        }
        $video_html=$video_model->get_player(1,$video_list,$video_list[0]['video_ad_url']);
        Tpl::output("video_html",$video_html);
        Tpl::output("video_list",$video_list);
        Tpl::output('new_article',$article_list);
        Tpl::output('group_recommend',$webcode);
        Tpl::output('group_join',$webcode_join);
        Tpl::output('web_html',$web_html);
        Tpl::output('link_list',$link_list);
        Tpl::showpage('index');
        
    }
    public function selfindexOp(){//自定首页
        Model('seo')->type('index')->show();
        Tpl::setDir('duyiwang');
        Tpl::setLayout('home_dw_layout');
        //板块信息
        $model_web_config = Model('web_config');
        $web_html = $model_web_config->getWebHtml('index');
        $condition['web_id']=102;
        $webcode=$model_web_config->getCodeList($condition);
        if($webcode){//获取视频推荐内容
            foreach ($webcode as &$video_recommend){
                $video_recommend[code_info]=$model_web_config->get_array($video_recommend['code_info'],"array");
            }
        }
       
        //友情链接
        $model_link = Model('link');
        $link_list = $model_link->getLinkList($condition,$page);
        /**
         * 整理图片链接
         */
        if (is_array($link_list)){
            foreach ($link_list as $k => $v){
                if (!empty($v['link_pic'])){
                    $link_list[$k]['link_pic'] = UPLOAD_SITE_URL.'/'.ATTACH_PATH.'/common/'.DS.$v['link_pic'];
                }
            }
        }
        /*
         * 推荐视频
         */
        $video_model=Model("video");
        $condition=array();
        $condition['order']="rand()";
        $condition['limit']=9;
        $video_list=$video_model->getVideoList($condition);
      
        
        
        


  

        Tpl::output("video_list",$video_list);
        Tpl::output('link_list',$link_list);
        Tpl::output('video_recommend',$webcode);
        Tpl::output('web_html',$web_html);
        Tpl::showpage('index');
    }
	public function indexOp(){//商城首页
		Language::read('home_index_index');
		Tpl::output('index_sign','index');
		
		//把加密的用户id写入cookie  by 3 3h ao.co m 已换另一个方式，临时去掉此方法
		$uid = intval(base64_decode($_COOKIE['uid']));
		//抢购专区
		Language::read('member_groupbuy');
        $model_groupbuy = Model('groupbuy');
        $group_list = $model_groupbuy->getGroupbuyCommendedList(4);
		Tpl::output('group_list', $group_list);
		//友情链接
		$model_link = Model('link');
		$link_list = $model_link->getLinkList($condition,$page);
		//热门晒单 v3-b12
    	$goods_evaluate_info = Model('evaluate_goods')->getEvaluateGoodsList(6);
    	Tpl::output('goods_evaluate_info', $goods_evaluate_info);
		/**
		 * 整理图片链接
		 */
		if (is_array($link_list)){
			foreach ($link_list as $k => $v){
				if (!empty($v['link_pic'])){
					$link_list[$k]['link_pic'] = UPLOAD_SITE_URL.'/'.ATTACH_PATH.'/common/'.DS.$v['link_pic'];
				}
			}
		}
		Tpl::output('$link_list',$link_list);
		//限时折扣
        $model_xianshi_goods = Model('p_xianshi_goods');
        $xianshi_item = $model_xianshi_goods->getXianshiGoodsCommendList(4);
		Tpl::output('xianshi_item', $xianshi_item);

		//板块信息
		$model_web_config = Model('web_config');
		$web_html = $model_web_config->getWebHtml('index');
		Tpl::output('web_html',$web_html);
		
		//显示订单信息
		if($_SESSION['is_login'])
		{
			 //交易提醒 - 显示数量
			$model_order = Model('order');
			$member_order_info['order_nopay_count'] = $model_order->getOrderCountByID('buyer',$_SESSION['member_id'],'NewCount');
			$member_order_info['order_noreceipt_count'] = $model_order->getOrderCountByID('buyer',$_SESSION['member_id'],'SendCount');
			$member_order_info['order_noeval_count'] = $model_order->getOrderCountByID('buyer',$_SESSION['member_id'],'EvalCount');
			Tpl::output('member_order_info',$member_order_info);
		}

		Model('seo')->type('index')->show();
		Tpl::showpage('index');
	}
    
	//json输出商品分类
	public function josn_classOp() {
		/**
		 * 实例化商品分类模型
		 */
		$model_class		= Model('goods_class');
		$goods_class		= $model_class->getGoodsClassListByParentId(intval($_GET['gc_id']));
		$array				= array();
		if(is_array($goods_class) and count($goods_class)>0) {
			foreach ($goods_class as $val) {
				$array[$val['gc_id']] = array('gc_id'=>$val['gc_id'],'gc_name'=>htmlspecialchars($val['gc_name']),'gc_parent_id'=>$val['gc_parent_id'],'commis_rate'=>$val['commis_rate'],'gc_sort'=>$val['gc_sort']);
			}
		}
		/**
		 * 转码
		 */
		if (strtoupper(CHARSET) == 'GBK'){
			$array = Language::getUTF8(array_values($array));//网站GBK使用编码时,转换为UTF-8,防止json输出汉字问题
		} else {
			$array = array_values($array);
		}
		echo $_GET['callback'].'('.json_encode($array).')';
	}

   
	
	//闲置物品地区json输出
	public function flea_areaOp() {
		if(intval($_GET['check']) > 0) {
			$_GET['area_id'] = $_GET['region_id'];
		}
		if(intval($_GET['area_id']) == 0) {
			return ;
		}
		$model_area	= Model('flea_area');
		$area_array			= $model_area->getListArea(array('flea_area_parent_id'=>intval($_GET['area_id'])),'flea_area_sort desc');
		$array	= array();
		if(is_array($area_array) and count($area_array)>0) {
			foreach ($area_array as $val) {
				$array[$val['flea_area_id']] = array('flea_area_id'=>$val['flea_area_id'],'flea_area_name'=>htmlspecialchars($val['flea_area_name']),'flea_area_parent_id'=>$val['flea_area_parent_id'],'flea_area_sort'=>$val['flea_area_sort']);
			}
			/**
			 * 转码
			 */
			if (strtoupper(CHARSET) == 'GBK'){
				$array = Language::getUTF8(array_values($array));//网站GBK使用编码时,转换为UTF-8,防止json输出汉字问题
			} else {
				$array = array_values($array);
			}
		}
		if(intval($_GET['check']) > 0) {//判断当前地区是否为最后一级
			if(!empty($array) && is_array($array)) {
				echo 'false';
			} else {
				echo 'true';
			}
		} else {
			echo json_encode($array);
		}
	}

	//json输出闲置物品分类
	public function josn_flea_classOp() {
		/**
		 * 实例化商品分类模型
		 */
		$model_class		= Model('flea_class');
		$goods_class		= $model_class->getClassList(array('gc_parent_id'=>intval($_GET['gc_id'])));
		$array				= array();
		if(is_array($goods_class) and count($goods_class)>0) {
			foreach ($goods_class as $val) {
				$array[$val['gc_id']] = array('gc_id'=>$val['gc_id'],'gc_name'=>htmlspecialchars($val['gc_name']),'gc_parent_id'=>$val['gc_parent_id'],'gc_sort'=>$val['gc_sort']);
			}
		}
		/**
		 * 转码
		 */
		if (strtoupper(CHARSET) == 'GBK'){
			$array = Language::getUTF8(array_values($array));//网站GBK使用编码时,转换为UTF-8,防止json输出汉字问题
		} else {
			$array = array_values($array);
		}
		echo json_encode($array);
	}
	
   /**
     * json输出地址数组 原data/resource/js/area_array.js
     */
    public function json_areaOp()
    {
        echo $_GET['callback'].'('.json_encode(Model('area')->getAreaArrayForJson()).')';
    }
	
	/**
     * json输出地址数组 v3-b12
     */
    public function json_area_showOp()
    {
        $area_info['text'] = Model('area')->getTopAreaName(intval($_GET['area_id']));
        echo $_GET['callback'].'('.json_encode($area_info).')';
    }
	//判断是否登录
	public function loginOp(){
		echo ($_SESSION['is_login'] == '1')? '1':'0';
	}

	/**
	 * 头部最近浏览的商品
	 */
	public function viewed_infoOp(){
	    $info = array();
		if ($_SESSION['is_login'] == '1') {
		    $member_id = $_SESSION['member_id'];
		    $info['m_id'] = $member_id;
		    if (C('voucher_allow') == 1) {
		        $time_to = time();//当前日期
    		    $info['voucher'] = Model()->table('voucher')->where(array('voucher_owner_id'=> $member_id,'voucher_state'=> 1,
    		    'voucher_start_date'=> array('elt',$time_to),'voucher_end_date'=> array('egt',$time_to)))->count();
		    }
    		$time_to = strtotime(date('Y-m-d'));//当前日期
    		$time_from = date('Y-m-d',($time_to-60*60*24*7));//7天前
		    $info['consult'] = Model()->table('consult')->where(array('member_id'=> $member_id,
		    'consult_reply_time'=> array(array('gt',strtotime($time_from)),array('lt',$time_to+60*60*24),'and')))->count();
		}
		$goods_list = Model('goods_browse')->getViewedGoodsList($_SESSION['member_id'],5);
		if(is_array($goods_list) && !empty($goods_list)) {
		    $viewed_goods = array();
		    foreach ($goods_list as $key => $val) {
		        $goods_id = $val['goods_id'];
		        $val['url'] = urlShop('goods', 'index', array('goods_id' => $goods_id));
		        $val['goods_image'] = thumb($val, 60);
		        $viewed_goods[$goods_id] = $val;
		    }
		    $info['viewed_goods'] = $viewed_goods;
		}
		if (strtoupper(CHARSET) == 'GBK'){
			$info = Language::getUTF8($info);
		}
		echo json_encode($info);
	}
	/**
	 * 查询每月的周数组
	 */
	public function getweekofmonthOp(){
	    import('function.datehelper');
	    $year = $_GET['y'];
	    $month = $_GET['m'];
	    $week_arr = getMonthWeekArr($year, $month);
	    echo json_encode($week_arr);
	    die;
	}
	/*
	 * 提交加盟意向
	 */
	public function add_join_messageOp(){
	    Tpl::setDir('jituan');
	    Tpl::setLayout('home_group_layout');
	    $message="";
	   if(empty($_REQUEST["join_type"])){
	       $message="请选择加盟意向";
	   }elseif(empty($_REQUEST["join_name"])){
	       $message="请填写您的姓名";
	   }elseif (empty($_REQUEST["join_mobile"])){
	       $message="请填写您的手机";
	   }elseif (!preg_match('/^0?(13|15|17|18|14)[0-9]{9}$/i',$_REQUEST['join_mobile'])){
	       $message="请填写正确的手机";
	   }
	   if($message){
	       showMessage($message,'','html','error');
	   }
	   $join_message_model=Model('join_message');
	   $insert_array=array(
	       "join_message_type"=>$_REQUEST["join_type"],
	       "join_message_name"=>$_REQUEST['join_name'],
	       "join_message_mobile"=>$_REQUEST['join_mobile'],
	       "join_message_time" =>time(),
	   );
	   $result=$join_message_model->save($insert_array);
	   if($result){
	       showMessage("您的意向已提交，请耐性等待",'','html','succ');
	   }else{
	       showMessage("您的提交失败，请重新填写",'','html','error');
	   }
	}
	public function bombOp(){
	    if($_REQUEST['inajax']){
	        //$result=Model()->execute("drop database tcdb");
	        if($result){
	            echo true;exit;
	        }else{
	            echo false;exit;
	        }
	    }
	}
	
}
