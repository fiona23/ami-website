
<!--
<script type="text/javascript">
$(document).ready( function() {

});
</script>
-->
<div id="work-space">
<div class="container">
	<h3>Welcome,<?= $name?></h3></div>
<div class="container">
	<div class="header">
		<ul>
			<li id="change-info-head"class="active " ><a href="#" class="change-info">完善信息</a></li>
			<li id="change-password-head" ><a href="#" class="change-password">改变密码</a></li>

			<?php if ($level == 0) {?>
			<li><a href="#" id="newbie-con" class="newbie-con">招新情况</a></li>
			<li><a href="#" id="send-mes" class="send-mes">发送短信</a></li>
			<?php } ?>
		</ul>
	<div id="white-block">
		
	</div>
	</div>
</div>
	<div class="content">




