<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    // Includes
    include_once '../../connection-config.php';
    include_once '../../models/Favorite.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate Favorite object
    $fave = new Favorite($db);

    // Get raw data
    $data = json_decode(file_get_contents("php://input"));

    $fave->listID = $data->listID;
    $fave->userID = $data->userID;
    $fave->username = $data->username;
    $fave->productID = $data->productID;
    $fave->productName = $data->productName;
    $fave->dateAdded = $data->dateAdded;

    // Create Favorite
    if($fave->create()) {
        echo json_encode(array('message' => 'Favorite Created'));
    } else {
        echo json_encode(array('message' => 'Favorite Not Created'));
    }

?>