<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">

  <script type="text/javascript" src="/forum-system/Public/umeditor/third-party/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" href="/forum-system/Public/Forum/css/userdetail.css">
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
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
			margin-left:auto;
			margin-right:auto;
			margin-top:50PX;
			width:100%;
		}
		body{
		    background-color: #CCCCCC;
	    }
		body .item{
			width:80%;
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

		.nav{
			position: fixed;
			top: 0;
			left: 0;
			z-index: 20;
			width: 100%;
		}
		.img-rounded{
			width:50px;
			height: 50px;
			border-radius: 25px;
		}
		#guidebar{

			float: left;
		}

		.ue-sidenav{

			margin-left: 300px;

		}
		.category, a:hover{
			color: #66FFFF;
		}
		#guidebar a{

			color: #4169E1;

		}
		.ue-sidebar{
			margin-top: 10px;
			margin-bottom: 10px;
			font-size: 17px;
		}
		.table{
			margin-left: 200px;
			width: 800px;
		}
		.table-font-color1{
			color: #66FFCC;
		}
		.table-font-color2{
			color: #66CCFF;
		}
		.category a{
			text-decoration:none;
		}
		ul,li{
		  	list-style: none;
		}
		#modify{
			float: auto;
			margin-left: 900px;
		}

		.navigation{
			width: 80px;
			float: right;
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
	</style>
	<title>个人中心</title>

</head>
<body>

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

<div class="wrap">
	<div   class="ue-sidenav">
		<?php if(is_array($list_post)): foreach($list_post as $key=>$it): ?><div class="item" id="first-item">
				<div class="d1">
					<a class="author-link" title="查看用户详情" href="<?php echo U('Forum/UserDetail/show');?>?ID=<?php echo ($it["for_id"]); ?>">
						<img src="/forum-system/Public/Forum/image/<?php echo ($it["for_head"]); ?>" class="img-rounded">
					</a>
				</div>
				<div class="title">
					<span id="one" class="">
						<a href="<?php echo U('Forum/ReplyPost/index');?>?for_num=<?php echo ($it["for_fatherid"]); ?>" title="查看主贴详情"><?php echo ($it["for_title"]); ?></a>
					</span>
				</div>

				<div class="feed-meta">
					<div class="zm-item-meta answer-actions clearfix js-contentActions">
						<div class="zm-meta-panel">
							<span itemprop="url" class="answer-date-link meta-item" data-tooltip="" target="_blank">编辑于：<?php echo ($it["for_time"]); ?></span>
							<span>&#12288;&#12288;&#12288;&#12288;&#12288;<?php echo ($it["for_floor"]); ?>&#12288;楼</span>&#12288;&#12288;&#12288;&#12288;&#12288;
							<a href="<?php echo U('Forum/ReplyPost/index');?>?for_num=<?php echo ($it["for_fatherid"]); ?>">查看主贴详情</a>

							<span id="r_">
								<span class="zg-bull zu-autohide"><?php echo ($it["for_up"]); ?>&#12288;赞&#12288;</span>

								<span class="zg-bull zu-autohide">&bull;&#12288;<?php echo ($it["for_down"]); ?>&#12288;踩&#12288;</span>

								<span class="zg-bull zu-autohide">&bull;&#12288;<?php echo ($it["for_report"]); ?>&#12288;举报&#12288;</span>

								<span class="zg-bull zu-autohide">&bull;&#12288;</span>
								<a ><span onclick="show_dele('#sure_<?php echo ($it["for_num"]); ?>')">彻底删除&#12288;</span></a>
								&bull;&#12288;
								<a class="dele" id="sure_<?php echo ($it["for_num"]); ?>" href="<?php echo U('Forum/ReplyPost/deleteCompletely');?>?delete_reply_num=<?php echo ($it["for_num"]); ?>&delete_true=2"><font color="red">确认删除</font></a>
							</span>
						</div>
					</div>
				</div>
			</div><?php endforeach; endif; ?>
	</div>
</div>

<div class="nav-main">
<div class="nav-box">
<div class="nav">
  <ul class="nav-ul">
  			<li><a href="<?php echo U('Forum/MainPost/index');?>"><span>返回论坛主页</span></a></li>
			<li><a href="<?php echo U('Forum/UserDetail/myPost');?>"><span>我的主帖管理</span></a></li>
			<li><a href="<?php echo U('Forum/ReplyPost/myReply');?>"><span>我的回复管理</span></a></li>
			<li><a href="<?php echo U('Forum/UserDetail/modify');?>"><span>个人信息管理</span></a></li>
			<li><a href="<?php echo U('Forum/Login/logout');?>"><span>注销</span></a></li>
  </ul>
</div>
<div class="nav-slide">
    <div class="nav-slide-o"></div>
    <div class="nav-slide-o">
    	<ul>
    		<li><a href="<?php echo U('Forum/MainPost/addMain');?>"><span>新增主贴</span></a></li>
			<li><a href="<?php echo U('Forum/UserDetail/myPost');?>"><span>我的发帖</span></a></li>
			<li><a href="<?php echo U('Forum/UserDetail/recovery');?>"><span>回收站</span></a></li>
    	</ul>
    </div>
    <div class="nav-slide-o">
    	<ul>
			<li><a href="<?php echo U('Forum/ReplyPost/myReply');?>"><span>我的回复</span></a></li>
			<li><a href="<?php echo U('Forum/ReplyPost/recovery');?>"><span>回收站</span></a></li>
    	</ul>
    </div>
    <div class="nav-slide-o">
    	<ul>
    		<li><a href="<?php echo U('Forum/UserDetail/modify');?>"><span>修改个人信息</span></a></li>
			<li><a href="<?php echo U('Forum/UserID/modify');?>"><span>修改登陆密码</span></a></li>
    	</ul>
    </div>
</div>
</div>
</div>


	<script type="text/javascript">
		function show_dele(what){
			$(what).show();
		};
		$(".dele").hide();
	</script>
<script type="text/javascript" src="/forum-system/Public/Forum/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
	$(function(){
	var thisTime;
	$('.nav-ul li').mouseleave(function(even){
			thisTime	=	setTimeout(thisMouseOut,1000);
	})

	$('.nav-ul li').mouseenter(function(){
		clearTimeout(thisTime);
		var thisUB	=	$('.nav-ul li').index($(this));
		if($.trim($('.nav-slide-o').eq(thisUB).html()) != "")
		{
			$('.nav-slide').addClass('hover');
			$('.nav-slide-o').hide();
			$('.nav-slide-o').eq(thisUB).show();
		}
		else{
			$('.nav-slide').removeClass('hover');
		}

	})

	function thisMouseOut(){
		$('.nav-slide').removeClass('hover');
	}

	$('.nav-slide').mouseenter(function(){
		clearTimeout(thisTime);
		$('.nav-slide').addClass('hover');
	})
	$('.nav-slide').mouseleave(function(){
		$('.nav-slide').removeClass('hover');
	})

})
</script>
</body>
</html>

<!-- <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/forum-system/Public/Forum/css/userdetail.css">
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
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
			margin-left:auto;
			margin-right:auto;
			margin-top:50PX;
			width:100%;
		}
		body{
		    background-color: #CCCCCC;
	    }
		body .item{
			width:80%;
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

		.nav{
			position: fixed;
			top: 0;
			left: 0;
			z-index: 20;
			width: 100%;
		}
		.img-rounded{
			width:50px;
			height: 50px;
			border-radius: 25px;
		}
		#guidebar{

			float: left;
		}

		.ue-sidenav{

			margin-left: 300px;

		}
		.category, a:hover{
			color: #66FFFF;
		}
		#guidebar a{

			color: #4169E1;

		}
		.ue-sidebar{
			margin-top: 10px;
			margin-bottom: 10px;
			font-size: 17px;
		}
		.table{
			margin-left: 200px;
			width: 800px;
		}
		.table-font-color1{
			color: #66FFCC;
		}
		.table-font-color2{
			color: #66CCFF;
		}
		.category a{
			text-decoration:none;
		}
		ul,li{
		  	list-style: none;
		}
		#modify{
			float: auto;
			margin-left: 900px;
		}

		.navigation{
			width: 80px;
			float: right;
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

	</style>
	<title>个人中心</title>

</head>
<body>

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

<div class="wrap">
	<div   class="ue-sidenav">
		<?php if(is_array($list_post)): foreach($list_post as $key=>$it): ?><div class="item" id="first-item">
				<div class="d1"><img src="/forum-system/Public/Forum/image/<?php echo ($it["for_head"]); ?>" class="img-rounded"></div>

				<div class="title"><?php echo ($it["for_text"]); ?>
					<span id="one" class="">
						<a href="<?php echo U('Forum/ReplyPost/index');?>?for_num=<?php echo ($it["for_num"]); ?>" title="查看详情"></a>
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
								<a ><span onclick="show_dele('#sure_<?php echo ($it["for_num"]); ?>')">恢复</span></a>
								<a class="back" id="sure_<?php echo ($it["for_num"]); ?>" href="<?php echo U('Forum/ReplyPost/backReply');?>?back_reply_num=<?php echo ($it["for_num"]); ?>&back_true=2">确认恢复</a>


							</span>

						</div>
					</div>
				</div>
			</div><?php endforeach; endif; ?>
	</div>
</div>

<div class="nav-main">
<div class="nav-box">
<div class="nav">
  <ul class="nav-ul">
  			<li><a href="<?php echo U('Forum/MainPost/index');?>"><span>返回论坛主页</span></a></li>
			<li><a href="<?php echo U('Forum/UserDetail/myPost');?>"><span>我的主帖管理</span></a></li>
			<li><a href="<?php echo U('Forum/ReplyPost/myReply');?>"><span>我的回复管理</span></a></li>
			<li><a href="<?php echo U('Forum/UserDetail/modify');?>"><span>个人信息管理</span></a></li>
			<li><a href="<?php echo U('Forum/Login/logout');?>"><span>注销</span></a></li>
  </ul>
</div>
<div class="nav-slide">
    <div class="nav-slide-o"></div>
    <div class="nav-slide-o">
    	<ul>
    		<li><a href="<?php echo U('Forum/MainPost/addMain');?>"><span>新增主贴</span></a></li>
			<li><a href="<?php echo U('Forum/UserDetail/myPost');?>"><span>我的发帖</span></a></li>
			<li><a href="<?php echo U('Forum/UserDetail/recovery');?>"><span>回收站</span></a></li>
    	</ul>
    </div>
    <div class="nav-slide-o">
    	<ul>
			<li><a href="<?php echo U('Forum/ReplyPost/myReply');?>"><span>我的回复</span></a></li>
			<li><a href="<?php echo U('Forum/ReplyPost/recovery');?>"><span>回收站</span></a></li>
    	</ul>
    </div>
    <div class="nav-slide-o">
    	<ul>
    		<li><a href="<?php echo U('Forum/UserDetail/modify');?>"><span>修改个人信息</span></a></li>
			<li><a href="<?php echo U('Forum/UserID/modify');?>"><span>修改登陆密码</span></a></li>
    	</ul>
    </div>
</div>
</div>
</div>


	<script type="text/javascript">
		function show_dele(what){
			$(what).show();
		};
		$(".back").hide();
	</script>
<script type="text/javascript" src="/forum-system/Public/Forum/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
	$(function(){
	var thisTime;
	$('.nav-ul li').mouseleave(function(even){
			thisTime	=	setTimeout(thisMouseOut,1000);
	})

	$('.nav-ul li').mouseenter(function(){
		clearTimeout(thisTime);
		var thisUB	=	$('.nav-ul li').index($(this));
		if($.trim($('.nav-slide-o').eq(thisUB).html()) != "")
		{
			$('.nav-slide').addClass('hover');
			$('.nav-slide-o').hide();
			$('.nav-slide-o').eq(thisUB).show();
		}
		else{
			$('.nav-slide').removeClass('hover');
		}

	})

	function thisMouseOut(){
		$('.nav-slide').removeClass('hover');
	}

	$('.nav-slide').mouseenter(function(){
		clearTimeout(thisTime);
		$('.nav-slide').addClass('hover');
	})
	$('.nav-slide').mouseleave(function(){
		$('.nav-slide').removeClass('hover');
	})

})
</script>
</body>
</html>

<!-- 
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="/forum-system/Public/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">

	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/forum-system/Public/umeditor/third-party/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/forum-system/Public/umeditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/forum-system/Public/umeditor/umeditor.min.js"></script>
    <script type="text/javascript" src="/forum-system/Public/umeditor/lang/zh-cn/zh-cn.js"></script>
	<script src="/forum-system/Public/umeditor/third-party/mathquill/mathquill.min.js"></script>
	<link rel="stylesheet" href="/forum-system/Public/umeditor/third-party/mathquill/mathquill.css"/>
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
	<title>回收站</title>
</head>
<body>
	<p id="userdetail"><a href="<?php echo U('Forum/MainPost/index');?>">返回论坛主页</a></p>
	<p id="userdetail"><a href="<?php echo U('Forum/UserDetail/index');?>">返回个人中心</a></p>
	<p id="logout"><a href="<?php echo U('Forum/Login/logout');?>">注销</a></p>
<?php if(is_array($list_post)): foreach($list_post as $key=>$it): ?><div class="item" id="first-item">
		<div class="zm-item-answer-author-info">
			<span class="">
				<span class="">
				<img src="/forum-system/Public/Forum/image/<?php echo ($it["for_head"]); ?>" class="img-rounded">
				<a class="author-link" data-hovercard="" target="_blank" href="<?php echo U('Forum/UserDetail/index');?>"><?php echo ($it["for_name"]); ?></a>
				</span>

				<span title="title" ><?php echo ($it["for_title"]); ?></span>
			</span>
		</div>


		<div class="zh-summary">
			<p>&nbsp &nbsp &nbsp &nbsp <?php echo ($it["for_text"]); ?></p>
		</div>
		<div class="feed-meta">
			<div class="zm-item-meta answer-actions clearfix js-contentActions">
				<div class="zm-meta-panel">
					<a itemprop="url" class="answer-date-link meta-item" data-tooltip="" target="_blank" href=""><?php echo ($it["for_time"]); ?></a>
					<span class="zg-bull zu-autohide">&bull;</span>
					<a href="#" name="" class="">
					<i class="z-icon-comment"></i><span id="<?php echo ($it["for_num"]); ?>"><?php echo ($it["for_up"]); ?></span> <span id="zan" onclick="zan_click('#<?php echo ($it["for_num"]); ?>')">人赞同</span></a>

					<a ><span onclick="show_dele('#sure_<?php echo ($it["for_num"]); ?>')">恢复</span></a>
					<a class="back" id="sure_<?php echo ($it["for_num"]); ?>" href="<?php echo U('Forum/ReplyPost/backReply');?>?back_reply_num=<?php echo ($it["for_num"]); ?>&back_true=2">确认恢复</a>
				</div>
			</div>
		</div>

	</div><?php endforeach; endif; ?>
<script type="text/javascript">
	function show_dele(what){
		$(what).show();
	};
	$(".back").hide();
</script>
</body>
</html> --> -->