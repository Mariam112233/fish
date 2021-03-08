<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start(); ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" href="style/customerstyle.css">
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon.ico">

    <title>ข้อมูลปลา / Raw material</title>
</head>
<body>
<h2><center>เพิ่มข้อมูลการสั่งซื้ออาหาร</center></h2>
<form action="index.php?web=orderfood/insertorderfood" method="POST"align="center">
  <br>
    <center>
      <div class="col-3">
        <div class="center">
          <!-- <label for="namefood" class="col-sm-3 col-form-label col-form-label-sm">ชื่ออาหาร</label>
          <div class="col-sm-6">
            <input type="text" class="form-control form-control-sm" id="namefood" name="namefood"  placeholder="ป้อนชื่ออาหาร">
          </div> -->
          <center>
           <div class="col-8">
             <div class="center">
               <div class="col-6">
               <label for="dateorder">วันที่สั่งซื้อ</label>
               </div>
               <div class="col-6">
                 <input type="date" class="form-control form-control-sm" id="dateorder" name="dateorder"  placeholder="ป้อนวันที่สั่งซื้อ">
               </div>
             </div>
         </center>
          <table class="table table-striped">
            <thead>
              <th>ชืออาหาร</th>
              <th>จำนวน(กิโลกรัม)</th>
            </thead>

              <?php foreach ($result3 as $key => $val) :?>
                <tr>
                <td>
                  <?php echo $val['namefood']; ?>
                  </td>
                  <td>
                    <div class="form-check">
                      <label for="form-check-label">
                        <input type="checkbox" name="check_food[<?= $key ?>]" value="<?= $val['food_id']?>"
                        class="form-check-input checkbox1" id="checkbox1" style="width:20px;" >
                      </label>
                      <input type="text" name="amount[<?= $key?>]" value="" class="form-control text1"
                      style="display:none" id="text1" placeholder="จำนวน"><br>
                      <input type="text" name="price[<?= $key?>]" value="" class="form-control text2"
                      style="display:none" id="text2"  placeholder="ราคา">
                    </div>
                  </td>
                  </tr>

            <?php  endforeach;?>

          </table>

      </div>
    </center>
  </div>
    </center>
    <div>
    <center>
    <div class="row-3 justify-content-center">
      <div class="col-md-9" style="margin-left: 25%;">
        <button name="submit" type="submit" class="btn btn-primary">ตกลง</button>
        <button name="submit" type="reset" class="btn btn-secondary" onclick="window.location.href='index.php?web=food/food'">ยกเลิก</button>
      </div>
    </div>
    </center>
  </div>

  </form>

<!-- <button onclick="window.location.href='../index.php'">กลับสู่หน้าหลัก</button> -->

  </body>
  </html>
  <!-- <script src="../js/jquery-3.2.1.min"></script> -->
  <script >
  $('.checkbox1').change(function(){
    var chk = $(this)
    var inp = chk.closest('.form-check').find('.text1, .text2')
    if(chk.is(':checked'))
        inp.show()
    else
      inp.hide();
  });
  </script>