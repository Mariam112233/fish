<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>

<html>
<head>
<link rel="stylesheet" href="style/customerstyle.css"> 
<title>Delete</title>
</head>
<body> 
<?php
     
    include('../libs/config.php');

	$strgive_medicine_id = $_GET["give_medicine_id"];
	$sql = "DELETE FROM give_medicine
			WHERE give_medicine_id = '".$strgive_medicine_id."' ";

	$query = mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)) {
         echo "Record delete successfully";
         header( "location: give_medicine-index.php" );
	}

	mysqli_close($conn); 
?>
</body>
</html>