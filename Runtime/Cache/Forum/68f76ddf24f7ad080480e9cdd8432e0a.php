<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="initial-scale=1,width=device-width,user-scalable=no"/>
  <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css"> 
  <link rel="shortcut icon" href="image/login.ico">
  <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="/tp3/Public/css/bootstrap.min.css" rel="stylesheet">
  <link href="/tp3/Public/css/bootstrap-responsive.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
  <title>个人信息修改</title>
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
  <style type="text/css">
    body{
      margin-left:auto;
      margin-right:auto;
      margin-top:20PX;
      width:80%;
      }
    span{
      color:red;
    }
    .user-1{
      position: absolute;
      float: left;
        
  }
    .auter-1{
      margin-left: 400px;
      float: clear;
  }
    .category a{
      text-decoration:none;
  }
      .user-2{

        margin-top: 10px;
      margin-bottom: 10px;
      font-size: 17px;
  }
    ul,li{
        list-style: none;
  }

  </style>
</head>
<div class="user-1" >
<ul>
  <li id="userdetail" class="user-2"><a href="<?php echo U('Forum/MainPost/index');?>">返回论坛主页</a></li>
  <li id="userdetail" class="user-2"><a href="<?php echo U('Forum/UserDetail/index');?>">返回个人中心</a></li>
  <li id="logout" class="user-2"><a href="<?php echo U('Forum/UserID/modify');?>">修改登陆密码</a></li>
  <li id="logout" class="user-2"><a href="<?php echo U('Forum/Login/logout');?>">注销</a></li>
</ul>
</div>
<div class="auter-1">
<form action="<?php echo U('Forum/UserDetail/modify');?>" method="post" class="form-horizontal" enctype="multipart/form-data">

  <div class="control-group">
    <label class="control-label" >论坛账号</label>
    <div class="controls">
      <input type="text"  readonly="ture" name="for_id" value="<?php echo ($ID); ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >昵称</label>
    <div class="controls">
      <input type="text"   name="for_name" value="<?php echo ($UserDetail["for_name"]); ?>"><span>&nbsp* </span>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >头像</label>
    <div class="controls">
      <input type="file" name="for_head" value="<?php echo ($UserDetail["for_head"]); ?>">
    </div>
  </div>


  <div class="control-group">
    <label class="control-label" >性别</label>
    <div class="controls">
      <select name="for_sex" value="<?php echo ($UserDetail["for_sex"]); ?>">
        <option></option>
        <option>男</option>
        <option>女</option>
        <option>密</option>
      </select>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >QQ</label>
    <div class="controls">
      <input type="number"  name="for_qq" value="<?php echo ($UserDetail["for_qq"]); ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >微信</label>
    <div class="controls">
      <input type="text"  name="for_wechat" value="<?php echo ($UserDetail["for_wechat"]); ?>">
    </div>
  </div>

    <div class="control-group">
    <label class="control-label" >电话</label>
    <div class="controls">
      <input type="number"  name="for_tel" value="<?php echo ($UserDetail["for_tel"]); ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >邮箱</label>
    <div class="controls">
      <input type="text"  name="for_email" value="<?php echo ($UserDetail["for_email"]); ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >家乡</label>
    <div class="controls">
      <input type="text"  name="for_hometown" value="<?php echo ($UserDetail["for_hometown"]); ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >星座</label>
    <div class="controls">
      <input type="text"  name="for_constellation" value="<?php echo ($UserDetail["for_constellation"]); ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >个性签名</label>
    <div class="controls">
      <textarea rows="5" cols="20" name="for_signature" value="<?php echo ($UserDetail["for_signature"]); ?>">
      </textarea>
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
</div>
<body>





</body>
</html>
<!-- 

<html>
<head>
	<title>个人信息修改</title>

	<link href="/tp3/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/tp3/Public/css/bootstrap-responsive.min.css" rel="stylesheet">
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
	<style type="text/css">
		body{
			margin-left:auto;
			margin-right:auto;
			margin-top:20PX;
			width:80%;
			}
		span{
			color:red;
		}
	</style>
</head>
<body>
  <p id="userdetail"><a href="<?php echo U('Forum/MainPost/index');?>">返回论坛主页</a></p>
  <p id="userdetail"><a href="<?php echo U('Forum/UserDetail/index');?>">返回个人中心</a></p>
  <p id="logout"><a href="<?php echo U('Forum/UserID/modify');?>">修改登陆密码</a></p>
  <p id="logout"><a href="<?php echo U('Forum/Login/logout');?>">注销</a></p>
  <br><br>
<form action="<?php echo U('Forum/UserDetail/modify');?>" method="post" class="form-horizontal" enctype="multipart/form-data">

  <div class="control-group">
    <label class="control-label" >论坛账号</label>
    <div class="controls">
      <input type="text"  readonly="ture" name="for_id" value="<?php echo ($ID); ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >昵称</label>
    <div class="controls">
      <input type="text"   name="for_name" value="<?php echo ($UserDetail["for_name"]); ?>"><span>&nbsp* </span>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >头像</label>
    <div class="controls">
      <input type="file" value="<?php echo ($UserDetail["for_name"]); ?>" name="for_head">
    </div>
  </div>


  <div class="control-group">
    <label class="control-label" >性别</label>
    <div class="controls">
      <select name="for_sex" value="<?php echo ($UserDetail["for_sex"]); ?>">
        <option></option>
        <option>男</option>
        <option>女</option>
        <option>密</option>
      </select>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >QQ</label>
    <div class="controls">
      <input type="number"  name="for_qq" value="<?php echo ($UserDetail["for_qq"]); ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >微信</label>
    <div class="controls">
      <input type="text"  name="for_wechat" value="<?php echo ($UserDetail["for_wechat"]); ?>">
    </div>
  </div>

    <div class="control-group">
    <label class="control-label" >电话</label>
    <div class="controls">
      <input type="number"  name="for_tel" value="<?php echo ($UserDetail["for_tel"]); ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >邮箱</label>
    <div class="controls">
      <input type="text"  name="for_email" value="<?php echo ($UserDetail["for_email"]); ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >家乡</label>
    <div class="controls">
      <input type="text"  name="for_hometown" value="<?php echo ($UserDetail["for_hometown"]); ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >星座</label>
    <div class="controls">
      <input type="text"  name="for_constellation" value="<?php echo ($UserDetail["for_constellation"]); ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >个性签名</label>
    <div class="controls">
      <textarea rows="5" cols="20" name="for_signature" value="<?php echo ($UserDetail["for_signature"]); ?>">
      </textarea>
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
</html> -->