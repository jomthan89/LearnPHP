<?php
    require 'connect.php';
    $sql = "DELETE FROM randomstr"; //ลบข้อมูลทุกอย่าง
    $resultDel = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
    if($resultDel)
    {
        header("Location:http://localhost/VHWork/"); //ลบเสร็จกลับไปหน้าหลัก
    }	
?>