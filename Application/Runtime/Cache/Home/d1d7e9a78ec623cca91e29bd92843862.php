<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="//g.alicdn.com/sui/sui3/0.0.18/css/sui.min.css">
		<link rel="stylesheet" href="/demo/Public/static/css/main.css" />
	</head>
	<body>
		<table class="table table-bordered orderdetail">
			<tr><td style="width: 80px;">订单号</td><td><?php echo ($result["sn"]); ?></td></tr>
			<tr><td>商户号</td><td><?php echo ($result["source_id"]); ?></td></tr>
			<tr><td>时间</td><td><?php echo ($result["time"]); ?></td></tr>
			<tr><td>价格</td><td><?php echo ($result["money"]); ?></td></tr>
			<tr><td>操作者IP</td><td><?php echo ($result["client_ip"]); ?></td></tr>
			<tr><td>渠道</td><td><?php echo ($result["channel"]); ?></td></tr>
			<tr><td>组件</td><td><?php echo ($result["assembly"]); ?></td></tr>
			<tr><td>接口</td><td><?php echo ($result["event"]); ?></td></tr>
			<tr><td>小费</td><td><?php echo ($result["tips"]); ?></td></tr>
			<tr><td>详细信息</td><td><textarea class="form-control" style="resize: none;" rows="3"><?php echo ($result["msg"]); ?></textarea></td></tr>
		</table>
		
	</body>
	<script type="text/javascript" src="//g.alicdn.com/sj/lib/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="//g.alicdn.com/sui/sui3/0.0.18/js/sui.min.js"></script>
</html>