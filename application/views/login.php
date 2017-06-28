
<div id="fh5co-main">
	<div class="fh5co-narrow-content">
		<div class="row row-bottom-padded-md">
			<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
				<img class="img-responsive" src="<?php echo base_url('image/img_0.jpg');?>">
			</div>
			<div class="col-md-4 col-md-offset-1 animate-box" data-animate-effect="fadeInLeft">
				<h2 class="fh5co-heading">新闻之窗欢迎您的登录～</h2>
			</div>
			<div class="col-md-4 col-md-offset-1 text-center animate-box" data-animate-effect="fadeInLeft" >
				<?php echo form_open('login/login'); ?>							
				<div class="form-group">
					<input type="text" class="form-control" placeholder="用户名" name="id" value="<?php echo set_value('id'); ?>" >
				</div>
				<?php echo form_error('id'); ?>
				<div class="form-group">
					<input type="password" class="form-control" placeholder="密码" name="password" value="<?php echo set_value('password'); ?>">
				</div>
				<?php echo form_error('password'); ?>
				<?php if(isset($login_error)):?>
					<div class="alert alert-danger alert-dismissible" role="alert" id="alert"><?php echo $login_error;?>
					</div>
				<?php endif;?>	

				<div class="form-group">
					<a href="<?php echo site_url('register/index');?>" class="btn btn-primary btn-md" style="float:left">注册</a>
					<input type="submit" class="btn btn-primary btn-md" value="登录" style="float:right">
				</div>
				
				</form>
			</div>
		</div>
	</div>

	<div class="fh5co-narrow-content">
		<div class="row">
			<div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
				<h1 class="fh5co-heading-colored">Get in Touch</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
				<p class="fh5co-lead">有任何问题或者意见都可以联系我们</p>
				<p><a href="#" class="btn btn-primary">12345678@163.com</a></p>
			</div>

		</div>
	</div>



</div>


</div>
<script>
	$(function(){
		$(".form-control").click(function(){
			$("div#alert").hide();
		});
	});
</script>
</body>
</html>