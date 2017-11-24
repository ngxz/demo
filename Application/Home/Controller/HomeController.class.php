<?php
namespace Home\Controller;

use Home\Controller\PublicController;
class HomeController extends PublicController{
    public function _initialize(){
        parent::_initialize();
        $this->getsign_service = D('Getsign','Service');
    }

    /**
     * 获取列表
     */
    public function actlist(){
        //组装参数
        $result = $this->getsign_service->orderlist();
        
        //显示
        $this->assign('orderlists',$result['result'])->display();
    }
    /**
     * 获取单个订单详情
     */
    public function detail($id){
        $result = $this->getsign_service->orderdetail($id);
        
        //var_dump($result);die();
        $this->assign('result',$result)->display();
    }
    /**
     * 统计代码
     */
    public function tongji(){
        $this->display();
    }
    /**
     * 添加
     */
    public function add(){
        if (IS_POST){
            $data['name'] = I('name','');
        }
        $this->display();
    }
    
}

?>