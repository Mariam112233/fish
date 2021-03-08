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

	$sql = "UPDATE fish_data 
			SET	fish_type_id     	= '".$_POST["fish_type_id"]."',
				fish_stew_id     	= '".$_POST["fish_stew_id"]."',
				date_change_fish 	= '".$_POST["date_change_fish"]."',
				fish_status  		= '".$_POST["fish_status"]."',
				fish_health  		= '".$_POST["fish_health"]."'
				

			WHERE fish_id = '".$_POST["fish_id"]."' ";

	$query = mysqli_query($conn,$sql);

	if($query) { 
     	echo "Record update successfully";
     	header( "location: fish-index.php" );
	} 

	mysqli_close($conn);
?>
</body>
</html>  