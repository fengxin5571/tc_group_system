<?php
/**
 * 预约
 * @好商城V4 (c) 2005-2016 33hao Inc.
 * @license    http://www.33hao.com
 * @link       交流群号：216611541
 * @since      好商城提供技术支持 授权请购买shopnc授权
 *
 **/

defined('InShopNC') or exit('Access Invalid!');
class appointmentControl extends mobileControl{
    public function __construct() {
        parent::__construct();
    }
    /**
     * 预约体验
     */
    public function indexOp(){  
        $model_appointment_item=Model('appointment_item');
        $appoint_items=$model_appointment_item->table("appointment_item")->select();
        output_data(array("appointment"=>$appoint_items));  
    }
    
    public function saveOp(){
        if($_POST){
            $appoint_model=Model("appointment");//获取预约表模型
            $insert_array['appointment_name']=$_POST['appointment_name'];
            $insert_array['appointment_item']=$_POST['appointment_item'];
            $insert_array['appointment_mobile']=$_POST['appointment_mobile'];
            $insert_array['appointment_remark']=$_POST['appointment_remark'];
            $insert_array['appointment_time']=time();
            if($appoint_model->isExist(array("appointment_mobile"=>$_POST['appointment_mobile'],"appointment_status"=>0))){
                echo "<script>alert('您有未处理的预约申请，请耐心等待工作人员处理');location.href='/wap/tmpl/appointment.html';</script>";
                return false;
            }
            $result=$appoint_model->save($insert_array);
            if($result){ 
                echo "<script>alert('您的预约申请已经提交，请注意查收通知短信');location.href='/wap';</script>";
            }else{
                echo "<script>alert('您的预约申请提交失败，请核实您填写的信息');location.href='/wap/tmpl/appointment.html';</script>";
            }
        }
    }
}