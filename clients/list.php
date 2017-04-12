<?php
include('../config.php'); 
echo "<table border=1 >"; 
echo "<tr>"; 
echo "<td><b>Client Number</b></td>"; 
echo "<td><b>Surname</b></td>"; 
echo "<td><b>Name</b></td>"; 
echo "<td><b>Father Name</b></td>"; 
echo "<td><b>Birthday</b></td>"; 
echo "<td><b>Gender</b></td>"; 
echo "<td><b>Manager Pasport Number</b></td>"; 
echo "</tr>"; 
$result = mysqli_query($link, "SELECT * FROM `Clients`") or trigger_error(mysql_error()); 
while($row = mysqli_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['Client_Number']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Surname']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Name']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Father_name']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Birthday']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Gender']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Manager_Pasport_Number']) . "</td>";  
echo "<td valign='top'><a href=edit.php?Client_Number={$row['Client_Number']}>Edit</a></td><td><a href=delete.php?Client_Number={$row['Client_Number']}>Delete</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
echo "<a href=new.php>New Row</a>"; 


//echo("start");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

