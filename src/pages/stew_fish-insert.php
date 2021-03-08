<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>
  
<?php
	
	include('../libs/config.php');

	$sql = "INSERT INTO fish_stew
						(
							stew_name,
							stew_capacity,
							stew_status						
						) 
			VALUES 		(
							'".$_POST["stew_name"]."',
							'".$_POST["stew_capacity"]."',
							'".$_POST["stew_status"]."'
						)
					";

	$query = mysqli_query($conn,$sql);

	if($query) {
		echo "Record add successfully";
		header( "location: stew_fish-index.php" );
	}
	
	// if($query)
    //       {
    //         echo '<script> alert("Record add successfully"); </script>';
	// 		header( "location: type_product-index.php" );
    //       }
    //       else
    //       {
    //         echo '<script> alert("Data Not Saved"); </script>';
    //       }

	mysqli_close($conn);
?>