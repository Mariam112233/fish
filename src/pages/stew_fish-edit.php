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

   $strfish_stew_id = null;

   if(isset($_GET["fish_stew_id"]))
   {
	   $strfish_stew_id = $_GET["fish_stew_id"];
   }
  
   include('../libs/config.php');

   $sql = "SELECT 
                    fish_stew.fish_stew_id,
                    fish_stew.stew_name,
                    fish_stew.stew_capacity,
                    fish_stew.stew_status
            FROM fish_stew 
            WHERE fish_stew_id = '".$strfish_stew_id."' ";

   

   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);

?>

<div class="contact-section">

<h3>ข้อมูลกระชังปลา / Type product</h3>
            <div class="border-form"></div>
            <form class="contact-form"action="stew_fish-saveedit.php" method="post">
                

            <!-- =========================== test ================================ -->   
   
                <label for="fish_stew_id" class="lb">รหัสประเภทปลา</label>
                <input type="hidden" name="fish_stew_id" class="contact-form-text" id="fish_stew_id" value="<?php echo $result['fish_stew_id'];?>">          
                <div class="triangle"><?php echo $result["fish_stew_id"];?></div><br>
       
        <div class="row">             
        <div class="col">
                <label for="stew_name" class="lb">ชื่อกระชัง</label>
                <input type="text" name="stew_name" class="contact-form-text" id="stew_name"  value="<?php echo $result['stew_name'];?>"
                        placeholder="stew_name">
                
        </div>

        <div class="col">
                <label for="stew_capacity" class="lb">ความจุปลา</label>
                <input type="number" name="stew_capacity" class="contact-form-text" id="stew_capacity" value="<?php echo $result['stew_capacity'];?>"
                        placeholder="stew_capacity">

        </div>
    <!-- </div> -->
            <!-- =========================== test ================================ -->
    <!-- <div class="row">
        <div class="col">
                <label for="stew_size" class="lb">ขนาดกระชัง</label>
                <input type="text" name="stew_size" class="contact-form-text" id="stew_size" placeholder="Enter"> 
        </div> -->

        <div class="col">
                <label for="stew_status" class="lb">สถานะ</label>
                <select class="contact-form-text" name="stew_status" id="stew_status">
                <option value="<?php echo $result["stew_status"];?>"><?php echo $result["stew_status"];?></option>
                        <option value="ไม่ว่าง">ไม่ว่าง</option>
                        <option value="ว่าง">ว่าง</option>
                 </select>
    
        </div>
    </div>       
          <!-- =========================== test ================================  -->
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