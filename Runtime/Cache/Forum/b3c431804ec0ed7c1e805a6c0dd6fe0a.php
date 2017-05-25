<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>搜索论坛用户</title>
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
	      margin-top: 80px;
	      width: 90%;
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
  <form action="<?php echo U('forum/Adm/searchForumUser');?>" method="post" class="form-search" name="SearchForm" onsubmit="return check_form('SearchForm','for_id');">
    <span class="input-search">
      <input type="text" name="for_id" placeholder="用户ID"> 
      <button type="submit" class="btn">Search</button>
    </span>
  </form>
      <button type="submit" class="btn" style="margin-left: 100px;" onclick="show_form('#addUser')">添加论坛用户</button>

   <form action="<?php echo U('forum/Adm/forumUser');?>" method="post" class="form-search" id="addUser" name="addUser" style="display: none;" onsubmit="return check_form('addUser','for_id');">
    <span class="input-search">
      <input type="text" name="for_id" placeholder="用户ID">&#12288;<font color="red">*</font>
      <input type="text" name="for_password" placeholder="用户默认初始密码为ID" style="margin-top: 10px;">
      <button type="submit" class="btn">添加</button>
    </span>
  </form>
	
	<table class="table table-hover table-bordered">
	  <tbody>
	  	<tr align="center">
	  		<td>用户ID</td>
	  		<td>用户密码</td>
	  		<td>用户昵称</td>
	  		<td>性别</td>
	  		<td>QQ</td>
	  		<td>微信</td>
	  		<td>电话</td>
	  		<td>邮箱</td>
	  		<td>家乡</td>
	  		<td>星座</td>
	  		<td>等级</td>
	  		<td>经验值</td>
	  		<td>个性签名</td>
	  		<td>删除</td>
	  		<td>修改</td>
	  	</tr>
		<?php if(is_array($forumUser)): foreach($forumUser as $key=>$for): ?><tr align="center">
				<td><?php echo ($for["for_id"]); ?></td>
				<td><?php echo ($for["for_password"]); ?></td>
				<td><?php echo ($for["for_name"]); ?></td>
				<td><?php echo ($for["for_sex"]); ?></td>
				<td><?php echo ($for["for_qq"]); ?></td>
				<td><?php echo ($for["for_wechat"]); ?></td>
				<td><?php echo ($for["for_tel"]); ?></td>
				<td><?php echo ($for["for_email"]); ?></td>
				<td><?php echo ($for["for_hometown"]); ?></td>
				<td><?php echo ($for["for_constellation"]); ?></td>
				<td><?php echo ($for["for_level"]); ?></td>
				<td><?php echo ($for["for_value"]); ?></td>
				<td><?php echo ($for["for_signature"]); ?></td>

				<td><a href="<?php echo U('Forum/Adm/deleteForumUser');?>?for_id=<?php echo ($for["for_id"]); ?>"><font color="red">删除</font></a></td>
				<td><a href="<?php echo U('Forum/Adm/alterForumUser');?>?for_id=<?php echo ($for["for_id"]); ?>">修改</a></span></td>
			</tr><?php endforeach; endif; ?>
	  </tbody>
	</table>
	<div style="margin-left: 80%;"><?php echo ($page); ?></div>
	<script type="text/javascript">
      function show_form(what){
        $(what).toggle();
      };
      function check_form(formname,name){
        var x1=document.forms[formname][name].value;
        if (x1==null || x1=="")
        {
          alert("输入内容为空！");
          return false;
        }
        if(isNaN(x1) || x1.length>10)
        {
        	alert("ID为0-9的数字组合(10位数以内)");
        	return false;
        }
      }
	</script>
</body>
</html>