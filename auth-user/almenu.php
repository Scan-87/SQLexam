<?php
$link = mysqli_connect("localhost", "sqladmin", "0000", "sqlapp");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


// Escape user inputs for security
$req_name = mysqli_real_escape_string($link, $_REQUEST['pasname']);

 
mysqli_close($link);

echo"Now you are signed as $req_name";

?>
