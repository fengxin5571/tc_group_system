<?php
/**
 * 视频列表页
 *
 *
 **by 太常系统 www.sxtaichang.com*/

defined('InShopNC') or exit('Access Invalid!');
class videoControl extends CMSHomeControl{

    public function __construct() {
        parent::__construct();
        Tpl::setLayout('jky_layout');
        Tpl::output('index_sign', 'video');
    }

    public function indexOp() {
        $this->video_listOp();
    }
 
    /**
     * 视频列表页
     */
    public function video_listOp() {
        //推荐视频
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
        
        //视频排名
        $video_model=Model('video');
        $condition['order']='video_count desc';
        $condition['limit']=6;
        $video_ranking=$video_model->getVideoList($condition);
        Tpl::output('video_ranking',$video_ranking);
        
        //获取视频分类
        $video_class_model	= Model('video_class');
        $condition	= array();  
        $video_class=$video_class_model->getClassList($condition);
  
        foreach($video_class as $class){
            $condition['vd_id']=$class['vd_id'];
            $condition['order']="rand()";
            $video_list["$class[vd_id]"]=$video_model->getVideoList($condition);
            if($video_list["$class[vd_id]"]){
                foreach($video_list["$class[vd_id]"] as &$v){
                    $v['video_time']=date("Y/m/d",$v['video_time']);
                    $upload=Model('upload');
                    $condition['item_id']=$v['video_id'];
                    $file_name=$upload->getUploadList($condition,'file_name');
                    foreach ($file_name as $file){
                        $v['file_name']=UPLOAD_SITE_URL.'/'.ATTACH_ARTICLE.'/'.$file['file_name'];
                    }
                }
            }else{
                $video_list["$class[vd_id]"]=array();
            }
        }
        //查询全部视频
        $condition	= array();
        $condition['limit']=12;
        $condition['order']="rand()";
        $video_all=$video_model->getVideoList($condition);
        
        foreach($video_all as &$all){
            $all['video_time']=date("Y/m/d",$all['video_time']);
            $upload=Model('upload');
            $condition['item_id']=$all['video_id'];
            $file_name=$upload->getUploadList($condition,'file_name');
            foreach ($file_name as $file){
                $all['file_name']=UPLOAD_SITE_URL.'/'.ATTACH_ARTICLE.'/'.$file['file_name'];
            }
        }        
        
        Tpl::output('video_all',$video_all);
        Tpl::output('video_class',$video_class);
        Tpl::output('vd_id',$_GET['vd_id']);
        Tpl::output('video_list',$video_list);
        Tpl::showpage('video_list');
    }
    /*
     * 视频详情页
     */
    function video_detailOp(){
        $video_model=Model('video');
        $video=$video_model->getOneArticle1($_GET['video_id']);
        if($video){//相关视频
            if($video[0]['video_link']){
                $condition=array(
                    'video_show'=>1,
                    'video_ids'=>$video[0]['video_link'],
                    
                );
                $video_related=$video_model->getJoinList($condition);
            }
        }
        //推荐视频
        $condition=array(
           'video_recommend'=>1,
            'video_show'=>1,
        );
        $video_recommend=$video_model->getJoinList($condition);
        Tpl::output("video_recommend",$video_recommend);
        Tpl::output("video_related",$video_related);
        Tpl::output("video",$video[0]);
        Tpl::showpage('video_detail');
    }
}
