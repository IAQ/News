<div id="fh5co-main">
	<div class="fh5co-narrow-content">
		<div class="row row-bottom-padded-md">
			<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
				<img class="img-responsive" src="<?php echo base_url('image/img_0.jpg');?>">
			</div>
			<div class="col-md-4 col-md-offset-1 animate-box" data-animate-effect="fadeInLeft">
				<h2 class="fh5co-heading">账号信息</h2>
				
			</div>
			<div class="col-md-4 col-md-offset-1 animate-box" data-animate-effect="fadeInLeft" >
				<?php echo form_open('UserManage/editAccount'); ?>							
				<div class="form-group">
					<label>用户名:</label>
					<input type="text" style="width:85%;display: inline-block;" class="form-control" placeholder="不能为空" name="id" value="<?php echo isset($id) ? $id : set_value('id'); ?>" readOnly>

				</div>
				<?php echo form_error('id'); ?>
				<div class="form-group">
					<label>邮&nbsp;&nbsp;&nbsp;箱:</label>
					<input id="email" type="text" style="width:85%;display: inline-block;" class="form-control" placeholder="不能为空" name="email" value="<?php echo isset($email) ? $email : set_value('email'); ?>" readOnly>

				</div>
				<?php echo form_error('email'); ?>
				<div id="psd" hidden>
					<div class="form-group">
						<label>新密码:</label>
						<input type="password" class="form-control" style="width:85%;display: inline-block;" placeholder="修改密码，选填" name="password" >
					</div>
					<?php echo form_error('password'); ?>
					<div class="form-group">
						<label>确&nbsp;&nbsp;&nbsp;认:</label>
						<input type="password" class="form-control" style="width:85%;display:inline-block;" placeholder="修改密码，选填" name="password-confirm" >
					</div>
					<?php echo form_error('password-confirm'); ?>
				</div>

				<?php if(isset($edit_error)):?>
					<div class="alert alert-danger alert-dismissible" role="alert" id="alert"><?php echo $edit_error;?>
					</div>
				<?php endif;?>	

				<div class="form-group">
					<a href="javascript:;" onclick="edit()" class="btn btn-primary btn-md" style="float: left" id="edit">编辑</a>
					<input id="confirm" type="submit" class="btn btn-primary btn-md" value="确定" hidden style="float:right">
					<a id="logout" href="<?php echo site_url('UserManage/logout');?>" class="btn btn-primary btn-md" style="float: right">退出</a>
				</div>
				
			</form>


		</div>

	</div>
	<div class="fh5co-narrow-content">
		<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">设置</h2>
		<div class="row">
			<div >
				<div class="fh5co-feature animate-box" data-animate-effect="fadeInLeft">
					<div class="fh5co-icon">
						<i class="icon-settings"></i>
					</div>
					<div class="fh5co-text">
						<h3>感兴趣的栏目</h3>
						<?php echo form_open('UserManage/editColoum'); ?>	
						<input type="checkbox" id="checkbox-1-1" class="regular-checkbox" name="like[]" value="head" disabled="disabled"?><label for="checkbox-1-1">头条</label>
						<input type="checkbox" id="checkbox-1-2" class="regular-checkbox" name="like[]" value="native" disabled="disabled"/><label for="checkbox-1-2">国内</label>
						<input type="checkbox" id="checkbox-1-3" class="regular-checkbox" name="like[]" value="world" disabled="disabled"/><label for="checkbox-1-3">国际</label>
						<input type="checkbox" id="checkbox-1-4" class="regular-checkbox" name="like[]" value="eco" disabled="disabled"/><label for="checkbox-1-4">经济</label>
						<input type="checkbox" id="checkbox-1-5" class="regular-checkbox" name="like[]" value="sports" disabled="disabled"/><label for="checkbox-1-5">体育</label>
						<input type="checkbox" id="checkbox-1-6" class="regular-checkbox" name="like[]" value="ent" disabled="disabled"/><label for="checkbox-1-6">娱乐</label>
						<input type="checkbox" id="checkbox-1-7" class="regular-checkbox" name="like[]" value="war" disabled="disabled"/><label for="checkbox-1-7">军事</label>
						<input type="checkbox" id="checkbox-1-8" class="regular-checkbox" name="like[]" value="car" disabled="disabled"/><label for="checkbox-1-8">汽车</label>
						<input type="checkbox" id="checkbox-1-9" class="regular-checkbox" name="like[]" value="tech" disabled="disabled"/><label for="checkbox-1-9">科技</label>
						<input type="checkbox" id="checkbox-1-10" class="regular-checkbox" name="like[]" value="society"  disabled="disabled"/><label for="checkbox-1-10">社会</label>
						<div class=col-md-6 style="padding-left: 0px;">
						<div class="form-group">
							<a href="javascript:;" onclick="editColoum()" class="btn btn-primary btn-md" style="float: left" id="editColoum">编辑</a>
							<input id="coloum-confirm" type="submit" class="btn btn-primary btn-md" value="确定" hidden style="float:right">
						</div>
						</div>

						</form>
					</div>
				</div>
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
$(document).ready(function(){
	//处理错误信息
	var error = "<?php echo isset($edit_flag) ? $edit_flag : "";?>";
	var success = "<?php echo isset($edit_success) ? $edit_success : "";?>";
	if(error == "true")
		edit();

	if(success != "")
		alert(success);
	$(".form-control").click(function(){
		$("div#alert").hide();
	});

	//处理栏目
	coloum();

});
//处理用户信息修改
function edit(){
		if($('#edit').text() == "编辑")
		{
			$('#edit').html("取消");
			$('#psd').show();
			$('#confirm').show();
			$('#logout').hide();
			$('#email').attr('readOnly',false);
		}
		else
		{
			$('#edit').html("编辑");
			$('#psd').hide();
			$('#confirm').hide();
			$('#logout').show();
			$('#email').attr('readOnly',true);

		}
	}
//处理栏目修改
function editColoum(){
		if($('#editColoum').text() == "编辑")
		{
			$('#editColoum').html("取消");
			$('#coloum-confirm').show();
			$('.regular-checkbox').attr('disabled',false);
		}
		else
		{
			$('#editColoum').html("编辑");
			coloum();
			$('#coloum-confirm').hide();
			$('.regular-checkbox').attr('disabled','disabled');

		}
	}

function coloum(){
	var car = "<?php echo isset($_SESSION['car'])?$_SESSION['car']:'';?>";
	if(car != "")
	{
		var eco = "<?php echo $_SESSION['eco'];?>";
		var ent = "<?php echo $_SESSION['ent'];?>";
		var head = "<?php echo $_SESSION['head'];?>";
		var native = "<?php echo $_SESSION['native'];?>";
		var society = "<?php echo $_SESSION['society'];?>";
		var sports = "<?php echo $_SESSION['sports'];?>";
		var tech = "<?php echo $_SESSION['tech'];?>";
		var war = "<?php echo $_SESSION['war'];?>";
		var world = "<?php echo $_SESSION['world'];?>";

		if(car == "0")
			$('#checkbox-1-8').prop('checked',false);
		else
			$('#checkbox-1-8').prop('checked',true);

		if(eco == "0")
			$('#checkbox-1-4').prop('checked',false);
		else
			$('#checkbox-1-4').prop('checked',true);

		if(ent == "0")
			$('#checkbox-1-6').prop('checked',false);
		else
			$('#checkbox-1-6').prop('checked',true);

		if(head == "0")
			$('#checkbox-1-1').prop('checked',false);
		else
			$('#checkbox-1-1').prop('checked',true);

		if(native == "0")
			$('#checkbox-1-2').prop('checked',false);
		else
			$('#checkbox-1-2').prop('checked',true);

		if(society == "0")
			$('#checkbox-1-10').prop('checked',false);
		else
			$('#checkbox-1-10').prop('checked',true);

		if(sports == "0")
			$('#checkbox-1-5').prop('checked',false);
		else
			$('#checkbox-1-5').prop('checked',true);

		if(tech == "0")
			$('#checkbox-1-9').prop('checked',false);
		else
			$('#checkbox-1-9').prop('checked',true);

		if(war == "0")
			$('#checkbox-1-7').prop('checked',false);
		else
			$('#checkbox-1-7').prop('checked',true);

		if(world == "0")
			$('#checkbox-1-3').prop('checked',false);
		else
			$('#checkbox-1-3').prop('checked',true);
	}

}


</script>
</body>
</html>