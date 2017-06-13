<?php
require("CheckLogin.php");
?>
<!DOCTYPE>
<html>
<head>
		<title>Modify Records</title>
		<!-- File Heading	
         Name:			ModifyRecords.php
         Purpose:		The start page of modifing records 
         Author:		Xiaosong Li									
         History:		Modified on 14/10/2010
                        Modified on 19/5/2013
                        Modified on 18/5/2014
                        Modified on 17/10/2015
                        Modified on 21/5/2017
         -->
         <link rel="stylesheet" type="text/css" href="WAStyleSheet/Practical.css"/> 
			
	<script type="text/javascript">
				
		function strValidateName(strStudentName)
		{
		/*
		 Procedure Heading	
         Name:			strValidateName
         Purpose:		Validate the input name
         parameter:     strStudentName
         Author:		Xiaosong Li									
         History:		Created on 26/2/2005
		 		        Modified on 20/2/2012
						Modified on 19/5/2013
		 */
         
   	  	var iLen, cFirst, bFirst;
		iLen = strStudentName.length;
		cFirst = strStudentName.substring(0,1);
		
		//Check the first letter and make sure that it is a letter and a capital letter
		if ((cFirst.toLowerCase() != cFirst.toUpperCase()) && (cFirst == cFirst.toUpperCase()))        
		{
		  	bFirst = true;
		}
		
		if (((5 <= iLen) && (20 > iLen)) && bFirst )
		{
			return(true);
		}
		else
		{
		    return(false);
		} 
		}
		
   		function testStudentName()
		{
			var test = strValidateName(txtStudentName.value);
		/*
   		 Procedure Heading	
         Name:			txtStudentName_OnChange
         Purpose:		Handle the input user name
         parameter:    No
         Author:		Xiaosong Li									
         History:		Created on 19/5/2013
		 */

   	  	if (strValidateName(txtStudentName.value)) 
			//The input name is valid
			window.location="index.php?content_page=page1Action&StudentName=" + txtStudentName.value;
		else
			alert("This name is invalid");	
		}
   		
	</script>
</head>
<body>
		Student Name: <input name="txtStudentName" size="20" id="txtStudentName"/> <br />
        <input type="button" value="Submit Input" onclick="testStudentName();"  />
</body>
</html>
