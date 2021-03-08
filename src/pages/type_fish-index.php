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
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon.ico">

    <title> Show </title>
</head>

<style>
body{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    /* background: url(gift1.png) no-repeat; */
    background: url(33.jpg) no-repeat;
    background-size: 100% ;
}
</style>

<body>

<div class="container">
<?php
	
    include('../libs/config.php');

	$sql = "SELECT * FROM fish_type";

	$query = mysqli_query($conn,$sql);

?>

<div class="contact-section">
    <h4>ข้อมูลประเภทปลา / Type product</h4>

    <a href="type_fish-form.php" class="btn btn-success"><i class="fas fa-plus"></i></a>
</div>
<table class="table">
   <thead class="thead-dark">
       <tr>
           <th scope="col">id</th>
           <th scope="col">ชื่อประเภทปลา</th>
           <th scope="col">Actions</th>
       </tr>
   </thead>

<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>

        <tr>
           <th><?php echo $result['fish_type_id']; ?></th>
           <td><?php echo $result['fish_type_name']; ?></td>
           
           <td>
               <a href="type_fish-edit.php?fish_type_id=<?php echo $result['fish_type_id'];?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
               <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='type_fish-delete.php?fish_type_id=<?php echo $result["fish_type_id"];?>';}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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