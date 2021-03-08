<?php 
session_start(); ?>



<style>
@import url('https://fonts.googleapis.com/css?family=Marmelad&display=swap');
@import url('https://fonts.googleapis.com/css?family=Pridi&display=swap');

body {
    margin: 0;
    padding: 0;
    font-family: 'Pridi', serif;
    /* 'Mali', cursive;*/
    /*sans-serif;*/
    background-attachment: fixed;
}

header {
    position: absolute;
    top: 0;
    left: 0;
    padding: 0 100px;
    background: #262626;
    width: 100%;
    box-sizing: border-box;
}

header .logo {
    color: #fff;
    height: 50px;
    line-height: 50px;
    font-size: 24px;
    float: left;
    font-weight: bold;
}

header nav {
    float: right;
    /*ให้ข้อความ หน้าแรก....อยู่ฝั่งขวา เป็นแถวหลายแถว*/
}

/*ให้ข้อความอยู่เป็นแถวแค่ 1 แถว*/
header nav ul {
    margin: 0;
    padding: 0;
    display: flex;
}

header nav ul li {
    list-style: none;
}

/*  ให้เมนููอยู่ห่างกัน*/
header nav ul li a {
    height: 50px;
    line-height: 50px;
    padding: 0 20px;
    color: #fff;
    text-decoration: none;
    display: block;
}

header nav ul li a:hover,
header nav ul li a.active {
    color: #fff;
    background: #06857e;
}

.menu-toggle {
    color: #fff;
    float: right;
    line-height: 50px;
    font-size: 24px;
    cursor: pointer;
    display: none;
}

@media(max-width: 1000px) {
    header {
        padding: 0 20px;
    }

    .menu-toggle {
        display: block;
    }

    header nav {
        display: none;
        position: absolute;
        width: 100%;
        height: calc(100vh - 50px);
        background: #333;
        top: 50px;
        left: -100%;
        transition: 0.5s;
    }

    header nav ul {
        display: block;
        text-align: center;
    }

    header nav ul li a {
        border-bottom: 1px solid rgba(0, 0, 0, .2);
    }
}
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" href="navbar.css">
    <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


    <title>ร้านสหายอลูมิเนียมกระจก</title>
</head>

<body>
    <header>
        <a href="../shop/product.php" class="logo">
            <div class="logo">สหายอลูมิเนียมกระจก</div>
        </a>
        <nav>
            <ul>
                <!-- class="fa  fa-home" -->
             
                <li><a href="../shop/product.php">หน้าแรก</a></li>
                <li><a href="../shop/product_add.php">สินค้าในตะกร้า</a></li>
                <li><a href="../shop/shop_show_cus.php">รายการสั่งทำสินค้า</a></li>
                <li><a href="../payment/detail_order_cus.php">ชำระ</a> </li>
                <li><a href="../repair/order_repair.php">แจ้งซ่อม</a> </li>
                <!-- <li><a href="../cus/cus_show.php">ข้อมูลส่วนตัว</a></li> -->
                <li><a href="../cus/cus_show.php"><?php echo $_SESSION["username"] ?></a></li>
                <li><a href="../sigin/logout.php"><span class="fa fa-sign-out"></span> ออกจากระบบ</a>
                </li>
            </ul>
            <div class="menu-toggle"> <i class="fa fa-bars" aria-hidden="true"></i> </div>
        </nav>
    </header>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script>
    $(document).ready(function() {
        $('.menu-toggle').click(function() {
            $('nav').toggleClass('active')
        })
    })
    </script>
</body>
</html>

