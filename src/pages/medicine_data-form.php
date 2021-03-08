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
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon.ico">
    <title>ข้อมูลยารักษาโรค / Medicine </title>
</head>

<body>

    <?php include('../libs/config.php'); ?>

    <div class="contact-section">

        <h3>ข้อมูลยารักษาโรค / Medicine </h3>
        <div class="border-form"></div>
        <form class="contact-form" action="medicine_data-insert.php" method="post">


                <label for="medicine_data_name" class="lb">ชื่อยารักษาโรค </label>
                 <input type="text" name="medicine_data_name" class="contact-form-text" id="medicine_data_name"
                        placeholder="Enter" >


                <label for="medicine_data_number" class="lb">จำนวน(กิโกกรัม)</label>
                <input type="text" name="medicine_data_number" class="contact-form-text" id="medicine_data_number"
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