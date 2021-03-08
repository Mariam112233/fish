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
	

	$sql = "UPDATE give_food
			SET food_date		= '".$_POST["food_date"]."',
				employee_id     = '".$_POST["employee_id"]."',
				fish_id     	= '".$_POST["fish_id"]."',
				food_data_id 	= '".$_POST["food_data_id"]."',
				food_number 	= '".$_POST["food_number"]."'


			WHERE give_food_id = '".$_POST["give_food_id"]."' ";
	// $new = $_POST["food_number"] -

	// $sql1 = " UPDATE      food_data
               
	// 		SET       food_data_number = food_data_number - '".$_POST["food_number"]."'
    //         WHERE     food_data.food_data_id = '".$_POST["food_data_id"]."' ";
            
    //             mysqli_query($conn, $sql1);

	$query = mysqli_query($conn,$sql);

	if($query) { 
     	echo "Record update successfully";
     	header( "location: give_food-index.php" );
	} 

	mysqli_close($conn);
?>
</body>
</html>  