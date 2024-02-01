<!DOCTYPE html>

<html class="no-js">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Aviato E-Commerce Template">
  
  <meta name="author" content="Themefisher.com">

  <title>Kitty | We care because we love</title>

  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/cat.png">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css">
  <!-- Ionic Icon Css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/Ionicons/css/ionicons.min.css">
  <!-- Font Awesome Icon Css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/font-awesome/css/font-awesome.min.css">
  <!-- animate.css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/animate-css/animate.css">
  <!-- Magnify Popup -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/magnific-popup/dist/magnific-popup.css">
  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/slick-carousel/slick/slick-theme.css">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  
  <!-- Example assets -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/carousel/jcarousel.basic.css">
  
  <!-- Custom Stylesheet -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/stylecustom.css">

</head>

<body id="body">

<!-- Header Start -->
<header class="navigation">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- header Nav Start -->
				<nav class="navbar">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="<?php echo base_url(); ?>">
								<img src="<?php echo base_url(); ?>assets/images/logo.png" alt="Logo">
							</a>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="<?php echo base_url(); ?>">Beranda</a></li>
								<!-- <li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Portfolio <span class="ion-ios-arrow-down"></span></a>
									<ul class="dropdown-menu">
										<li><a href="portfolio.html">Portfolio Filter</a></li>
										<li><a href="portfolio-single.html">Portfolio Single</a></li>
									</ul>
								</li> -->
								<li><a href="<?php echo base_url(); ?>article">Artikel</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Forum <span class="ion-ios-arrow-down"></span></a>
									<ul class="dropdown-menu">
										<li><a href="<?php echo base_url(); ?>groups">Semua Forum</a></li>
										<li><a href="<?php echo base_url(); ?>groups/me">Forum Saya</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Konsultasi <span class="ion-ios-arrow-down"></span></a>
									<ul class="dropdown-menu">
										<li><a href="<?php echo base_url(); ?>consultation">Cek</a></li>
										<li><a href="<?php echo base_url(); ?>consultation/history">Jejak Konsultasi</a></li>
									</ul>
								</li>
								<li><a href="<?php echo base_url(); ?>pets">Kucing Saya</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('username');?> <span class="ion-ios-arrow-down"></span></a>
									<ul class="dropdown-menu">
										<li><a href="<?php echo base_url(); ?>profile">Profil</a></li>
										<li><a href="<?php echo base_url(); ?>logout">Keluar</a></li>
									</ul>
								</li>
							</ul>
							</div><!-- /.navbar-collapse -->
							</div><!-- /.container-fluid -->
						</nav>
					</div>
				</div>
			</div>
			</header><!-- header close -->

			<?php 
				$this->load->view($main_view);
			?>

			<!-- footer Start -->
			<footer class="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<p class="copyright">&copy; 2018 <a href="http://www.kittycare.tk">kittycare.tk</a>
							</p>
						</div>
					</div>
				</div>
			</footer>

    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- <script src="js/jquery.counterup.js"></script> -->
    
    <!-- Main jQuery -->
   
    <!-- <script src="https://code.jquery.com/jquery-git.min.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Owl Carousel -->
    <script src="<?php echo base_url(); ?>assets/plugins/slick-carousel/slick/slick.min.js"></script>
    <!--  -->
    <script src="<?php echo base_url(); ?>assets/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <!-- Mixit Up JS -->
    <script src="<?php echo base_url(); ?>assets/plugins/mixitup/dist/mixitup.min.js"></script>
    <!-- <script src="plugins/count-down/jquery.lwtCountdown-1.0.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/plugins/SyoTimer/build/jquery.syotimer.min.js"></script>


    <!-- Form Validator -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.32/jquery.form.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/script.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/carousel/vendor/jquery/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/carousel/dist/jquery.jcarousel.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/carousel/jcarousel.basic.js"></script>


  </body>
  </html>
