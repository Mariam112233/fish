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
    <title>ข้อมูลซัพพลายเออร์ / Supplier</title>
</head>

<body>
    
<div class="contact-section"> 

            <h3>ข้อมูลซัพพลายเออร์ / Supplier</h3>
            <div class="border-form"></div>
            <form class="contact-form"action="supplier-insert.php" method="post">

                <label for="shop_name" class="lb">ชื่อร้าน</label>
                <input type="text" name="shop_name" class="contact-form-text" id="shop_name" placeholder="Enter shop_name">
  
                <label for="address" class="lb">ที่อยู่ร้าน</label>
                <textarea name="address" class="contact-form-text" placeholder="Enter address"></textarea>

                <label for="tel" class="lb">เบอร์</label>
                <input type="text" name="tel" class="contact-form-text" id="tel" placeholder="Enter tel">
            
                <label for="email" class="lb">Email</label>
                <input type="text" name="email" class="contact-form-text" id="email" placeholder="Enter email">

                <input type="submit" class="contact-form-btn" value="Save">
  
            </form>

<?php include('indexmenu.php');  ?>

</body>
</html>