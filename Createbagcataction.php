<?php
require("ErrorFunctions.php");
//Sets a user function (error_handler) to handle errors in a script
$error_handler = set_error_handler("userErrorHandler");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Create Bag Category Action</title>
</head>

<body>

<?php
// create connection
$mysqli = new mysqli("localhost", "halpea01", "12111990", "halpea01mysql1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
//echo $mysqli->host_info . "\n";
  
// create SQL statement 
$sql = "INSERT INTO categories(CategoryName,Description)
        VALUES('" . $_POST['catname'] . "','" 
				 . $_POST['catdesc'] . "')"; 
				 
// execute SQL statement and get results 
if (!$mysqli->query($sql)) {
    echo "SQL operation failed: (" . $mysqli->errno . ") " . $mysqli->error;
} 
?>
<?php
//Select the file information
$sql="SELECT categories.CategoryID As category_ID,
              categories.CategoryName As catname,
              categories.Description As catdesc 
      FROM categories";
	  
$rs=$mysqli->query($sql);
if (!$rs)
  {exit("Error in SQL");}

//Display the file information in a table
echo "<TABLE BORDER='1'>
      <TR>
      <TH> Category ID </TH>
      <TH> Category Name </TH>
      <TH> Description</TH>
      </TR>";
	  
while ($row = $rs->fetch_assoc())
{
  $category_id=$row["category_ID"];
  $catname=$row["catname"];
  $catdesc=$row["catdesc"];
  echo "<TR>";
  echo "<TD>$category_id</TD>";
  echo "<TD>$catname</TD>";
  echo "<TD>$catdesc</TD>";
  echo "</TR>";
}

echo "</TABLE>";
?>

</body>
</html>
