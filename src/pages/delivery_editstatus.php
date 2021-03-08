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
 
//    $serverName = "localhost";
//    $userName = "root";
//    $userPassword = "";
//    $dbName = "jewelry_db";

   $strfish_sales_id = null;

   if(isset($_GET["fish_sales_id"]))
   {
	   $strfish_sales_id = $_GET["fish_sales_id"];
   }
   
   include('../libs/config.php');

   $sql = "SELECT *
   FROM
   fish_sales

   WHERE fish_sales.fish_sales_id = '".$strfish_sales_id."'  "; 

   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);
   $data = $result;

?>

<div class="contact-section">

            <h3>ข้อมูลการขายปลา</h3>
            <div class="border-form"></div>
            <form class="contact-form"action="delivery_saveeditstatus.php" method="post" enctype="multipart/form-data" >
           <br>

            <!-- ============================================================================================== -->
            <div class="container">
            <div class="row">

                    <div class="col">
                    <label class="lb">รหัส </label>
                    <input type="text" class="contact-form-text" id="fish_sales_id" name="fish_sales_id"
                     value="<?php echo $result['fish_sales_id'];?>" readonly>
                    </div>

                    <div class="col"> 
                        <label for="customer_id" class="lb">รหัสลูกค้า</label>
                        <input type="text" name="customer_id" class="contact-form-text" id="customer_id" value="<?php echo $result['customer_id'];?>" readonly>
                    </div>

                    </div>
                <div class="row">

                <div class="col"> 
                <label class="lb" >สถานะการจัดส่ง</label>
                                                    <select class="contact-form-text" name="delivery_status" id="delivery_status">
                                                    <option value="<?php echo $result["delivery_status"];?>"><?php echo $result["delivery_status"];?></option>
                                                    <option value="กำลังจัดส่ง">กำลังจัดส่ง</option>
                                                    <option value="จัดส่งแล้ว">จัดส่งแล้ว</option>
                                        </select>
                                        </div>
                                        
            
                </div>   <!-- /row -->
                 </div>  <!-- /container -->

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

<?php
mysqli_close($conn);
?>

<?php include('indexmenu.php');  ?>
</body>
</html>