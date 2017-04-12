<?php
include('../config.php'); 
echo "<table border=1 >"; 
echo "<tr>"; 
echo "<td><b>Designer Pasport Number</b></td>"; 
echo "<td><b>Surname</b></td>"; 
echo "<td><b>Name</b></td>"; 
echo "<td><b>Father Name</b></td>"; 
echo "<td><b>Salary</b></td>"; 
echo "</tr>"; 
$result = mysqli_query($link, "SELECT * FROM `Designers`") or trigger_error(mysqli_error($link)); 
while($row = mysqli_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['Designer_pasport_number']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Surname']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Name']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Father_name']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Salary']) . "</td>";  
echo "<td valign='top'><a href=edit.php?Designer_pasport_number={$row['Designer_pasport_number']}>Edit</a></td><td><a href=delete.php?Designer_pasport_number={$row['Designer_pasport_number']}>Delete</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
echo "<a href=new.php>New Row</a>"; 
