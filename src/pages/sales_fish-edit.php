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

   $sql = "SELECT
   fish_sales.fish_sales_id,
   customer.customer_id,
   customer.c_firstname,
   customer.c_lastname,
   fish_sales.payment_status,
   fish_sales.fish_sales_date_chamra

   FROM
   fish_sales
   INNER JOIN customer ON customer.customer_id = fish_sales.customer_id
   -- INNER JOIN fish_sales_details ON fish_sales_details.fish_sales_details_id = fish_sales_details.fish_sales_details_id
   
   WHERE fish_sales_id = '".$strfish_sales_id."'  "; 

   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);
   $data = $result;

?>

<div class="contact-section">

            <h3>ข้อมูลการขายปลา</h3>
            <div class="border-form"></div>
            <form class="contact-form"action="sales_fish-saveedit.php" method="post">
           <br>

            <!-- ============================================================================================== -->
            <div class="container">
            <div class="row">

                    <div class="col">
                        <label for="fish_sales_id" class="lb">รหัสการขาย</label>
                        <input type="text" name="fish_sales_id" class="contact-form-text" id="fish_sales_id" value="<?php echo $result['fish_sales_id'];?>" readonly>
                    </div>

                    <div class="col"> 
                        <label for="customer_id" class="lb">รหัสลูกค้า</label>
                        <input type="text" name="customer_id" class="contact-form-text" id="customer_id" value="<?php echo $result['customer_id'];?>" readonly>
                    
                
                    </div>

                    </div>
                <div class="row">

                <div class="col"> 
                        <label for="fish_sales_date_chamra" class="lb">วันที่ชำระ</label>
                        <input type="date" name="fish_sales_date_chamra" class="contact-form-text" id="fish_sales_date_chamra" value="<?php echo $result['fish_sales_date_chamra'];?>">
                    </div>
                    
                    <div class="col">

                <label for="payment_status" class="lb">สถานะชำระ</label>
                <select id="payment_status" name="payment_status" class="contact-form-text"  >
                <option value="<?php echo $result["payment_status"];?>"><?php echo $result["payment_status"];?></option>
                        <option value="ยังไม่ชำระ">ยังไม่ชำระ</option>
                        <option value="ชำระแล้ว">ชำระแล้ว</option>
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