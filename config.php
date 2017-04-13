<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
session_start();
include 'includes/header.php';
include 'acsess_roots.php';
?>

<?php
//$link = mysqli_connect("localhost", "root", "", "bd_project");


$connectstr_dbhost = '';
$connectstr_dbname = '';
$connectstr_dbusername = '';
$connectstr_dbpassword = '';

foreach ($_SERVER as $key => $value) {
    if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {
        continue;
    }
    
    $connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
    $connectstr_dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
    $connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
    $connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
}

$link = mysqli_connect($connectstr_dbhost, $connectstr_dbusername, $connectstr_dbpassword,$connectstr_dbname);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

$link->set_charset("utf8");	
?>


<?php

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
 if (strval($_SESSION["session_position"]) == "Дизайнер" && !(in_array(strval($current_page), $designer_pages))){
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


