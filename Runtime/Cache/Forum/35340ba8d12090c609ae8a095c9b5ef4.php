<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title>修改管理员详情</title>
	
	<link href="/forum-system/Public/css/bootstrap.min.css" rel="stylesheet">
  <link href="/forum-system/Public/css/bootstrap-responsive.min.css" rel="stylesheet">
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
	<style type="text/css">
/*		body{  
			margin-left:auto;  
			margin-right:auto; 
			margin-top:20PX; 
			width:80%;
			}*/
    body{
      background-image: url(/forum-system/Public/Forum/image/timg.jpg);
      background-repeat: no-repeat;
      background-size: 100% 100%;
      margin-left:auto;
      margin-right:auto;
      margin-top:20PX;
      width:90%;
      height: 1000px;
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
	</style>
</head>
<body>

<form action="<?php echo U('Forum/Adm/changeUserInfo');?>" method="post" class="form-horizontal">
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
      <input type="text"  name="adm_permission" value="<?php echo ($result["adm_permission"]); ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >密码</label>
    <div class="controls">
      <input type="test"  name="adm_password" value="<?php echo ($result["adm_password"]); ?>">
    </div>
  </div>

  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">修改</button>
    </div>
  </div>
</form>

</body>
</html>