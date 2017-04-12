<?php 
include('../config.php'); 
if (isset($_GET['Picture_id']) ) { 
$Picture_id = (int) $_GET['Picture_id']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($link, $value); } 
$sql = "UPDATE `Pictures` SET  `Date_made` =  '{$_POST['Date_made']}' ,  `File` =  '{$_POST['File']}' ,  `Style` =  '{$_POST['Style']}' ,  `Price` =  '{$_POST['Price']}' ,  `Designer_pasport_number` =  '{$_POST['Designer_pasport_number']}'   WHERE `Picture_id` = '$Picture_id' "; 
mysqli_query($link, $sql) or die(mysqli_error($link)); 
echo (mysqli_affected_rows($link)) ? "Edited row.<br />" : "Nothing changed. <br />"; 
echo "<a href='list.php'>Back To Listing</a>"; 
} 
$row = mysqli_fetch_array ( mysqli_query($link, "SELECT * FROM `Pictures` WHERE `Picture_id` = '$Picture_id' ")); 
?>

<form action='' method='POST'> 
<p><b>Date Made:</b><br /><input type='text' name='Date_made' value='<?= stripslashes($row['Date_made']) ?>' /> 
<p><b>File:</b><br /><textarea name='File'><?= stripslashes($row['File']) ?></textarea> 
<p><b>Style:</b><br /><textarea name='Style'><?= stripslashes($row['Style']) ?></textarea> 
<p><b>Price:</b><br /><input type='text' name='Price' value='<?= stripslashes($row['Price']) ?>' /> 
<p><b>Designer Pasport Number:</b><br /><input type='text' name='Designer_pasport_number' value='<?= stripslashes($row['Designer_pasport_number']) ?>' /> 
<p><input type='submit' value='Edit Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<?php } ?> 
