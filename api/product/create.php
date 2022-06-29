<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
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

    $prod->name = $data->name;
    $prod->desc = $data->desc;
    $prod->type = $data->type;
    $prod->price = $data->price;
    $prod->cpu_desc = $data->cpu_desc;
    $prod->gpu_desc = $data->gpu_desc;
    $prod->memory_desc = $data->memory_desc;
    $prod->storage_desc = $data->storage_desc;
    $prod->screen_desc = $data->screen_desc;

    // Create Product
    if($prod->create()) {
        echo json_encode(array('message' => 'Product Created'));
    } else {
        echo json_encode(array('message' => 'Product Not Created'));
    }
?>