<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>

<?php
    // $conn = mysqli_connect("localhost","root","","jewelry_db");
    include('../libs/config.php'); 

    // if($date= $_REQUEST['fish_id']){
    //     $se = " SELECT * FROM fish_data 
    //             WHERE fish_id = '".$fish_id."'

    //              ";
    //    $result = $conn->query($se);
    //   if($result->num_rows > 0  ){
    //     echo '<scipt> alert("มีการสมัครเเล้ว"); </scipt>';
    //   }else{
    //     echo '<scipt> alert("การสมัครสำเร็จ"); </scipt>';



    $fish_sales_date = date("Y-m-d");
    date_default_timezone_set('Asia/Bangkok');  

    $sql = "INSERT INTO fish_sales
                                    (
                                        fish_sales_date,
                                        fish_sales_id,
                                        customer_id,
                                        fish_sales_date_chamra
                                       
                                    ) 
                                VALUES  (
                                    '$fish_sales_date',
                                    '".$_POST["fish_sales_id"]."',
                                    '".$_POST["customer_id"]."',
                                    '".$_POST["fish_sales_date_chamra"]."'
                                   
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

                $sql1 = "INSERT INTO fish_sales_details
                            (
                                
                                fish_id,
                                fish_weight_total,
                                fish_sales_price,
                                fish_sales_sum_price,
                                fish_sales_id


                            ) 
                        VALUES 
                            (
                                 
                                '".mysqli_real_escape_string($conn, $_POST["fish_id"][$i])."',   
                                '".mysqli_real_escape_string($conn, $_POST["fish_weight_total"][$i])."',
                                '".mysqli_real_escape_string($conn, $_POST["fish_sales_price"][$i])."',
                                '".mysqli_real_escape_string($conn, (($_POST["fish_weight_total"][$i]) * ($_POST["fish_sales_price"][$i])))."',   ---- fish_sales_sum_price
                                '".mysqli_real_escape_string($conn, $_POST["fish_sales_id"])."'
                            )
                        ";
                mysqli_query($conn, $sql1); 

                // ======================================================================


                $sql2 = " UPDATE    fish_sales_details
                SET       fish_sales_sum_price = '".$_POST["fish_weight_total"][$i]."' * '".$_POST["fish_sales_price"][$i]."'
                WHERE     fish_sales_details.fish_sales_details_id = '".$_POST["fish_sales_details_id"][$i]."' ";
            
                mysqli_query($conn, $sql2);

                // ======================================================================


                $sql3 = "  UPDATE    fish_data
                SET     fish_status = 'ว่าง',
                        fish_health = 'ว่าง',
                        -- fish_type_name = 'ว่าง',
                        date_of_fish = '',
                        date_change_fish = ''
                  
                WHERE   fish_data.fish_id = '".$_POST["fish_id"][$i]."' ";
            
                mysqli_query($conn, $sql3);
                // // ======================================================================

                $sql4 = "  UPDATE    fish_type
                SET       fish_type_name = 'ว่าง'
                          
                WHERE   fish_type.fish_type_id = '".$_POST["fish_type_id"][$i]."' ";
            
                mysqli_query($conn, $sql4);

                // $sql3 = " UPDATE    fish_data
                //             SET     fish_status = '".$_POST["fish_status"]."'
                
                //             WHERE   fish_data.fish_id = '".$_POST["fish_id"]."' ";
                // mysqli_query($conn, $sql3);

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
