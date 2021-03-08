<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>
  
<?php
	
	include('../libs/config.php');

	$sql = "INSERT INTO fish_type
						(
							fish_type_name
						) 
			VALUES 		(
							'".$_POST["fish_type_name"]."'
						)
						";

	$query = mysqli_query($conn,$sql);

	if($query) {
		echo "Record add successfully";
		header( "location: type_fish-index.php" );
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