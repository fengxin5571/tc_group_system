<?php
/**
 * 会员管理
 *
 * by www.33hao.com 33hao 开发调试*/


defined('InShopNC') or exit('Access Invalid!');
class store_member_manageControl extends BaseSellerControl{
    /**
     * 构造方法
     *
     */
    public function __construct() {
        parent::__construct();
    }
    /*
     * 店铺会员列表
     */
    public function store_member_listOp(){
        $member_model=Model("member");
        /*
         * 筛选条件
         */
        switch ($_REQUEST['search_type']){
            case 1;
            $condition['member_card']=trim($_REQUEST['keyword']);
            break;
            case 2;
            $condition['member_mobile']=trim($_REQUEST['keyword']);
            break;
            case 3;
            $condition['member_truename']=trim($_REQUEST['keyword']);
            break;
            
        }
        $this->profile_menu('store_member_list');
        $condition['from_store']=$_SESSION['store_id'];
        $store_member_list=$member_model->getMemberList($condition,"*",10);
        //整理会员信息
        if (is_array($store_member_list)){
            foreach ($store_member_list as $k=> $v){
                $store_member_list[$k]['member_time'] = $v['member_time']?date('Y-m-d H:i:s',$v['member_time']):'';
                $store_member_list[$k]['member_login_time'] = $v['member_login_time']?date('Y-m-d H:i:s',$v['member_login_time']):'';
                $store_member_list[$k]['member_grade'] = ($t = $member_model->getOneMemberGrade($v['member_exppoints'], false, $member_grade))?$t['level_name']:'';
            }
        }
        Tpl::output("store_member_list",$store_member_list);
        Tpl::output("show_page",$member_model->showpage());
        Tpl::showpage("store_member.list");
    }
    /*
     * 会员开卡
     */
    public  function member_addOp(){
        if(chksubmit()){
            $member_model=Model("member");
            $insert_array = array();
            
            $insert_array['member_name']=$_POST['member_name']? trim($_POST['member_name']):$_POST['member_mobile'];
            $insert_array['member_passwd']=$_POST['member_passwd']? trim($_POST['member_passwd']):'123456';
            $insert_array['member_truename']= trim($_POST['member_truename']);
            $insert_array['member_email']	= trim($_POST['member_email']);
            $insert_array['member_sex'] 	= trim($_POST['member_sex']);
            $insert_array['member_card']   =trim($_POST['member_card']);
            $insert_array['member_mobile']=$_POST['member_mobile'];
            $insert_array['member_mobile_bind']=1;
            $insert_array['from_store']        =$_SESSION['store_id'];
            $result = $member_model->addMember($insert_array,1);
            if($result){
                $this->recordSellerLog('会员开卡成功，会员编号：'.$result);
                showDialog(Language::get('nc_common_op_succ'), urlShop('store_member_manage', 'store_member_list'), 'succ');
            }else{
                $this->recordSellerLog('会员开卡失败，会员编号：'.$member_id);
                showDialog(Language::get('nc_common_save_fail'), urlShop('store_member_manage', 'store_member_list'), 'error');
            }
           
        }
        $this->profile_menu('member_add');
        Tpl::showpage("store_member.add");
    }
    /*
     * 会员编辑
     */
    public function member_editOp(){
        $member_id = intval($_GET['member_id']);
        if ($member_id <= 0) {
            showMessage('参数错误', '', '', 'error');
        }
        $member_model=Model("member");
        $store_member_info=$member_model->getMemberInfoByID($member_id);
        if(empty($store_member_info)||$store_member_info['from_store']!=$_SESSION['store_id']){
            showMessage('会员不存在', '', '', 'error');
        }
        $this->profile_menu('member_edit',$member_id);
        Tpl::output("store_member_info",$store_member_info);
        Tpl::showpage('store_member.edit');
    }
    /*
     * 保存会员编辑
     */
    public function member_edit_saveOp(){
        $member_id=$_POST['member_id'];
         
          /**
           * 验证
           */
          $obj_validate = new Validate();
          $obj_validate->validateparam = array(
              array("input"=>$_POST["member_id"], "require"=>"true", 'validator'=>'', "message"=>"参数错误"),
              array("input"=>$_POST["member_mobile"], "require"=>"true", 'validator'=>'mobile', "message"=>"手机号码不正确"),
              array("input"=>$_POST["member_card"], "require"=>"true", 'validator'=>'', "message"=>"会员卡号为空"),
          );
          $error = $obj_validate->validate();
          if($error!=""){
              showDialog($error, "reload", 'error');
          }
          if($_REQUEST['old_member_card']!=$_REQUEST['member_card']){
              if($this->_check_member_card($_REQUEST['member_card'])){
                  $error="此会员卡号已存在";
              }
          }elseif($_REQUEST['old_member_mobile']!=$_REQUEST['member_mobile']){
              if($this->_check_member_mobile($_REQUEST['member_mobile'])){
                  $error="此手机号已存在";
              }
          }
          if($error!=""){
              showDialog($error, "reload", 'error');
          }
          $update_array=array(
            "member_truename"=>$_POST['member_truename'],
            "member_card"=>$_POST['member_card'],
            "member_mobile"=>$_POST["member_mobile"],
            "member_sex"=>$_POST['member_sex'],
            "member_mobile_bind"=>1
          );
          if($_POST['member_passwd']){
              $update_array['member_passwd']=md5($_POST['member_passwd']);
          }
          $member_model=Model("member");
          $condition['member_id']=$member_id;
          $result=$member_model->editMember($condition,$update_array);
          if($result){
              $this->recordSellerLog('编辑会员成功，会员编号：'.$member_id);
              showDialog(Language::get('nc_common_op_succ'), urlShop('store_member_manage', 'store_member_list'), 'succ');
          }else{
              $this->recordSellerLog('编辑会员失败，会员编号：'.$member_id);
              showDialog(Language::get('nc_common_save_fail'), urlShop('store_member_manage', 'store_member_list'), 'error');
          }
    }
    /*
     * 积分管理
     */
    public function member_points_manageOp(){
        //判断系统是否开启积分功能
        if (C('points_isuse') != 1){
            showMessage("未开启积分功能",'','','error');
        }
        $member_id=$_REQUEST['member_id'];
        if(chksubmit()){
            $obj_validate = new Validate();
            $obj_validate->validateparam = array(
                array("input"=>$member_id, "require"=>"true", "message"=>"参数错误"),
                array("input"=>$_POST["pointsnum"], "require"=>"true",'validator'=>'Compare','operator'=>' >= ','to'=>1,"message"=>"积分值错误")
            );
            $error = $obj_validate->validate();
            if ($error != ''){
                showMessage($error,'','','error');
            }
            //查询会员信息
            $obj_member = Model('member');
            $member_info = $obj_member->getMemberInfo(array('member_id'=>$member_id));
            if (!is_array($member_info) || count($member_info)<=0){
                showMessage("对不起，无此会员信息",'index.php?act=points&op=addpoints','','error');
            }
            $pointsnum = intval($_POST['pointsnum']);
            if ($_POST['operatetype'] == 2 && $pointsnum > intval($member_info['member_points'])){
                showMessage("积分不足，会员当前积分数为".$member_info['member_points'],'','','error');
            }
            
            $obj_points = Model('points');
            $insert_arr['pl_memberid'] = $member_info['member_id'];
            $insert_arr['pl_membername'] = $member_info['member_truename']?$member_info['member_truename']:$member_info['member_name'];
            $insert_arr['pl_adminname'] = $_SESSION['seller_name'];
            if ($_POST['operatetype'] == 2){
                $insert_arr['pl_points'] = -$_POST['pointsnum'];
            }else {
                $insert_arr['pl_points'] = $_POST['pointsnum'];
            }
            if ($_POST['pointsdesc']){
                $insert_arr['pl_desc'] = trim($_POST['pointsdesc']);
            } else {
                $insert_arr['pl_desc'] = $_SESSION['seller_name']."手动操作积分";
            }
            $result = $obj_points->savePointsLog('system',$insert_arr,true);
            if ($result){
                $this->recordSellerLog("修改积分".$member_info['member_name'].'['.(($_POST['operatetype'] == 2)?'':'+').strval($insert_arr['pl_points']).']');
                showDialog(Language::get('nc_common_op_succ'), urlShop('store_member_manage', 'member_points_manage',array('member_id'=>$member_id)), 'succ');
            }else {
                showDialog(Language::get('nc_common_save_fail'), urlShop('store_member_manage', 'member_points_manage',array('member_id'=>$member_id)), 'error');
            }
            
            
        }
        if(empty($member_id)){
            showMessage('参数错误', '', '', 'error');
        }
        $member_model=Model("member");
        $store_member_info=$member_model->getMemberInfoByID($member_id);
        if(empty($store_member_info)||$store_member_info['from_store']!=$_SESSION['store_id']){
            showMessage('会员不存在', '', '', 'error');
        }
        $this->profile_menu('member_points_manage',$member_id);
        Tpl::output("store_member_info",$store_member_info);
        Tpl::showpage('store_member.points');
    }
    /*
     * 删除会员
     */
    public function member_delOp() {
        $member_id = intval($_POST['member_id']);
        if($member_id > 0) {
            $member_model=Model("member");
            $result = $member_model->del($member_id);
            if($result) {
                $this->recordSellerLog('删除会员成功，会员编号'.$member_id);
                showDialog(Language::get('nc_common_op_succ'),'reload','succ');
            } else {
                $this->recordSellerLog('删除会员失败，会员编号'.$member_id);
                showDialog(Language::get('nc_common_save_fail'),'reload','error');
            }
        } else {
            showDialog(Language::get('wrong_argument'),'reload','error');
        }
    }
    /*
     * 验证手机
     */
    public function check_member_mobileOp(){
        $member_mobile=$_REQUEST["member_mobile"];
        $result = $this->_check_member_mobile($member_mobile);
        if(empty($result)){
           echo 'true';exit;
        }else{
           echo 'false';exit;
        }
    }
    /*
     * 验证会员卡号
     */
    public function check_member_cardOp(){
        $member_card=$_REQUEST['member_card'];
        $result = $this->_check_member_card($member_card);
        if(empty($result)){
            echo 'true';exit;
        }else{
            echo 'false';exit;
        }
    }
    /*
     * 验证会员号
     * 
     */
    public function check_member_nameOp(){
        $member_name=$_REQUEST['member_name'];
        $result=$this->_check_member_name($member_name);
         if(empty($result)){
                echo 'true';exit;
            }else{
                echo 'false';exit;
            }
    }
    private function _check_member_name($member_name){
        $condition['member_name']=$member_name;
        $member_model=Model("member");
        $list = $member_model->getMemberInfo($condition);
        return $list;
    }
    private function _check_member_mobile($member_mobile){
        $condition['member_mobile']=$member_mobile;
        $member_model=Model("member");
        $list = $member_model->getMemberInfo($condition);
        return $list;
    }
    private  function _check_member_card($member_card){
        $condition['member_card']=$member_card;
        $member_model=Model("member");
        $list = $member_model->getMemberInfo($condition);
        return $list;
    }
    /*
     * ajax 查询会员
     */
    public function ajax_get_memberOp(){
        $member_condition=$_REQUEST['member_condition'];
        if($member_condition){
            if(preg_match("/^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/", $member_condition)){
                $condition['member_mobile']=$member_condition;
            }else{
               $condition['member_card']=$member_condition;
            }
        }
        $condition['from_store']=$_SESSION['store_id'];
        $member_model=Model("member");
        $store_member_list=$member_model->getMemberList($condition,"*");
        if($store_member_list){
            foreach ($store_member_list as $key=> $member){
                $store_member_list[$key]['member_login_time']=date("Y-m-d",$member['member_login_time']);
            }
            echo json_encode(array("code"=>200,"member_list"=>$store_member_list));exit;
        }else{
            echo json_encode(array("code"=>500));exit;
        }
      
    }
    /**
     * 用户中心右边，小导航
     *
     * @param string 	$menu_key	当前导航的menu_key
     * @return
     */
    private function profile_menu($menu_key = '',$member_id=0) {
        if($menu_key === 'store_member_list'){
            $menu_array = array();
            $menu_array[] = array(
                'menu_key' => 'store_member_list',
                'menu_name' => '会员列表',
                'menu_url' => urlShop('store_member_manage', 'store_member_list')
            );
        }
        if($menu_key === 'member_add') {
            $menu_array[] = array(
                'menu_key'=>'member_add',
                'menu_name' => '会员开卡',
                'menu_url' => urlShop('store_member_manage', 'member_add')
            );
        }
        if($menu_key === 'member_edit'||$menu_key === 'member_points_manage') {
            $menu_array[] = array(
                'menu_key'=>'member_edit',
                'menu_name' => '编辑账号',
                'menu_url' => urlShop('store_member_manage', 'member_edit',array("member_id"=>$member_id))
            );
            $menu_array[] = array(
                'menu_key'=>'member_points_manage',
                'menu_name' => '积分管理',
                'menu_url' => urlShop('store_member_manage', 'member_points_manage',array("member_id"=>$member_id))
            );
        }
       
    
        Tpl::output('member_menu', $menu_array);
        Tpl::output('menu_key', $menu_key);
    }
}