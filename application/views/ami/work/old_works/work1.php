<html>
<head>
<meta charset="UTF-8">
<title><?php echo $title; ?></title>
</head>
<body>
<?php if ( isset($para) ) : ?>
<h1><?php echo $para;?></h1>
<?php endif ?>

<form action="http://localhost/index.php/ami_work/completeInfo" method="POST" >

name:<input type="text" name="name" value="<?php echo $name;?>" /><br />

email: <input type="text" name="email" value="<?php echo $email;?>" /><br />
cellphone: <input type="text" name="cellphone" value="<?php echo $cellphone;?>" /><br />
Department:
<select name="department">
<option value="0" <?php if ($department==0) echo 'selected="selected"'?>>请选择</option>
<option value="1" <?php if ($department==1) echo 'selected="selected"'?>>技术部</option>
<option value="2" <?php if ($department==2) echo 'selected="selected"'?>>行政部</option>
<option value="3" <?php if ($department==3) echo 'selected="selected"'?>>宣传部</option>
<option value="4" <?php if ($department==4) echo 'selected="selected"'?>>财政部</option>
</select><br />

<input type="submit" value="SURE" />


</form>
</body>
</html>