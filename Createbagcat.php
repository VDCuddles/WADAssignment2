<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Manage Paper</title>
</head>

<body>
<form method="post" enctype="multipart/form-data" action="index.php?content_page=Createbagcataction">
<table>
  <tr>
    <td>Category Name:</td>
    <td><input type="text" name="catname" size="45"></td>
  </tr>
  <tr>
    <td>Description:</td>
    <td><input type="text" name="catdesc" value="" size="90"></td>
  </tr>
    <tr>
    <td colspan="2"><input type="Submit" name="submit" value="Submit Category"></td>
  </tr>
</table>
</form>
<?php
/*
if (isset($_FILES["bagimage"]) && ($_FILES["bagimage"]["error"] > 0))
  {
  echo "Error: " . $_FILES["paper_ file"]["error"] . "<br />";
  }
elseif (isset($_FILES["bagimage"]))
  {
  echo "<br>" . "Upload: " . $_FILES["bagimage"]["name"] . "<br />";
  echo "Type: " . $_FILES["bagimage"]["type"] . "<br />";
  echo "Size: " . ($_FILES["bagimage"]["size"] / 1024) . " Kb<br />";
  echo "Stored in: " . $_FILES["bagimage"]["tmp_name"] . "<br />";
  move_uploaded_file($_FILES["bagimage"]["tmp_name"], "../uploads/PHPUploaded /" . $_FILES["bagimage"]["name"]); //Save the file as the supplied name
  echo "Stored in: " . "../uploads/PHPUploaded/" . $_FILES["bagimage"]["name"];
  }*/
?>
</body>
</html>
