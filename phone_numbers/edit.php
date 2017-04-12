<?php
include('../config.php'); 
if (isset($_GET['Phone_number_id']) ) { 
$Phone_number_id = (int) $_GET['Phone_number_id']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($link, $value); } 
$sql = "UPDATE `Phone_numbers` SET  `Mobile` =  '{$_POST['Mobile']}' ,  `Home` =  '{$_POST['Home']}' ,  `Manager_pasport_number` =  '{$_POST['Manager_pasport_number']}'   WHERE `Phone_number_id` = '$Phone_number_id' "; 
mysqli_query($link, $sql) or die(mysqli_error($link)); 
echo (mysqli_affected_rows($link)) ? "Edited row.<br />" : "Nothing changed. <br />"; 
echo "<a href='list.php'>Back To Listing</a>"; 
} 
$row = mysqli_fetch_array ( mysqli_query($link, "SELECT * FROM `Phone_numbers` WHERE `Phone_number_id` = '$Phone_number_id' ")); 
?>

<form action='' method='POST'> 
<p><b>Mobile:</b><br /><textarea name='Mobile'><?= stripslashes($row['Mobile']) ?></textarea> 
<p><b>Home:</b><br /><textarea name='Home'><?= stripslashes($row['Home']) ?></textarea> 
<p><b>Manager Pasport Number:</b><br /><input type='text' name='Manager_pasport_number' value='<?= stripslashes($row['Manager_pasport_number']) ?>' /> 
<p><input type='submit' value='Edit Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<?php } ?> 
