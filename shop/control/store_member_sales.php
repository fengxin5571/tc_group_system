<?php
/**
 * 会员消费记录
 *
 * by www.33hao.com 33hao 开发调试*/

defined('InShopNC') or exit('Access Invalid!');
class store_member_salesControl extends BaseSellerControl{
    /**
     * 构造方法
     *
     */
    public function __construct() {
        parent::__construct();
    }
    /*
     * 消费记录查询
     */
    public function member_salesOp(){
        $sales_model=Model('store_member_sales');
        $condition = array();
        $condition['store_id'] = $_SESSION['store_id'];
        if ($_GET['sales_sn'] != '') {
            $condition['sales_sn'] = $_GET['sales_sn'];
        }
        if ($_GET['buyer_mobile'] != '') {
            $condition['buyer_mobile'] = $_GET['buyer_mobile'];
        }
        $if_start_date = preg_match('/^20\d{2}-\d{2}-\d{2}$/',$_GET['query_start_date']);
        $if_end_date = preg_match('/^20\d{2}-\d{2}-\d{2}$/',$_GET['query_end_date']);
        $start_unixtime = $if_start_date ? strtotime($_GET['query_start_date']) : null;
        $end_unixtime = $if_end_date ? strtotime($_GET['query_end_date']): null;
        if ($start_unixtime || $end_unixtime) {
            $condition['add_time'] = array('time',array($start_unixtime,$end_unixtime));
        }
        $member_sales_list=$sales_model->getSalesList($condition,10,"*","sales_id desc","",array("sales_goods","member"));
        Tpl::output("member_sales_list",$member_sales_list);
        Tpl::output("show_page",$sales_model->showpage());
        Tpl::showpage("store_member_sales");
    }
    /*
     * 查看消费单
     */
    public function show_salesOp(){
        $sales_id=$_REQUEST['sales_id'];
        
    }
    /*
     * 删除消费记录
     */
    public function dropSalesOp(){
        $sales_id=$_REQUEST['sales_id'];
        if(empty($sales_id)){
            showMessage("参数错误",'','','error');
        }
        $sales_model=Model('store_member_sales');
        
        $result=$sales_model->dropSales($sales_id);
        if($result){
            $this->recordSellerLog('消费记录删除成功，订单编号：'.$sales_id);
            showDialog(Language::get('nc_common_op_succ'), urlShop('store_member_sales', 'member_sales'), 'succ');
        }else {
            $this->recordSellerLog('消费记录删除失败，订单编号：'.$sales_id);
            showDialog(Language::get('nc_common_op_fail'), urlShop('store_member_sales', 'member_sales'), 'error');
        }
    }
    /*
     * 添加消费记录
     */
    public function sales_addOp(){
        $model_goods = Model('goods');
        $where = array();
        $where['store_id'] = $_SESSION['store_id'];
        $member_id=$_REQUEST['member_id'];
        $goods_list = $model_goods->getGoodsCommonOnlineList($where);
        // 计算库存
        $storage_array = $model_goods->calculateStorage($goods_list);
        if(chksubmit()){//是否提交
            if(empty($member_id)){
                showMessage("参数错误",'','','error');
            }
           if(empty($_REQUEST['goods'])&&!is_array($_REQUEST['goods'])){
               showMessage("消费的商品为空","","","error");
           }
           if(empty($_REQUEST['sales_price'])){
               showMessage("消费的金额为空","","","error");
           }
           $sales_good=array();
           foreach ($_REQUEST['goods'] as $good_id){
               if(empty($_REQUEST['goods_sales_num_'.$good_id])){
                   showMessage("所选的商品数量为空","","","error");
               }
               $sales_good[]=array(
                   "goods_id"=>$good_id,
                   "goods_name"=>$_REQUEST['goods_sales_name_'.$good_id],
                   "goods_price"=>$_REQUEST['goods_sales_price_'.$good_id],
                   "goods_num"=>$_REQUEST['goods_sales_num_'.$good_id],
                   "store_id"=>$_SESSION['store_id'],
                   "buyer_id"=>$member_id,
               );
           }
            $insert_sales=array(
                "store_id"=>$_SESSION['store_id'],
                "store_name"=>$_SESSION["store_name"],
                "buyer_id"=>$member_id,
                "buyer_name"=>$_REQUEST['member_name'],
                "add_time"=>time(),
                "sales_amount"=>$_REQUEST['sales_price'],
                "buyer_mobile"=>$_REQUEST['member_mobile'],
                "sales_operate_name"=>$_SESSION['seller_name']
            );
            $sales_model=Model(store_member_sales);
            $insert_id=$sales_model->addSales($insert_sales,$sales_good);
            if($insert_id){
                $this->recordSellerLog('消费记录添加成功，会员姓名：'.$_REQUEST['member_name']);
                showDialog(Language::get('nc_common_op_succ'), urlShop('store_member_sales', 'member_sales'), 'succ');
            }else{
                $this->recordSellerLog('消费记录添加失败，会员姓名：'.$_REQUEST['member_name']);
                showDialog(Language::get('nc_common_save_fail'), urlShop('store_member_sales', 'member_sales'), 'error');
            }
        }
        Tpl::output('storage_array', $storage_array);
        Tpl::output("goods_list",$goods_list);
        Tpl::showpage("store_sales_add");
    }
}