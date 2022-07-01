<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    // Includes
    include_once '../../connection-config.php';
    include_once '../../models/Favorite.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate Favorite object
    $fave = new Favorite($db);

    // Get ID
    $fave->id = isset($_GET['id']) ? $_GET['id'] : die();

    // Get Favorite
    $fave->read_single();

    // Create array
    $fave_arr = array(
        'id' => $fave->id,
        'listID' => $fave->listID,
        'userID' => $fave->userID,
        'username' => $fave->username,
        'productID' => $fave->productID,
        'productName' => $fave->productName,
        'dateAdded' => $fave->dateAdded
    );

    print_r(json_encode($fave_arr));

?>