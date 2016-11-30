<?php
    namespace Manager\Controller;

    use Manager\Model\UsersModel;
    use Think\Controller;

    class UsersController extends AdminBaseController
    {
        private $model;
        private $order;

        public function __construct()
        {
            parent::__construct();
            $this->model = D('Users');
        }

        public function index()
        {
            $username=empty(I('username'))?'':I('username');
            $startTime=empty(I('startTime'))?'':I('startTime');
            $endTime=empty(I('endTime'))?'':I('endTime');
            $this->order = array('create_time', 'id' => 'desc');
            $where="1=1";
            if(!empty($username)){
                $where .=" and  (username like '%".$username."%' or phone ='".$username."'or email='".$username."')";
            }
            if(!empty($startTime)){
                $where .=" and create_time >='".$startTime."'";
            }
            if(!empty($endTime)){
                $where .=" and create_time <='".$startTime."'";
            }
            $data = $this->page_com($this->model, $this->order,$where);
            foreach ($data['list'] as $k => $v) {
                $data['list'][$k]['statusName'] = UsersModel::$STATUS_MAP[$v['status']];
            }
            $this->data = $data;
            $this->display();
        }

        public function del()
        {
            if (($id = I('id', 0, 'intval')) <= 0) {
                $this->ajaxReturn(array('error' => 100, 'message' => "数据格式有误"));
            }
            $status = intval(I('status', 0, 'intval')) == UsersModel::STATUS_ENABLE ? UsersModel::STATUS_DISABLE : UsersModel::STATUS_ENABLE;
            if (!$this->model->where(array('id' => $id))->save(array('status' => $status))) {
                $this->ajaxReturn(array('error' => 100, 'message' => '操作失败'));
            }
            $this->ajaxReturn(array('error' => 200, 'message' => '操作成功'));
        }
    }