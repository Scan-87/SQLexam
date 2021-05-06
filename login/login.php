<?php
$link = mysqli_connect("localhost", "sqladmin", "0000", "sqldota");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$req_name = mysqli_real_escape_string($link, $_REQUEST['username']);
$req_pass = mysqli_real_escape_string($link, $_REQUEST['password']);
 
// Attempt select query execution
$sql = "SELECT password,title FROM creds WHERE username = '$req_name'";
$sql_get = mysqli_query($link, $sql);

if(mysqli_query($link, $sql)){
	while($row = mysqli_fetch_array( $sql_get ))
	{
		//echo"<th>password:</th> <td>".$row['password'] . "</td></tr> ";
		$got_pass = $row['password'];
		$got_title = $row['title'];
	}
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);



session_start();

if (isset($_SESSION['uname'])){
	//what to do if user is already loged in
	if ($_SESSION['title'] === 'admin'){
		echo "<script>location.href='/admin/admin.php'</script>";
	}else{
		echo "<script>location.href='/auth/user.php'</script>";
	}
	//echo "<h1>Welcome ".$_SESSION['uname']."</h1>";
        //echo "<a href='../auth/user.php'>Menu</a><br>";
        //echo "<br><a href='logout.php'><input type=button value=logout name=logout></a>";
}else{
        if($req_pass === $got_pass){
                //let's let this user in
		$_SESSION['uname']=$req_name;
		$_SESSION['title']=$got_title;
                echo "<script>location.href='login.php'</script>";
        }else{
                //fuck this user, he doesn't know password!
                echo "<script>alert('your password is incorrect!')</script>";
                echo "<script>location.href='login.html'</script>";
        }
}

?>

