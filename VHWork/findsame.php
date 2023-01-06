<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SameRecord</title>
</head>
<body>
    <h1>แสดงข้อมูลซ้ำ</h1>
    <?php
        require 'connect.php'; 
        $query = "SELECT letters, COUNT(letters) FROM randomstr GROUP BY letters HAVING COUNT(letters) > 1"; //แสดงข้อมูลซ้ำ
        $result = mysqli_query($con, $query);
        echo "<table border= '1'>";
        echo "<tr><td align='center'> STR1 </td><td align='center'> STR2 </td><td align='center'> STR3 </td><td align='center'> STR4 </td><td align='center'> STR5 </td></tr>";
        while ($row = mysqli_fetch_array($result)){
            $i++; //นับข้อมูลที่อยู่ใน mysql
            //กำลังหาวิธีแสดงอยู่
            if ($j < 5 ){
                //echo $row["letters"]. " ";
                echo "<td align='center'>" . $row["letters"] . "</td>";
                $j++;
            }
            else{
                //echo "<br>";s
                echo "</tr>";
                $j=0;
            }
        }
        echo "Now the data in mysql is ". $i;
        echo "</table>";
    ?>
</body>
</html>