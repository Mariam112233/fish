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

            <h3>ข้อมูลประเภทปลา / Type product</h3>
            <div class="border-form"></div>
            <form class="contact-form"action="type_fish-insert.php" method="post">
                
            <!-- <label for="fish_type_id" class="lb">รหัสประเภทปลา</label>
          <input autocomplete="off" type="text" id="inputIsValid " name="fish_type_id" class="contact-form-text" list='list1' required>  -->

            <!-- =========================== test ================================ -->   
              
                <label for="fish_type_name" class="lb">ชื่อประเภทปลา</label>
                <input type="text" name="fish_type_name" class="contact-form-text" id="fish_type_name" id='list1' placeholder="Enter">
                <?php 
              include('../libs/config.php');
              $sql = "SELECT * FROM fish_type"; 
              $result = $conn->query($sql); 
            ?> 
            <datalist id='list1'>
              <?php foreach($result as $key=>$row) {
                echo '
                    <option value="'.$row["fish_type_id"].'">'.$row["fish_type_name"].'</option>
                ';
              } 
              ?>
            </datalist>


                <input type="submit" class="contact-form-btn" value="Save">
  
            </form>

<?php include('indexmenu.php');  ?>

</body>
</html> 