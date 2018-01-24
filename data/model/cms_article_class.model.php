<?php
/**
 * cms文章分类模型
 *
 * 
 *
 *
 * by 33hao www.33hao.com 开发修正
 */
defined('InShopNC') or exit('Access Invalid!');
class cms_article_classModel extends Model{

    public function __construct(){
        parent::__construct('cms_article_class');
    }

	/**
	 * 读取列表 
	 * @param array $condition
	 *
	 */
	public function getList($condition,$page=null,$order='',$field='*'){
        $result = $this->field($field)->where($condition)->page($page)->order($order)->select();
        return $result;
	}
	/**
	 * 取分类列表，按照深度归类
	 *
	 * @param int $show_deep 显示深度
	 * @return array 数组类型的返回结果
	 */
	public function getTreeClassList($show_deep='2',$condition=array()){
	    $class_list = $this->getList($condition,null,"parent_id asc,class_sort asc,class_id asc ");
	    $show_deep = intval($show_deep);
	    $result = array();
	    if(is_array($class_list) && !empty($class_list)) {
	        $result = $this->_getTreeClassList($show_deep,$class_list);
	    }
	    return $result;
	}
	/**
	 * 递归 整理分类
	 *
	 * @param int $show_deep 显示深度
	 * @param array $class_list 类别内容集合
	 * @param int $deep 深度
	 * @param int $parent_id 父类编号
	 * @param int $i 上次循环编号
	 * @return array $show_class 返回数组形式的查询结果
	 */
	private function _getTreeClassList($show_deep,$class_list,$deep=1,$parent_id=0,$i=0){
	    static $show_class = array();//树状的平行数组
	    if(is_array($class_list) && !empty($class_list)) {
	        $size = count($class_list);
	        if($i == 0) $show_class = array();//从0开始时清空数组，防止多次调用后出现重复
	        for ($i;$i < $size;$i++) {//$i为上次循环到的分类编号，避免重新从第一条开始
	            $val = $class_list[$i];
	            $class_id = $val['class_id'];
	            $ac_parent_id	= $val['parent_id'];
	            if($ac_parent_id == $parent_id) {
	                $val['deep'] = $deep;
	                $show_class[] = $val;
	                if($deep < $show_deep && $deep < 2) {//本次深度小于显示深度时执行，避免取出的数据无用
	                    $this->_getTreeClassList($show_deep,$class_list,$deep+1,$class_id,$i+1);
	                }
	            }
	            if($ac_parent_id > $parent_id) break;//当前分类的父编号大于本次递归的时退出循环
	        }
	    }
	    return $show_class;
	}
	/**
	 * 取指定分类ID下的所有子类
	 *
	 * @param int/array $parent_id 父ID 可以单一可以为数组
	 * @return array $rs_row 返回数组形式的查询结果
	 */
	public function getChildClass($parent_id){
	    $condition	= array();
	    $all_class = $this->getList($condition);
	    if (is_array($all_class)){
	        if (!is_array($parent_id)){
	            $parent_id = array($parent_id);
	        }
	        $result = array();
	        foreach ($all_class as $k => $v){
	            $ac_id	= $v['class_id'];//返回的结果包括父类
	            $ac_parent_id	= $v['parent_id'];
	            if (in_array($ac_id,$parent_id) || in_array($ac_parent_id,$parent_id)){
	                $result[] = $v;
	            }
	        }
	        return $result;
	    }else {
	        return false;
	    }
	}
    /**
	 * 读取单条记录
	 * @param array $condition
	 *
	 */
    public function getOne($condition,$order=''){
        $result = $this->where($condition)->order($order)->find();
        return $result;
    }

	/*
	 *  判断是否存在 
	 *  @param array $condition
     *
	 */
	public function isExist($condition) {
        $result = $this->getOne($condition);
        if(empty($result)) {
            return FALSE;
        }
        else {
            return TRUE;
        }
	}

	/*
	 * 增加 
	 * @param array $param
	 * @return bool
	 */
    public function save($param){
        return $this->insert($param);	
    }
	
	/*
	 * 更新
	 * @param array $update
	 * @param array $condition
	 * @return bool
	 */
    public function modify($update, $condition){
        return $this->where($condition)->update($update);
    }
	
	/*
	 * 删除
	 * @param array $condition
	 * @return bool
	 */
    public function drop($condition){
        return $this->where($condition)->delete();
    }
	
}

