<?php
/**
 * 会员消费记录
 *
 * by www.duyiwang.cn */
defined('InShopNC') or exit('Access Invalid!');
class store_member_pointsControl extends BaseSellerControl{
    /**
     * 构造方法
     *
     */
    public function __construct() {
        parent::__construct();
        //判断系统是否开启积分功能
        if (C('points_isuse') != 1){
            showMessage("积分功能未开启，请联系平台管理员",'','','error');
        }
    }
    /*
     * 积分明细列表
     */
    public function pointslogOp(){
        $member_model=Model("member");
        $condition['from_store']=$_SESSION['store_id'];
        $store_member_list=$member_model->getMemberList($condition,"member_id");
        if($store_member_list&&is_array($store_member_list)){
            foreach ($store_member_list as $member_id){
                $store_memberid[]=$member_id['member_id'];
            }
            $store_memberid=rtrim(implode(",", $store_memberid),",");
            $condition_arr = array();
            $condition_arr['pl_membername_like'] = trim($_GET['mname']);
            $condition_arr['pl_adminname_like'] = trim($_GET['aname']);
            $condition_arr['in_pl_memberid']=$store_memberid;
            if ($_GET['stage']){
                $condition_arr['pl_stage'] = trim($_GET['stage']);
            }
            $if_start_date = preg_match('/^20\d{2}-\d{2}-\d{2}$/',$_GET['query_start_date']);
            $if_end_date = preg_match('/^20\d{2}-\d{2}-\d{2}$/',$_GET['query_end_date']);
            $start_unixtime = $if_start_date ? strtotime($_GET['query_start_date']) : null;
            $end_unixtime = $if_end_date ? strtotime($_GET['query_end_date']): null;
            if ($start_unixtime || $end_unixtime) {
                $condition_arr['pl_addtime'] = array('time',array($start_unixtime,$end_unixtime));
            }
            $condition_arr['pl_desc_like'] = trim($_GET['description']);
            //分页
            $page	= new Page();
            $page->setEachNum(10);
            $page->setStyle('admin');
            //查询积分日志列表
            $points_model = Model('points');
            $list_log = $points_model->getPointsLogList($condition_arr,$page,'*','');
        }
        Tpl::output('show_page',$page->show());
        Tpl::output('list_log',$list_log);
        Tpl::showpage("store_member_points");
    }
}