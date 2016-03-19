<?php
    header('Content-Type: text/html; charset=utf-8');
    session_start();

    /*ini_set("display_errors",true);
    error_reporting(E_ALL); */
    if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
        include '../../etc/db.php';
        
        $chkUser = 'SELECT * FROM users WHERE username = "'.$_SESSION['username'].'" and password = "'.$_SESSION['password'].'"';
        $result_chkUser = mysqli_query($con,$chkUser); 
        $numLinesFound = mysqli_num_rows($result_chkUser); 
        $lineInfo = mysqli_fetch_object($result_chkUser); 
        $username = $lineInfo->username;
        $password = $lineInfo->password;
        if ($username == $_SESSION['username'] && $password == $_SESSION['password'] ){
            $valid = false;
            if (isset($_POST['submitEvent'])) {
                
                //COLOCAR VALIDACAO AQUI
                $valid=true;
                
                if(!strstr($_SERVER['HTTP_REFERER'], "pbj.greenrivertech.net")) die ();
                //db connection
                require('../../etc/db.php');

                //using prepare statments and bind variables and htmlentities to prevent injection
                $insertQuery = "INSERT INTO team1_kfb.events (id_event, event_name, event_date, description, event_status) VALUES (?,?,?,?,?)";    
                $stmt = $con->prepare($insertQuery);
                $stmt->bind_param("issss",$id_event, $event_name, $event_date, $description, $event_status);
                $event_name = htmlspecialchars($_POST['event_name']);
                $event_date = htmlspecialchars($_POST['event_date']);
                $description = htmlspecialchars($_POST['description']);
                $event_status = htmlspecialchars('on');
                $stmt->execute();
                $stmt->close();  
            } else { 
                $valid = false; 
            }
    
?>
<!DOCTYPE html>
<html>
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
	    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css">
        <link rel="stylesheet" href="../assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
	    <link rel="stylesheet" href="../assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">
	    <!--Scripts-->
	    <script src="../assets/plugins/sky-forms-pro/skyforms/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="../assets/plugins/sky-forms-pro/skyforms/js/jquery.form.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="http://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
	    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.print.min.js"></script>
        <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.js"></script>
        <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.js"></script>
        
	    <!-- Client-side form validation with JQuery -->
        <script>
            $(document).ready(function(){
                $("#eventsForm").validate({
                    highlight: function (element) {
                       $(element).closest('.input').removeClass().addClass('input state-error');
                    },
                    success: function (label, element) {
                        $(element).closest('.input').removeClass().addClass('input state-success');
                    },
                    rules: {
                         event_name: {
                            required: true
                         },
                         event_date: {
                            required: true
                         },
                        description: {
                            required: true
                         }
                    },
                    messages: {
                        event_name: {
                            required: "Event Name Required"
                        },
                        event_date: {
                            required: "Date Required"
                        },
                        description: {
                            required: "Event Description Required"
                        },
                    }
                });
            });
        </script>
	</head>
	
	<!--Header-->
	<?php include 'header.html'; ?>

	<body>
		<div class="wrapper">
			<!--Container-->
			<div class="container content-sm">
                <div class="headline text-center"><i class="fa fa-edit icon-md"></i><h2><b>Website Administrator Page</b></h2></div><br/>
                <div class="col-md-12">
                        <!--TABS-->
                        <ul class="nav nav-tabs" id="nav-tab">
                            <li class="active"><a data-toggle="tab" href="#menu1"><h4 class = "orangeTitle"><b>List Events</b></h4></a></li>
                            <li><a data-toggle="tab" href="#menu2"><h4 class = "orangeTitle"><b> Create Events</b></h4></a></li>
                            <li><a data-toggle="tab" href="#menu3"><h4 class = "orangeTitle"><b> Sponsors</b></h4></a></li>
                            <li><a data-toggle="tab" href="#menu4"><h4 class = "orangeTitle"><b> Volunteers</b></h4></a></li>
                            <li><a data-toggle="tab" href="#menu5"><h4 class = "orangeTitle"><b> Top Ten Items</b></h4></a></li>
                            <li><a data-toggle="tab" href="#menu6"><h4 class = "orangeTitle"><b> Raffle Donation</b></h4></a></li>
                        </ul>
                        <!--LIST EVENTS-->
                        <div class="tab-content">
                            <div id="menu1" class="tab-pane fade in active"><br>
                              <table id="events_table" class="display" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Turn On/Off</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Turn On/Off</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       <?php 
                                            include '../../etc/db.php';
                                            $query_events = "SELECT * FROM events";
                                            $exec_query_events = mysqli_query($con, $query_events) or die ("Error querying database");
                                            while($row_events = mysqli_fetch_array($exec_query_events)) {
                                                $id_event = $row_events["id_event"];
                                                $event_name = $row_events["event_name"];
                                                $event_date = $row_events["event_date"];
                                                $description = $row_events["description"];
                                                $status = $row_events["event_status"];
                                                echo "
                                                <tr>	
                                                    <td>$id_event</td>
                                                    <td>$event_name</td>
                                                    <td>$event_date</td>
                                                    <td>$description</td>";
                                                    if ($status == "on") { 
                                                        echo "<td><span class='label label-success'>ONLINE</span></td>"; 
                                                        echo "<td><a href='updateEvent.php?status=off&id_event=".$id_event."' class='btn btn-danger'>Turn OFF</a></td>";
                                                    } elseif ($status == "off") {
                                                        echo "<td><span class='label label-danger'>OFFLINE</span></td>"; 
                                                        echo "<td><a href='updateEvent.php?status=on&id_event=".$id_event."' class='btn btn-success'>Turn ON</a></td>";
                                                    } else {die();}
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!--CREATE EVENTS-->
                            <div id="menu2" class="tab-pane fade"><br>
                                <div class="col-md-12">
                                    <h2>Create a Event</h2>
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="eventsForm" class="sky-form">
                                        <fieldset>
                                           <?php
                                                if ($valid) {
                                                    echo "<h5 class='color-red'>Event created</h5><br/>";
                                                }
                                            ?>
                                            <section>
                                                <label class="input"><span class="color-red">*</span>Event Name:
                                                    <input type="text" name="event_name" id="event_name">
                                                </label>
                                            </section>
                                            <section>
                                               <label class="input"><span class="color-red">*</span>Event Date:
                                                    <input type="date" name="event_date" id="event_date">
                                                </label>
                                            </section>
                                            <section>
                                                <label class="input"><span class="color-red">*</span>Description:
                                                    <textarea rows="8" name="description" id="description" class="form-control"></textarea>
                                                </label>
                                            </section>
                                               <span class="color-red">* Required fields</span>
                                        </fieldset>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn-u" name="submitEvent" id="submitEvent">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--SPONSOR TABLE-->
                            <div id="menu3" class="tab-pane fade"><br>
                                <table id="sponsor_table" class="display" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Company</th>
                                            <th>Level</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Registration date/time</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Company</th>
                                            <th>Level</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Registration date/time</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       <?php 
                                            include '../../etc/db.php';
                                            $query_sponsors = "SELECT * FROM sponsors";
                                            $exec_query_sponsors = mysqli_query($con, $query_sponsors) or die ("Error querying database");
                                            while($row_sponsors = mysqli_fetch_array($exec_query_sponsors)) {
                                                $id_sponsor = $row_sponsors["id_sponsor"];
                                                $sponsor = $row_sponsors["sponsor"];
                                                $company = $row_sponsors["company"];
                                                $level = $row_sponsors["level"];
                                                $phone = $row_sponsors["phone"];
                                                $email = $row_sponsors["email"];
                                                $timestamp = $row_sponsors["timestamp"];
                                                echo "
                                                <tr>	
                                                    <td>$id_sponsor</td>
                                                    <td>$sponsor</td>
                                                    <td>$company</td>";
                                                    if ($level == "gold") { 
                                                        echo "<td><span class='label label-warning'>GOLD</span></td>"; 
                                                    } elseif ($level == "silver") {
                                                        echo "<td><span class='label label-default'>SILVER</span></td>";
                                                    } elseif ($level == "bronze") {
                                                        echo "<td><span class='label label-orange'>BRONZE</span></td>";
                                                    } else {die();}
                                                echo "
                                                    <td>$phone</td>
                                                    <td>$email</td>
                                                    <td>$timestamp</td>
                                                </tr>
                                                ";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!--VOLUNTEER TABLE-->   
                            <div id="menu4" class="tab-pane fade"><br>  
                                <table id="volunteer_table" class="display" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Applic. Type</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Opportunities</th>
                                            <th>Interest</th>
                                            <th>Availability</th>
                                            <th>Able Lift</th>
                                            <th>Limitations</th>
                                            <th>Questions</th>
                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Applic. Type</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Opportunities</th>
                                            <th>Interest</th>
                                            <th>Availability</th>
                                            <th>Able Lift</th>
                                            <th>Limitations</th>
                                            <th>Questions</th>
                                        </tr>
                                    </tfoot>

                                    <tbody>
                                       <?php 
                                            include '../../etc/db.php';
                                            $query_volunteers = "SELECT * FROM volunteers";
                                            $exec_query_volunteers = mysqli_query($con, $query_volunteers) or die ("Error querying database");

                                            while($row_volunteers = mysqli_fetch_array($exec_query_volunteers)) {

                                                $id_volunteer = $row_volunteers["id_volunteer"];
                                                $application_type = $row_volunteers["application_type"];
                                                $first_name = $row_volunteers["first_name"];
                                                $last_name = $row_volunteers["last_name"];
                                                $phone = $row_volunteers["phone"];
                                                $email = $row_volunteers["email"];
                                                $opportunities = $row_volunteers["opportunities"];
                                                $interest = $row_volunteers["interest"];
                                                $availability = $row_volunteers["availability"];
                                                $able_lift = $row_volunteers["able_lift"];
                                                $limitations = $row_volunteers["limitations"];
                                                $questions = $row_volunteers["questions"];
                                                
                                                echo "
                                                <tr>	
                                                    <td>$id_volunteer</td>
                                                    <td>$application_type</td>
                                                    <td>$first_name</td>
                                                    <td>$last_name</td>
                                                    <td>$phone</td>
                                                    <td>$email</td>
                                                    <td>$opportunities</td>
                                                    <td>$interest</td>
                                                    <td>$availability</td>
                                                    <td>$able_lift</td>
                                                    <td>$limitations</td>
                                                    <td>$questions</td>
                                                </tr>
                                                ";

                                            }

                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <!--TOP TEN ITEMS-->   
                            <div id="menu5" class="tab-pane fade"><br>  
                               <div class="desc">
                                    <h2>Update the Top 10 Items Needed:</h2>
                                    <iframe src="updateTopTen.php"></iframe>
                                </div>
                            </div>
                            <!--RAFFLE DONATION-->
                                <div id="menu6" class="tab-pane fade in active"><br>
                                  <table id="raffle_table" class="display" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Included ?</th>
                                                <th>Pick up ?</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Item</th>
                                                <th>Value</th>
                                                <th>Donor Name</th>
                                                <th>Donor Contact</th>
                                                <th>Phone</th>
                                                <th>No Item ?</th>
                                                <th>Amount Dollars</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Included ?</th>
                                                <th>Pick up ?</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Item</th>
                                                <th>Value</th>
                                                <th>Donor Name</th>
                                                <th>Donor Contact</th>
                                                <th>Phone</th>
                                                <th>No Item ?</th>
                                                <th>Amount Dollars</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                           <?php 
                                                include '../../etc/db.php';
                                                $query_events = "SELECT * FROM raffle";
                                                $exec_query_events = mysqli_query($con, $query_events) or die ("Error querying database");
                                                while($row_events = mysqli_fetch_array($exec_query_events)) {
                                                    $id_raffle = $row_events["id_raffle"];
                                                    $donation_included = $row_events["donation_included"];
                                                    $donation_pickup = $row_events["donation_pickup"];
                                                    $contact_name = $row_events["contact_name"];
                                                    $contact_phone = $row_events["contact_phone"];
                                                    $item_description = $row_events["item_description"];
                                                    $item_dollar_value = $row_events["item_dollar_value"];
                                                    $donor_name = $row_events["donor_name"];
                                                    $donor_contact_person = $row_events["donor_contact_person"];
                                                    $donor_phone = $row_events["donor_phone"];
                                                    $contribute_item = $row_events["contribute_item"];
                                                    $donation_amount_dollar = $row_events["donation_amount_dollar"];
                                                    
                                                    
                                                    
                                                    echo "
                                                    <tr>	
                                                        <td>$id_raffle</td>
                                                        <td>$donation_included</td>
                                                        <td>$donation_pickup</td>
                                                        <td>$contact_name</td>
                                                        <td>$contact_phone</td>
                                                        <td>$item_description</td>
                                                        <td>$item_dollar_value</td>
                                                        <td>$donor_name</td>
                                                        <td>$donor_contact_person</td>
                                                        <td>$donor_phone</td>
                                                        <td>$contribute_item</td>
                                                        <td>$donation_amount_dollar</td>";
                                                    
                                                        /*if ($status == "On") { 
                                                            echo "<td><span class='label label-success'>ONLINE</span></td>"; 
                                                            echo "<td><a href='updateEvent.php?status=off&id_event=".$id_event."' class='btn btn-danger'>Turn OFF</a></td>";
                                                        } elseif ($status == "off") {
                                                            echo "<td><span class='label label-danger'>OFFLINE</span></td>"; 
                                                            echo "<td><a href='updateEvent.php?status=on&id_event=".$id_event."' class='btn btn-success'>Turn ON</a></td>";
                                                        } else {die();}*/
                                                    echo "</tr>";
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                </div>
			</div><!--/container-->
		</div><!--/wrapper-->
	
		<!-- Javascript Global-->
		<script type="text/javascript" src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<!-- JS Plugins -->
		<script type="text/javascript" src="../assets/plugins/back-to-top.js"></script>
		<script type="text/javascript" src="../assets/plugins/smoothScroll.js"></script>
		<!-- JS Page Level -->
		<script type="text/javascript" src="../assets/js/app.js"></script>
		<script>
            $(document).ready(function() {
                App.init();
                $('#sponsor_table').DataTable( {
                    dom: 'Bfrtip',
                    "iDisplayLength": 25,
                    buttons: [
                        'print'
                    ]
                } );
                $('#volunteer_table').DataTable( {
                    dom: 'Bfrtip',
                    "iDisplayLength": 25,
                    buttons: [
                        'print'
                    ]
                } );
                $('#events_table').DataTable( {
                    dom: 'Bfrtip',
                    "iDisplayLength": 25,
                    buttons: [
                        'print'
                    ]
                } );
                $('#raffle_table').DataTable( {
                    dom: 'Bfrtip',
                    "iDisplayLength": 25,
                    buttons: [
                        'print'
                    ]
                } );
            } );
        </script>
			
		<!--[if lt IE 9]>
			<script src="assets/plugins/respond.js"></script>
			<script src="assets/plugins/html5shiv.js"></script>
			<script src="assets/plugins/placeholder-IE-fixes.js"></script>
		<![endif]-->
	</body>
	
	<!--Footer-->
	<?php 
        include 'footer.html'; 
        } else {
            session_destroy();
            header('Location: ../index.php');
        }
    } else {
        session_destroy();
        header('Location: ../index.php');
    }
    ?>
</html>
