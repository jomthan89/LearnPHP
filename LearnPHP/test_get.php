<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test GET</title>
</head>
<body>
    <!-- ดึงข้อมูลผ่าน URL -->
    Welcome <?php echo $_GET["name"] ?>
    <br>
    Your email address is: <?php echo $_GET["email"] ?>

</body>
</html>