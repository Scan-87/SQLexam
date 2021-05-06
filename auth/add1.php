<?php

$link = mysqli_connect("localhost", "sqladmin", "0000", "sqldota");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$goods = 'Slark';
$price = 50;


session_start();

if (isset ($_SESSION['uname'])){



$sql = "INSERT INTO cart (goods, price) VALUES ('$goods', '$price')";

if (mysqli_query($link, $sql_log)){
}else{
	echo "ERROR: could not execute $sql_log. " . mysqli_error($link);
}


if(mysqli_query($link, $sql)){
	echo "<script>location.href='user.php'</script>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
// Close connection
mysqli_close($link);
?>

