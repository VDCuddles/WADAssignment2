<!DOCTYPE>
<html>
<head>
<title>page2Action.php</title>

        <LINK REL="STYLESHEET" TYPE="text/css" HREF="WAStyleSheet/Practical.css">
</head>

<body>

<?php 
// create connection
$mysqli = new mysqli("localhost", "halpea01", "12111990", "halpea01mysql1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

// create SQL statement 
$sql = "SELECT * FROM Customers
        WHERE CustomerID=$_POST[choice]"; 

//Execute the SQL statement
$rs=$mysqli->query($sql);
if (!$rs)
  {exit("Error in SQL");}

//Select the result
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
}

// free resources and close connection 
$mysqli->close();    
?> 
<FORM NAME="page3Form" METHOD="POST" ACTION="index.php?content_page=page3Action">
<INPUT TYPE="HIDDEN" NAME="CustomerID" VALUE="<?php echo $id; ?>">
<pre style="width: 30%">
 Customer ID:<INPUT TYPE="TEXT" NAME="CustomerID" VALUE="<?php echo $id; ?>"><BR>
 Username:<INPUT TYPE="TEXT" NAME="Username" VALUE="<?php echo $username; ?>"><BR>
 Password:<INPUT TYPE="TEXT" NAME="Password" VALUE="<?php echo $pass; ?>"><BR>
 Contact Name:<INPUT TYPE="TEXT" NAME="ContactName" VALUE="<?php echo $conname; ?>"><BR>
 Email Address:<INPUT TYPE="email" NAME="Emailaddress" VALUE="<?php echo $emailaddy; ?>"><BR>
 Address:<INPUT TYPE="TEXT" NAME="Address" VALUE="<?php echo $addy; ?>"><BR>
 City:<INPUT TYPE="TEXT" NAME="City" VALUE="<?php echo $city; ?>"><BR>
 Country:<INPUT TYPE="TEXT" NAME="Country" VALUE="<?php echo $country; ?>"><BR>
 Phone:<INPUT TYPE="number" NAME="Phone" VALUE="<?php echo $phone; ?>"><BR>
 Enabled:<INPUT TYPE="TEXT" NAME="Enabled" VALUE="<?php echo $enabled; ?>"><BR>
</pre>
<INPUT TYPE="SUBMIT"><BR> 
</FORM> 
</body>
</html>
