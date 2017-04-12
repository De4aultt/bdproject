<?php
include('../config.php'); 
if (isset($_GET['Chek_number']) ) { 
$Chek_number = (int) $_GET['Chek_number']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($link, $value); } 
$sql = "UPDATE `Cheks` SET  `Count` =  '{$_POST['Count']}' ,  `Total_price` =  '{$_POST['Total_price']}' ,  `Picture_number` =  '{$_POST['Picture_number']}' ,  `Order_number` =  '{$_POST['Order_number']}'   WHERE `Chek_number` = '$Chek_number' "; 
mysqli_query($link, $sql) or die(mysqli_error($link)); 
echo (mysqli_affected_rows($link)) ? "Edited row.<br />" : "Nothing changed. <br />"; 
echo "<a href='list.php'>Back To Listing</a>"; 
} 
$row = mysqli_fetch_array ( mysqli_query($link, "SELECT * FROM `Cheks` WHERE `Chek_number` = '$Chek_number' ")); 
?>

<form action='' method='POST'> 
<p><b>Count:</b><br /><input type='text' name='Count' value='<?= stripslashes($row['Count']) ?>' /> 
<p><b>Total Price:</b><br /><input type='text' name='Total_price' value='<?= stripslashes($row['Total_price']) ?>' /> 
<p><b>Picture Number:</b><br /><input type='text' name='Picture_number' value='<?= stripslashes($row['Picture_number']) ?>' /> 
<p><b>Order Number:</b><br /><input type='text' name='Order_number' value='<?= stripslashes($row['Order_number']) ?>' /> 
<p><input type='submit' value='Edit Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<?php } ?> 
