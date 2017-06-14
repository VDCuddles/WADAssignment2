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
	<title>PHP Shopping Cart Demo &#0183; Bookshop</title>
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

<h2>Books In Our Store</h2>

<?php
echo Business::displayBooks();
?>

</div>
</body>
</html>