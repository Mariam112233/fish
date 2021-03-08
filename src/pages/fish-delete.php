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

	$strfish_id = $_GET["fish_id"];
	$sql = "DELETE FROM fish_data
			WHERE fish_id = '".$strfish_id."' ";

	$query = mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)) {
         echo "Record delete successfully";
         header( "location: fish-index.php" );
	}

	mysqli_close($conn); 
?>
</body>
</html>