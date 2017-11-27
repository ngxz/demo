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
				      <li class="active"><a onclick="javascript:openpage('Order/tongji')">首页</a></li>
				      <li><a href="#">系统设置</a></li>
				      <li><a href="#">关于我们</a></li>
				    </ul>
				    <ul class="sui-nav" style="float: right;">
				      <li><a onclick="javascript:openpage('User/index')">个人信息</a></li>
				      <li><a onclick="javascript:openpage('Index/logout')">退出</a></li>
				    </ul>
				  </div>
				</div>
		    </div>
		</div>
		<!--内容-->
		<div class="sui-layout">
		  <div class="sidebar" style="width: 80px;background-color:#fafafa;border-right: 1px solid #eee;">
		  	<ul class="sui-nav nav-list">
			  <li class="nav-header">订单管理</li>
			  <li><a onclick="javascript:openpage('Order/orderlist')">列表</a></li>
			  <!--<li><a onclick="javascript:openpage('Home/add')">新增</a></li>-->
			  <li class="nav-header">商户管理</li>
			  <li><a onclick="javascript:openpage('Merchant/merchantlist')">列表 </a></li>
			  <!--<li><a onclick="javascript:openpage('Merchant/merchantdetail')">新增</a></li>-->
			</ul>
		  </div>
		  <div class="content" style="margin-left: 0;">
		  	<iframe src="/demo/Order/tongji" id="iframe" onload="changeFrameHeight()"></iframe>
		  </div>
		</div>
		
	</body>
</html>