<?php
namespace Home\Service;

class MerchantService{
    public  $error = '';
    public function __construct(){
        $this->url = C('url');
        $this->http = new \Think\Http();
    }
    /**
     * 组装参数
     */
    Public function getsign($params){
        //筛选参数
        if ($params['id']){
            $data['id'] = $params['id'];
        }
        if ($params['page']){
            $data['page'] = $params['page'];
        }
        if ($params['sn']){
            $data['sqlmap']['sn'] = $params['sn'];
        }
        if ($params['source_id']){
            $data['sqlmap']['source_id'] = $params['source_id'];
        }   
        if ($params['channel']){
            $data['sqlmap']['channel'] = $params['channel'];
        }
        if ($params['event']){
            $data['sqlmap']['event'] = $params['event'];
        }
        if ($params['startdate'] && $params['enddate']){
            $data['sqlmap']['time'] = array(array('EGT',strtotime($params['startdate'])),array('ELT',strtotime($params['enddate'])));
        }
        if ($params['startdate'] && !$params['enddate']){
            $data['sqlmap']['time'] = array(array('EGT',strtotime($params['startdate'])),array('ELT',time()));
        }
        
        $data['timestamp'] = time();
        $data['nonce'] = md5($data['timestamp'].rand(0,1000));
        $app_key = C('app_key');
        $app_secret = c('app_secret');
        ksort($data);
        $str = '';
        foreach ($data as $k => $v){
            $str .= $k.$v;
        }
        $data['sign'] = md5($app_key.$str.$app_secret);
        return $data;
    }
    /**
     * 获取商户列表
     * @return mixed
     */
    public function merchantlist($params){
        $data = $this->getsign($params);
        //订单
        $url = $this->url."Dada/SysMerchant/MerchantLists";
        //获取内容
        $result = $this->http->postRequest($url,$data);
        //替换中文
        $result = $this->replace($result);
        $result = json_decode($result,true);
        return $result;
    }
    /**
     * 获取单条商户详情
     * @param unknown $id
     */
    public function merchantdetail($params){
        $data = $this->getsign($params);
        $url = $this->url."Dada/SysMerchant/MerchantDetail";
        //获取内容
        $result = $this->http->postRequest($url,$data);
        //替换中文
        $result = $this->replace($result);
        $result = json_decode($result,true);
        return $result;
    }
    /**
     * 新增门店
     */
    public function addmerchant($params){
        $data = array();
        $data = $this->addmerchantsign($params);
        if (!$data){
            return false;
        }
        $url = $this->url.'Dada/Merchant/addMerchant';
        $result = json_decode($this->http->postRequest($url,$data),true);
        //根据返回状态判断
        if ($result['status'] == 'fail'){
            $this->error = $result['msg'];
            return false;
        }
        return true;
    }
    /**
     * 新增门店验证参数
     * @param unknown $params
     */
    private function addmerchantsign($params){
        if (!$params['mobile']){
            $this->error = '手机号码不能为空';
            return false;
        }
        if(!$params['city_name']){
            $this->error = '城市名不能为空';
            return false;
        }
        if(!$params['enterprise_name']){
            $this->error = '企业名称不能为空';
            return false;
        }
        if(!$params['enterprise_address']){
            $this->error = '企业地址不能为空';
            return false;
        }
        if(!$params['contact_phone']){
            $this->error = '联系人电话不能为空';
            return false;
        }
        if(!$params['email']){
            $this->error = '邮箱不能为空';
            return false;
        }
        $data['body'] = array();
        $data['source_id'] = '73753';
        $data['body']['mobile'] = $params['mobile'];
        $data['body']['city_name'] = $params['city_name'];
        $data['body']['enterprise_name'] = $params['enterprise_name'];
        $data['body']['enterprise_address'] = $params['enterprise_address'];
        $data['body']['contact_phone'] = $params['contact_phone'];
        $data['body']['email'] = $params['email'];
        //验证参数
        $data['timestamp'] = time();
        $data['nonce'] = md5($data['timestamp'].rand(0,1000));
        $app_key = C('app_key');
        $app_secret = C('app_secret');
        ksort($data);
        $str = '';
        foreach ($data as $k => $v){
            $str .= $k.$v;
        }
        $data['sign'] = md5($app_key.$str.$app_secret);
        return $data;
    }
    /**
     * 替换中文
     * @param unknown $result
     * @return mixed
     */
    public function replace($result){
        //数据转换中文
        $old = array('cityList','addMerchant','addShop','updateShop','shopDetail','Dada');
        $new = array('获取城市信息','注册商户','新增门店','编辑门店','门店详情','达达');
        $result = str_replace($old, $new, $result);
        return $result;
    }
    /**
     * 获取订单总数
     */
    Public function merchantcount($params){
        $data = $this->getsign($params);
        $url = $this->url."Dada/SysMerchant/MerchantCount";
        //获取内容
        $result = $this->http->postRequest($url,$data);
        $result = json_decode($result,true);
        return $result;
    }
    public function getError(){
        return $this->error;
    }
}

?>