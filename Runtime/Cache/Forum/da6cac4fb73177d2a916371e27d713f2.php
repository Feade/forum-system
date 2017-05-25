<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="initial-scale=1,width=device-width,user-scalable=no"/>
  <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="/forum-system/Public/Forum/css/xq_navbar.css"/>
  <link rel="shortcut icon" href="/forum-system/Public/Forum/image/login.ico">
  <link rel="stylesheet" href="/forum-system/Public/Forum/css/xq.css"/>

  <link href="/forum-system/Public/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
  <script type="text/javascript" src="/forum-system/Public/umeditor/third-party/jquery.min.js"></script>
  <script type="text/javascript" charset="utf-8" src="/forum-system/Public/umeditor/umeditor.config.js"></script>
  <script type="text/javascript" charset="utf-8" src="/forum-system/Public/umeditor/umeditor.min.js"></script>
  <script type="text/javascript" src="/forum-system/Public/umeditor/lang/zh-cn/zh-cn.js"></script>
  <script src="/forum-system/Public/umeditor/third-party/mathquill/mathquill.min.js"></script>
  <link rel="stylesheet" href="/forum-system/Public/umeditor/third-party/mathquill/mathquill.css"/>

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
      background-color: #CCCCCC;
    }
    .item{
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
    .navigation{
      width: 80px;
      float: right;
    }
    .img-navigation{
      max-width: 100%;
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
    input[type="text"]{
      width: 500px;
      border-radius:4px; 
    }
    .control-div{
      color: #000000;
      margin-top: 20px;
      margin-left: 15%;
      max-width: 70%;
    }
    .controls{
      margin-left: 40px; 
    }
    .select-class{
      margin-left: 100px;
    }
    .btn{
      background-color: #999999;
      border-radius:4px;
      margin-top:20px;
      margin-left: 80%;
    }
    .editor{
      margin-top: 20px;
      margin-left: 50px;
      float: center;
    }
  </style>
  <title>新增主贴</title>
</head>
<body>
<br><br><br>
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

    <form action="<?php echo U('Forum/UserDetail/alterPost');?>?alter_main_num=<?php echo ($for_num); ?>" method="post" class="form-horizontal">
      <div class="control-div">标题
        <span class="controls">
          <input type="text"   name="for_title" value="<?php echo ($MainPost["for_title"]); ?>"><span>&nbsp;<font color="red">*</font></span>
          <span class="select-class">类别
           <span class="controls">
              <select  name="for_class" value="<?php echo ($MainPost["for_class"]); ?>">
                <option><?php echo ($MainPost["for_class"]); ?></option>
                <?php if(is_array($list)): foreach($list as $key=>$class): ?><option><?php echo ($class["for_class"]); ?></option><?php endforeach; endif; ?>
              </select>
            </span>
            <span>&nbsp;<font color="red">*</font></span>
          </span>
        </span>
      </div>
      <div class="control-div">内容
        <span class="controls">
          <div class="editor">
            <div><font color="blue" size="3">请开始你的表演! </font><font color="olive">(提示：数学公式不支持中文输入)</font></div>
            <script type="text/plain" id="myEditor" name="for_text" style="width:100%;height:80%;" >
              <div><?php echo ($MainPost["for_text"]); ?></div>
            </script>
          </div>
          
        </span>
      </div>
      <div class="controls">
        <button type="submit" class="btn btn-default btn-lg">确认修改</button>
      </div>
    </form>
  <script src="/forum-system/Public/Forum/js/xq_navbar.js"></script>
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
  <script type="text/javascript">
      //实例化编辑器
      var um = UM.getEditor('myEditor');

      //按钮的操作
    function showHint(str)
    {
      // var xmlhttp;
      // if (str.length==0)
      //   {
      //    $("form")="";
      //    return;
      //   }
      // if (window.XMLHttpRequest)
      //   
      // else
      //   
      // xmlhttp.onreadystatechange=function()
      // {
      //  if(xmlhttp.readyState==4 && xmlhttp.status==200)
      //     {
      //      $("form").before(xmlhttp.responseText);
      //     }
      // }
      // xmlhttp.open("POST","/forum-system/Public/umeditor/php/getContent.php?myEditor="+str,false);
      // xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
      // xmlhttp.send("myEditor="+str);
    };

    // $("#add").click(function(){
    //    var text=[];
    //    text.push(UM.getEditor('myEditor').getContent());

    //    showHint(text);
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

    // $("form").hide();


  </script>
</body>

</html>

<!-- 
<html>
<head>
	<title>主帖修改</title>
	
	<link href="/forum-system/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/forum-system/Public/css/bootstrap-responsive.min.css" rel="stylesheet">
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
	<style type="text/css">
		body{  
			margin-left:auto;  
			margin-right:auto; 
			margin-top:20PX; 
			width:80%;
			}
		span{
			color:red;
		}
	</style>
</head>
<body>
  <p id="userdetail"><a href="<?php echo U('Forum/MainPost/index');?>">返回论坛主页</a></p>
  <p id="userdetail"><a href="<?php echo U('Forum/UserDetail/index');?>">返回个人中心</a></p>
  <p id="logout"><a href="<?php echo U('Forum/Login/logout');?>">注销</a></p>
  <br><br>
<form action="<?php echo U('Forum/UserDetail/alterPost');?>?alter_main_num=<?php echo ($for_num); ?>" method="post" class="form-horizontal">

  <div class="control-group">
    <label class="control-label" >标题</label>
    <div class="controls">
      <input type="text"  readonly="ture" name="for_id" value="<?php echo ($MainPost["for_title"]); ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >类别</label>
  
    <div class="controls">
		<select name="for_class" value="<?php echo ($MainPost["for_class"]); ?>">
			<option></option>
			<?php if(is_array($list)): foreach($list as $key=>$class): ?><option><?php echo ($class["for_class"]); ?></option><?php endforeach; endif; ?>
		</select>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >内容</label>
    <div class="controls">
      <textarea rows="20" cols="100" name="for_text" value="<?php echo ($MainPost["for_text"]); ?>"></textarea><span>&nbsp* </span>
    </div>
  </div>

  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">修改</button>
    </div>
  </div>
</form>

</body>
</html> -->