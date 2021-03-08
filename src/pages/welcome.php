<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="style/customerstyle.css">
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/fish.jpg">
    <title>Welcome to</title>
</head>

<style>
/* body {background-color: powderblue;} */
h1   {color: #ffffff;}
h5   {color: #ffffff;}
/* p    {color: red;} */
</style>

<body>
    
<div class="contact-section">

            
            <form class="contact-form" action="" method="post">
            
            <br>
            <div class="border-forms"></div>  
                <h1 align="center"> WELCOME TO </h1>
            <div class="border-forms"></div><br>

            <h5 align="left">Username : <?php echo $_SESSION["firstname"] ?> <?php echo $_SESSION["lastname"] ?></h5>
            <h5 align="left">Status    : <?php echo $_SESSION["position"] ?></h5><br>
            <img src="11.jpg" height="400" width="1000">
            <br><br>
            <div class="border-forms"></div>

            <br><br><br><br><br><br><br><br><br><br><br><br><br>  
  
            </form>

<?php include('indexmenu.php');  ?>

</body>
</html> 