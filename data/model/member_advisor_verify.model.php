<?php 
/**
 * 会员指导老师申请模型
 *
 * by 太常系统 www.sxtaichang.com
 */
defined('InShopNC') or exit('Access Invalid!');
class member_advisor_verifyModel extends Model{
    public function __construct(){
        parent::__construct('member_advisor_verify');
    }
    /**
     * 读取列表
     * @param array $condition
     *
     */
    public function getList($condition,$page=null,$order='',$field='*',$limit=''){
        $result = $this->field($field)->where($condition)->page($page)->order($order)->limit($limit)->select();
        return $result;
    }
    /**
     * 连接查询列表
     *
     * @param array $condition 检索条件
     * @param obj $page 分页
     * @return array 数组结构的返回结果
     */
    public function getJoinList($condition,$page=''){
        $result	= array();
        $condition_str	= $this->_condition($condition);
        $param	= array();
        $param['table'] = 'member,member_advisor_verify';
        $param['field']	= empty($condition['field'])?'*':$condition['field'];;
        $param['join_type']	= empty($condition['join_type'])?'left join':$condition['join_type'];
        $param['join_on']	= array('member.member_id=member_advisor_verify.member_id');
        $param['where'] = $condition_str;
        $param['limit'] = $condition['limit'];
        $param['order']	= empty($condition['order'])?'member_advisor_verify.verify_id':$condition['order'];
        $result = Db::select($param,$page);
        return $result;
    }
    /**
     * 构造检索条件
     *
     * @param int $id 记录ID
     * @return string 字符串类型的返回结果
     */
    private function _condition($condition){
        $condition_str = '';
    
        if ($condition['member_name'] != ''){
            $condition_str .= " and member.member_name like '%". $condition['member_name'] ."%'";
        }
        if ($condition['verify_status'] != ''){
            $condition_str .= " and member_advisor_verify.verify_status =".$condition['verify_status'];
        }
    
        return $condition_str;
    }
    /**
     * 读取单条记录
     * @param array $condition
     *
     */
    public function getOne($condition,$order=''){
        $result = $this->where($condition)->order($order)->find();
        return $result;
    }
    
    /*
     *  判断是否存在
     *  @param array $condition
     *
     */
    public function isExist($condition) {
        $result = $this->getOne($condition);
        if(empty($result)) {
            return FALSE;
        }
        else {
            return TRUE;
        }
    }
    
    /*
     * 增加
     * @param array $param
     * @return bool
     */
    public function save($param){
        return $this->insert($param);
    }
    
    /*
     * 更新
     * @param array $update
     * @param array $condition
     * @return bool
     */
    public function modify($update, $condition){
        return $this->where($condition)->update($update);
    }
    
    /*
     * 删除
     * @param array $condition
     * @return bool
     */
    public function drop($condition){
        return $this->where($condition)->delete();
    }
    
}

