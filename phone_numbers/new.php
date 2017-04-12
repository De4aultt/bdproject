<?php
include('../config.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($link, $value); } 
$sql = "INSERT INTO `Phone_numbers` ( `Phone_number_id` , `Mobile` ,  `Home` ,  `Manager_pasport_number`  ) VALUES( '{$_POST['Phone_number_id']}'  , '{$_POST['Mobile']}' ,  '{$_POST['Home']}' ,  '{$_POST['Manager_pasport_number']}'  ) "; 
mysqli_query($link, $sql) or die(mysqli_error($link)); 
echo "Added row.<br />"; 
echo "<a href='list.php'>Back To Listing</a>"; 
} 
?>

<form action='' method='POST'> 
<p><b>Phone number id:</b><br /><textarea name='Phone_number_id'></textarea> 
<p><b>Mobile:</b><br /><textarea name='Mobile'></textarea> 
<p><b>Home:</b><br /><textarea name='Home'></textarea> 
<p><b>Manager Pasport Number:</b><br /><input type='text' name='Manager_pasport_number'/> 
<p><input type='submit' value='Add Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
