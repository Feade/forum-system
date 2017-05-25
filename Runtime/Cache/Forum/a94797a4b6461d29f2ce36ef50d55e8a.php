<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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
/*		.nav{
			position: fixed;
			top: 0;
			left: 0;
			z-index: 20;
			width: 100%;
		}*/
/*		.img-rounded{
			width:50px;
			height: 50px;
			border-radius: 25px;
		}*/
/*		#guidebar{

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

		}*/
		table{
			margin-top: 100px;
			margin-left: 25%;
			width: 60%;
			max-width: 50%;
			border: 2px solid white;
		}

		tr,td{
			/*width: 100px;*/
			/*max-width: 50px;*/
			height: 50px;
			border: 2px solid white;
			color: #33CCFF;
		}

/*		.table-font-color1{
			color: #66FFCC;
		}
		.table-font-color2{
			color: #66CCFF;
		}*/
/*		.category a{
			text-decoration:none;
		}*/
		ul,li{
			list-style: none;
		}
/*		#modify{
			float: auto;
			margin-left: 800px;
		}*/

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
				<img class="img-navigation" src="/forum-system/Public/Forum/image/<?php echo ($UserDetail["for_head"]); ?>">
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
	<div>&#12288;</div>
	<div id="demo"></div>
	<table>
		<tr>
			<td>项目</td>
			<td>经验值</td>
			<td>项目</td>
			<td>经验值</td>
		</tr>
		<tr>
			<td>发帖</td>
			<td>+5</td>
			<td>主贴被赞</td>
			<td>+2</td>
		</tr>
		<tr>
			<td>主贴被评论</td>
			<td>+1</td>
			<td>添加回复</td>
			<td>+1</td>
		</tr>
		<tr>
			<td>回复被赞</td>
			<td>+2</td>
			<td>被举报后管理员删除</td>
			<td>-50</td>
		</tr>
	</table>
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
		function getValue(){
			var value=5000000;
			var temp=value;
			var count =2;
			var j=0;
			var ret=new Array();
			for(var i=1;value>0;i+=(count-3)){
				value-=i*100;
				++count;
				ret[j++]=temp-value;
			}
			return ret;
		}
		var cols=3;    //列
		var rows=9; //行
		var htmlstr="<table>";
		htmlstr+="<tr><td>1级：15</td><td>2级：30</td><td>3级：60</td></tr>";
		var count=0
		var value=new Array();
		value=getValue();
		for(r=1;r<=rows;r++){
			htmlstr+="<tr>";
			for(j=1;j<=cols;j++){
				htmlstr+="<td >" + (count+4) + "级" + "：" + value[count++] +"</td>";
			}
			htmlstr+="</tr>";
		}
		htmlstr+="</table>";
		document.getElementById("demo").innerHTML=htmlstr;
	</script>
</body>
</html>