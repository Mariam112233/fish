<html>
<head>
<link rel="stylesheet" href="../style/customerstyle.css">
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

   $strmodel_product_id = null;

   if(isset($_GET["model_product_id"]))
   {
	   $strmodel_product_id = $_GET["model_product_id"];
   }
  
   include('../../libs/config.php');

   $sql = "SELECT * FROM model_product WHERE model_product_id = '".$strmodel_product_id."' ";

   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);

?>

<div class="contact-section">

<h3>ข้อมูลแบบสินค้า / Model product</h3>
            <div class="border-form"></div>
            <form class="contact-form"action="saveedit.php" method="post" enctypr="multiple/formdata">
                
                <label for="model_product_id" class="lb">รหัสแบบสินค้า</label>
                <input type="hidden" name="model_product_id" class="contact-form-text" id="model_product_id" value="<?php echo $result['model_product_id'];?>">
                
                <div class="triangle"><?php echo $result["model_product_id"];?></div><br>

                <label for="model_product_name" class="lb">ชื่อแบบสินค้า</label>
                <input type="text" name="model_product_name" class="contact-form-text" id="model_product_name" value="<?php echo $result['model_product_name'];?>">

                <?php

                include('../../libs/config.php');

                $result = $conn->query("SELECT * FROM type_product");

                ?>
                <label for="type_product_id" class="lb">ประเภทสินค้า</label>
                <input autocomplete="off" type="text" id="inputIsValid " name="type_product_id" class="contact-form-text" list='list2' required> 
                <?php $sql = "SELECT * FROM type_product"; $result = $conn->query($sql); // while($row = $result->fetch_assoc()){ ?> 
                    <datalist id='list2'>
                        <?php while($row = mysqli_fetch_array($result)) {?> 
                        <option value="<?php echo $row["type_product_id"]?>"> <?php echo $row["type_product_name"] ?> </option><?php }?> 
                    </datalist>


                
                

                <label for="gender" class="lb">เพศ</label>
                <select class="contact-form-text" name="gender" id="gender">
                  <option value="<?php echo $result["gender"];?>"><?php echo $result["gender"];?></option>
                  <option value="ชาย">ชาย</option>
                  <option value="หญิง">หญิง</option>
            
                </select>
                
                <label for="address" class="lb">ที่อยู่</label>
                <!-- <input type="text" name="address" class="contact-form-text" id="address" placeholder="Enter address"> -->
                <textarea name="address" class="contact-form-text" value="<?php echo $result["address"];?>"><?php echo $result["address"];?></textarea>

                <label for="tel" class="lb">เบอร์</label>
                <input type="text" name="tel" class="contact-form-text" id="tel" value="<?php echo $result["tel"];?>">
            
                <label for="facebook" class="lb">Facebook</label>
                <input type="text" name="facebook" class="contact-form-text" id="facebook" value="<?php echo $result["facebook"];?>">
            
                <label for="email" class="lb">Email</label>
                <input type="text" name="email" class="contact-form-text" id="email" value="<?php echo $result["email"];?>">

                <input type="submit" class="contact-form-btn" value="Save" >
  
            </form>

<?php
mysqli_close($conn);
?>

<?php include('../index.php');  ?>
</body>
</html>