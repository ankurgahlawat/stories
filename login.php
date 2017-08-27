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
  if (!isset($_SESSION['login_user']))
  {
  session_start();
   }

   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $username = mysqli_real_escape_string($conn,$_POST['username']);
      $password = mysqli_real_escape_string($conn,$_POST['password']); 
//      $password=md5($password);
      $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
    //     session_register("username");
         $_SESSION['login_user'] = $username;
         header("location: home.php");
      }else {
        echo "<script type='text/javascript'>alert('Please enter valid Username and password.')</script>";
     header('location:index.html');   
      }
   }
?>