<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户登陆</title>
<!-- 禁止用户滚轮滑动 -->
<script type="text/javascript">
    function disabledMouseWheel() {
      if (document.addEventListener) {
        document.addEventListener('DOMMouseScroll', scrollFunc, false);
      }//W3C
      window.onmousewheel = document.onmousewheel = scrollFunc;//IE/Opera/Chrome
    }
    function scrollFunc(evt) {
      evt = evt || window.event;
        if(evt.preventDefault) {
        // Firefox
          evt.preventDefault();
          evt.stopPropagation();
        } else {
          // IE
          evt.cancelBubble=true;
          evt.returnValue = false;
      }
      return false;
    }
    window.onload=disabledMouseWheel;
</script>

</head>




<link href="/forum-system/Public/Forum/css/global.css" rel="stylesheet" type="text/css">
<link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

<style type="text/css">
.bannerbox{width:100%;position:relative;overflow:hidden;}

.Homebanner{width:100%;position:relative;height:600px;overflow:hidden;}
.Homebanner ul{width:100%;position:absolute;height:600px;}
.Homebanner ul li{width:100%;height:600px;position:absolute;overflow:hidden;}
.Homebanner ul li img{width:100%;position:absolute;left:50%;top:0px;display:block;margin-left:-50%;}

.Homeleft,.Homeright{background:#000;font-family:"宋体";width:50px;height:50px;line-height:50px;text-align:center;font-size:40px;color:#fff;position:absolute;top:45%;cursor:pointer;transition:all .2s ease;opacity:0;z-index:899999}
.Homeleft{left:-60px;}
.Homeright{right:-60px;}

.bannerbox:hover .Homeleft{left:0px;opacity:1}
.bannerbox:hover .Homeright{right:0px;opacity:1}

.Homedot{position:absolute;width:100%;text-align:center;z-index:999;bottom:60px;}
.Homedot a{display:inline-block;margin:0px 5px;height:12px;width:12px;line-height:1000px;overflow:hidden;background:url(/forum-system/Public/Forum/img/index_229.png) no-repeat;}
.Homedot a.cur{background:url(/forum-system/Public/Forum/img/index_228.png) no-repeat}

.Homebannertext{position:absolute;left:0px;top:0px;width:100%;height:100%;}
.Homebannertext img.bigimg{transform:translateY(100px);-moz-transform:translateY(100px);-ms-transform:translateY(100px);-o-transform:translateY(100px);-webkit-transform:translateY(100px);}
.Homebannertext dl.bannerone{position:absolute;width:1180px;left:50%;margin-left:-590px;top:251px;text-align:center;z-index:9999;}
.Homebannertext dl.bannerone dt{float:right;font-size:45px;width:750px;height:80px;margin-left:100px;line-height:75px;color:#fff;background:#eb3900;transform:translateY(100px);-moz-transform:translateY(100px);-ms-transform:translateY(100px);-o-transform:translateY(100px);-webkit-transform:translateY(100px);}
.Homebannertext dl.bannerone dd{float:right;font-size:29px;color:#fff;background:#000;width:360px;height:60px;line-height:60px;margin-right:45px;transform:translateY(100px);-moz-transform:translateY(100px);-ms-transform:translateY(100px);-o-transform:translateY(100px);-webkit-transform:translateY(100px);}
.Homebannertext dl.bannertwo{position:absolute;width:1180px;left:50%;top:0px;color:#fff;margin-left:-590px;z-index:9999;}
.Homebannertext dl.bannertwo dt{padding-top:110px;position:relative;transform:translateY(100px);-moz-transform:translateY(100px);-ms-transform:translateY(100px);-o-transform:translateY(100px);-webkit-transform:translateY(100px);}
.Homebannertext dl.bannertwo dt h3{font-size:50px;line-height:60px;font-weight:700;position:relative;}
.Homebannertext dl.bannertwo dt p{font-size:20px;position:relative;padding-top:20px;}
.Homebannertext dl.bannerthree{position:absolute;width:1220px;left:50%;margin-left:-610px;top:0px;}
.Homebannertext dl.bannerthree dt{float:left;position:relative;transform:translateX(100px);-moz-transform:translateX(100px);-ms-transform:translateX(100px);-o-transform:translateX(100px);-webkit-transform:translateX(100px);}
.Homebannertext dl.bannerthree img{display:block;position:relative;width:auto;height:auto;left:0px;margin:0px;top:0px;}
.Homebannertext dl.bannerthree dd{width:500px;float:left;color:#fff;padding-top:170px;position:relative;padding-left:25px;transform:translateX(100px);-moz-transform:translateX(100px);-ms-transform:translateX(100px);-o-transform:translateX(100px);-webkit-transform:translateX(100px);}
.Homebannertext dl.bannerthree dd h3{font-size:55px;font-weight:700;line-height:70px;}
.Homebannertext dl.bannerthree dd p{font-size:20px;line-height:30px;}

.bannereffect{opacity:0;filter:alpha(opacity=0);}

.bannertime{transition:all .8s ease-in-out;-moz-transition:all .8s ease-in-out;-ms-transition:all .8s ease-in-out;-o-transition:all .8s ease-in-out;-webkit-transition:all .8s ease-in-out;}
.bannertime1{transition:all .8s ease-in-out .2s;-moz-transition:all .8s ease-in-out .2s;-ms-transition:all .8s ease-in-out .2s;-o-transition:all .8s ease-in-out .2s;-webkit-transition:all .8s ease-in-out .2s;}
.bannertime2{transition:all 1s ease-in-out .2s;-moz-transition:all 1s ease-in-out .2s;-ms-transition:all 1s ease-in-out .2s;-o-transition:all 1s ease-in-out 2s;-webkit-transition:all 1s ease-in-out .2s;}

.Homebanner li.cur .Homebannertext img.bigimg{transform:translateY(0px);-moz-transform:translateY(0px);-ms-transform:translateY(0px);-o-transform:translateY(0px);-webkit-transform:translateY(0px);}
.Homebanner li.cur .Homebannertext dl.bannerone dt{transform:translateY(0px);-moz-transform:translateY(0px);-ms-transform:translateY(0px);-o-transform:translateY(0px);-webkit-transform:translateY(0px);}
.Homebanner li.cur .Homebannertext dl.bannerone dd{transform:translateY(0px);-moz-transform:translateY(0px);-ms-transform:translateY(0px);-o-transform:translateY(0px);-webkit-transform:translateY(0px);}
.Homebanner li.cur .Homebannertext dl.bannertwo dt{transform:translateY(0px);-moz-transform:translateY(0px);-ms-transform:translateY(0px);-o-transform:translateY(0px);-webkit-transform:translateY(0px);}
.Homebanner li.cur .Homebannertext dl.bannerthree dt{transform:translateX(0px);-moz-transform:translateX(0px);-ms-transform:translateX(0px);-o-transform:translateX(0px);-webkit-transform:translateX(0px);}
.Homebanner li.cur .Homebannertext dl.bannerthree dd{transform:translateX(0px);-moz-transform:translateX(0px);-ms-transform:translateX(0px);-o-transform:translateX(0px);-webkit-transform:translateX(0px);}
.Homebanner li.cur .bannereffect{opacity:1;filter:alpha(opacity=100);}

.Homebanner li.cur1 .bannertime{transition:all .4s linear .2s;-moz-transition:all .4s linear .2s;-ms-transition:all .4s linear .2s;-o-transition:all .4s linear .2s;-webkit-transition:all .4s linear .2s;}
.Homebanner li.cur1 .bannertime1{transition:all .4s linear .1s;-moz-transition:all .4s linear .1s;-ms-transition:all .4s linear .1s;-o-transition:all .4s linear .1s;-webkit-transition:all .4s linear .1s;}
.Homebanner li.cur1 .bannertime2{transition:all .4s linear;-moz-transition:all .4s linear;-ms-transition:all .4s linear;-o-transition:all .4s linear;-webkit-transition:all .4s linear;}
.Homebanner li.cur1 .Homebannertext img.bigimg{transform:translateY(100px);-moz-transform:translateY(100px);-ms-transform:translateY(100px);-o-transform:translateY(100px);-webkit-transform:translateY(100px);}
.Homebanner li.cur1 .Homebannertext dl.bannerone dt{transform:translateY(100px);-moz-transform:translateY(100px);-ms-transform:translateY(100px);-o-transform:translateY(100px);-webkit-transform:translateY(100px);}
.Homebanner li.cur1 .Homebannertext dl.bannerone dd{transform:translateY(100px);-moz-transform:translateY(100px);-ms-transform:translateY(100px);-o-transform:translateY(100px);-webkit-transform:translateY(100px);}
.Homebanner li.cur1 .Homebannertext dl.bannertwo dt{transform:translateY(100px);-moz-transform:translateY(100px);-ms-transform:translateY(100px);-o-transform:translateY(100px);-webkit-transform:translateY(100px);}
.Homebanner li.cur1 .Homebannertext dl.bannerthree dt{transform:translateX(100px);-moz-transform:translateX(100px);-ms-transform:translateX(100px);-o-transform:translateX(100px);-webkit-transform:translateX(100px);}
.Homebanner li.cur1 .Homebannertext dl.bannerthree dd{transform:translateX(100px);-moz-transform:translateX(100px);-ms-transform:translateX(100px);-o-transform:translateX(100px);-webkit-transform:translateX(100px);}
.Homebanner li.cur1 .bannereffect{opacity:0;filter:alpha(opacity=0);}


.index_btn{width:100%;position:absolute;height:40px;top:560px;z-index:9999;background:#191919;}
.index_btn ul{margin:0px auto;padding:0px;width:1180px;}
.index_btn ul li{float:left;width:295px;height:40px;position:relative;}
.index_btn ul li span{position:relative;z-index:999;width:294px;display:block;height:40px;}
.index_btn ul li span a{display:block;width:294px;color:#FFF;background:#191919;cursor:pointer;font-size:14px;text-align:center;line-height:40px;border-right:1px solid #a7a7a7;float:left;height:40px;}
.index_btn ul li span a:hover{color:#FFF;background:#e60012;}
.index_btn ul li span a.cur{border:none;width:295px;}
.index_btn ul li em{display:inline-block;height:40px;padding-left:30px;}
.index_btn ul li em.btn{background:url(/forum-system/Public/Forum/img/btn1.png) no-repeat left center;}
.index_btn ul li em.btn1{background:url(/forum-system/Public/Forum/img/btn3.png) no-repeat left center;}
.index_btn ul li em.btn2{background:url(/forum-system/Public/Forum/img/btn4.png) no-repeat left center;}
.index_btn ul li em.btn3{background:url(/forum-system/Public/Forum/img/btn2.png) no-repeat left center;}

.index_btnbox{width:295px;height:260px;background:#FFF;position:absolute;top:0px;left:0px;padding:20px 0px 0px 0px;}
.index_btnbox img{display:block;margin:auto;}
.index_btnbox p{margin:0px;padding:20px 0px 0px 19px;}
.index_btnbox p a{display:block;float:left;width:130px;padding-bottom:5px;line-height:24px;}

.input-group{width: 300px;margin-top: 20px;}
.login-background{
	background-image: url(/forum-system/Public/Forum/img/math.jpg);
	background-size: 100% 100%;
	width: 100%;
	position: absolute;
	top: 600px;
	/*height: 600px;*/
	bottom: 0px;
	/*height: 600px;*/
	/*margin-left: 8px;*/
}
.img-login{
	width: 20px;
	height: 20px;
	border-radius: 5px;
}
</style>

<script type="text/javascript" src="/forum-system/Public/Forum/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/forum-system/Public/Forum/js/banner.js"></script>
<script type="text/javascript">
$(document).ready(function(){

	$(".index_btn li").hover(function(){
		$(this).find("div").stop(true).animate({top:-280},300);
	},function(){
		$(this).find("div").stop(true).animate({top:-0},300);
	});

});
</script>

<body>

<div class="bannerbox">

	<div class="Homebanner">
		<ul>
			<li class="Load cur" style="z-index:99">
				<img src="/forum-system/Public/Forum/img/banner2016.jpg" alt="">
				<div class="Homebannertext">
					<img src="/forum-system/Public/Forum/img/banner2016.png" class="bannereffect bannertime bigimg">
					<dl class="bannerone clearfix">
						<dt class="bannereffect bannertime1">
							厚德 博学 砺志 笃行·共筑重科梦
						</dt>
						<dd class="bannereffect bannertime2" style="font-size: 25px;">
							学生为本·人人成才·全面发展！
						</dd>
					</dl>
				</div>
			</li>
			<li class="Load">
				<img src="/forum-system/Public/Forum/img/banner02.jpg" alt="">
				<div class="Homebannertext">
					<img src="/forum-system/Public/Forum/img/02.png" class="bannereffect bannertime bigimg">
					<dl class="bannertwo clearfix">
						<dt class="bannereffect bannertime1">
							 <h3>以教学带科研，以科研促教学</h3>
							 <h2>准确定位，构建应用型人才培养模式</h2>
							 <h2>协同创新，建立产学研合作育人机制</h2>
							 <h2>以人为本，提升应用型人才培养办学水平</h2>
						</dt>
					</dl>
				</div>
			</li>
			<li class="Load"><img src="/forum-system/Public/Forum/img/03.jpg" alt="">
				<div class="Homebannertext">
					<dl class="bannerthree clearfix">
						<dt class="bannereffect bannertime"><img src="/forum-system/Public/Forum/img/03-1.png" alt=""></dt>
						<dd class="bannereffect bannertime1">
							 <img src="/forum-system/Public/Forum/img/03-2.png" alt="">
							 <h2>德优品正、业精致用、拓新笃行</h2>
							 <p>在全系师生的共同努力下，数学与应用数学专业历届报考研究生的学生上线率均在40%以上，就业率均在92%以上</p>
						</dd>
					</dl>
				</div>
			</li>
		</ul>
		<div class="Homeleft"><</div>
		<div class="Homeright">></div>
		<div class="Homedot"><a href="javascript:;" class="cur">1</a><a href="javascript:;">2</a><a href="javascript:;">3</a></div>
	</div>


	<div class="index_btn">
		<ul>
			 <li><span><a href="<?php echo U('Forum/MainPost/index');?>"><em class="btn">时事热点</em></a></span>
			 <div class="index_btnbox index_btnanli" style="top: 0px;">
				<img src="/forum-system/Public/Forum/img/menu_pic1.jpg" alt="时事热点" width="258" height="112">
				<p class="clearfix">
					<a href="<?php echo U('Forum/MainPost/hotMain');?>?hot=1" title="按评论数排序">最新热点</a>
					<a href="<?php echo U('Forum/MainPost/hotMain');?>?hot=2" title="按时间排序">最新动态</a>
					<a href="<?php echo U('Forum/MainPost/hotMain');?>" title="按点赞数排序">精华动态</a>
					<a href="">数理学院教务</a>
				</p>
			 </div>
			 </li>
			 <li><span><a href="#"><em class="btn1">校园故事</em></a></span>
			 <div class="index_btnbox">
				<img src="/forum-system/Public/Forum/img/menu_pic2.jpg" alt="校园故事" width="258" height="112">
				<p class="clearfix">
					<a href="<?php echo U('Forum/MainPost/order');?>?for_class=重科和我的故事">重科和我的故事</a>
					<a href="<?php echo U('Forum/MainPost/order');?>?for_class=考研天地">考研天地</a>
				</p>
			 </div>
			 </li>
			 <li><span><a href="#"><em class="btn3">教师风采</em></a></span>
			 <div class="index_btnbox">
				<img src="/forum-system/Public/Forum/img/menu_pic3.jpg" alt="教师风采" width="258" height="112">
				<p class="clearfix">
					<a href="<?php echo U('Forum/MainPost/order');?>?for_class=教学动态">教学动态</a>
					<a href="<?php echo U('Forum/MainPost/order');?>?for_class=身边的老师">身边的老师</a>
				</p>
			 </div>
			 </li>
			 <li><span><a href="#" class="cur"><em class="btn2">学科建设</em></a></span>
			 <div class="index_btnbox">
				<img src="/forum-system/Public/Forum/img/menu_pic4.jpg" alt="学科建设" width="258" height="112">
				<p class="clearfix">
				   <a href="<?php echo U('Forum/MainPost/order');?>?for_class=数学分析" title="数学分析">数学分析</a>
				   <a href="<?php echo U('Forum/MainPost/order');?>?for_class=高等代数" title="高等代数">高等代数</a>
				   <a href="<?php echo U('Forum/MainPost/order');?>?for_class=程序那些事" title="程序那些事">程序那些事</a>
				   <a href="<?php echo U('Forum/MainPost/order');?>?for_class=数学建模" title="数学建模">数学建模</a>
				</p>
			 </div>
			 </li>
		</ul>
	</div>

</div>

<div class="login-background">
	<form action="<?php echo U('Forum/Login/login');?>" method="post" style="width: 300px;height: 200px; margin-top: 0px; margin-left: 40%;">
		<br><br>
		<div class="input-group">
			 <span class="input-group-addon" id="basic-addon1"><img class="img-login" src="/forum-system/Public/Forum/img/head.jpg"></span>
			<input class="form-control" type="text" name="name" placeholder="用户名" >
		</div>
		<div class="input-group">
			 <span class="input-group-addon" id="basic-addon1"><img class="img-login" src="/forum-system/Public/Forum/img/key.jpg"></span>
			<input class="form-control" type="password" name="password" placeholder="密码" >
		</div>



		<button  class="btn btn-default" type="reset" style="margin-top: 20px; width:80px;margin-left:90px;">重置</button>
		<button  class="btn btn-default" type="submit" style="margin-top: 20px; width:80px;margin-left: 40px;">登录</button>

		<div style="float: right;margin-top: 20px;"><a href="<?php echo U('Forum/Adm/login');?>" style="color: #333333;" title="后台管理登陆入口">我是管理员</a></div>
	</form>
</div>
</body>
</html>