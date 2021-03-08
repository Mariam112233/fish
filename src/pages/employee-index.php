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
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/fishcon.ico">

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

	$sql = "SELECT * FROM employee";

	$query = mysqli_query($conn,$sql);

?>

<div class="contact-section">
    <h4>ข้อมูลพนักงาน / Employee</h4>

    <a href="employee-form.php" class="btn btn-success"><i class="fas fa-plus"></i></a>
</div>    
<table class="table">
   <thead class="thead-dark">
       <tr>
           <th scope="col">id</th>
           <th scope="col">ชื่อ</th>
           <th scope="col">นามสกุล</th>
           <th scope="col">ที่อยู่</th>
           <th scope="col">เบอร์</th>
           <th scope="col">Email</th>
           <th scope="col">ตำแหน่ง</th>
           <th scope="col">ชื่อเข้าใช้ระบบ</th>
           <th scope="col">รหัสผ่าน</th>
           <th scope="col">แก้ไข</th>
           <th scope="col">ลบ</th>

       </tr>
   </thead>

<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>

        <tr>
           <th><?php echo $result['employee_id']; ?></th>
           <td><?php echo $result['firstname']; ?></td>
           <td><?php echo $result['lastname']; ?></td>
           <td><?php echo $result['address']; ?></td>
           <td><?php echo $result['tel']; ?></td>
           <td><?php echo $result['email']; ?></td>
           <td><?php echo $result['position']; ?></td>
           <td><?php echo $result['username']; ?></td>
           <td><?php echo $result['password']; ?></td>
           
           <td>
               <a href="employee-edit.php?employee_id=<?php echo $result['employee_id'];?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
            </td>
            <td>
               <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='employee-delete.php?employee_id=<?php echo $result["employee_id"];?>';}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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