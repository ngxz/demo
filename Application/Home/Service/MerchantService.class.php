<?php
namespace Home\Service;

class MerchantService{
    public function __construct(){
        $this->url = 'http://192.168.2.104/api/api.php/';
    }
    /**
     * 组装参数
     */
    Public function getsign($params){
        //筛选参数
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
//         var_dump($data);
        //订单
        $url = $this->url."Dada/SysMerchant/MerchantLists";
        //获取内容
        $http = new \Think\Http();
        $result = $http->postRequest($url,$data);
        
        //替换中文
        $result = $this->replace($result);
        $result = json_decode($result,true);
        return $result;
    }
    /**
     * 获取单条订单详情
     * @param unknown $id
     */
    public function merchantdetail($id){
        $data = $this->getsign($id);
    
        $url = $this->url."Dada/SysMerchant/MerchantDetail";
        //获取内容
        $http = new \Think\Http();
        $result = $http->postRequest($url,$data);
        
        //替换中文
        $result = $this->replace($result);
        
        $result = json_decode($result,true);
        return $result;
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
        //         file_put_contents('2.txt', var_export($data,true));
        $url = $this->url."Dada/SysMerchant/MerchantCount";
        //获取内容
        $http = new \Think\Http();
        $result = $http->postRequest($url,$data);
        $result = json_decode($result,true);
        return $result;
    }
}

?>