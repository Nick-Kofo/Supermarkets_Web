<?php
$productId = $_GET['productId'];

//prevent sql injection
$productId= mysqli_real_escape_string($db, $productId);

$query = "SELECT products.name as productName, products.description as productDescription, prices.price as productPrice,
                stores.photo as storePhoto
        FROM products, prices, stores
        WHERE products.id = prices.productId
        AND stores.id = prices.storeId
        AND prices.productId = ".$productId."
        ORDER BY prices.price";
$product_query = $db->query($query);
?>

<div class="row" style="margin-top: 15px;">
    <?php while ($product = mysqli_fetch_assoc($product_query)) : ?>
        <?php
            $productName = $product['productName'];
            $productDescription = $product['productDescription'];
            $productPrice = $product['productPrice'];
            $storePhoto = $product['storePhoto'];
        ?>
        <div class="col s12 m4 l3">
            <div class="card hoverable">
                <div class="card-image">
                    <img width="250px" height="250px" src="<?php echo $storePhoto; ?>">
                </div>
                <div class="card-content">
                    <span class="activator grey-text text-darken-4"><?php echo $productName; ?><i class="material-icons right">more_vert</i></span>
                </div>
                <div class="card-action">
                    <i class="fa fa-eur fa-2x" aria-hidden="true"> <?php echo $productPrice; ?></i>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Περιγραφή<i class="material-icons right">close</i></span>
                    <p><?php echo $productDescription; ?></p>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>
