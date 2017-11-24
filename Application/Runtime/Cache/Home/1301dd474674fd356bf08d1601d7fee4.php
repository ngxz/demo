<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="//g.alicdn.com/sui/sui3/0.0.18/css/sui.min.css">
		<link rel="stylesheet" href="/demo/Public/static/css/main.css" />
	</head>
	<body>
		<ol class="breadcrumb">
		  <li><a href="#">订单管理</a></li>
		  <li class="active">订单列表</li>
		</ol>
		<form class="searchform form-inline">
		  	<div class="form-group">
			    <label for="code" class="control-label">商品编号</label>
			    <input type="text" class="form-control" id="code" name="code" placeholder="商品编号">
			</div>
			<div class="form-group">
			    <label for="name" class="control-label">商品名称</label>
			    <input type="text" class="form-control" id="name" name="name" placeholder="商品名称" required>
			</div>
			<div class="form-group">
			    <label for="name" class="control-label">商品价格</label>
			    <input type="text" class="form-control" id="price" name="price" placeholder="商品价格" required>
			</div>
			<div class="form-group input-daterange" data-toggle="datepicker" data-date-start-date='2010-01-01' data-date-end-date='2020-12-31'>
			  	<label for="name" class="control-label">日期范围</label>
			  	<input type="text" class="form-control input-date" placeholder="开始日期"  value='2017-01-01'/> -
			  	<input type="text" class="form-control input-date" placeholder="结束日期" value='2017-10-31'/>
			</div>
			<div class="form-group">
				<button type="button" class="sui-btn btn-primary">筛选</button>
			</div>
		</form>
		
		<table class="table table-bordered">
		  <thead>
		    <tr>
		      <th>订单号</th>
		      <th>商户号</th>
		      <th>时间</th>
		      <th>价格</th>
		      <th>详细描述</th>
		      <th>操作者IP</th>
		      <th>渠道</th>
		      <th>组件</th>
		      <th>接口</th>
		      <th>小费</th>
		      <th>操作</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php if(is_array($orderlists)): $i = 0; $__LIST__ = $orderlists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$orderlist): $mod = ($i % 2 );++$i;?><tr>
			      <td><?php echo ($orderlist["sn"]); ?></td>
			      <td><?php echo ($orderlist["source_id"]); ?></td>
			      <td><?php echo (date('Y-m-d',$orderlist["time"])); ?></td>
			      <td><?php echo ($orderlist["money"]); ?></td>
			      <td><?php echo (msubstr($orderlist["msg"],0,60)); ?></td>
			      <td><?php echo ($orderlist["client_ip"]); ?></td>
			      <td><?php echo ($orderlist["channel"]); ?></td>
			      <td><?php echo ($orderlist["assembly"]); ?></td>
			      <td><?php echo ($orderlist["event"]); ?></td>
			      <td><?php echo ($orderlist["tips"]); ?></td>
			      <td>
			      	<a onclick="orderdetail(<?php echo ($orderlist["id"]); ?>)" class="sui-btn btn-bordered btn-small">详情</a>
			      </td>
			    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
		  </tbody>
		</table>
		
		<!--分页-->
		
	</body>
	<script type="text/javascript" src="//g.alicdn.com/sj/lib/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="//g.alicdn.com/sui/sui3/0.0.18/js/sui.min.js"></script>
	<script type="text/javascript">
		function orderdetail(id){
			var url = "/demo/index.php/Home/detail";
			window.location.href = url+'/id/'+id;
		}
	</script>
</html>