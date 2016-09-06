<?php
    require_once '../core/init.php';

    header('Content-Type: application/json');

    $barcode = $_GET['barcode'];

    //prevent sql injection
    $barcode = mysqli_real_escape_string($db, $barcode);

    $query = "SELECT id FROM products WHERE barcode = '$barcode'";
    $barcode_query = $db->query($query);
    $barcodes_json = array();
    while ($r = mysqli_fetch_assoc($barcode_query)) {
        $barcodes_json[] = $r;
    }

    echo json_encode(array('barcodes' => $barcodes_json));
?>
