<?php
include('../config.php'); 
$Manager_pasport_number = (int) $_GET['Manager_pasport_number']; 
mysqli_query($link, "DELETE FROM `Managers` WHERE `Manager_pasport_number` = '$Manager_pasport_number' ") ; 
echo (mysqli_affected_rows($link)) ? "Row deleted.<br /> " : "Nothing deleted.<br /> "; 
?> 

<a href='list.php'>Back To Listing</a>