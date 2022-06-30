<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
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

    // Set properties
    $prod->id = $data->id;
    $prod->name = $data->name;
    $prod->desc = $data->desc;
    $prod->type = $data->type;
    $prod->price = $data->price;
    $prod->imageUrl = $data->imageUrl;
    $prod->cpu_desc = $data->cpu_desc;
    $prod->cpu_speed = $data->cpu_speed;
    $prod->cpu_cores = $data->cpu_cores;
    $prod->gpu_desc = $data->gpu_desc;
    $prod->gpu_memory = $data->gpu_memory;
    $prod->memory_desc = $data->memory_desc;
    $prod->ram = $data->ram;
    $prod->storage_desc = $data->storage_desc;
    $prod->storage_capacity = $data->storage_capacity;
    $prod->screen_desc = $data->screen_desc;
    $prod->screen_size = $data->screen_size;

    // Update Product
    if($prod->update()) {
        echo json_encode(array('message' => 'Product Updated'));
    } else {
        echo json_encode(array('message' => 'Product Not Updated'));
    }
?>