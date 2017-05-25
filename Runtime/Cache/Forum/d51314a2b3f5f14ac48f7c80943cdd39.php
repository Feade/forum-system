<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>修改主题类别</title>
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
	      height: 35px;
	      margin-left: 58%;
	    }
	    input{
	      height: 40px;
	      margin-left: 47%;
	      border-radius: 5px;
	    }
	    a{
	    	color: #330099;
	    }
	    .myForm{
	    	position: absolute;
	    	right: 10%;
	    	/*top: 20%;*/
	    	display: none;
	    }
  	</style>
</head>
<body>
  <form action="<?php echo U('forum/Adm/searchClass');?>" method="post" class="form-search" name="myForm" onsubmit="return check_form('myForm','class');">
    <span class="input-search">
      <input type="text" name="class" >
      <button type="submit" class="btn">Search</button>
    </span>
  </form>
	
	<table class="table table-hover table-bordered">
	  <tbody>
		<?php if(is_array($listClass)): foreach($listClass as $key=>$cla): ?><tr style="background-color: #CCCCFF;">
				<td><?php echo ($cla["for_class"]); ?></td>
				<td><a href="<?php echo U('Forum/Adm/deleteClass');?>?class=<?php echo ($cla["for_class"]); ?>"><font color="red">删除</font></a></td>
				<td><span onclick="show_form('#myform_<?php echo ($cla["for_class"]); ?>')"><a>修改</a></span></td>
			</tr>
			<tr>
				<td></td><td></td>
				<td>
				<form id="myform_<?php echo ($cla["for_class"]); ?>" class="myForm" action="<?php echo U('Forum/Adm/modifyClass');?>" method="post"  name="myForm-<?php echo ($cla["for_class"]); ?>" onsubmit="return check_form('myForm-<?php echo ($cla["for_class"]); ?>','new_class');">
					<div style="margin-top: -45px;margin-left: 100px;">
						<input type="text" name="old_class" style="display: none;" value="<?php echo ($cla["for_class"]); ?>">
						<input type="text" name="new_class" value="<?php echo ($cla["for_class"]); ?>">
						<button type="submit" class="btn" style="position: relative; margin-left: 600px;">确认修改</button>
					</div>
				</form>
				</td>
			</tr><?php endforeach; endif; ?>
	  </tbody>
	</table>


	<div style="margin-left: 62%;" onclick="show_form('#myform_addclass')"><a style="background-color: white;">新增类别</a></div>
	<form id="myform_addclass" class="myForm" action="<?php echo U('Forum/Adm/addClass');?>" method="post" name="myForm-add" onsubmit="return check_form('myForm-add','add_class');">
		<input type="text" name="add_class" placeholder="请输入新的类别名称">
		<button type="submit" class="btn" style="position: relative; margin-left: 600px;">确认添加</button>
	</form>

	<script type="text/javascript">
		function show_form(what){
			$(what).toggle();
		};
		// $(".myForm").hide();
		function check_form(formname,name){
			var x1=document.forms[formname][name].value;
			if (x1==null || x1=="")
			{
				alert("输入内容为空！");
				return false;
			}
		}
	</script>

</body>
</html>