<?php 
/*
list the records of the zone and manage them
*/
?>
<div id="addrcd" class="op" onclick="addRcds();">添加纪录</div>
<div class="records">
<table>
	<thead>
		<tr>
			<th id="" class="rcdname">
			<span data-key="sub_domain" data-order="asc" class="order_key">主机记录</span>
			</th>

			<th id="" class="rcdtype" >
			<span data-key="record_type" data-order="asc" class="order_key">记录类型</span>
			</th>

			<th id="" class="rcddata" >
			<span data-key="value" data-order="asc" class="order_key">记录值</span>
			</th>

			<th id="" class="priority" >
			<span data-key="mx" data-order="asc" class="order_key">MX优先级</span>
			</th>

			<th id="" class="ttl" >
			<span data-key="ttl" data-order="asc" class="order_key">TTL</span>
			</th>

			<th id="" class="operator" >
			<span class="">操作</span>
			</th>

		</tr>
	</thead>               
</table>
</div><!-- records-->
<?php 
foreach($recrds as $recrd){
?>
<div class="records">
<table>
	<thead>
		<tr id="rcdbody" >
			
			<th id="" class="rcdname" >
			<span data-key="sub_domain" data-order="asc" class="order_key"><?php echo $recrd['host'];?></span>
			</th>

			<th id="" class="rcdtype" >
			<span data-key="record_type" data-order="asc" class="order_key"><?php echo $recrd['type'];?></span>
			</th>


			<th id="" class="rcddata" >
			<span data-key="value" data-order="asc" class="order_key"><?php echo $recrd['data'];?></span>
			</th>

			<th id="" class="priority" >
			<span data-key="mx" data-order="asc" class="order_key"><?php echo $recrd['mx_priority'];?></span>
			</th>

			<th id="" class="ttl" >
			<span data-key="ttl" data-order="asc" class="order_key"><?php echo $recrd['ttl'];?></span>
			</th>

			<th id="" class="operator" >
			<?php if($recrd['c_chg']){?>
			<?php if($recrd['is_active']=='1'){  $setop='暂停' ;}else{ $setop='启用';}?>
			<span class=""><a href="<?php echo $zone;?>/pause/<?php echo $recrd['id'].'/'.$recrd['is_active'];?>" onclick="return confirm('确定<?php echo $setop;?>此记录？')"><?php echo $setop;?></a>&nbsp;&nbsp;<a href="<?php echo $zone;?>/del/<?php echo $recrd['id'];?>" onclick="return confirm('确定要删除此记录？')">删除</a>&nbsp;&nbsp;<a href="<?php echo $zone;?>/edit/<?php echo $recrd['id'];?>">编辑</a></span>
			<?php }else{?>
			<?php }?>
			</th>

		</tr>
	</thead>               
</table>
</div><!-- records-->
<?php
}
?>
<script type="javascript">
	
</script>