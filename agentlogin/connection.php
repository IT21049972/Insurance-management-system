<?php


$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "hims"; 


 // Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("User/password is wrong");
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
?>