<?php
require 'connect.php';
if($_POST["ProductID"]==''){
    echo "<script type='text/javascript'>"; 
    echo "alert('Error Contact Admin !!');"; 
    echo "window.location = 'Delete.php'; "; 
    echo "</script>";
    }
    $ProductID = $_POST["ProductID"];

    $sql = "DELETE FROM Products WHERE ProductID = '$ProductID'"; 
    $resultDel = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
    
    if($resultDel)
    {
        header("Location:http://localhost/products/");
    }	

?>