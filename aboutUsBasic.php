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
								<ul class="nav nav-tabs">
									<li class="active"><a data-toggle="tab" href="#home"><h4 class = "orangeTitle"><b> Our Mission </b></h4></a></li>
									<li><a data-toggle="tab" href="#menu2"><h4 class = "orangeTitle"><b> Our History </b></h4></a></li>
									<li><a data-toggle="tab" href="#menu3"><h4 class = "orangeTitle"><b> Recent Success and Current Challenges </b></h4> </b></h4></a></li>
								</ul>
								
								<div class="tab-content">
									<div id="home" class="tab-pane fade in active"><br>
										<p class = "justifyTexts">The Kent Food Bank and Emergency Services exist to serve the citizens of the Kent school district area.<br>
											In order to fulfill its mission the Kent Food Bank will:
											<ul>
												<li>Operate a center to supply food, clothing and referrals to persons in need living within the service area. </li>
												<li>Furnish financial assistance in an emergency situation for emergency needs. </li>
												<li>Work in conjunction with government agencies, churches and other organizations to serve the surrounding people. </li>
												<li>Operate primarily as a volunteer agency, obtaining the majority of its support and donations from the community.</li>
											</ul>
										<img class = "centerImg" src="../assets/img/IMG_5072.JPG" alt = "building">
										</p>
										
									</div>
									<div id="menu2" class="tab-pane fade"><br>
										<p class = "justifyTexts">The Kent Food Bank began operations in 1970 as a temporary agency to serve Kent families during an economic recession. It has since grown into a permanent agency, providing for basic needs, food, clothing and shelter to thousands of families yearly. <br><br>
										The Kent Food Bank is one of the founding agencies in developing South County Area Human Service Alliance (SCAHSA) whose mission is to streamline access to human services for low-income individuals and families in South King County by locating multiple providers in a single site known as the Alliance Center, thereby leveraging resources and increasing efficiency. <br><br>
										In the fall of 2004, the Kent Food Bank moved into the Alliance Center. In addition to this facility we operate the Birch Creek Food Bank on the east hill of Kent. This supports our efforts to ensure that low-income families/individuals that need assistance will have ease of access to our services. One of our major goals is to alleviate hunger in our service area, making for a healthy and strong community.<br><br>
										</p>
										<img class = "centerImg" src="../assets/img/IMG_3172.JPG" alt = "stage">
									</div>
									<div id="menu3" class="tab-pane fade"><br>
										<p class = "justifyTexts">In 2010 the food bank was able to upgrade our computer system and hardware to better accommodate our increasing client needs.  Our old program was not upgradable and clients had to wait longer in line while we worked around our program.  A retired Boeing employee wrote a new program in Access that is completly upgradable and is easier for our volunteers.  By doing this clients now wait a fraction of time in line at a food bank.  With the high demand and growth in the last few years the food bank has had to be very creative in ways to meet the demands of the high need.  The number of clients continues to grow and being able to distribute the same amount of nutitious food to all has been difficult.  We rely heavily on donations and the Kent Community has been very genourous and thus far we are doing well and meeting the needs of our clients.</p>
										<img class = "centerImg" src="../assets/img/I am only one.jpg" alt = "imone" width="728" height="528" >
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
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
