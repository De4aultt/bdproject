<?php 
include('../config.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($link, $value); } 
$sql = "INSERT INTO `Pictures` ( `Picture_id` , `Date_made` ,  `File` ,  `Style` ,  `Price` ,  `Designer_pasport_number`  ) VALUES( '{$_POST['Picture_id']}', '{$_POST['Date_made']}' ,  '{$_POST['File']}' ,  '{$_POST['Style']}' ,  '{$_POST['Price']}' ,  '{$_POST['Designer_pasport_number']}'  ) "; 
mysqli_query($link, $sql) or die(mysqli_error($link)); 
echo "Added row.<br />"; 
echo "<a href='list.php'>Back To Listing</a>"; 
} 
?>

<form action='' method='POST'> 
<p><b>Picture id:</b><br /><input type='text' name='Picture_id'/> 
<p><b>Date Made:</b><br /><input type='text' name='Date_made'/> 
<p><b>File:</b><br /><textarea name='File'></textarea> 
<p><b>Style:</b><br /><textarea name='Style'></textarea> 
<p><b>Price:</b><br /><input type='text' name='Price'/> 
<p><b>Designer Pasport Number:</b><br /><input type='text' name='Designer_pasport_number'/> 
<p><input type='submit' value='Add Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
