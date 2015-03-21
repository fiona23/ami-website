<div>
	<form id="#test" action="http://localhost/index.php/ami_work/deliverText" method="POST" >
	<table>
		<?php 
		$count = 0;
		$sum = count($list);
		foreach ($list as $member ) :?>
		<?php if ($count == 0)  : ?>
		<tr>
			<?php endif ?>
			<td><?=$member->name;?><input type="checkbox" name="send[]" value=<?=$member->id;?> />  </td>
			<?php $count = $count + 1;
		if ($count == 4 ) :?>
		</tr>
			<?php $count = 0 ;?>
			<?php  endif ?>
			<?php endforeach ?>
			<?php if ($count != 0 && count($list) != 0 ):?>
		</tr>
		<?php endif ?>
	</table>
	<div class="form-group">
		<div class="col-sm-10">
			<input class="form-control" rows='3' type="textera" name="message"/>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-10">
			<input type="submit" value="send" />
		</div>
	</div>
	</form>
</div>






