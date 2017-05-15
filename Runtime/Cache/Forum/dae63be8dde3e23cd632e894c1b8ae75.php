<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title></title>
	
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
  <p id="logout"><a href="<?php echo U('Forum/Login/logout');?>">注销</a></p>
  <p id="userdetail"><a href="<?php echo U('Forum/MainPost/addMain');?>">新增主帖</a></p>
  <p id="userdetail"><a href="<?php echo U('Forum/UserDetail/alterPost');?>">修改主帖</a></p>
  <br><br>
<form action="<?php echo U('Forum/UserDetail/update');?>" method="post" class="form-horizontal">

  <div class="control-group">
    <label class="control-label" >论坛账号</label>
    <div class="controls">
      <input type="text"  readonly="ture" name="for_id" value="<?php echo ($result["for_id"]); ?>" placeholder=<?php echo ($ID); ?>>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >昵称</label>
    <div class="controls">
      <input type="text"   name="for_name" value="<?php echo ($result["for_name"]); ?>"><span>&nbsp* </span>
    </div>
  </div>


  <div class="control-group">
    <label class="control-label" >头像</label>
    <div class="controls">
      <input type="text"   name="for_head" value="<?php echo ($result["for_head"]); ?>">
    </div>
  </div>


  <div class="control-group">
    <label class="control-label" >性别</label>
    <div class="controls">
      <input type="text"  name="for_sex" value="<?php echo ($result["for_sex"]); ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >QQ</label>
    <div class="controls">
      <input type="text"  name="for_QQ" value="<?php echo ($result["for_QQ"]); ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >微信</label>
    <div class="controls">
      <input type="text"  name="for_WeChat" value="<?php echo ($result["for_WeChat"]); ?>">
    </div>
  </div>

    <div class="control-group">
    <label class="control-label" >电话</label>
    <div class="controls">
      <input type="text"  name="for_TEL" value="<?php echo ($result["for_TEL"]); ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >邮箱</label>
    <div class="controls">
      <input type="text"  name="for_Email" value="<?php echo ($result["for_Email"]); ?>">
    </div>
  </div>

    <div class="control-group">
    <label class="control-label" >家乡</label>
    <div class="controls">
      <input type="text"  name="for_hometown" value="<?php echo ($result["for_hometown"]); ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >星座</label>
    <div class="controls">
      <input type="text"  name="for_constellation" value="<?php echo ($result["for_constellation"]); ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >个性签名</label>
    <div class="controls">
      <textarea rows="5" cols="20" name="for_signature" value="<?php echo ($result["for_signature"]); ?>">
      </textarea>
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