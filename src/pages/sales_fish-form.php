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
 $sql = "SELECT * FROM fish_data 
 WHERE fish_data.fish_status='พร้อมขาย'

 ";

 $result = $conn->query($sql); 


 foreach($result as $key=>$row)
 {
  $output .= '<option value="'.$row["fish_id"].'">'.$row["fish_id"].' '.$row["fish_status"].'</option>';
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

    <title>ข้อมูลการขายปลา / fish sales</title>

    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon.ico">
</head>

<body>

    <div class="contact-section">
        <!-- <div class="containner">  -->

        <h3>ข้อมูลการขายปลา / fish sales</h3>
        <div class="border-form"></div>

        <form class="contact-form" name="add_name" id="add_name"><br>

            <!-- ========================================================================================================== -->
            <div class="container-fuit">
                <div class="row">
                    <div class="col-2">
                        <?php
                        $fish_sales_id = 0 ;
                        $sql1 =  mysqli_query($conn, "SELECT * FROM fish_sales ORDER BY fish_sales_id DESC LIMIT 1");
                        while($row1 = mysqli_fetch_array($sql1)){
                        $fish_sales_id = $row1['fish_sales_id'];
                        }
                        $fish_sales_id += 1 ;
                        ?>
                        
                        <!-- ======================================= -->
                        <label for="" class="lb">รหัสการขาย</label>
                        <input type="text" name="fish_sales_id" class="contact-form-text" required value=" <?php echo $fish_sales_id; ?>" />
                        <!-- ======================================= -->
                    </div> 


                    <div class="col">
                
                        <?php $customer_id = $_SESSION['customer_id']; ?>
                        <label for="customer_id" class="lb">รหัสลูกค้า</label>
                        <input autocomplete="off" type="text" id="inputIsValid " name="customer_id" class="contact-form-text" list='list1' required value=" <?php echo $customer_id; ?>">              
                        <?php 
                            include('../libs/config.php');
                                $sql = "SELECT * FROM customer"; 
                                $result = $conn->query($sql); 
                        ?> 
                            <datalist id='list1'>
                        <?php foreach($result as $key=>$row) {
                        echo'
                              <option value="'.$row["customer_id"].'. '.$row["c_firstname"].'"></option>
                            ';                 
                        } 
                        ?>  
                       <!-- <option value="'.$row["customer_id"].' => '.$row["c_firstname"].'"></option> -->
            </datalist>
                    </div> 
                    

</div>
                </div>
                <br>
            <!-- ========================================================================================================== -->

            <table class="table table-dark" id="dynamic_field">
                <tr>
                    <th class="text-center">
                        รหัสปลา
                    </th>
                    <th class="text-center">
                        น้ำหนักรวม(กิโลกรัม)
                    </th>
                    <th class="text-center">
                        ราคาต่อ(กิโลกรัม)
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
            '"><td><select name="fish_id[]" class="form-control fish_id"><option value="">Select fish data </option><?php echo fill_unit_select_box($conn); ?></select></td>'
            // +i+'"><td><input type="text" name="ordering_raw_materials_details_id[]" plecaholder="Ener ordering_raw_materials_details_id" class="form-control name" id="ordering_raw_materials_details_id'
            // +i+'"/></td><td><input type="text" name="raw_material_name[]" plecaholder="Ener raw_material_name" class="form-control name" id="raw_material_name'
            +
            i +'" /></td><td><input type="number" name="fish_weight_total[]" placeholder="0.00" step="0.01" min="0.01" max="1000" class="form-control fish_weight_total" id="fish_weight_total' +
            i +'" /></td><td><input type="text" name="fish_sales_price[]" placeholder="00.00" class="form-control fish_sales_price" id="fish_sales_price' +
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
            url: "sales_fish-conn.php",
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