<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>后台登陆</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Internship Sign In & Sign Up Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="/forum-system/Public/Forum/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<!-- <link href="/forum-system/Public/Forum/css/snow.css" rel="stylesheet" type="text/css" media="all" /> -->
<link href="/forum-system/Public/Forum/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

</head>
<body>
<!-- <div class="snow-container">
	<div class="snow foreground"></div>
	<div class="snow foreground layered"></div>
	<div class="snow middleground"></div>
	<div class="snow middleground layered"></div>
	<div class="snow background"></div>
	<div class="snow background layered"></div>
</div> -->

<h1>Welcome Landing Background Management System</h1>
<div class="main-agileits">
		<div class="form-w3-agile" style="margin-top: 200px;">
			<h2 class="sub-agileits-w3layouts">Sign Up</h2>
			<form action="<?php echo U('Forum/Adm/login');?>" method="post">
					<input type="text" name="name" placeholder="Username" required="" />
					<input type="password" name="password" placeholder="Password" required="" />
				<div class="submit-w3l">
					<input type="submit" value="Sign up">
				</div>
			</form>
		</div>
		</div>
	<div class="copyright w3-agile">
		<p style="margin-left: 35%;margin-top: -40px;"><a href="<?php echo U('Forum/Login/login');?>" target="_blank" title="进入论坛登陆入口">Landing Forum</a></p>
	</div>
	<script type="text/javascript" src="/forum-system/Public/Forum/js/jquery-2.1.4.min.js"></script>
</body>
</html>