<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>
  
<html>
<head>
<link rel="stylesheet" href="style/customerstyle.css">
<link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon.ico">
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

   $strequipment_id = null;

   if(isset($_GET["equipment_id"]))
   {
	   $strequipment_id = $_GET["equipment_id"];
   }
  
   include('../libs/config.php');

   $sql = "SELECT * FROM equipment_data WHERE equipment_id = '".$strequipment_id."' ";

   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);

?>

<div class="contact-section">

<h3>ข้อมูลอุปกรณ์</h3>
            <div class="border-form"></div>
            <form class="contact-form"action="equipment-saveedit.php" method="post">
                

            <!-- =========================== test ================================ -->   
   
                <label for="equipment_id" class="lb">รหัสอุปกรณ์</label>
                <input type="hidden" name="equipment_id" class="contact-form-text" id="equipment_id" value="<?php echo $result['equipment_id'];?>">          
                <div class="triangle"><?php echo $result["equipment_id"];?></div><br>
       
        <div class="row">             
        <div class="col">
                <label for="equipment_name" class="lb">ชื่อสอุปกรณ์</label>
                <input type="text" name="equipment_name" class="contact-form-text" id="equipment_name"  value="<?php echo $result['equipment_name'];?>"
                        placeholder="equipment_name">
                
        </div>

    </div>       
          <!-- =========================== test ================================  -->
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