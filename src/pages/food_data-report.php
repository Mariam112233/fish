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

    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/fishcon.ico">

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
        $food_data_id = $_REQUEST['food_data_id'];

        $sql = "SELECT * FROM food_data";

        $query1 = $conn->query($sql1);
        $result1 = mysqli_fetch_assoc($query1);

        // -------------------------------------------------------------------------------------------------------

        $sql2 = "   SELECT * 
                    FROM  ordering_raw_materials_details
                    INNER JOIN ordering_raw_materials ON ordering_raw_materials.ordering_raw_materials_id = ordering_raw_materials_details.ordering_raw_materials_id
                    INNER JOIN raw_material ON raw_material.raw_material_id = ordering_raw_materials_details.raw_material_id

                where ordering_raw_materials_details.raw_material_id = '$raw_material_id'";

        $query2 = mysqli_query($conn,$sql2);
    ?>
 
    <!-- <div class="has-success form-group"> -->
    <div class="container">
        <br><br><br>
            <a><button type="button" class="btn btn-warning btn-lg btn-block" >รายละเอียดวัตถุดิบ</i></button></a>
        <br>
        <div class="card">
            <!-- <div class="card-header">
                <h5 class="card-title" align="center">รายละเอียดวัตถุดิบ</h5>
            </div> -->
            <div class="card-body">

                <div class="container"> 
                    <div class="row">
                        <div class="col-2">
                            รหัสวัตถุดิบ
                        </div>
                        <div class="col-10">
                            <?php echo $result1['raw_material_id'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            ชื่อวัตถุดิบ
                        </div>
                        <div class="col-10">
                            <?php echo $result1['raw_material_name'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            ประเภทวัตถุดิบ
                        </div>
                        <div class="col-10">
                            <?php echo $result1['raw_material_type_name'] ?> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            น้ำหนักรวมของวัถุดิบ
                        </div>
                        <div class="col-10">
                            <?php echo $result1['weight'] ?>    กรัม
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
                    <th class="text-center" scope="col">วันที่ซื้อ</th>
                    <th class="text-center" scope="col">ชื่อวัตถุดิบ</th>
                    <th class="text-center" scope="col">น้ำหนักรวม(กรัม)</th>
                    <th class="text-center" scope="col">ราคาซื้อต่อกรัม</th>
                    <th class="text-center" scope="col">ราคาขายต่อกรัม (30%)</th>
                    <th class="text-center" scope="col">ราคาซื้อรวม</th>
                    <th class="text-center" scope="col">ราคาขายรวม (30%)</th>

                </tr>
            </thead>

            <?php
            $i = 1;
            $sum_price = 0;
            $total_price = 0;
            $total_price1 = 0;
            while($result=mysqli_fetch_array($query2,MYSQLI_ASSOC))
            {
            ?>
                <tr>

                    <td><?php echo $i?></td>
                    <td><?php echo $result['ordering_date']?></td>
                    <td><?php echo $result['raw_material_name']?></td>
                    <td><?php echo $result['total_weigth']?></td>
                    <td><?php echo $result['price_per_gram']?></td>
                    <td><?php echo number_format($result['sale_price'],2); ?></td>
                    <td><?php echo number_format($result['sum_price'],2); ?></td>
                    <td><?php echo number_format($result['sum_sale_price'],2); ?></td>
                    
                    <?php $total_price = $total_price + ($result['sum_price']);?>
                    <?php $total_price1 = $total_price1 + ($result['sum_sale_price']);?>

                </tr>

            <?php
                $i++;
            }
            ?>
                <tr class="table-secondary">
                    <th class="text-center" colspan="6">ราคารวม</p></th>
                    <td><?php echo number_format($total_price,2) ?></td>
                    <td><?php echo number_format($total_price1,2) ?></td>
                </tr>
        </table>

        <div class="row">
            <div class="col-10">
            </div>
            <div class="col-2">
        
            <button type="button" class="btn btn-warning btn-block" onClick="history.go(-1);"><i class="fas fa-arrow-circle-left"> กลับ | Back</i></button>
            <!-- <a href="raw_material-index.php"><button type="button" class="btn btn-warning btn-block" ><i class="fas fa-arrow-circle-left"> กลับ | Back</i></button></a> -->
            
            </div>
            <!-- <div class="col-2">
            <a href="#"><button type="button" class="btn btn-light btn-block" ><i class="fas fa-print"> พิมพ์ | Print</i></button></a>
            </div> -->
        </div>

    </div>
    
    <?php
    mysqli_close($conn);
    ?>