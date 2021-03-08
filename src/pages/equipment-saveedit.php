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

	$sql = "UPDATE equipment_data SET 
			equipment_name 		= '".$_POST["equipment_name"]."'


			WHERE equipment_id = '".$_POST["equipment_id"]."' 
			
			";

	$query = mysqli_query($conn,$sql);

	if($query) {
     echo "Record update successfully";
     header( "location: equipment-index.php" );
	}

	mysqli_close($conn);
?>
</body>
</html>