<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "sqladmin", "0000", "sqlapp");



// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}



// Escape user inputs for security
$req_name = mysqli_real_escape_string($link, $_REQUEST['username']);


 
// Attempt select query execution
$sql = "SELECT * FROM creds WHERE username = '$req_name'";
$sql_get = mysqli_query($link, $sql);



if(mysqli_query($link, $sql)){
	echo"<table border cellpadding=3>";
	while($row = mysqli_fetch_array( $sql_get ))
	{
		echo"<tr>";
		echo"<th>username:</th> <td>".$row['username'] . "</td> ";
		echo"<th>password:</th> <td>".$row['password'] . "</td></tr> ";
		echo"<th>email:</th> <td>".$row['email'] . "</td> ";
		echo"<th>name:</th> <td>".$row['name'] . "</td></tr> ";
	}
	echo"</table>";
	//echo "username: $username\npassword: $password\nemail: $email\nname: $name";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
