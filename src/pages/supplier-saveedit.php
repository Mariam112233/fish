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

	$sql = "UPDATE supplier SET 
			shop_name = '".$_POST["shop_name"]."' ,
			address = '".$_POST["address"]."' ,
            tel = '".$_POST["tel"]."' ,
			email = '".$_POST["email"]."'
			WHERE supplier_id = '".$_POST["supplier_id"]."' ";

	$query = mysqli_query($conn,$sql);

	if($query) {
     echo "Record update successfully";
     header( "location: supplier-index.php" );
	}

	mysqli_close($conn);
?>
</body>
</html>