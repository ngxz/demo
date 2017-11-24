<?php 
namespace Home\Service;
class AccountService{
    public function __construct(){
        $this->user_model = D('user');
    }
    public function validAccount($params){
        foreach($params as $k => $v){
            $fun = '_valid_'.$k;
            $result = $this->$fun($params);
            if(!$result) return false;
        }
        $this->dologin($params);
        return true;
    }
    private function dologin($params){
         $_SESSION['account'] = $params['account'];
         return true;
    }
    private function _valid_account($params){
        $account = $params['account'];
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
        $_SESSION['user'] = $result;
        return true;
    }
    private function _valid_code($params){
        $code = $params['code'];
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
    private function _valid_pwd($params){
        $pwd = $params['pwd'];
        if(!$pwd){
            $this->error = '密码不能为空';
            return false;
        }
        $account = $params['account'];
        $result = $this->user_model->where("account = '$account'")->find();
        if ($result['pwd'] != md5($pwd)){
            $this->error = '密码错误';
            return false;
        };
        return true;
    }
    public function getError(){
        return $this->error;
    }
    public function editUser($params) {
        $id = $_SESSION['user']['id'];
        $name = $params['name'];
        $pwd = $params['pwd'];
        if (!$pwd) {
            $data = array('name'=>$name);
        }
        if ($pwd && $name){
            $data = array('name'=>$name,'pwd'=>md5($pwd));
        }
        $result = $this->user_model->where("id = '$id'")->save($data);
        if (!$result){
            return false;
        }
        return true;
    }
}



