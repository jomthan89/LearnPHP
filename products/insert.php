<!DOCTYPE html>
<html>

<head>
    <title>Product</title>
    <meta charset="UTF-8">

</head>

<body>

<h2> New Products </h2>
<form  action = "frminsert.php" method="POST">
<label>ProductName*</label><br>
<input name="pname" type="text" id="pname"  size="40" required> <br>

<label>Picture*</label><br>
<input name="pic" type="text" id="pic"  size="40"  required><br>

<label>Category*</label><br>
<input name="category" type="text" id="category"  size="40" required> <br>

<label>ProductDescription*</label><br>
<input name="pdest" type="text" id="pdest"  size="40" required > <br>

<label>Price*</label><br>
<input name="price" type="number" id="price" min="0" max="9999" required > <br>

<label>QuantityStock*</label><br>
<input name="qstock" type="number" id="qstock" min="0" max="999" required > <br>

<br>

<button><a href='del.php?ProductID=$row[ProductID]' >DELETE</a></button>  
<input type="submit" value="Save">
<input type="reset" value="Cancel">

</form>
</body>

</html>