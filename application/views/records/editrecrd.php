<?php
/*
*
*
*/
?>
<?php echo validation_errors(); ?>

<?php echo form_open("zone/manage/$zone/edit/$id") ?>

	<div class="label"><label for="name">域名</label></div>
	<div class="clear"></div>
	
	<div class="box">
		<div class="label"><label for="host">主机记录</label></div>
		<div class="ipt"><input type="input" name="host" value="<?php echo $info['host'];?>"/></div>
	</div><!--box-->
	
	<div class="box">
	<div class="label"><label for="type">记录类型</label></div>
	<div class="ipt">
	<select name="type">  
	  <option  value="A">A</option>  
	  <option  value="NS">NS</option>  
	  <option  value="CNAME">CNAME</option>  
	  <option  value="AAAA">AAAA</option>  
	</select>  
	</div>
	</div><!--box-->
	
	<div class="box">
	<div class="label"><label for="data">记录值</label></div>
	<div class="ipt"><input type="input" name="data" value="<?php echo $info['data'];?>"/></div>
	</div><!--box-->
	
	<div class="box">
	<div class="label"><label for="mx_priority">MX优先级</label></div>
	<div class="ipt"><input type="input" name="mx_priority" value="<?php echo $info['mx_priority'];?>"></div>
	</div><!--box-->
	
	<div class="box">
	<div class="label"><label for="ttl">TTL</label></div>
	<div class="ipt"><input type="input" name="ttl" value="<?php echo $info['ttl'];?>"></div>
	</div><!--box-->
	
	<div class="sbmt"><input type="submit" name="submit" value="提交" /></div>
</form>
