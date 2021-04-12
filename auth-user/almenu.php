<?php
// Escape user inputs for security
$req_name = $_SESSION['uname'];

session_start();
if(isset($_SESSION['uname'])){
	echo "<h2>Welcone to your user interface page</h2>";
	echo "<h2>You are loged as ".$_SESSION['uname']."</h2>";
	echo "<br><a href='../login/form_submit.php'><input type=button name=back value=back></a>";
}else{
	echo "<script>location.href='../login/login.html'</script>";
}

?>
