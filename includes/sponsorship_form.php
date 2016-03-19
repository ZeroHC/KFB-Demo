<?php
    header('Content-Type: text/html; charset=utf-8');
    session_start();
    //creating a token to be add in the form to prevent CSRF 
    $token = md5(uniqid(rand(), true));
	$_SESSION['token'] = $token;
    require '../../etc/db.php';
	date_default_timezone_set('America/Los_Angeles');
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
			
			<!--Content: Kent Food Bank Presentation-->
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
					<div class="col-md-12">
						<!--validation-->
						<?php
							if(isset($_POST['submit']))
							{
								//see if the form has been submitted
								$isValid = true;
								
								//validate sponsor level
								if(isset($_POST['level']))
								{
									$level = $_POST['level'];
									$levels = array("gold", "silver", "bronze");
							
									if(!in_array($level, $levels))
									{
									  $lvlermsg = "<span class=\"color-red\">Sorry, we don't have this sponsorship level.</span>";
									  $isValid = false;
									}
								}
								else
								{
									$lvlermsg = "<span class=\"color-red\">Please choose a sponsorship level.</span>";
									$isValid = false;
								}
								
								//validate contact name
								if(!empty($_POST['sponsor']))
								{
									$sponsor = trim($_POST['sponsor']);
								}
								else
								{
									$spoermsg = "<span class=\"color-red\">Please enter a contact name.</span>";
									$isValid = false;
								}
								
								//stores company name
								if(!empty($_POST['company']))
								{
									$company = trim($_POST['company']);
								}
								else
								{
									$company = "None";
								}
								
								//validate phone number
								if(!empty($_POST['phone']))
								{
								    $phone = trim($_POST['phone']);
								    
								    if(strlen($phone) != 10 OR !ctype_digit($phone))
								    {
								        $phoermsg = "<span class=\"color-red\">Phone number must be a 10 digit numeric.</span>";
								        $isValid = false;
								    }
									
									$phone = substr_replace($phone, '(', 0, 0);
									$phone = substr_replace($phone, ')', 4, 0);
									$phone = substr_replace($phone, '-', 8, 0);
								}
								else
								{
								    $phoermsg = "<span class=\"color-red\">Please enter a phone number.</span>";
								    $isValid = false;
								}
								
								//validate email address
								if(!empty($_POST['email']))
								{
									$email = trim($_POST['email']);
									if(!filter_var($email, FILTER_VALIDATE_EMAIL))
									{
										$emermsg = "<span class=\"color-red\">Invalid email format.</span>";
										$isValid = false;
									}
								}
								else
								{
									$emermsg = "<span class=\"color-red\">Please enter an email.</span>";
									$isValid = false;
								}
								
								//print out summary
								if($isValid)
								{
									$sponsor = mysqli_real_escape_string($con, $sponsor);
									$company = mysqli_real_escape_string($con, $company);
									$level = mysqli_real_escape_string($con, $level);
									$email = mysqli_real_escape_string($con, $email);
									$phone = mysqli_real_escape_string($con, $phone);
									
									//insert into database
									$sql = "INSERT INTO sponsors(timestamp, sponsor, company, level, phone, email) VALUES(NOW(), '$sponsor', '$company', '$level', '$phone', '$email')";
									$result = @mysqli_query($con, $sql);
									
									//send out the summary of sponsor to the staff
									$to = 'hliu10@mail.greenriver.edu';  // Replace with your own email address
									$subject = 'New Sponsor';
									$message = "Sponsor: " . $sponsor . "\r\nOrganization: " . $company . "\r\nSponsor level: " . $level . "\r\nPhone number: " . $phone . "\r\nEmail: " . $email;
									$headers = 'From: guest@kfb.com';  // Replace with a valid address on your domain
									$authorized = null;  // Check correct value with your hosting company
									
									$mailSent = mail($to, $subject, $message, $headers, $authorized);
									?>
									<script>window.location = "thankYouForSponsor.php";</script><?php
								}
							}
						?>
						
						<div>
							<div class="desc">
								<div class="headline text-center"><i class="fa fa-money icon-md"></i><h2><b>Sponsorship Form</b></h2></div>
								<div id="sponsorForm">
									<div class="form-group" id="sponsorDescription">
										<p>
											We are excited this year to provide you with a number of
											different options to support the Kent Food Bank Annual
											Breakfast with your monetary donations. We have two different
											payment options, a one-time sponsorship payment or monthly
											installments. Both options will make a direct difference for
											families in need.<br>
											<b>Your generosity is greatly appreciated!<br>
											THANK YOU!!!</b>
										</p>
									</div>
									<div class="text-left">
										<p class="color-red">Fields with * are required to be filled before submitting.</p>
									</div>
									<form id="sponsorship" action="<?=$_SERVER['PHP_SELF'];?>" method="post">
										<div>
											<label>Choose a sponsorship level:<span class="color-red">*</span><?php if(isset($lvlermsg)){echo $lvlermsg;}?></label>
											<div class="form-group">
												<p class="radio">
													<label class="lb"><input type="radio" name="level" value="gold" <?php if (isset($_POST['level']) && $_POST['level']=='gold' ){echo ' checked="checked"';}?>>
														<b>Gold</b><br>
														<b>$3,000 or $250 per month for a year</b><br>
														<i class="fa fa-caret-right icon-sm"></i>Logo and name recognition on printed materials<br>
														<i class="fa fa-caret-right icon-sm"></i>Logo and name recognition in annual report<br>
														<i class="fa fa-caret-right icon-sm"></i>Logo and name recognition on our Facebook page<br>
														<i class="fa fa-caret-right icon-sm"></i>Verbal recognition day of event<br>
														<i class="fa fa-caret-right icon-sm"></i>Each Table of Honor guest will receive 7 raffle tickets<br>
														<i class="fa fa-caret-right icon-sm"></i>Certificate of Appreciation
													</label>
												</p>
											</div>
											<div class="form-group">
												<p class="radio">
													<label class="lb"><input type="radio" name="level" value="silver" <?php if (isset($_POST['level']) && $_POST['level']=='silver' ){echo ' checked="checked"';}?>>
														<b>Silver</b><br>
														<b>$1,500 or $150 per month for a year</b><br>
														<i class="fa fa-caret-right icon-sm"></i>Logo and name recognition on printed materials<br>
														<i class="fa fa-caret-right icon-sm"></i>Name recognition in annual report<br>
														<i class="fa fa-caret-right icon-sm"></i>Logo and name recognition on our Facebook page<br>
														<i class="fa fa-caret-right icon-sm"></i>Verbal recognition day of event<br>
														<i class="fa fa-caret-right icon-sm"></i>Each Table of Honor guest will receive 3 raffle tickets
													</label>
												</p>
											</div>	
											<div class="form-group">
												<p class="radio">
													<label class="lb"><input type="radio" name="level" value="bronze" <?php if (isset($_POST['level']) && $_POST['level']=='bronze' ){echo ' checked="checked"';}?>>
														<b>Bronze</b><br>
														<b>$1,000 or $80 per month for a year</b><br>
														<i class="fa fa-caret-right icon-sm"></i>Name recognition on printed materials<br>
														<i class="fa fa-caret-right icon-sm"></i>Name recognition in annual report<br>
														<i class="fa fa-caret-right icon-sm"></i>Name recognition on our Facebook page<br>
														<i class="fa fa-caret-right icon-sm"></i>Verbal recognition day of event<br>
														<i class="fa fa-caret-right icon-sm"></i>Table of Honor at event
													</label>
												</p>
											</div>
										</div>
										<div id="sponsorInfo">
											<div class="row sky-space-20">
											    <div class="col-xs-3 col-md-offset-0">
											        <label>Contact Name:<span class="color-red">*</span><?php if(isset($spoermsg)){echo $spoermsg;}?></label>
													<div>
											            <input type="text" name="sponsor" id="sponsor" class="form-control" value="<?php echo isset($_POST['sponsor']) ? htmlentities($_POST['sponsor']) : '' ?>">
											        </div>
											    </div>
											    <div class="col-xs-5 col-md-offset-0">
													<label>Business/Organization:<?php if(isset($comermsg)){echo $comermsg;}?></label>
													<div>
											            <input type="text" name="company" id="company" class="form-control" value="<?php echo isset($_POST['company']) ? htmlentities($_POST['company']) : '' ?>">
											        </div>
											    </div>
											</div>
											<div class="row sky-space-20">
												<div class="col-xs-3 col-md-offset-0">
													<label>Phone:<span class="color-red">*</span><?php if(isset($phoermsg)){echo $phoermsg;}?></label>
											        <div>
											            <input type="text" name="phone" id="phone" class="form-control" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>">
											        </div>
											    </div>
											    <div class="col-xs-5 col-md-offset-0">
											        <label>Email:<span class="color-red">*</span><?php if(isset($emermsg)){echo $emermsg;}?></label>
													<div>
											            <input type="email" name="email" id="email" class="form-control" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
											        </div>
											    </div>
											</div>
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
			</div>
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
