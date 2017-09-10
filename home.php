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
   setcookie('User', $login_session, time()+3600);
   //$sql= "select active from users where username='$user_check'";
  // echo $user_check;
    if(!isset($_SESSION['login_user'])&&!isset($_COOKIE['User'])){

      header("Location: index.html");
   }
   $time= time();
   $hours = $time-60*60*24;
   $sql= "UPDATE users SET active='0',caption='',story='' WHERE active>$time";
   mysqli_query($conn,$sql);
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
  <!--Font-->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
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
};


function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script>
<script type="text/javascript">
  function show()
  {
    document.getElementById('postcont').style.visibility = 'visible';
  }
   function showcon()
  {
    document.getElementById('showcont').style.visibility = 'visible';
  }
</script>
<style type="text/css">
  @media screen and (max-width: 500px)
  {
    body
    {
      overflow-y: scroll;
    }
    .content
    {
      position: relative;
    }
  }
</style>
</head>
<body>
 <div class="container app">
    <div class="row app-one">
      <div class="col-sm-4 side">
        <div class="side-one">
          <!-- Heading -->
          <div class="row heading">
            <div class="col-sm-3 col-xs-3 heading-avatar">
              <div class="heading-avatar-icon" onclick="showcon()">
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
   
     <div class="content" style="width: 66.5%; background-color: #FBFBFB;">
          <div class="heading">
          <a href="logout.php">Log Out</a>
          <div class="post" style="width: 50px; height: 50px; right:1%;float: right; margin-top:-4px;"><img class="post" src="img/post.png" style="width: 100%;height: 100%" onclick="show()"></div>
          </div>
       <div class="post-content" id="postcont" style="width: 97%; height: 89%; border: 1px solid #EEEEEE; margin-left: 1%;float: center; z-index:10000; background-color: #EEEEEF; box-shadow: 5px 5px 5px 5px #CCCCCC; padding: 1%; visibility: hidden;">
  
              <div class="post-img-prev col-md-10" style="height: 85%; float: center; margin-left: 4%;"> <img id="output_image" style="width: 100%;height: 100%" />
              </div>
            <div class="post-img col-xs-1" style="margin-left: 80%; margin-top: -5%; z-index: 15000; float: top">
            <form method="post" enctype="multipart/form-data">
              <label id="story-label" style="margin-top: -2%">
              <input type="file" name="story" accept="image/jpeg" onchange="preview_image(event)" required style="position: fixed; display: none;">
               <span><i class="fa fa-camera fa-3x" aria-hidden="true"></i></span>
               </label>
            </div>
              <div class="caption col-md-4" style="margin-left: 2%; width: 50%; margin-top: 35%; position: fixed;"><input type="text" name="caption" placeholder="Describe your story" style="width: 89%; font-family: 'Pacifico'; border: 0; border-bottom: 2px solid #CCC; padding-bottom: 10px; opacity: 0.7; padding-left: 1%; color: #00ACC1; font-size: 1em"></div>
            <button type="submit" name="submit" value="" style="background-color: transparent; border: none;margin-top: 62.5%"> <i class="fa fa fa-angle-double-right fa-4x" style="color:#31B408; " aria-hidden="true"></i></button>
            </form>
           
      </div>
       </div> 
       
    </div>
  </div>
  <style type="text/css">
    .caption input[type="text"]:focus
    {
       outline: 0;
    border-bottom: 2px solid #00ACC1!important;
      box-shadow: none; 
    }
  </style>
<?php
if(isset($_POST['submit']))
{ $user =  $_SESSION['login_user'];
  //echo "$user";
  $caption= mysqli_real_escape_string($conn, $_POST['caption']);
  $file = addslashes(file_get_contents($_FILES["story"]["tmp_name"]));
  $time = time();
  $sql = "UPDATE users SET caption='$caption',story='$file',active='$time' WHERE username='$user'";
  $result =mysqli_query($conn,$sql);
  if($result)
  {  // echo("<script type='text/javascript'>window.location = 'home.php'</script>");   
    echo "<script type='text/javascript'>alert('Story posted successfully')</script>";
  }
  else
    echo "<script type='text/javascript'>alert('An error occurred. Try again later.')</script>";

}


?>
</body>

</html>