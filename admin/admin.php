<?php

session_start();
if(isset($_SESSION['uname'])){

$link = mysqli_connect("localhost", "sqladmin", "0000", "sqldota");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security

$req_name = mysqli_real_escape_string($link, $_SESSION['uname']);

// Attempt select query execution
$sql = "SELECT title FROM creds WHERE username = '$req_name'";
$sql_get = mysqli_query($link, $sql);

if(mysqli_query($link, $sql)){
        while($row = mysqli_fetch_array( $sql_get ))
        {
                $got_title = $row['title'];
        }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


echo '<!DOCTYPE html>';
echo '<html lang="en">';
echo '<head>';
echo '<meta charset="UTF-8" />';
echo '<title>SQL application</title>';
echo '<link rel="stylesheet" href="cart.css" />';
echo '<link';
echo 'href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap"';
echo 'rel="stylesheet"';
echo '/>';
echo '</head>';
echo '';
echo '';
echo '<body>';
echo '<main>';
echo '<section class="paper">';
echo '<div class="user">';
echo '<h2>Welcome to Dota 2 merchendise store!</h2>';
echo '</div>';
echo '<div class="panel">';
echo '<br><a href="/login/logout.php"><input type=button value="Logout" name=reg></a>';

echo '<br><a href="/register/register.html"><input type=button disabled value="Register" name=reg></a>';
echo '<br><a href="/auth/user.php"><input type=button value="Shop" name=reg></a>';
echo '<div class="account">';
echo '<p>'.$_SESSION['uname'].'</p>';
echo "<p>$got_title</p>";
echo '</div>';
echo '</div>';
echo '<div class="goods">';

echo '<div class="cart">';
echo "<p>Active orders</p>";
echo "<p></p>";
$sql = "SELECT * FROM orders";
$sql_get = mysqli_query($link, $sql);
$total = 0;

if(mysqli_query($link, $sql)){
        echo"<table border cellpadding=3>";
        echo "<tr><td>id</td> <td>username</td> <td>phone</td> <td>goods</td> <td>total</td></tr>";
        while($row = mysqli_fetch_array( $sql_get ))
        {
                echo "<tr><td>".$row['id'] . "</td>";
		echo "<td>".$row['username'] . "</td>";
		echo "<td>".$row['phone'] . "</td>";
		echo "<td>".$row['goods'] . "</td>";
		echo "<td>".$row['total'] . "</td>";
        }
	echo"</table>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
echo '</div>';
echo '</div>';
echo '</section>';
echo '</main>';
echo '</body>';
echo '';

}else{
	echo "<script>location.href='/index.html'</script>";
}
?>
