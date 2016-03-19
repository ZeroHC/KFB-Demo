<?php

function cleanUserInput($input) { 
    $input = mysqli_real_escape_string($input); 
    $input = htmlentities($input, ENT_QUOTES);
    return $input; 
}

?>