<?php
    $con=mysqli_connect("localhost", "root", "", "apartment-visitor-nb");
    mysqli_set_charset($con, 'utf8');
    if(mysqli_connect_errno()){
        echo "DB Connection Failed!".mysqli_connect_error();
    }
  ?>