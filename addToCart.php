
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>SuperMarkets Prices</title>
    <!-- Materialize css  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <!-- Font awesome -->
    <link rel="stylesheet" href="font_awesome/css/font-awesome.min.css">
</head>
<body>
	<?php
    include 'core/init.php';
    include 'templates/header.php';

    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }

		$productId = $_GET['id'];
		//empty array for every new session
		if(!ISSET($_SESSION['cart_items'])) {
			$_SESSION['cart_items'] = array();
		}
		//put product to array
		array_push($_SESSION['cart_items'], $productId);

		include 'templates/shoppingCart.php';
		include 'templates/footer.php';
	?>

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
</body>
</html>
