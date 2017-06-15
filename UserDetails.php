<?php
   function checkUserCredentals($inputUsername, $inputPassword)
   {
   /*
   This function takes input username and password as parameters and 
   returns TRUE if the user is authenticated, FALSE if the user is not authenticated
   */
	   
	// create connection
	$mysqli = new mysqli("localhost", "halpea01", "12111990", "halpea01mysql1");
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	  // query the users table for name and surname 
	  $sql = "SELECT Username, Password, Enabled FROM customers Where Username='".$inputUsername."' AND Password='".$inputPassword."'";

	 //Execute query
	$rs=$mysqli->query($sql);
	if (!$rs)
	  {exit("Error in SQL");}

        //Select the result
        while ($row = $rs->fetch_assoc())
        {
          $enabled=$row["Enabled"];
        }

	//Count the record number
	$counter = $rs->num_rows;
      
	  if ($counter>0 and $enabled == 1)
	  {
		  //authentication succeeded
              echo "Logged in successfully";
		  return (true);
	  }
	  else
	  {
		  //authentication failed
              if($counter<=0){
                  echo "Account does not exist or password is incorrect.";
              }
              else if($enabled!=1){
                  echo "This account has been disabled.";
              }
		  return (false);	
	  }
   }
   
?>


