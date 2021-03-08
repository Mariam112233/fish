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
    <title>ข้อมูลค่าตอบแทน /  salary</title>
</head>

<body>

    <?php include('../libs/config.php'); ?>

    <div class="contact-section">

        <h3>ข้อมูลค่าตอบแทน /  salary </h3>
        <div class="border-form"></div>
        <form class="contact-form" action="salary-insert.php" method="post">


                <label for="employee_id" class="lb">รหัสพนักงาน </label>
                <input type="text" name="employee_id" class="contact-form-text" id="employee_id" list='list1'
                        placeholder="">
                        <?php 
                            include('../libs/config.php');
                            $sql = "SELECT * FROM employee"; 
                            $result = $conn->query($sql); 
                            ?> 
                        <datalist id='list1'>
                            <?php foreach($result as $key=>$row) {
                                echo '
                                   
                                    <option value="'.$row["employee_id"].'.'.$row["firstname"].'"></option>
                                ';
                            } 
                        ?>
                        </datalist>

                <label for="salary_give_date" class="lb">วันที่ให้ </label>
                <input type="date" name="salary_give_date" class="contact-form-text" id="salary_give_date"
                        placeholder="" >


                <label for="salary_number" class="lb">จำนวนวันเข้างาน </label>
                <input type="number" name="salary_number" class="contact-form-text" id="salary_number"
                        placeholder="">

                        <label for="salary_number_price" class="lb">จำนวนค่าตอบแทน </label>
                 <input type="number" name="salary_number_price" class="contact-form-text" id="salary_number_price"
                        placeholder="" >


                        <!-- <label for="salary_number_price" class="lb"> สถานะการรับเงิน </label>
                        <select id="salary_status" name="salary_status" class="contact-form-text">
                        <option value="" disabled selected>เลือก</option>
                        <option value="รับแล้ว">รับแล้ว</option>
                        <option value="ยังไม่ได้รับ">ยังไม่ได้รับ</option>
                        </select> -->


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


<script>
$(document).ready(function() {
    console.log("calculate");
    $('#salary_number').keyup(function(){
        var salary_number = $('#salary_number').val();
        var salary_number_price = $('#salary_number_price').val();
        // console.log(price);
        var  salary_number_price_sum = Number(salary_number) * Number(salary_number_price);
        console.log(salary_number_price_sum);
        $('#amount_money').val(salary_number_price_sum);
    });
    $('#money').keyup(function(){
        var salary_number = $('#salary_number').val();
        var salary_number_price = $('#salary_number_price').val();
        // console.log(price);
        var  salary_number_price_sum = Number(salary_number) * Number(salary_number_price);
        console.log(salary_number_price_sum);
        $('#amount_money').val(salary_number_price_sum);
    });
});
</script>