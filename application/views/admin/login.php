<div class=box>
	<?php echo validation_errors(); ?>

	<?php echo form_open('/login') ?>
		<div class="loginbox">
			<div class="ofh">
				<div class="lft"><label width="100px" for="username">登录名：<label></div>
				<div class=""><input type="input" name="username"></div>
			</div><!--username-->
			<div class="ofh">
				<div class="lft"><label  width="100px" for="passwd">密码：<label></div>
				<div class=""><input type="password" name="passwd"></div>
			</div><!--passwd-->
			<div class="sbmt"><input type="submit" name="submit" value="提交" /></div>
		</div><!--login box-->
	</form>
</div><!--box-->