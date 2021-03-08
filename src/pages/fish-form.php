<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" href="style/customerstyle.css">
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/fishcon.ico">

    <title>ข้อมูลปลาต่อกระชัง</title>
</head>
 
<body> 

     
<div class="contact-section"> 

    <h3>ข้อมูลปลาต่อกระชัง</h3>
      <div class="border-form"></div>
      <form class="contact-form" action="fish-insert.php" method="post">
        <!-- =========================== test ================================ -->
        <div class="row">
        <div class="col">
                <label for="fish_stew_name" class="lb">ชื่อกระชัง</label>
                <input type="text" name="fish_stew_name" class="contact-form-text" id="fish_stew_name"
                        placeholder="ป้อนชื่อกระชังใหม่">
        </div>
        </div> 
        <!-- =========================== /test ================================ -->
        <div class="row">
      <div class="col">
          <label for="fish_type_id" class="lb">รหัสประเภทปลา</label>
          <input autocomplete="off" type="text" id="inputIsValid " name="fish_type_id" class="contact-form-text" list='list1' required
          value="<?php echo $result['fish_type_id'];?>"> 
            <?php 
              include('../libs/config.php');
              $sql = "SELECT * FROM fish_type"; 
              $result = $conn->query($sql); 
            ?> 
            <datalist id='list1'>
              <?php foreach($result as $key=>$row) {
                echo '
                    <option value="'.$row["fish_type_id"].'. '.$row["fish_type_name"].'"</option>
                ';
              } 
              ?>
            </datalist>
      </div>  </div>
        <!-- =========================== /test ================================ -->
  
        <div class="row">
      <div class="col">     
              <label for="fish_status" class="lb">สถานะ</label>
              <select class="contact-form-text" name="fish_status" id="fish_status" value="ว่าง">
                        <option value="ว่าง">ว่าง</option>
                 </select>
      </div>
  </div>

        <input type="submit" class="contact-form-btn" value="Save"> 
  
      </form>
            

<?php include('indexmenu.php');  ?>

</body>
</html> 