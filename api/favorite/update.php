<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
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

    // Set properties
    $fave->id = $data->id;
    $fave->listID = $data->listID;
    $fave->userID = $data->userID;
    $fave->username = $data->username;
    $fave->productID = $data->productID;
    $fave->productName = $data->productName;
    $fave->dateAdded = $data->dateAdded;

    // Update Favorite
    if($fave->update()) {
        echo json_encode(array('message' => 'Favorite Updated'));
    } else {
        echo json_encode(array('message' => 'Favorite Not Updated'));
    }

?>