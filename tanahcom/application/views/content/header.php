
<header class="header header--blue header--top">
	<div class="container">
		<div class="topbar">
			<ul class="topbar__contact">
				<li><span class="ion-ios-telephone-outline topbar__icon"></span><a href="tel:8801234567" class="topbar__link">0812-9690-7229</a></li>
				<li><span class="ion-ios-email-outline topbar__icon"></span><a href="mailto:info@tanah.com" class="topbar__link">info@tanah.com</a></li>
			</ul><!-- .topbar__contact -->

			<ul class="topbar__user">

				<span class="ion-ios-person-outline topbar__user-icon"></span>
				<li><a href="<?php echo base_url('') ?>as_member/create" class="topbar__link">Sign In</a></li>
			</ul>
		</div><!-- .topbar -->

		<div class="header__main">
			<div class="header__logo">
				<a href="index.html">
					<h1 class="screen-reader-text">Realand</h1>
					<img src="<?php echo base_url();?>images/logo-tanah.jpg" width="100px" alt="tanah.com">
				</a>
			</div><!-- .header__main -->

			<div class="nav-mobile">
				<a href="#" class="nav-toggle">
					<span></span>
				</a><!-- .nav-toggle -->
			</div><!-- .nav-mobile -->

			<!-- .header__menu -->
					<?php 
						include "menuU.php";
					?>
			<!-- End header__menu -->

			<!--<a href="#" class="header__cta">&plus; Submit Property</a>-->
		</div><!-- .header__main -->
	</div><!-- .container -->
</header>