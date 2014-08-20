<?php
/*page to add questions to the database
*
*
*/
?>
<div class="clear"></div>
<div class="met">域名不能为空，搜索主机记录模糊值或者记录值为相应值的结果</div>
<?php echo validation_errors(); ?>

<?php echo form_open('zone/search') ?>

	
	
	<div class="box">
	<div class="label"><label for="zone">域名</label></div>
	<div class="ipt"><input type="input" name="zone" /><br /></div>
	</div><!--box-->
	
	<div class="box">
	<div class="label"><label for="data">记录值</label></div>
	<div class="ipt"><input type="input" name="data" /><br /></div>
	</div><!--box-->
	
	<input type="submit" name="submit" value="搜索" />
</form>
