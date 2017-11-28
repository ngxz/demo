<?php
return array(
	//'配置项'=>'配置值'
    /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'demo',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '123',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'rq_',    // 数据库表前缀
    'DB_PARAMS'          	=>  array(), // 数据库连接参数
    'DB_DEBUG'  			=>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    'DB_DEPLOY_TYPE'        =>  0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'DB_RW_SEPARATE'        =>  false,       // 数据库读写是否分离 主从式有效
    'DB_MASTER_NUM'         =>  1, // 读写分离后 主服务器数量
    'DB_SLAVE_NO'           =>  '', // 指定从服务器序号
    
    
    /*订单和商户渠道列表*/
   	'orderChannelList'			=>	array(
   		'Dada'	=>	'达达',
   	),
   	'merchantChannelList'			=>	array(
   		'Dada'	=>	'达达',
   	),
   	/*订单接口列表*/
   	'orderEventList'			=>	array(
   		'addOrder' 		=>	'新增订单',
  		'reAddOrder' 	=>	'重发订单',
  		'addTip' 		=>	'订单增加小费',
  		'orderDetail' 	=>	'订单详情查询',
  		'formalCancel' 	=>	'取消订单',
  		'cancelReasons' =>	'订单取消原因',
  		'appointExist' 	=>	'追加订单',
  		'appointCancel' =>	'取消追加订单',
  		'appointListTransporter' =>	'查询追加配送员',
   	),
  	
  	/*商户接口列表*/
  	'merchantEventList'			=>	array(
   		'cityList'		=>	'获取城市信息',
	  	'addMerchant'	=>	'注册商户',
	  	'addShop'		=>	'新增门店',
	  	'updateShop'	=>	'编辑门店',
	  	'shopDetail'	=>	'门店详情',
   	),
);