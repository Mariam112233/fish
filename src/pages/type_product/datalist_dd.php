<?php

// include('../../libs/config.php');

// $sql = "SELECT * FROM type_product"; 
// $result = $conn->query($sql); 
$mysqli = NEW mysqli('localhost','root','','jewelry_db');
mysqli_set_charset($mysqli, "utf8");

$result = $mysqli->query("SELECT * FROM type_product");

?>

<select name="type_product">
<?php
while($rows = $result->fetch_assoc())
{
    $type_product_name = $rows['type_product_name'];
    echo "<option value='$type_product_name'>$type_product_name</option>";
}
?>
</select>