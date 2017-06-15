<?php
   session_start(); //starting session
	
   // include username and password array and the function
//   require("UserDetails.php");
    
	// if the user has session
	if (isset($_SESSION['flag']) and isset($_SESSION['current_user']))
        {			
		//remove session data for auth
	        $_SESSION['flag'] = false;
		$_SESSION['current_user'] = null;

                echo "Logged out successfully.";

	} 
        else{
            echo "You are not logged in.";
                    
        }
?>
