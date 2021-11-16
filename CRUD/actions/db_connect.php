<?php

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "php_day_4";

$connect = new mysqli($hostname, $username, $password, $dbname);

if(!$connect){
    die("Conenction failed:" . mysqli_connect_error());
} 
// else {
//     echo"<h1> DB_CONNECT: Youhuu, connected!</h1>";
// }

?>