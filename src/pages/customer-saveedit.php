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

	$sql = "UPDATE customer SET 
			c_firstname 	= '".$_POST["c_firstname"]."' ,
			c_lastname 		= '".$_POST["c_lastname"]."' , 
			c_gender 		= '".$_POST["c_gender"]."' ,
			c_address 		= '".$_POST["c_address"]."' ,
            c_tel 			= '".$_POST["c_tel"]."' ,
			c_email 		= '".$_POST["c_email"]."',
			username 		= '".$_POST["username"]."' ,
            password 		= '".$_POST["password"]."' ,
			position 		= '".$_POST["position"]."'


			WHERE customer_id = '".$_POST["customer_id"]."' ";

	$query = mysqli_query($conn,$sql);

	if($query) {
     echo "Record update successfully";
     header( "location: customer-index.php" );
	}

	mysqli_close($conn); 
?>
</body>
</html>