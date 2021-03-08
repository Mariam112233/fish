<?php

include('../../libs/config.php');

$result = $conn->query("SELECT * FROM type_product");

?>

<input autocomplete="off" type="text" id="inputIsValid " name="txtName" class="form-control" list='list2' required> 
<?php $sql = "SELECT * FROM type_product"; $result = $conn->query($sql); // while($row = $result->fetch_assoc()){ ?> 
    <datalist id='list2'>
        <?php while($row = mysqli_fetch_array($result)) {?> 
        <option value="<?php echo $row["type_product_id"]?>"> <?php echo $row["type_product_name"] ?> </option><?php }?> 
    </datalist>


<!-- ======================================================= -->
