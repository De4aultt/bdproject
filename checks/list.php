<?php
include('../config.php'); 
echo "<table border=1 >"; 
echo "<tr>"; 
echo "<td><b>Chek Number</b></td>"; 
echo "<td><b>Count</b></td>"; 
echo "<td><b>Total Price</b></td>"; 
echo "<td><b>Picture Number</b></td>"; 
echo "<td><b>Order Number</b></td>"; 
echo "</tr>"; 
$result = mysqli_query($link, "SELECT * FROM `Cheks`") or trigger_error(mysqli_error($link)); 
while($row = mysqli_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['Chek_number']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Count']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Total_price']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Picture_number']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Order_number']) . "</td>";  
echo "<td valign='top'><a href=edit.php?Chek_number={$row['Chek_number']}>Edit</a></td><td><a href=delete.php?Chek_number={$row['Chek_number']}>Delete</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
echo "<a href=new.php>New Row</a>"; 
