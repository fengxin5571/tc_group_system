<?php 
/**
 * 视频管理
 *
 *
 *
 **by 太常系统 www.sxtaichang.com*/

defined('InShopNC') or exit('Access Invalid!');
class videoControl extends SystemControl{
    public function __construct(){
        parent::__construct();
        Language::read("article");
    }
    /*
    **
    * 视频管理
    */
    public function videoOp(){
        $lang	= Language::getLangContent();
        $model_article = Model('video');
        /**
         * 删除
         */
        if (chksubmit()){
            if (is_array($_POST['del_id']) && !empty($_POST['del_id'])){
                $model_upload = Model('upload');
                foreach ($_POST['del_id'] as $k => $v){
                    $v = intval($v);
                    /**
                     * 删除图片
                     */
                    $condition['upload_type'] = '1';
                    $condition['item_id'] = $v;
                    $upload_list = $model_upload->getUploadList($condition);
                    if (is_array($upload_list)){
                        foreach ($upload_list as $k_upload => $v_upload){
                            $model_upload->del($v_upload['upload_id']);
                            @unlink(BASE_UPLOAD_PATH.DS.ATTACH_ARTICLE.DS.$v_upload['file_name']);
                        }
                    }
                    $video_info=$model_article->getOneArticle($v);
                    if($video_info['video_ad_url']){
                        @unlink(iconv ( 'UTF-8', 'GBK', BASE_UPLOAD_PATH.DS.DS.'video'.DS.$video_info['video_ad_url']));
                    }
                    $model_article->del($v);
                }
                $this->log(L('article_index_del_succ').'[ID:'.implode(',',$_POST['del_id']).']',null);
                showMessage($lang['article_index_del_succ']);
            }else {
                showMessage($lang['article_index_choose']);
            }
        }
        /**
         * 检索条件
         */
        $condition['vd_id'] = intval($_GET['search_vd_id']);
        $condition['like_title'] = trim($_GET['search_title']);
        /**
         * 分页
         */
        $page	= new Page();
        $page->setEachNum(10);
        $page->setStyle('admin');
        /**
         * 列表
         */
        $article_list = $model_article->getVideoList($condition,$page);
        /**
         * 整理列表内容
         */
        if (is_array($article_list)){
            /**
             * 取文章分类
             */
            $model_class = Model('video_class');
            $class_list = $model_class->getClassList($condition);
            $tmp_class_name = array();
            if (is_array($class_list)){
                foreach ($class_list as $k => $v){
                    $tmp_class_name[$v['vd_id']] = $v['vd_name'];
                }
            }
    
            foreach ($article_list as $k => $v){
                /**
                 * 发布时间
                 */
                $article_list[$k]['video_time'] = date('Y-m-d H:i:s',$v['video_time']);
                /**
                 * 所属分类
                 */
                if (@array_key_exists($v['vd_id'],$tmp_class_name)){
                    $article_list[$k]['vd_name'] = $tmp_class_name[$v['vd_id']];
                }
            }
        }
        /**
         * 分类列表
         */
        $model_class = Model('video_class');
        $parent_list = $model_class->getTreeClassList(2);
        if (is_array($parent_list)){
            $unset_sign = false;
            foreach ($parent_list as $k => $v){
                $parent_list[$k]['vd_name'] = str_repeat("&nbsp;",$v['deep']*2).$v['vd_name'];
            }
        }
        /*
         * 获取专题项目
         */
        $special_model=Model("special");
        $condition=array('special_state'=>2);
        $special_list=$special_model->getList($condition);
        Tpl::output("special_list",$special_list);
        Tpl::output('article_list',$article_list);
        Tpl::output('page',$page->show());
        Tpl::output('search_title',trim($_GET['search_title']));
        Tpl::output('search_vd_id',intval($_GET['search_vd_id']));
        Tpl::output('parent_list',$parent_list);
        Tpl::showpage('video.index');
    }
    /**
     * 视频添加
     */
    public function video_addOp(){
        $lang	= Language::getLangContent();
        $model_article = Model('video');
        /**
         * 保存
         */
        if (chksubmit()){
            /**
             * 验证
             */
            $obj_validate = new Validate();
            $obj_validate->validateparam = array(
                array("input"=>$_POST["video_title"], "require"=>"true", "message"=>$lang['article_add_title_null']),
                array("input"=>$_POST["vd_id"], "require"=>"true", "message"=>$lang['article_add_class_null']),
                //array("input"=>$_POST["article_url"], 'validator'=>'Url', "message"=>$lang['article_add_url_wrong']),
                array("input"=>$_POST["video_content"], "require"=>"true", "message"=>$lang['article_add_content_null']),
                array("input"=>$_POST["video_sort"], "require"=>"true", 'validator'=>'Number', "message"=>$lang['article_add_sort_int']),
            );
            $error = $obj_validate->validate();
            if ($error != ''){
                showMessage($error);
            }else {
    
                $insert_array = array();
                $insert_array['video_title'] = trim($_POST['video_title']);
                $insert_array['vd_id'] = intval($_POST['vd_id']);
                $insert_array['video_url'] = trim($_POST['video_url']);
                $insert_array['video_show'] = trim($_POST['video_show']);
                $insert_array['video_sort'] = trim($_POST['video_sort']);
                $insert_array['video_content'] = trim($_POST['video_content']);
                $insert_array['video_time'] = time();
                $insert_array['video_recommend']= intval($_POST['video_recommend']);
                $insert_array['video_ad_url'] = trim($_POST['video_ad_url']);
                $result = $model_article->add($insert_array);
                if ($result){
                    /**
                     * 更新图片信息ID
                     */
                    $model_upload = Model('upload');
                    if (is_array($_POST['file_id'])){
                        foreach ($_POST['file_id'] as $k => $v){
                            $v = intval($v);
                            $update_array = array();
                            $update_array['upload_id'] = $v;
                            $update_array['item_id'] = $result;
                            $update_array['upload_type'] = 7;
                            $model_upload->update($update_array);
                            unset($update_array);
                        }
                    }
    
                    $url = array(
                        array(
                            'url'=>'index.php?act=video&op=video',
                            'msg'=>"{$lang['article_add_tolist']}",
                        ),
                        array(
                            'url'=>'index.php?act=video&op=video_add&vd_id='.intval($_POST['vd_id']),
                            'msg'=>"{$lang['article_add_continueadd']}",
                        ),
                        );
                    $this->log(L('article_add_ok').'['.$_POST['article_title'].']',null);
                    showMessage("视频添加成功",$url);
                }else {
                    showMessage("视频添加失败");
                }
            }
        }
        /**
         * 分类列表
         */
        $model_class = Model('video_class');
        $parent_list = $model_class->getTreeClassList(2);
        if (is_array($parent_list)){
            $unset_sign = false;
            foreach ($parent_list as $k => $v){
                $parent_list[$k]['vd_name'] = str_repeat("&nbsp;",$v['deep']*2).$v['vd_name'];
            }
        }
        /**
         * 模型实例化
         */
        $model_upload = Model('upload');
        $condition['upload_type'] = '7';
        $condition['item_id'] = '0';
        $file_upload = $model_upload->getUploadList($condition);
        if (is_array($file_upload)){
            foreach ($file_upload as $k => $v){
                $file_upload[$k]['upload_path'] = UPLOAD_SITE_URL.'/'.ATTACH_ARTICLE.'/'.$file_upload[$k]['file_name'];
            }
        }
        /*
         * 获取专题项目
         */
        $special_model=Model("special");
        $condition=array('special_state'=>2);
        $special_list=$special_model->getList($condition);
        Tpl::output('PHPSESSID',session_id());
        Tpl::output('vd_id',intval($_GET['vd_id']));
        TPl::output("special_list",$special_list);
        Tpl::output('parent_list',$parent_list);
        Tpl::output('file_upload',$file_upload);
        Tpl::showpage('video.add');
    }
    /**
     * 视频编辑
     */
    public function video_editOp(){
        $lang	 = Language::getLangContent();
        $model_article = Model('video');
    
        if (chksubmit()){
            /**
             * 验证
             */
            $obj_validate = new Validate();
            $obj_validate->validateparam = array(
                array("input"=>$_POST["video_title"], "require"=>"true", "message"=>$lang['article_add_title_null']),
                array("input"=>$_POST["vd_id"], "require"=>"true", "message"=>$lang['article_add_class_null']),
                //array("input"=>$_POST["article_url"], 'validator'=>'Url', "message"=>$lang['article_add_url_wrong']),
                array("input"=>$_POST["video_content"], "require"=>"true", "message"=>$lang['article_add_content_null']),
                array("input"=>$_POST["video_sort"], "require"=>"true", 'validator'=>'Number', "message"=>$lang['article_add_sort_int']),
            );
            $error = $obj_validate->validate();
            if ($error != ''){
                showMessage($error);
            }else {
    
                $update_array = array();
                $update_array['video_id'] = intval($_POST['video_id']);
                $update_array['video_title'] = trim($_POST['video_title']);
                $update_array['vd_id'] = intval($_POST['vd_id']);
                $update_array['video_url'] = trim($_POST['video_url']);
                $update_array['video_show'] = trim($_POST['video_show']);
                $update_array['video_sort'] = trim($_POST['video_sort']);
                $update_array['video_content'] = trim($_POST['video_content']);
                $update_array['video_ad_url'] = trim($_POST['video_ad_url']);
                $update_array['video_recommend']=intval($_POST['video_recommend']);
                
                if(!empty($_POST['video_ad_url_old'])&&$_POST['video_ad_url']!=$_POST['video_ad_url_old']){//如果修改过视频，则删除原来的视频
                    @unlink(BASE_UPLOAD_PATH.DS.DS.'video'.DS.$_POST['video_ad_url_old']);
                }
                $result = $model_article->update($update_array);
                if ($result){
                    /**
                     * 更新图片信息ID
                     */
                    $model_upload = Model('upload');
                    if (is_array($_POST['file_id'])){
                        foreach ($_POST['file_id'] as $k => $v){
                            $update_array = array();
                            $update_array['upload_id'] = intval($v);
                            $update_array['item_id'] = intval($_POST['video_id']);
                            $update_array['upload_type'] = 7;
                            $model_upload->update($update_array);
                            unset($update_array);
                        }
                    }
    
                    $url = array(
                        array(
                            'url'=>$_POST['ref_url'],
                            'msg'=>$lang['article_edit_back_to_list'],
                        ),
                        array(
                            'url'=>'index.php?act=video&op=video_edit&video_id='.intval($_POST['video_id']),
                            'msg'=>$lang['article_edit_edit_again'],
                        ),
                    );
                    $this->log(L('article_edit_succ').'['.$_POST['video_title'].']',null);
                    showMessage("视频编辑成功",$url);
                }else {
                    showMessage("视频编辑失败");
                }
            }
        }
    
        $article_array = $model_article->getOneArticle(intval($_GET['video_id']));
        if (empty($article_array)){
            showMessage($lang['param_error']);
        }
        /**
         * 文章类别模型实例化
         */
        $model_class = Model('video_class');
        /**
         * 父类列表，只取到第一级
         */
        $parent_list = $model_class->getTreeClassList(2);
        if (is_array($parent_list)){
            $unset_sign = false;
            foreach ($parent_list as $k => $v){
                $parent_list[$k]['vd_name'] = str_repeat("&nbsp;",$v['deep']*2).$v['vd_name'];
            }
        }
        /**
         * 模型实例化
         */
        $model_upload = Model('upload');
        $condition['upload_type'] = '7';
        $condition['item_id'] = $article_array['video_id'];
        $file_upload = $model_upload->getUploadList($condition);
        if (is_array($file_upload)){
            foreach ($file_upload as $k => $v){
                $file_upload[$k]['upload_path'] = UPLOAD_SITE_URL.'/'.ATTACH_ARTICLE.'/'.$file_upload[$k]['file_name'];
            }
        }
        /*
         * 获取专题项目
         */
        $special_model=Model("special");
        $condition=array('special_state'=>2);
        $special_list=$special_model->getList($condition);
        Tpl::output("special_list",$special_list);
        Tpl::output('PHPSESSID',session_id());
        Tpl::output('file_upload',$file_upload);
        Tpl::output('parent_list',$parent_list);
        Tpl::output('article_array',$article_array);
        Tpl::showpage('video.edit');
    }
    /**
     * 文章图片上传
     */
    public function video_pic_uploadOp(){
        /**
         * 上传图片
         */
        $upload = new UploadFile();
        $upload->set('default_dir',ATTACH_ARTICLE);
        $result = $upload->upfile('fileupload');
        if ($result){
            $_POST['pic'] = $upload->file_name;
        }else {
            echo 'error';exit;
        }
        /**
         * 模型实例化
         */
        $model_upload = Model('upload');
        /**
         * 图片数据入库
         */
        $insert_array = array();
        $insert_array['file_name'] = $_POST['pic'];
        $insert_array['upload_type'] = '7';
        $insert_array['file_size'] = $_FILES['fileupload']['size'];
        $insert_array['upload_time'] = time();
        $insert_array['item_id'] = intval($_POST['item_id']);
        $result = $model_upload->add($insert_array);
        if ($result){
            $data = array();
            $data['file_id'] = $result;
            $data['file_name'] = $_POST['pic'];
            $data['file_path'] = $_POST['pic'];
            /**
             * 整理为json格式
             */
            $output = json_encode($data);
            echo $output;
        }
    
    }
    /**
     * ajax操作
     */
    public function ajaxOp(){
        switch ($_GET['branch']){
            /**
             * 删除文章图片
             */
            case 'del_file_upload':
                if (intval($_GET['file_id']) > 0){
                    $model_upload = Model('upload');
                    /**
                     * 删除图片
                     */
                    $file_array = $model_upload->getOneUpload(intval($_GET['file_id']));
                    @unlink(BASE_UPLOAD_PATH.DS.ATTACH_ARTICLE.DS.$file_array['file_name']);
                    /**
                     * 删除信息
                     */
                    $model_upload->del(intval($_GET['file_id']));
                    echo 'true';exit;
                }else {
                    echo 'false';exit;
                }
                break;
        }
    }
    /*
     * 上传视频
     */
    public function  update_videoOp(){
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        @set_time_limit(5 * 60);
        $targetDir = BASE_UPLOAD_PATH.DS.'video_tmp';
        $uploadDir = BASE_UPLOAD_PATH.DS.DS.'video';
        $cleanupTargetDir = true; // Remove old files
        $maxFileAge = 5 * 3600; // Temp file age in seconds
        if (!file_exists($targetDir)) {
            @mkdir($targetDir);
        }
        // Create target dir
        if (!file_exists($uploadDir)) {
            @mkdir($uploadDir);
        }
        // Get a file name
        if (isset($_REQUEST["name"])) {
            $fileName = $_REQUEST["name"];
        } elseif (!empty($_FILES)) {
            $fileName = $_FILES["file"]["name"];
        } else {
            $fileName = uniqid("video_");
        }
        
        $filePath =$targetDir . DIRECTORY_SEPARATOR . $fileName;
        $uploadPath =  $uploadDir . DIRECTORY_SEPARATOR . $fileName;
       
        // Chunking might be enabled
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;
        // Remove old temp files
        if ($cleanupTargetDir) {
            if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "打开临时目录失败."}, "id" : "id"}');
            }
        
            while (($file = readdir($dir)) !== false) {
                $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;
        
                // If temp file is current file proceed to the next
                if ($tmpfilePath == "{$filePath}_{$chunk}.part" || $tmpfilePath == "{$filePath}_{$chunk}.parttmp") {
                    continue;
                }
        
                // Remove temp file if it is older than the max age and is not the current file
                if (preg_match('/\.(part|parttmp)$/', $file) && (@filemtime($tmpfilePath) < time() - $maxFileAge)) {
                    @unlink($tmpfilePath);
                }
            }
            closedir($dir);
        }
        // Open temp file
        if (!$out = @fopen(iconv ( 'UTF-8', 'GBK', "{$filePath}_{$chunk}.parttmp" ), "wb")) {
            die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "打开输出流失败."}, "id" : "id"}');
        }
        
        if (!empty($_FILES)) {
            if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
                file_put_contents("d://text", $_FILES["file"]["error"]);
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "移动上传文件失败."}, "id" : "id"}');
            }
        
            // Read binary input stream and append it to temp file
            
            if (!$in = @fopen(iconv ( 'UTF-8', 'GBK', $_FILES["file"]["tmp_name"]), "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "打开输入流失败."}, "id" : "id"}');
            }
        } else {
            if (!$in = @fopen("php://input", "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "打开输入流失败."}, "id" : "id"}');
            }
        }
        while ($buff = fread($in, 4096)) {
            fwrite($out, $buff);
        }
        @fclose($out);
        @fclose($in);
        //iconv ( 'UTF-8', 'GBK', "{$filePath}_{$chunk}.part");
        rename(iconv ( 'UTF-8', 'GBK', "{$filePath}_{$chunk}.parttmp"), iconv ( 'UTF-8', 'GBK', "{$filePath}_{$chunk}.part"));
        $index = 0;
        $done = true;
        for( $index = 0; $index < $chunks; $index++ ) {
            if ( !file_exists(iconv ( 'UTF-8', 'GBK', "{$filePath}_{$index}.part" )) ) {
                $done = false;
                break;
            }
        }
        if ( $done ) {
            
            if (!$out = @fopen(iconv ( 'UTF-8', 'GBK', $uploadPath), "wb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
            }
            
            if ( flock($out, LOCK_EX) ) {
                for( $index = 0; $index < $chunks; $index++ ) {
                    if (!$in = @fopen(iconv ( 'UTF-8', 'GBK', "{$filePath}_{$index}.part" ), "rb")) {
                        break;
                    }
        
                    while ($buff = fread($in, 4096)) {
                        fwrite($out, $buff);
                    }
        
                    @fclose($in);
                    @unlink(iconv ( 'UTF-8', 'GBK', "{$filePath}_{$index}.part" ));
                }
        
                flock($out, LOCK_UN);
            }
            @fclose($out);
        }
        // Return Success JSON-RPC response
        die('{"jsonrpc" : "2.0", "result" : '.$fileName.', "id" : "id"}');
    }
}
?>