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
<?php if(!isset($noshowsearch)){?>
<div class="r_op"><a href=<?php echo $base_url.'index.php/zone/search';?>>&nbsp;&nbsp;我要搜索</a></div>
<?php }?>
<div class="r_op"><a href=<?php echo $base_url.'index.php/zone/chpasswd';?>>&nbsp;&nbsp;修改登录密码</a></div>
<div class="header">

<?php if(!isset($noshowindex)){?>
	<div class="index"><a href=<?php echo $base_url.'index.php/zone';?>>返回首页</a></div>
<?php }?>
</div>
<div  class="zones" ><?php if(isset($zone)){echo $zone;}?></div>
<div class="clear"></div>