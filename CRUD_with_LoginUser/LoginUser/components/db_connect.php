<?php

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crud_login_final";


    $connect = new mysqli($hostname, $username, $password, $dbname);

    
    if(!$connect){
        die("Connection failed:" . mysqli_connect_error());
    } 
    // else {
    //     echo "<h1>DB_CONNECT: Yes. We made it (connected)!</h1>";
    // }

?>