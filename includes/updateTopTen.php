<?php
    //ini_set("display_errors",true);
	//error_reporting(E_ALL);

    session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Update Top Ten Items</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script> 
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>  

    <!-- x-editable (bootstrap version) -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.4.6/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.4.6/bootstrap-editable/js/bootstrap-editable.min.js"></script>
    
    <!-- x-editable edit functions -->
    <script>
        $(document).ready(function() {
            $.fn.editable.defaults.ajaxOptions = {type: "POST"};
            $.fn.editable.defaults.success = function() { $(this).show() };
            $.fn.editable.defaults.mode = 'inline';     

            //make itens editables
            $('#item1').editable({
                type: 'text',
                pk: 1,
                url: 'http://pbj.greenrivertech.net/includes/processUpdateTopTen.php',
                title: 'Enter item name',
                placement: 'right',
            });

            $('#item2').editable({
                type: 'text',
                pk: 2,
                url: 'http://pbj.greenrivertech.net/includes/processUpdateTopTen.php',
                title: 'Enter item name',
                placement: 'right',
            });

            $('#item3').editable({
                type: 'text',
                pk: 3,
                url: 'http://pbj.greenrivertech.net/includes/processUpdateTopTen.php',
                title: 'Enter item name',
                placement: 'right',
            });

            $('#item4').editable({
                type: 'text',
                pk: 4,
                url: 'http://pbj.greenrivertech.net/includes/processUpdateTopTen.php',
                title: 'Enter item name',
                placement: 'right',
            });

            $('#item5').editable({
                type: 'text',
                pk: 5,
                url: 'http://pbj.greenrivertech.net/includes/processUpdateTopTen.php',
                title: 'Enter item name',
                placement: 'right',
            });

            $('#item6').editable({
                type: 'text',
                pk: 6,
                url: 'http://pbj.greenrivertech.net/includes/processUpdateTopTen.php',
                title: 'Enter item name',
                placement: 'right',
            });

            $('#item7').editable({
                type: 'text',
                pk: 7,
                url: 'http://pbj.greenrivertech.net/includes/processUpdateTopTen.php',
                title: 'Enter item name',
                placement: 'right',
            });

            $('#item8').editable({
                type: 'text',
                pk: 8,
                url: 'http://pbj.greenrivertech.net/includes/processUpdateTopTen.php',
                title: 'Enter item name',
                placement: 'right',
            });

            $('#item9').editable({
                type: 'text',
                pk: 9,
                url: 'http://pbj.greenrivertech.net/includes/processUpdateTopTen.php',
                title: 'Enter item name',
                placement: 'right',
            });

            $('#item10').editable({
                type: 'text',
                pk: 10,
                url: 'http://pbj.greenrivertech.net/includes/processUpdateTopTen.php',
                title: 'Enter item name',
                placement: 'right',
            });
        });
    </script>
  </head>
  <body>
    <div class="container">
        <?php
            if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
                include '../../etc/db.php';
                $counter = 1;
                $chkTopTen = 'SELECT * FROM topten';
                $results_chkTopTen = mysqli_query($con, $chkTopTen) or die ("Query Error");
                while($rowTopTen = mysqli_fetch_array($results_chkTopTen)) {
                    $id_item = $rowTopTen['id_item'];
                    $item_description = $rowTopTen['item_description'];
                    echo "<p><td>$id_item - </td>
                      <a href='#' id='item$counter' name='item$counter'>$item_description</a></p>";
                    $counter++;
                }
            } else {
                include '../../etc/db.php';
                $counter = 1;
                $chkTopTen = 'SELECT * FROM topten';
                $results_chkTopTen = mysqli_query($con, $chkTopTen) or die ("Query Error");
                while($rowTopTen = mysqli_fetch_array($results_chkTopTen)) {
                    $id_item = $rowTopTen['id_item'];
                    $item_description = $rowTopTen['item_description'];
                    echo "<p>&bull; $item_description</p>";
                    $counter++;
                }
            }
         ?>
    </div>
  </body>
</html>