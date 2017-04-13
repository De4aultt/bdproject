<?php
include('../config.php'); 

$order_by = "Manager_pasport_number";
if (isset($_GET['Order_by'])){
    $order_by = $_GET['Order_by'];
}
$myquery = "SELECT * FROM `Managers` ORDER BY `Managers`.`$order_by` ASC";


echo "<table border=1 >"; 
echo "<tr>"; 
echo "<td><b><a href=list.php?Order_by=Manager_pasport_number>Manager Pasport Number</a></b></td>"; 
echo "<td><b><a href=list.php?Order_by=Surname>Surname</a></b></td>"; 
echo "<td><b><a href=list.php?Order_by=Name>Name</a></b></td>"; 
echo "<td><b><a href=list.php?Order_by=Father_name>Father Name</a></b></td>"; 
echo "<td><b><a href=list.php?Order_by=Birthday>Birthday</a></b></td>"; 
echo "<td><b><a href=list.php?Order_by=Salary>Salary</a></b></td>"; 
echo "</tr>"; 
$result = mysqli_query($link, $myquery) or trigger_error(mysqli_error($link)); 
while($row = mysqli_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['Manager_pasport_number']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Surname']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Name']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Father_name']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Birthday']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Salary']) . "</td>";  
echo "<td valign='top'><a href=edit.php?Manager_pasport_number={$row['Manager_pasport_number']}>Edit</a></td><td><a href=delete.php?Manager_pasport_number={$row['Manager_pasport_number']}>Delete</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
echo "<a href=new.php>Новий запис</a>"; 
