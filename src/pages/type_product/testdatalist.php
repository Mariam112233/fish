<input autocomplete="off" type="text" id="inputIsValid " name="txtName" class="form-control" list='list2' required> 
<?php $sql = "SELECT * FROM producttype"; $result = $conn->query($sql); // while($row = $result->fetch_assoc()){ ?> 
    <datalist id='list2'>
        <?php while($row = mysqli_fetch_array($result)) {?> 
        <option value="<?php echo $row["Protype_id"]?>"> <?php echo $row["Protype_name"] ?> </option><?php }?> 
    </datalist>