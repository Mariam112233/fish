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
	$sum = $_POST["salary_number"] * $_POST["salary_number_price"];
	$sql = "UPDATE salary 
			SET  	salary_give_date  	= '".$_POST["salary_give_date"]."',
					employee_id 		= '".$_POST["employee_id"]."',
					salary_number 		= '".$_POST["salary_number"]."',
					salary_number_price = '".$_POST["salary_number_price"]."',
					salary_number_price_sum = $sum,
					salary_status 		= '".$_POST["salary_status"]."'

			WHERE salary_id = '".$_POST["salary_id"]."' ";

	$query = mysqli_query($conn,$sql);

	if($query) {
     echo "Record update successfully";
     header( "location: salary-index.php" );
	}

	mysqli_close($conn);
?>
</body>
</html>