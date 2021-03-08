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

   $strmedicine_data_id = null; 

   if(isset($_GET["medicine_data_id"]))
   {
	   $strmedicine_data_id = $_GET["medicine_data_id"];
   }
   
   include('../libs/config.php');

   $sql = "SELECT * FROM medicine_data WHERE medicine_data_id = '".$strmedicine_data_id."' ";
   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);

   $data = $result;

?>

<div class="contact-section">

<h3>ข้อมูลยารักษาโรค</h3>
<div class="border-form"></div>
<form class="contact-form" action="medicine_data-saveedit.php" method="post">

       <label for="medicine_data_id" class="lb">รหัสยารักษาโรค</label>
        <input type="hidden" name="medicine_data_id" class="contact-form-text" id="medicine_data_id" value="<?php echo $result['medicine_data_id'];?>">          
        <div class="triangle"><?php echo $result["medicine_data_id"];?></div><br>
        
    <div class="row">             
    <div class="col">
        <label for="medicine_data_name" class="lb">ชื่อยารักษาโรค</label>
        <input type="text" name="medicine_data_name" class="contact-form-text" id="medicine_data_name"  value="<?php echo $result['medicine_data_name'];?>"
        placeholder="medicine_data_name">
    </div>

    <div class="col">

        <label for="medicine_data_number" class="lb">จำนวน(กิโกกรัม)</label>
        <input type="text" name="medicine_data_number" class="contact-form-text" id="medicine_data_number" placeholder="Enter"
                value="<?php echo $result['medicine_data_number'];?>" readonly>

    </div>
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
                </button></a>
        </div>
    </div>

</form>
</div>

<?php include('indexmenu.php');  ?>

</body>

</html>