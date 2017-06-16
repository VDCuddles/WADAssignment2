<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Manage Paper</title>
</head>

<body>
<form method="post" enctype="multipart/form-data" action="index.php?content_page=Createbagaction">
<table>
  <tr>
    <td>Bag Name:</td>
    <td><input type="text" name="bagname" size="45"></td>
  </tr>
  <tr>
    <td>File Name:</td>
    <td><input type="File" name="bagimage" value="" size="30"></td>
  </tr>
  <tr>
    <td>Category:</td>
    <td><input type="number" step="1" name="bagcat" value="" size="30"></td>
  </tr>
  <tr>
    <td>Price:</td>
    <td><input type="number" step="0.0001" name="bagprice" size="45"></td>
  </tr>
    <tr>
    <td colspan="2"><input type="Submit" name="submit" value="Submit Document"></td>
  </tr>
</table>
</form>
<?php

?>
</body>
</html>
