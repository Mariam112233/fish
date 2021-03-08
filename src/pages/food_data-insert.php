<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>

<?php

	include('../libs/config.php');

	$sql = "INSERT INTO food_data 
					(
						food_data_name,
						food_data_number
					) 
			
			VALUES (
						'".$_POST["food_data_name"]."',
						'".$_POST["food_data_number"]."'
					)";

	$query = mysqli_query($conn,$sql);

	if($query) {
		echo "Record add successfully";
		header( "location: food_data-index.php" );
	}
	 
	// if($query)
    //       {
    //         echo '<script> alert("Record add successfully"); </script>';
	// 		header( "location: material-index.php" );
    //       }
    //       else
    //       {
    //         echo '<script> alert("Data Not Saved"); </script>';
    //       }

	mysqli_close($conn);
?>