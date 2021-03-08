<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>

<html>
<head>
<title>Save</title>
</head>
<body>
<?php
 
	include('../libs/config.php');

	$sql = "UPDATE food_data SET 
			food_data_name = '".$_POST["food_data_name"]."' ,
			food_data_number = '".$_POST["food_data_number"]."'
			WHERE food_data_id = '".$_POST["food_data_id"]."' ";

	$query = mysqli_query($conn,$sql);

	if($query) {
     echo "Record update successfully";
     header( "location: food_data-index.php" );
	}

	mysqli_close($conn);
?>
</body>
</html>