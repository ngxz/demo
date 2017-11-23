<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="//g.alicdn.com/sui/sui3/0.0.18/css/sui.min.css">
		<link rel="stylesheet" type="text/css" href="/demo/Public/static/css/main.css" />
	</head>
	<body>
		<ol class="breadcrumb">
		  <li><a href="#">首页</a></li>
		  <li><a href="#">个人</a></li>
		  <li class="active">个人信息</li>
		</ol>
		<form class="form" id="form" method="post" enctype="multipart/form-data">
			<div class="form-group">
			    <label for="name" class="control-label">姓名</label>
			    <input type="text" class="form-control" id="name" name="name" placeholder="姓名" required>
			</div>
			<div class="form-group">
			    <label for="name" class="control-label">帐号</label>
			    <input type="text" class="form-control" id="price" name="price" placeholder="帐号" readonly>
			</div>
			<div class="form-group">
			    <label for="name" class="control-label">密码</label>
			    <input type="password" class="form-control" id="price" name="price" placeholder="密码" required>
			</div>
			<div class="form-group">
			    <label for="name" class="control-label">权限</label>
			    <input type="text" class="form-control" id="price" name="price" placeholder="权限" readonly>
			</div>
		  	<div class="form-group" style="overflow: hidden;">
		    	<label for="file">头像</label>
		    	<br />
		    	<input type="file" id="pic" name="pic" style="display: none;" onchange="filenamechange()">
		    	<input type="text" id="url" class="form-control" style="width: 80%;float: left;" value="没有选择任何文件" />
		    	<a class="btn btn-default" style="float: right;" href="#" role="button" onclick="btnclick()">选择图片</a>
		  	</div>
		  	
			<div class="control-group">
				<label class="control-label">详细描述：</label>
				<div class="controls">
					<textarea id="info" name="info" class="form-control" rows="3"></textarea>
				</div>
			</div>
			<div class="control-group" style="text-align: center;margin-top: 30px;">
				<div class="controls">
					<button type="button" onclick="edit()" class="sui-btn btn-primary">修改信息</button>
					<button type="reset" class="sui-btn">重置</button>
				</div>
			</div>
		</form>
	</body>
	<script type="text/javascript" src="//g.alicdn.com/sj/lib/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="//g.alicdn.com/sui/sui3/0.0.18/js/sui.min.js"></script>
</html>