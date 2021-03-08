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

	$strmedicine_data_id = $_GET["medicine_data_id"];
	$sql = "DELETE FROM medicine_data
			WHERE medicine_data_id = '".$strmedicine_data_id."' ";

	$query = mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)) {
         echo "Record delete successfully";
         header( "location: medicine_data-index.php" );
	}

	mysqli_close($conn);
?>
</body>
</html> 