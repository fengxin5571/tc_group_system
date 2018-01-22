<?php 
/**
 * 导师主页
 **by 太常系统 www.sxtaichang.com*/
defined('InShopNC') or exit('Access Invalid!');

class member_advisohomeControl extends BaseSNSControl {
    public function __construct(){
        Tpl::setDir('sns');
        $model = Model();
        parent::__construct(1);
        Language::read('member_sns,sns_home');
        if($this->master_info['member_advisor']==0){
            showMessage("无此指导老师",urlShop('index',"selfindex"),"html","error");
        }
    }
    /*
     * 指导老师首页
     */
    public function indexOp(){
        
        //板块信息
        $model_web_config = Model('web_config');
        $web_html = $model_web_config->getWebHtml('index');
        $condition['web_id']=102;
        $webcode=$model_web_config->getCodeList($condition);
        if($webcode){//获取视频推荐内容
            foreach ($webcode as &$video_recommend){
                $video_recommend[code_info]=$model_web_config->get_array($video_recommend['code_info'],"array");
            }
        }
        $where ['member_id'] = $this->master_id;
        $where ['is_default'] = 2;
        $model=Model();
        $class_info = $model->table ( 'sns_albumclass' )->where ( $where )->find ();
        $pic_where['ac_id']=$class_info['ac_id'];
        Tpl::output("pic_class",$class_info);
        $pic_list = $model->table ( 'sns_albumpic' )->where ($pic_where)->order ()->page ( 36 )->select ();//获取荣誉墙相片
        Tpl::output('pic_list',$pic_list);
        $answer_where['answer_guide']= $this->master_id;
        
        $queststion_list=$model->table("question,answer")->where($answer_where)->join("left join")->on('question.question_id=answer.answer_qid')->group("question_id")->order("rand()")->select();
        Tpl::output('queststion_list',$queststion_list);
        /**
         * 分类导航
         */
        $nav_link = array(
            array(
                'title'=>"首页",
                'link'=>SHOP_SITE_URL
            ),
            array(
				'title'=>"指导老师",
			    'link' => urlShop('article', 'member_advisor_list')
			),
			
        );
        Tpl::output('nav_link_list',$nav_link);
        Tpl::output('video_recommend',$webcode);
        Tpl::showpage('member_adviso_home',"home_dw_layout");
    }
    
}
?>