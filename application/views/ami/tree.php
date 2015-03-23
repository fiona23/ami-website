<div id="member-tree" class="container">
<h1>OUR TEAM</h1>
<div id="xujun">
	<img src="/img/xujun.png" alt="">
	<div id="xujun-detail">
	<h4>徐珺</h4>
	<p>协会主席</p>
	<p>技术部部长</p>
	<p>协会创始人之一</p>
	</div>
</div>
<hr>
<ul id="department">
	<li>行政部</li>
	<li>技术部</li>
	<li>财务部</li>
	<li>宣传部</li>
</ul>
<?php for ($x = 1; $x < 3; $x++) :?>
	<?php if ($x == 1) echo "<div class='level-1'>"; else echo "<div class='level-2'>";?>
	<?php for ($y = 0; $y < 4; $y++) :?>
		<?php if ($x == 2) :?>
				<div class="level-2-mem">
					<?php if (count($tree[$x][$y]) == 0) :?>
						NONE3
					<?php else :?>
						<?php foreach ($tree[$x][$y] as $p):?>

								<div class="level-2-2">
									<div class="mem-name">
										<?=$p->name?>
									</div>
									<div class="mem-detail">
										<p>邮箱：<?=$p->email?></p>
										<p>手机：<?=$p->cellphone?></p>
									</div>
								</div>
						<?php endforeach ?>
					<?php endif ?>
					
					<?php if (count($tree[$x+1][$y]) == 0) :?>
						NONE2
					<?php else :?>
						<?php foreach ($tree[$x+1][$y] as $p):?>
								<div class="level-2-3">
									<div class="mem-name">
										<?=$p->name?>
									</div>
									<div class="mem-detail">
										<p>邮箱：<?=$p->email?></p>
										<p>手机：<?=$p->cellphone?></p>
									</div>
								</div>
						<?php endforeach ?>
					<?php endif ?>
				</div>
							<?php else : ?>



				<div class="level-1-mem">
					<?php if (count($tree[$x][$y]) == 0) :?>
					NONE1
					<?php else :?>
					<?php foreach ($tree[$x][$y] as $p):?>
					
						<div class="mem-name">
							部长：<?=$p->name?>
						</div>
						<div class="mem-detail">
							<p>邮箱：<?=$p->email?></p>
							<p>手机：<?=$p->cellphone?></p>
						</div>

					<?php endforeach ?>
					<?php endif ?>
				</div>
		<?php endif ?>
	<?php endfor ?>
	<br />
</div>
<?php endfor ?>

</div>
