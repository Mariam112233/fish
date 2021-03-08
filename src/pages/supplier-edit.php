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

   $strsupplier_id = null; 

   if(isset($_GET["supplier_id"]))
   {
	   $strsupplier_id = $_GET["supplier_id"];
   }
  
   include('../libs/config.php');

   $sql = "SELECT * FROM supplier WHERE supplier_id = '".$strsupplier_id."' ";

   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);

?>

<div class="contact-section">

            <h3>ข้อมูลซัพพลายเออร์ / Supplier</h3>
            <div class="border-form"></div>
            <form class="contact-form"action="supplier-saveedit.php" method="post">

                <label for="supplier_id" class="lb">รหัสซัพพลายเออร์</label>
                <input type="hidden" name="supplier_id" class="contact-form-text" id="supplier_id" value="<?php echo $result['supplier_id'];?>">
                
                <div class="triangle"><?php echo $result["supplier_id"];?></div><br>
                

                <label for="shop_name" class="lb">ชื่อร้าน</label>
                <input type="text" name="shop_name" class="contact-form-text" id="shop_name" value="<?php echo $result['shop_name'];?>">
  
                <label for="address" class="lb">ที่อยู่ร้าน</label>
                <!-- <input type="text" name="address" class="contact-form-text" id="address" placeholder="Enter address"> -->
                <textarea name="address" class="contact-form-text" value="<?php echo $result["address"];?>"><?php echo $result["address"];?></textarea>

                <label for="tel" class="lb">เบอร์</label>
                <input type="text" name="tel" class="contact-form-text" id="tel" value="<?php echo $result["tel"];?>">
            
                <label for="email" class="lb">Email</label>
                <input type="text" name="email" class="contact-form-text" id="email" value="<?php echo $result["email"];?>">
                
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

<?php
mysqli_close($conn);
?>

<?php include('indexmenu.php');  ?>
</body>
</html>