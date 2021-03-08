<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link href="../../assets/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="style/indexstyle.css">
    <!-- <link rel="stylesheet" href="style/customerstyle.css"> -->

    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon.ico">

    <title> Report </title>
</head> 

<style>

body {background-color: #000000;}
/* .font-family : {'Sriracha', cursive;} */
/* font-family: "Times New Roman", Times, serif; */
/* .card {background-color: #f9ca24;} */

/* body {background-color: powderblue;}
h1   {color: blue;}
p    {color: red;} */
</style>

<?php
        include('../libs/config.php');
        $customer_id = $_REQUEST['customer_id'];
        
        $sql = "SELECT * 
                FROM customer
         where customer.customer_id = '$customer_id'";
        $query = mysqli_query($conn,$sql);  
        $result = mysqli_fetch_assoc($query); 

        $sql = "SELECT *
                FROM
                    fish_sales
        INNER JOIN customer ON fish_sales.customer_id = customer.customer_id
        where  customer.customer_id = '$customer_id'";
        $query = mysqli_query($conn,$sql);
        
    ?>

<div class="container">
        <br><br><br>
            <a><button type="button" class="btn btn-warning btn-lg btn-block" >รายละเอียดการสั่งซื้อ</i></button></a>
        <br>

        <div class="card">

        <div class="card-body">
        <div class="container">
                    <div class="row">
                        <div class="col-2">
                <h5 class="card-title" align="center">ข้อมูลลูกค้า</h5>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            ชื่อ-นามสกุล :
                        </div>
                        <div class="col-10">
                        <?php echo $result['c_firstname'] ?> <?php echo $result['c_lastname'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                             เพศ :
                        </div>
                        <div class="col-10">
                            <?php echo $result['c_gender'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            เบอร์โทร :
                        </div>
                        <div class="col-10">
                            <?php echo $result['c_tel'] ?> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            ที่อยู่ :
                        </div>
                        <div class="col-10">
                            <?php echo $result['c_address'] ?>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
        <br><br>

 
        <!-- ================================================================================= -->
        <table class="table">
            <thead class="table table-primary">
                <tr>
                    <th class="text-center" scope="col">ลำดับ</th>
                    <th class="text-center" scope="col">ชื่อลูกค้า</th>
                    <th class="text-center" scope="col">วันที่สั่งผลิต</th>
                    <th class="text-center" scope="col">การชำระเงิน</th>
                    <th class="text-center" scope="col">สถานะ</th>
                    <th class="text-center" scope="col">รายละเอียด</th>
                </tr>
            </thead>

            <?php
            $i = 1;
            while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
            {
            ?>
                <tr>
                    <td class="text-center"><?php echo $i?></td>
                    <td class="text-center"><?php echo $result['c_firstname'] ?> <?php echo $result['c_lastname'] ?></td>
                    <td class="text-center"><?php echo $result['fish_sales_date']?></td>
                    <td class="text-center"><?php echo $result['payment_status']?></td>
                    <td class="text-center">
                    
                      <form action="delivery_update.php?order_product_id= <?php echo $result['fish_sales_id'];?> &&customer_id= <?php echo $result['customer_id'];?>" method="post">
                           
                           <select class="form-control" id="delivery_status" name="delivery_status">
                                <option value="<?php echo $result["delivery_status"];?>"><?php echo $result["delivery_status"];?></option>
                                <option value="จัดส่งเเล้ว">จัดส่งเเล้ว</option>
                            </select>

                     </td> 
                     <td class="text-center"><button type="submit" class="btn btn-success"><i class="fa fa-save"> บันทึก</i></a></td>
                </tr>

            <?php
                $i++;
            }
            ?>
        </table>

        <div class="row">
            <div class="col-10">
            </div>
            <div class="col-2">
                <a href="delivery_show.php"><button type="button" class="btn btn-warning btn-block" ><i class="fas fa-arrow-circle-left"> กลับ | Back</i></button></a>
            </div>
            <!-- <div class="col-2">
            <a href="#"><button type="button" class="btn btn-light btn-block" ><i class="fas fa-print"> พิมพ์ | Print</i></button></a>
            </div> -->
        </div>

        <!-- <a href="ordering_raw_materials-index.php"><button type="button" class="btn btn-warning btn-block" ><i class="fas fa-arrow-circle-left"> กลับ | Back</i></button></a> -->


    </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
        </div>
    </div>
</body>
  
    <?php
    mysqli_close($conn);
    ?>
</html> 

    <!-- <div class="has-success form-group"> -->
  
  