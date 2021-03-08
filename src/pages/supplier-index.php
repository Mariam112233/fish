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

	$sql = "SELECT * FROM supplier";

	$query = mysqli_query($conn,$sql);

?>

<div class="contact-section">
    <h4>ข้อมูลซัพพลายเออร์ / Supplier</h4>

    <a href="supplier-form.php" class="btn btn-success"><i class="fas fa-plus"></i></a>
</div>    
<table class="table">
   <thead class="thead-dark">
       <tr>
           <th scope="col">id</th>
           <th scope="col">ชื่อร้าน</th>
           <th scope="col">ที่อยู่ร้าน</th>
           <th scope="col">เบอร์</th>
           <th scope="col">Email</th>
           <th scope="col">Actions</th>

       </tr>
   </thead>

<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>

        <tr>
           <th><?php echo $result['supplier_id']; ?></th>
           <td><?php echo $result['shop_name']; ?></td>
           <td><?php echo $result['address']; ?></td>
           <td><?php echo $result['tel']; ?></td>
           <td><?php echo $result['email']; ?></td>
           
           <td>
               <a href="supplier-edit.php?supplier_id=<?php echo $result['supplier_id'];?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
               <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='supplier-delete.php?supplier_id=<?php echo $result["supplier_id"];?>';}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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