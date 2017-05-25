<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="initial-scale=1,width=device-width,user-scalable=no"/>
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="shortcut icon" href="/forum-system/Public/Forum/image/login.ico">
	<link href="/forum-system/Public/Forum/Css/mypage.css" rel="stylesheet" type="text/css"/>

	<link rel="stylesheet" href="/forum-system/Public/Forum/css/xq_navbar.css"/>
	<link rel="stylesheet" href="/forum-system/Public/Forum/css/xq.css"/>
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script src="http://cdn.static.runoob.com/libs/jquery/1.10.2/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#flip").click(function(){
				$("#panel").slideToggle("slow");
			});
			$("#panel").hide();
		});
	</script>
	<style type="text/css">
		body{
			background-color: #CCCCCC;
		}
		body .item{
			width:70%;
		}
		.nav{
			position: fixed;
			top: 0;
			left: 0;
			z-index: 20;
			width: 100%;
		}
		.item{
			margin:20px auto 20px auto;
			box-shadow: 0 0 5px #e4e6e8;
			padding: 10px;
			position: relative;
			width: 600px;
			height: 120px;
			margin-bottom: 20px;

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
		.navigation{
			left: 95%;
			top: 55px;
			width: 80px;
			float: right;
		}
		#flip{
			position: fixed;
		}
		.img-navigation{
			width:50px;
			height: 50px;
			float: right;
			border-radius: 25px;
		}
		.button-navigation{
			width: 51px;
			height: 52px;
			border-radius: 25px;
			background-color: #330066;
			margin-top: 5px;
			margin-right:  5px;
			float: right;
		}
		form{
			position: absolute;
		}
		.btn{
			position: absolute;
			height: 30px;
			width: 50px;
			left: 1310px;
			border-radius: 5px;
		}
		.input-g{
			position: absolute;
			height: 30px;
			width: 300px;
			left: 1000px;
			border-radius: 5px;
		}
	</style>
	<title>论坛主页</title>
</head>
<body>

	<br><br><br>
	<form action="<?php echo U('Forum/MainPost/searchMain');?>" method="post" class="form-horizontal" name="myForm" onsubmit="return validateForm();">
		<input type="text" name="for_title" class="input-g" placeholder="搜索主贴">
		<button type="submit" class="btn">搜索</button>
	</form>
	<button class="btn" style="position: fixed;top: 55px;left: 85%; width: 100px;height: 30px;"><a href="<?php echo U('Forum/MainPost/moreSearch');?>">使用高级搜索</a></button>
	<div id="flip" class="navigation">
		<div class="button-navigation">
			<a href="<?php echo U('Forum/UserDetail/index');?>">
				<img class="img-navigation" src="/forum-system/Public/Forum/image/<?php echo ($userHead["for_head"]); ?>">
			</a>
		</div>
		<div class="button-navigation">
			<img class="img-navigation" src="/forum-system/Public/Forum/image/menu.jpg">
		</div>
		<div id="panel" class="navigation">
			<div class="button-navigation">
				<a href="<?php echo U('Forum/MainPost/addMain');?>" title="新增主贴">
					<img class="img-navigation" src="/forum-system/Public/Forum/image/new.jpg">
				</a>
			</div>
			<div class="button-navigation">
				<a href="<?php echo U('Forum/MainPost/index');?>" title="返回论坛主页">
					<img class="img-navigation" src="/forum-system/Public/Forum/image/homepage.jpg">
				</a>
			</div>
			<div class="button-navigation">
				<a href="<?php echo U('Forum/Login/logout');?>" title="注销">
					<img class="img-navigation" src="/forum-system/Public/Forum/image/exit.jpg">
				</a>
			</div>
		</div>
	</div>

	<div class="xq_bag nav" id="bar3">
		<ul class="xq_navbar">
			<?php if(is_array($list)): foreach($list as $key=>$it): ?><li class="xq_navli"><a href="<?php echo U('Forum/MainPost/order');?>?for_class=<?php echo ($it["for_class"]); ?>"><?php echo ($it["for_class"]); ?></a></li><?php endforeach; endif; ?>
			<div class="xq_navli">
				<a href="<?php echo U('Forum/UserDetail/index');?>">个人中心</a>
			</div>
		</ul>
	</div>

	<div style="margin-left: 15%;margin-top: 10px;"><?php echo ($page); ?></div>
	<br>
	<?php if(is_array($list_post)): foreach($list_post as $key=>$it): ?><div class="item" id="first-item">
			<div class="d1">
				<img src="/forum-system/Public/Forum/image/<?php echo ($it["for_head"]); ?>" class="img-rounded">
				<span><font color="#666699">&nbsp;<?php echo ($it["for_level"]); ?>&nbsp;级</font></span>
			</div>
			<div style="float: right;"><?php echo ($it["for_class"]); ?></div>
			<div class="title">
				<span id="one" class="">
					<a href="<?php echo U('Forum/ReplyPost/index');?>?for_num=<?php echo ($it["for_num"]); ?>" title="查看详情"><?php echo ($it["for_title"]); ?></a>
				</span>
			</div>

			<div class="feed-meta">
				<div class="zm-item-meta answer-actions clearfix js-contentActions">
					<div class="zm-meta-panel">

						<span>
							<a class="author-link" title="查看用户详情" data-hovercard="" target="_blank" href="<?php echo U('Forum/UserDetail/show');?>?ID=<?php echo ($it["for_id"]); ?>"><?php echo ($it["for_name"]); ?></a>
						</span>
						<span itemprop="url" class="answer-date-link meta-item" data-tooltip="" target="_blank">编辑于：<?php echo ($it["for_time"]); ?></span>
						<a href="<?php echo U('Forum/ReplyPost/index');?>?for_num=<?php echo ($it["for_num"]); ?>" name="addcomment" class="meta-item toggle-comment js-toggleCommentBox">查看详情</a>

						<span id="r_">
							<span class="zg-bull zu-autohide"><?php echo ($it["for_join"]); ?> 评论</span>
							<span class="zg-bull zu-autohide">&bull; <?php echo ($it["for_up"]); ?></span>
							<a href="<?php echo U('Forum/Operate/mainUp');?>?for_num=<?php echo ($it["for_num"]); ?>" name="" class="">
								<i class="z-icon-comment"></i>
								<span id="zan" onclick="zan_click('#<?php echo ($it["for_num"]); ?>')"> 点赞</span></a>
								<span class="zg-bull zu-autohide">&bull; <?php echo ($it["for_down"]); ?></span>
								<a href="<?php echo U('Forum/Operate/mainDown');?>?for_num=<?php echo ($it["for_num"]); ?>" name="" class="">
									<i class="z-icon-comment"></i>
									<span id="zan" onclick="zan_click('#<?php echo ($it["for_num"]); ?>')"> 板砖</span></a>
									&nbsp; &nbsp;
									<a href="<?php echo U('Forum/Operate/mainReport');?>?for_num=<?php echo ($it["for_num"]); ?>" name="" class="">
										<i class="z-icon-comment"></i><span id="<?php echo ($it["for_num"]); ?>"></span> <span id="zan" onclick="zan_click('#<?php echo ($it["for_num"]); ?>')">    <font color="#FF0000">举报</font></span></a>

									</span>

								</div>
							</div>
						</div>
					</div><?php endforeach; endif; ?>
				<h3 style="margin-left: 70%;"><?php echo ($page); ?></h3>

				<button type="button" style="position: fixed;bottom: 20px;left: 95%; color: #333333;font-weight: 15px;width: 100px;height: 40px;" class="btn btn-default btn-lg"><a href="#top" style="color:  #333333;font-weight: 15px;">返回顶部</a></button>
				<script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
				<script src="/forum-system/Public/Forum/js/xq_navbar.js"></script>
				<script>
					$(function(){
						$("#bar1").xq_navbar({"type":"underline","liwidth":"auto","bgcolor":"#000","hcolor":"#f0f"});
						$("#bar2").xq_navbar({"type":"beat","liwidth":"avg","bgcolor":"#000","hcolor":"#f0f"});
						$("#bar3").xq_navbar({"type":"line","liwidth":"avg","bgcolor":"#000"});
						$("#bar4").xq_navbar({"type":"overline","liwidth":"120","bgcolor":"#000"});
						$("#bar5").xq_navbar({"type":"block","liwidth":"avg","bgcolor":"#000","hcolor":["blue","rgb(10;,100,100)","red","pink","green","rgba(23,234,22,1)","rgb(230,230,230)"]});
					});
					function zan_click(what){
						var zan=$(what).text();
						$(what).text(++zan);
					};
				</script>
				<script type="text/javascript">
					function validateForm()
					{
						var x1=document.forms["myForm"]["for_title"].value;
						if (x1==null || x1=="")
						{
							alert("搜索内容不能为空！");
							return false;
						}
					}
				</script>
			</body>

			</html>