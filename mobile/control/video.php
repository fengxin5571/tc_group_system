<?php 
/**
 *  v3-b12
 *  视频管理
 *by 太常系统 www.sxtaichang.com
 **/
defined('InShopNC') or exit('Access Invalid!');
class videoControl extends mobileHomeControl{
    public function __construct(){
        parent::__construct();
    }
    /**
     * 视频列表
     */
    public function video_listOp() {
        if(!empty($_GET['vd_id']) && intval($_GET['vd_id']) > 0) {
            $video_class_model	= Model('video_class');
            $video_model	= Model('video');
            $condition	= array();
            $condition['vd_parent_id']=intval($_GET['vd_id']);
            $child_class_list = $video_class_model->getClassList($condition);
            $video_class_list =$child_class_list;
            foreach ($child_class_list as &$class){
                $condition	= array();
                $condition['vd_parent_id']=$class['vd_id'];
                $class['child']=$video_class_model->getClassList($condition);
            }
            $recommend_video_class_list=$child_class_list;
            foreach ($recommend_video_class_list as &$class){
                if($class[child]){
                    $child_class_list	= $video_class_model->getChildClass(intval($class['vd_id']));
                    $ac_ids	= array();
                    if(!empty($child_class_list) && is_array($child_class_list)){
                        foreach ($child_class_list as $v){
                            $ac_ids[]	= $v['vd_id'];
                        }
                    }
                    $condition['video_show']	= '1';
                    $condition["upload_type"]   =7;
                    $condition['order']="rand()";
                    $ac_ids	= implode(',',$ac_ids);
                    $condition['vd_ids']= $ac_ids;
                    $class['item']	= $video_model->getJoinList($condition);
                    $condition=array();
                }else{
                    $condition['video_show']	= '1';
                    $condition["upload_type"]   =7;
                    $condition['order']="rand()";
                    $condition['vd_id']=$class['vd_id'];
                    $class['item']	= $video_model->getJoinList($condition);               
                }
            }
            $video_type_name = $this->video_type_name($ac_ids);
            output_data(array('video_list' => array("video"=>$recommend_video_class_list),'video_type_name'=> $video_type_name,"video_class"=>array("v_class"=>$video_class_list)));
        }
        else {
            output_error('缺少参数:视频类别编号');
        }
    }

    /**
     * 根据类别编号获取视频类别信息
     */
    private function video_type_name() {
        if(!empty($_GET['vd_id']) && intval($_GET['vd_id']) > 0) {
            $video_class_model = Model('video_class');
            $video_class = $video_class_model->getOneClass(intval($_GET['vd_id']));
            return ($video_class['vd_name']);
        }
        else {
            return ('缺少参数:视频类别编号');
        }
    }
    /**
     * 单篇视频显示
     */
    public function video_showOp() {
        $vdieo_model	= Model('video');
        if(!empty($_GET['video_id']) && intval($_GET['video_id']) > 0) {
            $video["video"]	= $vdieo_model->getOneArticle(intval($_GET['video_id']));
            $condition	= array('vd_id'=>$video['video']['vd_id']);
            $video['xg']['video_list']=$vdieo_model->getVideoList($condition);
            if (empty($video)) {
                output_error('视频不存在');
            }
            else {
               output_data($video);
            }
        }
        else {
            output_error('缺少参数:视频编号');
        }
    }
    
}


?>