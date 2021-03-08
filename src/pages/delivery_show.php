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
		<?php   include('../libs/config.php');

$sql = "SELECT *
FROM fish_sales
INNER JOIN customer ON fish_sales.customer_id = customer.customer_id
WHERE fish_sales.payment_status='ชำระแล้ว'
ORDER BY fish_sales.fish_sales_id DESC

";

$query = mysqli_query($conn,$sql);

            $query = mysqli_query($conn,$sql);
                    ?>

		<div class="contact-section">
    <h4>ข้อมูลการจัดส่ง</h4>
    </div> 

    <table class="table">
    <thead class="thead-dark">
    <tr>
           <th scope="col">id</th>
            <th scope="col">วันที่ขาย</th>          
            <th scope="col">ชื่อลูกค้า</th>
            <th scope="col">วันที่ชำระ</th>
            <th scope="col">สถานะชำระเงิน</th>
            <th scope="col">สถานะการจัดส่ง</th>
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
            <td><a class="btn btn-info"><i class='fa fa-check-circle'></i> </i><?php echo $result['payment_status']; ?></td>
            <td class="text-center">
                    
                    <?php if($result['delivery_status']=="กำลังจัดส่ง"){ ?>
                        <a href="delivery_editstatus.php?fish_sales_id=<?php echo $result['fish_sales_id'];?>" class="btn btn-warning"><i class='fa fa-spinner fa-spin'></i> </i>กำลังจัดส่ง</a>
                    <?php }else { ?>
                            <a class="btn btn-danger"><i class='fa fa-check-circle'></i> <i class=""></i>จัดส่งแล้ว</a>
                    <?php } ?>

                    </td>
        <td>

           <a href="delivery_report.php?fish_sales_id=<?php echo $result['fish_sales_id'];?>" class="btn btn-success"><i class="fas fa-eye"></i></a>
           <!-- <a href="sales_fish-edit.php?fish_sales_id=<?php echo $result['fish_sales_id'];?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a> -->
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