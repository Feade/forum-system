<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="initial-scale=1,width=device-width,user-scalable=no"/>
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
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
		.item{
			margin:20px auto 20px auto;
			box-shadow: 0 0 5px #e4e6e8;
			padding: 10px;
			position: relative;
			height: 120px;
			margin-bottom: 20px;
			width:75%;

		}
		#first-item{
			margin-top: 20px;
		}

		.d1{
			float: left;
			width: 50px;
			height: 100px;
		}
		.title{

			font-size: 20px;
			margin-left: 50px;
			padding-left: 30px;
			padding-top: 20px;
			height: 70px;

		}
		.item:hover{
			box-shadow: 0 0 5px #c2c2c2;
		}
		.feed-meta{

			margin-left: 50px;
			height: 20px;
			bottom:15px;
		}
		.img-rounded{
			margin-top: 25px;
			width:50px;
			height: 50px;
			border-radius: 25px;

		}
		#r_{
			float:right;
		}

		form{
			position: absolute;
			width: 220px;
			height: 500px;
			top: 50px;
			right: 50px;
			color: #333333;
		}
		.btn{
			height: 30px;
			width: 80px;
			margin-top: 20px;
			margin-left: 100px;
			border-radius: 5px;
		}
		.input-g{
			height: 30px;
			width: 170px;
			margin-top: 10px;
			border-radius: 5px;
		}
	</style>
	<title>检索主贴</title>
</head>
<body>
	<br><br><br>
	<form action="<?php echo U('Forum/Adm/searchMain');?>" method="post" class="form-horizontal" name="myForm" onsubmit="return validateForm();">
		<input type="text" name="for_title" class="input-g" placeholder="主题关键词">&nbsp;标题
		<input type="text" name="for_class" class="input-g" placeholder="类别关键词">&nbsp;类别
		<input type="text" name="for_id" class="input-g" placeholder="用户id">&nbsp;用户id
		<input type="text" name="for_text" class="input-g" placeholder="内容关键词">&nbsp;内容
		<input type="text" name="for_year" class="input-g" placeholder="xxxx年">&nbsp;年
		<input type="text" name="for_month" class="input-g" placeholder="xx月">&nbsp;月
		<input type="text" name="for_day" class="input-g" placeholder="xx日">&nbsp;日
		<input type="text" name="for_hour" class="input-g" placeholder="xx时">&nbsp;时
		<input type="text" name="for_minute" class="input-g" placeholder="xx分">&nbsp;分
		<select name="for_flag" class="input-g">
			<option></option>
			<option>否</option>
			<option>是</option>
			<option>用户彻底删除</option>
			<option>管理员删除</option>
		</select><br>用户是否删除<font style="font-size: 2px;color: silver;">默认显示全部</font>
		<button type="submit" class="btn">搜索</button>
	</form>
	<?php if(is_array($list_post)): foreach($list_post as $key=>$it): ?><div class="item" id="first-item">
			<div class="d1">
				<img src="/forum-system/Public/Forum/image/<?php echo ($it["for_head"]); ?>" class="img-rounded">
				<span><font color="#666699">&nbsp;<?php echo ($it["for_level"]); ?>&nbsp;级</font></span>
			</div>

			<div class="title">
				<span id="one" class="">
					<a href="<?php echo U('Forum/ReplyPost/index');?>?for_num=<?php echo ($it["for_num"]); ?>" title="查看详情"><?php echo ($it["for_title"]); ?></a>
				</span>
			</div>

			<div class="feed-meta">
				<div class="zm-item-meta answer-actions clearfix js-contentActions">
					<div class="zm-meta-panel">
						<span id="r_">
							<a class="author-link" title="查看用户详情" data-hovercard="" target="_blank" href="<?php echo U('Forum/UserDetail/show');?>?ID=<?php echo ($it["for_id"]); ?>"><?php echo ($it["for_name"]); ?>
							</a>
							<span itemprop="url" class="answer-date-link meta-item" data-tooltip="" target="_blank">编辑于：<?php echo ($it["for_time"]); ?>
							</span>&#12288;&#12288;&#12288;
							<span>所属类别：<?php echo ($it["for_class"]); ?>
							</span>&#12288;&#12288;&#12288;
							<span class="zg-bull zu-autohide"><?php echo ($it["for_up"]); ?>
							</span>
							<a href="<?php echo U('Forum/Operate/mainUp');?>?for_num=<?php echo ($it["for_num"]); ?>" name="" class="">
								<i class="z-icon-comment"></i>
								<span> 点赞</span>
							</a>
							<span class="zg-bull zu-autohide">&bull; <?php echo ($it["for_down"]); ?></span>
							<a href="<?php echo U('Forum/Operate/mainDown');?>?for_num=<?php echo ($it["for_num"]); ?>" name="" class="">
								<i class="z-icon-comment"></i>
								<span> 板砖</span>
							</a>
							<span class="zg-bull zu-autohide">&bull; <?php echo ($it["for_report"]); ?></span>
							<a href="<?php echo U('Forum/Operate/mainReport');?>?for_num=<?php echo ($it["for_num"]); ?>" name="" class="">
								<i class="z-icon-comment"></i>
								<span> 举报</span>
							</a>
							&nbsp; &nbsp;
							<a href="<?php echo U('Forum/Adm/deleteMain');?>?for_num=<?php echo ($it["for_num"]); ?>" name="" class="">
								<i class="z-icon-comment"></i><span id="<?php echo ($it["for_num"]); ?>"></span> <span>    <font color="#FF0000">删除</font></span>
							</a>
						</span>
					</div>
				</div>
			</div>
		</div><?php endforeach; endif; ?>
	<h3 style="margin-left: 15%;"><?php echo ($page); ?></h3>
	<a href="#top" style="position: fixed;bottom: 20px;right: 20px; color: #333333;font-weight: 20px;"><button>返回顶部</button></a>

	<script type="text/javascript">
		function validateForm()
		{
			var x1=document.forms["myForm"]["for_title"].value;
			var x2=document.forms["myForm"]["for_text"].value;
			var x3=document.forms["myForm"]["for_id"].value;
			var x4=document.forms["myForm"]["for_class"].value;
			var x5=document.forms["myForm"]["for_year"].value;
			var x6=document.forms["myForm"]["for_month"].value;
			var x7=document.forms["myForm"]["for_day"].value;
			var x8=document.forms["myForm"]["for_hour"].value;
			var x9=document.forms["myForm"]["for_minute"].value;
			if(x3.length!=0 && isNaN(x3) )
			{
				alert("用户id必须是数字");
				return false;
			}
			if(x5.length!=0 && isNaN(x5) )
			{
				alert("xx年 必须是数字");
				return false;
			}
			if(x6.length!=0)
			{
				if(isNaN(x6) || x6<1 || x6>12)
				{

					alert("xx月 必须是1-12的数字");
					return false;
				}
			}
			if(x7.length!=0)
			{
				if(x5.length!=0 && x6.length==0)
				{
					alert("请先填入 xx月");
					return false;
				}
				if(isNaN(x7) || x7<1 || x7>31)
				{

					alert("xx日 必须是1-31的数字");
					return false;
				}
			}
			if(x8.length!=0)
			{
				if(x6.length!=0 && x7.length==0)
				{
					alert("请先填入 xx日");
					return false;
				}
				if(isNaN(x8) || x8<0 || x8>23)
				{

					alert("xx时 必须是0-23的数字");
					return false;
				}
			}
			if(x9.length!=0)
			{
				if(x8.length==0)
				{
					alert("xx时？请精确到小时后再填分钟");
					return false;
				}
				if(isNaN(x9) || x9<0 || x9>59)
				{

					alert("xx分 必须是0-59的数字");
					return false;
				}
			}

		}
	</script>
</body>

</html>