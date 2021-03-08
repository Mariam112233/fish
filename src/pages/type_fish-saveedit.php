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

	$sql = "UPDATE fish_type SET 
			fish_type_name = '".$_POST["fish_type_name"]."'
			WHERE fish_type_id = '".$_POST["fish_type_id"]."' ";

	$query = mysqli_query($conn,$sql);

	if($query) {
     echo "Record update successfully";
     header( "location: type_fish-index.php" );
	}

	mysqli_close($conn);
?>
</body>
</html>