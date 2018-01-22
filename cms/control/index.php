<?php
/**
 * cms首页
 *
 *
 **by 太常系统 www.sxtaichang.com*/

defined('InShopNC') or exit('Access Invalid!');
class indexControl extends CMSHomeControl{

	public function __construct() {
		parent::__construct();
		Tpl::setLayout('jky_layout');
        Tpl::output('index_sign','index');
    }
	public function indexOp(){
	   
	    //文章分类标题
	    $cms_article=Model('cms_article_class');
	    $condition=array();
        $article_class=$cms_article->select($condition);
        //天天养生左侧图文推荐文章
        $cms_article_model=Model('cms_article');
        $condition=array('article_class_id'=>15,'article_commend_image_flag'=>1);
        $dayday_article=$cms_article_model->getList($condition,$page=null, $order='article_id desc', $field='*', $limit='6');
        foreach($dayday_article as &$value){
            $value['article_image']=unserialize($value['article_image']);
        }
        //天天养生右侧推荐文章
        $condition=array('article_class_id'=>15,'article_commend_flag'=>1);
        $dayday_article_right=$cms_article_model->getList($condition,$page=null, $order='article_id desc', $field='*', $limit='4');
        foreach ($dayday_article_right as &$v){
            $v['article_publish_time']=date("m/d",$v['article_publish_time']);
        }
        //人人养生下推荐文章
        $condition=array('article_class_id'=>22,'article_commend_flag'=>1);
        $person_article=$cms_article_model->getList($condition,$page=null, $order='article_id desc', $field='*', $limit='5');
        foreach ($person_article as &$vv){
            $vv['article_publish_time']=date("m/d",$vv['article_publish_time']);
        }
        //人人养生热门推荐文章
        $condition=array('article_class_id'=>22,'article_commend_image_flag'=>1);
        $person_hot_article=$cms_article_model->getList($condition,$page=null, $order='article_id desc', $field='*', $limit='1');
        foreach ($person_hot_article as &$vvv){
            $vvv['article_publish_time']=date("m/d",$vvv['article_publish_time']);
            $vvv['article_image']=unserialize($vvv['article_image']);
        }
        //处处养生下推荐文章
        $condition=array('article_class_id'=>23,'article_commend_flag'=>1);
        $chuchu_article=$cms_article_model->getList($condition,$page=null, $order='article_id desc', $field='*', $limit='10');
        foreach ($chuchu_article as &$vvv){
            $vvv['article_publish_time']=date("m/d",$vvv['article_publish_time']);
        }
        //处处养生下热门推荐
        $condition=array('article_class_id'=>23,'article_commend_image_flag'=>1);
        $chuchu_hot_article=$cms_article_model->getList($condition,$page=null, $order='article_id desc', $field='*', $limit='1');
        foreach ($chuchu_hot_article as &$val){
            $val['article_publish_time']=date("m/d",$val['article_publish_time']);
            $val['article_image']=unserialize($val['article_image']);
        }
        /*
         *  健康问答
         */
        $question_model=Model();
        $question_list=$question_model->table("question")->where('')->order("rand()")->limit(10)->select();
        if($question_list){
            foreach ($question_list as &$question){
                $question["answers"]=$question_model->table("answer")->order("answer_id desc")->where("answer_qid=$question[question_id]")->limit(1)->find();
            }
        }
        /*
         * 推荐视频
         */
        $video_model=Model("video");
        $condition=array('video_recommend'=>2);
        $condition['order']="video_id desc";
        $condition['limit']=6;
        $condition['upload_type']=7;
        $video_list=$video_model->getJoinList($condition);
        Tpl::output("video_list",$video_list);
        Tpl::output("question_list",$question_list);
	    Tpl::output("article_class",$article_class);
	    Tpl::output("dayday_article",$dayday_article);
	    Tpl::output("dayday_article_right",$dayday_article_right);
	    Tpl::output("person_article",$person_article);
	    Tpl::output("chuchu_article",$chuchu_article);
	    Tpl::output("person_hot_article",$person_hot_article);
	    Tpl::output("chuchu_hot_article",$chuchu_hot_article);
        Tpl::showpage('index');
	}
}
