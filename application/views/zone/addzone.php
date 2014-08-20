<?php
/*page to add questions to the database
*
*
*/
?>
<?php echo validation_errors(); ?>

<?php echo form_open('zone/add') ?>

	<label for="name">域名</label>
	<input type="input" name="name" /><br />
	
	<input type="submit" name="submit" value="添加" />
</form>
