<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../../dist/img/logo.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>ADMIN</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form> -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <!-- <a href="../admin/admin.php">
                <li class="treeview">
                    <i class="fa fa-database"></i> <span>จัดการข้อมูล</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> ข้อมูลลูกค้า</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> ข้อมูลพนักงาน</a></li>
            </ul>
            </li> -->

            <li>
                <a href="../admin/admin.php">
                    <i class="fa  fa-home"></i> <span>หน้าแรก</span>
                </a>
            </li>
            <li>
                <a href="../customer/customer_show.php">
                    <i class="fa fa-users"></i> <span>ข้อมูลลูกค้า</span>
                </a>
            </li>

            <li>
                <a href="../employee/employee_show.php">
                    <i class="fa fa-user"></i> <span>ข้อมูลพนักงาน</span>
                </a>
            </li>
            <li>
                <a href="../supplier/supplier_show.php">
                    <i class="fa  fa-user-md"></i> <span>ข้อมูลซัพพลายเออร์</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-hourglass-half"></i> <span>จัดการการทำงาน</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <!-- <li><a href="../working/working_show.php"><i class="fa fa-clock-o"></i> วัน-เวลาทำงาน</a></li> -->
                    <li><a href="../salary/salary_show.php"><i class="fa fa-calculator"></i> ค่าตอบแทน</a></li>
                </ul>
            </li>
            <!-- <li>
                <a href="../category/category_show.php">
                    <i class="fa fa-check-circle-o"></i> <span>ประเภทสินค้า</span>
                </a>
            </li>
            <li>
                <a href="../stylepro/stylepro_show.php">
                    <i class="fa fa-pagelines"></i> <span>รูปแบบสินค้า</span>
                </a>
            </li> -->

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tags"></i> <span>จัดการสินค้า</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../product/product_show.php"><i class="fa fa-pencil-square-o"></i> ข้อมูลสินค้า</a>
                    </li>
                    <li><a href="../product/order_product.php"><i class="fa  fa-bookmark"></i> รายการสั่งทำสินค้า</a>
                    </li>
                    <!-- <li><a href="../payment/ad_payment_show.php"><i class="fa  fa-money"></i> รายการชำระ</a></li> -->
                    <li><a href="../shop/product.php"><i class="fa  fa-cart-plus"></i> หน้าร้าน</a></li>
                    <!-- <li><a href="../shop/shop_show.php"><i class="fa  fa-barcode"></i> รายการสั่งทำสินค้า</a></li> -->
                </ul>
            </li>
            <li>
                <a href="../payment/ad_payment_show.php">
                    <i class="fa  fa-money"></i> <span>รายการชำระ</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th-large"></i> <span>จัดการวัตถุดิบ</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../meterial/meterial_show.php"><i class="fa fa-pencil-square-o"></i> ข้อมูลวัตถุดิบ</a>
                    </li>
                    <li><a href="../meterial_order/order_form.php"><i class="fa fa-paypal"></i> สั่งซื้อวัตถุดิบ</a>
                    </li>
                    <li><a href="../meterial_order/table_order_meterial.php"><i
                                class="fa  fa-bookmark"></i>รายการสั่งซื้อวัตถุดิบ</a></li>
                    <!-- <li><a href="#"><i class="fa fa-exchange"></i> คลังวัตถุดิบ</a></li> -->
                </ul>
            </li>
            <!-- <li class="treeview">
                <a href="#">
                    <i class="fa fa-recycle"></i> <span>จัดการการใช้วัตถุดิบ</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../usage/usage_form2.php"><i class="glyphicon glyphicon-random"></i>การใช้วัตถุดิบ</a></li>
                    <li><a href="../usage/usage_show.php"><i class="fa fa-refresh"></i>แสดงการใช้วัตถุดิบ</a></li>
                </ul>
            </li> -->
            <li class="treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-random"></i> <span>จัดการการผลิต</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <!-- <li><a href="../usage/usage_show.php"><i class="glyphicon glyphicon-random"></i>รายละเอียดการใช้วัตถุดิบ</a></li>  -->
                    <li><a href="../manufacture/manufacture_show.php"><i class=""></i> รายการที่ผลิต</a></li>
                </ul>
            </li>
            <li>
                <a href="../install/install_show2.php">
                    <i class="fa fa-cogs"></i> <span>การติดตั้ง</span>
                </a>
            </li>
            <li>
                <a href="../repair/ad_repair_show.php">
                    <i class="fa fa-wrench"></i> <span>การแจ้งซ่อม</span>
                </a>
            </li>
            <!-- <li>
                <a href="../admin/admin.php">
                    <i class="fa fa-print"></i> <span>ออกรายงาน</span>
                </a>
            </li> -->
        </ul>

    </section>
    <!-- /.sidebar -->
</aside>