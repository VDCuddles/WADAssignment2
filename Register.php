<?php
ob_start(); //set buffer on
session_start(); //starting session

// Include functions
require_once('business_layer/business.inc.php');

// Process actions for this page
Business::processActions();
?>
<!DOCTYPE>
	
<html>
<head>
	<title>Shopping Cart&#0183; Bags</title>
	<link rel="stylesheet" href="css/shopping-styles.css" />
</head>

<body>
    
<div id="shoppingcart">

<h2>Your Shopping Cart</h2>

<?php
echo Business::writeShoppingCart();
?>

</div>

<div id="booklist">

<h2>Bags For Sale</h2>

<?php
echo Business::displayBooks();
?>

</div>
</body>
</html>