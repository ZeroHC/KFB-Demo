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
							<div class="desc">
							     <div class="headline text-center"><i class="fa fa-newspaper-o icon-md"></i><h2><b>Services</b></h2></div>
								<p class = "justifyTexts">The Kent Food Bank provides the following client services: food assistance, food delivery service to a low income senior housing complex, emergency food bags off site, two food bank distribution locations, evenings hours, holiday distributions, clothing bank, limitied financial assitance and homeless food bags.</p>
								
								<p class = "justifyTexts">The KFB is open four days a week at the Alliance Center in downtown Kent and operates a second location one day a week in the Birch Creek Apartment Complex on the top of East Hill Kent.  The Alliance Center distribution operates M, T, W and F from 10am - 2pm with the clothing bank 10am-12:30pm.  The Birch Creek Annex is open for distribution of food on Thursdays from 10am - 1pm.  Along with the 19 hours of distribution the food bank is open for 1 hour on the second Wednesday of each month to better accommodate working families with supplemental food.  The KFB offers all of our services with a self-select method of distribution.  Clients may choose their own food from the available resources. For more deatailed hours of operation please follow the link to our <a href = "calendar.php" class="calendarLink">calendar page</a>. 
								</p>
								<br>								
								
								<div class="heading heading-v6 margin-bottom-40">
                                    <h2 class="orangeTitle">To obtain a Food Bank Card:</h2>
                                </div>
								<p>Please bring the following items: </p>
								<ul>
									<li>Picture Identification</li>
									<li>Current proof-of-address:</li>
										<ul>
											<li>For <b>each</b> adult: Current mail, lease or bill not older than 30 days</li>
											<li>For <b>each</b> school-aged child: Current piece of mail or proof of enrollment in Kent School District</li>
											<li>For younger children: Birth Certificate</li>
										</ul>
								</ul>
								
								<p class = "centerTexts">*To Receive FULL SERVICE Each Household MUST Have a <b>CURRENT</b> Food Bank Card* </p>
								<p> You MUST bring these items to EACH visit:
								<ul>
									<li>Picture Identification</li>
									<li>Current Food Banck card</li>
								</ul>
								</p>
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
