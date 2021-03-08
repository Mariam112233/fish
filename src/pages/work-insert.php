<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>

<?php

	include('../libs/config.php');

	$sql = "INSERT INTO work 
					(
						employee_id,
						work_day
					) 
			
			VALUES (
						'".$_POST["employee_id"]."',
						'".$_POST["work_day"]."'
					)";

	$query = mysqli_query($conn,$sql);

	if($query) {
		echo "Record add successfully";
		header( "location: work-index.php" );
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