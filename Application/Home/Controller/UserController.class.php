<?php
namespace Home\Controller;

use Home\Controller\PublicController;
/**
 * 用户信息等
 * @author Administrator
 *
 */
class UserController extends PublicController{
    public function _initialize(){
        parent::_initialize();
        $this->account_service = D('Account','Service');
    }
    /**
     * 用户资料
     */
    public function index(){
        if (IS_POST){
            $result = $this->account_service->editUser(I('post.'));
            $this->ajaxReturn(array('status'=>$result,'msg'=>$result?'修改成功':'修改失败，没有任何变化'));
        }else {
            $id = $_SESSION['user']['id'];
            $user = M("user")->where("id = '$id'")->find();
            $this->assign('user',$user)->display();
        }
        
    }
    public function zijin(){
        $this->display();
    }
    public function set(){
        $this->display();
    }
}

?>