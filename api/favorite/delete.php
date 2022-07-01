<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
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

    // Set ID
    $fave->id = $data->id;

    // Delete Favorite
    if($fave->delete()) {
        echo json_encode(array('message' => 'Favorite Deleted'));
    } else {
        echo json_encode(array('message' => 'Favorite Not Deleted'));
    }

?>