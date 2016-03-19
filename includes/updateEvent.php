<?php
    include '../../etc/db.php';
    $status = $_GET['status'];
    $id_event = $_GET['id_event'];
    $updateTopTen = 'UPDATE events SET events.`event_status`="'.$status.'" WHERE events.`id_event`="'.$id_event.'"';
    $results_updateTopTen = mysqli_query($con, $updateTopTen) or die("Error updating items");
    header('Location: admin.php');  
    
?>
