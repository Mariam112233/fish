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

    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/fishcon.ico">

    <title> Show </title>
</head>
 
<body>
 
<div class="container">
<?php 
	
    include('../libs/config.php');

    $sql = "SELECT * FROM work
            -- INNER JOIN fish_type ON fish_data.fish_type_id = fish_type.fish_type_id 
            INNER JOIN employee ON employee.employee_id = work.employee_id "; 
                      

	$query = mysqli_query($conn,$sql);

?>

<div class="contact-section">
    <h4>ข้อมูลวันเข้างาน</h4>

    <a href="work-form.php" class="btn btn-success"><i class="fas fa-plus"></i> เพิ่มข้อมูลวันเข้างาน</a> &nbsp;&nbsp;

</div>    
<table class="table">
   <thead class="thead-dark">
       <tr>
           <th scope="col">id</th>
           <th scope="col">ชื่อพนักงาน</th>
           <th scope="col">จำนวนวันเข้างาน</th>
           <th scope="col">Actions</th>

       </tr>
   </thead>

<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>

        <tr>
           <th><?php echo $result['work_id']; ?></th>
           <td><?php echo $result['firstname']; ?> <?php echo $result['lastname']; ?></td>
           <td><?php echo $result['work_day']; ?></td>
           
           <td>
               <a href="work-edit.php?work_id=<?php echo $result['work_id'];?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
               <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='work-delete.php?work_id=<?php echo $result["work_id"];?>';}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
           </td>

       </tr>

<?php
}
?>
</table>


<?php
mysqli_close($conn);
?>

</div>


<?php include('indexmenu.php');  ?>

</body>
</html>