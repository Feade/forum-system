<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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
				<!-- <tr><td><div align="center">个人信息详情</div></td></tr> -->
				
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
					<td><img src="/tp3/Public/Forum/image/<?php echo ($UserDetail["for_head"]); ?>" alt="头像" align="middle" class="img-rounded"></td>
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
</html>