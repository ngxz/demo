<?php
namespace Home\Controller;

use Think\Controller;
/**
 * 用户信息等
 * @author Administrator
 *
 */
class UserController extends Controller{
    /**
     * 用户资料
     */
    public function index(){
        
        $this->display();
    }
    public function zijin(){
        $this->display();
    }
    public function set(){
        $this->display();
    }
}

?>