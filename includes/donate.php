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
		<link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../assets/css/style.css">	
		<link rel="stylesheet" href="../assets/plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
	    <link rel="stylesheet" href="../assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">
	    <!--Scripts-->
	    <script src="../assets/plugins/sky-forms-pro/skyforms/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="../assets/plugins/sky-forms-pro/skyforms/js/jquery.form.min.js"></script>
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
	</head>
	
	<!--Header Include-->
	<?php include 'header.html'; ?>

	<body>
		<div class="wrapper">
        <!--Content-->
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
                                <form action="login.php" method="post" id="loginForm" class="sky-form">
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
                
		        <div class="row margin-bottom-30">
                    <div class="headline text-center"><i class="fa fa-gift icon-md"></i><h2><b>Donate</b></h2></div>

					<h2 class="orangeTitle">Online donation and partners rewards program:</h2><br/>
					<div class="col-md-6">
						<!--PayPal-->
						<div class="col-md-12">
							<div class="desc">
                                <div class="headline"><i class="fa fa-paypal icon-md"></i><h2>Donate via PayPal</h2></div>
                                <a href="https://www.paypal.com/webapps/mpp/search-cause?charityId=120598">
                                <img class="centerImg" src="../assets/img/paypal_button.png" alt="PayPal" /></a>
                            </div><br/>
							
						<!--Amazon Smile-->
							<div class="service">
								<div class="desc">
									<div class="headline"><i class="fa fa-amazon icon-md"></i><h2>Amazon Smile</h2></div>
									<a href="https://smile.amazon.com">
									<p class="justifyTexts">• Amazon donates 0.5% of the price of your eligible AmazonSmile purchases to the charitable
										organization of your choice.<br/>
									   • AmazonSmile is the same Amazon you know. Same products, same prices, same service.<br/>
									   • Support your charitable organization by starting your shopping at:</p>
									<img class="amazonLogo" src="../assets/img/amazonSmileLogo.png" alt="Amazon Smile" /></a>
								</div>
							</div>
						</div>			
					</div>
					<!--Fred Meyer-->
					<div class="col-md-6">
						<div class="service">
							<div class="desc">
								<div class="headline"><i class="fa fa-shopping-cart icon-md"></i><h2>Fred Meyer Community Rewards</h2></div>
								<a href="https://www.fredmeyer.com/topic/community-rewards-4">
								<p class="justifyTexts">• Sign up for the Community Rewards program by linking your Fred Meyer Rewards Card to Kent Food Bank.<br/>
								   • Every time you shop and use your Rewards Card, you are helping Kent Food Bank earn a donation!<br/>
								   • You still earn your Rewards Points, Fuel Points, and Rebates, just as you do today.<br/>
								   <b>• Search for us by name, Kent Food Bank or by our NPO # 83698.</b></p><br>
								<img class="fredMeyerLogo" src="../assets/img/fredMeyerLogo.png" alt="Fred Meyer Rewards" /></a>
							</div>
						</div>
					</div>
				</div>
				<!--Events donation-->
				<div class="row margin-bottom-30">
		        <br/>
					
					<div class="heading heading-v6 margin-bottom-40">
                        <h2 class="orangeTitle">Breakfast Fundraiser:</h2>
                    </div>
					<div class="col-md-6">
						<!--Sponsor-->
						<div class="col-md-12">
                            <div class="desc">
                                <div class="headline"><i class="fa fa-credit-card icon-md"></i><h2>Be our Sponsor</h2></div>
                                <p>We have two different payment options, a one-time sponsorship payment or monthly installments. Both options will make a direct difference for families in need</p>
                                <button class="btn-u btn-u-md btn-lg" type="button" id="centerThings" onclick="location.href='sponsorship_form.php';">Sponsorship Form</button>
                            </div>
						</div>			
					</div>
					<!--Raffle-->
					<div class="col-md-6">
                        <div class="desc">
                            <div class="headline"><i class="fa fa-dollar icon-md"></i><h2>Raffle Donation</h2></div>
                            <p>In every October, we will be hosting a Annual Fundraising Breakfast Raffle,
                                if you are interested, you could click on "Get the Form" button down below to see the form.
                            </p>
                            <button class="btn-u btn-u-md btn-lg" type="button" id="centerThings" onclick="location.href='raffle_donation_form.php';">Raffle donation form</button>
                        </div>
					</div>
				</div>
				<!--In person-->
				<div class="row margin-bottom-30">
		        <br/>
		            <div class="heading heading-v6 margin-bottom-40">
                        <h2 class="orangeTitle">In Person:</h2>
                    </div>
					<div class="col-md-6">
						<!--Top 10-->
						<div class="col-md-12">
							<div class="desc">
								<div class="headline"><i class="fa fa-shopping-cart icon-md"></i><h2>Top 10 Items Needed</h2></div>
								<button class="btn-u btn-u-md btn-lg" type="button" id="centerThings" onclick="openWin()">Print this list</button><br/>
								<iframe src="updateTopTen.php"></iframe>
							</div>
						</div>			
					</div>
					<!--Clothing-->
					<div class="col-md-6">
						<div class="service">
							<div class="desc">
								<div class="headline"><i class="fa fa-gift icon-md"></i><h2>Clothing Bank</h2></div>
								<a href="contact.php">
									<p class="justifyTexts">We gently acccepts used men's, women's, children clothing and small household items:<br>
									   <b>Donation hours: </b>Monday, Tuesday, Wednesday and Friday from 9:00am - 2:00pm<br>
									   <b>Location: </b>515 W. Harrison Street, Suite 107 - Kent, WA<br></p>
									<img class="clothingBankLogo" src="../assets/img/clothing-bank.png" /></a>
							</div>
						</div>
					</div>
				</div>
			</div><!--container-->
		</div><!--/wrapper-->
	
		<!-- Javascript Global-->
		<script type="text/javascript" src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<!-- JS Plugins -->
		<script type="text/javascript" src="../assets/plugins/back-to-top.js"></script>
		<script type="text/javascript" src="../assets/plugins/smoothScroll.js"></script>
		<!-- JS Page Level -->
		<script type="text/javascript" src="../assets/js/app.js"></script>
		<!--[if lt IE 9]>
			<script src="../assets/plugins/respond.js"></script>
			<script src="../assets/plugins/html5shiv.js"></script>
			<script src="../assets/plugins/placeholder-IE-fixes.js"></script>
		<![endif]-->
	</body>
	
	<!--Footer Include-->
	<?php include 'footer.html'; ?>
</html>
