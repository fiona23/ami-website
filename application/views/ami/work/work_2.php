<div id="newbie-list" class="container newbie-con">
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
