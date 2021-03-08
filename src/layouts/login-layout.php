<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title><?= $app['pageTitle'] ?></title>


    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    

    <style>
    /* @import "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"; */
    @import "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css";
body{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    /* background: url(gift1.png) no-repeat; */
    background: url(assets/images/circle.jpg) no-repeat;
    background-size: cover;
}
.login-box{
    width: 380px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);     /* Login อยู่ตรงกลาง*/
    color: white;
    background-color: rgba(0, 0, 0, .7);
    padding: 50px;
    border-radius: 15px;         /*ขอบของกรอบเทา Login มุมป็นรี*/
}
.login-box h1{
    float: left;
    font-size: 40px;
    border-bottom: 6px solid #FFC312;
    margin-bottom: 50%;
    padding: 13px 0;
}
.textbox{
    width: 100%;
    overflow: hidden;
    font-size: 20px;
    padding: 8px 0;
    margin: 8px 0;
    border-bottom: 1px solid #FFC312;
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
.button{
    width: 100%;
    background: none;
    border: 2px solid #FFC312;
    color: white;
    padding: 5px;
    font-size: 18px;
    cursor: pointer;
    margin: 10px 0;
}

    </style>
</head>

<body>
    <?= $app['content'] ?>
</body>

</html>