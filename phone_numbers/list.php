<?php
include('../config.php'); 
echo "<table border=1 >"; 
echo "<tr>"; 
echo "<td><b>Phone Number Id</b></td>"; 
echo "<td><b>Mobile</b></td>"; 
echo "<td><b>Home</b></td>"; 
echo "<td><b>Manager Pasport Number</b></td>"; 
echo "</tr>"; 
$result = mysqli_query($link, "SELECT * FROM `Phone_numbers`") or trigger_error(mysql_error($link)); 
while($row = mysqli_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['Phone_number_id']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Mobile']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Home']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Manager_pasport_number']) . "</td>";  
echo "<td valign='top'><a href=edit.php?Phone_number_id={$row['Phone_number_id']}>Edit</a></td><td><a href=delete.php?Phone_number_id={$row['Phone_number_id']}>Delete</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
echo "<a href=new.php>New Row</a>"; 
