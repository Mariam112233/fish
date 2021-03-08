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

	$sql = "UPDATE ordering_raw_materials_details SET 

            ordering_raw_materials_id = '".$_POST["ordering_raw_materials_id"]."',
            ordering_raw_materials_details_id = '".$_POST["ordering_raw_materials_details_id"]."',
            total_weigth = '".$_POST["total_weigth"]."',
            price_per_gram = '".$_POST["price_per_gram"]."',
            raw_material_id = '".$_POST["raw_material_id"]."'

			WHERE ordering_raw_materials_details_id = '".$_POST["ordering_raw_materials_details_id"]."' ";

  $query = mysqli_query($conn,$sql);
  
  // ======================================================================================================

  // $sql1 = " UPDATE  raw_material 
  //           SET     "

  // ======================================================================================================
 
	if($query) {
     echo "Record update successfully";
     header( "location: ordering_raw_materials-index.php" );
	}
 
	mysqli_close($conn);
?>
</body>  
</html> 