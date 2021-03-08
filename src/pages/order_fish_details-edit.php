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

        $strfood_order_details_id = null;

        if(isset($_GET["food_order_details_id"]))
        {
            $strfood_order_details_id = $_GET["food_order_details_id"];
        }

        include('../libs/config.php');

        $sql = "SELECT * 
                FROM
                food_order_details
                INNER JOIN food_order ON food_order.food_order_id = food_order_details.food_order_id
                INNER JOIN food_data ON food_data.food_data_id = food_order_details.food_data_id 
        
                WHERE food_order_details.food_order_details_id = '".$strfood_order_details_id."' ";

        $query = mysqli_query($conn,$sql);

        $result=mysqli_fetch_array($query,MYSQLI_ASSOC);
        $data = $result;

        // -------------------------------------------------------------------------------------------------------

        $sql2 = "SELECT
                        food_order.food_order_id,
                        food_order_details.food_order_details_id,
                        food_data.food_data_id,
                        food_data.food_data_name,
                        food_order_details.amount,
                        food_order_details.order_food_price_sum
                FROM
                        food_order_details
                INNER JOIN food_order ON food_order.food_order_id = food_order_details.food_order_id
                INNER JOIN food_data ON food_data.food_data_id = food_order_details.food_data_id

                where food_order.food_order_id = '$food_order_id'";

        // $query2 = mysqli_query($conn,$sql2);
    ?>

    <!-- <div class="has-success form-group"> -->
    <div class="container">
        <br><br><br>
            <a><button type="button" class="btn btn-warning btn-lg btn-block">รายละเอียดการสั่งซื้ออาหารปลา</i></button></a>
        <br><br>

        <!-- =============================================================================================== -->

        <form class="contact-form"action="order_food_details-saveedit.php" method="post">

        <div class="container">
            <div class="row">
            
                <div class="col"> 
                    <label for="food_order_id" class="lb">รหัสการสั่งซื้อ</label>
                    <input type="text" name="food_order_id" class="contact-form-text" id="food_order_id" value="<?php echo $result['food_order_id'];?>" readonly>
                </div>

                <div class="col"> 
                    <label for="food_order_details_id" class="lb">รหัสรายละเอียดการสั่งซื้อ</label>
                    <input type="text" name="food_order_details_id" class="contact-form-text" id="food_order_details_id" value="<?php echo $result['food_order_details_id'];?>" readonly>
                </div>
            </div>
            <br>
            
            <div class="row">
                
                <div class="col"> 
                    <label for="order_food_number" class="lb">จำนวน(ต่อกระสอบ)</label>
                    <input type="text" name="order_food_number" class="contact-form-text" id="order_food_number" value="<?php echo $result['order_food_number'];?>">
                </div>

                <div class="col"> 
                    <label for="order_food_price" class="lb">ราคา(ต่อกระสอบ)</label>
                    <input type="text" name="order_food_price" class="contact-form-text" id="order_food_price" value="<?php echo $result['order_food_price'];?>">
                </div>

                <div class="col">
                        <label for="food_data_id" class="lb">ชื่ออาหาร</label>
                        <select class="contact-form-text" name="food_data_id">
                            <?php 
                                $sql = "SELECT * FROM food_data"; 
                                $result = $conn->query($sql);
                                foreach($result as $key=>$row) {
                                    $selected = "";
                                    if( $data["food_data_id"]==$row["food_data_id"] ) $selected = "selected";
                                    echo '
                                        <option value="'.$row["food_data_id"].'" '.$selected.'>'.$row["food_data_id"].' '.$row["food_data_name"].'</option>
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