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
$req_pass = mysqli_real_escape_string($link, $_REQUEST['password']);

 
// Attempt select query execution
$sql = "SELECT password FROM creds WHERE username = '$req_name'";
$sql_get = mysqli_query($link, $sql);



if(mysqli_query($link, $sql)){
	while($row = mysqli_fetch_array( $sql_get ))
	{
		//echo"<th>password:</th> <td>".$row['password'] . "</td></tr> ";
		$got_pass = $row['password'];
	}
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);


if($got_pass === $req_pass){
	echo"Login successful!";
}else{
	echo"Login failed";	
}

?>
