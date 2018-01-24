<?php
/**
 * 集团页面导航管理
 *
 *
 *
 **by 太常系统 www.sxtaichang.com*/

defined('InShopNC') or exit('Access Invalid!');
class groupnavigationControl extends SystemControl{
	public function __construct(){
		parent::__construct();
		Language::read('navigation');
	}

	/**
	 * 页面导航
	 */
	public function groupnavigationOp(){
		$lang	= Language::getLangContent();
		$model_navigation = Model('navigation');
		/**
		 * 删除
		 */
		if (chksubmit()){
			if (is_array($_POST['del_id']) && !empty($_POST['del_id'])){
				$del_str=implode(',',$_POST['del_id']);
				$where  = "where nav_id in (".$del_str.")";
			    Db::delete("navigation",$where);
			    dkcache('nav');
			    $this->log(L('navigation_index_del_succ').'[ID:'.$del_str.']',null);
				showMessage($lang['navigation_index_del_succ']);
			}else {
				showMessage($lang['navigation_index_choose_del']);
			}
		}
		/**
		 * 检索条件
		 */
		$condition['like_nav_title'] = trim($_GET['search_nav_title']);
		$condition['nav_location'] = 4;
		$condition['order'] = 'nav_sort asc';
		/**
		 * 分页
		 */
		$page	= new Page();
		$page->setEachNum(10);
		$page->setStyle('admin');
		$navigation_list = $model_navigation->getNavigationList($condition,$page);
		/**
		 * 整理内容
		 */
		if (is_array($navigation_list)){
			foreach ($navigation_list as $k => $v){
				switch ($v['nav_location']){
					case '0':
						$navigation_list[$k]['nav_location'] = $lang['navigation_index_top'];
						break;
					case '1':
						$navigation_list[$k]['nav_location'] = $lang['navigation_index_center'];
						break;
					case '2':
						$navigation_list[$k]['nav_location'] = $lang['navigation_index_bottom'];
						break;
					case '3':
					    $navigation_list[$k]['nav_location'] = $lang['navigation_index_self'];
					    break;
				    case '4':
				        $navigation_list[$k]['nav_location'] = $lang['navigation_group_index_nav'];
				        break;
				}
				switch ($v['nav_new_open']){
					case '0':
						$navigation_list[$k]['nav_new_open'] = $lang['nc_no'];
						break;
					case '1':
						$navigation_list[$k]['nav_new_open'] = $lang['nc_yes'];
						break;
				}
			}
		}

		Tpl::output('navigation_list',$navigation_list);
		Tpl::output('page',$page->show());
		Tpl::output('search_nav_title',trim($_GET['search_nav_title']));
		Tpl::output('search_nav_location',trim($_GET['search_nav_location']));
		Tpl::showpage('groupnavigation.index');
	}

	/**
	 * 页面导航 添加
	 */
	public function navigation_addOp(){
		$lang	= Language::getLangContent();
		$model_navigation = Model('navigation');
		if (chksubmit()){
			/**
			 * 验证
			 */
			$obj_validate = new Validate();
			$obj_validate->validateparam = array(
				array("input"=>$_POST["nav_title"], "require"=>"true", "message"=>$lang['navigation_add_partner_null']),
				array("input"=>$_POST["nav_sort"], "require"=>"true", 'validator'=>'Number', "message"=>$lang['navigation_add_sort_int']),
			);
			switch ($_POST['nav_type']){
				/**
				 * 自定义
				 */
				case '0':
					//$obj_validate->setValidate(array("input"=>$_POST["nav_url"], 'validator'=>'Url', "message"=>$lang['navigation_add_url_wrong']));
					break;
				/**
				 * 商品分类
				 */
				case '1':
					$obj_validate->setValidate(array("input"=>$_POST["goods_class_id"], "require"=>"true", "message"=>$lang['navigation_add_goods_class_null']));
					break;
				/**
				 * 文章分类
				 */
				case '2':
					$obj_validate->setValidate(array("input"=>$_POST["article_class_id"], "require"=>"true", "message"=>$lang['navigation_add_article_class_null']));
					break;
				/**
				 * 活动
				 */
				case '3':
					$obj_validate->setValidate(array("input"=>$_POST["activity_id"], "require"=>"true", "message"=>$lang['navigation_add_activity_null']));
					break;
				/**
				 * 视频分类
				 */
				case '4':
				    $obj_validate->setValidate(array("input"=>$_POST["video_class_id"], "require"=>"true", "message"=>$lang['navigation_add_video_class_null']));
				    break;
			}

			$error = $obj_validate->validate();
			if ($error != ''){
				showMessage($error);
			}else {

				$insert_array = array();
				$insert_array['nav_type'] = trim($_POST['nav_type']);
				$insert_array['nav_title'] = trim($_POST['nav_title']);
				$insert_array['nav_location'] = trim($_POST['nav_location']);
				$insert_array['nav_new_open'] = trim($_POST['nav_new_open']);
				$insert_array['nav_sort'] = trim($_POST['nav_sort']);
				switch ($_POST['nav_type']){
					/**
					 * 自定义
					 */
					case '0':
						$insert_array['nav_url'] = trim($_POST['nav_url']);
						break;
					/**
					 * 商品分类
					 */
					case '1':
						$insert_array['item_id'] = intval($_POST['goods_class_id']);
						break;
					/**
					 * 文章分类
					 */
					case '2':
						$insert_array['item_id'] = intval($_POST['article_class_id']);
						break;
					/**
					 * 活动
					 */
					case '3':
						$insert_array['item_id'] = intval($_POST['activity_id']);
						break;
					/**
					 * 视频分类
					 */
					case '4':
					    $insert_array['item_id'] = intval($_POST['video_class_id']);
					    break;
				}

				$result = $model_navigation->add($insert_array);
				if ($result){
					dkcache('nav');
					$url = array(
						array(
							'url'=>'index.php?act=groupnavigation&op=navigation_add',
							'msg'=>$lang['navigation_add_again'],
						),
						array(
							'url'=>'index.php?act=groupnavigation&op=groupnavigation',
							'msg'=>$lang['navigation_add_back_to_list'],
						)
					);
					$this->log(L('navigation_add_succ').'['.$_POST['nav_title'].']',null);
					showMessage($lang['navigation_add_succ'],$url);
				}else {
					showMessage($lang['navigation_add_fail']);
				}
			}
		}
		/**
		 * 商品分类
		 */
		$model_goods_class = Model('goods_class');
		$goods_class_list = $model_goods_class->getTreeClassList(3);
		if (is_array($goods_class_list)){
			foreach ($goods_class_list as $k => $v){
				$goods_class_list[$k]['gc_name'] = str_repeat("&nbsp;",$v['deep']*2).$v['gc_name'];
			}
		}
		/**
		 * 文章分类
		 */
		$model_article_class = Model('article_class');
		$article_class_list = $model_article_class->getTreeClassList(2);
		if (is_array($article_class_list)){
			foreach ($article_class_list as $k => $v){
				$article_class_list[$k]['ac_name'] = str_repeat("&nbsp;",$v['deep']*2).$v['ac_name'];
			}
		}
		/**
		 * 视频分类
		 */
		$model_video_class = Model('video_class');
		$video_class_list = $model_video_class->getTreeClassList(2);
		if (is_array($video_class_list)){
		    foreach ($video_class_list as $k => $v){
		        $video_class_list[$k]['vd_name'] = str_repeat("&nbsp;",$v['deep']*2).$v['vd_name'];
		    }
		}
		/**
		 * 活动
		 */
		$activity	= Model('activity');
		$activity_list	= $activity->getList(array('opening'=>true,'order'=>'activity.activity_sort'));
		Tpl::output('activity_list',$activity_list);
		Tpl::output('goods_class_list',$goods_class_list);
		Tpl::output('article_class_list',$article_class_list);
		Tpl::output('video_class_list',$video_class_list);
		Tpl::output("group_navigation","1");
		Tpl::showpage('navigation.add');
	}

	/**
	 * 页面导航 编辑
	 */
	public function navigation_editOp(){
		$lang	= Language::getLangContent();
		$model_navigation = Model('navigation');
		if (chksubmit()){
			/**
			 * 验证
			 */
			$obj_validate = new Validate();
			$obj_validate->validateparam = array(
				array("input"=>$_POST["nav_title"], "require"=>"true", "message"=>$lang['navigation_add_partner_null']),
				array("input"=>$_POST["nav_sort"], "require"=>"true", 'validator'=>'Number', "message"=>$lang['navigation_add_sort_int']),
			);
			switch ($_POST['nav_type']){
				/**
				 * 自定义
				 */
				case '0':
					//$obj_validate->setValidate(array("input"=>$_POST["nav_url"], 'validator'=>'Url', "message"=>$lang['navigation_add_url_wrong']));
					break;
				/**
				 * 商品分类
				 */
				case '1':
					$obj_validate->setValidate(array("input"=>$_POST["goods_class_id"], "require"=>"true", "message"=>$lang['navigation_add_goods_class_null']));
					break;
				/**
				 * 文章分类
				 */
				case '2':
					$obj_validate->setValidate(array("input"=>$_POST["article_class_id"], "require"=>"true", "message"=>$lang['navigation_add_article_class_null']));
					break;
				/**
				 * 视频分类
				 */
				case '4':
				    $obj_validate->setValidate(array("input"=>$_POST["video_class_id"], "require"=>"true", "message"=>$lang['navigation_add_video_class_null']));
				    break;
			}

			$error = $obj_validate->validate();
			if ($error != ''){
				showMessage($error);
			}else {

				$update_array = array();
				$update_array['nav_id'] = intval($_POST['nav_id']);
				$update_array['nav_type'] = trim($_POST['nav_type']);
				$update_array['nav_title'] = trim($_POST['nav_title']);
				$update_array['nav_location'] = trim($_POST['nav_location']);
				$update_array['nav_new_open'] = trim($_POST['nav_new_open']);
				$update_array['nav_sort'] = trim($_POST['nav_sort']);
				switch ($_POST['nav_type']){
					/**
					 * 自定义
					 */
					case '0':
						$update_array['nav_url'] = trim($_POST['nav_url']);
						break;
					/**
					 * 商品分类
					 */
					case '1':
						$update_array['item_id'] = intval($_POST['goods_class_id']);
						break;
					/**
					 * 文章分类
					 */
					case '2':
						$update_array['item_id'] = intval($_POST['article_class_id']);
						break;
					/**
					 * 活动
					 */
					case '3':
						$update_array['item_id'] = intval($_POST['activity_id']);
						break;
					/**
					 * 视频分类
					 */
					case '4':
					    $update_array['item_id'] = intval($_POST['video_class_id']);
					    break;
				}
				$result = $model_navigation->update($update_array);
				if ($result){
					dkcache('nav');
					$url = array(
						array(
							'url'=>'index.php?act=groupnavigation&op=navigation_edit&nav_id='.intval($_POST['nav_id']),
							'msg'=>$lang['navigation_edit_again'],
						),
						array(
							'url'=>'index.php?act=groupnavigation&op=groupnavigation',
							'msg'=>$lang['navigation_add_back_to_list'],
						)
					);
					$this->log(L('navigation_edit_succ').'['.$_POST['nav_title'].']',null);
					showMessage($lang['navigation_edit_succ'],$url);
				}else {
					showMessage($lang['navigation_edit_fail']);
				}
			}
		}
		$navigation_array = $model_navigation->getOneNavigation(intval($_GET['nav_id']));
		if (empty($navigation_array)){
			showMessage($lang['param_error']);
		}

		/**
		 * 商品分类
		 */
		$model_goods_class = Model('goods_class');
		$goods_class_list = $model_goods_class->getTreeClassList(3);
		if (is_array($goods_class_list)){
			foreach ($goods_class_list as $k => $v){
				$goods_class_list[$k]['gc_name'] = str_repeat("&nbsp;",$v['deep']*2).$v['gc_name'];
			}
		}
		/**
		 * 文章分类
		 */
		$model_article_class = Model('article_class');
		$article_class_list = $model_article_class->getTreeClassList(2);
		if (is_array($article_class_list)){
			foreach ($article_class_list as $k => $v){
				$article_class_list[$k]['ac_name'] = str_repeat("&nbsp;",$v['deep']*2).$v['ac_name'];
			}
		}
		/**
		 * 视频分类
		 */
		$model_video_class = Model('video_class');
		$video_class_list = $model_video_class->getTreeClassList(2);
		if (is_array($video_class_list)){
		    foreach ($video_class_list as $k => $v){
		        $video_class_list[$k]['vd_name'] = str_repeat("&nbsp;",$v['deep']*2).$v['vd_name'];
		    }
		}
		/**
		 * 活动
		 */
		$activity	= Model('activity');
		$activity_list	= $activity->getList(array('opening'=>true,'order'=>'activity.activity_sort'));
		Tpl::output('activity_list',$activity_list);
		Tpl::output('navigation_array',$navigation_array);
		Tpl::output('goods_class_list',$goods_class_list);
		Tpl::output('article_class_list',$article_class_list);
		Tpl::output('video_class_list',$video_class_list);
		Tpl::output("group_navigation",1);
		Tpl::showpage('navigation.edit');
	}

	/**
	 * 删除页面导航
	 */
	public function navigation_delOp(){
		$lang	= Language::getLangContent();
		$model_navigation = Model('navigation');
		if (intval($_GET['nav_id']) > 0){
			$model_navigation->del(intval($_GET['nav_id']));
			dkcache('nav');
			$this->log(L('navigation_edit_succ').'[ID:'.intval($_GET['nav_id']).']',null);
			showMessage($lang['navigation_index_del_succ'],'index.php?act=groupnavigation&op=groupnavigation');
		}else {
			showMessage($lang['navigation_index_choose_del'],'index.php?act=groupnavigation&op=groupnavigation');
		}
	}

	/**
	 * ajax操作
	 */
	public function ajaxOp(){
		switch ($_GET['branch']){
			/**
			 * 页面导航 排序
			 */
			case 'nav_sort':
				$model_navigation = Model('navigation');
				$update_array = array();
				$update_array['nav_id'] = intval($_GET['id']);
				$update_array[$_GET['column']] = trim($_GET['value']);
				$result = $model_navigation->update($update_array);
				dkcache('nav');
				echo 'true';exit;
				break;
		}
	}
}
