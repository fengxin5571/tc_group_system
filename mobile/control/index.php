<?php
/**
 * 首页
 *
 * @好商城V4 (c) 2015-2016 33hao Inc.
 * @license    http://www.33hao.com
 * @link       交流群号：216611541
 * @since      好商城提供技术支持 授权请购买shopnc授权
 */

defined('InShopNC') or exit('Access Invalid!');
class indexControl extends mobileHomeControl{

	public function __construct() {
        parent::__construct();
        
    }

    /**
     * 首页
     */
	public function indexOp() {
        $model_mb_special = Model('mb_special'); 
        $data = $model_mb_special->getMbSpecialIndex();
        $data[]["nav_list"]['nav']=rkcache('nav',true);//获取导航
        $this->_output_special($data, $_GET['type']);
       
	}

    /**
     * 专题
     */
	public function specialOp() {
        $model_mb_special = Model('mb_special'); 
        $data = $model_mb_special->getMbSpecialItemUsableListByID($_GET['special_id']);
        $data[]["nav_list"]['nav']=rkcache('nav',true);//获取导航
        $article_class_model	= Model('article_class');
        $article_model	= Model('article');
        $condition	= array();
        $child_class_list = $article_class_model->getChildClass(14);
        $ac_ids	= array();
        if(!empty($child_class_list) && is_array($child_class_list)){
            foreach ($child_class_list as $v){
                $ac_ids[]	= $v['ac_id'];
            }
        }
        $ac_ids	= implode(',',$ac_ids);
        $condition['ac_ids']	= $ac_ids;
        $condition['article_show']	= '1';
        $condition['article_recommend']	= '1';
        $condition['limit']	= '5';
        
        $article_list = $article_model->getArticleList($condition);
        foreach($article_list as &$v){
            $v['article_content']=str_cut(strip_tags($v['article_content']),70,"...");
            $v['article_title']=str_cut($v['article_title'], 30);
            $v['article_time']=date("Y-m-d ",$v['article_time']);
        }
        $data[]['article_list']['article']=$article_list;
        $data[]['rec_list']['rec']=array(rec(19,2),rec(18,2),rec(17,2));
        $this->_output_special($data, $_GET['type'], $_GET['special_id']);
	}

    /**
     * 输出专题
     */
    private function _output_special($data, $type = 'json', $special_id = 0) {
        $model_special = Model('mb_special');
        if($_GET['type'] == 'html') {
            $html_path = $model_special->getMbSpecialHtmlPath($special_id);
            if(!is_file($html_path)) {
                ob_start();
                Tpl::output('list', $data);
                Tpl::showpage('mb_special');
                file_put_contents($html_path, ob_get_clean());
            }
            header('Location: ' . $model_special->getMbSpecialHtmlUrl($special_id));
            die;
        } else {
            output_data($data);
        }
    }

    /**
     * android客户端版本号
     */
    public function apk_versionOp() {
		$version = C('mobile_apk_version');
		$url = C('mobile_apk');
        if(empty($version)) {
           $version = '';
        }
        if(empty($url)) {
            $url = '';
        }

        output_data(array('version' => $version, 'url' => $url));
    }

    /**
     * 默认搜索词列表
     */
    public function search_key_listOp() {
        $list = @explode(',',C('hot_search'));
        if (!$list || !is_array($list)) { 
            $list = array();
        }
        if ($_COOKIE['hisSearch'] != '') {
            $his_search_list = explode('~', $_COOKIE['hisSearch']);
        }
        if (!$his_search_list || !is_array($his_search_list)) {
            $his_search_list = array();
        }
        output_data(array('list'=>$list,'his_list'=>$his_search_list));
    } 
	/**
     * 热门搜索列表
     */
    public function search_hot_infoOp() {
        if (C('rec_search') != '') {
            $rec_search_list = @unserialize(C('rec_search'));
        }
        $rec_search_list = is_array($rec_search_list) ? $rec_search_list : array();
        $result = $rec_search_list[array_rand($rec_search_list)];
        output_data(array('hot_info'=>$result ? $result : array()));
    }
	/**
     * 高级搜索
     */
    public function search_advOp() {
		
		$gc_id = intval($_GET['gc_id']);
		 
        $area_list = Model('area')->getAreaList(array('area_deep'=>1),'area_id,area_name');
        if (C('contract_allow') == 1) {
            $contract_list = Model('contract')->getContractItemByCache();
            $_tmp = array();$i = 0;
            foreach ($contract_list as $k => $v) {
                $_tmp[$i]['id'] = $v['cti_id'];
                $_tmp[$i]['name'] = $v['cti_name'];
                $i++;
            }
        }
        output_data(array('area_list'=>$area_list ? $area_list : array(),'contract_list'=>$_tmp));
    }
    /*
     * 扫码送积分入口
     */
    public function pointsOp(){
        echo "<script>location.href='/wap/guide.html'</script>";
    }
}
