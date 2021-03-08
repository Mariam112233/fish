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
//  



    $search = isset($_GET['search']) ? $_GET['search']: '';

    $sql = "SELECT * FROM  salary
            INNER JOIN employee ON employee.employee_id = salary.employee_id 
                      
            WHERE salary.salary_give_date LIKE '%$search%' "; 

	$query = mysqli_query($conn,$sql);

?>

<div class="contact-section">
    <h4>ข้อมูลค่าตอบแทน / salary</h4>
    <form action="" method="get" enctype="multipart/form-data" class="form-inline mr-auto">

    <input class="form-control mr-sm-2" type="date" placeholder="Search" aria-label="Search" name="search">
    <button class="btn btn-warning" type="submit" >Search</button> 
    <a href=" salary-form.php" class="btn btn-success"><i class="fas fa-plus"></i> เพิ่มข้อมูลค่าตอบแทน</a> &nbsp;&nbsp;


</div>    
<table class="table">
   <thead class="thead-dark">
       <tr>
           <th scope="col">id</th>
           <th scope="col">วันที่ให้</th>
           <th scope="col">รหัสพนักงาน</th>
           <th scope="col">จำนวนวันเข้างาน</th>
           <th scope="col">จำนวนค่าตอบแทน</th>
           <th scope="col">ค่าตอบแทนรวม</th>
           <th scope="col">สถานะ</th>
           <th scope="col">Actions</th>

       </tr>
   </thead>


   <?php 
      $salary_number_price_sum = 0;      
        while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
        {
    ?>

        <tr>
            <?php $salary_number_price_sum = number_format($result['salary_number']* $result['salary_number_price'],2 ); ?>
           <th><?php echo $result['salary_id']; ?></th>
           <td><?php echo $result['salary_give_date']; ?></td>
           <td><?php echo $result['firstname']; ?> <?php echo $result['lastname']; ?></td>
           <td><?php echo $result['salary_number']; ?></td>
           <td><?php echo $result['salary_number_price']; ?></td>
           <td><?php echo $salary_number_price_sum ?></td>


           <td>
                <?php if($result['salary_status']=="ได้รับแล้ว"){ ?>
                        <a <?php echo $result['salary_id'];?>" class="btn btn-info"><i class='fa fa-check-circle'></i> <i class=""></i>ได้รับแล้ว</a>
                    <?php }else { ?>
                            <a class="btn btn-warning"><i class='fa fa-spinner fa-spin'></i> <i class=""></i>ยังไม่ได้รับ</a>
                    <?php } ?>
           </td>
           <td>
               <!-- <a href="fish-report.php?fish_id=<?php echo $result['fish_id'];?>" class="btn btn-primary"><i class="fas fa-eye"></i></a> -->
               <a href="salary-edit.php? salary_id=<?php echo $result['salary_id'];?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
               <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='salary-delete.php?salary_id=<?php echo $result["salary_id"];?>';}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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