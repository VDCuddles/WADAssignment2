<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>page1Action.php</title>
		<!-- File Heading	
         Name:			page1Action.php
         Purpose:		
         Author:		Xiaosong Li									
         History:		Created on 10/10/2006
                        Modified on 26/5/2010
                        Modified on 19/5/2013
                        Modified on 13/10/2013
                        Modified on 18/5/2014
                        Modified on 12/10/2014
                        Modified on 17/10/2015
                        Modified on 21/5/2017
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

  ?>
    
<form name="page2Form" METHOD="POST" action="index.php?content_page=orders2">
    
<?php 

// create SQL statement 
$sql = "SELECT * FROM orders"; 

//Execute the SQL statement
$rs=$mysqli->query($sql);
if (!$rs)
  {exit("Error in SQL");}
  
  if (isset($_SESSION['flag']) and isset($_SESSION['current_user']) and ($_SESSION['current_user'] == 'admin')){

        //Output the result in an HTML table
        //Table head
        echo "<table border='2'><tr>";
        echo "<th>Customer ID</th>";
        echo "<th>Username</th>";
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
          $id=$row["OrderID"];
          $cid=$row["CustomerID"];
          $conname=$row["ShipName"];
          $emailaddy=$row["email"];
          $addy=$row["ShipAddress"];
          $city=$row["ShipCity"];
          $country=$row["ShipCountry"];
          $phone=$row["phone"];
          $active=$row["Active"];
          echo "<tr><td>$id</td>";
          echo "<td>$cid</td>";
          echo "<td>$conname</td>";
          echo "<td>$emailaddy</td>";
          echo "<td>$addy</td>";
          echo "<td>$city</td>";
          echo "<td>$country</td>";
          echo "<td>$phone</td>";
          echo "<td>$active</td>";
          echo "<td><input type='radio' name='choice' checked='true' value=$id></td></tr>";
        }
  }
  else{
      echo "Sorry, this information is not available to the public yet.";      
  }
echo "</table>";

// free resources and close connection 
$mysqli->close();    
?> 
<input type="submit" value="Edit" style="color: black">
<br/>
</form>
</body>
</html>
