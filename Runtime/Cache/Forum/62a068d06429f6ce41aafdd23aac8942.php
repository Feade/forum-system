<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="/tp3/Public/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">

	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/tp3/Public/umeditor/third-party/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/tp3/Public/umeditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/tp3/Public/umeditor/umeditor.min.js"></script>
    <script type="text/javascript" src="/tp3/Public/umeditor/lang/zh-cn/zh-cn.js"></script>
	<script src="/tp3/Public/umeditor/third-party/mathquill/mathquill.min.js"></script>
	<link rel="stylesheet" href="/tp3/Public/umeditor/third-party/mathquill/mathquill.css"/>



	<style type="text/css">
		body{
			width:80%;
			margin: auto;
			margin-top:50px;
		}

		.item{
			border: 1px solid #999;
 		border-radius: 10px;
			padding: 10px;
			position: relative;
			margin-bottom: 20px;
		}
		.img-rounded{
			width:50px;
			height: 50px;
			border-radius: 25px;
			margin-left:25px;
			margin-top: 25px;

		}

		.huifu{
			margin: 0 20px 0 30px;
		}
		.d1{
			float: left;
			height: 100%;
			width: 100px;

		}
		.auctor{
			margin-left: 100px;
			margin-top: 20px;
			margin-right: 20px;

		}
		.fede-mete{

			margin-left: 100px;
			margin-right: 10px;
			float: right;
			bottom:15px;
			clear:right;

		}
		.fede-mete a{
						color: #1acd76;
           font-size: 14px;
		}
		.title{
			border: 1px solid #999;
			border-radius: 10px;
			font-size: 20px;
			padding-left: 30px;
			padding-top: 20px;
			height: 70px;
			margin-bottom: 20px;

		}
		.img2{
			width:30px;
			height: 30px;
			border-radius: 15px;
		}
		.xiaotubiao{
			width:20px;
			height:20px;

		}
	</style>
	<title>我的回帖</title>
</head>
<body>
	<p id="userdetail"><a href="<?php echo U('Forum/MainPost/index');?>">返回论坛主页</a></p>
	<p id="userdetail"><a href="<?php echo U('Forum/UserDetail/index');?>">返回个人中心</a></p>
	<p id="logout"><a href="<?php echo U('Forum/Login/logout');?>">注销</a></p>
<?php if(is_array($list_post)): foreach($list_post as $key=>$it): ?><div class="item">
			<div class="d1">
				<span class="">
					<span class="">
					<img src="/tp3/Public/Forum/image/<?php echo ($it["for_head"]); ?>" class="img-rounded">
					<a class="author-link" data-hovercard="" target="_blank" href=""><?php echo ($it["for_name"]); ?></a>
				</span>
			</div>
			<div class="auctor">
				<?php echo ($it["for_text"]); ?>
			</div>
			<div class="fede-mete">
				<div class="zm-item-meta answer-actions clearfix js-contentActions">
					<div class="zm-meta-panel">	
						<a itemprop="url" class="answer-date-link meta-item" data-tooltip="" target="_blank" href=""><?php echo ($it["for_time"]); ?></a>
						<span class="zg-bull zu-autohide">&bull;</span>
						<a href="#" name="" class="">
						<i class="z-icon-comment"></i><span id="<?php echo ($it["for_num"]); ?>"><?php echo ($it["for_up"]); ?></span> <span id="zan" onclick="zan_click('#<?php echo ($it["for_num"]); ?>')">人赞同</span></a>
						<span class="zg-bull zu-autohide">&bull;</span>
						<a href="<?php echo U('Forum/ReplyPost/alterReply');?>?alter_reply_num=<?php echo ($it["for_num"]); ?>">修改</a>
						<span class="zg-bull zu-autohide">&bull;</span>
						<a ><span onclick="show_dele('#sure_<?php echo ($it["for_num"]); ?>')">删除</span></a>
						<a class="dele" id="sure_<?php echo ($it["for_num"]); ?>" href="<?php echo U('Forum/ReplyPost/deleteReply');?>?delete_reply_num=<?php echo ($it["for_num"]); ?>&delete_true=0">确认删除</a>
					</div>
				</div>
			</div>
		</div><?php endforeach; endif; ?>
<script type="text/javascript">
	function show_dele(what){
		$(what).show();
	};
	$(".dele").hide();
</script>
</body>
</html>