<!doctype html>
<html>
<head>
<title><?=$title?></title>
</head>
<body>
<h2>This is the login Page.</h2>

<p><?=$old_account?></p>
<form name='login' id='login' method="post" accept-charset="utf-8" action="http://localhost/index.php/ami_home/login" />
<table>
	<tr>
	<td>Email:</td>
	<td><input type='text' name='account' id='account' value='Email'/><br /></td>
	</tr>
	<tr>
	<td>Password:</td>
	<td><input type='password' name='password' id='password'/><br /></td>
	</tr>
</table>
<input type='submit' name='login_submit' value='Login' /><br />
</form>
<p>Default password is your cellphone number. Remeber to change it.</p><br />
<?php if (isset($account)) :?>
<h2><?="ACCOUNT: ".$account?></h2>
<?php endif ?>
<?php if (isset($password)) :?>
<h2><?="PASSWORD: ".$password?></h2>
<?php endif ?>
</body>
</html>
