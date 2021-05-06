<?php

$link = mysqli_connect("localhost", "sqladmin", "0000", "sqldota");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

session_start();

if (isset ($_SESSION['uname'])){


$sql = "SELECT * FROM cart";
$sql_get = mysqli_query($link, $sql);
$total = 0;
$allgoods = "";

if(mysqli_query($link, $sql)){
        while($row = mysqli_fetch_array( $sql_get ))
        {
		$allgoods = $allgoods.", ".$row['goods'];
		$total = $total + $row['price'];
        }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}



$username = $_SESSION['uname'];
$sql2 = "SELECT phone FROM creds WHERE username = '$username'";
$sql_get2 = mysqli_query($link, $sql2);
$phone = "";

if(mysqli_query($link, $sql2)){
        while($row = mysqli_fetch_array( $sql_get2 ))
        {       
                $phone = $row['phone'];
        }
} else{
    echo "ERROR: Could not able to execute $sql2. " . mysqli_error($link);
}



$sql3 = "INSERT INTO orders (username, phone, goods, total) VALUES ('$username', '$phone', '$allgoods', '$total')";


if(mysqli_query($link, $sql3)){
	echo "<script>location.href='/auth/clearcart.php'</script>";
} else{
    echo "ERROR: Could not able to execute $sql3. " . mysqli_error($link);
}

mysqli_close($link);

}
?>

