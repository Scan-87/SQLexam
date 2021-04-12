<?php
//link to database
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

//Select password from database
if(mysqli_query($link, $sql)){
	while($row = mysqli_fetch_array( $sql_get ))
	{
		$got_pass = $row['password'];
	}
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);



//Now let's authenticate

session_start();

if (isset($_SESSION['uname'])){
	//what to do if user is already loged in
	echo "<h1>Welcome ".$_SESSION['uname']."</h1>";
	echo "<a href='../auth-user/almenu.php'>Menu</a><br>";
	echo "<br><a href='logout.php'><input type=button value=logout name=logout></a>";
}else{
	if($req_pass === $got_pass){
		//let's let this user in
		$_SESSION['uname']=$req_name;
		echo "<script>location.href='form_submit.php'</script>";
	}else{
		//fuck this user, he doesn't know password!
		echo "<script>alert('your password is incorrect!')</script>";
		echo "<script>location.href='login.html'</script>";
	}
}

?>
