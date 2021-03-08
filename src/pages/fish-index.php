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
    $sql = "SELECT  fish_data.fish_id,
    fish_type.fish_type_name,
    fish_data.fish_stew_name,
    fish_data.fish_status,
    fish_data.fish_health,
    fish_data.date_of_fish,
    fish_data.date_change_fish
    -- fish_sales_details.fish_sales_price
              
 FROM    fish_data
 INNER JOIN fish_type ON fish_type.fish_type_id = fish_data.fish_type_id 
--  INNER JOIN fish_sales_details ON fish_sales_details.fish_id = fish_data.fish_id 
 ORDER BY fish_data.fish_id  ASC
--  DESC มากไปน้อย
";              

	$query = mysqli_query($conn,$sql);

?>

<div class="contact-section">
    <h4>ข้อมูลปลาในกระชัง</h4>
    <br>
    <a href="fish-form.php" class="btn btn-success"><i class="fas fa-plus"></i> เพิ่มข้อมูลกระชังใหม่</a> &nbsp;&nbsp;
    <a href="order_fish-form.php" class="btn btn-secondary"><i class="fas fa-edit"></i> สั่งซื้อลูกปลาเข้ากระชัง</a> &nbsp;&nbsp;
    <a href="give_food-form.php" class="btn btn-info"><i class="fas fa-edit"></i> ให้อาหารปลา</a>
    
</div>
<table class="table">
   <thead class="thead-dark">
       <tr>
           <th scope="col">id</th>
           <th scope="col">ชื่อกระชัง</th>
           <th scope="col">วันที่ลงปลา</th>
           <th scope="col">ชื่อประเภท</th>
           <th scope="col">วันที่เปลี่ยนสถานะปลา</th>
           <th scope="col">สถานะ</th>
           <th scope="col">สุขภาพ</th>
           <!-- <th scope="col">ราคา</th> -->
           <th scope="col">Actions</th>

       </tr>
   </thead>

<?php 
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?> 
        <tr>
        
           <td><?php echo $result['fish_id']; ?></td>
           <td><?php echo $result['fish_stew_name']; ?></td>
           <td><?php echo $result['date_of_fish']; ?></td>
           <td><?php echo $result['fish_type_name']; ?></td>
           <td><?php echo $result['date_change_fish']; ?></td>


           <td>       
                <?php if ($result['fish_status']=="ปลาระยะเเรก") { ?>
                        <a  class="btn btn-info"><i class='fa fa-check-circle'></i> <i class=""></i>ปลาระยะแรก</a>
                <?php }else if ($result['fish_status']=="ปลาระยะสอง") { ?>
                       <a  class="btn btn-primary"><i class='fa fa-check-circle'></i> <i class=""></i>ปลาระยะสอง</a>
                <?php }else if ($result['fish_status']=="ปลาระยะสาม") { ?>
                       <a  class="btn btn-warning"><i class='fa fa-check-circle'></i> <i class=""></i>ปลาระยะสาม</a>
                <?php }else if ($result['fish_status']=="พร้อมขาย") { ?>
                       <a  class="btn btn-success"><i class='fa fa-check-circle'></i> <i class=""></i>พร้อมขาย</a>
                <?php }else if($result['fish_status']=="ว่าง"){ ?>
                       <a  class="btn btn-secondary"><i class='fa fa-check-circle'></i> <i class=""></i>ว่าง</a>
                    <?php } ?>   
                          
                
           </td>

           <td>
                <?php if($result['fish_health']=="สุขภาพดี"){ ?>
                        <a  class="btn btn-info"><i class='fa fa-check-circle'></i> <i class=""></i>สุขภาพดี</a>
                <?php }else if($result['fish_health']=="สุขภาพไม่ดี"){ ?>
                        <a  class="btn btn-danger"><i class='fa fa-check-circle'></i> <i class=""></i>สุขภาพไม่ดี</a>
                <?php }else if ($result['fish_health']=="ว่าง") { ?>
                       <a  class="btn btn-secondary"><i class='fa fa-check-circle'></i> <i class=""></i>ว่าง</a>
                    <?php } ?>   
                          
                
           </td>



          


           <td>
           
                <a href="fish-edit.php?fish_id=<?php echo $result['fish_id'];?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='fish-delete.php?fish_id=<?php echo $result["fish_id"];?>';}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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