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
    .category, a:hover{
      color: #66FFFF;
    }
    .category a{
      text-decoration:none;
    }
    .nav{
      position: fixed;
      top: 0;
      left: 0;
      z-index: 20;
      width: 100%;
    }
    .ue-sidenav{
      margin-top: 200px;
      margin-left: 35%;
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
    input[type="password"]{
      border-radius:5px; 
      width: 300px;
      height: 30px;
      margin-top: 50px;
    }
    .but{
      border-radius:5px; 
      width: 100px;
      height: 35px;
      margin-top: 60px;
      margin-left: 70px;
    }
    .control-div{
      color: #66FFCC;
      margin-top: 20px;
    }
    .controls{
      align-self: left;
      margin-left: 100px; 
    }
    .file{
      color: #66CCFF;
      margin-left: 140px; 
    }
/*    .but{
      margin-top:20px;
      margin-left:40px;
    }*/
    .form-horizontal{
      margin-top: 100px;
    }
/*    input{
      border-radius: 5px;
      width: 300px; 
    }*/
  </style>
  <title>修改密码</title>

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
    <form action="<?php echo U('Forum/UserID/modify');?>" method="post" class="form-horizontal">
      <div class="control-div">原&nbsp;&nbsp;密&nbsp;&nbsp;码
        <span class="controls">
          <input type="password"   name="old_password"><span>&nbsp;<font color="red">*</font></span>
        </span>
      </div>
      <div class="control-div">新&nbsp;&nbsp;密&nbsp;&nbsp;码
        <span class="controls">
          <input type="password"   name="for_password"><span>&nbsp;<font color="red">*</font></span>
        </span>
      </div>
      <div class="control-div">再次输入
        <span class="controls">
          <input type="password"   name="new_password"><span>&nbsp;<font color="red">*</font></span>
        </span>
      </div>
      <div class="controls">
        <button type="reset" class="but">重新输入</button>
        <button type="submit" class="but">确认修改</button>
      </div>
    </form>
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

<script type="text/javascript" src="/forum-system/Public/Forum/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
  $(function(){
  var thisTime;
  $('.nav-ul li').mouseleave(function(even){
      thisTime  = setTimeout(thisMouseOut,1000);
  })

  $('.nav-ul li').mouseenter(function(){
    clearTimeout(thisTime);
    var thisUB  = $('.nav-ul li').index($(this));
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