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

   $strgive_food_id = null;

   if(isset($_GET["give_food_id"]))
   {
	   $strgive_food_id = $_GET["give_food_id"];
   }
   
   include('../libs/config.php');

   $sql = "SELECT * FROM give_food WHERE give_food_id = '".$strgive_food_id."' ";
   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);
   $data = $result;

?>

<div class="contact-section"> 

    <h3>ข้อมูลการให้อาหารปลา</h3>
      <div class="border-form"></div>
      <form class="contact-form" action="give_food-saveedit.php" method="post">
     
<!-- ============================================================================================== -->

          <label for="give_food_id" class="lb">รหัสปลาต่อกระชัง</label>
          <input type="hidden" name="give_food_id" class="contact-form-text" id="give_food_id" value="<?php echo $result['give_food_id'];?>">          
          <div class="triangle"><?php echo $result["give_food_id"];?></div><br>

       <!-- =========================== /test ================================ -->
   
            <div class="row">
            <div class="col">
              <label for="food_date" class="lb">วันที่ให้</label>
              <input type="date" name="food_date" class="contact-form-text" value="<?php echo $data['food_date'];?>" id="food_date" placeholder="Enter ">
            </div>
            <div class="col"> 
                        <label for="employee_id" class="lb">รหัสพนักงาน</label>
                        <input type="text" name="employee_id" class="contact-form-text" id="employee_id" value="<?php echo $result['employee_id'];?>" 
                        placeholder="employee_id" readonly>
            </div>
            <div class="col"> 
                        <label for="food_number" class="lb">จำนวน</label>
                        <input type="number" name="food_number" class="contact-form-text" id="food_number" value="<?php echo $result['food_number'];?>" 
                        placeholder="food_number"readonly>
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
                <label for="food_data_id" class="lb">รหัสอาหารปลา</label>
                <select class="contact-form-text" name="food_data_id">
                <?php 
                $sql = "SELECT * FROM food_data"; 
                $result = $conn->query($sql); 
                foreach($result as $key=>$row) {
                  $selected = "";
                  if( $data["food_data_id"]==$row["food_data_id"] ) $selected = "selected";
                  echo '
                      <option value="'.$row["food_data_id"].'" '.$selected.'>'.$row["food_data_id"].' '.$row["food_data_name"].'</option>
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