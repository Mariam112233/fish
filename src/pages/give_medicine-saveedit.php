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

	$sql = "UPDATE give_medicine
			SET employee_id     	= '".$_POST["employee_id"]."',
				fish_id     		= '".$_POST["fish_id"]."',
				medicine_data_id 	= '".$_POST["medicine_data_id"]."',
				medicine_number 	= '".$_POST["medicine_number"]."'


			WHERE give_medicine_id = '".$_POST["give_medicine_id"]."' ";

	$query = mysqli_query($conn,$sql);

	if($query) { 
     	echo "Record update successfully";
     	header( "location: give_medicine-index.php" );
	} 

	mysqli_close($conn);
?>
</body>
</html>  