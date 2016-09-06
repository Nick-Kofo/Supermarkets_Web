<?php
session_start();

$productId = $_GET['id'];

//empty array for every new session
if(!ISSET($_SESSION['cart_items'])) {
	$_SESSION['cart_items'] = array();
}
//put product to array
array_push($_SESSION['cart_items'], $productId);

?>
