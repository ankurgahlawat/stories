<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
$_SESSION["logout"]='0';
header("Location: index.html"); // Redirecting To Home Page
}
?>