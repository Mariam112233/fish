<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>
  
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);
	
	include('../libs/config.php');

	$sql = "INSERT INTO give_medicine
						(
							medicine_date,
							employee_id,
							fish_id,
							medicine_data_id,
							medicine_number							
						) 
			VALUES 		(
							'".$_POST["medicine_date"]."',
							'".$_POST["employee_id"]."',
							'".$_POST["fish_id"]."',
							'".$_POST["medicine_data_id"]."',
							'".$_POST["medicine_number"]."'							
						)
					";

	$query = mysqli_query($conn,$sql);

	$sql1 = " UPDATE      medicine_data
                SET       medicine_data_number = medicine_data_number - '".$_POST["medicine_number"]."'
                WHERE     medicine_data.medicine_data_id = '".$_POST["medicine_data_id"]."' ";
            
                mysqli_query($conn, $sql1);

	if($query) {
        echo "Record add successfully";
        header( "location: give_medicine-index.php" );
	}
 
	mysqli_close($conn);
?>    