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
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/fishcon.ico">
    <title>ข้อมูลลูกค้า / Customer</title>
</head>

<body>

    <div class="contact-section">

        <h3>ข้อมูลลูกค้า / Customer</h3>
        <div class="border-form"></div><BR></BR>
        <form class="contact-form" action="customer-insert.php" method="post">

            <div class="row">
                <div class="col">
                    <label for="c_firstname" class="lb">ชื่อ</label>
                    <input type="text" name="c_firstname" class="contact-form-text" id="c_firstname"
                        placeholder="Enter c_firstname">
                </div>

                <div class="col">
                    <label for="c_lastname" class="lb">นามสกุล</label>
                    <input type="text" name="c_lastname" class="contact-form-text" id="c_lastname"
                        placeholder="Enter c_lastname">
                </div>

                <div class="col">
                    <label for="c_gender" class="lb">เพศ</label>
                    <select class="contact-form-text" name="c_gender" id="c_gender">
                        <option value="ชาย">ชาย</option>
                        <option value="หญิง">หญิง</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="c_tel" class="lb">เบอร์</label>
                    <input type="text" name="c_tel" class="contact-form-text" id="c_tel" placeholder="Enter tel">
                </div>

                <div class="col">
                    <label for="c_email" class="lb">Email</label>
                    <input type="text" name="c_email" class="contact-form-text" id="c_email" placeholder="Enter email">
                </div>
            </div>

            <label for="c_address" class="lb">ที่อยู่</label>
            <textarea name="c_address" class="contact-form-text" placeholder="Enter c_address"></textarea>

            <div class="row">
                <div class="col">
                    <label for="username" class="lb">ชื่อเข้าใช้ระบบ</label>
                    <input type="text" name="username" class="contact-form-text" id="username" placeholder="Enter tel">
                </div>

                <div class="col">
                    <label for="password" class="lb">รหัสผ่าน</label>
                    <input type="text" name="password" class="contact-form-text" id="password" placeholder="Enter email">
                </div>

                <div class="col">
                    <label for="position" class="lb">ผุ้ใช้</label>
                    <input type="text" name="position" class="contact-form-text" id="position" placeholder="Enter email">
                </div>
            </div>

            <div class="row">
                <div class="col-8">
                </div>
                <div class="col-2">
                    <input type="submit" class="btn btn-warning btn-block" value="Save">
                </div>
                <div class="col-2">
                    <a href="#"><button type="button" class="btn btn-danger btn-block" onClick = "history.go(-1);"> Cancel </button></a>
                </div>
            </div>

        </form>
    </div>

    <?php include('indexmenu.php');  ?>

</body>

</html>