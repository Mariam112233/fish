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

	$sql = "UPDATE food_order_details SET 

            food_order_id = '".$_POST["food_order_id"]."',
            food_order_details_id = '".$_POST["food_order_details_id"]."',
            order_food_number = '".$_POST["order_food_number"]."',
            order_food_price = '".$_POST["order_food_price"]."',
            food_order_id = '".$_POST["food_order_id"]."'

			WHERE food_order_details_id = '".$_POST["food_order_details_id"]."' ";

  $query = mysqli_query($conn,$sql);
  
  // ======================================================================================================

  // $sql1 = " UPDATE  raw_material 
  //           SET     "

  // ======================================================================================================
 
	if($query) {
     echo "Record update successfully";
     header( "location: order_food-index.php" );
	}
 
	mysqli_close($conn);
?>
</body>  
</html> 