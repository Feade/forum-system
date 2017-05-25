<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <title>通告页面</title>
  <link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>

    <style type="text/css">

    body{
        background-image: url(/forum-system/Public/Forum/image/timg.jpg);
        background-repeat: no-repeat;
        background-size: 100% 100%;
        margin-left:auto;
        margin-right:auto;
        margin-top:20PX;
        width:90%;
        height: 1000px;
      }
      .item{
        margin:20px auto 20px auto;
        box-shadow: 0 0 5px #e4e6e8;
        padding: 10px;
        position: relative;
        width: 70%;
        height: 100px;
        margin-bottom: 20px;

      }
      #first-item{
        margin-top: 30px;
      }
      .title{
        font-size: 20px;
        margin-left: 100px;
        /*padding-left: 30px;*/
        padding-top: 5px;
        height: 50px;

      }
      .item:hover{
        box-shadow: 0 0 5px #c2c2c2;
      }
      .feed-meta{
        float: right;
        height: 20px;
        bottom:15px;
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
/*      .btn{
        margin-top: -60px;
        height: 35px;
        margin-left: 58%;
      }*/
      input{
        height: 40px;
        margin-left: 47%;
        border-radius: 5px;
      }
      a{
        color: #330099;
      }
      .myForm{
        position: absolute;
        right: 10%;
        /*top: 20%;*/
        display: none;
      }
      .modify{
        position:relative;
        z-index: 10;
        margin-top: -50px;
      }
    </style>
</head>
<body>
  <form action="<?php echo U('forum/Adm/searchCircular');?>" method="post" class="form-search" name="myForm" onsubmit="return check_form('myForm','for_title');">
    <span class="input-search">
      <input type="text" name="for_title" placeholder="请输入通告标题关键词">
      <button type="submit" class="btn">Search</button>
    </span>
  </form>
    <div style="margin-left: 80%;" onclick="show_form('#myform_addCircular')"><a style="background-color: white;"><font style="color: green;">新增通告</font></a></div>

  <?php if(is_array($circular)): foreach($circular as $key=>$cir): ?><div class="item" id="first-item">
      <div class="title" onclick="show_form('#div_<?php echo ($cir["for_num"]); ?>')">
        <a title="点击查看详细" ><?php echo ($cir["for_title"]); ?></a>
      </div>
      <div class="feed-meta">

        <span><?php echo ($cir["for_time"]); ?></span>
        <span><?php echo ($cir["adm_name"]); ?></span>
        <span><a href="<?php echo U('Forum/Adm/deleteCircular');?>?for_num=<?php echo ($cir["for_num"]); ?>"><font color="red">删除</font></a></span>
        <span onclick="show_form('#myform_<?php echo ($cir["for_num"]); ?>')"><font color="blue">修改</font></span>

        <form id="myform_<?php echo ($cir["for_num"]); ?>" class="myForm" action="<?php echo U('Forum/Adm/modifyCircular');?>" method="post"  name="myForm-<?php echo ($cir["for_num"]); ?>" onsubmit="return check_form('myForm-<?php echo ($cir["for_num"]); ?>','for_title');" style="margin-left: 10px;">
          <div class="modify">
            <input style="display: none;" name="for_num" value="<?php echo ($cir["for_num"]); ?>">
            <input type="text" name="for_title" value="<?php echo ($cir["for_title"]); ?>" style="width: 300px;"><font color="blue">标题</font>
            <textarea name="for_text" rows="8" cols="150" style="margin-left: 200px;margin-top: 20px;border-radius: 5px;"><?php echo ($cir["for_text"]); ?></textarea>
            <br>
            <button type="submit" class="btn" style="float: right;">确认修改</button>
          </div>
        </form>
      </div>
      <div id="div_<?php echo ($cir["for_num"]); ?>" class="show-text">&#12288;&#12288;<?php echo ($cir["for_text"]); ?></div>
    </div><?php endforeach; endif; ?>

    <!-- <div style="margin-left: 80%;" onclick="show_form('#myform_addCircular')"><a style="background-color: white;">新增通告</a></div> -->
    <form id="myform_addCircular" class="myForm" action="<?php echo U('Forum/Adm/Circular');?>" method="post" name="myForm-add" onsubmit="return check_form('myForm-add','for_title');" style="margin-top: 10px;">
        <input type="text" name="for_title" placeholder="请输入通告标题" style="width: 300px;">标题
        <textarea rows="8" cols="150" name="for_text" placeholder="通告内容" style="margin-left: 500px;margin-top: 10px;border-radius: 5px;"></textarea>
      <button type="submit" class="btn" style="margin-left: 80%;">确认添加</button>
    </form>
  <div style="margin-left: 15%;margin-top: 10px;" id="pageBar"><?php echo ($page); ?></div>

    <script type="text/javascript">
      function show_form(what){
        // $(what).show();
        $(what).toggle();
      };
      // $(".myForm").hide();
      function check_form(formname,name){
        var x1=document.forms[formname][name].value;
        if (x1==null || x1=="")
        {
          alert("输入内容为空！");
          return false;
        }
      }
    </script>

</body>
</html>