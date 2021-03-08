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

   $strsalary_id = null; 

   if(isset($_GET["salary_id"]))
   {
	   $strsalary_id = $_GET["salary_id"];
   }
   
   include('../libs/config.php');

   $sql = "SELECT * FROM salary INNER JOIN employee ON employee.employee_id = salary.employee_id WHERE salary_id = '".$strsalary_id."' 
   ";

   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);

   $data = $result;

?>

<div class="contact-section">

            <h3>ข้อมูลค่าตอบแทนพนักงาน</h3>
            <div class="border-form"></div>
            <form class="contact-form"action="salary-saveedit.php" method="post">
           <br>

            <!-- ============================================================================================== -->
          <label for="salary_id" class="lb">รหัสปลาในกระชัง</label>
          <input type="hidden" name="salary_id" class="contact-form-text" id="salary_id" value="<?php echo $result['salary_id'];?>">          
          <div class="triangle"><?php echo $result["salary_id"];?></div><br>

            <div class="container">
            <div class="row">
            <div class="col">

                    <label for="salary_status" class="lb"> สถานะการรับเงิน </label>
                    <select id="salary_status" name="salary_status" class="contact-form-text">
                    <option value="<?php echo $result["salary_status"];?>"><?php echo $result["salary_status"];?></option>
                    <option value="ยังไม่ได้รับ">ยังไม่ได้รับ</option>
                    <option value="ได้รับแล้ว">ได้รับแล้ว</option>
                    </select>
                    </div>
                    </div>

            <div class="row">
            <div class="col">
              <label for="salary_give_date" class="lb">วันที่ให้</label>
              <input type="date" name="salary_give_date" class="contact-form-text" value="<?php echo $data['salary_give_date'];?>" id="salary_give_date" placeholder="Enter ">
            </div>
                    
            <div class="col">
                        <label for="employee_id" class="lb">รหัสพนักงาน</label>
                        <select class="contact-form-text" name="employee_id">
                            <?php 
                                $sql = "SELECT * FROM employee"; 
                                $result = $conn->query($sql);
                                foreach($result as $key=>$row) {
                                    $selected = "";
                                    if( $data["employee_id"]==$row["employee_id"] ) $selected = "selected";
                                    echo '
                                        <option value="'.$row["employee_id"].'" '.$selected.'>'.$row["employee_id"].' '.$row["firstname"].'</option>
                                    ';
                                } 
                            ?>  
                        </select>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col">
                    <label for="salary_number" class="lb">จำนวนวันเข้างาน </label>
                    <input type="number" name="salary_number" class="contact-form-text" value="<?php echo $data['salary_number'];?>" id="salary_number" placeholder="Enter ">
                    </div>
                    
                    <div class="col">
                    <label for="salary_number_price" class="lb">จำนวนค่าตอบแทน </label>
                    <input type="text" name="salary_number_price" class="contact-form-text" value="<?php echo $data['salary_number_price'];?>" id="salary_number_price" placeholder="Enter ">
                    </div>
                    </div></div>


                    
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