<div id="login-page" class="container">
<h2 id="login-head" class="login-head">登陆</h2>
<hr/>
<div id="login" class="login">
	<p><?=$old_account?></p>
	<form  id='login-form' class="login-form" role="form" name='login' method="post" accept-charset="utf-8" action="http://localhost/index.php/ami_home/login" />
		<div class="form-group">
			<lable id="email-text" class="form-text" >Email:</lable>
			<div class="col-sm-10">
			<input class="form-input email form-control" type='text' name='account' id='account' placeholder="Enter your email"/>
			<p class="error-info">不合法的邮件地址</p>
			</div>
			
		</div>
		<div class="form-group">
			<lable id="password-text " class="form-text">密&nbsp码:</lable>
			<div class="col-sm-10">
			<input class="form-input password form-control" type='password' name='password' id='password' placeholder="请输入密码"/>
			</div>
		</div>
		
		<input id="submit" class="submit btn" type='submit' name='login_submit' value='LOGIN' />
	</form>
	<p id="login-describe">默认密码是你的手机号，登陆后可更改</p>
</div>


<div id="no-account" class="no-account">
	<p>&gt还没有账号？<a href="http://localhost/#!join-us">立即注册</a></p>
</div>


</div>
