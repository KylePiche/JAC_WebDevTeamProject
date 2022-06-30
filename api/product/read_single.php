<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    // Includes
    include_once '../../connection-config.php';
    include_once '../../models/Product.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate Product object
    $prod = new Product($db);

    // Get ID
    $prod->id = isset($_GET['id']) ? $_GET['id'] : die();

    // Get Product
    $prod->read_single();

    // Create array
    $prod_arr = array(
        'id' => $prod->id,
        'name' => $prod->name,
        'desc' => $prod->desc,
        'type' => $prod->type,
        'price' => $prod->price,
        'imageUrl' => $prod->imageUrl,
        'cpu_desc' => $prod->cpu_desc,
        'cpu_speed' => $prod->cpu_speed,
        'cpu_cores' => $prod->cpu_cores,
        'gpu_desc' => $prod->gpu_desc,
        'gpu_memory' => $prod->gpu_memory,
        'memory_desc' => $prod->memory_desc,
        'ram' => $prod->ram,
        'storage_desc' => $prod->storage_desc,
        'storage_capacity' => $prod->storage_capacity,
        'screen_desc' => $prod->screen_desc,
        'screen_size' => $prod->screen_size
    );

    print_r(json_encode($prod_arr));

?>