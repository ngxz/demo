<?php 
namespace Home\Service;
class AccountService{
    public function __construct(){
        $this->user_model = D('user');
    }
    public function validAccount($params){
        foreach($params as $k => $v){
            $fun = '_valid_'.$k;
            $result = $this->$fun($v);
            if(!$result) return false;
        }
        $this->dologin($params);
        return true;
    }
    private function dologin($params){
         $_SESSION['account'] = $params['account'];
         return true;
    }
    private function _valid_account($account){
        if(!$account){
            $this->error = '账户不能为空';
            return false;
        }
        $sqlmap = array();
        $sqlmap['account'] = $account;
        $result = $this->user_model->where($sqlmap)->find();
        if(!$result){
            $this->error = '账户不存在';
            return false;
        }
        return true;
    }
    private function _valid_code($code){
        if(!$code){
            $this->error = '验证码不能为空';
            return false;
        }
        $verify = new \Think\Verify();
        if(!$verify->check($code)){
            $this->error = '验证码错误';
            return false;
        }
        return true;
    }
//     public function valid_verify($code){
//         if(!$code){
            
//         }
//         $verify = new \Think\Verify();
//         if(!$verify->check($code)){
//             $this->error = '验证码错误';
//             return false;
//         }
//         return true;
//     }
    private function _valid_pwd($pwd){
        if(!$pwd){
            $this->error = '密码不能为空';
            return false;
        }
//         $sqlmap['pwd'] = md5($pwd);
//         $result = $this->user_model->where($sqlmap['pwd'])->find();
        
        return true;
    }
    public function getError(){
        return $this->error;
    }
}



