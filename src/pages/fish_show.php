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
		

	<body>
    <div class="container">
		<?php   include('../libs/config.php');;

                $sql = "SELECT *
                FROM fish_order_details";

            $query = mysqli_query($conn,$sql);

        ?>

		<div class="contact-section">
    <h4>ข้อมูลปลาในกระชัง</h4>
    </div> 

    <table class="table">
    <thead class="thead-dark">
    <tr>
           <th scope="col">id</th>
           <th scope="col">ชื่อประเภท</th>
           <th scope="col">Actions</th>

       </tr>
   </thead>


<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>

        <tr>
            <th><?php echo $result['fish_order_details_id']; ?></th>
            <td><?php echo $result['fish_type_id']; ?> </td>
        <td>

           <a href="delivery_report.php?customer_id=<?php echo $result['customer_id'];?>" class="btn btn-success"><i class="fas fa-eye"></i></a>
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