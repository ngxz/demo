<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function _initialize(){
        $this->account_service = D('Account','Service');
    }
    /**
     * 默认
     */
    public function index(){
        if (!empty($_SESSION['account'])){
            $this->display('index');
        }else {
            $this->display('login');
        }
        
    }

    /**
     * 登录页
     */
    public function login(){
        if (IS_POST){
            $result =  $this->account_service->validAccount(I('post.'));
            if(!$result){
                $error['code'] = false;
                $error['message'] = $this->account_service->error;
                $this->ajaxReturn($error);
            }
            $success['code'] = ture;
            $success['message'] = '登录成功';
            
            $this->ajaxReturn($success);
        }else{
            $this->display();
        }
    }
    /**
     * 生成验证码
     */
    public function code(){
        $config =    array(
            'fontSize'    =>    16,    // 验证码字体大小
            'length'      =>    4,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }
    /**
     * 退出
     * 
     */
    public function logout() {
        session('user',null);
        echo "<script>";
        echo "window.top.location.href = "."'".U('Index/login')."'";
        echo "</script>";
    }
}