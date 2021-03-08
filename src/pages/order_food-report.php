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
        $food_order_id = $_REQUEST['food_order_id'];

        $sql1 = "SELECT
                        food_order.food_order_id,
                        food_order.food_order_date,
                        employee.employee_id,
                        employee.firstname,
                        employee.lastname,
                        supplier_food.supplier_food_name
                FROM
                food_order
                INNER JOIN employee ON employee.employee_id = food_order.employee_id
                INNER JOIN supplier_food ON supplier_food.supplier_food_id = food_order.supplier_food_id

                where food_order.food_order_id = '$food_order_id'";

        $query1 = $conn->query($sql1);
        $result1 = mysqli_fetch_assoc($query1);

        // -------------------------------------------------------------------------------------------------------

        $sql2 = "SELECT
                        food_order.food_order_id,
                        food_order_details.food_order_details_id,
                        -- food_data.food_data_id,
                        food_data.food_data_name,
                        food_order_details.order_food_number,
                        food_order_details.order_food_price,
                        food_order_details.order_food_price_sum
                FROM
                food_order_details
                INNER JOIN food_order ON food_order.food_order_id = food_order_details.food_order_id
                INNER JOIN food_data ON food_data.food_data_id = food_order_details.food_data_id

                where food_order.food_order_id = '$food_order_id'";
                

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
                            <?php echo $result1['food_order_date'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            รหัสการสั่งซื้อ
                        </div>
                        <div class="col-10">
                            <?php echo $result1['food_order_id'] ?>
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
                            <?php echo $result1['supplier_food_name'] ?>
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
                    <th class="text-center" scope="col">ชื่ออาหาร</th>
                    <th class="text-center" scope="col">จำนวน(ต่อกระสอบ)</th>
                    <th class="text-center" scope="col">ราคา(ต่อกระสอบ)</th>
                    <th class="text-center" scope="col">ราคารวม</th>
                </tr>
            </thead>

            <?php
            $i = 1;
            $order_food_sum_price = 0;
            $total_price = 0;
            while($result=mysqli_fetch_array($query2,MYSQLI_ASSOC))
            {
            ?>
                <tr>
                    <?php $order_food_sum_price = number_format($result['order_food_number']* $result['order_food_price'],2); ?>
                    <td class="text-center"><?php echo $i?></td>

                    <td class="text-center"><?php echo $result['food_order_details_id']?></td>
                    <td class="text-center"><?php echo $result['food_data_name']?></td>
                    <td class="text-center"><?php echo $result['order_food_number']?></td>
                    <td class="text-center"><?php echo number_format($result['order_food_price'],2);?></td>
                    <td class="text-center"><?php echo number_format($result['order_food_number'] * $result['order_food_price'],2); ?></td>

                    <?php $total_price = $total_price + ($result['order_food_number'] * $result['order_food_price']);?>
                </tr>

            <?php
                $i++;
            }
            ?>
                
                <tr class="table-secondary">
                    <th class="text-center" colspan="5">ราคารวมทั้งหมด</p></th>
                    <td class="text-center"><?php echo number_format($total_price,2) ?></td>
        </table>

        <div class="row">
            <div class="col-10">
            </div>
            <div class="col-2">
                <a href="order_food-index.php"><button type="button" class="btn btn-warning btn-block" ><i class="fas fa-arrow-circle-left"> กลับ | Back</i></button></a>
            </div>
            
        </div>

      


    </div>
    
    <?php
    mysqli_close($conn);
    ?>