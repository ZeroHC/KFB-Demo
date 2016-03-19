<?php
    session_start("kfb");
    session_destroy();
	session_write_close();
	header("location: ../index.php");

?>