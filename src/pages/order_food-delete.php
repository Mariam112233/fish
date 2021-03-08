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

	$strordering_raw_materials_id = $_GET["ordering_raw_materials_id"];
	$sql = "DELETE FROM ordering_raw_materials
			WHERE ordering_raw_materials_id = '".$strordering_raw_materials_id."' ";

	$query = mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)) {
         echo "Record delete successfully";
         header( "location: ordering_raw_materials-index.php" );
	}
 
	mysqli_close($conn);
?>
</body>
</html>