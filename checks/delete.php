<?php 
include('../config.php'); 
$Chek_number = (int) $_GET['Chek_number']; 
mysqli_query($link, "DELETE FROM `Cheks` WHERE `Chek_number` = '$Chek_number' ") ; 
echo (mysqli_affected_rows($link)) ? "Row deleted.<br /> " : "Nothing deleted.<br /> "; 
?>

<a href='list.php'>Back To Listing</a>