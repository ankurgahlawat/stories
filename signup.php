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

$name = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['pass']);
$password2 = mysqli_real_escape_string($conn, $_POST['repass']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);

$sql = "SELECT * FROM users WHERE username='$name'";
$result = mysqli_query($conn, $sql) or die(mysqli_errno($conn));
$count = mysqli_num_rows($result);

if($count==1)
{
    echo "<script type='text/javascript'>alert('The username is already taken. Please enter a different username')</script>";
     header('location:signup.html');
}
else if($password!=$password2)
{
	echo "<script type='text/javascript'>alert('Passwords do not match.')</script>";
     echo("<script type='text/javascript'>window.loaction = 'signup.html'</script>");
}
else if(!preg_match("/^[0-9]{10}$/",$phone))
{
    echo "<script type='text/javascript'>alert('Please enter valid phone number.')</script>";
     echo("<script type='text/javascript'>window.loaction = 'signup.html'</script>"); 
}

else
    { 
//       $password=md5($password);
    $sql = "INSERT INTO users(username,phone, 
            password,friends,active) VALUES ('$name','$phone','$password','','No')";
    if(mysqli_query($conn, $sql))
    {

        header('location:index.html');
        echo "Registered Sucessfully";
		
    }
    else{
        echo "ERROR: $sql. " . mysqli_error($conn);
		
    }
           

}
?>
