<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title>用户密码修改</title>

	<link href="/tp3/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/tp3/Public/css/bootstrap-responsive.min.css" rel="stylesheet">
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
	<style type="text/css">
		body{
			margin-left:auto;
			margin-right:auto;
			margin-top:50PX;
			width:80%;
			}
		span{
			color:red;
		}
    .left-group{
      position: absolute;
    }
    form{
      width: 50%;
      margin: auto;
    }
	</style>
</head>
<body>
<div class="left-group">
  <p id="userdetail"><a href="<?php echo U('Forum/MainPost/index');?>">返回论坛主页</a></p>
  <p id="userdetail"><a href="<?php echo U('Forum/UserDetail/index');?>">返回个人中心</a></p>
  <p id="logout"><a href="<?php echo U('Forum/Login/logout');?>">注销</a></p>
  <br><br>
</div>

<form action="<?php echo U('Forum/UserID/modify');?>" method="post" class="form-horizontal">

  <div class="control-group">
    <label class="control-label" >原密码</label>
    <div class="controls">
      <input type="password"   name="old_password"><span>&nbsp* </span>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >新密码</label>
    <div class="controls">
      <input type="password"   name="for_password"><span>&nbsp* </span>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >重新确认新密码</label>
    <div class="controls">
      <input type="password"   name="new_password"><span>&nbsp* </span>
    </div>
  </div>

  <div class="control-group">
    <div class="controls">
      <button type="reset" class="input">重新输入</button>
    </div>
  </div>

  <div class="control-group">
    <div class="controls">
      <button type="submit" class="modify">修改</button>
    </div>
  </div>
</form>

</body>
</html>