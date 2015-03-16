
<div id="change-info" class="workspace change-info">
	<?php if ( isset($para) ) : ?>
	<h1><?php echo $para;?></h1>
	<?php endif ?>

	<form action="http://localhost/index.php/ami_work/completeInfo" method="POST" >

	<div class="form-group">
		<label for="" class="col-sm-2 control-label" >用户名</label>
		<div class="col-sm-10">
		<input class="form-control" type="text" name="name" value="<?php echo $name;?>" />
		</div>
	</div>

	<div class="form-group">
		<label for="" class="col-sm-2 control-label">邮箱</label>
		<div class="col-sm-10">
		<input class="form-control email" type="text" name="email" value="<?php echo $email;?>" />
		<p class="error-info">不合法的邮箱地址</p>
		</div>
	</div>
	
	<div class="form-group">
		<label for="" class="col-sm-2 control-label" >手机</label>
		<div class="col-sm-10">
		<input class="form-control" type="text" name="cellphone" value="<?php echo $cellphone;?>" />
		</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-2 control-label">部门</label>
		<div class="col-sm-10">
		<select class="form-control" name="department">
		<option value="0" <?php if ($department==0) echo 'selected="selected"'?>>请选择</option>
		<option value="1" <?php if ($department==1) echo 'selected="selected"'?>>技术部</option>
		<option value="2" <?php if ($department==2) echo 'selected="selected"'?>>行政部</option>
		<option value="3" <?php if ($department==3) echo 'selected="selected"'?>>宣传部</option>
		<option value="4" <?php if ($department==4) echo 'selected="selected"'?>>财政部</option>
		</select>
		</div>
	</div>

	<input type="submit" value="保存" />
	</form>

</div>