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

	$sql = "UPDATE food_order SET 

			-- ordering_raw_materials_id ,
			-- employee_id ,
			-- customer_id ,
			supplier_food_id = '".$_POST["supplier_food_id"]."' 

			WHERE food_order_id = '".$_POST["food_order_id"]."' ";

	$query = mysqli_query($conn,$sql);
 
	if($query) {
     echo "Record update successfully";
     header( "location: order_food-index.php" );
	}
 
	mysqli_close($conn);
?>
</body> 
</html> 