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
    medicine_order.medicine_order_id,
    medicine_order.medicine_order_date,
    employee.employee_id,
    employee.firstname,
    employee.lastname,
    supplier_medicine.supplier_medicine_id,
    supplier_medicine.supplier_medicine_name

    FROM
    medicine_order
    INNER JOIN employee ON employee.employee_id = medicine_order.employee_id
    INNER JOIN supplier_medicine ON supplier_medicine.supplier_medicine_id = medicine_order.supplier_medicine_id
    
    ORDER BY medicine_order.medicine_order_id ASC";

	$query = mysqli_query($conn,$sql);

?>
 
<div class="contact-section">
    <h4>ข้อมูลการสั่งซื้อยารักษาโรค</h4>

    <form action="" method="get" enctype="multipart/form-data" class="form-inline mr-auto">
        <a href="order_medicine-form.php" class="btn btn-success"><i class="fas fa-plus"></i></a> &nbsp;
    
    </form>

</div>
<table class="table">
   <thead class="thead-dark">
       <tr>
           <th scope="col">id</th>
           <th scope="col">วันที่สั่งซื้อ</th>
           <th scope="col">ชื่อพนักงานที่สั่งซื้อ</th>
           <th scope="col">ชื่อร้านที่ซื้อ</th>
           <th scope="col">Actions</th>

       </tr>
   </thead>

<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>

        <tr>
           <th><?php echo $result['medicine_order_id']; ?></th>
           <td><?php echo $result['medicine_order_date']; ?></td>
           <td><?php echo $result['firstname']; ?> <?php echo $result['lastname']; ?></td>
           <td><?php echo $result['supplier_medicine_name']; ?></td>
           
           
           <td>
           <!-- class="contact-form-btn" -->
                <a href="order_medicine-report.php?medicine_order_id=<?php echo $result['medicine_order_id'];?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                <a href="order_medicine-edit.php?medicine_order_id=<?php echo $result['medicine_order_id'];?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
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