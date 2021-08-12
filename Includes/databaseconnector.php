<?php
    $dbServerName = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "go_buy_books_admin";

    $conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    } 