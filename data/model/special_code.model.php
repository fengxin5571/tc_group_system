<?php
/**
 * 页面模块
 *
 *
 *
 *
 * by 太常系统 www.sxtaichang.com
 */
defined('InShopNC') or exit('Access Invalid!');
class special_codeModel extends Model{
    /**
     * 读取模块内容记录
     *
     * @param
     * @return array 数组格式的返回结果
     */
    public function getCodeRow($code_id,$special_id){
        $param = array();
        $param['code_id']	= $code_id;
        $param['special_id']	= $special_id;
        $result	= $this->table('special_code')->where($param)->find();
        return $result;
    }
    /**
     * 读取模块内容记录列表
     *
     * @param
     * @return array 数组格式的返回结果
     */
    public function getCodeList($condition = array()){
        $result = $this->table('special_code')->where($condition)->order('special_id')->select();
        return $result;
    }
    /**
     * 转换字符串
     */
    public function get_array($code_info,$code_type){
        $data = '';
        switch ($code_type) {
            case "array":
                if(is_string($code_info)) $code_info = unserialize($code_info);
                if(!is_array($code_info)) $code_info = array();
                $data = $code_info;
                break;
            case "html":
                if(!is_string($code_info)) $code_info = '';
                $data = $code_info;
                break;
            default:
                $data = '';
                break;
        }
        return $data;
    }
    /**
     * 转换数组
     */
    public function get_str($code_info,$code_type){
        $str = '';
        switch ($code_type) {
            case "array":
                if(!is_array($code_info)) $code_info = array();
                $code_info = $this->stripslashes_deep($code_info);
                $str = serialize($code_info);
                $str = addslashes($str);
                break;
            case "html":
                if(!is_string($code_info)) $code_info = '';
                $str = $code_info;
                break;
            default:
                $str = '';
                break;
        }
        return $str;
    }
    /**
     * 递归去斜线
     */
    public function stripslashes_deep($value){
        $value = is_array($value) ? array_map(array($this,'stripslashes_deep'), $value) : stripslashes($value);
        return $value;
    }
    /**
     * 读取广告位记录列表
     *
     */
    public function getAdvList($type = 'screen'){
        $condition = array();
        $condition['screen'] = array(
            'ap_class' => '0',//图片
            'is_use' => '1',//启用
            'ap_width' => '1920',//宽度
            'ap_height' => '481'//高度
        );
        $condition['focus'] = array(
            'ap_class' => '0',//图片
            'is_use' => '1',//启用
            'ap_width' => '259',//宽度
            'ap_height' => '180'//高度
        );
    
        $result = $this->table('adv_position')->where($condition[$type])->order('ap_id desc')->select();
        return $result;
    }
    /**
     * 更新模块内容信息
     *
     * @param
     * @return bool 布尔类型的返回结果
     */
    public function updateCode($condition,$data){
        $code_id = $condition['code_id'];
        if (intval($code_id) < 1){
            return false;
        }
        if (is_array($data)){
            $result = $this->table('special_code')->where($condition)->update($data);
            return $result;
        } else {
            return false;
        }
    }
}