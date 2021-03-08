<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>

<?php
    // $conn = mysqli_connect("localhost","root","","jewelry_db");
    include('../libs/config.php'); 

    $fish_order_date = date("Y-m-d");
    date_default_timezone_set('Asia/Bangkok');  

    $sql = "INSERT INTO fish_order
                                    (
                                    fish_order_date,
                                    fish_order_id,
                                    employee_id,
                                    supplier_id
                                    ) 
                            
                            VALUES  (
                                    '$fish_order_date',
                                    '".$_POST["fish_order_id"]."',
                                    '".$_POST["employee_id"]."',
                                    '".$_POST["supplier_id"]."'
                                    )
                        ";
                mysqli_query($conn, $sql);

    $number = count($_POST["fish_id"]);
    
    if($number > 0)
    {
        for($i=0; $i<$number; $i++)
        {
            
            if(trim($_POST["fish_id"][$i]) != '')
            {

                $sql1 = "INSERT INTO fish_order_details
                            (
                                fish_id,
                                fish_size,
                                order_fish_number,
                                order_fish_price,
                                order_fish_price_sum,
                                fish_order_id
                            ) 

                        VALUES 
                            (
                                
                                '".mysqli_real_escape_string($conn, $_POST["fish_id"][$i])."',
                                '".mysqli_real_escape_string($conn, $_POST["fish_size"][$i])."',
                                '".mysqli_real_escape_string($conn, $_POST["order_fish_number"][$i])."',
                                '".mysqli_real_escape_string($conn, $_POST["order_fish_price"][$i])."',
                                '".mysqli_real_escape_string($conn, (($_POST["order_fish_number"][$i]) * ($_POST["order_fish_price"][$i])))."' ,   ---- sum_price
                                '".mysqli_real_escape_string($conn, $_POST["fish_order_id"])."'
                                
                            )
                        ";
                mysqli_query($conn, $sql1); 

            

                // ======================================================================


                $sql2 = " UPDATE   fish_order_details
                SET       order_fish_price_sum = '".$_POST["order_fish_number"][$i]."' * '".$_POST["order_fish_price"][$i]."'
                WHERE     fish_order_details.fish_order_details_id = '".$_POST["fish_order_details_id"][$i]."' ";
            
                mysqli_query($conn, $sql2);

                // ======================================================================

                // ======================================================================
                $sql3 = "  UPDATE    fish_data
                SET     fish_status = 'ปลาระยะเเรก',
                        fish_health = 'สุขภาพดี',
                        fish_type_id = '".$_POST["fish_type_id"][$i]."',
                        date_of_fish = ' $fish_order_date',
                        date_change_fish = ' $fish_order_date'
                     
                WHERE   fish_data.fish_id = '".$_POST["fish_id"][$i]."' ";
            
                mysqli_query($conn, $sql3);

                // ======================================================================

                
                // ======================================================================
                // $sql4 = "  UPDATE    fish_type
                // SET     fish_type_id = '".$_POST["fish_type_id"][$i]."'

                // WHERE   fish_type.fish_type_id = '".$_POST["fish_type_id"][$i]."' 
                //      ";
            
                // mysqli_query($conn, $sql4);

                // ======================================================================
                
            }
        }
        echo 'Data Inserted';
        // header( "location: order_fish-index.php" );
    }
    else
    {
        echo "Enter Name";
    }
?>
