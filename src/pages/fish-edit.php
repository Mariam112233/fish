<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>

<html>

<head>
    <link rel="stylesheet" href="style/customerstyle.css">
    <title>Edit</title>
</head>

<body>

    <?php
   ini_set('display_errors', 1);
   error_reporting(~0);

   $serverName = "localhost";
   $userName = "root";
   $userPassword = "";
   $dbName = "jewelry_db";

   $strfish_id = null; 

   if(isset($_GET["fish_id"]))
   {
	   $strfish_id = $_GET["fish_id"];
   }
   
   include('../libs/config.php');
   $sql = "SELECT  fish_data.fish_id,
   fish_type.fish_type_id,
   fish_data.fish_stew_name,
   fish_data.date_change_fish,
   fish_data.fish_status,
   fish_data.fish_health
             
FROM    fish_data
INNER JOIN fish_type ON fish_data.fish_type_id = fish_type.fish_type_id 
-- INNER JOIN fish_stew ON fish_data.fish_stew_id = fish_stew.fish_stew_id 

WHERE fish_data.fish_id = '".$strfish_id."'  "; 

   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);

   $data = $result;

?>
<div class="contact-section"> 

<h3>ข้อมูลปลาต่อกระชัง</h3>
      <div class="border-form"></div>
      <form class="contact-form" action="fish-saveedit.php" method="post">

        <!-- =========================== test ================================ -->
          <label for="fish_id" class="lb">รหัสปลาในกระชัง</label>
          <input type="hidden" name="fish_id" class="contact-form-text" id="fish_id" value="<?php echo $result['fish_id'];?>">          
          <div class="triangle"><?php echo $result["fish_id"];?></div><br>
          
    <div class="row">
    <div class="col">     
              <label for="fish_status" class="lb">สถานะ</label>
              <select class="contact-form-text" name="fish_status" id="fish_status">
                        <option value="<?php echo $result["fish_status"];?>"><?php echo $result["fish_status"];?></option>
                        <option value="ปลาระยะเเรก">ปลาระยะเเรก</option>
                        <option value="ปลาระยะสอง">ปลาระยะสอง</option>
                        <option value="ปลาระยะสาม">ปลาระยะสาม</option>
                        <option value="พร้อมขาย">พร้อมขาย</option>
                        <option value="ว่าง">ว่าง</option>
                 </select>
      </div>

      
      <div class="col">
              <label for="fish_health" class="lb">สุขภาพ</label>
              <select class="contact-form-text" name="fish_health" id="fish_health">
                        <option value="<?php echo $result["fish_health"];?>"><?php echo $result["fish_health"];?></option>
                        <option value="สุขภาพดี">สุขภาพดี</option>
                        <option value="สุขภาพไม่ดี">สุขภาพไม่ดี</option>
                        <option value="ว่าง">ว่าง</option>
                 </select>
      </div>
      </div>
      <br>
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
                    <option value="'.$row["fish_type_id"].'.'.$row["fish_type_name"].'"</option>
                ';
              } 
              ?>
            </datalist>
      </div>
        <!-- =========================== /test ================================ -->

      <div class="col">
          <label for="fish_stew_name" class="lb">ชื่อกระชังปลา</label>
          <input autocomplete="off" type="text" id="inputIsValid " name="fish_stew_name" class="contact-form-text" value="<?php echo $data['fish_stew_name'];?>" list='list2' required
          > 
            <?php 
              include('../libs/config.php');
              $sql = "SELECT * FROM fish_data"; 
              $result = $conn->query($sql); 
            ?> 
            <datalist id='list2'>
              <?php foreach($result as $key=>$row) {
                echo '
                    <option value="'.$row["fish_id"].' '.$row["fish_stew_name"].'"</option>
                ';
              } 
              ?>
            </datalist>
      </div>
    
        <!-- =========================== /test ================================ -->
  
      <div class="col">   
             
              <label for="date_change_fish" class="lb">วันที่เปลี่ยนสถานะปลา</label>
              <input type="date" name="date_change_fish" class="contact-form-text" value="<?php echo $data['date_change_fish'];?>" id="date_change_fish" placeholder="Enter ">
      </div>
        <!-- =========================== test ================================ -->   

  </div>
  <br>

       <div class="row">
                            <div class="col-8">
                            </div>
                            <div class="col-2">
                            <input type="submit" class="btn btn-warning btn-block" value="Save">

                            </div>
                            <div class="col-2">
                            <a href="#"><button type="button" class="btn btn-danger btn-block" onClick="history.go(-1);"> Cancel
                            </button> </a>
                            </div>
                            </div>
      </form>
            

<?php include('indexmenu.php');  ?>

</body>
</html> 