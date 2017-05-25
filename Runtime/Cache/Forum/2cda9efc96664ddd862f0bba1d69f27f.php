<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>论坛后台管理</title>

<style  type="text/css">
body{
	margin:0;
	font-family:'微软雅黑','Times New Roman', Times, serif;
	}
.navi_head{
	height:50px;
	background-color:#459df5;
}
.navi_body{
	overflow:hidden;
	height:50px;
	width: 100%;
	z-index: -1;
	background:rgba(36,97,158,0.9);
	transition:height ease 0.5s;
}
.navi_body:hover{

	height:190px;
}

.navi_head>div>span{
	width: 10%;
	text-align:center;
	/*height:100px;*/
	display:inline-block;
	font-weight:bold;
	color:#FFF;
	font-size:14px;
	vertical-align:top;
}

.navi_head>div>span>p a{
	color:#FFF;
	text-decoration:none;
}
.navi_head>div>span>p a:hover{
	color:#FFF;
	text-decoration:underline;
}

.navi_title{
	font-size:16px;
	line-height:50px;
	margin-top:0;
}

.navi_head>div>span:hover{
	background:rgba(100,100,100,0.2);
}
.navi_g{
	width:100%;
	text-align: center;
}
</style>

</head>
<body>
	<div class="navi_body">
		<div class="navi_head">
			<div class="navi_g">
				<span>
					<p class="navi_title"><a href="<?php echo U('Forum/Adm/index');?>">首页</a></p>
		            <p><a href="<?php echo U('Forum/Adm/circular');?>" target="right_content">发布通告</a></p>
					<p><a href="<?php echo U('Forum/Adm/showRecord');?>" target="right_content">操作记录</a></p>
				</span>

				<span>
					<p class="navi_title"><a href="<?php echo U('Forum/Adm/searchMain');?>" target="right_content">主贴管理</a></p>
					<p><a href="<?php echo U('Forum/Adm/searchMain');?>" target="right_content">检索主贴</a></p>
					<p><a href="<?php echo U('Forum/Adm/alterClass');?>" target="right_content">分类管理</a></p>
				</span>

				<span>
					<p class="navi_title"><a href="<?php echo U('Forum/Adm/searchReply');?>" target="right_content">回帖管理</a></p>
					<p><a href="<?php echo U('Forum/Adm/searchReply');?>" target="right_content">检索回帖</a></p>

				</span>

				<span>
					<p class="navi_title">举报管理</p>
					<p><a href="<?php echo U('Forum/Adm/reportMain');?>" target="right_content">主贴举报查看</a></p>
		            <p><a href="<?php echo U('Forum/Adm/reportReply');?>" target="right_content">回帖举报查看</a></p>
				</span>

				<span>
					<p class="navi_title"><a href="<?php echo U('Forum/Adm/forumUser');?>"  target="right_content">论坛用户信息管理</a></p>
		            <p><a href="<?php echo U('Forum/Adm/forumUser');?>"  target="right_content">搜索论坛用户</a></p>
				</span>

				<span>
					<p class="navi_title">管理员专栏</p>
					<p><a href="<?php echo U('Forum/Adm/showAll');?>" target="right_content">查看管理员</a></p>
					<p><a href="<?php echo U('forum/Adm/searchUser');?>" target="right_content">搜索管理员</a></p>
		            <p <?php if(D("Adm")->checkPermission()) echo "style='display:none'";?>><a href="<?php echo U('Forum/Adm/addUser');?>" target="right_content">添加管理员</a></p>
    	            <p><a href="<?php echo U('Forum/Adm/showPersonInfo');?>" target="right_content">修改个人信息</a></p>
				</span>

				<span>
					<p class="navi_title"><a href="<?php echo U('Forum/Adm/logout');?>">注销</a></p>
					<p><a href="<?php echo U('Forum/Adm/logout');?>">退出登陆</a></p>
					<p><a href="<?php echo U('Forum/MainPost/index');?>">论坛主页</a></p>
				</span>
				<span>
					<p class="navi_title"><a href="<?php echo U('Forum/Adm/showPersonInfo');?>" title="修改个人信息" target="right_content">你好：<?php echo ($admName); ?></a></p>
				</span>
			</div>
		</div>
		<div style="margin-top: 80px;color: silver;float: right;">既然选择了远方，何惧风雨兼程！</div>
	</div>
	<iframe src="<?php echo U('Forum/Adm/welcome');?>" frameborder="0" width="100%" height="900px" name="right_content" scrolling="auto"></iframe>
</body>
</html>