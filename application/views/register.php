
<div id="fh5co-main">
	<div class="fh5co-narrow-content">
		<div class="row row-bottom-padded-md">
			<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
				<img class="img-responsive" src="<?php echo base_url('image/img_0.jpg');?>">
			</div>
			<div class="col-md-4 col-md-offset-1 animate-box" data-animate-effect="fadeInLeft">
				<h2 class="fh5co-heading">注册～</h2>
			</div>
			<div class="col-md-4 col-md-offset-1 text-center animate-box" data-animate-effect="fadeInLeft">
				<?php echo form_open('register/register'); ?>							
				<div class="form-group">
					<input type="text" class="form-control" placeholder="用户名" name="id" value="<?php echo set_value('id'); ?>">
				</div>
				<?php echo form_error('id'); ?>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="邮箱" name="email" value="<?php echo set_value('email'); ?>">
				</div>
				<?php echo form_error('email'); ?>

				<div class="form-group">
					<input type="password" class="form-control" placeholder="密码" name="password">
				</div>
				<?php echo form_error('password'); ?>
				<div class="form-group">
					<input type="password" class="form-control" placeholder="确认密码" name="password-confirm">
				</div>
				<?php echo form_error('password-confirm'); ?>
				
				<?php if(isset($register_error)):?>
					<div class="alert alert-danger alert-dismissible" role="alert" id="alert"><?php echo $register_error;?>
					</div>
				<?php endif;?>	

				<div class="form-group">
					<input type="submit" class="btn btn-primary btn-md" value="确认注册">
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
<script>
	$(function(){
		$(".form-control").click(function(){
			$("div#alert").hide();
		});
	});
</script>
</body>
</html>