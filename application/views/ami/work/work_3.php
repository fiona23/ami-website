<!--
<?php if ($wrong_pass == TRUE) :?>
<h3>Password error,type again.</h3>
<?php endif ?>
-->
<div class="workspace change-password" id="change-password">
	<form action="http://localhost/index.php/ami_work/changePassword" method="post" >
<div class="form-group">
	<label for="" class="col-sm-2 control-label">原密码</label>
	<div class="col-sm-10">
	<input class="form-control" type="password" name="old" value="" />
	</div>
</div>
	
<div class="form-group">
	<label for="" class="col-sm-2 control-label">新密码</label>
	<div class="col-sm-10">
	<input class="form-control" type="password" name="new" value="" />
	</div>
</div>

<div class="form-group">
	<label for="" class="col-sm-2 control-label">确认密码</label>
	<div class="col-sm-10">
	<input class="form-control" type="password" name="comfirmed" value="" />
	</div>
</div>



<input type="submit" value="保存" /><br />
</form>
</div>

