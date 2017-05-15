<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="initial-scale=1,width=device-width,user-scalable=no"/>
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="shortcut icon" href="/tp3/Public/Forum/image/login.ico">

	<link rel="stylesheet" href="/tp3/Public/Forum/css/xq_navbar.css"/>
	<link rel="stylesheet" href="/tp3/Public/Forum/css/xq.css"/>
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){

		// $(".title").click(function(){
		// 	window.location.href="pinglun.html";
		// });

	});

	</script>
	<title>论坛主页</title>
	<style type="text/css">
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
			margin-top: 55px;
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
	</style>
</head>
<body>
	<br><br><br>
	<p id="userdetail"><a href="<?php echo U('Forum/MainPost/index');?>">返回论坛主页</a></p>
	<p id="userdetail"><a href="<?php echo U('Forum/UserDetail/index');?>">个人中心</a></p>
	<p id="logout"><a href="<?php echo U('Forum/Login/logout');?>">注销</a></p>
		
	<div class="xq_bag nav" id="bar3">
		<ul class="xq_navbar">
			<?php if(is_array($list)): foreach($list as $key=>$it): ?><li class="xq_navli"><a href="<?php echo U('Forum/MainPost/order');?>?for_class=<?php echo ($it["for_class"]); ?>"><?php echo ($it["for_class"]); ?></a></li><?php endforeach; endif; ?>
		</ul>
	</div>

	<?php if(is_array($list_post)): foreach($list_post as $key=>$it): ?><div class="item" id="first-item">
			<div class="d1"><img src="/tp3/Public/Forum/image/<?php echo ($it["for_head"]); ?>" class="img-rounded"></div>

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
							<a href="#" name="" class="">
							<i class="z-icon-comment"></i>
							<span id="zan" onclick="zan_click('#<?php echo ($it["for_num"]); ?>')"> 赞</span></a>
							<span class="zg-bull zu-autohide">&bull; <?php echo ($it["for_down"]); ?></span>
							<a href="#" name="" class="">
							<i class="z-icon-comment"></i>
							<span id="zan" onclick="zan_click('#<?php echo ($it["for_num"]); ?>')"> 踩</span></a>
							<span class="zg-bull zu-autohide">&bull; <?php echo ($it["for_report"]); ?></span>				
							<a href="#" name="" class="">
							<i class="z-icon-comment"></i>
							<span id="zan" onclick="zan_click('#<?php echo ($it["for_num"]); ?>')">举报</span></a>
							<span class="zg-bull zu-autohide">&bull;</span>
							<a href="<?php echo U('Forum/UserDetail/alterPost');?>?alter_main_num=<?php echo ($it["for_num"]); ?>">修改</a>
							<span class="zg-bull zu-autohide">&bull;</span>
							<a ><span onclick="show_dele('#sure_<?php echo ($it["for_num"]); ?>')">删除</span></a>
							&bull;
							<a class="dele" id="sure_<?php echo ($it["for_num"]); ?>" href="<?php echo U('Forum/UserDetail/deletePost');?>?delete_main_num=<?php echo ($it["for_num"]); ?>&delete_true=0">确认删除</a>
							

						</span>

					</div>
				</div>
			</div>
		</div><?php endforeach; endif; ?>
	<script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
	<script src="/tp3/Public/Forum/js/xq_navbar.js"></script>
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
	function show_dele(what){
		$(what).show();
	};
	$(".dele").hide();
</script>
</body>

</html>