<?php
include('../config.php'); 
if (isset($_GET['Client_Number']) ) { 
$Client_Number = (int) $_GET['Client_Number']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($link, $value); } 
$sql = "UPDATE `Clients` SET  `Surname` =  '{$_POST['Surname']}' ,  `Name` =  '{$_POST['Name']}' ,  `Father_name` =  '{$_POST['Father_name']}' ,  `Birthday` =  '{$_POST['Birthday']}' ,  `Gender` =  '{$_POST['Gender']}' ,  `Manager_Pasport_Number` =  '{$_POST['Manager_Pasport_Number']}'   WHERE `Client_Number` = '$Client_Number' "; 
mysqli_query($link, $sql) or die(mysqli_error($link)); 
echo (mysqli_affected_rows($link)) ? "Edited row.<br />" : "Nothing changed. <br />"; 
echo "<a href='list.php'>Back To Listing</a>"; 
} 
$row = mysqli_fetch_array ( mysqli_query($link, "SELECT * FROM `Clients` WHERE `Client_Number` = '$Client_Number' ")); 
?>

<form action='' method='POST'> 
<p><b>Surname:</b><br /><textarea name='Surname'><?= stripslashes($row['Surname']) ?></textarea> 
<p><b>Name:</b><br /><textarea name='Name'><?= stripslashes($row['Name']) ?></textarea> 
<p><b>Father Name:</b><br /><textarea name='Father_name'><?= stripslashes($row['Father_name']) ?></textarea> 
<p><b>Birthday:</b><br /><input type='text' name='Birthday' value='<?= stripslashes($row['Birthday']) ?>' /> 
<p><b>Gender:</b><br /><textarea name='Gender'><?= stripslashes($row['Gender']) ?></textarea> 
<p><b>Manager Pasport Number:</b><br /><input type='text' name='Manager_Pasport_Number' value='<?= stripslashes($row['Manager_Pasport_Number']) ?>' /> 
<p><input type='submit' value='Edit Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 

<?php } ?> 
