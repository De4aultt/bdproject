<?php
include('../config.php'); 
if (isset($_GET['Order_id']) ) { 
$Order_id = (int) $_GET['Order_id']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($link, $value); } 
$sql = "UPDATE `Orders` SET  `Order_Date` =  '{$_POST['Order_Date']}' ,  `Town` =  '{$_POST['Town']}' ,  `Street` =  '{$_POST['Street']}' ,  `House` =  '{$_POST['House']}' ,  `Manager_pasport_number` =  '{$_POST['Manager_pasport_number']}'   WHERE `Order_id` = '$Order_id' "; 
mysqli_query($link, $sql) or die(mysqli_error($link)); 
echo (mysqli_affected_rows($link)) ? "Edited row.<br />" : "Nothing changed. <br />"; 
echo "<a href='list.php'>Back To Listing</a>"; 
} 
$row = mysqli_fetch_array ( mysqli_query($link, "SELECT * FROM `Orders` WHERE `Order_id` = '$Order_id' ")); 
?>

<form action='' method='POST'> 
<p><b>Order Date:</b><br /><input type='text' name='Order_Date' value='<?= stripslashes($row['Order_Date']) ?>' /> 
<p><b>Town:</b><br /><textarea name='Town'><?= stripslashes($row['Town']) ?></textarea> 
<p><b>Street:</b><br /><textarea name='Street'><?= stripslashes($row['Street']) ?></textarea> 
<p><b>House:</b><br /><textarea name='House'><?= stripslashes($row['House']) ?></textarea> 
<p><b>Manager Pasport Number:</b><br /><input type='text' name='Manager_pasport_number' value='<?= stripslashes($row['Manager_pasport_number']) ?>' /> 
<p><input type='submit' value='Edit Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<?php } ?> 
