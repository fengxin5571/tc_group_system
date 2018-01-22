<?php
/**
 * cms专题
*
* @copyright  
* @link       
*/
defined('InShopNC') or exit('Access Invalid!');
class web_specialControl extends CMSHomeControl{
    public function __construct() {
        parent::__construct();
         
    }
    public function indexOp() {
        $this->special_detailOp();
    }
    /**
     * 专题详细页
     */
    public function special_detailOp() {
        $special_id=$_GET['special_id'];
        $special_model=Model('special');
        $condition=array("special_state"=>2,"special_id"=>$special_id);
        $special_code_mode=Model('special_code');
        $special_file=$special_model->getOne($condition);
        if($special_file){
            $code_list=$special_code_mode->getCodeList(array("special_id"=>$special_file['special_id']));//获取专题banner等图片内容
            if($code_list){
                foreach ($code_list as $key =>$val){
                    $code_array[$val['var_name']]=$special_code_mode->get_array($val['code_info'],$val['code_type']);
                }
                $special_file['code_info']=$code_array;
            }
        }
        if($special_file) {
            Tpl::output('special_file', $special_file);
            Tpl::output('index_sign', 'special');
            //友情链接
            $model_link = Model('link');
            $link_list = $model_link->getLinkList($condition,$page);
            Tpl::output('link_list',$link_list);
            //专题推荐视频
            $video_model=Model("video");
            $condition=array('video_recommend'=>$special_id);
            $condition['upload_type']=7;
            $video_list=$video_model->getJoinList($condition,$page);
            if($video_list&&is_array($video_list)){
                foreach ($video_list as $k=> $video){
                    $video_list[$k]['video_ad_url']=UPLOAD_SITE_URL.DS."video".DS.$video['video_ad_url'];
                }
            }
            if($special_file['special_type']==2){//如果是独一张样式
                $video_html=$video_model->get_player(2,$video_list,$video_list[0]['video_ad_url'],$special_id);
            }elseif($special_file['special_type']==1) {
                $video_html=$video_model->get_player(3,$video_list,$video_list[0]['video_ad_url']);
            }
            Tpl::output("video_html",$video_html);
            $templates_name=$special_file['special_type']==2?"special_detail_style_1":"special_detail_style_2";
            Tpl::showpage($templates_name,"null_layout");
        } else {
            showMessage('专题不存在', '', '', 'error');
        }
    }
}
