<?php
namespace Home\Controller;

use Think\Controller;
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