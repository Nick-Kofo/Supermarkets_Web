<?php
    require_once '../core/init.php';

    header('Content-Type: application/json');

    $subCategoryParent = $_GET['subCategoryParent'];
    $subCategoryLevel = $_GET['subCategoryLevel'];

    //prevent sql injection
    $subCategoryParent = mysqli_real_escape_string($db, $subCategoryParent);
    $subCategoryLevel = mysqli_real_escape_string($db, $subCategoryLevel);

    $query = "SELECT prices.productId as id, products.name as name, products.description as description, MIN(prices.price) as minPrice,
                    products.photo as photo
            FROM products inner join prices
            ON products.id = prices.productId
            WHERE products.categoryParent = ".$subCategoryParent."
            AND products.categoryLevel = ".$subCategoryLevel."
            GROUP BY prices.productId";
    $products_query = $db->query($query);
    $products_json = array();
    while ($r = mysqli_fetch_assoc($products_query)) {
        $products_json[] = $r;
    }

    echo json_encode(array('products' => $products_json));
?>
