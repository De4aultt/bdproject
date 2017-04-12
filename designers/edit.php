<?php 
include('../config.php'); 
if (isset($_GET['Designer_pasport_number']) ) { 
$Designer_pasport_number = (int) $_GET['Designer_pasport_number']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($link,$value); } 
$sql = "UPDATE `Designers` SET  `Surname` =  '{$_POST['Surname']}' ,  `Name` =  '{$_POST['Name']}' ,  `Father_name` =  '{$_POST['Father_name']}' ,  `Salary` =  '{$_POST['Salary']}'   WHERE `Designer_pasport_number` = '$Designer_pasport_number' "; 
mysqli_query($link, $sql) or die(mysqli_error($link)); 
echo (mysqli_affected_rows($link)) ? "Edited row.<br />" : "Nothing changed. <br />"; 
echo "<a href='list.php'>Back To Listing</a>"; 
} 
$row = mysqli_fetch_array ( mysqli_query($link,"SELECT * FROM `Designers` WHERE `Designer_pasport_number` = '$Designer_pasport_number' ")); 
?>

<form action='' method='POST'> 
<p><b>Surname:</b><br /><textarea name='Surname'><?= stripslashes($row['Surname']) ?></textarea> 
<p><b>Name:</b><br /><textarea name='Name'><?= stripslashes($row['Name']) ?></textarea> 
<p><b>Father Name:</b><br /><textarea name='Father_name'><?= stripslashes($row['Father_name']) ?></textarea> 
<p><b>Salary:</b><br /><input type='text' name='Salary' value='<?= stripslashes($row['Salary']) ?>' /> 
<p><input type='submit' value='Edit Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<?php } 