<?php
$positions = array("Дизайнер", "Менеджер");
$designer_pages = "pictures";
$home = "index.php";

if(isset($_SESSION["session_username"])){
echo "<div id='left'>Вітаю, ";
echo $_SESSION['session_username']; 
echo " <a href='../logout.php'>Вийти </a></div>";

function getUrl() {
  $url  = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
  $url .= ( $_SERVER["SERVER_PORT"] != 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";
  $url .= $_SERVER["REQUEST_URI"];
  return $url;
}    
 $current_page = getUrl();
 if ( !(in_array(strval($_SESSION["session_position"]), $positions)) || strval($_SESSION["session_position"]) == "Дизайнер" && !stristr(strval($current_page), $designer_pages) && !stristr(strval($current_page), $home)){
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

