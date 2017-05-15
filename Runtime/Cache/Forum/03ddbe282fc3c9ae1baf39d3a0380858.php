<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>删除我的主帖</title>
</head>
<body>
	<p id="userdetail"><a href="<?php echo U('Forum/MainPost/index');?>">返回论坛主页</a></p>
	<p id="userdetail"><a href="<?php echo U('Forum/UserDetail/index');?>">返回个人中心</a></p>
	<p id="logout"><a href="<?php echo U('Forum/Login/logout');?>">注销</a></p>
	
	<div class="control-group">
		<div class="controls">
			<a href="<?php echo U('Forum/UserDetail/deletePost');?>?delete_true=2">确认删除！</a>
		</div>
	</div>
	<p id="userdetail"><a href="<?php echo U('Forum/UserDetail/myPost');?>">返回</a></p>
</body>
</html>