<?php 
include('../config.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($link, $value); } 
$sql = "INSERT INTO `Cheks` ( `Chek_number` ,`Count` ,  `Total_price` ,  `Picture_number` ,  `Order_number`  ) VALUES(  '{$_POST['Chek_number']}' ,'{$_POST['Count']}' ,  '{$_POST['Total_price']}' ,  '{$_POST['Picture_number']}' ,  '{$_POST['Order_number']}'  ) "; 
mysqli_query($link, $sql) or die(mysqli_error($link)); 
echo "Added row.<br />"; 
echo "<a href='list.php'>Back To Listing</a>"; 
} 
?>

<form action='' method='POST'> 
<p><b>Chek number:</b><br /><input type='text' name='Chek_number'/> 
<p><b>Count:</b><br /><input type='text' name='Count'/> 
<p><b>Total Price:</b><br /><input type='text' name='Total_price'/> 
<p><b>Picture Number:</b><br /><input type='text' name='Picture_number'/> 
<p><b>Order Number:</b><br /><input type='text' name='Order_number'/> 
<p><input type='submit' value='Add Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
