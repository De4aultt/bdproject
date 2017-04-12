<?php
 
include('../config.php'); 
$Client_Number = (int) $_GET['Client_Number']; 
mysqli_query($link, "DELETE FROM `Clients` WHERE `Client_number` = '$Client_Number' ") ; 
echo (mysqli_affected_rows($link)) ? "Row deleted.<br /> " : "Nothing deleted.<br /> "; 
?> 

<a href='list.php'>Back To Listing</a>