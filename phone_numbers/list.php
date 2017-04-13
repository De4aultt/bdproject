<?php
include('../config.php'); 

$order_by = "Phone_number_id";
if (isset($_GET['Order_by'])){
    $order_by = $_GET['Order_by'];
}
$myquery = "SELECT * FROM `phone_numbers` ORDER BY `phone_numbers`.`$order_by` ASC";


echo "<table border=1 >"; 
echo "<tr>"; 
echo "<td><b><a href=list.php?Order_by=Phone_number_id>Phone Number Id</a></b></td>"; 
echo "<td><b><a href=list.php?Order_by=Mobile>Mobile</a></b></td>"; 
echo "<td><b><a href=list.php?Order_by=Home>Home</a></b></td>"; 
echo "<td><b><a href=list.php?Order_by=Manager_pasport_number>Manager Pasport Number</a></b></td>"; 
echo "</tr>"; 
$result = mysqli_query($link, $myquery) or trigger_error(mysql_error($link)); 
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
echo "<a href=new.php>Новий запис</a>"; 
