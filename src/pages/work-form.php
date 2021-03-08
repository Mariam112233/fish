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
    <title>วันเข้างาน</title>
</head>

<body>

    <?php include('../libs/config.php'); ?>

    <div class="contact-section">
    

        <h3>ข้อมูลวันเข้างาน / food </h3>
        <div class="border-form"></div>
        <form class="contact-form" action="work-insert.php" method="post">

        <div class="row">
            <div class="col">    
                <?php $employee_id = $_SESSION['employee_id']; ?>
                <label for="employee_id" class="lb">รหัสพนักงาน</label>
                <input autocomplete="off" type="text" id="inputIsValid " name="employee_id" class="contact-form-text" list='list1' required value=" <?php echo $employee_id; ?>">              
                <?php 
                    include('../libs/config.php');
                        $sql = "SELECT * FROM employee"; 
                        $result = $conn->query($sql); 
                ?> 
                    <datalist id='list1'>
                <?php foreach($result as $key=>$row) {
                echo'
                        <option value="'.$row["employee_id"].' ">'.$row["firstname"].'</option>
                    ';                 
                } 
                ?>
            </datalist>

            </div>
            <div class="col"> 

                <label for="work_day" class="lb">จำนวนวันเข้างาน </label>
                <input type="text" name="work_day" class="contact-form-text" id="work_day"
                        placeholder="Enter">

            </div></div>

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