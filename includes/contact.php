<?php
    header('Content-Type: text/html; charset=utf-8');
    session_start();
    //creating a token to be add in the form to prevent CSRF 
    $token = md5(uniqid(rand(), true));
	$_SESSION['token'] = $token;
    $valid = false;
    if (isset($_POST['submit'])) {
        if (!empty($_POST['name'])) {
            $name = htmlspecialchars($_POST['name']);
        } else {
            echo "<p>Please enter a name.</p>";
            $valid = false;
        }
        if (!empty($_POST['email'])){
            $email = htmlspecialchars($_POST['email']);
        } else {
            echo "<p>Please enter a email.</p>";
            $valid = false;
        }
        if (!empty($_POST['phone'])) {
            $phone = htmlspecialchars($_POST['phone']); 
        } 
        if (!empty($_POST['message'])){
            $message = htmlspecialchars($_POST['message']);
        } else {
            echo "<p>Please enter a message.</p>";
            $valid = false;
        }
        $valid = true;
        if ($valid == true) {    
            $to      = 'francisco.gdml@gmail.com';
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
		<!--CSS-->
		<link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../assets/css/style.css">	
		<link rel="stylesheet" href="../assets/plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../assets/plugins/parallax-slider/css/parallax-slider.css">
        <link rel="stylesheet" href="../assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
	    <link rel="stylesheet" href="../assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">
	    <script src="../assets/plugins/sky-forms-pro/skyforms/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="../assets/plugins/sky-forms-pro/skyforms/js/jquery.form.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.js"></script>
        <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.js"></script>
        <script src="https://github.com/igorescobar/jQuery-Mask-Plugin/blob/master/dist/jquery.mask.min.js"></script>
       
        
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
                
                $("#contactForm").validate({
                    highlight: function (element) {
                       $(element).closest('.input').removeClass().addClass('input state-error');
                    },
                    success: function (label, element) {
                        $(element).closest('.input').removeClass().addClass('input state-success');
                    },
                    rules: {
                         name: {
                            required: true
                         },
                         email: {
                            required: true,
                            email: true
                         },
                        phone: {
                            phoneUS:true
                         },
                        message: {
                            required: true
                         },
                    },
                    messages: {
                        name: {
                            required: "Name required"
                        },
                        email: {
                            required: "Email required",
                            email: "Invalid email"
                        },
                        phone: {
                            phoneUS: "Invalid phone format"
                        },
                        message: {
                            required: "Message required"
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
                    <div class="col-md-12">
                     <div class="headline text-center"><i class="fa fa-comments icon-md"></i><h2><b>Contact us</b></h2></div><br/>
                      <div class="col-md-6">
                       
                        <div class="headline"><i class="fa fa-inbox icon-md"></i>
                            <h2>Send a message</h2></div>
                        <div class="desc">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="contactForm" class="sky-form">
                                <fieldset>
                                   <?php
                                        if ($valid) {
                                            echo "<h5 class='color-red'>Thank you for contact us.</h5><h5 class='color-red'> We will reply to you as soon as possible</h5>";
                                        }
                                    ?>
                                    <section>
                                        <label class="input"><span class="color-red">*</span>Name:
                                            <input type="text" name="name" id="name" value ="<?php echo $name; ?>">
                                        </label>
                                    </section>
                                    <section>
                                        <label class="input"><span class="color-red">*</span>Email:
                                            <input type="email" name="email" id="email" value ="<?php echo $email; ?>">
                                        </label>
                                    </section>
                                    <section>
                                        <label class="input">Phone:
                                            <input type="text" name="phone" id="phone" placeholder="(xxx)xxx-xxxx" value ="<?php echo $phone; ?>">
                                        </label>
                                    </section>
                                    <section>
                                        <label class="input"><span class="color-red">*</span>Message:
                                            <textarea rows="8" name="message" id="message" class="form-control" value ="<?php echo $message; ?>"></textarea>
                                        </label>
                                    </section>
                                       <span class="color-red">* Required fields</span>
                                </fieldset>
                                <div class="modal-footer">
                                    <span id="centerThings"><button type="submit" name="submit" id="centerThings" class="btn-u btn-u-md btn-lg" name="btn_sub" >Submit</button></span>
                                </div>
                            </form>
                        </div>
                        <!--/desc-->
                        </div>
                    <!--/col-->

                    <div class="col-md-6">
                        <!--Location-->
                        <div class="headline"><i class="fa fa-globe icon-md"></i>
                            <h2>Location</h2></div>
                        <div class="desc">
                            <p>515 W Harrison St #107, Kent, WA 98032
                                <br> Washignton, US
                                <br> Phone: (253) 520-3550
                                <br>
                            </p>
                            <div id="map"></div>
                        </div>
                    </div>
                    </div>
                </div>
                <!--/row-->
            </div>
            <!--/container-->
        </div>
        <!--/wrapper-->

        <!-- Javascript Global-->
        <script type="text/javascript" src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <!-- JS Plugins -->
        <script type="text/javascript" src="../assets/plugins/back-to-top.js"></script>
        <script type="text/javascript" src="../assets/plugins/smoothScroll.js"></script>
        <script type="text/javascript" src="../assets/plugins/parallax-slider/js/modernizr.js"></script>
        <script type="text/javascript" src="../assets/plugins/parallax-slider/js/jquery.cslider.js"></script>
        <script type="text/javascript" src="../assets/plugins/parallax-slider/parallax-slider.js"></script>
        <!-- JS Page Level -->
        <script type="text/javascript" src="../assets/js/app.js"></script>
        <!-- JS Google Maps -->
        <script>
            function initMap() {
                var mapDiv = document.getElementById('map');
                var map = new google.maps.Map(mapDiv, {
                    center: {
                        lat: 47.382408,
                        lng: -122.238678
                    },
                    zoom: 15
                });
                var marker = new google.maps.Marker({
                    position: {
                        lat: 47.382408,
                        lng: -122.238678
                    },
                    map: map,
                });
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer>
          
          
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