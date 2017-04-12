<?php
include('../config.php'); 
$Picture_id = (int) $_GET['Picture_id']; 
mysqli_query($link, "DELETE FROM `Pictures` WHERE `Picture_id` = '$Picture_id' ") ; 
echo (mysqli_affected_rows($link)) ? "Row deleted.<br /> " : "Nothing deleted.<br /> "; 
?> 

<a href='list.php'>Back To Listing</a>