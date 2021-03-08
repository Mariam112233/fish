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
        $fish_sales_id = $_REQUEST['fish_sales_id'];

        $sql1 = "SELECT
                        fish_sales.fish_sales_id,
                        fish_sales.fish_sales_date,
                        customer.customer_id,
                        customer.c_firstname,
                        customer.c_lastname,
                        fish_sales.payment_status
                FROM
                fish_sales
                INNER JOIN customer ON customer.customer_id = fish_sales.customer_id
                -- INNER JOIN fish_sales_details ON fish_sales_details.fish_sales_details_id = fish_sales.fish_sales_details_id

                where fish_sales.fish_sales_id = '$fish_sales_id'";

        $query1 = $conn->query($sql1);
        $result1 = mysqli_fetch_assoc($query1);

        // -------------------------------------------------------------------------------------------------------

        $sql2 = "SELECT

                        fish_sales.fish_sales_id,
                        fish_sales_details.fish_sales_details_id,
                        fish_data.fish_id,
                        fish_sales_details.fish_weight_total,
                        fish_sales_details.fish_sales_price,
                        fish_sales_details.fish_sales_sum_price,
                        fish_type.fish_type_id,
                        fish_type.fish_type_name,
                        fish_data.fish_stew_name

                FROM
                fish_sales_details
                INNER JOIN fish_sales ON fish_sales.fish_sales_id = fish_sales_details.fish_sales_id
                INNER JOIN fish_data ON fish_data.fish_id = fish_sales_details.fish_id
                INNER JOIN fish_type ON fish_type.fish_type_id = fish_data.fish_type_id
                


                

                where fish_sales.fish_sales_id = '$fish_sales_id'";

        $query2 = mysqli_query($conn,$sql2);
    ?>


    <div class="container">
        <br><br><br>
            <a><button type="button" class="btn btn-warning btn-lg btn-block" >รายละเอียดการขาย</i></button></a>
        <br>

        <div class="card">

            <div class="card-body">

                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            วันที่
                        </div>
                        <div class="col-10">
                            <?php echo $result1['fish_sales_date'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            รหัสการขาย
                        </div>
                        <div class="col-10">
                            <?php echo $result1['fish_sales_id'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                        รหัสลูกค้า
                        </div>
                        <div class="col-10">
                            <?php echo $result1['customer_id'] ?> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            ชื่อลูกค้า
                        </div>
                        <div class="col-10">
                            <?php echo $result1['c_firstname'] ?> <?php echo $result1['c_lastname'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                        สถานะชำระ
                        </div>
                        <div class="col-10">
                            <?php echo $result1['payment_status'] ?>
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
                    <th class="text-center" scope="col">รหัสรายละเอียดการขาย</th>
                    <th class="text-center" scope="col">รหัสปลา</th>
                    <th class="text-center" scope="col">ประเภทปลา</th>
                    <th class="text-center" scope="col">ชื่อกระชัง</th>
                    <th class="text-center" scope="col">น้ำหนักรวม(กิโลกรัม)</th>
                    <th class="text-center" scope="col">ราคา(ต่อกิโลกรัม)</th>
                    <th class="text-center" scope="col">ราคารวม</th>
                    <!-- <th class="text-center" scope="col">แก้ไข</th> -->
                </tr>
            </thead>

            <?php
            $i = 1;
            $fish_sales_sum_price = 0;
            $total_price = 0;
            while($result=mysqli_fetch_array($query2,MYSQLI_ASSOC))
            {
            ?>
                <tr>
                    <?php $fish_sales_sum_price = number_format($result['fish_weight_total']* $result['fish_sales_price'],2); ?>
                    <td class="text-center"><?php echo $i?></td>
        
                    <td class="text-center"><?php echo $result['fish_sales_details_id']?></td>
                    <td class="text-center"><?php echo $result['fish_id']?></td>
                    <td class="text-center"><?php echo $result['fish_type_name']?></td>
                    <td class="text-center"><?php echo $result['fish_stew_name']?></td>
                    <td class="text-center"><?php echo $result['fish_weight_total']?></td>
                    <td class="text-center"><?php echo number_format($result['fish_sales_price'],2);?></td>
                    <!-- <td></?php echo $result['sum_price']?></td> -->
                    <td class="text-center"><?php echo number_format($result['fish_weight_total'] * $result['fish_sales_price'],2); ?></td>
                    
                   

                    <?php $total_price = $total_price + ($result['fish_weight_total'] * $result['fish_sales_price']);?>
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
                <a href="sales_fish-index.php"><button type="button" class="btn btn-warning btn-block" ><i class="fas fa-arrow-circle-left"> กลับ | Back</i></button></a>
            </div>
            
        </div>

       


    </div>
    
    <?php
    mysqli_close($conn);
    ?>