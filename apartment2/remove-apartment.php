<?php
  session_start();
  error_reporting(0);
  include('includes/dbconn.php');

  if (strlen($_SESSION['avmsaid']==0)) {
    header('location:logout.php');
    } else {

if(isset($_GET['editid'])){
$ID=$_GET['editid'];

include 'includes/dbcon.php';


$qry="DELETE from apartment where ID=$ID";
$result=mysqli_query($con,$qry);

if($result){
    echo"DELETED";
    header('Location:manage-apartment.php');
}else{
    echo"ERROR!!";
}
}
    }
?>