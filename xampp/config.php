<?php
$servername ="localhost";
$username ="";
$password ="";
$email = "";
$dbname ="myDB";

$conn = new mysqli($servername, $username,$email ,$password, $dbname);

 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
 }
 ?>