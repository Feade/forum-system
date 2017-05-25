<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title>登录</title>
	<meta name="renderer" content="webkit">
	<link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript" src="/forum-system/Public/js/login.js"></script>
	<style type="text/css">
/*		body{
			background-color:#CCCCCC;
			background-image:url(/forum-system/Public/Forum/image/login.jpg);
			background-origin: 10px;
			background-position:absolute;
			background-repeat:no-repeat;
			background-attachment:fixed;
			margin-left:auto;
			margin-right:auto;
		}*/
		.input-form{
			margin-left:auto;
			margin-right:auto;
			margin-top:150PX;
			width:20em;
		}
		.input-group{
			margin-bottom: 10px;
		}
		.background-img{
			margin-left:auto;
			margin-right:auto;
			margin-top:-150PX;
			position: absolute;
			width: 100%;
			height: 100%;
			z-index: -1;
		}
	</style>
</head>
<body>
		<div class="background-img">
			<img src="/forum-system/Public/Forum/image/background.jpg" height="100%" width="100%" />
		</div>
	<div class="input-form">
		<form action="<?php echo U('Forum/Admin/login');?>" method="post">
			<div class="input-group">
				 <span class="input-group-addon" id="basic-addon1">@</span>
				<input class="form-control" type="text" name="name" placeholder="用户名" >
			</div>
			<div class="input-group">
				 <span class="input-group-addon" id="basic-addon1">@</span>
				<input class="form-control" type="password" name="password" placeholder="密码" >
			</div>

			<div class="input-group">

			<button  class="btn btn-default" type="submit" style="width:280px">登录</button>
			</div>
			<button  class="btn btn-default" id="reset" type="reset" style="width:280px">重置</button>
		</form>
	</div>
</body>
</html>