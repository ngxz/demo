<?php
namespace Home\Service;

class GetsignService{
    public function __construct(){
        
    }
    /**
     * 组装参数
     */
    Public function getsign($id){
        if (!empty($id)){
            $data['id'] = $id;
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
        //
        $data['sign'] = md5($app_key.$str.$app_secret);
        return $data;
    }
    /**
     * 获取订单列表
     * @return mixed
     */
    public function orderlist(){
        $data = $this->getsign();
        //订单
        $url = "http://192.168.2.104/api/api.php/Dada/SysOrder/OrderLists";
        //获取内容
        $http = new \Think\Http();
        $result = $http->postRequest($url,$data);
        $result = json_decode($result,true);
        return $result;
    }
    /**
     * 获取单条订单详情
     * @param unknown $id
     */
    public function orderdetail($id){
        $data = $this->getsign($id);
        
        
        $url = "http://192.168.2.104/api/api.php/Dada/SysOrder/OrderDetail";
        //获取内容
        $http = new \Think\Http();
        $result = $http->postRequest($url,$data);
        $result = json_decode($result,true);
        return $result;
    }
}

?>