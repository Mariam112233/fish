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

   $strcustomer_id = null; 

   if(isset($_GET["customer_id"]))
   {
	   $strcustomer_id = $_GET["customer_id"];
   }
  
   include('../libs/config.php');

   $sql = "SELECT * FROM customer WHERE customer_id = '".$strcustomer_id."' ";

   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);

?>

    <div class="contact-section">

        <h3>ข้อมูลลูกค้า / Customer</h3>
        <div class="border-form"></div>
        <form class="contact-form" action="customer-saveedit.php" method="post">

            <div class="row">
                <div class="col-2">
                    <label for="customer_id" class="lb">รหัสลูกค้า</label>
                    <input type="text" name="customer_id" class="contact-form-text" id="customer_id"
                        value="<?php echo $result['customer_id'];?>" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="c_firstname" class="lb">ชื่อ</label>
                    <input type="text" name="c_firstname" class="contact-form-text" id="c_firstname"
                        value="<?php echo $result['c_firstname'];?>">
                </div>

                <div class="c_col">
                    <label for="c_lastname" class="lb">นามสกุล</label>
                    <input type="text" name="c_lastname" class="contact-form-text" id="c_lastname"
                        value="<?php echo $result["c_lastname"];?>">
                </div>

                <div class="col">
                    <label for="c_gender" class="lb">เพศ</label>
                    <select class="contact-form-text" name="c_gender" id="c_gender">
                        <option value="<?php echo $result["c_gender"];?>"><?php echo $result["c_gender"];?></option>
                        <option value="ชาย">ชาย</option>
                        <option value="หญิง">หญิง</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="c_tel" class="lb">เบอร์</label>
                    <input type="text" name="c_tel" class="contact-form-text" id="c_tel"
                        value="<?php echo $result["c_tel"];?>">
                </div>

                <div class="col">
                    <label for="c_email" class="lb">Email</label>
                    <input type="text" name="c_email" class="contact-form-text" id="c_email"
                        value="<?php echo $result["c_email"];?>">
                </div>
            </div>
            <label for="c_address" class="lb">ที่อยู่</label>
            <textarea name="c_address" class="contact-form-text"
                value="<?php echo $result["c_address"];?>"><?php echo $result["c_address"];?></textarea>

                <div class="row">
                <div class="col">
                    <label for="username" class="lb">ชื่อเข้าใช้ระบบ</label>
                    <input type="text" name="username" class="contact-form-text" id="username"
                    value="<?php echo $result["username"];?>">
                </div>

                <div class="col">
                    <label for="password" class="lb">รหัสผ่าน</label>
                    <input type="text" name="password" class="contact-form-text" id="password"
                    value="<?php echo $result["password"];?>">
                </div>

                <div class="col">
                    <label for="position" class="lb">ผุ้ใช้</label>
                    <input type="text" name="position" class="contact-form-text" id="position"
                    value="<?php echo $result["position"];?>">
                </div>
            </div>
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

    <?php
mysqli_close($conn);
?>

    <?php include('indexmenu.php');  ?>
</body>

</html>