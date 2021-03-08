<?php session_start();?>            <!-- การกำหนดการเข้าถึง -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link href="assets/fontawesome/css/all.css" rel="stylesheet">

    <!-- <link rel="stylesheet" href="assets/style/mainstyle.css"> -->

    <link rel="shortcut icon" type="image/x-icon" href="assets/images/fishcon.ico">
    <title>Log-in fish</title>
</head>
<style>
    /* @import "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"; */
    @import "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css";
body{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    /* background: url(gift1.png) no-repeat; */
    background: url(assets/images/33.jpg) no-repeat;
    background-size: 100% ;
}
.login-box{
    width: 350px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);     /* Login อยู่ตรงกลาง*/
    color: white;
    background-color: rgba(0, 0, 0, .6);
    padding: 60px;
    border-radius: 15px;         /*ขอบของกรอบเทา Login มุมป็นรี*/
}
.login-box h1{
    text-align: center;
    float: center;
    font-size: 35px;
    border-bottom: 6px solid #FFC312;
    margin-bottom: 30%;
    padding: 13px 0;
}
.textbox{
    width: 100%;
    overflow: hidden;
    font-size: 20px;
    padding: 8px 0;
    margin: 8px 0;
    border-bottom: 2px solid #FFC312;
}
.textbox i{
    width: 26px;
    float: left;
    text-align: center;
}
.textbox input{
    border: none;
    outline: none;
    background: none;
    color: white;
    font-size: 18px;
    width: 80%;
    float: left;
    margin: 0 10px;
}
/* --------------------------------- */
.button{
    width: 100%;
    /* background: none; */
    background: #636e72;
    border: 1px solid #ffffff;
    border-radius: 10px;    /*การทำให้มุมของกรอบเป็นรีๆ*/
    color: white;
    padding: 5px;
    font-size: 18px;
    cursor: pointer;
    margin: 10px 0;
}
.button:hover{
    background: #FFC312;
}
.contact-form-btn{
    float: right;
    border: 0;
    background: #636e72;
    color: #fff;
    padding: 12px 50px;
    border-radius: 20px;    /*การทำให้มุมของกรอบเป็นรีๆ*/
    cursor: pointer;        /*การทำให้ลูกศรชี้ปกติ กลายเป็นลูกมือชี้แทน */
    transition: 0.5s;
}

    </style>
<body>

<form class="form-signin" method="post" action="login.php">
        <div class="login-box">
            <h1>Sign-in</h1>
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="Username" required name="username" id="username" value="">
            </div>

            <div class="textbox"> 
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Password" required name="password" id="username" value="">
            </div>

            <!-- <div class="row align-items-center remember">
						<input type="checkbox">Remember Me
			</div> -->
 

            <input type="submit" class="button" value="Login">

            <!-- <a href="indexmain.php">
                <input class="button" type="button" name="" value="Login">
            </a> -->

            <!-- <a href="src/pages/signup.php">
                <input class="button" type="button" name="" value="Sign up">
            </a> -->
            
        </div>

</form>

</body>
</html>