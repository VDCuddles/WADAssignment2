<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Manage Paper</title>
</head>

<body>
    <p>
<form method="post" enctype="multipart/form-data" action="index.php?content_page=ManagePaperAction">
<table>
  <tr>
    <td>Title:</td>
    <td><input type="text" name="paper_title" size="45"></td>
  </tr>
  <tr><td><br></td></tr>
  <tr>
    <td>Contact Name:</td>
    <td><input type="text" name="paper_author" size="45"></td>
  </tr>
  <tr><td><br></td></tr>
   <tr>
    <td>Address:</td>
    <td><input type="text" name="paper_author" size="45"></td>
  </tr>
  <tr><td><br></td></tr>
   <tr>
    <td>City:</td>
    <td><input type="text" name="paper_author" size="45"></td>
  </tr>
  <tr><td><br></td></tr>
   <tr>
    <td>Country:</td>
    <td><input type="text" name="paper_author" size="45"></td>
  </tr>
  <tr><td><br></td></tr>
   <tr>
    <td>Phone:</td>
    <td><input type="text" name="paper_author" size="45"></td>
  </tr>
  <tr><td><br></td></tr>
    <td>File Name:</td>
    <td><input type="File" name="paper_file" value="" size="30"></td>
  </tr>
    <tr><td><br></td></tr>
    <tr>
        <td colspan="2"><input type="Submit" name="submit" value="Submit Registration" style="color:black;"></td>
  </tr>
</table>
</form>
    </p>
<?php
/*
if (isset($_FILES["paper_file"]) && ($_FILES["paper_file"]["error"] > 0))
  {
  echo "Error: " . $_FILES["paper_ file"]["error"] . "<br />";
  }
elseif (isset($_FILES["paper_file"]))
  {
  echo "<br>" . "Upload: " . $_FILES["paper_file"]["name"] . "<br />";
  echo "Type: " . $_FILES["paper_file"]["type"] . "<br />";
  echo "Size: " . ($_FILES["paper_file"]["size"] / 1024) . " Kb<br />";
  echo "Stored in: " . $_FILES["paper_file"]["tmp_name"] . "<br />";
  move_uploaded_file($_FILES["paper_file"]["tmp_name"], "../uploads/PHPUploaded /" . $_FILES["paper_file"]["name"]); //Save the file as the supplied name
  echo "Stored in: " . "../uploads/PHPUploaded/" . $_FILES["paper_file"]["name"];
  }*/
?>
</body>
</html>
