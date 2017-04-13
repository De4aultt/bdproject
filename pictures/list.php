<?php
include('../config.php'); 

$myquery = "SELECT * FROM `Pictures`";

echo "<table border=1 >"; 
echo "<tr>"; 
echo "<td><b><a href=list.php?Order_by='Picture_id'>Picture Id</a></b></td>"; 
echo "<td><b>Date Made</b></td>"; 
echo "<td><b>File</b></td>"; 
echo "<td><b>Style</b></td>"; 
echo "<td><b>Price</b></td>"; 
echo "<td><b>Designer Pasport Number</b></td>"; 
echo "</tr>"; 
$result = mysqli_query($link, $myquery) or trigger_error(mysqli_error($link)); 
while($row = mysqli_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['Picture_id']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Date_made']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['File']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Style']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Price']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Designer_pasport_number']) . "</td>";  
echo "<td valign='top'><a href=edit.php?Picture_id={$row['Picture_id']}>Edit</a></td><td><a href=delete.php?Picture_id={$row['Picture_id']}>Delete</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
echo "<a href=new.php>Новий запис</a>"; 
