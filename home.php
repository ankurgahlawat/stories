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
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"select username from users where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   //$sql= "select active from users where username='$user_check'";
   echo $user_check;
    if(!isset($_SESSION['login_user'])){
      header("Location: index.html");
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>REWIND </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome File -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="homecss.css">
  <script type = "text/javascript">
function search_mar_db_mein(value) {
  if(value=="")
  {
    $(".searchBox1").html("");
  }
  else
  {
  $.post("fetch.php",{partial : value} ,function(data){
  $(".searchBox1").html(data);
  });
}
}
</script>
</head>
<body>
 <div class="container app">
    <div class="row app-one">
      <div class="col-sm-4 side">
        <div class="side-one">
          <!-- Heading -->
          <div class="row heading">
            <div class="col-sm-3 col-xs-3 heading-avatar">
              <div class="heading-avatar-icon">
                <img src="http://shurl.esy.es/y">
              </div>
            </div>
            <div class="col-sm-1 col-xs-1  heading-dot  pull-right">
              <i class="fa fa-ellipsis-v fa-2x  pull-right" aria-hidden="true"></i>
            </div>
            <div class="col-sm-2 col-xs-2 heading-compose  pull-right">
              <i class="fa fa-comments fa-2x  pull-right" aria-hidden="true"></i>
            </div>
          </div>
          <!-- Heading End -->

          <!-- SearchBox -->
          <div class="row searchBox">
            <div class="col-sm-12 searchBox-inner">
              <div class="form-group ">
                <input id="searchText" type="text" class="form-control" name="searchText" placeholder="Search" onkeyup="search_mar_db_mein(this.value)"/>
                </div>
            </div>      
          </div>
            <div class='searchBox1'>
            </div>
        </div>
    </div>
  </div>
</body>
</html>