<div class=box>
	<?php echo validation_errors(); ?>

	<?php echo form_open('/zone/chpasswd') ?>
		<div class="loginbox">
			<div class="ofh">
				<div class="lft"><label width="100px" for="odpasswd">原密码<label></div>
				<div class=""><input type="password" name="odpasswd"></div>
			</div><!--username-->
			<div class="ofh">
				<div class="lft"><label width="100px" for="passwd">新密码<label></div>
				<div class=""><input type="password" name="passwd"></div>
			</div><!--username-->
			<div class="ofh">
				<div class="lft"><label  width="100px" for="repasswd">再输入一遍密码：<label></div>
				<div class=""><input type="password" name="repasswd"></div>
			</div><!--passwd-->
			<div class="sbmt"><input type="submit" name="submit" value="提交" /></div>
		</div><!--login box-->
	</form>
</div><!--box-->