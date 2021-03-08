<html> 
<head>
<title>Save</title>
</head> 
<body>  
<?php 

include('../libs/config.php');
    
    $sql = "  UPDATE    fish_sales
                SET     delivery_status = '".$_POST["delivery_status"]."'
                
                WHERE   fish_sales.fish_sales_id = '".$_POST["fish_sales_id"]."' ";
            
    mysqli_query($conn, $sql);
    $query = mysqli_query($conn,$sql);

    // ===================================================================================== 
 
    if($query) {
     echo "Record update successfully";
     header( "location: delivery_report.php" );
     
	}
	mysqli_close($conn);
?>
</body> 
</html> 