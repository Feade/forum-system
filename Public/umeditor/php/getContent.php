
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<?php

    //获取数据
    error_reporting(E_ERROR|E_WARNING);
     $content =  $_POST['myEditor'];
    // htmlspecialchars_decode($content)
    //存入数据库或者其他操作

    //显示
    echo  "<div class='content'>".$content."</div>";
