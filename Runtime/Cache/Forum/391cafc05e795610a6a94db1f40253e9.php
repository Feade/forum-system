<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>搜索管理员</title>
	<link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
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
	      margin-left: 25%;
	      margin-top: 80px;
	      max-width: 50%;
	    }
	    .form-control{
	      margin-left:40%;
	      margin-top: -40px;
	      height: 40px;
	      width:100px;
	    }
	    .btn{
	      margin-top: -60px;
	      height: 40px;
	      margin-left: 57%;
	    }
	    input{
	      height: 40px;
	      margin-left: 47%;
	      border-radius: 5px;
	    }
	    a{
	    	color: #330099;
	    }
  	</style>
</head>
<body>
  <form action="<?php echo U('forum/Adm/searchUser');?>" method="post" class="form-search">
    <span class="input-search">
      <input type="text" name="name" >      
      <select class="form-control" name='type'> 
        <option value="adm_name">姓名</option> 
        <option value="adm_permission">权限</option> 
      </select>      
      <button type="submit" class="btn">Search</button>
    </span>
  </form>
	
	<table class="table table-hover table-bordered">
	 <?php echo ($thead); ?>
	  <tbody>
		<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
				<td><?php echo ($vo["adm_name"]); ?></td>
				<td><?php echo ($vo["adm_contact"]); ?></td>
				<td><?php echo ($vo["adm_permission"]); ?></td>
				<td><a href="<?php echo U('Forum/Adm/deleteUser');?>?adm_name=<?php echo ($vo["adm_name"]); ?>">删除</a></td>
				<td><a href="<?php echo U('Forum/Adm/showUserInfo');?>?adm_name=<?php echo ($vo["adm_name"]); ?>">修改</a></td>
			</tr><?php endforeach; endif; ?>
	  </tbody>
	</table>
	<?php echo ($page); ?>
</body>
</html>