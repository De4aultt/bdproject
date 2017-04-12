<?php
include('../config.php'); 
echo "<table border=1 >"; 
echo "<tr>"; 
echo "<td><b>Order Id</b></td>"; 
echo "<td><b>Order Date</b></td>"; 
echo "<td><b>Town</b></td>"; 
echo "<td><b>Street</b></td>"; 
echo "<td><b>House</b></td>"; 
echo "<td><b>Manager Pasport Number</b></td>"; 
echo "</tr>"; 
$result = mysqli_query($link, "SELECT * FROM `Orders`") or trigger_error(mysqli_error($link)); 
while($row = mysqli_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['Order_id']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Order_Date']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Town']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Street']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['House']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Manager_pasport_number']) . "</td>";  
echo "<td valign='top'><a href=edit.php?Order_id={$row['Order_id']}>Edit</a></td><td><a href=delete.php?Order_id={$row['Order_id']}>Delete</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
echo "<a href=new.php>Новий запис</a>"; 
