<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title>主帖修改</title>
	
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
  <p id="logout"><a href="<?php echo U('Forum/Login/logout');?>">注销</a></p>
  <br><br>
<form action="<?php echo U('Forum/UserDetail/alterPost');?>?alter_main_num=<?php echo ($for_num); ?>" method="post" class="form-horizontal">

  <div class="control-group">
    <label class="control-label" >标题</label>
    <div class="controls">
      <input type="text"  readonly="ture" name="for_id" value="<?php echo ($MainPost["for_title"]); ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >类别</label>
  
    <div class="controls">
		<select name="for_class" value="<?php echo ($MainPost["for_class"]); ?>">
			<option></option>
			<?php if(is_array($list)): foreach($list as $key=>$class): ?><option><?php echo ($class["for_class"]); ?></option><?php endforeach; endif; ?>
		</select>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >内容</label>
    <div class="controls">
      <textarea rows="20" cols="100" name="for_text" value="<?php echo ($MainPost["for_text"]); ?>"></textarea><span>&nbsp* </span>
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