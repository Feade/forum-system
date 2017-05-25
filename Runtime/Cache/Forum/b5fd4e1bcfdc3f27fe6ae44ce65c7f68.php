<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>查看操作记录</title>
	<link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	  <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>

  	<style type="text/css">

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
	    .table{
	      margin-left: 5%;
	      margin-top: 50px;
	      width: 90%;
	    }
	    .btn{
	    	border-radius: 5px;
	    }
  	</style>
</head>
<body>
	<button class="btn"><a href="<?php echo U('Forum/Adm/showRecordItem');?>">按项目名称排序</a></button>
	<button class="btn"><a href="<?php echo U('Forum/Adm/showRecordAdmin');?>">按管理员名称排序</a></button>
	<table class="table table-hover table-bordered">
	  <tbody>
	  	<tr align="center">
	  		<td>管理员名称</td>
	  		<td>操作项目</td>
	  		<td>操作内容</td>
	  		<td>操作结果</td>
	  		<td>操作时间</td>
	  	</tr>
		<?php if(is_array($record)): foreach($record as $key=>$for): ?><tr align="center">
				<td><?php echo ($for["adm_name"]); ?></td>
				<td><?php echo ($for["for_item"]); ?></td>
				<td><?php echo ($for["for_content"]); ?></td>
				<td><?php echo ($for["for_result"]); ?></td>
				<td><?php echo ($for["for_time"]); ?></td>
			</tr><?php endforeach; endif; ?>
	  </tbody>
	</table>
	<div style="margin-left: 80%;"><?php echo ($page); ?></div>
</body>
</html>