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
    <link rel="stylesheet" href="style/customerstyle.css">

    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon.ico">

    <title> Edit </title>
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

        $strordering_raw_materials_details_id = null;

        if(isset($_GET["ordering_raw_materials_details_id"]))
        {
            $strordering_raw_materials_details_id = $_GET["ordering_raw_materials_details_id"];
        }

        include('../libs/config.php');

        $sql = "SELECT * 
                FROM
                    ordering_raw_materials_details
                INNER JOIN ordering_raw_materials ON ordering_raw_materials.ordering_raw_materials_id = ordering_raw_materials_details.ordering_raw_materials_id
                INNER JOIN raw_material ON raw_material.raw_material_id = ordering_raw_materials_details.raw_material_id 
        
                WHERE ordering_raw_materials_details.ordering_raw_materials_details_id = '".$strordering_raw_materials_details_id."' ";

        $query = mysqli_query($conn,$sql);

        $result=mysqli_fetch_array($query,MYSQLI_ASSOC);
        $data = $result;

        // -------------------------------------------------------------------------------------------------------

        $sql2 = "SELECT
                        ordering_raw_materials.ordering_raw_materials_id,
                        ordering_raw_materials_details.ordering_raw_materials_details_id,
                        raw_material.raw_material_name,
                        ordering_raw_materials_details.amount,
                        ordering_raw_materials_details.total_weigth,
                        ordering_raw_materials_details.price_per_gram,
                        ordering_raw_materials_details.sum_price
                FROM
                    ordering_raw_materials_details
                INNER JOIN ordering_raw_materials ON ordering_raw_materials.ordering_raw_materials_id = ordering_raw_materials_details.ordering_raw_materials_id
                INNER JOIN raw_material ON raw_material.raw_material_id = ordering_raw_materials_details.raw_material_id

                where ordering_raw_materials.ordering_raw_materials_id = '$ordering_raw_materials_id'";

        // $query2 = mysqli_query($conn,$sql2);
    ?>

    <!-- <div class="has-success form-group"> -->
    <div class="container">
        <br><br><br>
            <a><button type="button" class="btn btn-warning btn-lg btn-block">รายละเอียดการสั่งซื้อ</i></button></a>
        <br><br>

        <!-- =============================================================================================== -->

        <form class="contact-form"action="ordering_raw_materials_details-saveedit.php" method="post">

        <div class="container">
            <div class="row">
            
                <div class="col"> 
                    <label for="ordering_raw_materials_id" class="lb">รหัสการสั่งซื้อ</label>
                    <input type="text" name="ordering_raw_materials_id" class="contact-form-text" id="ordering_raw_materials_id" value="<?php echo $result['ordering_raw_materials_id'];?>" readonly>
                </div>

                <div class="col"> 
                    <label for="ordering_raw_materials_details_id" class="lb">รหัสรายละเอียดการสั่งซื้อ</label>
                    <input type="text" name="ordering_raw_materials_details_id" class="contact-form-text" id="ordering_raw_materials_details_id" value="<?php echo $result['ordering_raw_materials_details_id'];?>" readonly>
                </div>
            </div>
            <br>
            
            <div class="row">
                
                <div class="col"> 
                    <label for="total_weigth" class="lb">น้ำหนักรวม(รวม)</label>
                    <input type="text" name="total_weigth" class="contact-form-text" id="total_weigth" value="<?php echo $result['total_weigth'];?>">
                </div>

                <div class="col"> 
                    <label for="price_per_gram" class="lb">ราคาต่อกรัม</label>
                    <input type="text" name="price_per_gram" class="contact-form-text" id="price_per_gram" value="<?php echo $result['price_per_gram'];?>">
                </div>

                <div class="col">
                        <label for="raw_material_id" class="lb">ชื่อวัตถุดิบ</label>
                        <select class="contact-form-text" name="raw_material_id">
                            <?php 
                                $sql = "SELECT * FROM raw_material"; 
                                $result = $conn->query($sql);
                                foreach($result as $key=>$row) {
                                    $selected = "";
                                    if( $data["raw_material_id"]==$row["raw_material_id"] ) $selected = "selected";
                                    echo '
                                        <option value="'.$row["raw_material_id"].'" '.$selected.'>'.$row["raw_material_id"].' '.$row["raw_material_name"].'</option>
                                    ';
                                } 
                            ?>  
                        </select>
                    </div>

            </div>   <!-- /row -->

            
        </div>  <!-- /container -->

        <br>

        <div class="row">
            <div class="col-8">  
            </div>
            <div class="col-2">
                <input type="submit" class="btn btn-warning btn-block" value="Save" >
            </div>
            <div class="col-2">
            <a href="#"><button type="button" class="btn btn-danger btn-block" onClick = "history.go(-1);" > Cancel </button></a>
            </div>
        </div>

        </form>

        
        <!-- ================================================================================================ -->

    </div>
    
    <?php
    mysqli_close($conn);
    ?>