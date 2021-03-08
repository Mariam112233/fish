<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>

<?php   

include('../libs/config.php'); 
        // $ordering_date = date("Y-m-d");
        // date_default_timezone_set('Asia/Bangkok');  
        
// $connect = new PDO("mysql:host=localhost;dbname=jewelry_db", "root", "");

function fill_unit_select_box($conn)
{ 
 $output = '';
 $sql = "SELECT * FROM medicine_data ORDER BY medicine_data_id ASC";
 $result = $conn->query($sql); 


 foreach($result as $key=>$row)
 {
  $output .= '<option value="'.$row["medicine_data_id"].'">'.$row["medicine_data_id"].' '.$row["medicine_data_name"].'</option>';
 }
 return $output;
}

?>

<!-- ================================================================================= -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="style/customerstyle.css">
    <script src="../../assets/jquery/jquery-3.4.1.min.js"></script>
    <script src="../../assets/popper.min.js"></script>

    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- ========================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <!-- ============================ -->

    <title>ข้อมูลการสั่งซื้อยารักษาโรค</title>

    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon.ico">
</head>

<body>

    <div class="contact-section">
        <!-- <div class="containner">  -->

        <h3>ข้อมูลการสั่งซื้อยารักษาโรค</h3>
        <div class="border-form"></div>

        <form class="contact-form" name="add_name" id="add_name"><br>

            <!-- ========================================================================================================== -->
            <div class="container-fuit">
                <div class="row">
                    <div class="col-2">
                        <?php
                        $medicine_order_id = 0 ;
                        $sql1 =  mysqli_query($conn, "SELECT * FROM medicine_order ORDER BY medicine_order_id DESC LIMIT 1");
                        while($row1 = mysqli_fetch_array($sql1)){
                        $medicine_order_id = $row1['medicine_order_id'];
                        }
                        $medicine_order_id += 1 ;
                        ?>
                        <!-- ======================================= -->
                        <label for="medicine_order_id" class="lb">รหัสการสั่งซื้อ</label>
                        <input type="text" name="medicine_order_id" class="contact-form-text" required value=" <?php echo $medicine_order_id; ?>" />
                        <!-- ======================================= -->
                            
                    </div>            
                    <div class="col">
                
                    <?php $customer_id = $_SESSION['employee_id']; ?>
                        <label for="employee_id" class="lb">รหัสพนักงาน</label>
                        <input autocomplete="off" type="text" id="inputIsValid " name="employee_id" class="contact-form-text" list='list1' required value=" <?php echo $employee_id; ?>">              
                        <?php 
                            include('../libs/config.php');
                                $sql = "SELECT * FROM employee"; 
                                $result = $conn->query($sql); 
                        ?> 
                            <datalist id='list1'>
                        <?php foreach($result as $key=>$row) {
                        echo'
                              <option value="'.$row["employee_id"].'. '.$row["firstname"].'"></option>
                            ';                 
                        } 
                        ?>
                    </datalist>

                    </div>
                    <!-- <div class="col-4">
                    </div> -->
                    <div class="col">
                        <label for="supplier_medicine_id" class="lb">รหัสซัพพลายเออร์</label>
                        <input autocomplete="off" type="text" id="inputIsValid " name="supplier_medicine_id" class="contact-form-text" list='list2' required> 
                        <?php           // $result = $conn->query("SELECT * FROM customer");
                        $sql = "SELECT * FROM supplier_medicine"; 
                        $result = $conn->query($sql); // while($row = $result->fetch_assoc()){ ?> 
                            <datalist id='list2'>
                                <?php foreach($result as $key=>$row) {
                            echo '
                                <option value="'.$row["supplier_medicine_id"].'"</option>
                            ';
                            } ?>
                        </datalist>
                            
                    </div>
                </div>
            </div><br>
            <!-- ========================================================================================================== -->

            <table class="table table-dark" id="dynamic_field">
                <tr>
                    <th class="text-center">
                        ชื่ออาหาร
                    </th>
                    <th class="text-center">
                        จำนวน
                    </th>
                    <th class="text-center">
                        ราคา
                    </th>
                    <!-- <th class="text-center">
                        ราคารวม
                    </th> -->
                    <th><button type="button" name="add" id="add" class="btn btn-success">+</button></th>
                </tr>
            </table>
            <input type="button" name="submit" id="submit" value="Submit" class="btn btn-primary" />
            <button type="button" class="btn btn-danger" onClick="history.go(-1);"><i class="fas fa-arrow-circle-left"> กลับ | Back</i></button>
        </form>

        <!-- ================================================ -->

        <?php include('indexmenu.php');  ?>

</body>

</html>

<script>
$(document).ready(function() {
    var i = 1;
    $('#add').click(function() {
        i++;
        $('#dynamic_field').append('<tr id="row' +
            i +
            '"><td><select name="medicine_data_id[]" class="form-control medicine_data_id"><option value="">ป้อนยา </option><?php echo fill_unit_select_box($conn); ?></select></td>'
            // +i+'"><td><input type="text" name="ordering_raw_materials_details_id[]" plecaholder="Ener ordering_raw_materials_details_id" class="form-control name" id="ordering_raw_materials_details_id'
            // +i+'"/></td><td><input type="text" name="raw_material_name[]" plecaholder="Ener raw_material_name" class="form-control name" id="raw_material_name'
            +
            i +'" /></td><td><input type="number" name="order_medicine_number[]" placeholder="0.00" step="0.01" min="0.01" max="1000" class="form-control order_medicine_number" id="order_medicine_number' +
            i +'" /></td><td><input type="text" name="order_medicine_price[]" placeholder="00.00" class="form-control order_medicine_price" id="order_medicine_price' +
            i +'" /></td><td><button name="remove" id="' + 
            i +'"class="btn btn-danger btn_remove">x</button></td></tr>');

            // <td><input type="text" name="sum_price[]" placeholder="00.00" class="form-control sum_price" id="sum_price' +
            // i +'" /></td>
    });
    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });

    $('#submit').click(function() {
        $.ajax({
            url: "order_medicine-conn.php",
            method: "POST",
            data: $('#add_name').serialize(),
            success: function(data) {
                alert(data);
                $('#add_name')[0].reset();
            }
        });
    });

});
</script>