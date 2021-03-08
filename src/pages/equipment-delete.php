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

	$strequipment_id = $_GET["equipment_id"];
	$sql = "DELETE FROM equipment_data
			WHERE equipment_id = '".$strequipment_id."' ";

	$query = mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)) {
         echo "Record delete successfully";
         header( "location: equipment-index.php" );
	}

	mysqli_close($conn);
?>
</body>
</html>