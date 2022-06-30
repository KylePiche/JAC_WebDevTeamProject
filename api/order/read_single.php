<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    // Includes
    include_once '../../connection-config.php';
    include_once '../../models/Post.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate blog post object
    $order = new Order($db);

    // Get ID
    $order->id = isset($_GET['id']) ? $_GET['id'] : die();

    // Get post
    $order->read_single();

    // Create array
    $order_arr = array(
        'id' => $post->id,
        'userID' => $post->userID,
        'productID' => $post->productID,
        'quantity' => $post->quantity,
        'status' => $post->status
    );

    // Make JSON
    print_r(json_encode($order_arr));

?>