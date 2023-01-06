<?php
include './includes/dbconn.php';

$query=mysqli_query($con,"SELECT ID from apartment where apartment_status='เช่าเเล้ว'");
$count_occ_apartment=mysqli_num_rows($query);

echo $count_occ_apartment;
 ?> 