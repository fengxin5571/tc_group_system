<?php 
/**
 * 视频管理
 *
 *
 *
 *
 * by 太常系统 www.sxtaichang.com
 */
defined('InShopNC') or exit('Access Invalid!');
class videoModel{
    /**
     * 列表
     *
     * @param array $condition 检索条件
     * @param obj $page 分页
     * @return array 数组结构的返回结果
     */
    public function getVideoList($condition,$page=''){
        $condition_str = $this->_condition($condition);
        $param = array();
        $param['table'] = 'video';
        $param['where'] = $condition_str;
        $param['limit'] = $condition['limit'];
        $param['order']	= (empty($condition['order'])?'video_sort asc,video_time desc':$condition['order']);
        $result = Db::select($param,$page);
        return $result;
    }
    /**
     * 连接查询列表
     *
     * @param array $condition 检索条件
     * @param obj $page 分页
     * @return array 数组结构的返回结果
     */
    public function getJoinList($condition,$page=''){
        $result	= array();
        $condition_str	= $this->_condition($condition);
        $param	= array();
        $param['table'] = 'video,video_class,upload';
        $param['field']	= empty($condition['field'])?'*':$condition['field'];;
        $param['join_type']	= empty($condition['join_type'])?'left join':$condition['join_type'];
        $param['join_on']	= array('video.vd_id=video_class.vd_id','video.video_id=upload.item_id');
        $param['where'] = $condition_str;
        $param['limit'] = $condition['limit'];
        $param['order']	= empty($condition['order'])?'video.video_sort':$condition['order'];
        $result = Db::select($param,$page);
        return $result;
    }
    /**
     * 构造检索条件
     *
     * @param int $id 记录ID
     * @return string 字符串类型的返回结果
     */
    private function _condition($condition){
        $condition_str = '';
    
        if ($condition['video_show'] != ''){
            $condition_str .= " and video.video_show = '". $condition['video_show'] ."'";
        }
        if ($condition['vd_id'] != ''){
            $condition_str .= " and video.vd_id = '". $condition['vd_id'] ."'";
        }
        if ($condition['vd_ids'] != ''){
            //if(is_array($condition['ac_ids']))$condition['ac_ids']	= implode(',',$condition['ac_ids']);
            $condition_str .= " and video.vd_id in(". $condition['vd_ids'] .")";
        }
        if ($condition['like_title'] != ''){
            $condition_str .= " and video.video_title like '%". $condition['like_title'] ."%'";
        }
        if ($condition['home_index'] != ''){
            $condition_str .= " and (video_class.vd_id <= 7 or (video_class.vd_parent_id > 0 and video_class.vd_parent_id <= 7))";
        }
        if($condition['upload_type'] !=""){
            $condition_str.="and upload.upload_type=".$condition['upload_type'];
        }
       if(isset($condition['video_recommend'])){
           $condition_str.=" and video.video_recommend=".$condition['video_recommend'];
       }
        return $condition_str;
    }
    /**
     * 取单个内容
     *
     * @param int $id ID
     * @return array 数组类型的返回结果
     */
    public function getOneArticle($id){
        if (intval($id) > 0){
            $param = array();
            $param['table'] = 'video';
            $param['field'] = 'video_id';
            $param['value'] = intval($id);
            $result = Db::getRow($param);
            return $result;
        }else {
            return false;
        }
    }
    /**
     * 新增
     *
     * @param array $param 参数内容
     * @return bool 布尔类型的返回结果
     */
    public function add($param){
        if (empty($param)){
            return false;
        }
        if (is_array($param)){
            $tmp = array();
            foreach ($param as $k => $v){
                $tmp[$k] = $v;
            }
            $result = Db::insert('video',$tmp);
            return $result;
        }else {
            return false;
        }
    }
    /**
     * 更新信息
     *
     * @param array $param 更新数据
     * @return bool 布尔类型的返回结果
     */
    public function update($param){
        if(empty($param)){
            return false;
        }
        if(is_array($param)){
            $tmp=array();
            foreach($param as $k=>$v){
                $tmp[$k]=$v;
            }
            $where = " video_id = '". $param['video_id'] ."'";
            $result = Db::update('video',$tmp,$where);
            return $result;
        }else{
            return false;
        }
    }
    /**
     * 删除
     *
     * @param int $id 记录ID
     * @return bool 布尔类型的返回结果
     */
    public function del($id){
        if (intval($id) > 0){
            $where = " video_id = '". intval($id) ."'";
            $result = Db::delete('video',$where);
            return $result;
        }else {
            return false;
        }
    }
    /*
     * 推荐播放器
     */
    public function get_player($style_id,$video_list,$video_url,$video_recommend=0){
          switch ($style_id){
              case 1:
                  $style_file = BASE_DATA_PATH.DS.'resource'.DS.'video'.DS.'video_show1.php';
                  break;
              case 2:
                  $style_file = BASE_DATA_PATH.DS.'resource'.DS.'video'.DS.'video_show2.php';
                  break;
          }
          if(file_exists($style_file)){
              ob_start();
              include $style_file;
              $web_html = ob_get_contents();
              ob_end_clean();
          }
          return $web_html;
    }
}

?>