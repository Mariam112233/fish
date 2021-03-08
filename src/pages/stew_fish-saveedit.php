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

	$sql = "UPDATE fish_stew SET 
			stew_name 		= '".$_POST["stew_name"]."',
			stew_capacity 	= '".$_POST["stew_capacity"]."',
			stew_status 	= '".$_POST["stew_status"]."'

			WHERE fish_stew_id = '".$_POST["fish_stew_id"]."' 
			
			";

	$query = mysqli_query($conn,$sql);

	if($query) {
     echo "Record update successfully";
     header( "location: stew_fish-index.php" );
	}

	mysqli_close($conn);
?>
</body>
</html>