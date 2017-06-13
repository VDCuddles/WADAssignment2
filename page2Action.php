<!DOCTYPE>
<html>
<head>
<title>page2Action.php</title>
		<!-- File Heading	
         Name:			page2Action.php
         Purpose:		
         Author:		Xiaosong Li									
         History:		Created on 20/10/2006
		 				Modified on 21/05/2007
						Modified on 29/05/2008 by XL
                        Modified on 26/05/2011 by XL
                        Modified on 20/05/2012 by XL
                        Modified on 19/05/2013 by XL
                        Modified on 13/10/2013 by XL
                        Modified on 18/5/2014 by XL
                        Modified on 12/10/2014 by XL
                        Modified on 17/10/2015 by XL
                        Modified on 21/5/2017 by XL
        -->
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
$sql = "SELECT * FROM Suppliers
        WHERE SupplierID=$_POST[choice]"; 

//Execute the SQL statement
$rs=$mysqli->query($sql);
if (!$rs)
  {exit("Error in SQL");}

//Select the result
while ($row = $rs->fetch_assoc())
{
  $id=$row["SupplierID"];
  $compname=$row["CompanyName"];
  $conname=$row["ContactName"];
}

// free resources and close connection 
$mysqli->close();    
?> 
<FORM NAME="page3Form" METHOD="POST" ACTION="index.php?content_page=page3Action">
<INPUT TYPE="HIDDEN" NAME="SupplierID" VALUE="<?php echo $id; ?>">
<pre>
 Company Name:<INPUT TYPE="TEXT" NAME="CompanyName" VALUE="<?php echo $compname; ?>"><BR>
 Contact Name:<INPUT TYPE="TEXT" NAME="ContactName" VALUE="<?php echo $conname; ?>"><BR>
</pre>
<INPUT TYPE="SUBMIT"><BR> 
</FORM> 
</body>
</html>
