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
						<?php
							if(isset($_POST['submit']))
							{
								if(isset($_POST['d_include']))
								{
									$include = 'Yes';
								}
								else
								{
									$include = 'No';
								}
								
								if(isset($_POST['pick-up_d']))
								{
									$pickup = 'Yes';
								}
								else
								{
									$pickup = 'No';
								}
								
								if(isset($_POST['contribute']))
								{
									$contribute = 'Yes';
									$money = $_POST['money'];
								}
								else
								{
									$contribute = 'No';
									$money = 0;
								}
								
								//send out the summary of sponsor to the staff
								$to = 'hliu10@mail.greenriver.edu';  // Replace with your own email address
								$subject = 'New Annual Donor';
								$message = "Donation Included: " . $include .
											"\r\nPick-up: " . $pickup .
											"\r\nContact Name: " . $_POST['contact_name'] .
											"\r\nPhone Number: " . $_POST['contact_number'] .
											"\r\nItem(s) Description: " . $_POST['description'] .
											"\r\nApproximate Value: " . $_POST['dollar'] .
											"\r\nDonor Name: " . $_POST['donor'] .
											"\r\nDonor Contact Person: " . $_POST['contact_person'] .
											"\r\nPhone: " . $_POST['phone'] .
											"\r\nEmail: " . $_POST['email'] .
											"\r\nCannot Contribute: " . $contribute .
											"\r\nContribution of $: " . $money;
								$headers = 'From: guest@kfb.com';  // Replace with a valid address on your domain
								$authorized = null;  // Check correct value with your hosting company
								
								$mailSent = mail($to, $subject, $message, $headers, $authorized);
								
								?>
									<script>window.location = "thankYouForSponsor.php";</script><?php
							}
						?>
                        <div class="desc">
                            <div class="headline text-center"><i class="fa fa-cutlery icon-md"></i><h2><b>Annual Fundraising Breakfast Raffle</b></h2></div>
                            <div>
                                <form id="raffle" action="<?=$_SERVER['PHP_SELF'];?>" method="post">
                                    <div class="form-group">
                                        <p class="checkbox">
                                            <label><input type="checkbox" id="d_include" name="d_include"><b>My donation is included with this form</b></label>
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <p class="checkbox">
                                            <label><input type="checkbox" id="pick-up_d" name="pick-up_d"><b>Please contact me to have someone pick up my donation</b></label>
                                        </p>
                                        <p>
                                            <label for="contact_name">Contact name:</label>
                                            <input type="text" class="form-control" id="contact_name" name="contact_name">
                                            <label for="number">Phone #</label>
                                            <input type="number" class="form-control" id="contact_number" name="contact_number">
                                        </p>
                                    </div>	
                                    <div class="form-group">
                                        <p>
                                            <label for="description">Item(s) Description:</label>
                                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                            <label for="dollar">Approximate dollar value $</label>
                                            <input type="number" class="form-control" id="dollar" name="dollar">
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <label for="donor">Donor Name(as it should appear on item):</label><br>
                                        <textarea class="form-control" id="donor" name="donor" rows="1"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_person">Donor Contact Person:</label>
                                        <input type="text" class="form-control" id="contact_person" name="contact_person">
                                        <label for="phone">Phone:</label>
                                        <input type="number" class="form-control" id="phone" name="phone">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <p class="checkbox">
                                            <label><input type="checkbox" id="contribute" name="contribute"><b>Sorry, I cannot contribute an Item.</b>
                                            <label for="money"><b>Please accept my contribution of $</b></label>
                                            <input type="number" class="form-control" id="money" name="money">
                                        </p>
                                    </div>
                                    <div class="form-group" style="border-style: solid">
                                        <p>
                                            Contributions of goods are deductible for income tax purposes to the extent
                                            allowed by law.  The Kent Food Bank and Emergency Services with Tax ID # 91-0881434
                                            would like to thank you for your cooperation in helping with our Annual Fundraising Breakfast.
                                            Thank you for your generosity!
                                        </p>
                                    </div>
                                    <div id="submitButton">
										<input type="submit" class="btn-u btn-u-md btn-lg" name="submit" value="Submit"></input>
									</div>
                                </form>
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
