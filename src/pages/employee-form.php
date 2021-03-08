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
    <title>ข้อมูลพนักงาน / Employee</title>
</head>

<body>

    <div class="contact-section">

        <h3>ข้อมูลพนักงาน / Employee</h3>
        <div class="border-form"></div>
        <form class="contact-form" action="employee-insert.php" method="post">

            <div class="row">
                <div class="col">
                    <label for="firstname" class="lb">ชื่อ</label>
                    <input type="text" name="firstname" class="contact-form-text" id="firstname"
                        placeholder="Enter firstname">
                </div>

                <div class="col">
                    <label for="lastname" class="lb">นามสกุล</label>
                    <input type="text" name="lastname" class="contact-form-text" id="lastname"
                        placeholder="Enter lastname">
                </div>
            </div>

            <label for="address" class="lb">ที่อยู่</label>
            <textarea name="address" class="contact-form-text" placeholder="Enter address"></textarea>

            <div class="row">
                <div class="col">
                    <label for="tel" class="lb">เบอร์</label>
                    <input type="text" name="tel" class="contact-form-text" id="tel" placeholder="Enter tel">
                </div>

                <div class="col">
                    <label for="email" class="lb">Email</label>
                    <input type="text" name="email" class="contact-form-text" id="email" placeholder="Enter email">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="position" class="lb">ตำแหน่ง</label>
                    <select class="contact-form-text" name="position" id="position">
                        <option value=""></option>
                        <option value="staff">staff</option>
                        <option value="boss">boss</option>
                    </select>
                </div>

                <div class="col">
                    <label for="username" class="lb">ชื่อเข้าใช้ระบบ</label>
                    <input type="text" name="username" class="contact-form-text" id="username"
                        placeholder="Enter username">
                </div>

                <div class="col">
                    <label for="password" class="lb">รหัสผ่าน</label>
                    <input type="password" name="password" class="contact-form-text" id="password"
                        placeholder="Enter password">
                </div>
            </div>

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
