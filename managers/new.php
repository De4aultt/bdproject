<?php 
include('../config.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($link, $value); } 
$sql = "INSERT INTO `Managers` ( `Manager_pasport_number` , `Surname` ,  `Name` ,  `Father_name` ,  `Birthday` ,  `Salary`  ) VALUES( '{$_POST['Manager_pasport_number']}', '{$_POST['Surname']}' ,  '{$_POST['Name']}' ,  '{$_POST['Father_name']}' ,  '{$_POST['Birthday']}' ,  '{$_POST['Salary']}'  ) "; 
mysqli_query($link, $sql) or die(mysqli_error($link)); 
echo "Added row.<br />"; 
echo "<a href='list.php'>Back To Listing</a>"; 
} 
?>

<form action='' method='POST'> 
<p><b>Manager pasport number:</b><br /><textarea name='Manager_pasport_number'></textarea> 
<p><b>Surname:</b><br /><textarea name='Surname'></textarea> 
<p><b>Name:</b><br /><textarea name='Name'></textarea> 
<p><b>Father Name:</b><br /><textarea name='Father_name'></textarea> 
<p><b>Birthday:</b><br /><input type='text' name='Birthday'/> 
<p><b>Salary:</b><br /><input type='text' name='Salary'/> 
<p><input type='submit' value='Add Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
