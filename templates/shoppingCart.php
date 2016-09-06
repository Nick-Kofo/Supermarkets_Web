<?php
//xorizei to array me comma
if(!empty($_SESSION['cart_items'])){

	//quantities
	$quantities = array_count_values($_SESSION['cart_items']);

	$cartIds = implode(',', $_SESSION['cart_items']);

	//all cart items
	$query = "SELECT products.name as productName, products.description as productDescription,
	products.photo as productPhoto, prices.price as productPrice
	FROM products inner join prices
	ON products.id = prices.productId
	WHERE prices.id IN ($cartIds)";

	//quantities

	$cart_items_query = $db->query($query);
	}else{
		$cartIds = '';
	}

	// //total cart price
	$query2 = "SELECT SUM(price) as totalCartPrice FROM prices WHERE id IN ($cartIds)";
	$total_cart_price_query = $db->query($query2);

?>

<?php if ($cartIds == ''): ?>
	<div class="card-panel green accent-3 align center">
		<h5>Shopping cart is empty.</h5>
		<h5>Total Cart Price: </h5><i class="fa fa-eur fa-2x" aria-hidden="true"><?php echo "0"; ?></i>
	</div>

<?php else: ?>
	<div class="card-panel green accent-3 align center">
		<h5>Your shopping cart.</h5>
	</div>
	<div class="row" style="margin-top: 15px;">
		<?php while ($product = mysqli_fetch_assoc($cart_items_query)) : ?>
			<?php
				$productName = $product['productName'];
				$productDescription = $product['productDescription'];
				$minProductPrice = $product['productPrice'];
				$productPhoto = $product['productPhoto'];
			?>
			<div class="col s12 m4 l3">
				<div class="card hoverable">
					<div class="card-image">
						<img class="responsive-img" src="<?php echo $productPhoto; ?>">
					</div>
					<div class="card-content">
						<span class="activator grey-text text-darken-4"><?php echo $productName; ?><i class="material-icons right">more_vert</i></span>
					</div>
					<div class="card-action">
						<i class="fa fa-eur fa-2x" aria-hidden="true"> <?php echo $minProductPrice; ?></i>
					</div>
					<div class="card-reveal">
						<span class="card-title grey-text text-darken-4">Περιγραφή<i class="material-icons right">close</i></span>
						<p><?php echo $productDescription; ?></p>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
	<?php
		$total = mysqli_fetch_assoc($total_cart_price_query);
		$totalCartPrice = $total['totalCartPrice'];
	?>
	<div class="card-panel green accent-3 align center">
		<h5>Total Cart Price: </h5><i class="fa fa-eur fa-2x" aria-hidden="true"><?php echo $totalCartPrice; ?></i>
	</div>
<?php endif; ?>
