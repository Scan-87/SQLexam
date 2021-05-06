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

// Close connection
mysqli_close($link);






echo '<!DOCTYPE html>';
echo '<html lang="en">';
echo '<head>';
echo '<meta charset="UTF-8" />';
echo '<title>SQL application</title>';
echo '<link rel="stylesheet" href="/style.css" />';
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

echo '<br><a href="/auth/cart.php"><input type=button value="Cart" name=reg></a>';

echo '<div class="account">';
echo '<p>'.$_SESSION['uname'].'</p>';
echo "<p>$got_title</p>";
echo '</div>';
echo '</div>';
echo '<div class="goods">';
echo '<div class="row1">';
echo '<div class="top1">';
echo '<p>Slark</p>';
echo '<img src="/images/img1.png" style="width: 48%">';

echo '<br><a href="add1.php"><input type=button value="Add to cart"></a>';
//echo '<button onclick="location.href = 'add1.php'">Add to cart</button>';
echo '<p style="margin-top:3px">50$</p>';
echo '</div>';
echo '<div class="bot1">';
echo '<p>Vengerful Spirit</p>';
echo '<img src="/images/img2.png" style="width: 48%">';

echo '<br><a href="add2.php"><input type=button value="Add to cart"></a>';
//echo '<button onclick="location.href = 'add2.php'">Add to cart</button>';
echo '<p style="margin-top:3px">30$</p>';
echo '';
echo '</div>';
echo '</div>';
echo '<div class="row2">';
echo '<div class="top2">';
echo '<p>Kunkka</p>';
echo '<img src="/images/img3.png" style="width: 48%">';

echo '<br><a href="add3.php"><input type=button value="Add to cart"></a>';
//echo '<button onclick="location.href = 'add3.php'">Add to cart</button>';
echo '<p style="margin-top:3px">55$</p>';
echo '</div>';
echo '<div class="bot2">';
echo '<p>Lina</p>';
echo '<img src="/images/img4.png" style="width: 48%">';

echo '<br><a href="add4.php"><input type=button value="Add to cart"></a>';
//echo '<button onclick="location.href = 'add4.php'">Add to cart</button>';
echo '<p style="margin-top:3px"> 44$</p>';
echo '';
echo '</div>';
echo '';
echo '</div>';
echo '<div class="row3">';
echo '<div class="top3">';
echo '<p>Tiny</p>';
echo '<img src="/images/img5.png" style="width: 48%">';

echo '<br><a href="add5.php"><input type=button value="Add to cart"></a>';
//echo '<button onclick="location.href = 'add5.php'">Add to cart</button>';
echo '<p style="margin-top:3px">38$</p>';
echo '</div>';
echo '<div class="bot3">';
echo '<p>Crystal Maiden</p>';
echo '<img src="/images/img6.png" style="width: 48%">';

echo '<br><a href="add6.php"><input type=button value="Add to cart"></a>';
//echo '<button onclick="location.href = 'add6.php'">Add to cart</button>';
echo '<p style="margin-top:3px">52$</p>';
echo '';
echo '</div>';
echo '';
echo '</div>';
echo '';
echo '</div>';
echo '</section>';
echo '</main>';
echo '</body>';
echo '';

}else{
	echo "<script>location.href='/index.html'</script>";
}
?>
