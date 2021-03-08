<?php                                     
require_once("../libs/config.php");
require_once('../MPDF61/mpdf.php');
ob_start(); // ทำการเก็บค่า html นะครับ
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link href="../../assets/fontawesome/css/all.css" rel="stylesheet">

    <title>food_order.PDF</title>

    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon.ico">
</head>
<body>

    <?php
        // include('../libs/config.php');
        // $order_product_id = $_REQUEST['order_product_id'];
        $food_order_id = $_GET['food_order_id'];
        $sql1 = "SELECT
                food_order.food_order_id,
                food_order.food_order_date,
                supplier_food.supplier_food_id,
                employee.employee_id,
                employee.firstname,
                employee.lastname,
                employee.tel,

                -- food_order_details.food_order_details_id,
                food_data.food_data_id,
                -- food_order_details.order_food_number,
                -- food_order_details.order_food_price,
                -- food_order_details.order_food_price_sum
          
            FROM
            food_order
            INNER JOIN employee ON employee.employee_id = food_order.employee_id
            INNER JOIN supplier_food ON supplier_food.supplier_food_id = food_order.supplier_food_id
            -- INNER JOIN food_order_details ON food_order_details.food_order_details_id = food_order.food_order_details_id
            INNER JOIN food_data ON food_data.food_data_id = food_order.food_data_id
            
            
            WHERE food_order.food_order_id = '$food_order_id'";

        $query1 = $conn->query($sql1);
        $result1 = mysqli_fetch_assoc($query1);

    ?>

    <div class="container">

        <p align="center"><img src="../../assets/images/diamond.png" height="50" width="40" class="img-responsive" alt="image"></p>
        <h5 align="center">BANGDAY JEWELR <br> รายละเอียดการสั่งซื้ออาหาร</h5>

        <b>วันที่สั่งซื้อ</b> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $result1['food_order_data'] ?> <br>
    
        <b>รหัสการสั่งซื้ออาหาร  </b> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $result1['food_order_id'] ?> <br>
        
        <b>รหัสรายละเอยดการสั่งซื้ออาหาร  </b> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $result1['food_order_details_id'] ?> <br><br>
        
        <b>รหัสพนักงาน</b> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $result1['employee_id'] ?> <br>
                        
        <b>ชื่อพนักงาน</b> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $result1['firstname'] ?> &nbsp;&nbsp; <?php echo $result1['lastname'] ?> <br>

        <b>เบอร์</b> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $result1['tel'] ?> <br><br>
                        

        <b>ชื่อร้านที่ซื้อ</b> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $result1['supplier_food_id'] ?> <br>
        <!-- <b>รูปแบบ</b> <br> <img src="../../assets/images_upload/<?php echo $result1['image']; ?>" height="150" width="150"> <br><br> -->
        <b>รหัสอาหาร</b> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $result1['food_data_id'] ?> <br>
        <b>จำนวน (กระสอบ)</b> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $result1['order_food_number'] ?> <br>
        <b>ราคา(ต่อกระสอบ)</b> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $result1['order_food_price'] ?> <br>
        <b>ราคารวม</b> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $result1['order_food_price_sum'] ?> <br>

        <!-- ========================================================================================= -->

    </div>          <!-- /container -->
    <!-- ========================================================================================= -->
    
</body>
</html>

<?php
$html = ob_get_contents();
ob_end_clean();
define('FPDF_FONTPATH','font/');
$pdf = new mPDF('th', 'A4','0',''); //การตั้งค่ากระดาษถ้าต้องการแนวตั้ง ก็ A4 เฉยๆครับ ถ้าต้องการแนวนอนเท่ากับ A4-L
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output();
?>