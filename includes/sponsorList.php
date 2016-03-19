<?php
    require "../../etc/db.php";
    
    //define the SELECT query
    $sql = "SELECT * FROM sponsors ORDER BY id_sponsor DESC";
    $result = @mysqli_query($con, $sql);
    
    while($row = mysqli_fetch_assoc($result))
    {
        $time = $row['date'];
        $sponsor = $row['sponsor'];
        $company = $row['company'];
        $level = $row['level'];
        $phone = $row['phone'];
        $email = $row['email'];
        
        echo "$date  $sponsor  $company  $level  $phone  $email";
    }
?>