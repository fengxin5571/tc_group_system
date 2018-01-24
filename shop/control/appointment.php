<?php 
/**
 * 预约体验
 *
 *
 *
 **by 太常系统 www.sxtaichang.com*/

defined('InShopNC') or exit('Access Invalid!');
class appointmentControl extends BaseHomeControl{
    public function __construct(){
        parent::__construct();
        /**
         * 分类导航
         */
        $nav_link = array(
            array(
                'title'=>"首页",
                'link'=>SHOP_SITE_URL
            ),
            array(
                'title'=>"预约体验",
                'link' => urlShop('appointment', 'index')
            ),
            	
        );
        Tpl::output('nav_link_list',$nav_link);
        $this->checkLogin();
    }
    /*
     * 预约体验
     */
    public function indexOp(){
        
        if (chksubmit()){
            $appoint_model=Model("appointment");//获取预约表模型
            if(empty($_REQUEST['appoint']['appointment_name'])){
                $msg ="体验姓名不能为空！";
            }elseif(empty($_REQUEST['appoint']['appointment_item'])){
                $msg ="体验项目不能为空！";
            }elseif(empty($_REQUEST['appoint']['appointment_mobile'])){
                $msg ="联系方式不能为空！";
            }elseif(!preg_match('/^0?(13|15|17|18|14)[0-9]{9}$/i',$_REQUEST['appoint']['appointment_mobile'])){
                $msg ="请填写正确的手机号";
            }elseif($appoint_model->isExist(array("appointment_mobile"=>$_REQUEST['appoint']['appointment_mobile'],"appointment_status"=>0))){
                $msg = "您有未处理的预约申请，请耐心等待工作人员处理";
            }
             $msg?showMessage($msg,'','html','error'):"";
             $insert_array['appointment_name']=$_REQUEST['appoint']['appointment_name'];
             $insert_array['appointment_item']=$_REQUEST['appoint']['appointment_item'];
             $insert_array['appointment_mobile']=$_REQUEST['appoint']['appointment_mobile'];
             $insert_array['appointment_remark']=$_REQUEST['appoint']['appointment_remark'];
             $insert_array['appointment_time']=time();
             $appoint_model->save($insert_array);
             showMessage("您的预约申请已经提交，请注意查收通知短信",urlShop("index","selfindex"));
             
        }
        $member_info= $this->getMemberAndGradeInfo(true);
        $model=Model();
        $appoint_items=$model->table("appointment_item")->select();
        Tpl::output("appoint_items",$appoint_items);
        Tpl::output("member_info",$member_info);
        Tpl::showpage("appointment","home_dw_layout");
    }
   
}
?>