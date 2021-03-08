<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "jewelry_db";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// mysqli_set_charset($conn, "utf8");
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } else {
//   echo "Successful <br>";
// }

// ini_set('display_errors', 1);
//     error_reporting(~0);
    
$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "fish";
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
// echo "connnnn";
mysqli_set_charset($conn, "utf8");

?> 