<?php
namespace Home\Service;


class GetsignService{
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
        if ($params['sn'] != ''){
            $data['sqlmap']['sn'] = $params['sn'];
        }
        if ($params['source_id']){
            $data['sqlmap']['source_id'] = $params['source_id'];
        }   
        if ($params['channel']){
            $data['sqlmap']['channel'] = $params['channel'];
        }
        if ($params['startdate']){
            $data['sqlmap']['time'] = array('BETWEEN',array(strtotime($params['startdate']),strtotime($params['enddate'])));
        }

//         if ($params['startdate']){
//             $data['sqlmap']['time'] = array(array('EGT',strtotime($params['startdate'])),array('ELT',strtotime($params['enddate'])));
//         }
        
        
        $data['timestamp'] = time();
        $data['nonce'] = md5($data['timestamp'].rand(0,1000));
        $app_key = C('app_key');
        $app_secret = C('app_secret');
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
    public function orderlist($params){
        $data = $this->getsign($params);
//         file_put_contents('1.txt', var_export($data,true));

        //订单
        $url = $this->url."Dada/SysOrder/OrderLists";
        //获取内容
        $http = new \Think\Http();
        $result = $http->postRequest($url,$data);
        
        //转换中文
        $result = $this->replace($result);
        
        $result = json_decode($result,true);
//         var_dump($result);
        return $result;
    }
    /**
     * 获取单条订单详情
     * @param unknown $id
     */
    public function orderdetail($id){
        $data = $this->getsign($id);
        
        
        $url = $this->url."Dada/SysOrder/OrderDetail";
        //获取内容
        $http = new \Think\Http();
        $result = $http->postRequest($url,$data);
        //转换中文
        $result = $this->replace($result);
        
        $result = json_decode($result,true);
        return $result;
    }
    /**
     * 转换中文
     * @param unknown $result
     */
    public function replace($result){
        //数据转换中文
        $old = array('addOrder','reAddOrder','addTip','orderDetail','formalCancel','cancelReasons','appointExist','appointCancel','appointListTransporter','Dada');
        $new = array('新增订单','重发订单','订单增加小费','订单详情','取消订单','订单取消原因','追加订单','取消追加订单','查询追加配送员','达达');
        $result = str_replace($old, $new, $result);
        return $result;
    }
    /**
     * 获取订单总数
     */
    Public function ordercount($params){
        $data = $this->getsign($params);
        $url = $this->url."Dada/SysOrder/OrderCount";
        //获取内容
        $http = new \Think\Http();
        $result = $http->postRequest($url,$data);
        $result = json_decode($result,true);
        return $result;
    }
}

?>