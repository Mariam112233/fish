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
   ini_set('display_errors', 1);
   error_reporting(~0);

   $serverName = "localhost";
   $userName = "root";
   $userPassword = "";
   $dbName = "jewelry_db";

   $strfish_type_id = null;

   if(isset($_GET["fish_type_id"]))
   {
	   $strfish_type_id = $_GET["fish_type_id"];
   }
  
   include('../libs/config.php');

   $sql = "SELECT fish_type.fish_type_id,
                  fish_type.fish_type_name
   FROM fish_type 
   WHERE fish_type_id = '".$strfish_type_id."' ";

   

   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);

?>

<div class="contact-section">

            <h3>ข้อมูลประเภทปลา / Type product</h3>
            <div class="border-form"></div>
            <form class="contact-form"action="type_fish-saveedit.php" method="post">
                

                <label for="fish_type_id" class="lb">รหัสประเภทปลา</label>
                <input type="hidden" name="fish_type_id" class="contact-form-text" id="fish_type_id" value="<?php echo $result['fish_type_id'];?>">          
                <div class="triangle"><?php echo $result["fish_type_id"];?></div><br>

                <label for="fish_type_name" class="lb">ชื่อประเภทปลา</label>
                <input type="text" name="fish_type_name" class="contact-form-text" id="fish_type_name" value="<?php echo $result['fish_type_name'];?>">

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