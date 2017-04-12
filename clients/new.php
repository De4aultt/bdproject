<?php
include('../config.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($link, $value); } 
$sql = "INSERT INTO `Clients` ( `Client_Number` , `Surname` ,  `Name` ,  `Father_name` ,  `Birthday` ,  `Gender` ,  `Manager_Pasport_Number`  ) VALUES( '{$_POST['Client_Number']}', '{$_POST['Surname']}' ,  '{$_POST['Name']}' ,  '{$_POST['Father_name']}' ,  '{$_POST['Birthday']}' ,  '{$_POST['Gender']}' ,  '{$_POST['Manager_Pasport_Number']}'  ) "; 
mysqli_query($link, $sql) or die(mysqli_error($link)); 
echo "Added row.<br />"; 
echo "<a href='list.php'>Back To Listing</a>"; 
} 
?>

<form action='' method='POST'> 
<p><b>Client_Number:</b><br /><textarea name='Client_Number'></textarea> 
<p><b>Surname:</b><br /><textarea name='Surname'></textarea> 
<p><b>Name:</b><br /><textarea name='Name'></textarea> 
<p><b>Father Name:</b><br /><textarea name='Father_name'></textarea> 
<p><b>Birthday:</b><br /><input type='text' name='Birthday'/> 
<p><b>Gender:</b><br /><textarea name='Gender'></textarea> 
<p><b>Manager Pasport Number:</b><br /><input type='text' name='Manager_Pasport_Number'/> 
<p><input type='submit' value='Add Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
