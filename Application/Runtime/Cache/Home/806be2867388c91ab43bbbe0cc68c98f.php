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
		<form class="searchform form-inline" method="get" action="/demo/index.php/Order/orderlist">
		  	<div class="form-group">
			    <label for="code" class="control-label">订单号</label>
			    <input type="text" class="form-control" class="sn" name="sn" placeholder="订单号" value="<?php echo ($sqlmap["sn"]); ?>">
			</div>
			<div class="form-group">
			    <label for="name" class="control-label">商户号</label>
			    <input type="text" class="form-control" class="source_id" name="source_id" placeholder="商户号" value="<?php echo ($sqlmap["source_id"]); ?>">
			</div>
			<div class="form-group">
			    <label for="name" class="control-label">渠道</label>
			    <select class="form-control" class="channel" name="channel">
			    	<option value="-1">请选择</option>
			      	<option value="Dada">达达</option>
			      	<option value="fengniao">蜂鸟</option>
			    </select>
			</div>
			<div class="form-group input-daterange" data-toggle="datepicker" data-date-start-date='2010-01-01' data-date-end-date='2020-12-31'>
			  	<label for="name" class="control-label">日期范围</label>
			  	<input type="text" class="form-control input-date" class="startdate" name="startdate" placeholder="开始日期"  value='<?php echo ($sqlmap["startdate"]); ?>'/> -
			  	<input type="text" class="form-control input-date" class="enddate" name="enddate" placeholder="结束日期" value='<?php echo ($sqlmap["enddate"]); ?>'/>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-default">筛选</button>
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
			      <td><?php echo ($orderlist["event"]); ?></td>
			      <td><?php echo ($orderlist["tips"]); ?></td>
			      <td>
			      	<a href='javascript:void()' onclick='orderdetail(<?php echo ($orderlist["id"]); ?>)' class='sui-btn btn-bordered btn-small'>详情</a>
			      </td>
			    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
		  </tbody>
		</table>
		
		<!--分页-->
		<nav>
		  <div class="pagination">
		    <ul>
		      <li class="prev">
		        <a href="javascript:void(0)" onclick="javascript:turnpage(this,-1)">上一页</a>
		      </li>
		      <li class="1"><a>当前位于第：<?php echo ($page); ?> 页</a></li>
		      <li class="next">
		        <a href="javascript:void(0)" onclick="javascript:turnpage(this,0)">下一页</a>
		      </li>
		      <li><a>到：<input class="turninput" type="text"/> 页</a><a onclick="javascript:turnpage(this,1)">跳转</a></li>
		      <li><a class="totalpage"></a></li>
		    </ul>
		  </div>
		</nav>
	</body>
	<script type="text/javascript" src="//g.alicdn.com/sj/lib/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="//g.alicdn.com/sui/sui3/0.0.18/js/sui.min.js"></script>
	<script type="text/javascript">
		//回填筛选条件
	    $("select[name='channel']").val("<?php echo ($sqlmap["channel"]); ?>");
	    
		//页数
		var nowpage = <?php echo ($page); ?>;
		var totalpage = Math.ceil(<?php echo ($ordercount); ?>/10);
		$(".totalpage").text('总页数：'+totalpage+'页');
		//详情
		function orderdetail(id){
			var url = "/demo/index.php/Order/orderdetail";
			window.location.href = url+'/id/'+id;
		}
		//翻页
		function turnpage(obj,page){
			var url = "/demo/index.php/Order/orderlist";
			if(page == 0){
				page = nowpage+1;
				if(page > totalpage){
					alert('已经是最后一页');
					return false;
				}
			}
			if(page < 0){
				page = nowpage - 1;
				
				if(page < 1){
					alert('已经是第一页');
					return false;
				}
			}
			if(page == 1){
				page = $(".turninput").val();
				if(page > totalpage){
					alert('该页不存在');
					$(".turninput").val('');
					return false;
				}
			}
			window.location.href = url+'/page/'+page;
		}
	</script>
</html>