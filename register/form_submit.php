<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "sqladmin", "0000", "sqlapp");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$username = mysqli_real_escape_string($link, $_REQUEST['username']);
$password = mysqli_real_escape_string($link, $_REQUEST['password']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$name = mysqli_real_escape_string($link, $_REQUEST['rname']);
 
// Attempt insert query execution
$sql = "INSERT INTO creds (username, password, email, name) VALUES ('$username', '$password', '$email', '$name')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
