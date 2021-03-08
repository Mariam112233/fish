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

	$sql = "UPDATE employee SET 
			firstname = '".$_POST["firstname"]."' ,
			lastname = '".$_POST["lastname"]."' , 
			address = '".$_POST["address"]."' ,
            tel = '".$_POST["tel"]."' ,
			email = '".$_POST["email"]."',
			position = '".$_POST["position"]."',
            username = '".$_POST["username"]."' ,
            password = '".$_POST["password"]."'
			WHERE employee_id = '".$_POST["employee_id"]."' ";  
   
	$query = mysqli_query($conn,$sql);

	if($query) {
     echo "Record update successfully";
     header( "location: employee-index.php" );
	}

	mysqli_close($conn);
?>
</body>
</html>