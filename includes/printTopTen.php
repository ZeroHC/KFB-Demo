<!DOCTYPE html>
<head>
    <title>Top Ten Items</title>
</head>
<html>
   <body>
      <h1>Top Ten Items Needed</h1>
       <?php 
            include '../../etc/db.php';
            $chkTopTen = 'SELECT * FROM topten';
            $results_chkTopTen = mysqli_query($con, $chkTopTen) or die ("Query Error");
            while($rowTopTen = mysqli_fetch_array($results_chkTopTen)) {
                $id_item = $rowTopTen['id_item'];
                $item_description = $rowTopTen['item_description'];
                echo "<p>&bull; $item_description</p>";
            }
       ?>
   </body>
</html>