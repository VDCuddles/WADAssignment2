<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>page1Action.php</title>

        <LINK REL="STYLESHEET" TYPE="text/css" HREF="WAStyleSheet/Practical.css">
</head>

<body>

<?php 

// create connection
$mysqli = new mysqli("localhost", "halpea01", "12111990", "halpea01mysql1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

  ?>
    
<form name="page2Form" METHOD="POST" action="index.php?content_page=page2Action">
    
<?php 

// create SQL statement 
$sql = "SELECT * FROM customers"; 

//Execute the SQL statement
$rs=$mysqli->query($sql);
if (!$rs)
  {exit("Error in SQL");}

//Output the result in an HTML table
//Table head
echo "<table border='2'><tr>";
echo "<th>Customer ID</th>";
echo "<th>Username</th>";
echo "<th>Password</th>";
echo "<th>Contact Name</th>";
echo "<th>Email Address</th>";
echo "<th>Address</th>";
echo "<th>City</th>";
echo "<th>Country</th>";
echo "<th>Phone</th>";
echo "<th>Enabled</th>";
echo "<th>Choice</th></tr>";

//Table body
while ($row = $rs->fetch_assoc())
{
  $id=$row["CustomerID"];
  $username=$row["Username"];
  $pass=$row["Password"];
  $conname=$row["ContactName"];
  $emailaddy=$row["Emailaddress"];
  $addy=$row["Address"];
  $city=$row["City"];
  $country=$row["Country"];
  $phone=$row["Phone"];
  $enabled=$row["Enabled"];
  echo "<tr><td>$id</td>";
  echo "<td>$username</td>";
  echo "<td>$pass</td>";
  echo "<td>$conname</td>";
  echo "<td>$emailaddy</td>";
  echo "<td>$addy</td>";
  echo "<td>$city</td>";
  echo "<td>$country</td>";
  echo "<td>$phone</td>";
  echo "<td>$enabled</td>";
  echo "<td><input type='radio' name='choice' checked='true' value=$id></td></tr>";
}

echo "</table>";

// free resources and close connection 
$mysqli->close();    
?> 
<input type="submit" value="Edit" style="color: black"><br/>
</form>
</body>
</html>
