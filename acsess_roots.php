<?php
$positions = array("Дизайнер", "Менеджер");
$designer_pages = array("http://bdproject.azurewebsites.net/index.php",
    "http://bdproject.azurewebsites.net/pictures/delete.php", 
    "http://bdproject.azurewebsites.net/pictures/list.php",
    "http://bdproject.azurewebsites.net/pictures/edit.php",
    "http://bdproject.azurewebsites.net/pictures/new.php",
    );


if(isset($_SESSION["session_username"])){
echo "<div id='right'>Вітаю, ";
echo $_SESSION['session_username']; 
echo " <a href='../logout.php'>Вийти </a></div>";

function getUrl() {
  $url  = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
  $url .= ( $_SERVER["SERVER_PORT"] != 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";
  $url .= $_SERVER["REQUEST_URI"];
  return $url;
}    
 $current_page = getUrl();
 if ( !(in_array(strval($_SESSION["session_position"]), $positions)) || strval($_SESSION["session_position"]) == "Дизайнер" && !(in_array(strval($current_page), $designer_pages))){
    echo "<h1>Ваша посада '";
    echo $_SESSION["session_position"];
    echo "' не має доступу до даної категорії!</h1>";
    exit();
}
}
else{
echo "<br> <br><b> Ви не авторизовані.</b> <br> <a href='../login.php'>Вхід</a> <a href='../register.php'>     Реєстрація</a>";
exit();
} 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

