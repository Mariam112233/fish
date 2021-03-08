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

	$sql = "UPDATE medicine_data SET 
			medicine_data_name = '".$_POST["medicine_data_name"]."' ,
			medicine_data_number = '".$_POST["medicine_data_number"]."'
			WHERE medicine_data_id = '".$_POST["medicine_data_id"]."' ";

	$query = mysqli_query($conn,$sql);

	if($query) {
     echo "Record update successfully";
     header( "location: medicine_data-index.php" );
	}

	mysqli_close($conn);
?>
</body>
</html>