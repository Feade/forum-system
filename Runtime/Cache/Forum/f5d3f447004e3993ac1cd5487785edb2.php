<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
	<title>所有管理员</title>
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

<table class="table table-bordered">
  <thead>
    <tr>
      <th>姓名</th>
      <th>身份证</th>
      <th>联系方式</th>
      <th>权限</th>
    </tr>
  </thead>
  <tbody>
	<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
			<td><?php echo ($vo["adm_name"]); ?></td>
			<td><?php echo ($vo["adm_idcard"]); ?></td>
			<td><?php echo ($vo["adm_contact"]); ?></td>
      <td><?php echo ($vo["adm_permission"]); ?></td>
		</tr><?php endforeach; endif; ?>
    </tr>
  </tbody>
</table>
<?php echo ($page); ?>
</body>
</html>