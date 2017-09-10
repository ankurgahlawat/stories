<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
$_SESSION["logout"]='0';
unset($_COOKIE['User']);
$res = setcookie('User', '', time() - 36000);
header("Location: index.html"); // Redirecting To Home Page
}
?>