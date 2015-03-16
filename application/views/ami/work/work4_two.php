<form action="http://localhost/index.php/ami_work/deliverText" method="POST" >
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
</tr><?php $count = 0 ;?>
<?php  endif ?>
<?php endforeach ?>
<?php if ($count != 0 && count($list) != 0 ):?>
</tr>
<?php endif ?>
</table>
<input type="textera" name="message" rows="1000" cols="3000"/><br />
<input type="submit" value="send" /><br />
</form>
</body>
</html>



