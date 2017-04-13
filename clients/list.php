<?php
include('../config.php'); 

$order_by = "Client_Number";
if (isset($_GET['Order_by'])){
    $order_by = $_GET['Order_by'];
}
$myquery = "SELECT * FROM `clients` ORDER BY `clients`.`$order_by` ASC";


echo "<table border=1 >"; 
echo "<tr>"; 
echo "<td><b><a href=list.php?Order_by=Client_Number>Client Number</a></b></td>"; 
echo "<td><b><a href=list.php?Order_by=Surname>Surname</a></b></td>"; 
echo "<td><b><a href=list.php?Order_by=Name>Name</a></b></td>"; 
echo "<td><b><a href=list.php?Order_by=Father_name>Father Name</a></b></td>"; 
echo "<td><b><a href=list.php?Order_by=Birthday>Birthday</a></b></td>"; 
echo "<td><b><a href=list.php?Order_by=Gender>Gender</a></b></td>"; 
echo "<td><b><a href=list.php?Order_by=Manager_Pasport_Number>Manager Pasport Number</a></b></td>"; 
echo "</tr>"; 
$result = mysqli_query($link, $myquery) or trigger_error(mysql_error()); 
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
echo "<a href=new.php>Новий запис</a>"; 


//echo("start");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

