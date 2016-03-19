<?
    /*ini_set("display_errors",true);
	error_reporting(E_ALL);*/
    include '../../etc/db.php';
    $itemDescription = htmlspecialchars($_POST['value']);
    $pk = htmlspecialchars($_POST['pk']); 
    $itemDescription = mysqli_real_escape_string($con,$itemDescription);
    $pk = mysqli_real_escape_string($con,$pk);
    $updateTopTen = 'UPDATE topten SET topten.`item_description`="'.$itemDescription.'" WHERE topten.`id_item`="'.$pk.'"';
    $results_updateTopTen = mysqli_query($con, $updateTopTen) or die("Error updating items");

?>