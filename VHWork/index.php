<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VH_Homework</title>
    <link rel="stylesheet" href="style.css"> <!-- เรียกใช้ css -->
</head>
<script>
    function validateForm() { //เช็คห้ามว่างแต่มันเวิร์ค TT
        var x = document.forms["myForm"]["fname"].value;
        if (x == ""){
            alert("This field must be filled.");
            return false;
        }
    }
</script>
<h1>Homework</h1>
<body>
    <!-- <form action="insert.php"> 
        <input type="submit" onclick="alert('INSERT ข้อมูลจำนวน 5,000 ชุด')" value="INSERT">
    </form>
    <form action="delet.php">
        <input type="submit" onclick="alert('ลบข้อมูลทั้งหมด')" value="DELETE">
    </form> -->
    <form action="insert.php" onsubmit="return validateForm()" method="post" required> 
        Length: <input type="text" name="length">
        <input type="submit" onclick="alert('INSERT ข้อมูลจำนวน 5,000 ชุด')" value="INSERT">
        <!-- <button><a href='insert.php' onclick="alert('INSERT ข้อมูลจำนวน 5,000 ชุด')" >INSERT</a></button>  -->
        <button><a href='delet.php' onclick="alert('ลบข้อมูลทั้งหมด')" >DELETE </a></button>
    </form>
    
    <!-- <input type="submit" value="Save">
    <input type="reset" value="Cancel"> -->

    <div class = "indexcontent">
        <?php 
            require 'connect.php'; 
            $query = "SELECT * FROM randomstr";
            //SELECT letters, COUNT(letters) FROM randomstr GROUP BY letters HAVING COUNT(letters) > 1 //แสดงข้อมูลซ้ำ
            $result = mysqli_query($con, $query);
            $i = 0;
            $j = 0;
            echo "<table border= '1' class = 'tablecenter'>";
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
    </div>
    
</body>
</html>