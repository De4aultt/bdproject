<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
session_start();
include 'includes/header.php';
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
}

if (isset($_SESSION["position"])){
    echo "<h1>Ваша посада '";
    echo $_SESSION["position"];
    echo "' не має доступу до даної категорії!</h1>";
    exit();
}

else{
echo "<br> <br><b> Ви не авторизовані.</b> <br> <a href='../login.php'>Вхід</a> <a href='../register.php'>     Реєстрація</a>";
exit();
} 

if(isset($_POST["login"])){

if(!empty($_POST['username']) && !empty($_POST['password'])) {
    $username=$_POST['username'];
    $password=$_POST['password'];

    $query =mysql_query("SELECT * FROM usertbl WHERE username='".$username."' AND password='".$password."'");

    $numrows=mysql_num_rows($query);
    if($numrows!=0)

    {
    while($row=mysql_fetch_assoc($query))
    {
    $dbusername=$row['username'];
    $dbpassword=$row['password'];
    $dbposition=$row['position'];
    }

    if($username == $dbusername && $password == $dbpassword)

    {

// old placement
//    session_start();
    $_SESSION['session_username']=$username;
    $_SESSION['position']=$dbposition;
    /* Redirect browser */
    header("Location: intropage.php");
    }
    } else {
//    $message = "Invalid username or password!";

echo  "Invalid username or password!";
    }

} else {
    $message = "All fields are required!";
}
}
?>

