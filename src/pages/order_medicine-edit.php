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

   $strmedicine_order_id = null;

   if(isset($_GET["medicine_order_id"]))
   {
	   $strmedicine_order_id = $_GET["medicine_order_id"];
   }
   
   include('../libs/config.php');

   $sql = "SELECT * FROM medicine_order WHERE medicine_order_id = '".$strmedicine_order_id."' ";

   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);
   $data = $result;

?>

<div class="contact-section">

            <h3>ข้อมูลการสั่งซื้ออาหารปลา</h3>
            <div class="border-form"></div>
            <form class="contact-form"action="order_medicine-saveedit.php" method="post">
           <br>

            <!-- ============================================================================================== -->
            <div class="container">
                <div class="row">

                    <div class="col">
                        <label for="medicine_order_id" class="lb">รหัสการสั่งซื้ออาหาร</label>
                        <input type="text" name="medicine_order_id" class="contact-form-text" id="medicine_order_id" value="<?php echo $result['medicine_order_id'];?>" readonly>
                    </div>
                
                    <div class="col"> 
                        <label for="employee_id" class="lb">รหัสพนักงาน</label>
                        <input type="text" name="employee_id" class="contact-form-text" id="employee_id" value="<?php echo $result['employee_id'];?>" readonly>
                    </div>

                </div>
                <div class="row">
                    
                    <div class="col">
                        <label for="supplier_medicine_id" class="lb">รหัสซัพพลายเออร์</label>
                        <select class="contact-form-text" name="supplier_medicine_id">
                            <?php 
                                $sql = "SELECT * FROM supplier_medicine"; 
                                $result = $conn->query($sql);
                                foreach($result as $key=>$row) {
                                    $selected = "";
                                    if( $data["supplier_medicine_id"]==$row["supplier_medicine_id"] ) $selected = "selected";
                                    echo '
                                        <option value="'.$row["supplier_medicine_id"].'" '.$selected.'>'.$row["supplier_medicine_id"].' '.$row["supplier_medicine_name"].'</option>
                                    ';
                                } 
                            ?>  
                        </select>
                    </div>

                    <!-- <input type="submit" class="contact-form-btn" value="Save" > -->

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