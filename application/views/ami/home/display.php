		<div id="main-content" style="height: 955px;">
			<div class="wrap">
				<div class="inner-wrap">

					<div id="who-we-are" class="anchorClass" style="height: 955px; ">
						<div class="description">
							<h1>移动互联网协会</h1>
							<h1>技术 • 美工 • 运营 • 管理</h1>
							<h1><span class="green_text">交大 </span>学生<span class="green_text">互联网创新创业</span>平台</h1>
							<div class="content">
								<p>
									我们专注于移动互联网，我们不止步于技术开发。移动互联网协会意在成为最棒的大学生移动互联网创业苗圃，为每一个有意互联网创业的学生打造良好的生态环境，提供最有力的全方位的支持。
								</p>
								</br>
								<p>
									AMI • Association of Mobile Internet @ SJTU
								</p>
							</div>
						</div>
						<div class="light_next next"></div>
					</div>

					<div id="what-we-do" class="anchorClass" style="height: 955px;">
						<div class="description">
							<h1>我们做什么</h1>
								<div class=" method1">
									<h2><span class="green_text">01. </span>立项评估</h2>
									<div class="desc_1">每一个协会成员随时可以申请立项，经过初期的项目评估给予项目意见，即可组建团队，按需分配资源，开始执行你的创业项目</div>
								</div>
								<div class="bottom method2">
									<h2><span class="green_text">02. </span>敏捷开发</h2>
									<div class="desc_1">每一个开始执行的项目我们都给予尽可能多的支持，包括技术选型、美工设计、专家意见等</div>
								</div>
								<div class=" method3">
									<h2><span class="green_text">03. </span>推广 &amp; 运营</h2>
									<div class="desc_1">每一个项目不应该止步于简单实现，而是在推广和运营的过程中快速迭代，让你的作品流传于校园甚至更远，成为产品</div>
								</div>
						</div>
						<div class="dark_next next"></div>
					</div>

					<div id="what-we-did" class="anchorClass sliding" data-position="1" style="height: 955px;">
						<div class="description">
							<h1>我们做过什么</h1>
							

							<div id="b_carousel" class="carousel slide">
								<div class="carousel-inner">
									<?php foreach ($dom->project as $project) :?>
										<div class="item" style="">
											<img src=<?=$project->resource->format['path']?> />
											<div class="content">
												<h2><span><?=$project->name?></span></h2>
												<?=$project->description?>
											</div>
										</div>
									<?php endforeach ?>
								</div>
							</div>

							<div class="pager" style="left: 880px; visibility: visible;">
								<ul>
									<li title="InnoXYZ" class="">
										
									</li>
									<li title="思源公益图书馆" class="">
										<a onclick="javascript: changeSlide('what-we-did', 2);">.</a>
									</li>
								</ul>		
							</div>
							<div class="next-slide" style="right: 0px; display: block;"></div>
							<div class="prev-slide" style="left: 0px; display: block;"></div>
						</div>
						<div class="light_next next"></div>
					</div>


					<div id="we-want-you" class="anchorClass sliding" data-position="1" style="height: 955px;">
						<div class="description">
							<h1>我们需要你</h1>
								<div id="f_carousel" class="carousel slide dark">
									<div class="carousel-inner">
										<div class="item" style="">
											<img src="./img/s1.png" alt="技术">
											<div class="content">
												<span class="title green_text">01</span><h2> 如果你追求技术</h2>
												<p>你可以成为团队的主程，CTO，见证你的努力从代码变成产品，从诞生到推广，从自娱自乐到服务大众。</p>
											</div>
										</div>
										<div class="item" style="">
											<img src="./img/s2.png" alt="美工">
											<div class="content">
												<span class="title green_text">02</span><h2> 如果你热爱设计</h2>
												<p>你可以成为团队的UED，产品设计师，让你的艺术灵感从抽象到具象，从想法到产品。</p>
											</div>
										</div>
										<div class="item" style="">
											<img src="./img/s3.png" alt="运营">
											<div class="content">
												<span class="title green_text">03</span><h2> 如果你擅长运营</h2>
												<p>你可以成为团队的COO，你不仅需要学会管理整支团队，还需要将团队的成果传播给全校师生，赋予它更多的价值。</p>
											</div>
										</div>
										<div class="item">
											<img src="./img/s6.png" alt="创业">
											<div class="content">
												<span class="title green_text">04</span><h2> 如果你有一颗创业的心</h2>
												<p>这里有一批有着相同理想的人，你可以体验一场从发起或加入一个初创团队，与它一起成长，到见证它为交大带来价值的StartUp之旅。</p>
											</div>
										</div>
										<div class="item active">
											<img src="./img/s7.png" alt="超人">
											<div class="content">
												<span class="title green_text">05</span><h2> “我不知道自己能做什么”</h2>
												<p>没问题，不论你的年级、专业，只要你有激情，愿投入，就有一切可能。只有做了，你才知道自己能做什么，想做什么。</p>
											</div>
										</div>
									</div>
								</div>
							<div class="pager" style="left: 880px; visibility: visible;">
								<ul>
									<li title="技术" class="">
										<a onclick="javascript: changeSlide('we-want-you', 1);">.</a>
									</li>
									<li title="美工" class="">
										<a onclick="javascript: changeSlide('we-want-you', 2);">.</a>
									</li>
									<li title="运营" class="">
										<a onclick="javascript: changeSlide('we-want-you', 3);">.</a>
									</li>
									<li title="创业" class="">
										<a onclick="javascript: changeSlide('we-want-you', 4);">.</a>
									</li>
									<li title="超人" class="">
										<a onclick="javascript: changeSlide('we-want-you', 5);">.</a>
									</li>
								</ul>			
							</div>
							<div class="next-slide arrow2" style="right: 0px; display: block;"></div>
							<div class="prev-slide arrow2" style="left: -100px;"></div>
						</div>
						<div class="dark_next next"></div>
					</div>

					<div id="join-us" class="anchorClass" style="height: 955px;">
						<div class="description">
							<div class="right">
								<h1>联系我们</h1>
								<div class="content">
									<div class="green_text"><a href="mailto:amisjtu@gmail.com">amisjtu@gmail.com</a></div>
									<div class="notes">上海交通大学<br>逸夫楼103室<br>移动互联网协会</div>
								</div>
							</div>
							<div class="left">
								<h1>加入我们</h1>

								<div class="content">
									<?php if ($email_taken) : ?>
										<p>Change your email.</p><br />
									<?php endif  ?>
									<?php if ($success) : ?>
										<p>You've Signed Up!</p><br />
									<?php endif  ?>

									<?php 
									$attributes = array('id'=>'signup');
									echo form_open('http://localhost',$attributes);
									?>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label">姓名:</label>
										<div class="col-sm-10">
											<input class="form-control" type='text' name='name' id='name' value="" />
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label">邮箱:</label>
										<div class="col-sm-10">
											<input class="form-control email" type='text' name='email' id='email' value="" />
											<p class="error-info">不合法的邮箱地址</p>
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label">手机:</label>
										<div class="col-sm-10">
											<input class="form-control" type='text' name='cellphone' id='cellphone' value='' />

										</div>
									</div>

									<?php echo form_submit('signup_submit','Sign Up');?>
								</form>
								</div>
								<br />
								<h3>更多协会相关内容请用PC查看</h3>
							</div>

							</div>
								
							
						</div>
						<!-- <div class="bottom">
							<div id="footer-partenaires">
								<h1>Partners</h1><img src="" alt="Partners">
							</div>
						</div> -->
					

				</div><!-- .inner-wrap -->
			</div><!-- .wrap -->
		</div><!-- #main-content -->








		<footer id="footer">
			<div class="wrap group">
				<div class="widget-block group">

				</div><!-- widget-block -->
			</div><!-- .wrap -->
		</footer>
	</div><!-- #page -->
		<div id="orientation" class="en">
	</div>

		<script type="text/javascript" src="./js/jquery.min.js"></script>
		<script type="text/javascript" src="./js/history.min.js"></script>
		<script type="text/javascript" src="./js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="./js/jquery.mousewheel.min.js"></script>
		<script type="text/javascript" src="./js/jquery.touchSwipe.min.js"></script>
		<script type="text/javascript" src="./js/bootstrap.min.js"></script>
		<script type="text/javascript" src="./js/jquery-ui.touch.js"></script>
		<script type="text/javascript" src="./js/ami.js"></script>
		<script type="text/javascript" src="./js/ami1.js"></script>
		<script type="text/javascript" src="./js/footer.js"></script>
	</body>
</html>



<!--用XML读入-->
