<?php
/**
 * 专题管理
 *
 *
 *
 **by 太常系统 www.sxtaichang.com*/
defined('InShopNC') or exit('Access Invalid!');
class web_specialControl extends SystemControl{
    const LINK_SPECIAL = 'index.php?act=web_special&op=special_list';
    public function __construct(){
        parent::__construct();
    }
    /*
     * 专题列表
     */
    public function special_listOp(){
        $special_model=Model("special");
        $condition = array();
        $special_list=$special_model->getList($condition,10,"special_id desc");
        Tpl::output('show_page',$special_model->showpage(2));
        Tpl::output('list',$special_list);
        $this->show_menu('special_list');
        
        Tpl::showpage("web_special.list");
    }
    /**
     * 专题添加
     **/
    public function special_addOp() {
        $model_special = Model('cms_special');
        $this->show_menu('special_add');
        Tpl::showpage('web_special.add');
    }
    /*
     * 专题编辑
     */
    public function special_editOp(){
        $special_id = intval($_GET['special_id']);
        if(empty($special_id)) {//专题id不能为空
            showMessage(Language::get('param_error'),'','','error');
        }
        $special_model=Model("special");
        $special_detail = $special_model->getOne(array('special_id'=>$special_id));//获取单个专题信息
        if(empty($special_detail)){
            showMessage(Language::get('param_error'),'','','error');
        }
        //专题导航
        $model_navigation = Model('navigation');
        $condition['order'] = 'nav_sort asc';
        $condition['nav_location']=$special_detail['special_type']==1?5:6;
        $condition['special_id']=$special_id;
        $navigation_list = $model_navigation->getNavigationList($condition,$page);
       
        /**
         * 整理内容
         */
        if (is_array($navigation_list)){
            foreach ($navigation_list as $k => $v){
                switch ($v['nav_location']){
                    case '5':
                        $navigation_list[$k]['nav_location'] = "食维健导航";
                        break;
                    case '6':
                        $navigation_list[$k]['nav_location'] = "独一张导航";
                        break;
                    
                }
                switch ($v['nav_new_open']){
                    case '0':
                        $navigation_list[$k]['nav_new_open'] = "否";
                        break;
                    case '1':
                        $navigation_list[$k]['nav_new_open'] = "是";
                        break;
                }
            }
        }
        //获取专题banner信息
        $special_model=Model("special_code");
        $code_list = $special_model->getCodeList(array('special_id'=> $special_id));
        if(is_array($code_list)&&!empty($code_list)){
            foreach ($code_list as $key =>$val){
                $var_name=$val['var_name'];
                $code_info=$val['code_info'];
                $code_type = $val['code_type'];
                $val['code_info'] = $special_model->get_array($code_info,$code_type);
                Tpl::output('code_'.$var_name,$val);
            }
        }
        $screen_adv_list = $special_model->getAdvList("screen");//焦点大图广告数据
        Tpl::output('screen_adv_list',$screen_adv_list);
        Tpl::output("navigation_list",$navigation_list);
        Tpl::output('special_detail', $special_detail);
        $this->show_menu('special_edit');
        Tpl::showpage('web_special.edit');
    }
    /*
     * 专题保存
     */
    public function special_saveOp(){
        $param = array();
        $param['special_title'] = $_POST['special_title'];
        //专题背景图片
        $special_background = $this->special_image_upload('special_background');
        if(!empty($special_background)) {
            $param['special_background'] = $special_background;
            if(!empty($_POST['old_special_background'])) {
                $this->special_image_drop($_POST['old_special_background']);
            }
        }
        //专题logo
        $special_logo=$this->special_image_upload("special_logo");
        if(!empty($special_logo)){
            $param['special_logo']=$special_logo;
             if(!empty($_POST['old_special_logo'])) {
                    $this->special_image_drop($_POST['old_special_logo']);
                }
        }
        $param['special_type'] = intval($_POST['special_type']);
        $param['special_modify_time'] = time();
        $param['special_repeat'] = empty($_POST['special_repeat'])?'no-repeat':$_POST['special_repeat'];
        if($_POST['special_state'] == 'publish') {
            $param['special_state'] = 2;
        } else {
            $param['special_state'] = 1;
        }
        $special_model=Model('special');
        if(empty($_POST['special_id'])){
            $result = $special_model->save($param);
        }else{
            $result = $special_model->modify($param,array("special_id"=>$_POST['special_id']));
        }
        if($result){
            if($_POST['special_state'] == 'publish') {//如果是发布生成html
                
            }
            if(empty($_POST['special_id'])){
                $model=Model();
                $insert_arary=array(
                    array(
                        "special_id"=>$result,
                        "code_type"=>"array",
                        "var_name"=>"screen_list",
                        "show_name"=>"专题首页banner"
                    ),
                );
                if($param['special_type']==2){//如果是独一张专题
                    $attach_array=array(
                        array(
                            "special_id"=>$result,
                            "code_type"=>"array",
                            "var_name"=>"screen_honor_list",
                            "show_name"=>"独一张荣誉资质"
                        ),
                        array(
                            "special_id"=>$result,
                            "code_type"=>"array",
                            "var_name"=>"screen_recure_list",
                            "show_name"=>"独一张康复案例"
                        ),
                        array(
                            "special_id"=>$result,
                            "code_type"=>"array",
                            "var_name"=>"screen_store_list",
                            "show_name"=>"独一张店面展示"
                        ),
                        array(
                            "special_id"=>$result,
                            "code_type"=>"array",
                            "var_name"=>"screen_canvass_list",
                            "show_name"=>"独一张招商加盟"
                        ),
                    );
                }elseif($param['special_type']==1){//如果是食维健专题
                    
                }
                $insert_arary=array_merge($insert_arary,$attach_array);
                $model->table('special_code')->insertAll($insert_arary);//添加专题成功后插入专题banner项
            }
            $this->log("专题专题保存，专题编号".$result, 1);
           /* $article_model=Model("article_class");//添加专题成功后插入专题文章分类
            $insert_array = array();
            $insert_array['ac_name'] = trim($_POST['special_title']."-专题分类");
            $insert_array['ac_parent_id'] =0;
            $insert_array['ac_code']=$result;
            $insert_array['ac_sort'] = 255;
            $insert_array['type']    = 1;
            $article_model->add($insert_array);*/
            showMessage(Language::get('nc_common_save_succ'), self::LINK_SPECIAL);
        }else {
            $this->log(Language::get('专题保存，专题编号').$result, 0);
            showMessage(Language::get('nc_common_save_fail'), self::LINK_SPECIAL);
        }
        
    }
    /*
     * 专题删除
     */
    public function special_dropOp(){
        $condition = array();
        $condition['special_id'] = array('in', $_POST['special_id']);
        $special_model=Model("special");
        $result=$special_model->drop($condition);
        if($result){
            $this->log("专题删除成功", 1);
            showMessage("专题删除成功", self::LINK_SPECIAL);
        }else {
            $this->log('专题删除失败，专题编号' ,0);
            showMessage('专题删除失败', self::LINK_SPECIAL);
        }
        
    }
    /*
     * 专题导航删除
     */
    public  function special_nav_dropOp(){
        
        $nav_id=  $_POST['special_nav_id'];
        if ( !empty($nav_id)){
            $where  = "where nav_id in (".$nav_id.")";
            Db::delete("navigation",$where);
            dkcache('nav');
            $this->log("专题导航删除成功".'[ID:'.$nav_id.']',null);
            $url = array(
                array(
                    'url'=>'index.php?act=web_special&op=special_edit&special_id='.$_REQUEST['special_id'],
                    'msg'=>"返回专题编辑页面",
                )
            );
            showMessage("专题导航删除成功",$url);
        }else {
            showMessage($lang['navigation_index_choose_del']);
        }
    }
    /*
     * 专题导航添加
     */
    public function navigation_addOp(){
        $lang	= Language::getLangContent();
        Language::read('navigation');
        $model_navigation = Model('navigation');
        $special_id=$_REQUEST['special_id'];
        if (chksubmit()){
            if(empty($special_id)){
                showMessage(Language::get('param_error'),'','','error');
            }
            /**
             * 验证
             */
            $obj_validate = new Validate();
            $obj_validate->validateparam = array(
                array("input"=>$_POST["nav_title"], "require"=>"true", "message"=>$lang['navigation_add_partner_null']),
                array("input"=>$_POST["nav_sort"], "require"=>"true", 'validator'=>'Number', "message"=>$lang['navigation_add_sort_int']),
            );
            switch ($_POST['nav_type']){
                /**
                 * 自定义
                 */
                case '0':
                    //$obj_validate->setValidate(array("input"=>$_POST["nav_url"], 'validator'=>'Url', "message"=>$lang['navigation_add_url_wrong']));
                    break;
                    /**
                     * 商品分类
                     */
                case '1':
                    $obj_validate->setValidate(array("input"=>$_POST["goods_class_id"], "require"=>"true", "message"=>$lang['navigation_add_goods_class_null']));
                    break;
                    /**
                     * 文章分类
                     */
                case '2':
                    $obj_validate->setValidate(array("input"=>$_POST["article_class_id"], "require"=>"true", "message"=>$lang['navigation_add_article_class_null']));
                    break;
                    /**
                     * 活动
                     */
                case '3':
                    $obj_validate->setValidate(array("input"=>$_POST["activity_id"], "require"=>"true", "message"=>$lang['navigation_add_activity_null']));
                    break;
                    /**
                     * 视频分类
                     */
                case '4':
                    $obj_validate->setValidate(array("input"=>$_POST["video_class_id"], "require"=>"true", "message"=>$lang['navigation_add_video_class_null']));
                    break;
            }
        
            $error = $obj_validate->validate();
            if ($error != ''){
                showMessage($error);
            }else {
        
                $insert_array = array();
                $insert_array['nav_type'] = trim($_POST['nav_type']);
                $insert_array['nav_title'] = trim($_POST['nav_title']);
                $insert_array['nav_location'] = trim($_POST['nav_location']);
                $insert_array['nav_new_open'] = trim($_POST['nav_new_open']);
                $insert_array['nav_sort'] = trim($_POST['nav_sort']);
                $insert_array['special_id']=$special_id;
                switch ($_POST['nav_type']){
                    /**
                     * 自定义
                     */
                    case '0':
                        $insert_array['nav_url'] = trim($_POST['nav_url']);
                        break;
                        /**
                         * 商品分类
                         */
                    case '1':
                        $insert_array['item_id'] = intval($_POST['goods_class_id']);
                        break;
                        /**
                         * 文章分类
                         */
                    case '2':
                        $insert_array['item_id'] = intval($_POST['article_class_id']);
                        break;
                        /**
                         * 活动
                         */
                    case '3':
                        $insert_array['item_id'] = intval($_POST['activity_id']);
                        break;
                        /**
                         * 视频分类
                         */
                    case '4':
                        $insert_array['item_id'] = intval($_POST['video_class_id']);
                        break;
                }
        
                $result = $model_navigation->add($insert_array);
                if ($result){
                    dkcache('nav');
                    $url = array(
                        array(
                            'url'=>'index.php?act=web_special&op=navigation_add',
                            'msg'=>"继续添加",
                        ),
                        array(
                            'url'=>'index.php?act=web_special&op=special_edit&special_id='.$special_id,
                            'msg'=>"返回专题编辑页面",
                        )
                    );
                    $this->log("专题导航添加成功".'['.$_POST['nav_title'].']',null);
                    showMessage("专题导航添加成功",$url,"html","succ",1,200000);
                }else {
                    showMessage("专题导航添加失败");
                }
            }
        }
        /**
         * 商品分类
         */
        $model_goods_class = Model('goods_class');
        $goods_class_list = $model_goods_class->getTreeClassList(3);
        if (is_array($goods_class_list)){
            foreach ($goods_class_list as $k => $v){
                $goods_class_list[$k]['gc_name'] = str_repeat("&nbsp;",$v['deep']*2).$v['gc_name'];
            }
        }
        /**
         * 文章分类
         */
        $model_article_class = Model('article_class');
        $article_class_list = $model_article_class->getTreeClassList(2);
        if (is_array($article_class_list)){
            foreach ($article_class_list as $k => $v){
                $article_class_list[$k]['ac_name'] = str_repeat("&nbsp;",$v['deep']*2).$v['ac_name'];
            }
        }
        /**
         * 视频分类
         */
        $model_video_class = Model('video_class');
        $video_class_list = $model_video_class->getTreeClassList(2);
        if (is_array($video_class_list)){
            foreach ($video_class_list as $k => $v){
                $video_class_list[$k]['vd_name'] = str_repeat("&nbsp;",$v['deep']*2).$v['vd_name'];
            }
        }
        /**
         * 活动
         */
        $activity	= Model('activity');
        $activity_list	= $activity->getList(array('opening'=>true,'order'=>'activity.activity_sort'));
        Tpl::output('activity_list',$activity_list);
        Tpl::output('goods_class_list',$goods_class_list);
        Tpl::output('article_class_list',$article_class_list);
        Tpl::output('video_class_list',$video_class_list);
        Tpl::output("special_type",$_REQUEST['special_type']);
        Tpl::output("special_navigation","1");
        Tpl::showpage('navigation.add');
    }
    /*
     * 专题文章推荐
     */
    public function special_articleOp(){
        if(empty($_POST['article_id'])||!is_array($_POST['article_id'])){
             showMessage(Language::get('param_error'),'','','error');
        }
        
        var_dump($_POST['article_id']);
        
    }
    /**
     * 上传图片
     */
    private function special_image_upload($image) {
        if(!empty($_FILES[$image]['name'])) {
            $upload	= new UploadFile();
            $upload->set('default_dir',ATTACH_CMS.DS.'special');
            $result = $upload->upfile($image);
            if(!$result) {
                showMessage($upload->error);
            }
            return $upload->file_name;
        }
    }
    /**
     * 图片删除
     */
    private function special_image_drop($image) {
        $file = getCMSSpecialImagePath($image);
        if(is_file($file)) {
            unlink($file);
        }
    }
    private function show_menu($menu_key) {
        $menu_array = array(
            'special_list'=>array('menu_type'=>'link','menu_name'=>Language::get('nc_manage'),'menu_url'=>'index.php?act=web_special&op=special_list'),
            'special_add'=>array('menu_type'=>'link','menu_name'=>Language::get('nc_new'),'menu_url'=>'index.php?act=web_special&op=special_add'),
            'special_edit'=>array('menu_type'=>'link','menu_name'=>Language::get('nc_edit'),'menu_url'=>'###'),
        );
        if($menu_key != 'special_edit') {
            unset($menu_array['special_edit']);
        }
        $menu_array[$menu_key]['menu_type'] = 'text';
        Tpl::output('menu',$menu_array);
    }
    /*
     * 保存焦点区切换大图
     */
    public function screen_picOp(){
        $special_id = intval($_POST['special_id']);
        $code_id = intval($_POST['code_id']);
        $special_code_model=Model('special_code');
        $code = $special_code_model->getCodeRow($code_id,$special_id);
        if(!empty($code)){
            $code_type = $code['code_type'];
            $var_name = $code['var_name'];
            $code_info = $_POST[$var_name];
            $key = intval($_POST['key']);
            $ap_pic_id = intval($_POST['ap_pic_id']);
            if ($ap_pic_id > 0 && $ap_pic_id == $key) {
                $ap_color = $_POST['ap_color'];
                $code_info[$ap_pic_id]['color'] = $ap_color;
                Tpl::output('ap_pic_id',$ap_pic_id);
                Tpl::output('ap_color',$ap_color);
            }
            $pic_id = intval($_POST['screen_id']);
            if ($pic_id > 0 && $pic_id == $key) {
                $var_name = "screen_pic";
                $pic_info = $_POST[$var_name];
                $pic_info['pic_id'] = $pic_id;
                if (!empty($code_info[$pic_id]['pic_img'])) {//原图片
                    $pic_info['pic_img'] = $code_info[$pic_id]['pic_img'];
                }
                $file_name = 'web-'.$special_id.'-'.$code_id.'-'.$pic_id;
                $pic_name = $this->_upload_pic($file_name);//上传图片
                if (!empty($pic_name)) {
                				$pic_info['pic_img'] = $pic_name;
                }
            
                $code_info[$pic_id] = $pic_info;
                Tpl::output('pic',$pic_info);
                Tpl::output('flag',$flag);
            }
            $code_info = $special_code_model->get_str($code_info,$code_type);
            $special_code_model->updateCode(array('code_id'=> $code_id),array('code_info'=> $code_info));
            Tpl::output("obj_name",$_POST['obj_name']);
            Tpl::showpage('special_upload_screen','null_layout');
        }
    }
    /*
     * 上传联动图片
     */
    public function focus_picOp(){
        $code_id = intval($_POST['code_id']);
        $special_id = intval($_POST['special_id']);
        $special_code_model=Model('special_code');
        $code = $special_code_model->getCodeRow($code_id,$special_id);
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
            $code_info = $special_code_model->get_str($code_info,$code_type);
 
            $special_code_model->updateCode(array('code_id'=> $code_id),array('code_info'=> $code_info));
            Tpl::output("obj_name",$_POST['obj_name']);
            Tpl::showpage('special_upload_focus','null_layout');
        }
    }
    /*
     * banner上传图片
     */
    
    private function _upload_pic($file_name) {
        $pic_name = '';
        if (!empty($file_name)) {
            if (!empty($_FILES['pic']['name'])) {//上传图片
                $upload = new UploadFile();
                $filename_tmparr = explode('.', $_FILES['pic']['name']);
                $ext = end($filename_tmparr);
                $upload->set('default_dir',ATTACH_EDITOR);
                $upload->set('file_name',$file_name.".".$ext);
                $result = $upload->upfile('pic');
                if ($result) {
                    $pic_name = ATTACH_EDITOR."/".$upload->file_name.'?'.mt_rand(100,999);//加随机数防止浏览器缓存图片
                }
            }
        }
        return $pic_name;
    }
    /**
     * ajax操作
     */
    public function ajaxOp(){
        switch ($_GET['branch']){
            /**
             * 页面导航 排序
             */
            case 'nav_sort':
                $model_navigation = Model('navigation');
                $update_array = array();
                $update_array['nav_id'] = intval($_GET['id']);
                $update_array[$_GET['column']] = trim($_GET['value']);
                $result = $model_navigation->update($update_array);
                dkcache('nav');
                echo 'true';exit;
                break;
        }
    }
    
}