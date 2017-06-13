<?php
// Include MySQL class
require_once('/data_layer/data.inc.php');

class Business {
	//Display a summary of the shooping cart
	public static function writeShoppingCart() {
	if (isset($_SESSION['cart']))
	{
	$cart = $_SESSION['cart'];
	}
	
	if (!isset($cart) || $cart=='') {
		return '<p>You have no items in your shopping cart</p>';
	} else {
		// Parse the cart session variable
		$items = explode(',',$cart);
		$s = (count($items) > 1) ? 's':'';
		return '<p>You have <a href="cart.php?action=display">'.count($items).' item'.$s.' in your shopping cart</a></p>';
	}
    }
	
	
	//Display shopping cart
	public static function showCart() {
	global $db;
	$cart = $_SESSION['cart'];
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		$total = 0;
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		$output[] = '<form action="cart.php?action=update" method="post" id="cart">';
		$output[] = '<table>';
		foreach ($contents as $id=>$qty) {
			$sql = 'SELECT * FROM books WHERE id = '.$id;
			$result = $db->query($sql);
			$row = $result->fetch();
			extract($row);
			$output[] = '<tr>';
			$output[] = '<td><a href="cart.php?action=delete&id='.$id.'" class="r">Remove</a></td>';
			$output[] = '<td>'.$title.' by '.$author.'</td>';
			$output[] = '<td>&pound;'.$price.'</td>';
			$output[] = '<td><input type="text" name="qty'.$id.'" value="'.$qty.'" size="3" maxlength="3" /></td>';
			$output[] = '<td>&pound;'.($price * $qty).'</td>';
			
			$total += $price * $qty;
			
			$output[] = '</tr>';
		}
		$output[] = '</table>';
		$output[] = '<p>Grand total: <strong>&pound;'.$total.'</strong></p>';
		$output[] = '<div><button type="submit">Update cart</button></div>';
		$output[] = '</form>';
	} else {
		$output[] = '<p>You shopping cart is empty.</p>';
	}
	return join('',$output);
}

    //Process shopping actions
	public static function processActions() {
	if (isset($_SESSION['cart']))
	{
		$cart = $_SESSION['cart'];
	}
	
	if (isset($_GET['action']))
	{
		$action = $_GET['action'];
	}

    switch ($action) {
	case 'add':
		if (isset($cart) && $cart!='') {
			$cart .= ','.$_GET['id'];
		} else {
			$cart = $_GET['id'];
		}
		break;
	case 'delete':
		if ($cart) {
			$items = explode(',',$cart);
			$newcart = '';
			foreach ($items as $item) {
				if ($_GET['id'] != $item) {
					if ($newcart != '') {
						$newcart .= ','.$item;
					} else {
						$newcart = $item;
					}
				}
			}
			$cart = $newcart;
		}
		break;
	case 'update':
	if ($cart) {
		$newcart = '';
		foreach ($_POST as $key=>$value) {
			if (stristr($key,'qty')) {
				$id = str_replace('qty','',$key);
				$items = ($newcart != '') ? explode(',',$newcart) : explode(',',$cart);
				$newcart = '';
				foreach ($items as $item) {
					if ($id != $item) {
						if ($newcart != '') {
							$newcart .= ','.$item;
						} else {
							$newcart = $item;
						}
					}
				}
				for ($i=1;$i<=$value;$i++) {
					if ($newcart != '') {
						$newcart .= ','.$id;
					} else {
						$newcart = $id;
					}
				}
			}
		}
	}
	$cart = $newcart;
	break;
}
$_SESSION['cart'] = $cart;
}

    //Disply available books
	public static function displayBooks() {
	global $db;
	$sql = 'SELECT * FROM books ORDER BY id';
	$result = $db->query($sql);
	
	$output[] = '<ul>';
	while ($row = $result->fetch()) {
		$output[] = '<li>"'.$row['title'].'" by '.$row['author'].': &pound;'.$row['price'].'<br /><a href="cart.php?action=add&id='.$row['id'].'">Add to cart</a></li>';
	}
	$output[] = '</ul>';
	echo join('',$output);
}
}



?>
