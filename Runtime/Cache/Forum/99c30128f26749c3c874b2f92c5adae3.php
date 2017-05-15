<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="/tp3/Public/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">

  <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/tp3/Public/umeditor/third-party/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/tp3/Public/umeditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/tp3/Public/umeditor/umeditor.min.js"></script>
    <script type="text/javascript" src="/tp3/Public/umeditor/lang/zh-cn/zh-cn.js"></script>
  <script src="/tp3/Public/umeditor/third-party/mathquill/mathquill.min.js"></script>
  <link rel="stylesheet" href="/tp3/Public/umeditor/third-party/mathquill/mathquill.css"/>

  <title>添加主题帖</title>
  <style type="text/css">
    body{
      width:80%;
      margin: auto;
      margin-top:50px;
    }

    .item{
      border: 1px solid #999;
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
      float: left;
      height: 100%;
      width: 100px;

    }
    .auctor{
      margin-left: 100px;
      margin-top: 20px;
      margin-right: 20px;

    }
    .fede-mete{

      margin-left: 100px;
      margin-right: 10px;
      float: right;
      bottom:15px;
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
  </style>
</head>
<body>
  <p id="userdetail"><a href="<?php echo U('Forum/MainPost/index');?>">返回论坛主页</a></p>
  <p id="userdetail"><a href="<?php echo U('Forum/UserDetail/index');?>">个人中心</a></p>
  <p id="logout"><a href="<?php echo U('Forum/Login/logout');?>">注销</a></p>
  <form action="<?php echo U('Forum/MainPost/addMain');?>" method="post" class="form-horizontal">

    <div class="control-group">
      <label class="control-label" >标题</label>
      <div class="controls">
        <input type="text"   name="for_title" value="<?php echo ($result["for_title"]); ?>"><span>&nbsp* </span>
      </div>
    </div>


    <div class="control-group">
      <label class="control-label" >类别</label>
      <div class="controls">
        <select  name="for_class" value="<?php echo ($result["for_class"]); ?>"><span>&nbsp* </span>
          <?php if(is_array($list)): foreach($list as $key=>$class): ?><option><?php echo ($class["for_class"]); ?></option><?php endforeach; endif; ?>
        </select>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" >内容</label>
      <div class="controls">
        <script type="text/plain" id="myEditor" name="for_text" style="width:100%;height:240px;" >
          <p>请使用英文状态输入公式！</p>
        </script>
      </div>
    </div>

    <div class="control-group">
      <div class="controls">
        <button type="submit" class="btn">添加</button>
      </div>
    </div>
  </form>

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
      // xmlhttp.open("POST","/tp3/Public/umeditor/php/getContent.php?myEditor="+str,false);
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