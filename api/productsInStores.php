<?php
    require_once '../core/init.php';

    header('Content-Type: application/json');

    $productId = $_GET['productId'];

    //prevent sql injection
    $productId = mysqli_real_escape_string($db, $productId);

    $query = "SELECT products.name as name, products.description as description, prices.price as priceInStore,
                    stores.photo as storePhoto, latitude as storeLatitude, longitude as storeLongitude
            FROM products, prices, stores
            WHERE products.id = prices.productId
            AND stores.id = prices.storeId
            AND prices.productId = ".$productId."
            ORDER BY prices.price";
    $productsInStore_query = $db->query($query);
    $productsInStores_json = array();
    while ($r = mysqli_fetch_assoc($productsInStore_query)) {
        $productsInStores_json[] = $r;
    }

    echo json_encode(array('productsInStores' => $productsInStores_json));
?>
