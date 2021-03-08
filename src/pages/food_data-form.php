<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="style/customerstyle.css">
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/fishcon.ico">
    <title>ข้อมูลอาหาร / food</title>
</head>

<body>

    <?php include('../libs/config.php'); ?>

    <div class="contact-section">
    

        <h3>ข้อมูลอาหาร / food </h3>
        <div class="border-form"></div>
        <form class="contact-form" action="food_data-insert.php" method="post">


                <label for="food_data_name" class="lb">ชื่ออาหาร </label>
                 <input type="text" name="food_data_name" class="contact-form-text" id="food_data_name"
                        placeholder="Enter" >


                <label for="food_data_number" class="lb">จำนวน </label>
                <input type="text" name="food_data_number" class="contact-form-text" id="food_data_number"
                        placeholder="Enter">



            <br>

            <div class="row">
                <div class="col-8">
                </div>
                <div class="col-2">

                    <input type="submit" class="btn btn-warning btn-block" value="Save">

                </div>
                <div class="col-2">
                    <a href="#"><button type="button" class="btn btn-danger btn-block" onClick="history.go(-1);"> Cancel
                        </button></a>
                </div>
            </div>

        </form>
    </div>

    <?php include('indexmenu.php');  ?>

</body>

</html>