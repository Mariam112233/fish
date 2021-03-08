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
    give_food.give_food_id,
    give_food.food_date,
    employee.employee_id,
    employee.firstname,
    employee.lastname,
    fish_data.fish_id,
    fish_data.fish_stew_name,
    fish_data.fish_type_id,
    food_data.food_data_id,
    food_data.food_data_name,
    give_food.food_number
    
    FROM give_food
    INNER JOIN employee ON employee.employee_id = give_food.employee_id
    INNER JOIN food_data ON food_data.food_data_id = give_food.food_data_id 
    INNER JOIN fish_data ON fish_data.fish_id =  give_food.fish_id


    WHERE give_food.food_date LIKE '%$search%'

                      
    ORDER BY give_food.give_food_id DESC
    -- ORDER BY give_food.give_food_id DESC   /*เรียงลำดับ พายมารี่คีจากมากไปน้อย*/
    -- WHERE type_product_name LIKE '%$search%'";

	$query = mysqli_query($conn,$sql);

?>

<div class="contact-section">
    <h4>ข้อมูลการให้อาหารปลา</h4>
    <form action="" method="get" enctype="multipart/form-data" class="form-inline mr-auto">
       
    <input class="form-control mr-sm-2" type="date" placeholder="Search" aria-label="Search" name="search">
    <button class="btn btn-warning" type="submit" >Search</button> 
    
    <a href="give_food-form.php" class="btn btn-success"><i class="fas fa-plus"></i> เพิ่มข้อมูลการให้อาหาร</a> &nbsp;&nbsp;
    <!-- <a href="ordering_raw_fish-form.php" class="btn btn-info"><i class="fas fa-edit"></i> สั่งซื้อวัตถุดิบ</a> -->

        </form>
</div>
<table class="table">
   <thead class="thead-dark">
       <tr>
           <th scope="col">id</th>
           <th scope="col">วันที่ให้อาหาร</th>
           <th scope="col">ชื่อพนักงาน</th>
           <th scope="col">ชื่อกระชัง</th>
           <!-- <th scope="col">รหัสประเภทปลา</th> -->
           <th scope="col">ชื่ออาหาร</th>
           <th scope="col">จำนวน(กิโล)</th>
           <th scope="col">Actions</th>

       </tr>
   </thead>

<?php 

while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?> 
        <tr>
           <td><?php echo $result['give_food_id']; ?></td>
           <td><?php echo $result['food_date']; ?></td>
           <td><?php echo $result['firstname']; ?> <?php echo $result['lastname']; ?></td>
           <td><?php echo $result['fish_stew_name']; ?></td>
           <!-- <th><?php echo $result['fish_type_id']; ?></th> -->
           <th><?php echo $result['food_data_name']; ?></th>
           <td><?php echo $result['food_number']; ?></td>
           
           <td>               
                <a href="give_food-edit.php?give_food_id=<?php echo $result['give_food_id'];?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='give_food-delete.php?give_food_id=<?php echo $result["give_food_id"];?>';}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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