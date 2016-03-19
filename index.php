<?php
    header('Content-Type: text/html; charset=utf-8');
    session_start();
    //creating a token to be add in the form to prevent CSRF 
    $token = md5(uniqid(rand(), true));
	$_SESSION['token'] = $token;
    
?>
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
		<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/style.css">	
		<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/plugins/parallax-slider/css/parallax-slider.css">
        <link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
	    <link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">
	    <script src="assets/plugins/sky-forms-pro/skyforms/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="assets/plugins/sky-forms-pro/skyforms/js/jquery.form.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.js"></script>
        <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.js"></script>
        
	    <!-- Client-side form validation with JQuery -->
        <script>
            $(document).ready(function(){
                $("#loginForm").validate({
                    highlight: function (element) {
                       $(element).closest('.input').removeClass().addClass('input state-error');
                    },
                    success: function (label, element) {
                        $(element).closest('.input').removeClass().addClass('input state-success');
                    },
                    rules: {
                         user: {
                            required: true
                         },
                         pwd: {
                            required: true
                         },
                    },
                    messages: {
                        user: {
                            required: "Username required"
                        },
                        pwd: {
                            required: "Password required"
                        },
                    }
                });
            });
        </script>
        <!--Print Top Ten-->
        <script>
            function openWin(){
                var params = [
                    'height='+screen.height,
                    'width='+screen.width,
                    'fullscreen=yes' // only works in IE, but here for completeness
                ].join(',');
                     // and any other options from
                     // https://developer.mozilla.org/en/DOM/window.open
                
                var myWindow=window.open('','','width=1024,height=768');
                myWindow.document.write("<h1>Kent Food Bank</h1>");
                
                myWindow.document.write("<h3>Address:</h3>");
                myWindow.document.write("515 W Harrison St #107, Kent, WA 98032. Phone: (253) 520-3550<br/><br/>");
                
                myWindow.document.write("<h3>Hours of Operation:</h3>");
                myWindow.document.write("<b>Food Distribution (Clients may visit twice a month for food service):</b><br/>");
                myWindow.document.write("Tuesday, Wednesday, and Friday 10am-1pm<br/>");
                myWindow.document.write("Second Wednesday of each month 5-6pm at main Alliance location<br/>");
                myWindow.document.write("Thursday Seniors (55+) 10-11am at main Alliance location<br/>");
                myWindow.document.write("Monday 10am - 1pm at Birch Creek<br/>");
                myWindow.document.write("<b>Clothing Distribution:</b><br/>");
                myWindow.document.write("Tuesday, Wednesday, and Friday 10am – 12:30pm at main Alliance location Thursday Seniors (55+) 10-11am at main Alliance location<br/>");
                myWindow.document.write("<b>Donation and Business Hours:</b><br/>");
                myWindow.document.write("Tuesday - Friday 9am-2pm main Alliance location<br/><br/>");
                
                myWindow.document.write("<h3>Top Ten Items Needed:</h3>");
                <?php 
                    include '../etc/db.php';
                    $chkTopTen = 'SELECT * FROM topten';
                    $results_chkTopTen = mysqli_query($con, $chkTopTen) or die ("Query Error");
                    while($rowTopTen = mysqli_fetch_array($results_chkTopTen)) {
                        $id_item = $rowTopTen['id_item'];
                        $item_description = $rowTopTen['item_description'];
                        ?>myWindow.document.write("&#x25a2; - <?php echo $item_description; ?>;<br/>");<?
                    }
                ?>
                myWindow.document.close();
                myWindow.focus();
                myWindow.print();
                myWindow.close();
            }
        </script>
	</head>
	
	<!--Header-->
	<?php include 'includes/header.html'; ?>

	<body>
		<script>
            window.fbAsyncInit = function() {
              FB.init({
                appId      : 'your-app-id',
                xfbml      : true,
                version    : 'v2.5'
              });
            };

            (function(d, s, id){
               var js, fjs = d.getElementsByTagName(s)[0];
               if (d.getElementById(id)) {return;}
               js = d.createElement(s); js.id = id;
               js.src = "//connect.facebook.net/en_US/sdk.js";
               fjs.parentNode.insertBefore(js, fjs);
             }(document, 'script', 'facebook-jssdk'));
        </script>
		
		<div class="wrapper">
			<!--Slider-->
			<div class="slider-inner">
				<div id="da-slider" class="da-slider">
					<!--Slide 1-->
					<div class="da-slide">
						<a href="includes/donate.php">
							<h2><i>Donate:</i> <br /> <i>• Food</i> <br /> <i>• Clothing</i></h2>
							<p><i>Help Kent Food Bank</i></a><br/><br/>
								<a href="https://www.paypal.com/webapps/mpp/search-cause?charityId=120598">
								<img src="assets/img/paypal_button.png" alt="PayPal" /></a></p>
						<a href="includes/donate.php">
							<div class="da-img">
								<img class="img-responsive" src="assets/plugins/parallax-slider/img/slider1-don.png" alt="Donation">
							</div>
						</a>
					</div>
					<!--Slide 2-->
					<div class="da-slide">
						<a href="includes/volunteer.php">
							<h2><i>Join us</i> <br /> <i>Become a</i> <br /> <i>volunteer</i></h2>
							<p><i>Let's make a difference</i> <br /> <i>Together we achieve more</i></p>
							<div class="da-img">
								<img class="img-responsive" src="assets/plugins/parallax-slider/img/slider2-vol.png" alt="Volunteers">
							</div>
						</a>
					</div>
					<!--Slide 3-->
					<div class="da-slide">
						<a href="includes/calendar.php">
							<h2><i>Check our</i> <br /> <i>upcoming</i> <br /> <i>events</i></h2>
							<p><i>Annual</i> <br /> <i>Fundraising</i> <br /> <i>Breakfast Raffle</i></p>
							<div class="da-img">
								<img class="img-responsive" src="assets/plugins/parallax-slider/img/raffleEvent.jpg" alt="Raffle Event" />
							</div>
						</a>
					</div>
					<!--Arrows-->
					<div class="da-arrows">
						<span class="da-arrows-prev"></span>
						<span class="da-arrows-next"></span>
					</div>
				</div><!--/da-slider-->
			</div><!--/slider-->
			
			<!--Container-->
			<div class="container content-sm">
           
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                    <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Login</h4> 
                            </div>
                            <div class="modal-body">
                                <form action="includes/login.php" method="post" id="loginForm" class="sky-form">
                                    <input type="hidden" name="token" value="<? echo $token; ?>" />
                                       <fieldset>
                                        <section>
                                            <label class="input"><span class="color-red">*</span>Username:
                                                <input type="text" name="user" id="user">
                                            </label>
                                        </section>
                                        <section>
                                            <label class="input"><span class="color-red">*</span>Password:
                                                <input type="password" name="pwd" id="pwd">
                                            </label>
                                        </section>
                                           <span class="color-red">* Required fields</span>
                                    </fieldset>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn-u btn-u-md btn-lg" name="submit" id="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!--/modal-dialog-->
                </div><!--/myModal-->
                
			    <!--page content-->
				<div class="row margin-bottom-30">
						<div class="col-md-12">
                            <div class="desc">
                                <div class="heading heading-v6 margin-bottom-40">
                                    <h2 class="orangeTitle"><b>Welcome</b></h2>
                                    <p class="centerTexts">The Kent Food Bank is one of the larger food banks in South King County. Clients may visit twice a month
                                    for food, monthly for clothes and government commodities. Homeless individuals/families may visit weekly for special quick or “no cook”
                                    food items. The Kent Food Bank provides limited financial assistance for help with basic needs, such as housing/shelter, and utility bills.
                                    Assistance is also given to link individuals with the needed resources in the community. Our services are provided in a manner that builds
                                    on individual’s strengths and encourages self-sufficiency.</p>
                                </div>
                            </div>
						</div>
					<!--Facebook Feed-->
					<div class="col-md-6">
                        <div class="desc">
                            <div class="headline"><i class="fa fa-facebook icon-md"></i><h2>Like us on Facebook</h2></div>
                            <div class="fb-page" data-href="https://www.facebook.com/kentfoodbank/" data-tabs="timeline" data-small-header="true"
                                 data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false" data-width="500" data-height="770">
                                <div class="fb-xfbml-parse-ignore">
                                    <blockquote cite="https://www.facebook.com/kentfoodbank/">
                                        <a href="https://www.facebook.com/kentfoodbank/">Kent Food Bank &amp; Emergency Services</a>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
					</div>
					<!--TOP 10 Items-->
					<div class="col-md-6">
                        <div class="desc">
                            <div class="headline"><i class="fa fa-shopping-cart icon-md"></i><h2>Top 10 Items Needed</h2></div>
                            <button class="btn-u btn-u-md btn-lg" type="button" id="centerThings" onclick="openWin()">Print this list</button><br/>
                            <iframe src="includes/updateTopTen.php"></iframe>
                        </div>
						<!--Up Coming Events-->
						<div class="col-md-12">
							<div class="service">
								<div class="desc">
									<div class="headline"><i class="fa fa-calendar icon-md"></i><h2>Upcoming Events</h2></div>
									<a href="includes/calendar.php">
									<?php
                                        include '../etc/db.php';
                                        $select_events = 'SELECT id_event,event_name, description,SUBSTRING(event_date,6,2) as event_date FROM events WHERE event_status="on" ORDER BY event_date ASC';
                                        $results_events = mysqli_query($con, $select_events) or die ("Query Error");
                                        while($row_events = mysqli_fetch_array($results_events)) {
                                            $id_event = $row_events['id_event'];
                                            $event_name = $row_events['event_name'];
                                            $event_date = $row_events['event_date'];
                                            $description = $row_events['description'];
                                            switch ($event_date) {
                                                case 01:
                                                    echo '<p>&bull; January - '.$event_name.'</p>';
                                                    break;
                                                case 02:
                                                    echo '<p>&bull; February - '.$event_name.'</p>';
                                                    break;
                                                    break;
                                                case 03:
                                                    echo '<p>&bull; March - '.$event_name.'</p>';
                                                    break;
                                                    break;
                                                case 04:
                                                    echo '<p>&bull; April - '.$event_name.'</p>';
                                                    break;
                                                    break;
                                                case 05:
                                                    echo '<p>&bull; May - '.$event_name.'</p>';
                                                    break;
                                                    break;
                                                case 06:
                                                    echo '<p>&bull; June - '.$event_name.'</p>';
                                                    break;
                                                    break;
                                                case 07:
                                                    echo '<p>&bull; July - '.$event_name.'</p>';
                                                    break;
                                                    break;
                                                case 08:
                                                    echo '<p>&bull; August - '.$event_name.'</p>';
                                                    break;
                                                    break;
                                                case 09:
                                                    echo '<p>&bull; September - '.$event_name.'</p>';
                                                    break;
                                                    break;
                                                case 10:
                                                    echo '<p>&bull; October - '.$event_name.'</p>';
                                                    break;
                                                    break;
                                                case 11:
                                                    echo '<p>&bull; November - '.$event_name.'</p>';
                                                    break;
                                                    break;
                                                case 12:
                                                    echo '<p>&bull; December - '.$event_name.'</p>';
                                                    break;
                                                    break;
                                                default:
                                                   break;
                                            }
                                        }
                                    ?></a>
								</div>
							</div>
						</div>					
					</div><!--/col-->
				</div><!--/row-->
			</div><!--/container-->
		</div><!--/wrapper-->
	
		<!-- Javascript Global-->
		<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<!-- JS Plugins -->
		<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
		<script type="text/javascript" src="assets/plugins/smoothScroll.js"></script>
		<script type="text/javascript" src="assets/plugins/parallax-slider/js/modernizr.js"></script>
		<script type="text/javascript" src="assets/plugins/parallax-slider/js/jquery.cslider.js"></script>
		<script type="text/javascript" src="assets/plugins/parallax-slider/parallax-slider.js"></script>
		<!-- JS Page Level -->
		<script type="text/javascript" src="assets/js/app.js"></script>
		<!-- JS Slider -->
		<script type="text/javascript">
			$(document).ready(function() {
				App.init();
			  ParallaxSlider.initParallaxSlider();
			});
		</script>
		<!--[if lt IE 9]>
			<script src="assets/plugins/respond.js"></script>
			<script src="assets/plugins/html5shiv.js"></script>
			<script src="assets/plugins/placeholder-IE-fixes.js"></script>
		<![endif]-->
	</body>
	
	<!--Footer-->
	<?php include 'includes/footer.html'; ?>
</html>
