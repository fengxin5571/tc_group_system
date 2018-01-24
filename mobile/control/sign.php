<?php
/*
 * 会场签到
 * 
 */
defined('InShopNC') or exit('Access Invalid!');
class signControl extends mobileControl{
    public function __construct() {
        parent::__construct();
    }
    /*
     * 会场签到
     */
    public function sign_saveOp(){
        $insert_array=array();
        $insert_array['sign_name']=$_POST['name'];
        $insert_array['sign_mobile']=$_POST['tel'];
        $insert_array['sign_areainfo']=$_POST['position'];
        $insert_array['sign_role']=$_POST['identity'];
        $insert_array['sign_time']=time();
        $sign_model=Model('sign_member');
        $result=$sign_model->save($insert_array);
        if($result){
                echo " <script>location.href='/wap/sign/remind.html';</script>";
        }else{
                echo "<script>alert('签到失败，请核实您填写的信息');location.href='/wap/sign/sign.html';</script>";
         }
    }
}