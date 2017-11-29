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
        $config['merchantChannelList'] = C('merchantChannelList');
        $config['merchantEventList'] = C('merchantEventList');
        //显示
        $this->assign('page',I('page','1'))->assign('config',$config);
        $this->assign('merchantcount',$merchantcount['result']);
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
    /**
     * 新增商户
     */
    public function addmerchant(){
        if (IS_POST){
            $result = $this->merchant_service->addmerchant(I('post.'));
            $data =array();
            if (!$result){
                $data['status'] = 0;
                $data['message'] = '新增失败：'.$this->merchant_service->getError();
            }else {
                $data['status'] = 1;
                $data['message'] = '新增成功！';
            }
            $this->ajaxReturn($data);
        }else {
            $this->display();
        }
    }
}

?>