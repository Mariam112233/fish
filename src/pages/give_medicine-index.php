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

    $search = isset($_GET['search']) ? $_GET['search']: '';

    $sql = "SELECT 
    give_medicine.give_medicine_id,
    give_medicine.medicine_date,
    employee.employee_id,
    employee.firstname,
    employee.lastname,
    fish_data.fish_id,
    fish_data.fish_stew_name,
    medicine_data.medicine_data_id,
    medicine_data.medicine_data_name,
    give_medicine.medicine_number
    -- fish_type.fish_type_id,
    -- fish_type.fish_type_name
    
    FROM give_medicine
    INNER JOIN employee ON employee.employee_id = give_medicine.employee_id
    INNER JOIN medicine_data ON medicine_data.medicine_data_id = give_medicine.medicine_data_id 
    INNER JOIN fish_data ON fish_data.fish_id =  give_medicine.fish_id
    -- INNER JOIN fish_type ON fish_type.fish_type_id=fish_data.fish_type_id
    WHERE give_medicine.give_medicine_id LIKE '%$search%'

    ORDER BY give_medicine.give_medicine_id DESC
    ";

	$query = mysqli_query($conn,$sql);

?>

<div class="contact-section">
    <h4>ข้อมูลการให้อาหารปลา</h4>
    <form action="" method="get" enctype="multipart/form-data" class="form-inline mr-auto">
       
    <input class="form-control mr-sm-2" type="date" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-warning" type="submit" >Search</button> 
    
    <a href="give_medicine-form.php" class="btn btn-success"><i class="fas fa-plus"></i> เพิ่มข้อมูลการให้ยารักษาโรค</a> &nbsp;&nbsp;
    <!-- <a href="give_medicine-form.php" class="btn btn-info"><i class="fas fa-edit"></i> ให้ยารักษาโรค</a> -->
    <!-- <a href="ordering_raw_fish-form.php" class="btn btn-info"><i class="fas fa-edit"></i> สั่งซื้อวัตถุดิบ</a> -->

        </form>
</div>
<table class="table">
   <thead class="thead-dark">
       <tr>
           <th scope="col">id</th>
           <th scope="col">วันที่ให้ยารักษาโรค</th>
           <th scope="col">ชื่อพนักงาน</th>
           <th scope="col">ชื่อกระชัง</th>
           <!-- <th scope="col">ชื่อประเภทปลา</th> -->
           <th scope="col">ชื่อยารักษาโรค</th>
           <th scope="col">จำนวน(กิโกกรัม)</th>
           <th scope="col">Actions</th>

       </tr>
   </thead>

<?php 
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?> 
        <tr>
           <td><?php echo $result['give_medicine_id']; ?></td>
           <td><?php echo $result['medicine_date']; ?></td>
           <td><?php echo $result['firstname']; ?> <?php echo $result['lastname']; ?></td>
           <td><?php echo $result['fish_stew_name']; ?></td>
           <!-- <td><?php echo $result['fish_type_name']; ?></td> -->
           <th><?php echo $result['medicine_data_name']; ?></th>
           <td><?php echo $result['medicine_number']; ?></td>

           
           <td>
            <!-- class="contact-form-btn" -->

                <a href="give_medicine-edit.php?give_medicine_id=<?php echo $result['give_medicine_id'];?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='give_medicine-delete.php?give_medicine_id=<?php echo $result["give_medicine_id"];?>';}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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