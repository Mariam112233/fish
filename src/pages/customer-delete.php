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

	$strcustomer_id = $_GET["customer_id"];
	$sql = "DELETE FROM customer
			WHERE customer_id = '".$strcustomer_id."' ";

	$query = mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)) {
         echo "Record delete successfully";
         header( "location: customer-index.php" );
	}

	mysqli_close($conn);
?>
</body>
</html>