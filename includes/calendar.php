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
		<title>Calendar</title>
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
			<!--Content: Kent Food Bank Hours of Operation-->
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
                        <div class="headline text-center"><i class="fa fa-calendar-check-o icon-md"></i><h2>Annual Events</h2></div>
                        <ul class="nav nav-tabs" id="nav-tab">
                            <?php
                                include '../../etc/db.php';
                                $select_events = 'SELECT SUBSTRING(event_date,6,2) as event_date FROM events WHERE event_status="on" ORDER BY event_date ASC';
                                $results_events = mysqli_query($con, $select_events) or die ("Query Error");
                                while($row_events = mysqli_fetch_array($results_events)) {
                                    $event_date = $row_events['event_date'];
                                    switch ($event_date) {
                                        case 01:
                                            echo '<li><a data-toggle="tab" href="#menu1"><h4 class = "orangeTitle"><b>January</b></h4></a></li>';
                                            break;
                                        case 02:
                                            echo '<li><a data-toggle="tab" href="#menu2"><h4 class = "orangeTitle"><b>February</b></h4></a></li>';
                                            break;
                                        case 03:
                                            echo '<li><a data-toggle="tab" href="#menu3"><h4 class = "orangeTitle"><b>March</b></h4></a></li>';
                                            break;
                                        case 04:
                                            echo '<li><a data-toggle="tab" href="#menu4"><h4 class = "orangeTitle"><b>April</b></h4></a></li>';
                                            break;
                                        case 05:
                                            echo '<li><a data-toggle="tab" href="#menu5"><h4 class = "orangeTitle"><b>May</b></h4></a></li>';
                                            break;
                                        case 06:
                                            echo '<li><a data-toggle="tab" href="#menu6"><h4 class = "orangeTitle"><b>June</b></h4></a></li>';
                                            break;
                                        case 07:
                                            echo '<li><a data-toggle="tab" href="#menu7"><h4 class = "orangeTitle"><b>July</b></h4></a></li>';
                                            break;
                                        case 08:
                                            echo '<li><a data-toggle="tab" href="#menu8"><h4 class = "orangeTitle"><b>August</b></h4></a></li>';
                                            break;
                                        case 09:
                                            echo '<li><a data-toggle="tab" href="#menu9"><h4 class = "orangeTitle"><b>September</b></h4></a></li>';
                                            break;
                                        case 10:
                                            echo '<li class="active"><a data-toggle="tab" href="#menu10"><h4 class = "orangeTitle"><b>October</b></h4></a></li>';
                                            break;
                                        case 11:
                                            echo '<li><a data-toggle="tab" href="#menu11"><h4 class = "orangeTitle"><b>November</b></h4></a></li>';
                                            break;
                                        case 12:
                                            echo '<li><a data-toggle="tab" href="#menu12"><h4 class = "orangeTitle"><b>December</b></h4></a></li>';
                                            break;
                                        default:
                                           break;
                                    }
                                }
                            ?>
                        </ul>
                        <div class="tab-content">
                            <div id="menu1" class="tab-pane fade in active"><br>
                                <?php
                                    include '../../etc/db.php';
                                    $select_events = 'SELECT id_event,event_name, description,SUBSTRING(event_date,6,2) as event_date FROM events WHERE event_status="on";';
                                    $results_events = mysqli_query($con, $select_events) or die ("Query Error");
                                    while($row_events = mysqli_fetch_array($results_events)) {
                                        $id_event = $row_events['id_event'];
                                        $event_name = $row_events['event_name'];
                                        $event_date = $row_events['event_date'];
                                        $description = $row_events['description'];
                                        if ($event_date == "01") {
                                        echo "<div class='tag-box tag-box-v2 box-shadow shadow-effect-1'>
                                                <h2>$event_name</h2>
                                                <p>$description</p></div>";
                                        }
                                    }
                                ?>
                            </div>
                            <div id="menu2" class="tab-pane fade"><br>
                                <?php
                                    include '../../etc/db.php';
                                    $select_events = 'SELECT id_event,event_name, description,SUBSTRING(event_date,6,2) as event_date FROM events WHERE event_status="on";';
                                    $results_events = mysqli_query($con, $select_events) or die ("Query Error");
                                    while($row_events = mysqli_fetch_array($results_events)) {
                                        $id_event = $row_events['id_event'];
                                        $event_name = $row_events['event_name'];
                                        $event_date = $row_events['event_date'];
                                        $description = $row_events['description'];
                                        if ($event_date == "02") {
                                        echo "<div class='tag-box tag-box-v2 box-shadow shadow-effect-1'>
                                                <h2>$event_name</h2>
                                                <p>$description</p></div>";
                                        }
                                    }
                                ?>
                            </div>
                            <div id="menu3" class="tab-pane fade"><br>
                               <?php
                                    include '../../etc/db.php';
                                    $select_events = 'SELECT id_event,event_name, description,SUBSTRING(event_date,6,2) as event_date FROM events WHERE event_status="on";';
                                    $results_events = mysqli_query($con, $select_events) or die ("Query Error");
                                    while($row_events = mysqli_fetch_array($results_events)) {
                                        $id_event = $row_events['id_event'];
                                        $event_name = $row_events['event_name'];
                                        $event_date = $row_events['event_date'];
                                        $description = $row_events['description'];
                                        if ($event_date == "03") {
                                        echo "<div class='tag-box tag-box-v2 box-shadow shadow-effect-1'>
                                                <h2>$event_name</h2>
                                                <p>$description</p></div>";
                                        }
                                    }
                                ?>
                            </div>
                            <div id="menu4" class="tab-pane fade"><br>
                                <?php
                                    include '../../etc/db.php';
                                    $select_events = 'SELECT id_event,event_name, description,SUBSTRING(event_date,6,2) as event_date FROM events WHERE event_status="on";';
                                    $results_events = mysqli_query($con, $select_events) or die ("Query Error");
                                    while($row_events = mysqli_fetch_array($results_events)) {
                                        $id_event = $row_events['id_event'];
                                        $event_name = $row_events['event_name'];
                                        $event_date = $row_events['event_date'];
                                        $description = $row_events['description'];
                                        if ($event_date == "04") {
                                        echo "<div class='tag-box tag-box-v2 box-shadow shadow-effect-1'>
                                                <h2>$event_name</h2>
                                                <p>$description</p></div>";
                                        }
                                    }
                                ?>
                            </div>
                            <div id="menu5" class="tab-pane fade"><br>
                                <?php
                                    include '../../etc/db.php';
                                    $select_events = 'SELECT id_event,event_name, description,SUBSTRING(event_date,6,2) as event_date FROM events WHERE event_status="on";';
                                    $results_events = mysqli_query($con, $select_events) or die ("Query Error");
                                    while($row_events = mysqli_fetch_array($results_events)) {
                                        $id_event = $row_events['id_event'];
                                        $event_name = $row_events['event_name'];
                                        $event_date = $row_events['event_date'];
                                        $description = $row_events['description'];
                                        if ($event_date == "05") {
                                        echo "<div class='tag-box tag-box-v2 box-shadow shadow-effect-1'>
                                                <h2>$event_name</h2>
                                                <p>$description</p></div>";
                                        }
                                    }
                                ?>
                            </div>
                            <div id="menu6" class="tab-pane fade"><br>
                                <?php
                                    include '../../etc/db.php';
                                    $select_events = 'SELECT id_event,event_name, description,SUBSTRING(event_date,6,2) as event_date FROM events WHERE event_status="on";';
                                    $results_events = mysqli_query($con, $select_events) or die ("Query Error");
                                    while($row_events = mysqli_fetch_array($results_events)) {
                                        $id_event = $row_events['id_event'];
                                        $event_name = $row_events['event_name'];
                                        $event_date = $row_events['event_date'];
                                        $description = $row_events['description'];
                                        if ($event_date == "06") {
                                        echo "<div class='tag-box tag-box-v2 box-shadow shadow-effect-1'>
                                                <h2>$event_name</h2>
                                                <p>$description</p></div>";
                                        }
                                    }
                                ?>
                            </div>
                            <div id="menu7" class="tab-pane fade"><br>
                                <?php
                                    include '../../etc/db.php';
                                    $select_events = 'SELECT id_event,event_name, description,SUBSTRING(event_date,6,2) as event_date FROM events WHERE event_status="on";';
                                    $results_events = mysqli_query($con, $select_events) or die ("Query Error");
                                    while($row_events = mysqli_fetch_array($results_events)) {
                                        $id_event = $row_events['id_event'];
                                        $event_name = $row_events['event_name'];
                                        $event_date = $row_events['event_date'];
                                        $description = $row_events['description'];
                                        if ($event_date == "07") {
                                        echo "<div class='tag-box tag-box-v2 box-shadow shadow-effect-1'>
                                                <h2>$event_name</h2>
                                                <p>$description</p></div>";
                                        }
                                    }
                                ?>
                            </div>
                            <div id="menu8" class="tab-pane fade"><br>
                                <?php
                                    include '../../etc/db.php';
                                    $select_events = 'SELECT id_event,event_name, description,SUBSTRING(event_date,6,2) as event_date FROM events WHERE event_status="on";';
                                    $results_events = mysqli_query($con, $select_events) or die ("Query Error");
                                    while($row_events = mysqli_fetch_array($results_events)) {
                                        $id_event = $row_events['id_event'];
                                        $event_name = $row_events['event_name'];
                                        $event_date = $row_events['event_date'];
                                        $description = $row_events['description'];
                                        if ($event_date == "08") {
                                        echo "<div class='tag-box tag-box-v2 box-shadow shadow-effect-1'>
                                                <h2>$event_name</h2>
                                                <p>$description</p></div>";
                                        }
                                    }
                                ?>
                            </div>
                            <div id="menu9" class="tab-pane fade"><br>
                                <?php
                                    include '../../etc/db.php';
                                    $select_events = 'SELECT id_event,event_name, description,SUBSTRING(event_date,6,2) as event_date FROM events WHERE event_status="on";';
                                    $results_events = mysqli_query($con, $select_events) or die ("Query Error");
                                    while($row_events = mysqli_fetch_array($results_events)) {
                                        $id_event = $row_events['id_event'];
                                        $event_name = $row_events['event_name'];
                                        $event_date = $row_events['event_date'];
                                        $description = $row_events['description'];
                                        if ($event_date == "09") {
                                        echo "<div class='tag-box tag-box-v2 box-shadow shadow-effect-1'>
                                                <h2>$event_name</h2>
                                                <p>$description</p></div>";
                                        }
                                    }
                                ?>
                            </div>
                            <div id="menu10" class="tab-pane fade in active"><br>
                                <?php
                                    include '../../etc/db.php';
                                    $select_events = 'SELECT id_event,event_name, description,SUBSTRING(event_date,6,2) as event_date FROM events WHERE event_status="on";';
                                    $results_events = mysqli_query($con, $select_events) or die ("Query Error");
                                    while($row_events = mysqli_fetch_array($results_events)) {
                                        $id_event = $row_events['id_event'];
                                        $event_name = $row_events['event_name'];
                                        $event_date = $row_events['event_date'];
                                        $description = $row_events['description'];
                                        if ($event_date == "10") {
                                        echo "<div class='tag-box tag-box-v2 box-shadow shadow-effect-1'>
                                                <h2>$event_name</h2>
                                                <p>$description</p></div>";
                                        }
                                    }
                                ?>
                            </div>
                            <div id="menu11" class="tab-pane fade "><br>
                                <?php
                                    include '../../etc/db.php';
                                    $select_events = 'SELECT id_event,event_name, description,SUBSTRING(event_date,6,2) as event_date FROM events WHERE event_status="on";';
                                    $results_events = mysqli_query($con, $select_events) or die ("Query Error");
                                    while($row_events = mysqli_fetch_array($results_events)) {
                                        $id_event = $row_events['id_event'];
                                        $event_name = $row_events['event_name'];
                                        $event_date = $row_events['event_date'];
                                        $description = $row_events['description'];
                                        if ($event_date == "11") {
                                        echo "<div class='tag-box tag-box-v2 box-shadow shadow-effect-1'>
                                                <h2>$event_name</h2>
                                                <p>$description</p></div>";
                                        }
                                    }
                                ?>
                            </div>
                            <div id="menu12" class="tab-pane fade"><br>
                                <?php
                                    include '../../etc/db.php';
                                    $select_events = 'SELECT id_event,event_name, description,SUBSTRING(event_date,6,2) as event_date FROM events WHERE event_status="on";';
                                    $results_events = mysqli_query($con, $select_events) or die ("Query Error");
                                    while($row_events = mysqli_fetch_array($results_events)) {
                                        $id_event = $row_events['id_event'];
                                        $event_name = $row_events['event_name'];
                                        $event_date = $row_events['event_date'];
                                        $description = $row_events['description'];
                                        if ($event_date == "12") {
                                        echo "<div class='tag-box tag-box-v2 box-shadow shadow-effect-1'>
                                                <h2>$event_name</h2>
                                                <p>$description</p></div>";
                                        }
                                    }
                                ?>
                            </div>
                        </div>
					</div>
					
					<div class="col-md-6">
						<div class="col-md-12">
                            <div class="headline"><i class="fa fa-clock-o icon-md"></i><h2>Hours of Operation:</h2></div>
                            <p>
                                <b>Food Distribution:</b><span class="color-red"> (Limit two visits per household per month)</span><br/>
                                Monday: 10:00am - 1:00pm @<a class="calendarLink" href="https://goo.gl/maps/GSbHBW5Kw2B2">Birch Creek</a><br>
                                Tuesday, Wednesday, Friday: 10:00am – 1:00pm @<a class="calendarLink" href="https://goo.gl/maps/yNiC9rq93CB2">Main Alliance Location</a><br/>
                                2nd Wednesday of the month: 5:00pm – 6:00pm @<a class="calendarLink" href="https://goo.gl/maps/yNiC9rq93CB2">Main Alliance Location</a><br/>
                                Thursday Seniors (55+): 10:00am - 11:00am @<a class="calendarLink" href="https://goo.gl/maps/yNiC9rq93CB2">Main Alliance Location</a><br/><br>
                                <b>Clothing Distribution:</b><br/>
                                Tuesday, Wednesday, Friday: 10:00am – 12:30pm @<a class="calendarLink" href="https://goo.gl/maps/yNiC9rq93CB2">Main Alliance Location</a><br/>
                                Thursday Seniors (55+): 10:00am - 11:00am @<a class="calendarLink" href="https://goo.gl/maps/yNiC9rq93CB2">Main Alliance Location</a><br/><br>
                                <b>Donation and Business Hours:</b><br/>
                                Tuesday-Friday: 9:00am – 2:00pm @<a class="calendarLink" href="https://goo.gl/maps/yNiC9rq93CB2">Main Alliance Location</a href="https://goo.gl/maps/yNiC9rq93CB2"><br/>
                            </p>
						</div>
					</div>
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="headline"><i class="fa fa-calendar icon-md"></i><h2>Calendar:</h2></div>
						<div class="hidden-xs hidden-sm">
							<div id="cld" class="embed-responsive embed-responsive-4by3">
								<iframe class="embed-responsive-item" src="https://calendar.google.com/calendar/embed?src=lhrchk0rhk6p6q1elfi50qgoj4%40group.calendar.google.com&ctz=America/Los_Angeles" frameborder="0" scrolling="no"></iframe>
							</div>
						</div>
						<div class="visible-xs visible-sm">
							<div id="agd" class="embed-responsive embed-responsive-4by3">
								<iframe class="embed-responsive-item" src="https://calendar.google.com/calendar/embed?mode=AGENDA&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=lhrchk0rhk6p6q1elfi50qgoj4%40group.calendar.google.com&amp;color=%230F4B38&amp;ctz=America%2FLos_Angeles" frameborder="0" scrolling="no"></iframe>
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
