<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>

<?php
	
	include('../libs/config.php');

	$sql = "INSERT INTO customer (
		c_firstname, 
		c_lastname, 
		c_gender, 
		c_address, 
		c_tel, 
		c_email,
		username,
		password,
		position

		) 
		VALUES (
			'".$_POST["c_firstname"]."',
			'".$_POST["c_lastname"]."',
			'".$_POST["c_gender"]."',
			'".$_POST["c_address"]."',
			'".$_POST["c_tel"]."',
			'".$_POST["c_email"]."',
			'".$_POST["username"]."',
			'".$_POST["password"]."',
			'".$_POST["position"]."'
			
			)";
			

	$query = mysqli_query($conn,$sql);

	if($query) {
		echo "Record add successfully";
		header( "location: customer-index.php" );
	}
	
	// if($query)
    //       {
    //         echo '<script> alert("Record add successfully"); </script>';
	// 		header( "location: customer-index.php" );
    //       }
    //       else
    //       {
    //         echo '<script> alert("Data Not Saved"); </script>';
    //       }

	mysqli_close($conn);
?>