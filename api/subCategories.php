<?php
    require_once '../core/init.php';

    header('Content-Type: application/json');
    $categoryId = $_GET['categoryId'];

    //prevent sql injection
    $categoryId = mysqli_real_escape_string($db, $categoryId);

    $query = "SELECT name as name, photo as photo, parent as parent, level as level
            FROM categories
            WHERE parent = ".$categoryId;
    $subCategory_query = $db->query($query);
    $subCategories_json = array();
    while ($r = mysqli_fetch_assoc($subCategory_query)) {
        $subCategories_json[] = $r;
    }

    echo json_encode(array('subCategories' => $subCategories_json));
?>
