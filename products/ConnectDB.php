<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $db_name = "shop";

    $con = mysqli_connect($host, $username, $password, &db_name); //เชื่อมต่อฐานข้อมุล

    if (mysqli_connect_errno()) //ตรวจสอบการเชื่อมต่อ
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>