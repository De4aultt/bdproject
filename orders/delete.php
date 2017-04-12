<?php
include('../config.php'); 
$Order_id = (int) $_GET['Order_id']; 
mysqli_query($link, "DELETE FROM `Orders` WHERE `Order_id` = '$Order_id' ") ; 
echo (mysqli_affected_rows($link)) ? "Row deleted.<br /> " : "Nothing deleted.<br /> "; 
?> 

<a href='list.php'>Back To Listing</a>