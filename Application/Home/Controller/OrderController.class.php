<?php
namespace Home\Controller;

use Home\Controller\PublicController;
class OrderController extends PublicController{
    public function _initialize(){
        parent::_initialize();
        $this->order_service = D('Order','Service');
    }
    /**
     * 获取列表
     */
    public function orderlist(){
        //组装参数
        $result = $this->order_service->orderlist(I("get."));
        $ordercount = $this->order_service->ordercount(I("get."));
        //渠道和接口列表
        $config['orderChannelList']= C('orderChannelList');
        $config['orderEventList']= C('orderEventList');
        //显示
        $this->assign('page',I('page','1'))->assign('ordercount',$ordercount['result']);
        $this->assign('config', $config)->assign('orderlists',$result['result'])->display();
    }
    /**
     * 获取单个订单详情
     */
    public function orderdetail($id){
        $result = $this->order_service->orderdetail($id);
        $this->assign('result',$result['result'])->display();
    }
    /**
     * 统计代码
     */
    public function tongji(){
        $this->display();
    }
    /**
     * 添加订单
     */
    public function addorder(){
        if (IS_POST){
            $result = $this->order_service->addorder(I('post.'));
            $data = array();
            if (!$result){
                $data['status'] = 0;
                $data['message'] = '操作失败：'.$this->order_service->getError();
            }else{
                $data['status'] = 1;
                $data['message'] = '新增成功';
                $data['url'] = '';
            }
            $this->ajaxReturn($data);
        }else {
            $this->display();
        }
    }
    
}

?>