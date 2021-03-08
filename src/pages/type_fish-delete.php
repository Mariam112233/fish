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

	$strfish_type_id = $_GET["fish_type_id"];
	$sql = "DELETE FROM fish_type
			WHERE fish_type_id = '".$strfish_type_id."' ";

	$query = mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)) {
         echo "Record delete successfully";
         header( "location: type_fish-index.php" );
	}

	mysqli_close($conn);
?>
</body>
</html>