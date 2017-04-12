<?php
include('../config.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($link, $value); } 
$sql = "INSERT INTO `Orders` ( `Order_id`, `Order_Date` ,  `Town` ,  `Street` ,  `House` ,  `Manager_pasport_number`  ) VALUES( '{$_POST['Order_id']}' , '{$_POST['Order_Date']}' ,  '{$_POST['Town']}' ,  '{$_POST['Street']}' ,  '{$_POST['House']}' ,  '{$_POST['Manager_pasport_number']}'  ) "; 
mysqli_query($link, $sql) or die(mysqli_error($link)); 
echo "Added row.<br />"; 
echo "<a href='list.php'>Back To Listing</a>"; 
} 
?>

<form action='' method='POST'> 
<p><b>Order id:</b><br /><input type='text' name='Order_id'/> 
<p><b>Order Date:</b><br /><input type='text' name='Order_Date'/> 
<p><b>Town:</b><br /><textarea name='Town'></textarea> 
<p><b>Street:</b><br /><textarea name='Street'></textarea> 
<p><b>House:</b><br /><textarea name='House'></textarea> 
<p><b>Manager Pasport Number:</b><br /><input type='text' name='Manager_pasport_number'/> 
<p><input type='submit' value='Add Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
