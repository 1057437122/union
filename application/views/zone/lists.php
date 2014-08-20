<div class="meta">已经添加的ZONE</div>
<div class="r_op"><a href=<?php echo $base_url."index.php/zone/add";?>>添加ZONE </a></div>
<div class="clear"></div>
<hr>
<div class="clear"></div>

<?php

foreach($zones as $item){
	echo "<div class=\"zone\"><a href=".$base_url."index.php/zone/manage/".$item['zone'].">".$item['zone']."</a></div><div class='fl'><a href=".$base_url."index.php/zone/del/".$item['zone']." onclick=\"return confirm('确定删除".$item['zone']."')\">删除</a></div>
	<div class=\"bk\"></div>";
}
$is_first_page=FALSE;
$is_last_page=FALSE;
$pre_page=$cur_page-1;
if($pre_page<=-1){
	$is_first_page=TRUE;
}
$nxt_page=$cur_page+1;
if($nxt_page>=$max_page){
	$is_last_page=TRUE;
}
?>

<div class="pre_page" <?php if($is_first_page){echo 'style="display:none;';} ?>><a href="<?php echo $base_url.'index.php/zone/index/'.$pre_page;?>">上一页</a></div><div class="nxt_page" <?php if($is_last_page){echo 'style="display:none;';} ?>><a href="<?php echo $base_url.'index.php/zone/index/'.$nxt_page;?>">下一页</a></div>