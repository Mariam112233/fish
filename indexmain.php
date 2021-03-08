<head> 
    <!-- Required meta tags --> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <!-- ========================================================================================= -->

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link href="assets/fontawesome/css/all.css" rel="stylesheet">

    <!-- <link rel="stylesheet" href="assets/style/mainstyle.css"> -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

    <title>BANGDAY JEWELRY</title> 
</head>

<style>

/* =================== ส่วนข้างบนสุด =================== */ 
 
*{
    margin: 0; 
    padding: 0;
    font-family: "montserrat",sans-serif;
}
body .title{
    height: 110px;             /*ตวามสูงของกรอบ บนสุด*/
    width: 100%;               /*ความกว้างของกรอบ บนสุด*/
    background: #000000;     /*สีของกรอบบนสุด*/
    padding: 0 px;              /*test add 1 from  padding: 0 20px*/
    /* color: #fff; */
    position: fixed;            /*test add 2*/
    top: 0;                 /*test add 3*/
    /* border: 2px solid #FFC312; */
}
.logo{
    line-height: 300%;          /*ตำแหน่งหรือระดับของตัวอักษรภายในกรอบ*/
    color: #FFC312;        /*สีตัวอักษรภายในกรอบ*/
    /* float: left;          .menu left */
    text-transform: uppercase;
    font-size: 38px; 
    text-align: center;                
}
.logo i{
    
    margin-right: 10px;          /*ระยะห่างของ โลโก้กับชื่อร้าน*/
}

/* =================== จบ ส่วนข้างบนสุด =================== */

/* =================== ส่วน menu =================== */
/* body .middle{
    height: 80px; 
    width: 100%;
    background: #FFC312;
    padding: 0 px;              /*test add 1 from  padding: 0 20px*/
    /*color: #000000; */
    /*position: fixed;            /*test add 2*/
    /*top: 110px;                 /*test add 3*/
    /* border: 2px solid #FFC312; */
/* } */

/* =================== ส่วน content =================== */
body .content{
    /* height: 80px;  */
    width: 100%;
    background: #000000;
    padding: 0 px;              /*test add 1 from  padding: 0 20px*/
    color: #fff;
    position: absolute;            /*test add 2*/
    top: 180px;                 /*test add 3*/
    /* border: 2px solid #FFC312; */ 
}


/* =================== จบ ส่วน content =================== */

/*======================= Dropdown =======================*/

/* body
{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    background: url(../../assets/images/snow.jpg);
    background-attachment: fixed;
    background-position: center;
} */
/* header
{
    position: absolute;
    top: 0;
    left: 0;
    padding: 0 100px;
    background: #262626;
    width: 100%;
    box-sizing: border-box;
} */
header
{
    height: 70px;
    width: 100%;
    position: absolute;
    top: 110px;  
    left: 0;
    padding: 0 px; 
    background: #FFC312;
    color: #000000;
    width: 100%;
    box-sizing: border-box;
    position: fixed; 
}
/* header nav      
{
    float: right;               /*ให้เมนูชิดขวา*/
/*} */
header nav ul
{
    margin: 5px;
    padding: 5px;
    display: flex;           /*จากเมนูอยู่ซ้อนกันเป็นชั้น ให้อยู่ในแนวเดียวกัน*/
}
header nav ul li
{
    list-style: none;
    position: relative;            /* ส่วนของ sub-menu  1*/
}
header nav ul li.sub-menu:before      /* ส่วนของ sub-menu ก่อนกด จะแสดงไอคอลว่าปุ่มนั้นเป็น dropdown  5*/
{
    content: '\f0d7';
    font-family: fontAwesome;
    position: absolute;
    line-height: 50px;
    color: #fff;                   /* ไอคอลเป็นสีขาว*/
    right: 5px;
}
header nav ul li.active.sub-menu:before       /*ส่วน sub-menu    6*/
{
    content: '\f0d8';

}
header nav ul li ul                /*ส่วนของ sub-menu   2*/
{
    position: absolute;
    left: 0;
    background: #333;
    display: none;                  /*ซ่อน sub-menu ส่วนบรรทัดล่าง เพื่อทำให้เป็น Dropdown*/
}
/* header nav ul li:hover ul  */            /*ส่วนของ sub-menu แค่เอาเมาส์มาชี้ แล้วแสดง dropdown 4*/
header nav ul li.active ul                  /*ส่วนของ sub-menu จะต้องกดปุ่มก่อน แล้วแสดง dropdown 4*/
{
    display: block;                 /*sub-menu เป็น block Dropdown ลงมา*/
}
header nav ul li ul li              /*ส่วนของ sub-menu   3*/
{ 
    display: block;
    width: 200px;
}
header nav ul li a             
{
    height: 50px;
    line-height: 50px;
    padding: 0 20px;            /* ระยะห่าง ระหว่างเมนู*/
    /* color: #fff; */
    color: #000000;
    text-decoration: none;
    display: block;             /*บล๊อกตอนกดที่ปุ่มเมนู*/
}
header nav ul li a:hover,
header nav ul li a.active
{
    /* color: #fff; */
    color: #FFC312;
    background: #000000;
    /* background: #FFC312; */
}
.menu-toggle
{
    color: #fff;
    float: right;
    line-height: 50px;
    font-size: 24px;
    cursor: pointer;
    display: none;
}
@media (max-width: 991px)
{
    header
    {
        padding: 0 20px;
    }
    .menu-toggle
    {
        display: block;
    }
    header nav 
    {
        /* display: none;                               ไม่แสดงเมนู ถ้ายังไม่กดที่ ขีด 3 เส้น */
        position: absolute;
        width: 100%;
        height: calc(100vh - 50px);                     /*ย่อจอแล้ว พื้นหลังเมนูเป็นสีเทาเข้ม*/
        background: #333;
        top: 50px;
        left: -100%;                                       /*ให้แทบเมนูอยู่ชิดซ้าย*/
        /* left: 0; */
        transition: 0.5s;
    }
    header nav.active
    {
        left: 0;
    }
    header nav ul                 /*ส่วนเมนู ตอนย่อจอ*/
    {
        display: block;
        text-align: center;
    }
    header nav ul li a
    {
        border-bottom: 1px solid rgba(0,0,0,.2);           /*กรอบเมนู */
    }
    header nav ul li:active ul                     /*ส่วนของ sub-menu   7*/
    {
        position: relative;
        background: #003e6f;
    }
    header nav ul li ul li                     /*ส่วนของ sub-menu   8*/
    {
        width: 100%;                          /*sub-menu อักษรอยู่กึ่งกลาง*/
    }
}

/*===================== End Dropdown ===================*/
/* =================== Slideshow img========================= */

.slider{
    /* width: 1000px;
    height: 700px; */
    width: 600px;
    height: 800px;
    top: 5px;               /*รูปเลื่อนลงจากด้านบน*/
    left: 60px;
    /* overflow: hidden; */

    background: url(assets/images/1.jpg) no-repeat;
    margin: 10px auto;
    animation: slide 10s infinite;

}
@keyframes slide{
    25%{
        background: url(assets/images/2.jpg) no-repeat;    
    }
    50%{
        background: url(assets/images/3.jpg) no-repeat;    
    }
    75%{
        background: url(assets/images/1.jpg) no-repeat;    
    }
}

/* ===================End Slideshow img========================= */

</style>

</body>

<!-- ============================================================================================= -->
<div class="container-fuit content">


    <div class="slider">
    
    </div>

</div>


<!-- ============================================================================================= -->


<!-- ============================================================================================= -->

<div class="container-fuit title">
                <h2 class="logo">
                  <i class="far fa-gem"></i>ระบบจัดการฟาร์มปลา</h2>
</div> 

<!-- ============================================================================================= -->

<!-- <div class="container-fuit middle"> -->
<header>
    <nav class="active">
        <ul>

            <li>
            <a href=""></a>
            </li>

            <li><a href="indexmain.php">หน้าแรก</a></li>

            <li class="sub-menu"><a href="#">เกี่ยวกับบุคคล</a>
                <ul>
                    <li><a href="src/pages/customer-index.php">ข้อมูลลูกค้า</a></li>
                    <li><a href="src/pages/employee-index.php">ข้อมูลพนักงาน</a></li>
                    <li><a href="src/pages/supplier-index.php">ข้อมูลซัพพลายเออร์</a></li>
                </ul>
            </li>

            <li class="sub-menu"><a href="#">เกี่ยวกับอุปกรณ์</a>
                <ul>
                    <li><a href="src/pages/material-index.php">ข้อมูลอุปกรณ์</a></li>
                    <li><a href="src/pages/repairing_material-index.php">ข้อมูลการซ่อม</a></li>
                </ul>
            </li>

            <li class="sub-menu"><a href="#">เกี่ยวกับปลาต่อกระชัง</a>
                <ul>
                    <li><a href="src/pages/fish-index.php">ข้อมูลปลาต่อกระชัง</a></li>
                    <li><a href="src/pages/type_fish-index.php">ประเภทปลา</a></li>
                    <li><a href="src/pages/stew_fish-index.php">กระชังปลา</a></li>
                    <li><a href="src/pages/order_fish-index.php">การสั่งซื้อลูกปลา</a></li>

                    <!-- <li><a href="#">ข้อมูลสินค้า</a></li> -->
                </ul>
            </li>
            <li class="sub-menu"><a href="#">เกี่ยวกับอาหาร</a>
                <ul>
                    <li><a href="src/pages/food_data-index.php">ข้อมูลอาหาร</a></li>
                    <li><a href="src/pages/give_food-index.php">การให้อาหาร</a></li>
                    <li><a href="src/pages/order_food-index.php">การสั่งซื้ออาหาร</a></li>


                    <!-- <li><a href="#">ข้อมูลสินค้า</a></li> -->
                </ul>
            </li>
            <li class="sub-menu"><a href="#">เกี่ยวกับยารักษาโรค</a>
                <ul>
                    <li><a href="src/pages/Medicine_data-index.php">ข้อมูลยารักษาโรค</a></li>
                    <li><a href="src/pages/give_Medicine-index.php">การให้ยารักษาโรค</a></li>
                    <li><a href="src/pages/order_medicine-index.php">การสั่งซื้อยารักษาโรค</a></li>


                    <!-- <li><a href="#">ข้อมูลสินค้า</a></li> -->
                </ul>
            </li>


             <li><a href="src/pages/sales_fish-index.php">การขาย/การชำระ</a></li>

            <li><a href="src/pages/delivery_show.php">การจัดส่ง</a>



            <li>
            <a href=""></a>
            </li>
            <li>
            <a href=""></a>
            </li>
            

            <li>
            <a href="src/pages/welcome.php"><i class="fas fa-user-alt"> &nbsp;<?php echo $_SESSION["firstname"] ?> </i></a> 
            </li>
            <li>
            <a href="../../logout.php"><i class="fas fa-sign-out-alt"> &nbsp;ออกจากระบบ </i></a>
            </li>

            
            <!-- <a href="../../logout.php" class="btn btn-outline-dark" ><i class=""></i>ออกจากระบบ</a> -->
                     
        </ul>

    </nav>

    <div class="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></div>
    <!-- <div></?php echo $_SESSION["firstname"] ?></div> -->
</header>

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.menu-toggle').click(function(){
                $('nav').toggleClass('active')
            })
            $('ul li').click(function(){      /*aad part 2*/
                $(this).siblings().removeClass('active');
                $(this).toggleClass('active');
            })          
        })

    </script>
<!-- </div> -->

<!-- ============================================================================================= -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../assets/jquery/jquery-3.4.1.min.js"></script>
    <script src="../../assets/popper.min.js"></script>

    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
<!-- </body> -->


<?php  ?>

