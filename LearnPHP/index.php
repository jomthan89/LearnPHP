<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LearnPHP</title>
</head>
<body>
    
    <!-- <form action="test_get.php" method="get"> //ศึกษา $_GET ส่งข้อมูลผ่าน URL
        Name: <input type="text" name="name">
        <br>
        Email: <input type="text" name="email">
        <br>
        <input type="Submit">
    </form> -->

    <!-- <form action="test_post.php" method="post"> //ศึกษา $_POST ส่งข้อมูลผ่านฟอร์มตรงๆ
        Name: <input type="text" name="name">
        <br>
        Email: <input type="text" name="email">
        <br>
        <input type="Submit">
    </form> -->

    <?php include('header.php'); ?> <!-- ศึกษาวิธีการใช้ include แทนที่จะเขียนหมดทุกหน้าแค่เอาไว้ไฟลล์นึงแล้ว include มาก็จบ -->

    <section>
        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
            NAME: <input type="text" name="cname">
            <br>
            <input type="Submit">
        </form>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil animi laudantium possimus culpa eum totam enim facilis, obcaecati accusamus. Dignissimos eum deleniti eligendi magnam earum nobis quia doloribus tempore? Optio reprehenderit iusto officia ullam nihil, aut accusamus perspiciatis architecto dolore, consectetur omnis impedit nemo. Nisi non officia, explicabo in nihil enim necessitatibus corrupti possimus provident ratione molestias fugiat, iure ullam a suscipit eaque vero laboriosam tempore commodi? Mollitia, exercitationem quasi qui alias consectetur ab tenetur deleniti voluptatem at labore animi architecto voluptatum dolorum vitae. Nostrum sint quibusdam quisquam perferendis. Quo perspiciatis quas saepe nesciunt doloremque, sit officia fugiat et eum?

        <?php 
            if($_SERVER["REQUEST_METHOD"] == "POST"){  //เช็ค Method ว่าเป็น post ป่าว
                $name = $_REQUEST["cname"]; //ศึกษาวิธีใช้ $_REQUEST คือการดึงข้อมูลโดยไม่สนว่าว่าเป็น method ไหน
                if(empty($name)){
                    echo "THIS IS EMPTY!!!!";
                    echo "<br>";
                }else{
                    echo $name;
                    echo "<br>";
                }
            }
            
            //การประกาศตัวแปร ให้ใส่ $ นำหน้าชื่อตัวแปรทุกครั้งและไม่ต้องประกาศ datatype (ภาษาคนขี้เกียจ)
            define ("constant1","This is constant variable.") ;
            echo constant1;
            echo "<br>";

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
            // echo generateRandomString(10); //เรียกใช้งานฟังก์ชันสุ่มอักขระ 10 ตัว
            // echo "<br>";


            function random_strings($length_of_string) //สุ่มโดยการสลับอักขระตามความยาว
            { 
                // String of all alphanumeric character
                $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
                // Shuffle the $str_result and returns substring
                // of specified length
                return substr(str_shuffle($str_result), 0, $length_of_string);
            }
            for($i=0; $i<=10; $i++){ //ลูป while, do-while เหมือนภาษา C ทุกประการ
                echo "สุ่มโดยการสลับอักขระตามความยาว: ";
                echo random_strings(10);
                echo "<br>";
            }
            for($i=0; $i<=10; $i++){
                echo "สุ่มอักขระตามความยาว: ";
                echo generateRandomString(10);
                echo "<br>";
            }
            /*echo random_strings(10);//เรียกใช้งานฟังก์ชันสุ่มอักขระ 10 ตัว
            echo "<br>";
            echo random_strings(8);//เรียกใช้งานฟังก์ชันสุ่มอักขระ 8 ตัว*/

            /*echo $_SERVER["PHP_SELF"]; //ศึกษาวิธีใช้  $_SERVER มีหน้าที่แสดงข้อมูลเฉยๆ
            echo "<br>";
            echo $_SERVER["HTTP_USER_AGENT"];
            echo "<br>";*/
        ?>
    </section>
    
    <?php include('footer.php') ?> <!-- ศึกษาวิธีการใช้ include แทนที่จะเขียนหมดทุกหน้าแค่เอาไว้ไฟลล์นึงแล้ว include มาก็จบ -->

</body>
</html>