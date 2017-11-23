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
        //已登录则跳转到首页
        if(!empty($_SESSION['account'])){
            $this->redirect('/index/home');
        }else{
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
                $result['code'] = false;
                $result['message'] = $this->account_service->error;
                $this->ajaxReturn($result);
            }
            $result['code'] = ture;
            $result['message'] = '操作成功';
            $this->ajaxReturn($result);
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
     * 首页
     */
    public function home(){
        if(!empty($_SESSION['account'])){
            $this->redirect('/index/home');
        }else{
            $this->display('login');
        }
    }
    // 检测输入的验证码是否正确，$code为用户输入的验证码字符串
    public function check_verify($code){
        $verify = new \Think\Verify();
        return $verify->check($code);
    }
}