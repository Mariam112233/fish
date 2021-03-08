<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>

<?php
    // $conn = mysqli_connect("localhost","root","","jewelry_db");
    include('../libs/config.php'); 

    $food_order_date = date("Y-m-d");
    date_default_timezone_set('Asia/Bangkok');  

    $sql = "INSERT INTO food_order
                                    (
                                    food_order_date,
                                    food_order_id,
                                    employee_id,
                                    supplier_food_id
                                    ) 
                            
                            VALUES  (
                                    '$food_order_date',
                                    '".$_POST["food_order_id"]."',
                                    '".$_POST["employee_id"]."',
                                    '".$_POST["supplier_food_id"]."'
                                    )
                        ";
                mysqli_query($conn, $sql);

    $number = count($_POST["food_data_id"]);
    
    if($number > 0)
    {
        for($i=0; $i<$number; $i++)
        {
            
            if(trim($_POST["food_data_id"][$i]) != '')
            {

                $sql1 = "INSERT INTO food_order_details
                            (
                                
                                
                                food_data_id,
                                order_food_number,
                                order_food_price,
                                order_food_price_sum,
                                food_order_id
                            ) 

                        VALUES 
                            (
                                
                                '".mysqli_real_escape_string($conn, $_POST["food_data_id"][$i])."',
                                '".mysqli_real_escape_string($conn, $_POST["order_food_number"][$i])."',
                                '".mysqli_real_escape_string($conn, $_POST["order_food_price"][$i])."',
                                '".mysqli_real_escape_string($conn, (($_POST["order_food_number"][$i]) * ($_POST["order_food_price"][$i])))."' ,   ---- sum_price
                                '".mysqli_real_escape_string($conn, $_POST["food_order_id"])."'
                                
                            )
                        ";
                mysqli_query($conn, $sql1); 

            

                // ======================================================================


                $sql2 = " UPDATE    food_order_details
                SET       order_food_price_sum = '".$_POST["order_food_number"][$i]."' * '".$_POST["order_food_price"][$i]."'
                WHERE     food_order_details.food_order_details_id = '".$_POST["food_order_details_id"][$i]."' ";
            
                mysqli_query($conn, $sql2);

                // ======================================================================

                // ======================================================================

                $sql3 = " UPDATE    food_data
                          SET       food_data_number = food_data_number + '".$_POST["order_food_number"][$i]."'
                          WHERE     food_data.food_data_id = '".$_POST["food_data_id"][$i]."' ";
            
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
