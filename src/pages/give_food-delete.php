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

	$strgive_food_id = $_GET["give_food_id"];
	$sql = "DELETE FROM give_food
			WHERE give_food_id = '".$strgive_food_id."' ";

	$query = mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)) {
         echo "Record delete successfully";
         header( "location: give_food-index.php" );
	}

	mysqli_close($conn); 
?>
</body>
</html>