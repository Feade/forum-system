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


/*    input[type="text"],.but{
      border-radius:4px; 
    }*/
    .control-div{
      color: #66FFCC;
      margin-top: 20px;
      width: 500px;
    }
    .controls{
      /*align-self: left;*/
      margin-left: 80px; 
    }
    .file{
      color: #66CCFF;
      margin-left: 140px; 
    }    
    input,select{
      color: black;
      border-radius:5px; 
      width: 300px;
      height: 30px;
      margin-top: 15px;
    }
    .but{
      border-radius:5px; 
      width: 100px;
      height: 35px;
      margin-top: 30px;
      margin-left: 70px;
    }
  </style>
  <title>个人信息修改</title>

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

<div class="wrap">
  <div   class="ue-sidenav">
    <form action="<?php echo U('Forum/UserDetail/modify');?>" method="post" class="form-horizontal" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm();">

        <div class="control-div">论坛账号
          <span class="controls">
            <input type="text" class="input-g" readonly="ture" name="for_id" value="<?php echo ($ID); ?>">
          </span>
        </div>

        <div class="control-div">昵&#12288;&#12288;称
          <span class="controls">
            <input type="text" class="input-g"  name="for_name" value="<?php echo ($UserDetail["for_name"]); ?>"><span>&nbsp;<font color="red">*</font></span>
          </span>
        </div>

        <div class="control-div">性&#12288;&#12288;别
          <span class="controls">
            <select name="for_sex" value="<?php echo ($UserDetail["for_sex"]); ?>" class="select-g">
              <option><?php echo ($UserDetail["for_sex"]); ?></option>
              <option>男</option>
              <option>女</option>
            </select>
          </span>
        </div>

        <div class="control-div">微&#12288;&#12288;信
          <span class="controls">
            <input type="text" class="input-g" name="for_wechat" value="<?php echo ($UserDetail["for_wechat"]); ?>">
          </span>
        </div>
        
        <div class="control-div">Q&#12288;&#12288;&ensp;Q
          <span class="controls">
            <input type="number" class="input-g" name="for_qq" value="<?php echo ($UserDetail["for_qq"]); ?>">
          </span>
        </div>

        <div class="control-div">电&#12288;&#12288;话
          <span class="controls">
            <input type="number" class="input-g" name="for_tel" value="<?php echo ($UserDetail["for_tel"]); ?>">
          </span>
        </div>

        <div class="control-div">邮&#12288;&#12288;箱
          <span class="controls">
            <input type="text" class="input-g" name="for_email" value="<?php echo ($UserDetail["for_email"]); ?>">
          </span>
        </div>

        <div class="control-div">家&#12288;&#12288;乡
          <span class="controls">
            <input type="text" class="input-g" name="for_hometown" value="<?php echo ($UserDetail["for_hometown"]); ?>">
          </span>
        </div>

        <div class="control-div">星&#12288;&#12288;座
          <span class="controls">
            <select name="for_constellation" value="<?php echo ($UserDetail["for_constellation"]); ?>" class="select-g">
              <option><?php echo ($UserDetail["for_constellation"]); ?></option>
              <option>白羊座</option>
              <option>金牛座</option>
              <option>双子座</option>
              <option>巨蟹座</option>
              <option>狮子座</option>
              <option>处女座</option>
              <option>天秤座</option>
              <option>天蝎座</option>
              <option>射手座</option>
              <option>摩羯座</option>
              <option>水瓶座</option>
              <option>双鱼座</option>
            </select>
          </span>
        </div>

        <div class="control-div">个性签名
          <span class="controls">
          <textarea rows="5" cols="40" maxlength="30" name="for_signature" style="border-radius: 5px;"><?php echo ($UserDetail["for_signature"]); ?></textarea>
          </span>
        </div>

        <div class="control-div">上传头像
          <span class="controls">
            <input type="file" class="file" name="for_head" value="<?php echo ($UserDetail["for_head"]); ?>" style="width: 300px;">
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
<!-- 表格验证 -->
  <script type="text/javascript">
    function validateForm()
    {
      var x1=document.forms["myForm"]["for_name"].value;
      if (x1==null || x1=="")
      {
        alert("昵称必须填写！");
        return false;
      }
      else if(x1.length>20)
      {
        alert("昵称超过20个字符！");
        return false;
      }
      var x2=document.forms["myForm"]["for_wechat"].value;
      if (x2.length > 30)
      {
        alert("微信号超过30个字符！");
        return false;
      }
      var x3=document.forms["myForm"]["for_qq"].value;
      var x3len=x3.length;
      if ( !isNaN(x3) && x3len > 4 && x3len < 15){}
      else if(x3len==0){}
      else
      {
        alert("请输入5-15位有效QQ号！");
        return false;
      }
      var x4=document.forms["myForm"]["for_tel"].value;
      if(x4.length!=0)
      {
        if(x4.length!=11)
        {   
          alert("请输入11位有效电话号码！");
          return false;
        }
      }
      var x=document.forms["myForm"]["for_email"].value;
      if( x.length!=0)
      {
        var atpos=x.indexOf("@");
        var dotpos=x.lastIndexOf(".");
        if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length){
          alert("不是一个有效的 e-mail 地址");
            return false;
        }
      }
      var x5=document.forms["myForm"]["for_signature"].value;
      if(x5.length!=0 && x5.length>30)
      {
        alert("个性签名超过30个字符！");
        return false;
      }
    }
  </script>
</body>
</html>