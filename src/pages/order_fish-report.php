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
    <!-- <link rel="stylesheet" href="style/customerstyle.css"> -->

    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon.ico">

    <title> Report </title>
</head> 

<style>

body {background-color: #000000;}
/* .font-family : {'Sriracha', cursive;} */
/* font-family: "Times New Roman", Times, serif; */
/* .card {background-color: #f9ca24;} */

/* body {background-color: powderblue;}
h1   {color: blue;}
p    {color: red;} */
</style>


    <?php
        include('../libs/config.php');
        $fish_order_id = $_REQUEST['fish_order_id'];

        $sql1 = "SELECT
                        fish_order.fish_order_id,
                        fish_order.fish_order_date,
                        employee.employee_id,
                        employee.firstname,
                        employee.lastname,
                        supplier.shop_name
                FROM
                fish_order
                INNER JOIN employee ON employee.employee_id = fish_order.employee_id
                INNER JOIN supplier ON supplier.supplier_id = fish_order.supplier_id

                where fish_order.fish_order_id = '$fish_order_id'";

        $query1 = $conn->query($sql1);
        $result1 = mysqli_fetch_assoc($query1);

        // -------------------------------------------------------------------------------------------------------

        $sql2 = "SELECT
                        fish_order.fish_order_id,
                        fish_order_details.fish_order_details_id,
                        -- food_data.food_data_id,
                        fish_data.fish_id,
                        fish_type.fish_type_id,
                        fish_order_details.fish_size,
                        fish_order_details.order_fish_number,
                        fish_order_details.order_fish_price,
                        fish_order_details.order_fish_price_sum
                FROM
                fish_order_details
                INNER JOIN fish_order ON fish_order.fish_order_id = fish_order_details.fish_order_id
                INNER JOIN fish_data ON fish_data.fish_id = fish_order_details.fish_id
                INNER JOIN fish_type ON fish_type.fish_type_id = fish_data.fish_type_id

                where fish_order.fish_order_id = '$fish_order_id'";
                

        $query2 = mysqli_query($conn,$sql2);
    ?>

    <!-- <div class="has-success form-group"> -->
    <div class="container">
        <br><br><br>
            <a><button type="button" class="btn btn-warning btn-lg btn-block" >รายละเอียดการสั่งซื้อ</i></button></a>
        <br>

        <div class="card">
            <!-- <div class="card-header">
                <h5 class="card-title" align="center">รายละเอียดการสั่งซื้อ</h5>
            </div> -->
            <div class="card-body">

                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            วันที่
                        </div>
                        <div class="col-10">
                            <?php echo $result1['fish_order_date'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            รหัสการสั่งซื้อ
                        </div>
                        <div class="col-10">
                            <?php echo $result1['fish_order_id'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            รหัสพนักงาน
                        </div>
                        <div class="col-10">
                            <?php echo $result1['employee_id'] ?> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            ชื่อพนักงาน
                        </div>
                        <div class="col-10">
                            <?php echo $result1['firstname'] ?> <?php echo $result1['lastname'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            ชื่อร้านที่สั่งซื้อ
                        </div>
                        <div class="col-10">
                            <?php echo $result1['shop_name'] ?>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
        <br><br>

 
        <!-- ================================================================================= -->
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center" scope="col">ลำดับ</th>
                    <th class="text-center" scope="col">รหัสรายละเอียดการสั่งซื้อ</th>
                    <th class="text-center" scope="col">รหัสปลาในกระชัง</th>
                    <th class="text-center" scope="col">รหัสประเภทปลา</th>
                    <th class="text-center" scope="col">ขนาด (นิ้ว)</th>
                    <th class="text-center" scope="col">จำนวนที่สั่งซื้อ(ตัว)</th>
                    <th class="text-center" scope="col">ราคาที่ซื้อ(ตัว)</th>
                    <th class="text-center" scope="col">ราคารวม</th>
                </tr>
            </thead>

            <?php
            $i = 1;
            $order_fish_price_sum = 0;
            $total_price = 0;
            while($result=mysqli_fetch_array($query2,MYSQLI_ASSOC))
            {
            ?>
                <tr>
                    <?php $order_fish_price_sum = number_format($result['order_fish_number']* $result['order_fish_price'],2); ?>
                    <td class="text-center"><?php echo $i?></td>

                    <td class="text-center"><?php echo $result['fish_order_details_id']?></td>
                    <td class="text-center"><?php echo $result['fish_id']?></td>
                    <td class="text-center"><?php echo $result['fish_type_id']?></td>
                    <td class="text-center"><?php echo $result['fish_size']?></td>
                    <td class="text-center"><?php echo $result['order_fish_number']?></td>
                    <td class="text-center"><?php echo number_format($result['order_fish_price'],2);?></td>

                    <td class="text-center"><?php echo number_format($result['order_fish_number'] * $result['order_fish_price'],2); ?></td>
                    
                    

                    <?php $total_price = $total_price + ($result['order_fish_number'] * $result['order_fish_price']);?>
                </tr>

            <?php
                $i++;
            }
            ?>
                <tr class="table-secondary">
                    <th class="text-center" colspan="7">ราคารวมทั้งหมด</p></th>
                    <td class="text-center"><?php echo number_format($total_price,2) ?></td>
                </tr>

        </table>

        <div class="row">
            <div class="col-10">
            </div>
            <div class="col-2">
                <a href="order_fish-index.php"><button type="button" class="btn btn-warning btn-block" ><i class="fas fa-arrow-circle-left"> กลับ | Back</i></button></a>
            </div>
            
        </div>

        


    </div>
    
    <?php
    mysqli_close($conn);
    ?>