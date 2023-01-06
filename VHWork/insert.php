<?php
    require 'connect.php';
    $msg_length = $_POST['length'];   
    $query = "SELECT * FROM randomstr"; 
    $result = mysqli_query($con, $query);

    function generateRandomString($length) //สุ่มอักขระตามความยาว
    { 
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    if($msg_length < 3 || is_numeric($msg_length) != 1)//ถ้าค่าน้อยกว่าหรือเท่ากับ 3 หรือ ไม่ใช่ไทป์จำนวนเต็มให้ใส่ 10 แทน หรือ ค่าว่างเข้ามา
    {
        $msg_length=10; 
    }
    
    for ($i =0; $i<5000; $i++) //ลูปสุ่มแล้วแทรก
    {
        $letters=generateRandomString($msg_length); //กำหนดให้ 10 ตัวมีโอกาสซ้ำกันน้อยและจำนวนอักขระไม่เยอะเกินไป
        while ($row = mysqli_fetch_array($result)){ //ลูปดึงข้อมูล
            while($letters==$row["letters"]){ //ลูปเปรียบเทียบ
                $letters=generateRandomString(10); //ถ้าเหมือนให้สุ่มใหม่
            }
        }
        $sql = "INSERT INTO randomstr (letters) VALUE ('$letters')"; //สุ่มแล้วแทรก
        $resultInsert = mysqli_query($con, $sql);
    }
    echo '<script>alert("Insert ข้อมูลจำนวน 5,000 ชุดเสร็จสิ้น")</script>'; //Alert 
    if ($resultInsert) //บันทึกสำเร็จแจ้งเตือนและกลับไปหน้าฟอร์ม   
    {   
        echo '<script type="text/javascript">';
        echo ' alert("INSERT ข้อมูลเสร็จสิ้น")';  //not showing an alert box.
        echo '</script>';
        header("Location: http://localhost/VHWork");
    }
//     $sql =  "INSERT INTO Products (ProductName,Picture,Category,ProductDescription,Price,QuantityStock)
//     VALUE ('$pname', '$pic', '$category','$pdest', '$price','$qstock')";
//     $resultInsert = mysqli_query($con, $sql);
?>