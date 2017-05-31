<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="initial-scale=1,width=device-width,user-scalable=no"/>
  <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="shortcut icon" href="/forum-system/Public/Forum/image/login.ico">
  <link href="/forum-system/Public/Forum/Css/mypage.css" rel="stylesheet" type="text/css"/>

  <link rel="stylesheet" href="/forum-system/Public/Forum/css/xq_navbar.css"/>
  <link rel="stylesheet" href="/forum-system/Public/Forum/css/xq.css"/>
  <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="http://cdn.static.runoob.com/libs/jquery/1.10.2/jquery.min.js"></script>
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
          background-image: url(/forum-system/Public/Forum/image/timg.jpg);
          background-repeat: no-repeat;
          background-size: 100% 100%;
          margin-left:auto;
          margin-right:auto;
          margin-top:20PX;
          width:90%;
          min-height: 1000px;
    }
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
      max-height: 50px;
      margin:20px auto 20px auto;
      box-shadow: 0 0 5px #e4e6e8;
      padding: 10px;
      position: relative;
      width: 600px;
      height: 120px;
      margin-bottom: 20px;

    }
   
    .item:hover{
      box-shadow: 0 0 5px #c2c2c2;
    }
    .navigation{
      left: 95%;
      top: 55px;
      width: 80px;
      float: right;
    }
    #flip{
      position: fixed;
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
/*    form{
      position: absolute;
    }*/
    .btn{
      position: absolute;
      height: 30px;
      width: 50px;
      left: 1310px;
      border-radius: 5px;
    }
    .input-g{
      position: absolute;
      height: 30px;
      width: 300px;
      left: 1000px;
      border-radius: 5px;
    }
    .show-text{
        position: relative;
        display: none;
        width: 70%;
        padding: 10px;
        background-color: #CCFFFF;
        z-index: 10;
        font-size: 20px;
        margin-left: 15%;
        box-shadow: 0 0 5px #e4e6e8;
      }
      .show-text:hover{
        box-shadow: 0 0 5px #c2c2c2;
      }
  </style>
  <title>通告</title>
</head>
<body>
<a href="<?php echo U('Forum/MainPost/moreSearch');?>"><button class="btn" style="position: fixed;top: 100px;left: 90%; width: 80px;height: 30px;">
    高级搜索
  </button></a>
  <div  style="position: fixed;top: 55px;left: 80%; width: 100px;height: 30px;">
    <form action="<?php echo U('Forum/MainPost/searchMain');?>" method="post" name="myForm" onsubmit="return validateForm();">
      <input type="text" name="for_title"  placeholder="搜索主贴">
      <button type="submit" class="btn" style="position: fixed;top: 55px;left: 90%; width: 80px;height: 30px;">搜索</button>
    </form>
  </div>

  <form action="<?php echo U('forum/MainPost/searchCircular');?>" method="post" class="form-search" name="myForm" onsubmit="return check_form('myForm','for_title');" style="margin-top: 55px;margin-left: 50%;">
    <span class="input-search">
      <input type="text" name="for_title" placeholder="请输入通告标题关键词">
      <button type="submit" class="btn" style="position: relative;left: 10px; width: 80px;height: 25px;">搜索</button>
    </span>
  </form>
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

  <div class="xq_bag nav" id="bar3">
    <ul class="xq_navbar">
      <?php if(is_array($list)): foreach($list as $key=>$it): ?><li class="xq_navli"><a href="<?php echo U('Forum/MainPost/order');?>?for_class=<?php echo ($it["for_class"]); ?>"><?php echo ($it["for_class"]); ?></a></li><?php endforeach; endif; ?>
    </ul>
  </div>



    <div class="item" id="first-item">
      <div class="title" onclick="show_form('#div_<?php echo ($circular["for_num"]); ?>')">
        <a title="点击查看详细" ><?php echo ($circular["for_title"]); ?></a>
      </div>
      <div class="feed-meta">

        <span><?php echo ($circular["for_time"]); ?></span>
      </div>
      <div id="div_<?php echo ($circular["for_num"]); ?>" class="show-text">&#12288;&#12288;<?php echo ($circular["for_text"]); ?></div>
    </div>

  <div style="margin-left: 15%;margin-top: 10px;" id="pageBar"><?php echo ($page); ?></div>

        <script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
        <script src="/forum-system/Public/Forum/js/xq_navbar.js"></script>
        <script>
          $(function(){
            $("#bar1").xq_navbar({"type":"underline","liwidth":"auto","bgcolor":"#000","hcolor":"#f0f"});
            $("#bar2").xq_navbar({"type":"beat","liwidth":"avg","bgcolor":"#000","hcolor":"#f0f"});
            $("#bar3").xq_navbar({"type":"line","liwidth":"avg","bgcolor":"#000"});
            $("#bar4").xq_navbar({"type":"overline","liwidth":"120","bgcolor":"#000"});
            $("#bar5").xq_navbar({"type":"block","liwidth":"avg","bgcolor":"#000","hcolor":["blue","rgb(10;,100,100)","red","pink","green","rgba(23,234,22,1)","rgb(230,230,230)"]});
          });
      function show_form(what){
        // $(what).show();
        $(what).toggle();
      };
        </script>
        <script type="text/javascript">
          function validateForm()
          {
            var x1=document.forms["myForm"]["for_title"].value;
            if (x1==null || x1=="")
            {
              alert("搜索内容不能为空！");
              return false;
            }
          }
        </script>
      </body>

      </html>