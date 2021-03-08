<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>

<html>

<head>
    <link rel="stylesheet" href="style/customerstyle.css">
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/fishcon.ico">
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

   $stremployee_id = null;  

   if(isset($_GET["employee_id"]))
   {
	   $stremployee_id = $_GET["employee_id"];
   }
  
   include('../libs/config.php');

   $sql = "SELECT * FROM employee WHERE employee_id = '".$stremployee_id."' ";

   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);

?>

    <div class="contact-section">

        <h3>ข้อมูลพนักงาน / Employee</h3>
        <div class="border-form"></div>
        <form class="contact-form" action="employee-saveedit.php" method="post">

            <div class="row">
                <div class="col">
                    <label for="employee_id" class="lb">รหัสลูกค้า</label>
                    <input type="text" name="employee_id" class="contact-form-text" id="employee_id"
                        value="<?php echo $result['employee_id'];?>" readonly>
                </div>


                <div class="col">
                    <label for="firstname" class="lb">ชื่อ</label>
                    <input type="text" name="firstname" class="contact-form-text" id="firstname"
                        value="<?php echo $result['firstname'];?>">
                </div>

                <div class="col">
                    <label for="lastname" class="lb">นามสกุล</label>
                    <input type="text" name="lastname" class="contact-form-text" id="lastname"
                        value="<?php echo $result["lastname"];?>">
                </div>
            </div>

            <label for="address" class="lb">ที่อยู่</label>
            <!-- <input type="text" name="address" class="contact-form-text" id="address" placeholder="Enter address"> -->
            <textarea name="address" class="contact-form-text"
                value="<?php echo $result["address"];?>"><?php echo $result["address"];?></textarea>

            <div class="row">
                <div class="col">
                    <label for="tel" class="lb">เบอร์</label>
                    <input type="text" name="tel" class="contact-form-text" id="tel"
                        value="<?php echo $result["tel"];?>">
                </div>

                <div class="col">
                    <label for="email" class="lb">Email</label>
                    <input type="text" name="email" class="contact-form-text" id="email"
                        value="<?php echo $result["email"];?>">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="position" class="lb">ตำแหน่ง</label>
                    <select class="contact-form-text" name="position" id="position">
                        <option value="<?php echo $result["position"];?>"><?php echo $result["position"];?></option>
                        <option value="staff">staff</option>
                        <option value="boss">boss</option>
                    </select>
                </div>

                <div class="col">
                    <label for="username" class="lb">ชื่อเข้าใช้ระบบ</label>
                    <input type="text" name="username" class="contact-form-text" id="username"
                        value="<?php echo $result["username"];?>">
                </div>

                <div class="col">
                    <label for="password" class="lb">รหัสผ่าน</label>
                    <input type="password" name="password" class="contact-form-text" id="password"
                        value="<?php echo $result["password"];?>">
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
    <?php
mysqli_close($conn);
?>

    <?php include('indexmenu.php');  ?>
</body>

</html>