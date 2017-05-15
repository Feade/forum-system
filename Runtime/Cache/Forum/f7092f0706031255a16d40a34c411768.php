<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="/tp3/Public/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="/tp3/Public/Forum/css/xq_navbar.css"/>
	<link rel="stylesheet" href="/tp3/Public/Forum/css/xq.css"/>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/tp3/Public/umeditor/third-party/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/tp3/Public/umeditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/tp3/Public/umeditor/umeditor.min.js"></script>
    <script type="text/javascript" src="/tp3/Public/umeditor/lang/zh-cn/zh-cn.js"></script>
	<script src="/tp3/Public/umeditor/third-party/mathquill/mathquill.min.js"></script>
	<link rel="stylesheet" href="/tp3/Public/umeditor/third-party/mathquill/mathquill.css"/>

	<title>详情</title>
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
			width:80%;
			margin: auto;
			margin-top:50px;
		}
		.nav{
			position: fixed;
			top: 0;
			left: 0;
			z-index: 20;
			width: 100%;
		}
		.item{
			position: relative;
			border: 1px solid #999;
 			height: auto;
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
			position: absolute;
			left: 0;
			top: 0;
			height: 200px;
			width: 100px;

		}
		.auctor{

			margin-left: 100px;
			margin-top: 20px;
			margin-right: 20px;

		}
		.fede-mete{
/*			padding-top: 100px;*/
			padding-bottom: 20px;
			margin-left: 100px;
			margin-right: 10px;
			float: right;

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
		.detail{
			width: 95%;
		}
		.navigation{
			width: 80px;
			float: right;
			/*float: fixed;*/
		}
		.img-navigation{
			width:50px;
			height: 50px;
			max-width: 100%;
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
</head>
<body>
	<div id="flip" class="navigation">
		<div class="button-navigation">	
			<a href="<?php echo U('Forum/UserDetail/index');?>">
				<img class="img-navigation" src="/tp3/Public/Forum/image/<?php echo ($userHead["for_head"]); ?>">
			</a>
		</div>
		<div class="button-navigation">	
			<img class="img-navigation" src="/tp3/Public/Forum/image/menu.jpg">
		</div>
		<div id="panel" class="navigation">
				<div class="button-navigation">	
						<a href="<?php echo U('Forum/MainPost/addMain');?>" title="新增主贴">
							<img class="img-navigation" src="/tp3/Public/Forum/image/new.jpg">
						</a>
				</div>
				<div class="button-navigation">		
						<a href="<?php echo U('Forum/MainPost/index');?>" title="返回论坛主页">
							<img class="img-navigation" src="/tp3/Public/Forum/image/homepage.jpg">
						</a>
				</div>
				<div class="button-navigation">		
						<a href="<?php echo U('Forum/Login/logout');?>" title="注销">
							<img class="img-navigation" src="/tp3/Public/Forum/image/exit.jpg">
						</a>
				</div>
		</div>
	</div>

	<div class="detail">
		<div class="xq_bag nav" id="bar3">
			<ul class="xq_navbar">
				<?php if(is_array($list)): foreach($list as $key=>$it): ?><li class="xq_navli"><a href="<?php echo U('Forum/MainPost/order');?>?for_class=<?php echo ($it["for_class"]); ?>"><?php echo ($it["for_class"]); ?></a></li><?php endforeach; endif; ?>
			</ul>
		</div>

		<div class="title">
			<span title="title" ><?php echo ($MainPost["for_title"]); ?></span>
		</div>
		<div class="item">
			<div class="d1">
					<img src="/tp3/Public/Forum/image/<?php echo ($MainPost["for_head"]); ?>" class="img-rounded">
					<a  href="<?php echo U('Forum/UserDetail/show');?>?ID=<?php echo ($MainPost["for_id"]); ?>" style="margin-left: 25px;" title="查看用户详情"><?php echo ($MainPost["for_name"]); ?></a>
			</div>
			<div    class="auctor">
				<div class="xiangxi">
					<p>&nbsp &nbsp &nbsp &nbsp <?php echo ($MainPost["for_text"]); ?></p>
				</div>
				<div class="fede-mete">
					<span>
						<span class="zg-bull zu-autohide"><?php echo ($MainPost["for_join"]); ?> 评论</span>
						<span class="zg-bull zu-autohide">&bull; <?php echo ($MainPost["for_up"]); ?></span>
						<a href="<?php echo U('Forum/Operate/mainUp');?>?for_num=<?php echo ($MainPost["for_num"]); ?>">点赞</span></a>
						<span class="zg-bull zu-autohide">&bull; <?php echo ($MainPost["for_down"]); ?></span>
						<a href="<?php echo U('Forum/Operate/mainDown');?>?for_num=<?php echo ($MainPost["for_num"]); ?>">板砖</span></a>
						 &nbsp &nbsp
						<a href="<?php echo U('Forum/Operate/mainReport');?>?for_num=<?php echo ($MainPost["for_num"]); ?>"><font color="#FF0000">举报</font></a>
						 &nbsp &nbsp
						<a ><span id="fu">回复</span></a>

						<!-- <a ><?php echo ($MainPost["for_time"]); ?></a>
						<img src="/tp3/Public/Forum/image/zan.png" class="xiaotubiao" >
						<a href="<?php echo U('Forum/Operate/mainUp');?>?for_num=<?php echo ($MainPost["for_num"]); ?>"><span id="zan">点赞<span id="zan_count"><?php echo ($MainPost["up"]); ?></span></span></a>

						<img src="/tp3/Public/Forum/image/cai.png" class="xiaotubiao">
						<a href="#"><span id="cai">踩<span id="cai_count"><?php echo ($MainPost["for_down"]); ?></span></span></a> -->
					</span>
				</div></br>
			</div>
		</div>

		<form id="form" action="<?php echo U('Forum/ReplyPost/index');?>" method="post" target="_blank">
			<input type="hidden" name="for_fatherid" value="<?php echo ($MainPost["for_num"]); ?>">
		    <script type="text/plain" id="myEditor" name="for_text" style="width:100%;height:240px;" >
		        <p>请使用英文状态输入公式！</p>
		    </script>
		    <input type="submit" value="提交">
		</form>

		<?php if(is_array($ReplyPost)): foreach($ReplyPost as $key=>$it): ?><div class="item">
				<div class="d1">
					<span class="">

						<img src="/tp3/Public/Forum/image/<?php echo ($it["for_head"]); ?>" class="img-rounded"><br>
						<a class="author-link" data-hovercard="" target="_blank" href="<?php echo U('Forum/UserDetail/show');?>?ID=<?php echo ($it["for_id"]); ?>" title="查看用户详情"><?php echo ($it["for_name"]); ?></a>
					</span>
				</div>
				<div class="auctor">
					<div>
						<?php echo ($it["for_text"]); ?>
					</div>

					<div class="fede-mete">
						<div class="zm-item-meta answer-actions clearfix js-contentActions">
							<div class="zm-meta-panel">
								<a itemprop="url" class="answer-date-link meta-item" data-tooltip="" target="_blank" href=""><?php echo ($it["for_time"]); ?></a>
								<span class="zg-bull zu-autohide">&bull;</span>
								<a href="#" name="" class="">
								<i class="z-icon-comment"></i><span id="<?php echo ($it["for_num"]); ?>"><?php echo ($it["for_up"]); ?></span> <span id="zan" onclick="zan_click('#<?php echo ($it["for_num"]); ?>')">人赞同</span></a>
								<font color="green">&bull;<?php echo ($it["for_floor"]); ?>&nbsp 楼</font>
							</div>
						</div>
					</div>
				</div>
			</div><?php endforeach; endif; ?>
	</div>
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
		// function zan_click(what){
		// 	var zan=$(what).text();
		// 	$(what).text(++zan);
		// };
	</script>
	<script type="text/javascript">
	    //实例化编辑器
	    var um = UM.getEditor('myEditor');

	    //按钮的操作
		function showHint(str)
		{
			// var xmlhttp;
			// if (str.length==0)
			//   {
			// 	  $("form")="";
			// 	  return;
			//   }
			// if (window.XMLHttpRequest)
			//   
			// else
			//   
			// xmlhttp.onreadystatechange=function()
			// {
			//  if(xmlhttp.readyState==4 && xmlhttp.status==200)
			//     {
			// 	    $("form").before(xmlhttp.responseText);
			//     }
			// }
			// xmlhttp.open("POST","/tp3/Public/umeditor/php/getContent.php?myEditor="+str,false);
			// xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			// xmlhttp.send("myEditor="+str);
		};

		// $("#add").click(function(){
		//   	var text=[];
		//   	text.push(UM.getEditor('myEditor').getContent());

		//   	showHint(text);
		// });

		$("#zan").click(function(){
			var zan=$("#zan_count").text();
			$("#zan_count").text(++zan);
		});

		$("#cai").click(function(){
			var cai=$("#cai_count").text();
			$("#cai_count").text(++cai);
		});

		$("#fu").click(function(){
			 $("form").toggle();
		});

		$("#de").click(function() {
		    $(".item").remove(); // $(selector)通过选择器表示要删除的元素，remove()函数用以删除元素
		});

		$("form").hide();


	</script>
</body>
</html>