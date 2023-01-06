<?php
require 'connect.php';
if($_POST["ProductID"]==''){
    echo "<script type='text/javascript'>"; 
    echo "alert('Error Contact Admin !!');"; 
    echo "window.location = 'Delete.php'; "; 
    echo "</script>";
    }
    $ProductID = $_POST["ProductID"];
    $pname = $_POST['pname'];
    $pic = $_POST['pic'];
    $category = $_POST['category'];
    $pdest = $_POST['pdest'];
    $price = $_POST['price'];
    $qstock = $_POST['qstock'];

   $sql =  "UPDATE Products SET  
            ProductName = '$pname',
            Picture = '$pic',
            Category = '$category',
            ProductDescription = '$pdest',
            Price = '$price',
            QuantityStock = '$qstock' 
            WHERE ProductID ='$ProductID' ";
                
    $resultDel = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
    
    if($resultDel)
    {
        header("Location:http://localhost/products/");
    }	

?>