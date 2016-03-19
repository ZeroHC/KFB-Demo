<?php
    //ini_set("display_errors",true);
	//error_reporting(E_ALL);

    session_start();

    /*
    $userSession = $_SESSION['userSession'];
    $_SESSION['start'] = time(); // Taking now logged in time.
    // Ending a session in 30 minutes from the starting time.
    $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);*/
    
    include '../../etc/db.php';
    
    if(!strstr($_SERVER['HTTP_REFERER'], "pbj.greenrivertech.net")) die();
    //second: if token is equals to the token stored in session...
    if ($_POST['token'] != $_SESSION['token']) die(); 
    
    $user = mysqli_real_escape_string($con,$_POST['user']);
    $pwd = mysqli_real_escape_string($con,$_POST['pwd']);
    $pwd = sha1($pwd);


	$chkUser = 'SELECT * FROM users WHERE username = "'.$user.'" and password = "'.$pwd.'"';
	$result_chkUser = mysqli_query($con,$chkUser); 
	$numLinesFound = mysqli_num_rows($result_chkUser); 
	$lineInfo = mysqli_fetch_object($result_chkUser); 
	$username = $lineInfo->username;
	$password = $lineInfo->password;

	
	if ($username == $user && $password == $pwd ){
        $_SESSION['admin'] = 1;
        $_SESSION['username'] = $user;
        $_SESSION['password'] = $pwd;
        header('Location: ../index.php');
	} else {
        $_SESSION['admin'] = 0;
        echo "<script>alert('Username or Password invalid !');</script>";
        echo "<script>window.location = '../index.php'; </script>";
    }

    mysqli_close($con);
  

?>
