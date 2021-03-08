<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>
  
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);
	
	include('../libs/config.php');

	$sql = "INSERT INTO fish_data
						(
							date_of_fish,
							fish_type_id, 	
							fish_stew_name, 	
							date_change_fish,
							fish_status
													
						) 
			VALUES 		(
							'".$_POST["date_of_fish"]."',
							'".$_POST["fish_type_id"]."',
							'".$_POST["fish_stew_name"]."',
							'".$_POST["date_change_fish"]."',
							'".$_POST["fish_status"]."'
							
						)
					";

	$query = mysqli_query($conn,$sql);

	if($query) {
        echo "Record add successfully";
        header( "location: fish-index.php" );
	}
 
	mysqli_close($conn);
?>    