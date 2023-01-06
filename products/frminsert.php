<?php
require 'connect.php';


$pname = $_POST['pname'];
$pic = $_POST['pic'];
$category = $_POST['category'];
$pdest = $_POST['pdest'];
$price = $_POST['price'];
$qstock = $_POST['qstock'];


$sql =  "INSERT INTO Products (ProductName,Picture,Category,ProductDescription,Price,QuantityStock)
VALUE ('$pname', '$pic', '$category','$pdest', '$price','$qstock')";
$resultInsert = mysqli_query($con, $sql);

//บันทึกสำเร็จแจ้งเตือนและกระโดดกลับไปหน้าฟอร์ม   
if ($resultInsert) 
{

    header("Location:http://localhost/products");
}

?>