<?php 
/**
 * 视频
 *
 *
 *
 **by 太常系统 www.sxtaichang.com*/


defined('InShopNC') or exit('Access Invalid!');

class videoControl extends BaseHomeControl {
    /**
     * 默认进入页面
     */
    public function indexOp(){
        /**
         * 读取语言包
         */
        
        Language::read('home_article_index');
        if(!empty($_GET['video_id'])){
            $this->showOp();
            exit;
        }
        if(!empty($_GET['vd_id'])){
            $this->videoOp();
            exit;
        }
        showMessage(Language::get('article_video_not_found'),'','html','error');//'没有符合条件的视频'
    }
    /**
     * 视频列表显示页面
     */
    public function videoOp(){
        /**
         * 读取语言包
         */
        Tpl::setLayout('home_dw_layout');
        Language::read('home_article_index');
        $lang	= Language::getLangContent();
        if(empty($_GET['vd_id'])){
            showMessage($lang['para_error'],'','html','error');//'缺少参数:文章类别编号'
        }
        $condition=array();
        $condition['web_id']=102;
       
        //板块信息
		$model_web_config = Model('web_config');
		$webcode=$model_web_config->getCodeList($condition);
		if($webcode){//获取视频推荐内容
		    foreach ($webcode as &$video_recommend){
		        $video_recommend[code_info]=$model_web_config->get_array($video_recommend['code_info'],"array");
		    }
		}
		Tpl::output('video_recommend',$webcode);
        /**
         * 得到导航ID
         */
        $nav_id = intval($_GET['nav_id']) ? intval($_GET['nav_id']) : 0 ;
        Tpl::output('index_sign',$nav_id);
        /**
         * 根据类别编号获取文章类别信息
         */
        $article_class_model	= Model('video_class');
        $condition	= array();
        if(!empty($_GET['vd_id'])){
            $condition['vd_id']	= intval($_GET['vd_id']);
        }
        $article_class	= $article_class_model->getOneClass(intval($_GET['vd_id']));
        Tpl::output('class_name', $article_class['vd_name']);
        if(empty($article_class) || !is_array($article_class)){
            showMessage($lang['article_video_class_not_exists'],'','html','error');//'该视频分类并不存在'
        }
        $default_count	= 4;//定义最新文章列表显示文章的数量
        /**
         * 分类导航
         */
        $nav_link = array(
            array(
                'title'=>$lang['homepage'],
                'link'=>SHOP_SITE_URL
            ),
            array(
                'title'=>$article_class['vd_name']
            )
        );
        Tpl::output('nav_link_list',$nav_link);
        
        /**
         * 视频列表
         */
        $child_class_list	= $article_class_model->getChildClass(intval($_GET['vd_id']));
        $ac_ids	= array();
        if(!empty($child_class_list) && is_array($child_class_list)){
            foreach ($child_class_list as $v){
                $ac_ids[]	= $v['vd_id'];
            }
        }
        $ac_ids	= implode(',',$ac_ids);
        $article_model	= Model('video');
        $condition 	= array();
        $condition['vd_ids']	= $ac_ids;
        $condition['video_show']	= '1';
        $condition["upload_type"]   =7;
        $page	= new Page();
        $page->setEachNum(12);
        $page->setStyle('admin');
        $article_list	= $article_model->getJoinList($condition,$page);
        if(empty($_REQUEST["childlist"])){
            /**
             * 左侧分类导航
             */
            $condition	= array();
            $condition['vd_parent_id']	= $article_class['vd_id'];
            $sub_class_list	= $article_class_model->getClassList($condition);
            if(empty($sub_class_list) || !is_array($sub_class_list)){
                $condition['vd_parent_id']	= $article_class['vd_parent_id'];
                $sub_class_list	= $article_class_model->getClassList($condition);
            }
            
            /**
             * 最新视频列表
             */
            rsort($article_list);
            $count	= count($article_list);
            $new_article_list	= array();
            
            foreach ($sub_class_list as $k=>$class){
                $new_article_list[$k]['vd_name']=$class['vd_name'];
                if(!empty($article_list) && is_array($article_list)){
                    for ($i=0;$i<($count>$default_count?$default_count:$count);$i++){
                        if($article_list[$i][vd_id]==$class[vd_id]){
                            $new_article_list[$k]['item'][]=$article_list[$i];
                        }
            
                    }
                }
            
            }
            foreach($sub_class_list as &$class){
                $condition	= array();
                $condition['vd_parent_id']=$class['vd_id'];
                $class['child']=$article_class_model->getClassList($condition);
            }
            $recommend_video_class_list=$sub_class_list;
            foreach($recommend_video_class_list as &$class){
                if($class[child]){
                    $child_class_list	= $article_class_model->getChildClass(intval($class['vd_id']));
                    $ac_ids	= array();
                    if(!empty($child_class_list) && is_array($child_class_list)){
                        foreach ($child_class_list as $v){
                            $ac_ids[]	= $v['vd_id'];
                        }
                    }
                    $condition['video_show']	= '1';
                    $condition["upload_type"]   =7;
                    $condition['order']="rand()";
                    $condition["limit"]=4;
                    $ac_ids	= implode(',',$ac_ids);
                    $condition['vd_ids']= $ac_ids;
                    $class['item']	= $article_model->getJoinList($condition);
                    $condition=array();
                }else{
                    $condition['video_show']	= '1';
                    $condition["upload_type"]   =7;
                    $condition['order']="rand()";
                    $condition["limit"]=4;
                    $condition['vd_id']=$class['vd_id'];
                    $class['item']	= $article_model->getJoinList($condition);
                    
                }
               
            }
            Tpl::output('recommend_video_class_list',$recommend_video_class_list);
            Tpl::output('sub_class_list',$sub_class_list);
            Tpl::output('new_article_list',$new_article_list);
        }else{
            /**
             * 左侧分类导航
             */
           
            $condition	= array();
            $condition['vd_parent_id']	= $_REQUEST['parent_id'];
            $sub_class_list	= $article_class_model->getClassList($condition);
           
            if(empty($sub_class_list) || !is_array($sub_class_list)){
                $condition['vd_parent_id']	= $article_class['vd_parent_id'];
                $sub_class_list	= $article_class_model->getClassList($condition);
            }
            foreach($sub_class_list as &$class){
                $condition	= array();
                $condition['vd_parent_id']=$class['vd_id'];
                $class['child']=$article_class_model->getClassList($condition);
            }
            Tpl::output('sub_class_list',$sub_class_list);
           
        }
        
        Tpl::output('article',$article_list);
        
        Tpl::output('show_page',$page->show());
         
        Model('seo')->type('video')->param(array('video_class'=>$article_class['vd_name']))->show();
        
            
        
        $templates_name="video_index";
        if($_REQUEST['childlist'] == 1){
            $templates_name="dw_video_list_html";
        }
        Tpl::showpage($templates_name);
    }
    /**
     * 单篇视频显示页面
     */
    public function showOp(){
        /**
         * 读取语言包
         */
        Tpl::setLayout('home_dw_layout');
        Language::read('home_article_index');
        $lang	= Language::getLangContent();
        
        
        if(empty($_GET['video_id'])){
            showMessage($lang['para_error'],'','html','error');//'缺少参数:文章编号'
        }
        $condition=array();
        $condition['web_id']=102;
         
        //板块信息
        $model_web_config = Model('web_config');
        $webcode=$model_web_config->getCodeList($condition);
        if($webcode){//获取视频推荐内容
            foreach ($webcode as &$video_recommend){
                $video_recommend[code_info]=$model_web_config->get_array($video_recommend['code_info'],"array");
            }
        }
        Tpl::output('video_recommend',$webcode);
        /**
         * 根据文章编号获取文章信息
         */
        $article_model	= Model('video');
        $article	= $article_model->getOneArticle(intval($_GET['video_id']));
        if(empty($article) || !is_array($article) || $article['video_show']=='0'){
            showMessage($lang['article_video_not_found'],'','html','error');//'该文章并不存在'
        }
        $video_count=$article['video_count'];
        $video_count=$video_count+1;
        $article_model->update(array('video_count'=>$video_count,"video_id"=>$article['video_id']));
        $article["video_ad_url"]=UPLOAD_SITE_URL.DS."video".DS.$article['video_ad_url'];
        Tpl::output('article',$article);
        /**
         * 根据类别编号获取文章类别信息
         */
        $article_class_model	= Model('video_class');
        $condition	= array();
        $article_class	= $article_class_model->getOneClass($article['vd_id']);
        if(empty($article_class) || !is_array($article_class)){
            showMessage($lang['article_show_delete'],'','html','error');//'该文章已随所属类别被删除'
        }
        $default_count	= 5;//定义最新文章列表显示文章的数量
        /**
         * 分类导航
         */
        $nav_link = array(
            array(
                'title'=>$lang['homepage'],
                'link'=>SHOP_SITE_URL
            ),
            array(
                'title'=>$article_class['vd_name'],
                'link' => urlShop('article', 'article', array('vd_id' => $article_class['vd_id']))
            ),
            array(
                'title'=>$lang['article_show_article_content']
            )
        );
        Tpl::output('nav_link_list',$nav_link);
        /**
         * 左侧分类导航
         */
        $condition	= array();
        $condition['vd_parent_id']	= $_REQUEST['parent_id'];
        $sub_class_list	= $article_class_model->getClassList($condition);
        if(empty($sub_class_list) || !is_array($sub_class_list)){
            $condition['vd_parent_id']	= $article_class['vd_parent_id'];
            $sub_class_list	= $article_class_model->getClassList($condition);
        }
        foreach($sub_class_list as &$class){
            $condition	= array();
            $condition['vd_parent_id']=$class['vd_id'];
            $class['child']=$article_class_model->getClassList($condition);
        }
        
        Tpl::output('sub_class_list',$sub_class_list);
        /**
         * 文章列表
         */
        $child_class_list	= $article_class_model->getChildClass($article_class['vd_id']);
        $ac_ids	= array();
        if(!empty($child_class_list) && is_array($child_class_list)){
            foreach ($child_class_list as $v){
                $ac_ids[]	= $v['vd_id'];
            }
        }
        $ac_ids	= implode(',',$ac_ids);
        $article_model	= Model('video');
        $condition 	= array();
        $condition['vd_ids']	= $ac_ids;
        $condition['video_show']	= '1';
        $article_list	= $article_model->getVideoList($condition);
        /**
         * 寻找上一篇与下一篇
         */
        $pre_article	= $next_article	= array();
        if(!empty($article_list) && is_array($article_list)){
            $pos	= 0;
            foreach ($article_list as $k=>$v){
                if($v['video_id'] == $article['vd_id']){
                    $pos	= $k;
                    break;
                }
            }
            if($pos>0 && is_array($article_list[$pos-1])){
                $pre_article	= $article_list[$pos-1];
            }
            if($pos<count($article_list)-1 and is_array($article_list[$pos+1])){
                $next_article	= $article_list[$pos+1];
            }
        }
        Tpl::output('pre_article',$pre_article);
        Tpl::output('next_article',$next_article);
        /**
         * 最新文章列表
         */
        $count	= count($article_list);
        $new_article_list	= array();
        if(!empty($article_list) && is_array($article_list)){
            for ($i=0;$i<($count>$default_count?$default_count:$count);$i++){
                $new_article_list[]	= $article_list[$i];
            }
        }
        Tpl::output('new_article_list',$new_article_list);
        
        $seo_param = array();
        $seo_param['name'] = $article['video_title'];
        $seo_param['video_class'] = $article_class['vd_name'];
        Model('seo')->type('video_content')->param($seo_param)->show();
        if($article_class[type]==1){
            Tpl::setLayout('home_dw_layout');
        }
        $templates_name="video_show";
        Tpl::showpage($templates_name);
    }
    /*
     * ajax 切换播放
     */
    public  function ajax_videoOp(){
        $type=$_POST['type'];
        $video_model=Model('video');
        $video_url=$_POST['video_url'];
        $video_recommend=$_POST['video_recommend'];
        switch ($type){
            case 1:
                 $condition=array('video_recommend'=>$video_recommend);
                  $condition['upload_type']=7;
                  $video_list=$video_model->getJoinList($condition,$page);
                    if($video_list&&is_array($video_list)){
                        foreach ($video_list as $k=> $video){
                            $video_list[$k]['video_ad_url']=UPLOAD_SITE_URL.DS."video".DS.$video['video_ad_url'];
                        }
                    }
                $video_html=$video_model->get_player(1,$video_list,$video_url);
                break;
            case 2:
                $condition=array('video_recommend'=>$video_recommend);
                $condition['upload_type']=7;
                $video_list=$video_model->getJoinList($condition,$page);
                if($video_list&&is_array($video_list)){
                    foreach ($video_list as $k=> $video){
                        $video_list[$k]['video_ad_url']=UPLOAD_SITE_URL.DS."video".DS.$video['video_ad_url'];
                    }
                }
                $video_html=$video_model->get_player(2,$video_list,$video_url,$video_recommend);
                break;
        }
        echo $video_html;
    }
}
?>