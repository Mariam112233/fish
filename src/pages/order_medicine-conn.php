<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>

<?php
    // $conn = mysqli_connect("localhost","root","","jewelry_db");
    include('../libs/config.php'); 

    $medicine_order_date = date("Y-m-d");
    date_default_timezone_set('Asia/Bangkok');  

    $sql = "INSERT INTO medicine_order
                                    (
                                    medicine_order_date,
                                    medicine_order_id,
                                    employee_id,
                                    supplier_medicine_id
                                    ) 
                            
                            VALUES  (
                                    '$medicine_order_date',
                                    '".$_POST["medicine_order_id"]."',
                                    '".$_POST["employee_id"]."',
                                    '".$_POST["supplier_medicine_id"]."'
                                    )
                        ";
                mysqli_query($conn, $sql);

    $number = count($_POST["medicine_data_id"]);
    
    if($number > 0)
    {
        for($i=0; $i<$number; $i++)
        {
            
            if(trim($_POST["medicine_data_id"][$i]) != '')
            {

                $sql1 = "INSERT INTO medicine_order_details
                            (
                                
                                
                                medicine_data_id,
                                order_medicine_number,
                                order_medicine_price,
                                order_medicine_price_sum,
                                medicine_order_id
                            ) 

                        VALUES 
                            (
                                
                                '".mysqli_real_escape_string($conn, $_POST["medicine_data_id"][$i])."',
                                '".mysqli_real_escape_string($conn, $_POST["order_medicine_number"][$i])."',
                                '".mysqli_real_escape_string($conn, $_POST["order_medicine_price"][$i])."',
                                '".mysqli_real_escape_string($conn, (($_POST["order_medicine_number"][$i]) * ($_POST["order_medicine_price"][$i])))."' ,   ---- sum_price
                                '".mysqli_real_escape_string($conn, $_POST["medicine_order_id"])."'
                                
                            )
                        ";
                mysqli_query($conn, $sql1); 

            

                // ======================================================================


                $sql2 = " UPDATE    medicine_order_details
                SET       order_medicine_price_sum = '".$_POST["order_medicine_number"][$i]."' * '".$_POST["order_medicine_price"][$i]."'
                WHERE     medicine_order_details.medicine_order_details_id = '".$_POST["medicine_order_details_id"][$i]."' ";
            
                mysqli_query($conn, $sql2);

                // ======================================================================

                // ======================================================================

                $sql3 = " UPDATE    medicine_data
                          SET       medicine_data_number = medicine_data_number + '".$_POST["order_medicine_number"][$i]."'
                          WHERE     medicine_data.medicine_data_id = '".$_POST["medicine_data_id"][$i]."' ";
            
                mysqli_query($conn, $sql3);

                // ======================================================================
                
            }
        }
        echo 'Data Inserted';
        // header( "location: ordering_raw_materials-index.php" );
    }
    else
    {
        echo "Enter Name";
    }
?>
