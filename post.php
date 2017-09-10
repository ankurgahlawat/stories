<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password,"stories");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
session_start();
if(isset($_POST['submit']))
{	$user =  $_SESSION['login_user'];
	//echo "$user";
	$caption= mysqli_real_escape_string($conn, $_POST['caption']);
	$file = addslashes(file_get_contents($_FILES["story"]["tmp_name"]));
	$sql = "UPDATE users SET caption='$caption',story='$file' WHERE username='$user'";
	$result =mysqli_query($conn,$sql);
	if($result)
	{	  echo("<script type='text/javascript'>window.location = 'home.php'</script>");   
		echo "<script type='text/javascript'>document.getElementById('success').innerHTML('Story posted successfully')</script>";
	}
	else
		echo "<script type='text/javascript'>document.getElementById('failure').innerHTML('An error occurred. Try again later.')</script>";

}


?>