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
$output ='';
$partialStates = $_POST['partial'];
$states=mysqli_query($conn,"SELECT * FROM users WHERE username LIKE '%$partialStates%'");
$count= mysqli_num_rows($states);
if($count==0)
{
	echo "<div class='col-sm-12'>"."Sorry, no results found "."</div>";
}
else
{
while($state = mysqli_fetch_array($states))
{
	echo '
	<tr class="col-sm-12">
	<td>' . $state['username']. '</td>
	</tr>
	';
	/*echo "<div class='col-sm-12'>".$state['username'].$count."</div>";*/
}
}
 ?>
