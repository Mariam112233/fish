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
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon.ico">

    <?php   

include('../libs/config.php'); 
        // $ordering_date = date("Y-m-d");
        // date_default_timezone_set('Asia/Bangkok');  
        
// $connect = new PDO("mysql:host=localhost;dbname=jewelry_db", "root", "");

function fishdata($conn)
{ 
 $output = '';
 $sql = "SELECT * FROM fish_data 
  WHERE fish_data.fish_status!='ว่าง' ";
 $result = $conn->query($sql); 

 foreach($result as $key=>$row)
 {
  $output .= '<option value="'.$row["fish_id"].'">'.$row["fish_id"].' '.$row["fish_status"].'</option>';
 }
 return $output;
}



?>


    <title>ข้อมูลการให้อาหาร</title>
</head>
 
<body> 

     
<div class="contact-section"> 

    <h3>ข้อมูลการให้อาหาร</h3>
      <div class="border-form"></div>
      <form class="contact-form" action="give_food-insert.php" method="post">

       <!-- =========================== /test ================================ -->
       <div class="row">
            <div class="col">
              <label for="food_date" class="lb">วันที่การให้ยารักษาโรค</label>
              <input type="date" name="food_date" class="contact-form-text" id="food_date" placeholder="Enter ">
            </div>
        <!-- =========================== /test ================================ -->
            <div class="col">
              <label for="employee_id" class="lb">รหัสพนักงาน</label>
              <input type="text" name="employee_id" class="contact-form-text"  list='list1' id="employee_id" placeholder="">
              <?php 
              include('../libs/config.php');
              $sql = "SELECT * FROM employee"; 
              $result = $conn->query($sql); 
            ?> 
            <datalist id='list1'>
              <?php foreach($result as $key=>$row) {
                echo '
                    <option value="'.$row["employee_id"].'. '.$row["firstname"].'"</option>
                ';
              } 
              ?>
            </datalist>
            </div>
        </div>
        <!-- =========================== test ================================ -->  
        <div class="row">
            <div class="col">
              <label for="fish_id" class="lb" >รหัสปลาในกระชัง</label>
              <select type="text" name="fish_id" class="contact-form-text"> <option value=""> </option><?php echo fishdata($conn); ?></select>
              <?php 
              include('../libs/config.php');
              $sql = "SELECT * FROM fish_data"; 
              $result = $conn->query($sql); 
            ?> 
            <datalist id='list2'>
              <?php foreach($result as $key=>$row) {
                echo '
                    <option value="'.$row["fish_id"].'. '.$row["fish_status"].'"</option>
                ';
              } 
              ?>
            </datalist>
            </div>
        <!-- =========================== test ================================ -->   
            <div class="col">
                <label for="food_data_id" class="lb">รหัสอาหาร</label>
                <input type="text" name="food_data_id" class="contact-form-text"  list='list3' id="food_data_id" placeholder="">
                <?php 
                include('../libs/config.php');
                $sql = "SELECT * FROM food_data"; 
                $result = $conn->query($sql); 
              ?> 
                <datalist id='list3'>
              <?php foreach($result as $key=>$row) {
                echo '
                    <option value="'.$row["food_data_id"].'. '.$row["food_data_name"].'"</option>
                ';
              } 
              ?>
            </datalist>
            </div>
        <!-- =========================== test ================================ -->   
          <div class="col">
              <label for="food_number" class="lb">จำนวน(ต่อกิโล)</label>
              <input type="text" name="food_number" class="contact-form-text" id="food_number" placeholder="">
          </div>
       </div>
        <input type="submit" class="contact-form-btn" value="Save"> 
  
      </form>
            

<?php include('indexmenu.php');  ?>

</body>
</html> 