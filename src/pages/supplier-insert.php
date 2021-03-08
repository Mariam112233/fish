<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>
  
<?php

	include('../libs/config.php');

	$sql = "INSERT INTO supplier (shop_name, address, tel, email) 
		VALUES ('".$_POST["shop_name"]."','".$_POST["address"]."','".$_POST["tel"]."'
		,'".$_POST["email"]."')";

	$query = mysqli_query($conn,$sql);

	if($query) {
		echo "Record add successfully";
		header( "location: supplier-index.php" );
	}
	
	// if($query)
    //       {
    //         echo '<script> alert("Record add successfully"); </script>';
	// 		header( "location: supplier-index.php" );
    //       }
    //       else
    //       {
    //         echo '<script> alert("Data Not Saved"); </script>';
    //       }

	mysqli_close($conn);
?>