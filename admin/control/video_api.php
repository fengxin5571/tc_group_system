<?php 
/**
 * 视频推荐模块编辑(首页)
 *
 *
 *
 **by 太常系统 www.sxtaichang.com*/

defined('InShopNC') or exit('Access Invalid!');
class video_apiControl extends SystemControl {
    public function __construct() {
        parent::__construct();
        if (strtoupper(CHARSET) == 'GBK') {
            $_GET = Language::getGBK($_GET);
            $_POST = Language::getGBK($_POST);
        }
        Language::read('web_config');
    }
    
    /**
     * 头部切换图设置
     */
    public function focus_editOp() {
        $model_web_config = Model('web_config');
        $web_id = '102';
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
    
        Tpl::showpage('video_focus.edit');
    }
    /**
     * 保存焦点区切换小图
     */
    public function focus_picOp() {
        $code_id = intval($_POST['code_id']);
        $web_id = intval($_POST['web_id']);
        $model_web_config = Model('web_config');
        $code = $model_web_config->getCodeRow($code_id,$web_id);
        if (!empty($code)) {
            $code_type = $code['code_type'];
            $var_name = $code['var_name'];
            $code_info = $_POST[$var_name];
    
            $key = intval($_POST['key']);
            $slide_id = intval($_POST['slide_id']);
            $pic_id = intval($_POST['pic_id']);
            if ($pic_id > 0 && $slide_id == $key) {
                $var_name = "focus_pic";
                $pic_info = $_POST[$var_name];
                $pic_info['pic_id'] = $pic_id;
                if (!empty($code_info[$slide_id]['pic_list'][$pic_id]['pic_img'])) {//原图片
                    $pic_info['pic_img'] = $code_info[$slide_id]['pic_list'][$pic_id]['pic_img'];
                }
                $file_name = 'web-'.$web_id.'-'.$code_id.'-'.$slide_id.'-'.$pic_id;
                $pic_name = $this->_upload_pic($file_name);//上传图片
                if (!empty($pic_name)) {
                    $pic_info['pic_img'] = $pic_name;
                }
    
                $code_info[$slide_id]['pic_list'][$pic_id] = $pic_info;
                Tpl::output('pic',$pic_info);
            }
            $code_info = $model_web_config->get_str($code_info,$code_type);
            $model_web_config->updateCode(array('code_id'=> $code_id),array('code_info'=> $code_info));
    
            Tpl::showpage('web_upload_focus','null_layout');
        }
    }
}

?>