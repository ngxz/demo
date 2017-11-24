<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>商品列表</title>
		<link rel="stylesheet" href="//g.alicdn.com/sui/sui3/0.0.18/css/sui.min.css">
		<link rel="stylesheet" href="/demo/Public/static/css/main.css" />
		
	</head>
	<body>
		<ol class="breadcrumb">
		  <li><a href="#">商户管理</a></li>
		  <li class="active">商户列表</li>
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
		      <th>编号</th>
		      <th>名称</th>
		      <th>价格</th>
		      <th>类别</th>
		      <th>支持服务</th>
		      <th>通知方式</th>
		      <th>修改时间</th>
		      <th>详细描述</th>
		      <th>操作</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
		  			
			      <td><?php echo ($list["code"]); ?></td>
			      <td><?php echo ($list["name"]); ?></td>
			      <td><?php echo ($list["price"]); ?></td>
			      <td>
			      	<?php if($list["category"] == 1): ?>食品
			      	<?php elseif($list["category"] == 2): ?>服装
			      	<?php elseif($list["category"] == 3): ?>数码
			      	<?php elseif($list["category"] == 4): ?>生活
			      	<?php elseif($list["category"] == 5): ?>护肤<?php endif; ?>
			      </td>
			      <td><?php echo ($list["zhengce"]); ?></td>
			      <td>
			      	<?php if($list["note"] == 1): ?>商家中心
			      	<?php elseif($list["note"] == 2): ?>旺旺弹窗
			      	<?php else: ?>站内信<?php endif; ?>
			      </td>
			      <td><?php echo (date('Y-m-d',$list["add_time"])); ?></td>
			      
			      <td><p><?php echo ($list["info"]); ?></p></td>
			      <td>
			      	<a href="javascript:edit(<?php echo ($list["id"]); ?>)" class="sui-btn btn-bordered btn-small">修改</a>
			      	<a href="javascript:del(<?php echo ($list["id"]); ?>);" class="sui-btn btn-bordered btn-small">删除</a>
			      </td>
			    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
		    
		  </tbody>
		</table>
		<div class="pages">
			<?php echo ($page); ?>
		</div>
	</body>
	<script type="text/javascript" src="//g.alicdn.com/sj/lib/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="//g.alicdn.com/sui/sui3/0.0.18/js/sui.min.js"></script>
	<!--<script type="text/javascript" src="/demo/Public/static/js/datepicker.js" ></script>-->
	<script type="text/javascript">
		function edit(id){
			window.location.href = "/demo/Shop/edit/id/"+id;
		}
		function del(id){
			$.post("/demo/Shop/del",{'id':id},function(data){
				alert(data.msg);
				if(data.status){
					window.location.reload();
				}
			},"json");
		}
	</script>
</html>