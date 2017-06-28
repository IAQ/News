<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>新闻之窗</title>
	<meta name="news" content="news">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />


	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">
	<link href="<?php echo base_url('image/1.jpg');?>" rel="apple-touch-icon" />
	<link href="<?php echo base_url('image/1.jpg');?>" rel="apple-touch-icon" sizes="72x72" />
	<link href="<?php echo base_url('image/1.jpg');?>" rel="apple-touch-icon" sizes="114x114" />
	<link href="<?php echo base_url('image/1.jpg');?>" rel="apple-touch-icon" sizes="144x144" />
	<meta name="apple-mobile-web-app-capable" content="yes" />

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="<?php echo base_url('css/animate.css');?>">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="<?php echo base_url('css/icomoon.css');?>">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.css');?>">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="<?php echo base_url('css/flexslider.css');?>">
	<!-- Theme style  -->
	<link rel="stylesheet" href="<?php echo base_url('css/style.css');?>">

	<link rel="stylesheet" href="<?php echo base_url('css/style2.css');?>">

	<link rel="stylesheet" href="<?php echo base_url('css/amazeui.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('css/wap.css');?>">

	<!-- Modernizr JS -->
	<script src="<?php echo base_url('js/modernizr-2.6.2.min.js');?>"></script>
	<!-- FOR IE9 below -->
  <!--[if lt IE 9]>
  <script src="js/respond.min.js"></script>
  <![endif]-->
  <!-- jQuery -->
  <script src="<?php echo base_url('js/jquery.min.js');?>"></script>
  <!-- jQuery Easing -->
  <script src="<?php echo base_url('js/jquery.easing.1.3.js');?>"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url('js/bootstrap.min.js');?>"></script>
  <!-- Waypoints -->
  <script src="<?php echo base_url('js/jquery.waypoints.min.js');?>"></script>
  <!-- Flexslider -->
  <script src="<?php echo base_url('js/jquery.flexslider-min.js');?>"></script>

  <script src="<?php echo base_url('js/amazeui.min.js');?>"></script>

  <script src="<?php echo base_url('js/amazeui.lazyload.min.js');?>"></script>
  
  
  <!-- MAIN JS -->
  <script src="<?php echo base_url('js/main.js');?>"></script>
  <script src="<?php echo base_url('js/my.js');?>"></script>
  <script type="text/javascript">
  	$(document).ready(function(){

	var car = "<?php echo isset($_SESSION['car'])?$_SESSION['car']:'';?>";
	if(car != '')
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
			$('#car').hide();
		if(eco == "0")
			$('#eco').hide();
		if(ent == "0")
			$('#ent').hide();
		if(head == "0")
			$('#head').hide();
		if(native == "0")
			$('#native').hide();
		if(society == "0")
			$('#society').hide();
		if(sports == "0")
			$('#sports').hide();
		if(tech == "0")
			$('#tech').hide();
		if(war == "0")
			$('#war').hide();
		if(world == "0")
			$('#world').hide();
	}

});
  </script>

</head>
<body>
	<div id="fh5co-page">
		<a id="nav" href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
		<aside id="fh5co-aside" role="complementary" class="border js-fullheight">

			<h1 id="fh5co-logo"><a href="#">新闻之窗</a></h1>
			<nav id="fh5co-main-menu" role="navigation">
				<ul>
					<?php if(isset($_SESSION['user_id'])): ?>
					<li ><a style="background: #279bab;color: #fff;" href="<?php echo site_url('UserManage/index');?>"><?php echo $_SESSION['user_id'];?></a></li>
					<?php else: ?>
					<li ><a style="background: #279bab;color: #fff;" href="<?php echo site_url('Login/index');?>">登录</a></li>
					<?php endif;?>
					<li id="head"><a href="<?php echo site_url('Update/index');?>">头条</a></li>
					<li id="native"><a href="<?php echo site_url('Update/update/native');?>">国内</a></li>
					<li id="world"><a href="<?php echo site_url('Update/update/world');?>">国际</a></li>
					<li id="eco"><a href="<?php echo site_url('Update/update/eco');?>">经济</a></li>
					<li id="sports"><a href="<?php echo site_url('Update/update/sports');?>">体育</a></li>
					<li id="ent"><a href="<?php echo site_url('Update/update/ent');?>">娱乐</a></li>
					<li id="war"><a href="<?php echo site_url('Update/update/war');?>">军事</a></li>
					<li id="car"><a href="<?php echo site_url('Update/update/car');?>">汽车</a></li>
					<li id="tech"><a href="<?php echo site_url('Update/update/tech');?>">科技</a></li>
					<li id="society"><a href="<?php echo site_url('Update/update/society');?>">社会</a></li>

					<!-- <li><a href="">更多</a></li> -->
				</ul>


			</nav>
			<div class="fh5co-footer">
				<p><small>&copy; 新闻之窗. All Rights Reserved.</small></p>
				<ul>
					<li><a ><i class="icon-facebook2"></i></a></li>
					<li><a ><i class="icon-twitter2"></i></a></li>
					<li><a ><i class="icon-instagram"></i></a></li>
					<li><a ><i class="icon-linkedin2"></i></a></li>
				</ul>
			</div>

			
		</aside>