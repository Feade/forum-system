<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title>html学习备份</title>
</head>
<body bgcolor="#ffffff">

<!-- 超链接 -->
<a href="test.html">链接到test.html</a><br />
<a href="test/hello.html">链接到hello.html</a><br />

<a href="#name1">链接本页一首诗</a><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
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