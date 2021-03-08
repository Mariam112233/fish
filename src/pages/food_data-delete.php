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

	$strfood_data_id = $_GET["food_data_id"];
	$sql = "DELETE FROM food_data
			WHERE food_data_id = '".$strfood_data_id."' ";

	$query = mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)) {
         echo "Record delete successfully";
         header( "location: food_data-index.php" );
	}

	mysqli_close($conn);
?>
</body>
</html> 