<?php
include('../config.php'); 

$order_by = "Order_id";
if (isset($_GET['Order_by'])){
    $order_by = $_GET['Order_by'];
}
$myquery = "SELECT * FROM `Orders` ORDER BY `Orders`.`$order_by` ASC";


echo "<table border=1 >"; 
echo "<tr>"; 
echo "<td><b><a href=list.php?Order_by=Order_id>Order Id</a></b></td>"; 
echo "<td><b><a href=list.php?Order_by=Order_Date>Order Date</a></b></td>"; 
echo "<td><b><a href=list.php?Order_by=Town>Town</a></b></td>"; 
echo "<td><b><a href=list.php?Order_by=Street>Street</a></b></td>"; 
echo "<td><b><a href=list.php?Order_by=House>House</a></b></td>"; 
echo "<td><b><a href=list.php?Order_by=Manager_pasport_number>Manager Pasport Number</a></b></td>"; 
echo "</tr>"; 
$result = mysqli_query($link, $myquery) or trigger_error(mysqli_error($link)); 
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
