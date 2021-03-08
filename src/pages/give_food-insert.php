<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>
  
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);
	
	include('../libs/config.php');

	$sql = "INSERT INTO give_food
						(
							food_date,
							employee_id,
							fish_id,
							food_data_id,
							food_number							
						) 
			VALUES 		(
							'".$_POST["food_date"]."',
							'".$_POST["employee_id"]."',
							'".$_POST["fish_id"]."',
							'".$_POST["food_data_id"]."',
							'".$_POST["food_number"]."'							
						)
					";

	$query = mysqli_query($conn,$sql);

	$sql1 = " UPDATE      food_data
               
			    SET       food_data_number = food_data_number - '".$_POST["food_number"]."'
                WHERE     food_data.food_data_id = '".$_POST["food_data_id"]."' ";
            
                mysqli_query($conn, $sql1);

        
	if($query) {
        echo "Record add successfully";
        header( "location: give_food-index.php" );
	}
 
	mysqli_close($conn);

?>    