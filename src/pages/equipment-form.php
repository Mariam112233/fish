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
    <title>ข้อมูลประเภทปลา / Type product</title>
</head>

<body>
    
<div class="contact-section">

<h3>ข้อมูลอุปกรณ์</h3>
            <div class="border-form"></div>
            <form class="contact-form"action="equipment-insert.php" method="post">
                

            <!-- =========================== test ================================ -->   
    <div class="row">
        <div class="col">
                <label for="equipment_name" class="lb">ชื่ออุปกรณ์</label>
                <input type="text" name="equipment_name" class="contact-form-text" id="equipment_name"
                        placeholder="equipment_name">
                
        </div>

        <!-- <div class="col">
                <label for="stew_capacity" class="lb">ความจุปลา</label>
                <input type="number" name="stew_capacity" class="contact-form-text" id="stew_capacity"
                        placeholder="stew_capacity">

        </div> -->
    <!-- </div> -->
            <!-- =========================== test ================================ -->
    <!-- <div class="row">
        <div class="col">
                <label for="stew_size" class="lb">ขนาดกระชัง</label>
                <input type="text" name="stew_size" class="contact-form-text" id="stew_size" placeholder="Enter"> 
        </div> -->

        <!-- <div class="col">
                <label for="stew_status" class="lb">สถานะ</label>
                <select class="contact-form-text" name="stew_status" id="stew_status">
                        <option value="ว่าง">ว่าง</option>
                        <option value="ไม่ว่าง">ไม่ว่าง</option>
                 </select>
    
        </div> -->
    </div>       
          <!-- =========================== test ================================  -->
      <input type="submit" class="contact-form-btn" value="Save">
  

  
            </form>

<?php include('indexmenu.php');  ?>

</body>
</html> 