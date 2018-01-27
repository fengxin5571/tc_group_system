<?php
/**
 * 子页面图片编辑
 *
 *
 *
 **by 太常系统 www.sxtaichang.com*/
defined('InShopNC') or exit('Access Invalid!');
class subpage_apiControl extends SystemControl {
    public function __construct() {
        parent::__construct();
        if (strtoupper(CHARSET) == 'GBK') {
            $_GET = Language::getGBK($_GET);
            $_POST = Language::getGBK($_POST);
        }
        Language::read('web_config');
    }

/**
 * 切换图设置
 */
/**
 * 头部切换图设置
 */
public function focus_editOp() {
    $model_web_config = Model('web_config');
    $web_id = '101';
    $code_list = $model_web_config->getCodeList(array('web_id'=> $web_id));
    if(is_array($code_list) && !empty($code_list)) {
        foreach ($code_list as $key => $val) {//将变量输出到页面
            $var_name = $val['var_name'];
            $code_info = $val['code_info'];
            $code_type = $val['code_type'];
            $val['code_info'] = $model_web_config->get_array($code_info,$code_type);
            Tpl::output('code_'.$var_name,$val);
        }
    }
    $screen_adv_list = $model_web_config->getAdvList("screen");//焦点大图广告数据
    Tpl::output('screen_adv_list',$screen_adv_list);
    $focus_adv_list = $model_web_config->getAdvList("focus");//三张联动区广告数据
    Tpl::output('focus_adv_list',$focus_adv_list);

    $code_list = $model_web_config->getCodeList(array('web_id'=> 150));
    if(is_array($code_list) && !empty($code_list)) {
        foreach ($code_list as $key => $val) {//将变量输出到页面
            $var_name = $val['var_name'];
            $code_info = $val['code_info'];
            $code_type = $val['code_type'];
            $val['code_info'] = $model_web_config->get_array($code_info,$code_type);
            Tpl::output('code_'.$var_name,$val);
        }
    }
    $screen_adv_list = $model_web_config->getAdvList("screen");//首页焦点大图广告数据
    Tpl::output('index_screen_adv_list',$screen_adv_list);


    Tpl::showpage('subpage_focus_edit');
}
}