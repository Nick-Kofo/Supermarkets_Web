<?php
    require_once '../core/init.php';

    header('Content-Type: application/json');

    $query = "SELECT id, longitude, latitude, photo as storePhoto 
            FROM stores";
    $stores_query = $db->query($query);
    $stores_json = array();
    while ($r = mysqli_fetch_assoc($stores_query)) {
        $stores_json[] = $r;
    }

    echo json_encode(array('stores' => $stores_json));
?>
