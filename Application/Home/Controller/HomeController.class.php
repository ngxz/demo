<?php
namespace Home\Controller;

use Think\Controller;
class HomeController extends Controller{
//     public function _initialize(){
//         islogin();
//     }
    
    /**
     * 首页
     */
//     public function index(){
//         $this->display();
//     }
    /**
     * 活动列表
     */
    public function actlist(){
        $this->display();
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