<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="initial-scale=1,width=device-width,user-scalable=no"/>
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="shortcut icon" href="/tp3/Public/Forum/image/login.ico">

	<link rel="stylesheet" href="/tp3/Public/Forum/css/xq_navbar.css"/>

	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	</script>
	<title>main</title>
	<style type="text/css">
		.nav{
			position: fixed;
			top: 0;
			left: 0;
			z-index: 20;
			width: 100%;
		}
	</style>
</head>
<body>
	<div class="xq_bag nav" id="bar3">
		<ul class="xq_navbar">
			<?php if(is_array($list)): foreach($list as $key=>$it): ?><li class="xq_navli"><a href="<?php echo U('Forum/MainPost/main');?>?for_class=<?php echo ($it["for_class"]); ?>"><?php echo ($it["for_class"]); ?></a></li><?php endforeach; endif; ?>
		</ul>
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
		function zan_click(what){
			var zan=$(what).text();
			$(what).text(++zan);
		};
	</script>
</body>

</html>