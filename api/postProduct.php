<?php
require_once '../core/init.php';
header('Content-type : bitmap; charset=utf-8');

if(isset($_POST['encoded_string'])) {
	$encoded_string = $_POST['encoded_string'];
	$productName = $_POST['productName'];
	$productDescription = $_POST['productDescription'];
	$barcode = $_POST['barcode'];
	$categoryParent = $_POST['categoryParent'];
	$categoryLevel = $_POST['categoryLevel'];
	$storeId = $_POST['storeId'];
	$productPrice = $_POST['productPrice'];

	$decoded_string = base64_decode($encoded_string);

	$path = '../images/Products/'.$productName;

	$file = fopen($path, 'wb');

	$is_written = fwrite($file, $decoded_string);
	fclose($file);

	$pathToDb = '/supermarkets_prices_comparison/images/Products/'.$productName;

	if($is_written > 0) {
		$query = "INSERT INTO products(name, photo, description, barcode, categoryParent, categoryLevel)
					values ('$productName', '$pathToDb', '$productDescription', '$barcode', '$categoryParent', '$categoryLevel')";

		$post_query = $db->query($query);	

		if($post_query) {
			$query2 = "SELECT id
			FROM products
			WHERE barcode = '$barcode'";

			$price_query = $db->query($query2);

			$row = mysqli_fetch_assoc($price_query);

			$productId = $row['id'];

			$query3 = "INSERT INTO prices (price, productId, storeId)
						values ($productPrice, $productId, $storeId)";

			$price_query = $db->query($query3);
			
			if($price_query){
				echo 'post product success';
			}else{
				echo 'post product failed at price query';
			}			

		}else {
			echo 'post failed at product query';
		}

	}	
}

?>