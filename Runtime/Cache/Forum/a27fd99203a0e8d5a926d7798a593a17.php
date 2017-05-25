<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/forum-system/Public/Forum/css/userdetail.css">
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
		  $("#flip").click(function(){
		    $("#panel").slideToggle("slow");
		  });
		  $("#panel").hide();
		});
	</script>
	<style type="text/css">
		body{
			margin-left:auto;
			margin-right:auto;
			margin-top:50PX;
			width:100%;
		}
		.nav{
			position: fixed;
			top: 0;
			left: 0;
			z-index: 20;
			width: 100%;
		}
/*		.img-rounded{
			width:50px;
			height: 50px;
			border-radius: 25px;
		}*/
		#guidebar{

			float: left;
		}

		.ue-sidenav{

			margin-left: 300px;

		}
		.category, a:hover{
			color: #66FFFF;
		}
		#guidebar a{

			color: #4169E1;

		}
		.ue-sidebar{
			margin-top: 10px;
			margin-bottom: 10px;
			font-size: 17px;
		}
		.table{
			margin-top: 100px;
			margin-left: 380px;
			width: 500px;	
		}
		.table-font-color1{
			color: #66FFCC;
		}
		.table-font-color2{
			color: #66CCFF;
		}
		.category a{
			text-decoration:none;
		}
		ul,li{
		  	list-style: none;
		}
		#modify{
			float: auto;
			margin-left: 900px;
		}

		.navigation{
			width: 80px;
			float: right;
		}
		.img-navigation{
			width:50px;
			height: 50px;
			float: right;
			border-radius: 25px;
		}
		.button-navigation{
			width: 51px;
			height: 52px;
			border-radius: 25px;
		    background-color: #330066;
		    margin-top: 5px;
		    margin-right:  5px;
		    float: right;
		}

	</style>
	<title>个人中心</title>

</head>
<body>

	<div id="flip" class="navigation">
		<div class="button-navigation">
			<a href="<?php echo U('Forum/UserDetail/index');?>">
				<img class="img-navigation" src="/forum-system/Public/Forum/image/<?php echo ($userHead["for_head"]); ?>">
			</a>
		</div>
		<div class="button-navigation">
			<img class="img-navigation" src="/forum-system/Public/Forum/image/menu.jpg">
		</div>
		<div id="panel" class="navigation">
				<div class="button-navigation">
						<a href="<?php echo U('Forum/MainPost/addMain');?>" title="新增主贴">
							<img class="img-navigation" src="/forum-system/Public/Forum/image/new.jpg">
						</a>
				</div>
				<div class="button-navigation">
						<a href="<?php echo U('Forum/MainPost/index');?>" title="返回论坛主页">
							<img class="img-navigation" src="/forum-system/Public/Forum/image/homepage.jpg">
						</a>
				</div>
				<div class="button-navigation">
						<a href="<?php echo U('Forum/Login/logout');?>" title="注销">
							<img class="img-navigation" src="/forum-system/Public/Forum/image/exit.jpg">
						</a>
				</div>
		</div>
	</div>

<div class="wrap">

	<div   class="ue-sidenav">
		<div style="width: 300px;height: 300px;position: absolute;margin-top: 150px;margin-left: 50px;">
			<img src="/forum-system/Public/Forum/image/<?php echo ($UserDetail["for_head"]); ?>" alt="头像" align="middle" class="img-rounded" style="width: 300px;height: 300px;border-radius: 50px;">
		</div>
		<h2 class="table" align="center"><font color="#9999FF" size="5"><?php echo ($UserDetail["for_name"]); ?>&#12288;的信息详情</font></h2>
		<table class="table table-bordered table-condensed ">
			<tbody>
				<tr>
					<td><span class="table-font-color1">账&#12288;&#12288;号</span></td>
					<td><span class="table-font-color2"><?php echo ($UserDetail["for_id"]); ?></span></td>
				</tr>
				<tr>
					<td><span class="table-font-color1">昵&#12288;&#12288;称</span></td>
					<td><span class="table-font-color2"><?php echo ($UserDetail["for_name"]); ?></span></td>
				</tr>
<!-- 				<tr>
					<td><span class="table-font-color1">头&#12288;&#12288;像</span></td>
					<td><img src="/forum-system/Public/Forum/image/<?php echo ($UserDetail["for_head"]); ?>" alt="头像" align="middle" class="img-rounded"></td>
				</tr> -->
				<tr>
					<td><span class="table-font-color1">性&#12288;&#12288;别</span></td>
					<td><span class="table-font-color2"><?php echo ($UserDetail["for_sex"]); ?></span></td>
				</tr>
				<tr>
					<td><span class="table-font-color1">Q&#12288;&#12288;&nbsp;Q</span></td>
					<td><span class="table-font-color2"><?php echo ($UserDetail["for_qq"]); ?></span></td>
				</tr>
				<tr>
					<td><span class="table-font-color1">微&#12288;&#12288;信</span></td>
					<td><span class="table-font-color2"><?php echo ($UserDetail["for_wechat"]); ?></span></td>
				</tr>
				<tr>
					<td><span class="table-font-color1">手&#12288;&#12288;机</span></td>
					<td><span class="table-font-color2"><?php echo ($UserDetail["for_tel"]); ?></span></td>
				</tr>
				<tr>
					<td><span class="table-font-color1">邮&#12288;&#12288;箱</span></td>
					<td><span class="table-font-color2"><?php echo ($UserDetail["for_email"]); ?></span></td>
				</tr>
				<tr>
					<td><span class="table-font-color1">家&#12288;&#12288;乡</span></td>
					<td><span class="table-font-color2"><?php echo ($UserDetail["for_hometown"]); ?></span></td>
				</tr>
				<tr>
					<td><span class="table-font-color1">星&#12288;&#12288;座</span></td>
					<td><span class="table-font-color2"><?php echo ($UserDetail["for_constellation"]); ?></span></td>
				</tr>
				<tr>
					<td><span class="table-font-color1">个性签名</span></td>
					<td><span class="table-font-color2"><?php echo ($UserDetail["for_signature"]); ?></span></td>
				</tr>
				<tr>
					<td><span class="table-font-color1"><a href="<?php echo U('Forum/UserDetail/introduce');?>"> 论坛等级</a></span></td>
					<td><span class="table-font-color2"><?php echo ($UserDetail["for_level"]); ?></span></td>
				</tr>
				<tr>
					<td><span class="table-font-color1"><a href="<?php echo U('Forum/UserDetail/introduce');?>"> 经&nbsp;验&nbsp;值</a></span></td>
					<td><span class="table-font-color2"><?php echo ($UserDetail["for_value"]); ?></span></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="nav-main">
<div class="nav-box">
<div class="nav">
  <ul class="nav-ul">
  			<li><a href="<?php echo U('Forum/MainPost/index');?>"><span>返回论坛主页</span></a></li>
			<li><a href="<?php echo U('Forum/UserDetail/myPost');?>"><span>我的主帖管理</span></a></li>
			<li><a href="<?php echo U('Forum/ReplyPost/myReply');?>"><span>我的回复管理</span></a></li>
			<li><a href="<?php echo U('Forum/UserDetail/modify');?>"><span>个人信息管理</span></a></li>
			<li><a href="<?php echo U('Forum/Login/logout');?>"><span>注销</span></a></li>
  </ul>
</div>
<div class="nav-slide">
    <div class="nav-slide-o"></div>
    <div class="nav-slide-o">
    	<ul>
    		<li><a href="<?php echo U('Forum/MainPost/addMain');?>"><span>新增主贴</span></a></li>
			<li><a href="<?php echo U('Forum/UserDetail/myPost');?>"><span>我的发帖</span></a></li>
			<li><a href="<?php echo U('Forum/UserDetail/recovery');?>"><span>回收站</span></a></li>
    	</ul>
    </div>
    <div class="nav-slide-o">
    	<ul>
			<li><a href="<?php echo U('Forum/ReplyPost/myReply');?>"><span>我的回复</span></a></li>
			<li><a href="<?php echo U('Forum/ReplyPost/recovery');?>"><span>回收站</span></a></li>
    	</ul>
    </div>
    <div class="nav-slide-o">
    	<ul>
    		<li><a href="<?php echo U('Forum/UserDetail/modify');?>"><span>修改个人信息</span></a></li>
			<li><a href="<?php echo U('Forum/UserID/modify');?>"><span>修改登陆密码</span></a></li>
    	</ul>
    </div>
</div>
</div>
</div>

<script type="text/javascript" src="/forum-system/Public/Forum/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
	$(function(){
	var thisTime;
	$('.nav-ul li').mouseleave(function(even){
			thisTime	=	setTimeout(thisMouseOut,1000);
	})

	$('.nav-ul li').mouseenter(function(){
		clearTimeout(thisTime);
		var thisUB	=	$('.nav-ul li').index($(this));
		if($.trim($('.nav-slide-o').eq(thisUB).html()) != "")
		{
			$('.nav-slide').addClass('hover');
			$('.nav-slide-o').hide();
			$('.nav-slide-o').eq(thisUB).show();
		}
		else{
			$('.nav-slide').removeClass('hover');
		}

	})

	function thisMouseOut(){
		$('.nav-slide').removeClass('hover');
	}

	$('.nav-slide').mouseenter(function(){
		clearTimeout(thisTime);
		$('.nav-slide').addClass('hover');
	})
	$('.nav-slide').mouseleave(function(){
		$('.nav-slide').removeClass('hover');
	})

})
</script>
</body>
</html>

<!-- <!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="initial-scale=1,width=device-width,user-scalable=no"/>
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css"> 
	<link rel="shortcut icon" href="image/login.ico">
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style type="text/css">
		body{  
			margin-left:auto;  
			margin-right:auto; 
			margin-top:50PX; 
			width:70%;
		}
		.img-rounded{
			width:50px;
			height: 50px;
			border-radius: 25px;
		}
		#guidebar{

			float: left;
		}

		.ue-sidenav{

			margin-left: 300px;
			
		}
		.category, a:hover{
			color: red;
		}
		#guidebar a{

			color: #4169E1;

		}
		.ue-sidebar{
			margin-top: 10px;
			margin-bottom: 10px;
			font-size: 17px;
		}
		.table{
			width: 800px;
		}
		.category a{
			text-decoration:none;
		}
		ul,li{
		  	list-style: none;
		}
		#modify{
			float: auto;
		}
	</style>
	<title>个人中心</title>
</head>

<body>
	<div class="ue-sidebar" id="guidebar" role="complementary">
		<ul class="category">
			<li id="userdetail"><a href="<?php echo U('Forum/MainPost/index');?>">返回论坛主页</a></li>
			<li id="myPost"><a href="<?php echo U('Forum/UserDetail/myPost');?>">我的发帖</a></li>
			<li id="myPost"><a href="<?php echo U('Forum/ReplyPost/myReply');?>">我的回帖</a></li>
			<li id="logout"><a href="<?php echo U('Forum/Login/logout');?>">注销</a></li>
		</ul>
	</div>
	<div   class="ue-sidenav">
		<h3 class="table" align="center">用户信息详情</h3>
		<table class="table table-bordered table-condensed ">
			<tbody>
				
				<tr>
					<td>账号</td> 
					<td><?php echo ($UserDetail["for_id"]); ?></td>
				</tr>
				<tr>
					<td>昵称</td>
					<td><?php echo ($UserDetail["for_name"]); ?></td>
				</tr>
				<tr>
					<td>头像</td>
					<td><img src="/forum-system/Public/Forum/image/<?php echo ($UserDetail["for_head"]); ?>" alt="头像" align="middle" class="img-rounded"></td>
				</tr>
				<tr>
					<td>性别</td>
					<td><?php echo ($UserDetail["for_sex"]); ?></td>
				</tr>
				<tr>
					<td>QQ</td>
					<td><?php echo ($UserDetail["for_qq"]); ?></td>
				</tr>
				<tr>
					<td>微信</td>
					<td><?php echo ($UserDetail["for_wechat"]); ?></td>
				</tr>
				<tr>
					<td>手机</td>
					<td><?php echo ($UserDetail["for_tel"]); ?></td>
				</tr>
				<tr>
					<td>邮箱</td>
					<td><?php echo ($UserDetail["for_email"]); ?></td>
				</tr>
				<tr>
					<td>家乡</td>
					<td><?php echo ($UserDetail["for_hometown"]); ?></td>
				</tr>
				<tr>
					<td>星座</td>
					<td><?php echo ($UserDetail["for_constellation"]); ?></td>
				</tr>
				<tr>
					<td>个性签名</td>
					<td><?php echo ($UserDetail["for_signature"]); ?></td>
				</tr>
				<tr>
					<td>论坛等级</td>
					<td><?php echo ($UserDetail["for_level"]); ?></td>
				</tr>
				<tr>
					<td>经 验 值</td>
					<td><?php echo ($UserDetail["for_value"]); ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html> -->