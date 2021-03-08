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

	$strsupplier_id = $_GET["supplier_id"];
	$sql = "DELETE FROM supplier
			WHERE supplier_id = '".$strsupplier_id."' ";

	$query = mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)) {
         echo "Record delete successfully";
         header( "location: supplier-index.php" );
	}

	mysqli_close($conn);
?>
</body>
</html>