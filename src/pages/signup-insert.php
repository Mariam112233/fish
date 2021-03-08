<!-- </?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?> -->

<?php
 
	include('../libs/config.php');

	$sql = "INSERT INTO employee (firstname, lastname, address, tel, facebook, email, position, username, password) 
		VALUES ('".$_POST["firstname"]."','".$_POST["lastname"]."','".$_POST["address"]."'
		,'".$_POST["tel"]."','".$_POST["facebook"]."','".$_POST["email"]."','".$_POST["position"]."','".$_POST["username"]."','".$_POST["password"]."')";

	$query = mysqli_query($conn,$sql);

	if($query) {
		echo "Record add successfully";
		header( "location: ../../index.php" );
	}
	
	// if($query)
    //       {
    //         echo '<script> alert("Record add successfully"); </script>';
	// 		header( "location: employee-index.php" );
    //       }
    //       else
    //       {
    //         echo '<script> alert("Data Not Saved"); </script>';
    //       }

	mysqli_close($conn);
?>