<h2>This is <?=$title?>.</h2>
	<h3>Welcome to CA.</h3>
	<p>
	Check your info below. If none, please <a href='http://localhost/index.php/register'>Register</a>.<br />
	</p>	
	<?php foreach ($members as $people): ?>
		<h4><?php echo $people['name']?></h4>
		<p>
			email: <?php echo $people['email']?><br />
			apartment: <?=$people['apartment']?><br />
			cellphone: <?=$people['cellphone']?><br />
		</p>
	<?php endforeach ?>
