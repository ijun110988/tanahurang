
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Tanah.com</title>
	<link rel="shortcut icon" href="<?php base_url(''); ?>images/tanahs.gif" width="100" />
	<meta name="description" content="User login page" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="<?php base_url(''); ?><?php base_url(''); ?>assets2/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php base_url(''); ?>assets2/font-awesome/4.1.0/css/font-awesome.min.css" />
	
		<link rel="stylesheet" href="<?php base_url(''); ?>assets2/css/select2.css" />
	<!-- text fonts -->
	<link rel="stylesheet" href="<?php base_url(''); ?>assets2/fonts/fonts.googleapis.com.css" />

	<!-- ace styles -->
	<link rel="stylesheet" href="<?php base_url(''); ?>assets2/css/ace.min.css" />

	<!--[if lte IE 9]>
	<link rel="stylesheet" href="<?php base_url(''); ?>assets2/css/ace-part2.min.css" />
	<![endif]-->
	<link rel="stylesheet" href="<?php base_url(''); ?>assets2/css/ace-rtl.min.css" />

	<!--[if lte IE 9]>
	<link rel="stylesheet" href="<?php base_url(''); ?>assets2/css/ace-ie.min.css" />
	<![endif]-->


</head>

<body class="login-layout blur-login" OnLoad="document.login.username.focus();">
<div class="main-container">
<div class="main-content">
<div class="row">
<div class="col-sm-10 col-sm-offset-1">
<div class="login-container">
<div class="center">
	<h1>
				<img src="<?php echo base_url();?>assets2/images/tanah.png" width="250" alt="Tanah.com">
				
	</h1>
	<h3>
	<span class="white">Jual</span><span class="red">.</span><span class="white">Sewa</span><span class="red">.</span><span class="white">Lelang</span>
	<h3>
</div>

<div class="space-6"></div>
<div id="loading" style="text-align: center"></div>
<div class="position-relative">
	<div id="login-box" class="login-box visible widget-box no-border">
		<div class="widget-body">
			<div class="widget-main">
				<h4 class="header blue lighter bigger">
					<i class="ace-icon fa fa-coffee green"></i>
					Please Enter Your Information
				</h4>

				<div class="space-6"></div>
							<?php
							 // Cetak session
							if($this->session->flashdata('sukses')) {
								echo '<p class="warning" style="margin: 10px 20px;">'.$this->session->flashdata('sukses').'</p>';
							}
							// Cetak error
							echo validation_errors('<p class="warning" style="margin: 10px 20px;">','</p>');
							?>
				<form name="form" id="loginF" method="post" action="<?php echo base_url('login'); ?>" class="form-horizontal">
					<fieldset>
					
					
						<div class="form-group">
						<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input class="form-control" placeholder="E-mail or username" name="member_email" type="member_email">
															<i class="ace-icon fa fa-user"></i>
														</span>
						</label>
						</div>
						
						<div class="form-group">
						<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															 <input type="password" class="form-control" placeholder="Password" name="member_password" type="member_password" value="">
															<i class="ace-icon fa fa-lock"></i>
														</span>
						</label>
						</div>
						
						<div class="space"></div>

						<div class="clearfix">
							<label class="inline">
								<input type="checkbox" class="ace" />
								<span class="lbl"> Remember Me</span>
							</label>

							<div class="form-group">						
							<button class="width-35 pull-right btn btn-sm btn-primary" type="submit" name="submit" id="submit" value="Log In" class="btn btn-lg btn-success btn-block">
								<i class="ace-icon fa fa-key"></i>
								<span class="bigger-110">Login</span>
							</button>
							<div>
						</div>

						<div class="space-4"></div>
					</fieldset>
				</form>
				

				<div class="space-6"></div>

				
			</div><!-- /.widget-main -->

			<div class="toolbar clearfix">
				<div>
					<a href="forgot.php" class="forgot-password-link">
						<i class="ace-icon fa fa-arrow-left"></i>
						I forgot my password
					</a>
				</div>

				<div>
					<a href="<?php echo base_url('') ?>register" class="user-signup-link">
						I want to register
						<i class="ace-icon fa fa-arrow-right"></i>
					</a>
				</div>
			</div>
		</div><!-- /.widget-body -->
	</div><!-- /.login-box -->

	




<div class="navbar-fixed-top align-right">
	<br />
	&nbsp;
	<a id="btn-login-dark" href="#">Dark</a>
	&nbsp;
	<span class="blue">/</span>
	&nbsp;
	<a id="btn-login-blur" href="#">Blur</a>
	&nbsp;
	<span class="blue">/</span>
	&nbsp;
	<a id="btn-login-light" href="#">Light</a>
	&nbsp; &nbsp; &nbsp;
</div>
</div>
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.main-content -->
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="<?php base_url(''); ?>assets2/js/jquery.2.1.1.min.js"></script>
<script src="<?php base_url(''); ?>assets2/js/bootstrap.min.js"></script>
<script src="<?php base_url(''); ?>assets2/js/jquery.validate.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="<?php base_url(''); ?>assets2/js/jquery.1.11.1.min.js"></script>
<![endif]-->

<!--[if IE]>
<script type="text/javascript">
	window.jQuery || document.write("<script src='<?php base_url(''); ?>assets2/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
	if('ontouchstart' in document.documentElement) document.write("<script src='<?php base_url(''); ?>assets2/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
	jQuery(function($) {
		$(document).on('click', '.toolbar a[data-target]', function(e) {
			e.preventDefault();
			var target = $(this).data('target');
			$('.widget-box.visible').removeClass('visible');//hide others
			$(target).addClass('visible');//show target
		});
	});

	
	


	//you don't need this, just used for changing background
	jQuery(function($) {
		$('#btn-login-dark').on('click', function(e) {
			$('body').attr('class', 'login-layout');
			$('#id-text2').attr('class', 'white');
			$('#id-company-text').attr('class', 'blue');

			e.preventDefault();
		});
		$('#btn-login-light').on('click', function(e) {
			$('body').attr('class', 'login-layout light-login');
			$('#id-text2').attr('class', 'grey');
			$('#id-company-text').attr('class', 'blue');

			e.preventDefault();
		});
		$('#btn-login-blur').on('click', function(e) {
			$('body').attr('class', 'login-layout blur-login');
			$('#id-text2').attr('class', 'white');
			$('#id-company-text').attr('class', 'light-blue');

			e.preventDefault();
		});

	});
</script>
</body>
</html>
