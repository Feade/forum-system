<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title>回复</title>
	
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
  <p id="userdetail"><a href="<?php echo U('Forum/UserDetail/index');?>">个人中心</a></p>
  <p id="logout"><a href="<?php echo U('Forum/Login/logout');?>">注销</a></p>
<form action="<?php echo U('Forum/ReplyPost/addReply');?>" method="post" class="form-horizontal">
  <div class="control-group">
    <label class="control-label" >内容</label>
    <div class="controls">
      <textarea rows="10" cols="50" name="for_text"></textarea><span>&nbsp* </span>
    </div>
  </div>
  
  <div class="control-group">
    <div class="controls">
      <button type="reset" class="btn">重新输入</button>
    </div>
  </div>

  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn" href="<?php echo U('Forum/UserDetail/index');?>">确认回复</button>
    </div>
  </div>
</form>

</body>
</html>