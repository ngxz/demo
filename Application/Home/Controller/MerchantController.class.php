<?php
namespace Home\Controller;
use Home\Controller\PublicController;
class MerchantController extends PublicController{
    public function _initialize(){
        parent::_initialize();
        $this->merchant_service = D('Merchant','Service');
    }
    /**
     * 商户列表
     */
    public function merchantlist(){
        
        $result = $this->merchant_service->merchantlist(I("get."));
        $merchantcount = $this->merchant_service->merchantcount(I("get."));
        //渠道和接口列表
        $merchantChannelList = C('merchantChannelList');
        $merchantEventList = C('merchantEventList');
        
        $this->assign('sqlmap',I("get."));
        $this->assign('page',I('page','1'));
        $this->assign('merchantcount',$merchantcount['result']);
        
        $this->assign('merchantChannelList',$merchantChannelList);
        $this->assign('merchantEventList',$merchantEventList);
        $this->assign('merchantlists',$result['result'])->display();
    }
    /**
     * 商户详情
     * @param unknown $id
     */
    public function merchantdetail($id){
        $result = $this->merchant_service->merchantdetail($id);
        
        $this->assign('result',$result['result'])->display();
    }
}

?>