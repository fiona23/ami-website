<div class="container">
<div id="join-us" class="join-us">

<h2>加入我们</h2>

<?php if ($email_taken) : ?>
	<p>Change your email.</p><br />
<?php endif  ?>
<?php if ($success) : ?>
	<p>You've Signed Up!</p><br />
<?php endif  ?>

<?php 
$attributes = array('id'=>'signup');
echo form_open('http://localhost',$attributes);
?>
<div class="form-group">
	<label class="form-text">姓名:</label>
	<input class="form-input" type='text' name='name' id='name' value="" />
</div>
<div class="form-group">
	<label class="form-text">邮箱:</label>
	<input class="form-input email" type='text' name='email' id='email' value="" />
	<p class="error-info">不合法的邮箱地址</p>
</div>
<div class="form-group">
	<label class="form-text">手机:</label>
	<input class="form-input password" type='text' name='cellphone' id='cellphone' value='' />
</div>

<?php echo form_submit('signup_submit','Sign Up');?>
</form>
</div>

</div>
