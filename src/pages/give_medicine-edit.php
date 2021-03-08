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
 
   $serverName = "localhost";
   $userName = "root";
   $userPassword = "";
   $dbName = "jewelry_db";

   $strgive_medicine_id = null;

   if(isset($_GET["give_medicine_id"]))
   {
	   $strgive_medicine_id = $_GET["give_medicine_id"];
   }
   
   include('../libs/config.php');

   $sql = "SELECT * FROM give_medicine WHERE give_medicine_id = '".$strgive_medicine_id."' ";
   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);
   $data = $result;

?>

<div class="contact-section"> 

    <h3>ข้อมูลการให้ยารักษาโรค</h3>
      <div class="border-form"></div>
      <form class="contact-form" action="give_medicine-saveedit.php" method="post">
     
<!-- ============================================================================================== -->

<label for="give_food_id" class="lb">รหัสปลาต่อกระชัง</label>
          <input type="hidden" name="give_medicine_id" class="contact-form-text" id="give_medicine_id" value="<?php echo $result['give_medicine_id'];?>">          
          <div class="triangle"><?php echo $result["give_medicine_id"];?></div><br>

       <!-- =========================== /test ================================ -->
   
            <div class="row">
            <div class="col">
              <label for="medicine_date" class="lb">วันที่ให้</label>
              <input type="date" name="medicine_date" class="contact-form-text" value="<?php echo $data['medicine_date'];?>" id="medicine_date" placeholder="Enter ">
            </div>
            <div class="col"> 
                        <label for="employee_id" class="lb">รหัสพนักงาน</label>
                        <input type="text" name="employee_id" class="contact-form-text" id="employee_id" value="<?php echo $result['employee_id'];?>" 
                        placeholder="employee_id" readonly>
            </div>
            <div class="col"> 
                        <label for="medicine_number" class="lb">จำนวน(กิโกกรัม)</label>
                        <input type="number" name="medicine_number" class="contact-form-text" id="medicine_number" value="<?php echo $result['medicine_number'];?>" 
                        placeholder="medicine_number" readonly>
            </div>
            </div>
        <!-- =========================== test ================================ -->  
            <div class="row">
            <div class="col">
                        <label for="fish_id" class="lb">รหัสปลาในกระชัง</label>
                        <select class="contact-form-text" name="fish_id">
                            <?php 
                                $sql = "SELECT * FROM fish_data"; 
                                $result = $conn->query($sql);
                                foreach($result as $key=>$row) {
                                    $selected = "";
                                    if( $data["fish_id"]==$row["fish_id"] ) $selected = "selected";
                                    echo '
                                    <option value="'.$row["fish_id"].'" '.$selected.'>'.$row["fish_id"].' '.$row["fish_stew_name"].'</option>
                                    ';
                                } 
                            ?>  
                        </select>
            </div>
            <!-- ==================== test ================================ --> 
            <div class="col">
                <label for="medicine_data_id" class="lb">รหัสอาหารปลา</label>
                <select class="contact-form-text" name="medicine_data_id">
                <?php 
                $sql = "SELECT * FROM medicine_data"; 
                $result = $conn->query($sql); 
                foreach($result as $key=>$row) {
                  $selected = "";
                  if( $data["medicine_data_id"]==$row["medicine_data_id"] ) $selected = "selected";
                  echo '
                      <option value="'.$row["medicine_data_id"].'" '.$selected.'>'.$row["medicine_data_id"].' '.$row["medicine_data_name"].'</option>
                  ';
                      } 
                ?>  
                </select>
            </div></div>
        <!-- =========================== test ================================ -->   
          

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