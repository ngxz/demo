<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="//g.alicdn.com/sui/sui3/0.0.18/css/sui.min.css">
		<style type="text/css">
			body{background-color:;}
			.table{margin:0 15px;width: 98%;}
		</style>
		<!--<script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery/dist/jquery.min.js"></script>
  		<script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>-->
	</head>
	<body>
		<ol class="breadcrumb">
		  <li><a href="#">首页</a></li>
		  <li><a href="#">商品</a></li>
		  <li class="active">商品列表</li>
		</ol>
		<table class="table table-bordered">
		  <thead>
		    <tr>
		      <th>编号</th>
		      <th>名称</th>
		      <th>价格</th>
		      <th>库存</th>
		      <th>详细描述</th>
		      <th>操作</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <td>所有交易</td>
		      <td>9999.00</td>
		      <td>999</td>
		      <td>99999.00</td>
		      <td><p>段落</p></td>
		      <td>
		      	<a href="javascript:void(0);" class="sui-btn btn-bordered btn-small">修改</a>
		      	<a href="javascript:void(0);" class="sui-btn btn-bordered btn-small">删除</a>
		      </td>
		    </tr>
		    <tr>
		      <td>待付款</td>
		      <td>9999.00</td>
		      <td>999</td>
		      <td>99999.00</td>
		      <td><p>段落</p></td>
		      <td>
		      	<a href="javascript:void(0);" class="sui-btn btn-bordered btn-small">修改</a>
		      	<a href="javascript:void(0);" class="sui-btn btn-bordered btn-small">删除</a>
		      </td>
		    </tr>
		    <tr>
		      <td>已发货</td>
		      <td>9999.00</td>
		      <td>999</td>
		      <td>99999.00</td>
		      <td><p>段落</p></td>
		      <td>
		      	<a href="javascript:void(0);" class="sui-btn btn-bordered btn-small">修改</a>
		      	<a href="javascript:void(0);" class="sui-btn btn-bordered btn-small">删除</a>
		      </td>
		    </tr>
		    <tr>
		      <td>已成功</td>
		      <td>9999.00</td>
		      <td>999</td>
		      <td>99999.00</td>
		      <td><p>段落</p></td>
		      <td>
		      	<a href="javascript:void(0);" class="sui-btn btn-bordered btn-small">修改</a>
		      	<a href="javascript:void(0);" class="sui-btn btn-bordered btn-small">删除</a>
		      </td>
		    </tr>
		  </tbody>
		</table>
		
		<!---->
		<nav>
		  <div class="pagination" style="text-align: center;">
		    <ul>
		      <li class="disabled prev"><a href="#">&laquo;上一页</a></li>
		      <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
		      <li><a href="#">2</a></li>
		      <li><a href="#">3</a></li>
		      <li><a href="#">4</a></li>
		      <li><a href="#">5</a></li>
		      <li class="next"><a href="#">下一页&raquo;</a></li>
		    </ul>
		    <div>
		      <span>共10页&nbsp;</span><span> 到 <input type="text" class="page-num"><button class="page-confirm" onclick="alert(1)">确定</button> 页</span>
		    </div>
		  </div>
		</nav>
	</body>
	<script type="text/javascript" src="//g.alicdn.com/sj/lib/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="//g.alicdn.com/sui/sui3/0.0.18/js/sui.min.js"></script>
</html>