<?php
    require_once '../core/init.php';

    header('Content-Type: application/json');

    $query = "SELECT id as id, name as name, photo as photo
            FROM categories
            WHERE parent = 0";
    $category_query = $db->query($query);
    $categories_json = array();
    while ($r = mysqli_fetch_assoc($category_query)) {
        $categories_json[] = $r;
    }

    echo json_encode(array('categories' => $categories_json));
?>
