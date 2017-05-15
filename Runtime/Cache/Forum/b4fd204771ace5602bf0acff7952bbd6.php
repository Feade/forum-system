<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title>
		html学习!
	</title>
</head>
<body bgcolor="#ffffff"> <!-- background="/tp3/Public/image/2.jpg" -->
<!--  -->

<!-- 图像的使用 -->
<img src="/tp3/Public/image/3.jpg" alt="图片" /><br />
<img src="/tp3/Public/image/timg.gif" alt="图片" /><br />
<!-- alt 属性提供 图片无法显示时或不存在时提供文字说明 -->
<img src="/tp3/Public/image/2.jpg" width="300px" height="300px" /><br />
设置图片对齐格式
<img src="/tp3/Public/image/1.jpg" width="300px" height="300px" align="bottom" />
以文字底部对齐<br />
设置图片<img src="/tp3/Public/image/1.jpg" width="200px" height="200px" align="middle" border="4px" hspace="60px" vspace="60px" />
<!-- 边框默认黑色h->水平间距v->垂直间距 -->
居中对齐<br />left、right、top<br />

<!-- 站外图片链接 -->
<a href="http://pic.pp3.cn/uploads//201609/2016092105.jpg">你说人生如梦<img src="/tp3/Public/image/2.jpg" width="50px" height="50px" align="top"  /></a><br />
<!-- 本地图片链接 -->
<a href="/tp3/Public/image/1.jpg">哪有什么不同<img src="/tp3/Public/image/1.jpg" width="50px" height="50px" align="left" />
</a><br /><br /><br /><br />
<!-- 图像热点区域 -->
<img src="/tp3/Public/image/1.jpg" width="=300px" height="300px" usemap="#map1" />
<map name="map1">
	<area shape="rect" coords="20,30,250,250" href="/tp3/Public/image/1.jpg" target="_blank" >
</map><!-- 矩形热点区域 -->
<br />
<img src="/tp3/Public/image/2.jpg" width="=300px" height="300px" usemap="#map2" />
<map name="map2">
	<area shape="circle" coords="150,150,100" href="/tp3/Public/image/2.jpg" target="_blank" >
</map><!-- 椭圆热点区域 -->
<br />
<img src="/tp3/Public/image/3.jpg" width="=300px" height="300px" usemap="#map3" />
<map name="map3">
	<area shape="poly" coords="50,10,250,10,50,250" href="/tp3/Public/image/3.jpg" target="_blank" >
</map><!-- 多边形热点区域 -->
<img name="null_image" src="" width="250" height="150" background-color="#CCCCCC" / ><!-- 图像占位符 -->
<!-- 插入视频 -->
<img dynsrc="" /> 


<br />
<!-- 超链接 -->
<a href="test01.html" target="_self">链接到test01.html</a><br /><!-- 链接到同级目录,默认打开为_self当前窗口打开 -->
<a href="test/hello.html" target="_blank">链接到hello.html</a><br /><!-- 链接到下级目录，新窗口打开 -->
<a href="../edu_manage.txt" target="_top">链接到edu_manage.txt</a><br/><!-- 链接到上级目录，整个（顶层）窗口打开 -->
<a href="http://www.sohu.com/" target="_parent">链接到搜狐网</a><br />
<a href="http://www.baidu.com" target="_blank">百度一下</a><br /><!-- 新页面打开链接，父窗口打开 -->
<a href="#name1">链接本页一首诗</a>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<a name="name1">满江红</a><br/>
<pre>
	怒发冲冠，凭阑处、潇潇雨歇。
	抬望眼、仰天长啸，壮怀激烈。
	三十功名尘与土，八千里路云和月。
	莫等闲，白了少年头，空悲切。
	靖康耻，犹未雪；臣子恨，何时灭。
	驾长车，踏破贺兰山缺。
	壮志饥餐胡虏肉，笑谈渴饮匈奴血。
	待从头、收拾旧山河，朝天阙。
</pre>



<!-- 逻辑样式 浏览器自己理解标签意思 -->
<samp>同宽显示，区别tt<tt>等宽显示</tt>,它遵循输入的文本格式</samp><br/>
<var>变量名称</var><br/><!-- 效果同<i></i>较少用 -->
<cite>文献参考标签，一般也为斜体</cite><br/>
<small>根据浏览器设置小号字体</small><br/>
<big>根据浏览器设置大号字体</big><br/>
<!-- 物理样式 -->
<br/>
<span title="谁主沉浮！">问苍茫大地</span><!-- 内联行，结合CSS -->
<font size="2">设置字体大小<br/>为2</font><br/>
<b>加粗文字</b><br/>
<i>斜体文字</i><br/>
<b><i>斜体加粗文字</i></b><br/>
<u>使用下划线</u><br/>
<ins cite="原文档或信息链接" datetime="20170106">标记文字</ins><br/><br/>
<del>标记删除文字，默认加删除线</del><br/>
<s>文字加删除线，效果同del，定义不同</s><br/>
<tt>等宽字体效果</tt><br/>
上标<sup>上标效果</sup><br/>
下标<sub>下标效果</sub><br/>
12<sup>2</sup>=144<br/>
<p>
江山易改，本性难移。
<br/> <!-- 换行-->
<hr width="300px" align="left" />  <!-- 水平分割线-->
<font face="宋体">设置字体<br/>为宋体</font><br/><hr width="500px" size="5px" align="center" />
<hr width="300px" size="8px" align="right" /> 
<font face="黑体">设置字体<br/>为黑体</font><br/>
<hr color="#ff0000" /><!-- 添加红色水平分割线 -->
<hr size= "8px" />
<hr size="8px" noshade /> <!-- 无阴影水平分割线 -->
hello world!
<blockquote>设置文本缩进效果</blockquote>
<blockquote><blockquote>设置文本
缩进效果
</blockquote></blockquote>
<pre>
	设置代码里的空格
	和换行
</pre>
<h1>标题1</h1>
<h3>标题3</h3>
<h2>标题2</h2>
</p>
hello world!
</body>
</html>