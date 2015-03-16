<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="This is the homepage of Association of Mobile Internet @ Shanghai Jiaotong University">
	<meta name="keyword" content="mobile, internet, SJTU, startup">
	<title><?=$title?></title>
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css" media="screen">
	<link rel="stylesheet" type="text/css" href="../../css/main.css" media="screen">


</head>
<body>
	
	<div id="newbie-list" class="container">
	<h2>新成员</h2>
	<form action="http://localhost/index.php/ami_work/getNew" method="POST">
	<table >
	<th>NAME</th>
	<th>CELLPHONE</th>
	<th>ACCEPT</th>
	<th>DENY</th>
	<th>UNDETERMINED</th>
	<?php foreach ($query->result() as $row) :?>
		<?php var_dump($row->id); ?>
		<tr>
			<td id="newbie-name"><?=$row->name?></td>
			<td id="newbie-cellphone"><?=$row->cellphone?></td>
			<td id="newbie-accept">
				<input type="radio" name=<?=$row->id?> value="yes" />
			</td>
			<td id="newbie-deny">
				<input type="radio" name=<?=$row->id?> value="no" />
			</td>
			<td id="undetermined">
				<input type="radio" name=<?=$row->id?> value="undetermined" checked="checked"  />
			</td>
		</tr>
	<?php endforeach ?>
	</table>
	<input type="submit" value="SUBMIT" />
	</form>
	</div>
<script type="text/javascript" src="../../js/jquery-2.1.3.min.js" ></script>
<script type="text/javascript" src="../../js/ami.js" ></script>
</body>
</html>
	
