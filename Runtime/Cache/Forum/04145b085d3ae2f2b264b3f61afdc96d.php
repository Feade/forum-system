<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
    <title>后台管理框架</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/forum-system/Public/css/admin.css">
    <script type="text/javascript" src="/forum-system/Public/js/admin.js"></script>
    <style type="text/css">
        
        body{
            width: 500px；
            margin:auto;
        }
        .leftnav{
            width: 18%;
            float:left;
        }
        .right{               	
            width: 82%;
            height: 600px;
            float: left;
            padding: 20px;
        }
        .body{
            width:80%;
            margin:auto;
/*          position:relative; 
            top:-20px;*/
        }
        .leftnav a{
            color:black;
        }
        .leftnav ul{
            display: none;
        }
        .nav-pills>li.active>a,.nav-pills>li.active>a:focus,.nav-pills>li.active>a:hover {
            color: #14ac6d;
            background-color: #eee;
        }
        .navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.active>a:focus, .navbar-inverse .navbar-nav>.active>a:hover
        {
            color: #14ac6d;
            background-color: #080808;
        }
        #welcome{
            position: absolute;
            right:70px;
        }
        #logout
        {
            position: absolute;
            right: 10px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-inverse" role="navigation">
   <div class="navbar-header">
      <a class="navbar-brand" href="#">&nbsp 教务系统后台管理</a>
   </div>
  
      <ul class="nav navbar-nav">
         <li class="active"><a href="#">管理员管理</a></li>
         <li><a href="#">教师管理</a></li>
         <li><a href="#">学生管理</a></li>
         <li><a href="#">课程管理</a></li>
         <li><a href="#">专业管理</a></li>
         <li><a href="#">系统设置</a></li>
         <li id="welcome"><a>欢迎：<?php echo (session('name')); ?></a></li>
         <li id="logout"><a href="<?php echo U('Forum/Adm/logout');?>">注销</a></li>   
      </ul>
</nav>
<div class="body">
    

    <div class="leftnav">
         
        <ul class="nav1 nav nav-pills nav-stacked" style="display: block;">
        
            <li <?php if(D("Adm")->checkPermission()) echo "style='display:none'";?>><a class="a_first" href="<?php echo U('Forum/Adm/searchUser');?>" target="right_content">修改管理员</a></li>
            <li <?php if(D("Adm")->checkPermission()) echo "style='display:none'";?>><a href="<?php echo U('Forum/Adm/addUser');?>" target="right_content">添加管理员</a></li>
    
            <li><a href="<?php echo U('Forum/Adm/showPersonInfo');?>" target="right_content">修改个人信息</a></li>
            <li><a href="<?php echo U('Forum/Adm/showAll');?>" target="right_content">显示所有管理员</a></li>

        </ul>
        
        <ul class="nav2 nav nav-pills nav-stacked">
            <li><a class="a_first" href="<?php echo U('Admin/Teacher/searchTeacher');?>" target="right_content">修改教师</a></li>
            <li><a href="<?php echo U('Admin/Teacher/AddTeacher');?>" target="right_content">添加教师</a></li>
        </ul>
        <ul class="nav3 nav nav-pills nav-stacked">
            <li><a class="a_first" href="<?php echo U('Admin/Students/searchStudent');?>" target="right_content">修改学生</a></li>
            <li><a href="<?php echo U('Admin/Students/addStudent');?>" target="right_content">添加学生</a></li>
            <li><a href="welcome1.html" target="right_content">修改成绩</a></li>

        </ul>
        <ul class="nav4 nav nav-pills nav-stacked">
            <li><a class="a_first" href="<?php echo U('Admin/Course/searchCourse');?>" target="right_content">修改课程</a></li>
            <li><a href="<?php echo U('Admin/Course/addCourse');?>" target="right_content">添加课程</a></li>
            <li><a href="<?php echo U('Admin/Courseson/addCourseson');?>" target="right_content">添加子课程</a></li>
            
        </ul>
        <ul class="nav5 nav nav-pills nav-stacked">
            <li><a class="a_first" href="welcome1.html" target="right_content">修改专业</a></li>
            <li><a href="welcome1.html" target="right_content">添加专业</a></li>
            
        </ul>

        <ul class="nav6 nav nav-pills nav-stacked">
            <li><a class="a_first" href="welcome1.html" target="right_content">发布考试信息</a></li>
            <li><a href="welcome1.html" target="right_content">设置选课时间</a></li>
            <li><a href="welcome1.html" target="right_content">查看系统日志</a></li>

        </ul>
    </div>

 <!--    <div class="right">
        <iframe id="content-iframe" src="welcome1.html" frameborder="0" width="100%" height="100%" name="right_content" scrolling="auto" frameborder="0" scrolling="no"></iframe>
</div> -->

</body>
</html>