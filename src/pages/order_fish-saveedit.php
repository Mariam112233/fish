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

	$sql = "UPDATE fish_order SET 

			-- ordering_raw_materials_id ,
			-- employee_id ,
			-- customer_id ,
			supplier_id = '".$_POST["supplier_id"]."' 

			WHERE fish_order_id = '".$_POST["fish_order_id"]."' ";

	$query = mysqli_query($conn,$sql);
 
	if($query) {
     echo "Record update successfully";
     header( "location: order_fish-index.php" );
	}
 
	mysqli_close($conn);
?>
</body> 
</html> 