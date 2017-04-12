<?php

include('../config.php'); 
$Designer_pasport_number = (int) $_GET['Designer_pasport_number']; 
mysqli_query($link, "DELETE FROM `Designers` WHERE `Designer_pasport_number` = '$Designer_pasport_number' ") ; 
echo (mysqli_affected_rows($link)) ? "Row deleted.<br /> " : "Nothing deleted.<br /> "; 
?> 

<a href='list.php'>Back To Listing</a>