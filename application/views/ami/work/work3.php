<html>
<head>
<title>Change_password</title>
</head>
<body>
<h2><?=$name?>,change your password.</h2>
<?php if ($wrong_pass == TRUE) :?>
<h3>Password error,type again.</h3>
<?php endif ?>
<form action="http://localhost/index.php/ami_work/changePassword" method="post" >
<table>
<tr>
<td>Old Password:</td>
<td><input type="password" name="old" value="" /></td>
</tr>
<tr>
<td>New Password:</td>
<td><input type="password" name="new" value="" /></td>
</tr>
<tr>
<td>Comfirmed: </td>
<td><input type="password" name="comfirmed" value="" /></td>
</tr>
</table>
<input type="submit" value="Submit" />
</form>
</body>
</html>
	
