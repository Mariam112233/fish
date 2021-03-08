<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>

<?php

	include('../libs/config.php');

	$sum = $_POST["salary_number"] * $_POST["salary_number_price"];

	$sql = "INSERT INTO salary 
					(
							employee_id,
							salary_give_date,
							salary_number,
							salary_number_price,
							salary_number_price_sum,
							salary_status
					) 
			
			VALUES (
						'".$_POST["employee_id"]."',
						'".$_POST["salary_give_date"]."',
						'".$_POST["salary_number"]."',
						'".$_POST["salary_number_price"]."',
						$sum,
						'".$_POST["salary_status"]."'
					)";

	$query = mysqli_query($conn,$sql);

	if($query) {
		echo "Record add successfully";
		header( "location:salary-index.php" );
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