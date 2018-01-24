<?php
/**
 * cms文章分类
 *
 *
 *
 *
 * by 33hao www.33hao.com 开发修正
 */



defined('InShopNC') or exit('Access Invalid!');
class cms_articleControl extends SystemControl{
    //文章状态草稿箱
    const ARTICLE_STATE_DRAFT = 1;
    //文章状态待审核
    const ARTICLE_STATE_VERIFY = 2;
    //文章状态已发布
    const ARTICLE_STATE_PUBLISHED = 3;
    //文章状态回收站
    const ARTICLE_STATE_RECYCLE = 4;

	public function __construct(){
		parent::__construct();
		Language::read('cms');
	}

	public function indexOp() {
        $this->cms_article_listOp();
	}

    /**
     * cms文章列表
     **/
    public function cms_article_listOp() {
        $condition = array();
        if(!empty($_GET['article_state'])) {
            $condition['article_state'] = $_GET['article_state'];
        }
        $this->get_cms_article_list($condition, 'list');
    }

    /**
     * 待审核文章列表
     */
    public function cms_article_list_verifyOp() {
        $condition = array();
        $condition['article_state'] = self::ARTICLE_STATE_VERIFY;
        $this->get_cms_article_list($condition, 'list_verify');
    }

    /**
     * 已发布文章列表
     */
    public function cms_article_list_publishedOp() {
        $condition = array();
        $condition['article_state'] = self::ARTICLE_STATE_PUBLISHED;
        $this->get_cms_article_list($condition, 'list_published');
    }

    private function get_cms_article_list($condition, $menu_key) {
        if(!empty($_GET['article_title'])) {
            $condition['article_title'] = array('like', '%'.$_GET['article_title'].'%');
        }
        if(!empty($_GET['article_publisher_name'])) {
            $condition['article_publisher_name'] = array('like', '%'.$_GET['article_publisher_name'].'%');
        }

        $model_article = Model('cms_article');
        $article_list = $model_article->getList($condition, 10, 'article_id desc');
       
       
        for ($i = 0, $j = count($article_list); $i < $j; $i++) {
            if($article_list[$i]['article_state'] == self::ARTICLE_STATE_VERIFY) {
                $article_list[$i]['verify_able'] = true;
            }
            if($article_list[$i]['article_state'] == self::ARTICLE_STATE_PUBLISHED) {
                $article_list[$i]['callback_able'] = true;
            }
        }
        $this->show_menu($menu_key);
        Tpl::output('show_page',$model_article->showpage(2));
        Tpl::output('list',$article_list);
        Tpl::output('article_state_list', $this->get_article_state_list());
        Tpl::showpage("cms_article.list");
    }
    /**
     * cms文章新增
     */
    public function cms_article_list_addOp(){
        $cms_article_class_model=Model("cms_article_class");
        if(chksubmit()){//是否提交
            if(empty($_POST['article_title'])) {
                showMessage("文章标题为空",'','','error');
            }
            //插入文章
            $insert_array=array();
            $insert_array['article_class_id']=intval($_POST['class_id']);
            $insert_array['article_title']=trim($_POST['article_title']);
            if(empty($_POST['article_title_short'])){
                $insert_array['article_title_short']=mb_substr($_POST['article_title'], 0, 12, CHARSET);
            }else{
                $insert_array['article_title_short']=$_POST['article_title_short'];
            }
            $insert_array['article_abstract']=trim($_POST['article_abstract']);
            $insert_array['article_author'] = trim($_POST['article_author']);
            $insert_array['article_origin_address']=trim($_POST['article_url']);
            $insert_array['article_content'] = trim($_POST['article_content']);
            $insert_array['article_link'] = trim($_POST['article_link']);//相关文章
            $admin_info=$this->getAdminInfo();
            $insert_array['article_publisher_name'] = $admin_info['name'];
            $insert_array['article_publisher_id'] = $admin_info['id'];
            $insert_array['article_type'] = 1;
            $insert_array['article_attachment_path'] = $admin_info['id'];
            $insert_array['article_sort'] = 255;
            $insert_array['article_commend_flag'] = intval($_POST['article_recommend']);
            $insert_array['article_tag'] = trim($_POST['tag_id']);
            //文章图片
            if(!empty($_POST['file_id'])) {
                $article_image_all = array();
                foreach ($_POST['file_id'] as $value) {
                    list($file_name, $file_path) = explode(',', $value);
                    $file_path = empty($file_path)?$this->attachment_path:$file_path;
                    $article_image_url = getCMSArticleImageUrl($file_path, $file_name, 'max');
                    list($width, $height, $type, $attr) = getimagesize($article_image_url);
                    $article_image_all[$file_name]['name'] = $file_name;
                    $article_image_all[$file_name]['width'] = $width;
                    $article_image_all[$file_name]['height'] = $height;
                    $article_image_all[$file_name]['path'] = $file_path;
                }
                $insert_array['article_image_all'] = serialize($article_image_all);
            }
            //封面
            if(!empty($_POST['article_image'])) {
                $insert_array['article_image'] = serialize($article_image_all[$_POST['article_image']]);
            }
            //文章商品
            if(!empty($_POST['article_goods_url'])) {
                $article_goods_list = array();
                for ($i = 0,$count = count($_POST['article_goods_url']); $i < $count; $i++) {
                    $article_goods = array();
                    $article_goods['url'] = $_POST['article_goods_url'][$i];
                    $article_goods['title'] = $_POST['article_goods_title'][$i];
                    $article_goods['image'] = $_POST['article_goods_image'][$i];
                    $article_goods['price'] = $_POST['article_goods_price'][$i];
                    $article_goods['type'] = $_POST['article_goods_type'][$i];
                    $article_goods_list[] = $article_goods;
                }
            
                if(!empty($article_goods_list)) {
                    $insert_array['article_goods'] = serialize($article_goods_list);
                } else {
                    $insert_array['article_goods'] = '';
                }
            }
            $insert_array['article_publish_time']=time();
            $insert_array['article_state']=$_POST['article_show']?3:2;
            $model_article = Model('cms_article');
            $model_tag_relation = Model('cms_tag_relation');
            $article_id = $model_article->save($insert_array);
           
            //插入文章标签
            if(!empty($_POST['tag_id'])) {
                $tag_list = explode(',', $_POST['tag_id']);
                $param = array();
                $param['relation_type'] = 1;
                $param['relation_object_id'] = $article_id;
                $params = array();
                foreach ($tag_list as $value) {
                    $param['relation_tag_id'] = $value;
                    $params[] = $param;
                }
                $model_tag_relation->saveAll($params);
            }
            if($article_id) {
                $this->log("文章发布成功".'['.$_POST['article_title'].']',null);
                showMessage(Language::get('nc_common_save_succ'),"index.php?act=cms_article&op=cms_article_list");
            } else {
                showMessage(Language::get('nc_common_save_fail'),"index.php?act=cms_article&op=cms_article_list_add",'','error');
            }
            
        }
        $cms_article_class_list=$cms_article_class_model->getTreeClassList(2);
        if(is_array($cms_article_class_list)){
            foreach ($cms_article_class_list as $k=>$v){
                $cms_article_class_list[$k]["class_name"]=str_repeat("&nbsp;", $v['deep']*2).$v['class_name'];
            }
        }
        //文章标签
        $model_tag = Model('cms_tag');
        $tag_list = $model_tag->getList(TRUE, null, 'tag_sort asc');
        Tpl::output('tag_list', $tag_list);
        Tpl::output('admin_info',$this->getAdminInfo());
        Tpl::output("parent_list",$cms_article_class_list);
        Tpl::showpage("cms_article.add");
    }
    /*
     * 文章编辑
     */
    public function cms_article_editOp(){
        $article_id=intval($_GET['article_id']);
        if(empty($article_id)){
            showMessage("参数错误",'','','error');
        }
        if(chksubmit()){//是否提交
            //更新文章
            $update_array=array();
            $update_array['article_class_id']=intval($_POST['class_id']);
            $update_array['article_title']=trim($_POST['article_title']);
            if(empty($_POST['article_title_short'])){
                $update_array['article_title_short']=mb_substr($_POST['article_title'], 0, 12, CHARSET);
            }else{
                $update_array['article_title_short']=$_POST['article_title_short'];
            }
            $update_array['article_abstract']=trim($_POST['article_abstract']);
            $update_array['article_author'] = trim($_POST['article_author']);
            $update_array['article_origin_address']=trim($_POST['article_url']);
            $update_array['article_content'] = trim($_POST['article_content']);
            $update_array['article_link'] = trim($_POST['article_link']);//相关文章
            $admin_info=$this->getAdminInfo();
            $update_array['article_publisher_name'] = $admin_info['name'];
            $update_array['article_publisher_id'] = $admin_info['id'];
            $update_array['article_type'] = 1;
            $update_array['article_attachment_path'] = $admin_info['id'];
            $update_array['article_sort'] = $_POST['article_sort'];
            $update_array['article_commend_flag'] = intval($_POST['article_recommend']);
            $update_array['article_tag'] = trim($_POST['tag_id']);
            //文章图片
            if(!empty($_POST['file_id'])) {
                $article_image_all = array();
                foreach ($_POST['file_id'] as $value) {
                    list($file_name, $file_path) = explode(',', $value);
                    $file_path = empty($file_path)?$this->attachment_path:$file_path;
                    $article_image_url = getCMSArticleImageUrl($file_path, $file_name, 'max');
                    list($width, $height, $type, $attr) = getimagesize($article_image_url);
                    $article_image_all[$file_name]['name'] = $file_name;
                    $article_image_all[$file_name]['width'] = $width;
                    $article_image_all[$file_name]['height'] = $height;
                    $article_image_all[$file_name]['path'] = $file_path;
                }
                $update_array['article_image_all'] = serialize($article_image_all);
            }
            //封面
            if(!empty($_POST['article_image'])) {
                $update_array['article_image'] = serialize($article_image_all[$_POST['article_image']]);
            }
            //文章商品
            if(!empty($_POST['article_goods_url'])) {
                $article_goods_list = array();
                for ($i = 0,$count = count($_POST['article_goods_url']); $i < $count; $i++) {
                    $article_goods = array();
                    $article_goods['url'] = $_POST['article_goods_url'][$i];
                    $article_goods['title'] = $_POST['article_goods_title'][$i];
                    $article_goods['image'] = $_POST['article_goods_image'][$i];
                    $article_goods['price'] = $_POST['article_goods_price'][$i];
                    $article_goods['type'] = $_POST['article_goods_type'][$i];
                    $article_goods_list[] = $article_goods;
                }
            
                if(!empty($article_goods_list)) {
                    $update_array['article_goods'] = serialize($article_goods_list);
                } else {
                    $update_array['article_goods'] = '';
                }
            }
            $update_array['article_publish_time']=time();
            $update_array['article_state']=$_POST['article_show']?3:2;
            $model_article = Model('cms_article');
            $model_tag_relation = Model('cms_tag_relation');
            $condition=array('article_id'=>$article_id);
            $model_article->modify($update_array,$condition);
            $model_tag_relation->drop(array('relation_type'=>1,'relation_object_id'=>$article_id));
            //插入文章标签
            if(!empty($_POST['tag_id'])) {
                $tag_list = explode(',', $_POST['tag_id']);
                $param = array();
                $param['relation_type'] = 1;
                $param['relation_object_id'] = $article_id;
                $params = array();
                foreach ($tag_list as $value) {
                    $param['relation_tag_id'] = $value;
                    $params[] = $param;
                }
                $model_tag_relation->saveAll($params);
            }
            if($article_id) {
                $this->log("文章修改成功".'['.$_POST['article_title'].']',null);
                showMessage(Language::get('nc_common_save_succ'),"index.php?act=cms_article&op=cms_article_list");
            } else {
                showMessage(Language::get('nc_common_save_fail'),"index.php?act=cms_article&op=cms_article_list_add",'','error');
            }
            
            
        }
        //文章分类
        $model_article_class = Model('cms_article_class');
        $article_class_list = $model_article_class->getTreeClassList(2);
        If(is_array($article_class_list)){
            foreach ($article_class_list as $k=>$v){
                $article_class_list[$k]['class_name']=str_repeat("&nbsp;",$v['deep']*2).$v['class_name'];
            }
        }
        //文章标签
        $model_tag = Model('cms_tag');
        $tag_list = $model_tag->getList(TRUE, null, 'tag_sort asc');
        Tpl::output('tag_list', $tag_list);
        //文章详细
        $model_article = Model('cms_article');
        $article_detail = $model_article->getOne(array('article_id'=>$article_id));
        $article_detail['article_image_all']=unserialize($article_detail['article_image_all']);
        $article_detail['article_image']=unserialize( $article_detail['article_image']);
        //相关文章
        $article_link_list = $this->_get_article_link_list($article_detail['article_link']);
        Tpl::output('article_link_list', $article_link_list);
        //相关商品
        $article_goods_list = unserialize($article_detail['article_goods']);
        Tpl::output('article_goods_list', $article_goods_list);
        Tpl::output("article_detail",$article_detail);
        Tpl::output("parent_list",$article_class_list);
        TPl::showpage("cms_article.edit");
    }
    /**
     * cms文章审核
     */
    public function cms_article_verifyOp() {
        if(intval($_POST['verify_state']) === 1) {
            $this->cms_article_state_modify(self::ARTICLE_STATE_PUBLISHED);
        } else {
            $this->cms_article_state_modify(self::ARTICLE_STATE_DRAFT, array('article_verify_reason' => $_POST['verify_reason']));
        }
    }

    /**
     * cms文章收回
     */
    public function cms_article_callbackOp() {
        $this->cms_article_state_modify(self::ARTICLE_STATE_DRAFT);
    }

    /**
     * 修改文章状态
     */
    private function cms_article_state_modify($new_state, $param = array()) {
        $article_id = $_POST['article_id'];
        $model_article = Model('cms_article');
        $param['article_state'] = $new_state;
        $model_article->modify($param, array('article_id'=>array('in', $article_id)));
        showMessage(Language::get('nc_common_op_succ'), '');
    }

    /**
     * cms文章分类排序修改
     */
    public function update_article_sortOp() {
        if(intval($_GET['id']) <= 0) {
            echo json_encode(array('result'=>FALSE,'message'=>Language::get('param_error')));
            die;
        }
        $new_sort = intval($_GET['value']);
        if ($new_sort > 255){
            echo json_encode(array('result'=>FALSE,'message'=>Language::get('class_sort_error')));
            die;
        } else {
            $model_class = Model("cms_article");
            $result = $model_class->modify(array('article_sort'=>$new_sort),array('article_id'=>$_GET['id']));
            if($result) {
                echo json_encode(array('result'=>TRUE,'message'=>'class_add_success'));
                die;
            } else {
                echo json_encode(array('result'=>FALSE,'message'=>Language::get('class_add_fail')));
                die;
            }
        }
    }

    /**
     * cms文章分类排序修改
     */
    public function update_article_clickOp() {
        if(intval($_GET['id']) <= 0 || intval($_GET['value']) < 0) {
            echo json_encode(array('result'=>FALSE,'message'=>Language::get('param_error')));die;
        }
        $model_class = Model("cms_article");
        $result = $model_class->modify(array('article_click'=>$_GET['value']),array('article_id'=>$_GET['id']));
        if($result) {
            echo json_encode(array('result'=>TRUE,'message'=>''));die;
        } else {
            echo json_encode(array('result'=>FALSE,'message'=>Language::get('param_error')));die;
        }
    }


    /**
     * cms文章删除
     **/
     public function cms_article_dropOp() {
        $article_id = trim($_POST['article_id']);
        $model_article = Model('cms_article');
        $article_detail=$model_article->getOne(array('article_id'=>$article_id));
        $image_array=unserialize($article_detail['article_image_all']);
      
        $condition = array();
        $condition['article_id'] = array('in',$article_id);
        $result = $model_article->drop($condition);
        if($result) {//如果删除成功
            if(is_array($image_array)){
                foreach ($image_array as $image){
                     list($name, $ext) = explode(".", $image['name']);
                    $name = str_replace('/', '', $name);
                    $name = str_replace('.', '', $name);
                    $image_name = $name.'.'.$ext;
                    $image_list = $name.'_list.'.$ext;
                    $image_max = $name.'_max.'.$ext;
                    $this->_drop_image("article".DS."admin_".$this->admin_info['id'], $image_name);
                    $this->_drop_image("article".DS."admin_".$this->admin_info['id'], $image_list);
                    $this->_drop_image("article".DS."admin_".$this->admin_info['id'], $image_max);
                }
            }
            $this->log(Language::get('cms_log_article_drop').$article_id, 1);
            showMessage(Language::get('nc_common_del_succ'),'');
        } else {
            $this->log(Language::get('cms_log_article_drop').$article_id, 0);
            showMessage(Language::get('nc_common_del_fail'),'','','error');
        }
     }

    /**
     * ajax操作
     */
    public function ajaxOp(){
        if(intval($_GET['id']) > 0) {
            $flag = FALSE;
            switch ($_GET['branch']){
            case 'article_commend':
                $flag = TRUE;
                break;
            case 'article_commend_image':
                $flag = TRUE;
                break;
            case 'article_comment':
                $flag = TRUE;
                break;
            case 'article_attitude':
                $flag = TRUE;
                break;
            }
            if($flag) {
                $model= Model('cms_article');
                $update[$_GET['column']] = trim($_GET['value']);
                $condition['article_id'] = intval($_GET['id']);
                $model->modify($update,$condition);
                echo 'true';die;
            } else {
                echo 'false';die;
            }
        }
    }


    /**
     * 获取文章状态列表
     */
    private function get_article_state_list() {
        $array = array();
        $array[self::ARTICLE_STATE_DRAFT] = array('text'=>Language::get('cms_text_draft'));
        $array[self::ARTICLE_STATE_VERIFY] = array('text'=>Language::get('cms_text_verify'));
        $array[self::ARTICLE_STATE_PUBLISHED] = array('text'=>Language::get('cms_text_published'));
        $array[self::ARTICLE_STATE_RECYCLE] = array('text'=>Language::get('cms_text_recycle'));
        return $array;
    }

    private function show_menu($menu_key) {
        $menu_array = array(
            'list'=>array('menu_type'=>'link','menu_name'=>Language::get('nc_list'),'menu_url'=>'index.php?act=cms_article&op=cms_article_list'),
            'list_verify'=>array('menu_type'=>'link','menu_name'=>Language::get('cms_article_list_verify'),'menu_url'=>'index.php?act=cms_article&op=cms_article_list_verify'),
            'list_published'=>array('menu_type'=>'link','menu_name'=>Language::get('cms_article_list_published'),'menu_url'=>'index.php?act=cms_article&op=cms_article_list_published'),
            "list_add"=>array('menu_type'=>'link','menu_name'=>"新增",'menu_url'=>'index.php?act=cms_article&op=cms_article_list_add'),
        );

        $menu_array[$menu_key]['menu_type'] = 'text';
        Tpl::output('menu',$menu_array);
    }
    /*
     * 搜索商品
     */
public function goods_listOp() {
		$model_goods = Model('goods');
		$page	= new Page();
		$page->setEachNum(6);
		$page->setStyle('1');
		$condition = array();
        if($_GET['search_type'] == 'goods_url') {
            $condition['goods_id'] = intval($_GET['search_keyword']);
        } else {
            $condition['goods_name'] = trim($_GET['search_keyword']);
        }
		
		$goods_list = $model_goods->getGoodsOnlineList($condition,'*',$page);
		Tpl::output('show_page',$page->show());
		Tpl::output('goods_list',$goods_list);
		Tpl::showpage('api_goods_list','null_layout');
	}
	/**
	 * 文章列表
	 */
	public function article_listOp() {
	    //获取文章列表
	    $condition = array();
	    if($_GET['search_type'] == 'article_id') {
	        $condition['article_id'] = intval($_GET['search_keyword']);
	    } else {
	        $condition['article_title'] = array('like','%'.trim($_GET['search_keyword']).'%');
	    }
	    $condition['article_state'] = self::ARTICLE_STATE_PUBLISHED;
	
	    $model_article = Model('cms_article');
	    $article_list = $model_article->getList($condition , 10, 'article_id desc');
	    Tpl::output('show_page',$model_article->showpage(1));
	    Tpl::output('article_list', $article_list);
	    Tpl::showpage('api_article_list','null_layout');
	}
	/**
	 * 图片商品添加
	 */
	public function goods_info_by_urlOp() {
	    $url = urldecode($_GET['url']);
	    if(empty($url)) {
	        return_json(Language::get('goods_not_exist'), 'false');
	    }
	    $model_goods_info = Model('goods_info_by_url');
	    $result = $model_goods_info->get_goods_info_by_url($url);
	    if($result) {
	        $this->_echo_json($result);
	    } else {
	        $this->_return_json(Language::get('goods_not_exist'), 'false');
	    }
	}
	private function _echo_json($data) {
	    if (strtoupper(CHARSET) == 'GBK'){
	        $data = Language::getUTF8($data);//网站GBK使用编码时,转换为UTF-8,防止json输出汉字问题
	    }
	    echo json_encode($data);die;
	}
	private function _return_json($message,$result='true') {
	    $data = array();
	    $data['result'] = $result;
	    $data['message'] = $message;
	    self::echo_json($data);
	}
	/**
	 * 文章图片上传
	 */
	public function article_image_uploadOp() {
	    $data = array();
	    $data['status'] = 'success';
	    if(!empty($this->admin_info['id'])) {
	        if(!empty($_FILES['fileupload']['name'])) {
	            $upload	= new UploadFile();
	            $upload->set('default_dir',ATTACH_CMS.DS.'article'.DS.'admin_'.$this->admin_info['id']);
	            $upload->set('thumb_width','1024,240');
	            $upload->set('thumb_height', '50000,5000');
	            $upload->set('thumb_ext',	'_max,_list');
	
	            $result = $upload->upfile('fileupload');
	            if(!$result) {
	                $data['status'] = 'fail';
	                $data['error'] = '图片上传失败';
	            }
	            $data['file_name'] = $upload->file_name;
	            $data['origin_file_name'] = $_FILES['fileupload']['name'];
	            $data['file_url'] = getCMSArticleImageUrl("admin_".$this->admin_info['id'], $upload->file_name, 'max');
	            $data['file_path'] = "admin_".$this->admin_info['id'];
	        }
	    } else {
	        $data['status'] = 'fail';
	        $data['error'] = Language::get('no_login');
	    }
	    $this->_echo_json($data);
	}
	
	/**
	 * 文章图片删除
	 */
	public function article_image_dropOp() {
	    $data = array();
	    $data['status'] = 'success';
	    $image_name = $_GET['image_name'];
	
	    list($name, $ext) = explode(".", $image_name);
	    $name = str_replace('/', '', $name);
	    $name = str_replace('.', '', $name);
	    $image = $name.'.'.$ext;
	    $image_list = $name.'_list.'.$ext;
	    $image_max = $name.'_max.'.$ext;
	
	    $this->_drop_image('article'.DS.'admin_'.$this->admin_info['id'], $image);
	    $this->_drop_image('article'.DS.'admin_'.$this->admin_info['id'], $image_list);
	    $this->_drop_image('article'.DS.'admin_'.$this->admin_info['id'], $image_max);
	    $this->_echo_json($data);
	}
	private function _drop_image($attachment_path, $image_name) {
        $image = BASE_UPLOAD_PATH.DS.ATTACH_CMS.DS.$attachment_path.DS.$image_name;
        if(is_file($image)) {
            unlink($image);
        }
    }
    /**
     * 获取文章相关文章
     */
    private function _get_article_link_list($article_link) {
        $article_link_list = array();
        if(!empty($article_link)) {
            $model_article = Model('cms_article');
            $condition = array();
            $condition['article_id'] = array("in",$article_link);
            $condition['article_state'] = 3;
            $article_link_list = $model_article->getList($condition , NULL, 'article_id desc');
        }
        return $article_link_list;
    }
}
