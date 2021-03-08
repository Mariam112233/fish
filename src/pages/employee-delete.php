<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>
  
<html>
<head>
<link rel="stylesheet" href="style/customerstyle.css">
<title>Delete</title>
</head>
<body>
<?php
    
    include('../libs/config.php');

	$stremployee_id = $_GET["employee_id"];
	$sql = "DELETE FROM employee
			WHERE employee_id = '".$stremployee_id."' ";

	$query = mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)) {
         echo "Record delete successfully";
         header( "location: employee-index.php" );
	}

	mysqli_close($conn); 
?>
</body>
</html>