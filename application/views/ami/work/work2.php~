<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>ZhaoXin</title>
</head>
<body>
	<h2>Here's all the newbies.</h2>
	<form action="http://localhost/index.php/ami_work/getNew" method="POST">
	<table>
	<th>NAME</th>
	<th>CELLPHONE</th>
	<th>ACCEPT</th>
	<th>DENY</th>
	<th>UNDETERMINED</th>
	<?php foreach ($query->result() as $row) :?>
		<?php var_dump($row->id); ?>
		<tr>
		<td><?=$row->name?></td>
		<td><?=$row->cellphone?></td>
		<td>
		<input type="radio" name=<?=$row->id?> value="yes" />
		</td>
		<td>
		<input type="radio" name=<?=$row->id?> value="no" />
		</td>
		<td>
		<input type="radio" name=<?=$row->id?> value="undetermined" checked="checked"  />
		</td>
		</tr>
	<?php endforeach ?>
	</table>
	<input type="submit" value="SUBMIT" />
	</form>
</body>
</html>
	
