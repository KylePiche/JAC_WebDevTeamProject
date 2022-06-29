<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    // Includes
    include_once '../../connection-config.php';
    include_once '../../models/Product.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate Product object
    $prod = new Product($db);

    // Get raw data
    $data = json_decode(file_get_contents("php://input"));

    // Set ID
    $prod->id = $data->id;

    // Delete Product
    if($prod->delete()) {
        echo json_encode(array('message' => 'Product Deleted'));
    } else {
        echo json_encode(array('message' => 'Product Not Deleted'));
    }
?>