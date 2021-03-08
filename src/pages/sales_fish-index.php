<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link href="../../assets/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="style/indexstyle.css">

    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon.ico">

    <title> Show </title>
</head>
  
<style>
body{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    /* background: url(gift1.png) no-repeat; */
    background: url(33.jpg) no-repeat;
    background-size: 100% ;
}
</style>

<body>
 
<div class="container">

<?php 
	
    include('../libs/config.php');

    $sql = "SELECT
    fish_sales.fish_sales_id,
    fish_sales.fish_sales_date,
    customer.c_firstname,
    customer.c_lastname,
    fish_sales.fish_sales_date_chamra,
    fish_sales.payment_status



    FROM
    fish_sales
    INNER JOIN customer ON customer.customer_id = fish_sales.customer_id
    -- INNER JOIN fish_sales_details ON fish_sales_details.fish_sales_details_id = fish_sales_details.fish_sales_details_id
    
    ORDER BY fish_sales.fish_sales_id DESC";
    // DESC

	$query = mysqli_query($conn,$sql);

?>
 
<div class="contact-section">
    <h4>ข้อมูลการขายปลา/การชำระ</h4>

    <form action="" method="get" enctype="multipart/form-data" class="form-inline mr-auto">
        <a href="sales_fish-form.php" class="btn btn-info"><i class="fas fa-edit"></i> การขายปลา</a> &nbsp;&nbsp;
    
    </form>

</div>
<table class="table">
   <thead class="thead-dark">
       <tr>
           <th scope="col">id</th>
           <th scope="col">วันที่ขาย</th>
           <th scope="col">ชื่อลูกค้า</th>
           <th scope="col">วันที่ชำระ</th>
           <th scope="col">สถานะชำระ</th>
           <th scope="col">Actions</th>

       </tr>
   </thead>

<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>

        <tr>
           <th><?php echo $result['fish_sales_id']; ?></th>
           <td><?php echo $result['fish_sales_date']; ?></td>
           <td><?php echo $result['c_firstname']; ?> <?php echo $result['c_lastname']; ?></td>
           <td><?php echo $result['fish_sales_date_chamra']; ?></td>

           <td>
                <?php if($result['payment_status']=="ชำระแล้ว"){ ?>
                        <a <?php echo $result['fish_sales_id'];?>" class="btn btn-info"><i class='fa fa-check-circle'></i> <i class=""></i>ชำระแล้ว</a>
                    <?php }else { ?>
                            <a class="btn btn-warning"><i class='fa fa-spinner fa-spin'></i> <i class=""></i>ยังไม่ชำระ</a>
                    <?php } ?>
           </td>
           
           
           <td>
           <!-- class="contact-form-btn" -->
                <a href="sales_fish-report.php?fish_sales_id=<?php echo $result['fish_sales_id'];?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                <a href="sales_fish-edit.php?fish_sales_id=<?php echo $result['fish_sales_id'];?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                <!-- <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='ordering_raw_materials-delete.php?ordering_raw_materials_id=</?php echo $result["ordering_raw_materials_id"];?>';}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a> -->
           </td>

       </tr>

<?php
}
?>
</table>

 
<?php
mysqli_close($conn);
?>

</div>

<?php include('indexmenu.php');  ?>

</body>
</html>