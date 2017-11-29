<?php
namespace Home\Service;

class OrderService{
    public $error = '';
    public function __construct(){
        $this->url = C('url');
        $this->http  = new \Think\Http();
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
        if ($params['event']){
            $data['sqlmap']['event'] = $params['event'];
        }
        if ($params['startdate'] && $params['enddate']){
            $data['sqlmap']['time'] = array('BETWEEN',array(strtotime($params['startdate']),strtotime($params['enddate'])));
        }
        if ($params['startdate'] && !$params['enddate']){
            $data['sqlmap']['time'] = array('BETWEEN',array(strtotime($params['startdate']),time()));
        }
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
        //订单
        $url = $this->url."Dada/SysOrder/OrderLists";
        //获取内容
        $result = $this->http->postRequest($url,$data);
        //转换中文
        $result = $this->replace($result);
        $result = json_decode($result,true);
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
        $result = $this->http->postRequest($url,$data);
        //转换中文
        $result = $this->replace($result);
        $result = json_decode($result,true);
        return $result;
    }
    /**
     * 新增订单
     * @param unknown $params
     */
    public function addorder($params){
        $data = array();
        $data = $this->addordersign($params);
        if(!$data) return false;
        $url = $this->url."Dada/Order/addOrder";
        $result = json_decode($this->http->postRequest($url,$data),true);
        if($result['status'] == 'fail'){
            $this->error = $result['msg'];
            return false;
        }
        return true;
    }
    /**
     * 新增订单参数
     * @param unknown $params
     */
    private function addordersign($params){
        if (!$params['order_id']){
            $this->error = '订单号不能为空';
            return false;
        }
        if(!$params['source_id']){
            $this->error = '商户号不能为空';
            return false;
        }
        if(!$params['origin_id']){
            $this->error = '第三方订单号不能为空';
            return false;
        }
        if(!$params['city_code']){
            $this->error = '城市code不能为空';
            return false;
        }
        if(!$params['shop_no']){
            $this->error = '门店编号不能为空';
            return false;
        }
        //组装body数据
        $data['body'] = array();
        $data['body']['order_id'] = $params['order_id'];
        $data['source_id'] = $params['source_id'];
        $data['body']['shop_no'] = $params['shop_no'];
        $data['body']['origin_id'] = $params['origin_id'];
        $data['body']['cargo_price'] = $params['cargo_price'];
        $data['body']['tips'] = $params['tips'];
        $data['body']['city_code'] = $params['city_code'];
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
        $result = $this->http->postRequest($url,$data);
        $result = json_decode($result,true);
        return $result;
    }
    public function getError(){
        return $this->error;
    }
}

?>