<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>商品列表</title>
		<link rel="stylesheet" href="//g.alicdn.com/sui/sui3/0.0.18/css/sui.min.css">
		<link rel="stylesheet" href="/demo/Public/static/css/main.css" />
		<style type="text/css">
			.table{margin: 0 15px;width: 98%;}
			/*分页修饰*/
			.pages{text-align: center;margin: 10px 0;}
			.pages a,.pages span {display:inline-block;padding:1px 4px;margin:0 1px;border:1px solid #f0f0f0;}
			.pages a,.pages li {display:inline-block;text-decoration:none;color:#58A0D3;padding: 4px 9px;border:1px solid #f0f0f0;}
			.pages a.first,.pages a.prev,.pages a.next,.pages a.end{padding: 4px 9px;margin:0;}
			.pages a:hover{border-color:#50A8E6;}
			.pages a.num{padding: 4px 9px;}
			.pages span.current{padding: 4px 9px;background:#50A8E6;color:#FFF;font-weight:700;border-color:#50A8E6;}
		</style>
		
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
	<script type="text/javascript">
		function edit(id){
			window.location.href = "/demo/Home/Shop/edit/id/"+id;
		}
		function del(id){
			$.post("/demo/Home/Shop/del",{'id':id},function(data){
				alert(data.msg);
				if(data.status){
					window.location.reload();
				}
			},"json");
		}
	</script>
</html>