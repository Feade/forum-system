<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
  <title>个人信息详情</title>

  <!-- <link href="/forum-system/Public/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link href="/forum-system/Public/css/bootstrap-responsive.min.css" rel="stylesheet"> -->
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

  <style type="text/css">
    body{
      background-image: url(/forum-system/Public/Forum/image/timg.jpg);
      background-repeat: no-repeat;
      background-size: 100% 100%;
      margin-left:auto;
      margin-right:auto;
      margin-top:20PX;
      width:80%;
    }
    span{
      color:red;
    }
    .control-group{
      height: 50px;
    }
    .control-div{
      position: relative;
      margin-top: 35px;
      font-weight: 30px
    }
    .control-name{
      margin-top: 200px;
      margin-left: 33%;
    }
    input,.btn{
      width: 200px;
      height: 30px;
      margin-left: 100px;
      /*margin-top: -20px;*/
      border-radius: 5px;
    }
    .form-control{
      width: 200px;
      height: 40px;
      margin-left: 100px;
      /*margin-top: -20px;*/
      border-radius: 5px;
    }
    form{
      margin-top: -280px;
      margin-left: 35%;
    }
  </style>
</head>
<body>
<div class="control-name">
    <div class="control-div" >用户名</div>
    <div class="control-div" >身份证号码</div>
    <div class="control-div" >联系电话</div>
    <div class="control-div" >密码</div>
    <div class="control-div" >确认密码</div>
    <div class="control-div" >权限设置</div>
</div>
<form action="<?php echo U('Forum/Adm/changePersonInfo');?>" method="post" class="form-horizontal" name="myForm" onsubmit="return validateForm();">
  <div class="control-group">
    <div class="controls">
      <input type="text" readonly="true"  name="adm_name"  value="<?php echo ($result["adm_name"]); ?>"><span>&nbsp;<font size="1">唯一标识，禁止修改</font></span>
      <!-- <input type="text"   name="adm_name" placeholder="用户名"><span>&nbsp;* </span> -->
    </div>
  </div>


  <div class="control-group">
    <div class="controls">
      <!-- <input type="text" name="adm_idcard" placeholder="身份证号码"> -->
      <input type="text"  name="adm_idcard" value="<?php echo ($result["adm_idcard"]); ?>"><span>&nbsp;* </span>
    </div>
  </div>

  <div class="control-group">
    <div class="controls">
      <!-- <input type="text" name="adm_contact" placeholder="联系电话"> -->
      <input type="text"   name="adm_contact" value="<?php echo ($result["adm_contact"]); ?>"><span>&nbsp;* </span>
    </div>
  </div>



  <div class="control-group">
    <div class="controls">
      <input type="password"  name="adm_password" placeholder="Password"><span>&nbsp;* </span>
    </div>
  </div>


  <div class="control-group">
    <div class="controls">
      <input type="password"  name="repassword" placeholder="rePassword"><span>&nbsp;* </span>
    </div>
  </div> 
    <div class="control-group">
    <div class="controls">
      <select class="form-control" name='adm_permission'>
        <option value="<?php echo ($result["adm_permission"]); ?>"><?php echo ($result["adm_permission"]); ?></option>
        <option value="0">0</option>
        <option value="1">1</option>
      </select>
    </div>
  </div>

  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">确认修改</button>
    </div>
  </div>
</form>
  <script type="text/javascript">
    function validateForm()
    {
      var x1=document.forms["myForm"]["adm_name"].value;
      if (x1==null || x1=="")
      {
        alert("用户名必须填写！");
        return false;
      }
      var x2=document.forms["myForm"]["adm_idcard"].value;
      var x2len=x2.length;
      // window.alert(x2len);
      if (x2len != 18)
      {
        alert("请输入18位的身份证号码！");
        return false;
      }
      var x3=document.forms["myForm"]["adm_contact"].value;
      var x3len=x3.length;
      if ( !isNaN(x3) && x3len ==11){}
      else
      {
        alert("请输入11有效电话号码！");
        return false;
      }
      var x4=document.forms["myForm"]["adm_password"].value;
      var x5=document.forms["myForm"]["repassword"].value;
      if(x4.length<6)
      {
        alert("密码长度不足6位！");
        return false;
      }
      else
      {
        if (x4!=x5)
        {
          alert("两次输入密码不同！");
          return false;
        }
      }
    }
  </script>
</body>
</html>

<!-- <html>
<head>
	<title>修改个人信息</title>

	<link href="/forum-system/Public/css/bootstrap.min.css" rel="stylesheet">
  <link href="/forum-system/Public/css/bootstrap-responsive.min.css" rel="stylesheet">
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
    .form-horizontal{
      margin-top: 100px;
    }
    .control-group{
      margin-left: 30%;
    }
    input,select{
      width: 200px;
      height: 30px;
      border-radius: 5px;
    }
	</style>
</head>
<body>

<form action="<?php echo U('Forum/Adm/changePersonInfo');?>" method="post" class="form-horizontal" name="myForm" onsubmit="return validateForm();">
  <div class="control-group">
    <label class="control-label" >用户名 </label>
    <div class="controls">
      <input type="text" readonly="true"  name="adm_name"  value="<?php echo ($result["adm_name"]); ?>">
    </div>
  </div>


  <div class="control-group">
    <label class="control-label" >身份证号码</label>
    <div class="controls">
      <input type="text"  name="adm_idcard" value="<?php echo ($result["adm_idcard"]); ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >联系方式</label>
    <div class="controls">
      <input type="text"   name="adm_contact" value="<?php echo ($result["adm_contact"]); ?>">
    </div>
  </div>


    <div class="control-group">
    <label class="control-label" >权限设置</label>
    <div class="controls">
      <select class="form-control" name='adm_permission'>
        <option value="<?php echo ($result["adm_permission"]); ?>"><?php echo ($result["adm_permission"]); ?></option>
        <option value="0">0</option>
        <option value="1">1</option>
      </select>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >密码</label>
    <div class="controls">
      <input type="password"  name="adm_password" placeholder="hPassword">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" >确认密码</label>
    <div class="controls">
      <input type="password"  name="repassword" placeholder="rePassword"><span>&nbsp;* </span>
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">修改</button>
    </div>
  </div>
</form>
  <script type="text/javascript">
    function validateForm()
    {
      var x1=document.forms["myForm"]["adm_name"].value;
      if (x1==null || x1=="")
      {
        alert("用户名必须填写！");
        return false;
      }
      var x2=document.forms["myForm"]["adm_idcard"].value;
      var x2len=x2.length;
      // window.alert(x2len);
      if (x2len != 18)
      {
        alert("请输入18位的身份证号码！");
        return false;
      }
      var x3=document.forms["myForm"]["adm_contact"].value;
      var x3len=x3.length;
      if ( !isNaN(x3) && x3len ==11){}
      else
      {
        alert("请输入11有效电话号码！");
        return false;
      }
      var x4=document.forms["myForm"]["adm_password"].value;
      var x5=document.forms["myForm"]["repassword"].value;
      if(x4.length<6)
      {
        alert("密码长度不足6位！");
        return false;
      }
      else
      {
        if (x4!=x5)
        {
          alert("两次输入密码不同！");
          return false;
        }
      }
    }
  </script>
</body>
</html> -->