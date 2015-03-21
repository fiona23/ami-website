<div>
<h4>LEADER: XJ</h4><br />
<?php for ($x = 1; $x < 3; $x++) :?>
	<?php for ($y = 0; $y < 4; $y++) :?>
		<?php if ($x == 2) :?>
			<p>
				<?php if (count($tree[$x][$y]) == 0) :?>
					NONE
				<?php else :?>
					<?php foreach ($tree[$x][$y] as $p):?>
						( 
							<?=$p->name?>
							<?=$p->email?>
							<?=$p->cellphone?>
						)
					<?php endforeach ?>
				<?php endif ?>
				+++
				<?php if (count($tree[$x+1][$y]) == 0) :?>
					NONE
				<?php else :?>
					<?php foreach ($tree[$x+1][$y] as $p):?>
						( 
							<?=$p->name?>
							<?=$p->email?>
							<?=$p->cellphone?>
						)
					<?php endforeach ?>
				<?php endif ?>
			</p>
		<?php else : ?>
			<p>
			<?php if (count($tree[$x][$y]) == 0) :?>
				NONE
			<?php else :?>
				<?php foreach ($tree[$x][$y] as $p):?>
					( 
						<?=$p->name?>
						<?=$p->email?>
						<?=$p->cellphone?>
					)
				<?php endforeach ?>
			<?php endif ?>
			</p>
		<?php endif ?>
	<?php endfor ?>
	<br />
<?php endfor ?>

</div>
