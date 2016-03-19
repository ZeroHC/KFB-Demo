<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]> <html lang="en"> <!--<![endif]-->
<!--HTML-Head-->
	<head>
		<!--Title-->
		<title>Kent Food Bank</title>
		<!--Meta-->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="Peanut Butter Java - IT305/GRCC">
		<!--Favicon-->
		<link rel="shortcut icon" href="favicon.ico">
		<!--Font-->
		<link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>
		<!--CSS-->
		<link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../assets/css/style.css">	
		<link rel="stylesheet" href="../assets/plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../assets/plugins/parallax-slider/css/parallax-slider.css">
	</head>
	
	<!--Header Include-->
	<?php include 'header.html'; ?>

	<body>
		<div class="wrapper">
			
			<!--Content: Kent Food Bank Presentation-->
			<div class="container content-sm">
				<div class="row margin-bottom-30">
					<div class="col-md-12">
						<div class="service">
							<div class="desc">
								<h4 style="text-align: center">Kent Food Bank</h4>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus
								et magnis dis parturient montes, nascetur ridiculus mus.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		
			<!--Content: TOP 10 Items / Up Coming Events / Facebook Feed-->
			<div class="container content-sm">
				<div class="row margin-bottom-30">
					<!--TOP 10 Items-->
					<div class="col-md-4">
						<div class="service">
							<i class="fa fa-shopping-cart service-icon"></i>
							<div class="desc">
								<h4>TOP 10 Items Needed</h4>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus
								et magnis dis parturient montes, nascetur ridiculus mus.</p>
							</div>
						</div>
					</div>
					<!--Up Coming Events-->
					<div class="col-md-4">
						<div class="service">
							<i class="fa fa-calendar service-icon"></i>
							<div class="desc">
								<h4>Upcoming events</h4>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
							</div>
						</div>
					</div>
					<!--Facebook Feed-->
					<div class="col-md-4">
						<div class="service">
							<i class="fa fa-facebook service-icon"></i>
							<div class="desc">
								<h4>Facebook Feed</h4>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
							</div>
						</div>
					</div>
				</div><!--/row-->
			</div><!--/container-->
		</div><!--/wrapper-->
	
		<!-- Javascript Global-->
		<script type="text/javascript" src="../assets/plugins/jquery/jquery.min.js"></script>
		<script type="text/javascript" src="../assets/plugins/jquery/jquery-migrate.min.js"></script>
		<script type="text/javascript" src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<!-- JS Plugins -->
		<script type="text/javascript" src="../assets/plugins/back-to-top.js"></script>
		<script type="text/javascript" src="../assets/plugins/smoothScroll.js"></script>
		<script type="text/javascript" src="../assets/plugins/parallax-slider/js/modernizr.js"></script>
		<script type="text/javascript" src="../assets/plugins/parallax-slider/js/jquery.cslider.js"></script>
		<script type="text/javascript" src="../assets/plugins/parallax-slider/parallax-slider.js"></script>
		<!-- JS Page Level -->
		<script type="text/javascript" src="../assets/js/app.js"></script>
		<!-- JS Slider -->
		<script type="text/javascript">
			jQuery(document).ready(function() {
				App.init();
			  ParallaxSlider.initParallaxSlider();
			});
		</script>
		<!--[if lt IE 9]>
			<script src="../assets/plugins/respond.js"></script>
			<script src="../assets/plugins/html5shiv.js"></script>
			<script src="../assets/plugins/placeholder-IE-fixes.js"></script>
		<![endif]-->
	</body>
	
	<!--Footer Include-->
	<?php include 'footer.html'; ?>
</html>
