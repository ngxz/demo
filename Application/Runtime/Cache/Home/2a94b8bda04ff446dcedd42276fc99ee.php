<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>首页</title>
		<link href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css" rel="stylesheet">
		<style type="text/css">
			#iframe{border:none;margin:0;padding:0;}
		</style>
  		<script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery/dist/jquery.min.js"></script>
  		<script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
  		<script type="text/javascript">
  			$(function(){
  				//iframe适应
				window.onresize=function(){  
				     changeFrameHeight();  
				}
				
				//高光
  				$(".sui-nav li a").on('click',function(){
  					$(".sui-nav li").removeClass('active');
  					$(this).parent().addClass('active');
  				})
  			});
  			//计算iframe宽高
  			function changeFrameHeight(){
			    var ifm= document.getElementById("iframe"); 
			    var heighth = $('.sui-row-fluid').height()+10;
			    ifm.height=document.documentElement.clientHeight-heighth;
			    var h = $(".content").width();
			    var h1 = $(".sidebar").width();
			    ifm.width=h-h1-1;
			    //左侧高度
			    $(".sidebar").height(document.documentElement.clientHeight-heighth);
			}
  			//打开新页面
  			function openpage(url){
				$("#iframe").attr("src","/demo/"+url);
			}
  			
  		</script>
	</head>
	<body>
		<!--顶部nav-->
		<div class="sui-row-fluid">
		    <div class="span12">
		    	<div class="sui-navbar" style="margin-bottom: 0;">
				  <div class="navbar-inner"><a href="#" class="sui-brand">SUI</a>
				    <ul class="sui-nav">
				      <li class="active"><a href="#">订单管理</a></li>
				      <li><a href="#">系统设置</a></li>
				      <li><a href="#">关于我们</a></li>
				    </ul>
				  </div>
				</div>
		    </div>
		</div>
		<!--内容-->
		<div class="sui-layout">
		  <div class="sidebar" style="width: 80px;background-color:#fafafa;border-right: 1px solid #eee;">
		  	<ul class="sui-nav nav-list">
			  <li class="nav-header">订单</li>
			  <li class="active"><a onclick="javascript:openpage('Home/tongji')">统计</a></li>
			  <li><a onclick="javascript:openpage('Home/actlist')">查看</a></li>
			  <li><a onclick="javascript:openpage('Home/add')">添加</a></li>
			  <li class="nav-header">商品</li>
			  <li><a onclick="javascript:openpage('Shop/shoppinglist')">所有 </a></li>
			  <li><a onclick="javascript:openpage('Shop/add')">新增</a></li>
			  <li class="nav-header">个人</li>
			  <li><a onclick="javascript:openpage('User/index')">信息</a></li>
			  <li><a onclick="javascript:openpage('User/zijin')">资金</a></li>
			  <li><a onclick="javascript:openpage('Index/logout')">退出</a></li>
			</ul>
		  </div>
		  <div class="content" style="margin-left: 0;">
		  	<iframe src="/demo/Home/tongji" id="iframe" onload="changeFrameHeight()"></iframe>
		  </div>
		</div>
		
	</body>
</html>