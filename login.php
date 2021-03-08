<?php 
session_start();
        if(isset($_POST['username'])){
				//connection
                  include("src/libs/config.php");
				//รับค่า user & password  จาก form
                  $username = $_POST['username'];
                  $password = $_POST['password'];
				//query 
                  $sql="SELECT * FROM employee 
                  WHERE username='".$username."' 
                  AND password='".$password."' ";

                //   echo $sql;
                //   exit;

                  $result = mysqli_query($conn,$sql);

                //   echo mysqli_num_rows($result);     
                //   exit;

                // username == password ==>> result==1 แสดงว่าถูก
                // username != password ==>> result==0 แสดงว่าผิด
				
                  if(mysqli_num_rows($result)==1){

                      $row = mysqli_fetch_array($result);

                      $_SESSION["employee_id"] = $row["employee_id"];
                    //   $_SESSION["firstname"] = $row["firstname"]." ".$row["lastname"];
                      $_SESSION["firstname"] = $row["firstname"];
                      $_SESSION["lastname"] = $row["lastname"];
                      $_SESSION["position"] = $row["position"];
                      $_SESSION["address"] = $row["address"];
                      $_SESSION["tel"] = $row["tel"];
                      $_SESSION["facebook"] = $row["facebook"];
                      $_SESSION["email"] = $row["email"];
                      $_SESSION["username"] = $row["username"];
                      $_SESSION["password"] = $row["password"];


                      if($_SESSION["position"]=="boss"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php

                        // echo 'R U Boss';
                        Header("Location: src/pages/welcome.php");

                      }

                      if ($_SESSION["position"]=="staff"){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php

                        // echo 'R U Staff';
                        Header("Location: indexmain.php");
                        // Header("Location: user_page.php");

                      }

                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";

                  }

        }else{


             Header("Location: login.php"); //user & password incorrect back to login again

        }
?>