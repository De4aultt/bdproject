<?php
include('../config.php'); 

$order_by = "Chek_number";
if (isset($_GET['Order_by'])){
    $order_by = $_GET['Order_by'];
}
$myquery = "SELECT * FROM `Cheks` ORDER BY `Cheks`.`$order_by` ASC";


echo "<table border=1 >"; 
echo "<tr>"; 
echo "<td><b><a href=list.php?Order_by=Chek_number>Chek Number</a></b></td>"; 
echo "<td><b><a href=list.php?Order_by=Count>Count</a></b></td>"; 
echo "<td><b><a href=list.php?Order_by=Total_price>Total Price</a></b></td>"; 
echo "<td><b><a href=list.php?Order_by=Picture_number>Picture Number</a></b></td>"; 
echo "<td><b><a href=list.php?Order_by=Order_number>Order Number</a></b></td>"; 
echo "</tr>"; 
$result = mysqli_query($link, $myquery) or trigger_error(mysqli_error($link)); 
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
echo "<a href=new.php>Новий запис</a>"; 
