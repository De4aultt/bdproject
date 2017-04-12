<?php
include('../config.php'); 
$Phone_number_id = (int) $_GET['Phone_number_id']; 
mysqli_query($link, "DELETE FROM `Phone_numbers` WHERE `Phone_number_id` = '$Phone_number_id' ") ; 
echo (mysqli_affected_rows($link)) ? "Row deleted.<br /> " : "Nothing deleted.<br /> "; 
?> 

<a href='list.php'>Back To Listing</a>