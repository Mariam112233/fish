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

   $sql = "UPDATE fish_sales SET	
				customer_id   			= '".$_POST["customer_id"]."',
				fish_sales_date_chamra  = '".$_POST["fish_sales_date_chamra"]."',
				payment_status  		= '".$_POST["payment_status"]."',
				delivery_status  		= '".$_POST["delivery_status"]."'

				WHERE fish_sales_id 	= '".$_POST["fish_sales_id"]."' ";
 

	$query = mysqli_query($conn,$sql);
 
	if($query) {
     echo "Record update successfully";
     header( "location: sales_fish-index.php" );
	}
 
	mysqli_close($conn);
?>
</body> 
</html> 