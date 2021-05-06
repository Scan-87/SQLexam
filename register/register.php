<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "sqladmin", "0000", "sqldota");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$username = mysqli_real_escape_string($link, $_REQUEST['username']);
$password = mysqli_real_escape_string($link, $_REQUEST['password']);
$phone = mysqli_real_escape_string($link, $_REQUEST['phone']);
$title = 'user';
 
// Attempt insert query execution
$sql = "INSERT INTO creds (username, password, phone, title) VALUES ('$username', '$password', '$phone', 'title')";
if(mysqli_query($link, $sql)){
	echo "Records added successfully.";
	$back = '"./../index.html"';
	echo "<p></p>";
	echo "<button onclick='location.href = $back'>Go Back</button>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>

