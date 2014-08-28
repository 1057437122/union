<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<link type="text/css" rel="stylesheet" href="<?php echo $base_url.'static/style.css';?>">

<!--
<link type="text/css" rel="stylesheet" href="<?php //echo $base_url.'static/admin/css/admin.css'?>">
<-->
<title>Zone 管理</title>

</head>
<body>

<div class="mainw">
<div class="header">
	<div class="nav">
		<ul>
			<li><a href="<?php echo $base_url; ?>index.php/zone">首页</a></li>
			<li><a href="<?php echo $base_url.'index.php/zone/chpasswd';?>">设置</a></li>
			<li><form action="<?php echo $base_url; ?>index.php/zone/search" ><input type="text" name="zone" /><input type="submit" value="搜索" /></form></li>
		</ul>
	</div><!-- nav-->
</div>
<div class="clear"></div>
<div class="main">

<div class="header">

</div>
<div  class="zones" >当前域名:<?php if(isset($zone)){echo $zone;}?></div>
<div class="clear"></div>