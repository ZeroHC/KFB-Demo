<?php
    header('Content-Type: text/html; charset=utf-8');
    session_start();
    //creating a token to be add in the form to prevent CSRF 
    $token = md5(uniqid(rand(), true));
	$_SESSION['token'] = $token;
    $valid = false;
    if (isset($_POST['submit'])) {
        if (!empty($_POST['fname'])) {
            $name = htmlspecialchars($_POST['fname']);
        } else {
            echo "<p>Please enter your First name.</p>";
            $valid = false;
        }
		if (!empty($_POST['lname'])) {
            $name = htmlspecialchars($_POST['lname']);
        } else {
            echo "<p>Please enter your Last name.</p>";
            $valid = false;
        }
		if (!empty($_POST['address'])) {
            $name = htmlspecialchars($_POST['address']);
        } else {
            echo "<p>Please enter your house and street.</p>";
            $valid = false;
        }
		if (!empty($_POST['city'])) {
            $name = htmlspecialchars($_POST['city']);
        } else {
            echo "<p>Please enter your city's name.</p>";
            $valid = false;
        }
		if (!empty($_POST['state'])) {
            $name = htmlspecialchars($_POST['state']);
        } else {
            echo "<p>Please enter your state's name.</p>";
            $valid = false;
        }
		if (!empty($_POST['zip_code'])) {
            $name = htmlspecialchars($_POST['zip_code']);
        } else {
            echo "<p>Please enter your zip code.</p>";
            $valid = false;
        }
		if (!empty($_POST['phone'])) {
            $phone = htmlspecialchars($_POST['phone']); 
        } else {
            echo "<p>Please enter your phone number.</p>";
            $valid = false;
		}
        if (!empty($_POST['email'])){
            $email = htmlspecialchars($_POST['email']);
        } else {
            echo "<p>Please enter a email.</p>";
            $valid = false;
        }
        if (!empty($_POST['interest'])){
            $message = htmlspecialchars($_POST['interest']);
        } else {
            echo "<p>Please enter a message.</p>";
            $valid = false;
        }
		if (!empty($_POST['commit'])){
            $message = htmlspecialchars($_POST['commit']);
        } else {
            echo "<p>Please enter a message.</p>";
            $valid = false;
        }
		if (!empty($_POST['impair'])){
            $message = htmlspecialchars($_POST['impair']);
        } else {
            echo "<p>Please enter a message.</p>";
            $valid = false;
        }
        $valid = true;
        if ($valid == true) {    
            $to      = 'harpreetak91@gmail.com';
            $subject = 'Kent Food Bank - Contact via Website';
            $message2 = 'Name: '.$name."\r\n".'Email: '.$email."\r\n".'Phone: '.$phone."\r\n".'Message: '.$message;
            $headers = 'From: webmaster@example.com' . "\r\n" .
                        'Reply-To: webmaster@example.com' . "\r\n";
            mail($to, $subject, $message2, $headers);
        } else { $valid = false; }
    }    
    
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
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
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
				$("#volunteerform").validate({
                    highlight: function (element) {
                       $(element).closest('.input').removeClass().addClass('input state-error');
                    },
                    success: function (label, element) {
                        $(element).closest('.input').removeClass().addClass('input state-success');
                    },
                    rules: {
                         fname: {
                            required: true
                         },
						 lname: {
                            required: true
                         },
						 address: {
                            required: true
                         },
						 city: {
                            required: true
                         },
						 state: {
                            required: true
                         },
						 zip_code: {
                            required: true
                         },
						 phone: {
							required: true,
                            phone:true
                         },
                         email: {
                            required: true,
                            email: true
                         },
						 interest: {
                            required: true
                         },
						 commit: {
                            required: true
                         },
						 impair: {
                            required: true
                         }
                    },
                    messages: {
                        fname: {
                            required: "First name required"
                        },
						lname: {
                            required: "Last name required"
                        },
						city: {
                            required: "City required"
                        },
						state: {
                            required: "State required"
                        },
						zip_code: {
                            required: "Zip code required"
                        },
						phone: {
                            phoneUS: "Invalid phone format"
                        },
                        email: {
                            required: "Email required",
                            email: "Invalid email"
                        },
						interest: {
                            required: "Message required"
                        },
						commit: {
                            required: "Message required"
                        },
						impair: {
                            required: "Message required"
                        },
                    }
                });
            });
        </script>
        <!-- Client-side login validation with JQuery -->
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
                       
<div class="headline text-center"><i class="fa fa-hand-peace-o icon-md"></i><h2><b>Volunteer</b></h2></div>

<?php
/*if (isset($_POST['btn_sub'])) {
	//validate first name
            if (!empty($_POST['fname']) && ctype_alpha($_POST['fname'])) {
                $name = $_POST['fname'];
            } else {
                echo "<p>Please enter your First name.</p>";
                $valid = false;
            }
			
		//validate last name
            if (!empty($_POST['lname']) && ctype_alpha($_POST['lname'])) {
                $name = $_POST['lname'];
            } else {
                echo "<p>Please enter your Last name.</p>";
                $valid = false;
            }
			
		//validate Street Address
            if (!empty($_POST['address']) && ctype_alnum($_POST['address'])) {
                $name = $_POST['address'];
            } else {
                echo "<p>Please enter your Street Address.</p>";
                $valid = false;
            }
			
		//validate City
            if (!empty($_POST['city']) && ctype_alpha($_POST['city'])) {
                $name = $_POST['city'];
            } else {
                echo "<p>Please enter your City.</p>";
                $valid = false;
            }
			
		//validate State
            if (!empty($_POST['state']) && ctype_alpha($_POST['state'])) {
                $name = $_POST['state'];
            } else {
                echo "<p>Please enter your State.</p>";
                $valid = false;
            }
			
		//validate Zip code
            if (!empty($_POST['zip_code']) && ctype_digit($_POST['zip_code'])) {
                $name = $_POST['zip_code'];
            } else {
                echo "<p>Please enter your Zip Code.</p>";
                $valid = false;
            }
			
		//validate Phone Number
            if (!empty($_POST['phone']) && ctype_digit($_POST['phone'])) {
                $name = $_POST['phone'];
            } else {
                echo "<p>Please enter your Phone Number.</p>";
                $valid = false;
            }
			
		//validate Email
            if (!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $name = $_POST['email'];
            } else {
                echo "<p>Please enter your Email.</p>";
                $valid = false;
            }
	}*/
	?>
                            <div class="desc">
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="volunteerform" class="sky-form" >
                                    <fieldset>
										<?php
                                        if ($valid) {
                                            echo "<h5>
Thank you for your interest in volunteering with the Kent Food Bank, our agency has volunteer positions to accommodate many different schedules, physical abilities and interests.

Volunteers are a vital part of our ability to provide the basic needs of our community. Thanks to people like you, we are able to spend 99 cents of every dollar donated on direct client services. Last year, volunteers donated more than 20,000 hours to support Kent Food Bank. Without our caring and dedicated volunteers we cannot achieve our mission to end hunger.

Once again, thank you for your interest.  A staff member will be in contact with you to set up orientation.

Jeniece Choate, Executive Director
Kent Food Bank and Emergency Services </h5>";
                                        }
                                    ?>
										
										<font color="red"> Fields with * are required to be filled before submitting.</font>  <br><br>
										<label>Application Type<span class="color-red">*</span></label>
										<div>
											<span id="notCrime"><input type="radio" name="applicationType" value="individual"
												<?php if (isset($individual) && $individual=="individual") echo "checked"; ?> value="individual"> Individual
												
											<input type="radio" name="applicationType" value="group"
												<?php if (isset($group) && $group=="group") echo "checked"; ?> value="group"> Group
												
											<input type="radio" name="applicationType" value="org"
												<?php if (isset($org) && $org=="org") echo "checked"; ?> value="org"> Organization
												
											<input type="radio" name="applicationType" value="school"
												<?php if (isset($school) && $school=="school") echo "checked"; ?> value="school"> School </span>
											
											<input type="radio" name="applicationType" value="communityService" id="court"
												<?php if (isset($communityService) && $communityService=="communityService") echo "checked"; ?> value="communityService"> Court Ordered Community Service <br>
								           <span  id="crimeRadio">
											<input  type="checkbox" value="iHave" id = "fraud"> I have committed theft, fraud, assault, or a crime against children. <br>
										    <input  type="checkbox" value="yes"> I am able to lift 40 pounds. <br>
										    <p>Your signature is required on the bottom of this form.</p> <br>
										   </span> <br>
											<span id="qualify">
												<p><span class="color-red">**We are sorry. You do not qualify to complete your community service at the Kent Food Bank. Please call 211 to find other community service agencies.</span></p>
											</span>		
                                        </div><br>
										
								<span id = "form">
									<div class="row sky-space-20">
										<div class="col-xs-6 col-md-offset-0">	
											<label>First Name <span class="color-red">*</span></label>
												<div class="input">
													<input type="text" name="fname" id="fname" class="form-control" value ="<?php echo $fname; ?>">
												</div>    
											</div>
										<div class="col-xs-6 col-md-offset-0">	
										<label>Last Name <span class="color-red">*</span></label>
                                            <input type="text" name="lname" id="lname" class="form-control" value ="<?php echo $lname; ?>" >
                                        </div>
									</div> <!--row-->
									
								<!--Address-->
									<div class="row sky-space-20">
										<div class="col-xs-6 col-md-offset-0">
											<label>Address <span class="color-red">*</span></label>
												<div class="input">
													<input type="text" name="address" id="address" class="form-control" value ="<?php echo $address; ?>">
												</div>
										</div>
										<div class="col-xs-6 col-md-offset-0">	
											<label>City <span class="color-red">*</span></label>
                                             <div class="input">
                                                 <input type="text" name="city" id="city" class="form-control" value ="<?php echo $city; ?>" >
                                             </div>
										</div>
										<div class="col-xs-6 col-md-offset-0">
										<label>State <span class="color-red">*</span></label>
                                            <div class="input">
                                                <input type="text" name="state" id="state" class="form-control" value ="<?php echo $state; ?>">
                                            </div>
										</div>
										<div class="col-xs-6 col-md-offset-0">
										<label>Zip code <span class="color-red">*</span></label>
                                            <div class="input">
                                                <input type="text" name="zip_code" id="zip_code" class="form-control" value ="<?php echo $zip_code; ?>">
                                            </div>
										</div>
									</div> <!--row-->

								<div class="row sky-space-20">
									<div class="col-xs-6 col-md-offset-0">
                                        <label>Phone <span class="color-red">*</span></label>
                                            <div class="input">
                                                <input type="text" name="phone" id="phone" class="form-control" placeholder="(123)456-7890" value ="<?php echo $phone; ?>">
                                            </div>
									</div>
									<div class="col-xs-6 col-md-offset-0">		
										<label>Email <span class="color-red">*</span></label>
                                            <div class="input">
                                                <input type="text" name="email" id="email" class="form-control" placeholder="name@domain.com" value ="<?php echo $email; ?>">
                                            </div>	
									</div>
								</div>
							<br>
										<label>Volunteer Opportunities</label> (Check all that apply) <br>
											<div>
												<input type="radio" name="clothing"
											<?php if (isset($clothing) && $clothing=="clothing") echo "checked"; ?> value="clothing"> Clothing: Volunteers receive, sort and organize donated clothing and assisting clients in their shopping <br>
											</div>
											<div>
												<input type="radio" name="office"
											<?php if (isset($office) && $office=="office") echo "checked"; ?> value="office"> Office: Volunteers register clients by computer check in through a one on one client interview process and verify information. Assist with resource referral and other needs.<br>
											</div>
											<div>
												<input type="radio" name="food"
											<?php if (isset($food) && $food=="food") echo "checked"; ?> value="food"> Food:  Volunteers receive, unload, sort and organize donate items from the community.  Assist clients one on one with their food line selections.<br>
											</div>
											<div>
												<input type="radio" name="driver"
											<?php if (isset($driver) && $driver=="driver") echo "checked"; ?> value="driver"> Driver: Volunteers will help the staff with pick-ups/drop-offs. <br><br>
											</div>

                                        <label>Why are you interested in volunteering at the Kent Food Bank? <span class="color-red">*</span></label>
                                            <div class="input">
                                                <textarea rows="3" name="interest" id="interest" class="form-control" value ="<?php echo $interest; ?>"></textarea>
                                            </div>
											<br>
										
									<!--available-->	
										<label>Are you able to make a commitment of at least three (3) months one day a week<br> (M, T, W or F from 9 am - 2:30pm)? If no , what is your availability? <span class="color-red">*</span></label><br>
										
											<input type="radio" name="availabe"
											<?php if (isset($yes) && $yes=="yes") echo "checked"; ?> value="Monday"> Monday <br>
											<input type="radio" name="availabe"
											<?php if (isset($yes) && $yes=="yes") echo "checked"; ?> value="Tuesday"> Tuesday <br>
											<input type="radio" name="availabe"
											<?php if (isset($yes) && $yes=="yes") echo "checked"; ?> value="Wednesday"> Wednesday <br>
											<input type="radio" name="availabe"
											<?php if (isset($yes) && $yes=="yes") echo "checked"; ?> value="Friday"> Friday <br>
											<div class="input">
                                                <textarea rows="4" name="commit" id="commit" class="form-control" placeholder="What days and times are you available?" value ="<?php echo $commit; ?>"></textarea>
                                            </div>
											<br>
											
									<!--lifting-->	
										<label>Are you able to lift 10 pounds? <span class="color-red">*</span></label><br>
										<input type="radio" name="lifting"
											<?php if (isset($yes) && $yes=="yes") echo "checked"; ?> value="yes"> Yes <br>
										<input type="radio" name="lifting"
											<?php if (isset($no) && $no=="no") echo "checked"; ?> value="no"> No
										<br><br>
										
									<!--limitations-->	
										<label>Do you have any physical limitations that would impair your ability to perform as a volunteer without supplemental assistance? If yes please explain? <span class="color-red">*</span></label><br>
										<input type="radio" name="limitations"
											<?php if (isset($no) && $no=="no") echo "checked"; ?> value="no"> No
												<div class="input">
													<textarea rows="2" name="impair" id="impair" class="form-control" value ="<?php echo $impair; ?>"></textarea>
												</div>
											<br>
									
									<!--Any questions-->
										<label>Any questions for or about the food bank? </label><br>
											<div>
													<textarea rows="2" name="message" id="message" class="form-control" ></textarea>
											</div>
							</span>

								<br>
								<p>
                                    <span id="centerThings"><button type="submit" id="centerThings" class="btn-u btn-u-md btn-lg" name="btn_sub" >Submit</button></span>   
                                    </p>
                                </fieldset>
							</div>        
                        </form>
                    </div> <!--/col-->
		
		<!--jquery for community service-->
			<script>
			$( document ).ready(function() {
                $("#crimeRadio").hide();
				$("#qualify").hide();
            })
            $("#court").click(function(){
                $("#crimeRadio").show();
            });
			$("#crimeRadio").click(function(){
                $("#qualify").show();
				$("#form").hide();
            });
            $("#notCrime").click(function(){
                $("#crimeRadio").hide();
				$("#qualify").hide();
				$("#form").show();
            });
		</script>
		
		<!--Footer Include-->
		<?php include 'footer.html'; ?>

        <!-- Javascript Global-->
        <script type="text/javascript" src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <!-- JS Plugins -->
        <script type="text/javascript" src="../assets/plugins/back-to-top.js"></script>
        <script type="text/javascript" src="../assets/plugins/smoothScroll.js"></script>
        <!-- JS Page Level -->
        <script type="text/javascript" src="../assets/js/app.js"></script>
        