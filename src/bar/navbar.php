<?php 
session_start(); ?>
<?php 
if (!$_SESSION["user_id"]){  //check session
 
 Header("Location:../sigin/login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

}else{?>

<nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>

    <ul class="nav navbar-nav navbar-right">
        <li><a href=""><?php echo $_SESSION["username"]?></a></li>
        <li><a href="../sigin/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        <li><a href="#"></a></li>
    </ul>
</nav>
</header>
<?php } ?>
