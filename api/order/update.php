<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    // Includes
    include_once '../../connection-config.php';
    include_once '../../models/Post.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate blog post object
    $order = new Order($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    $order->id = $data->id;//set Id to update

    $order->title = $data->userID;
    $order->body = $data->status;

    if($post->update()) {
        echo json_encode(
        array('message' => 'Order updated')
        );
    } else {
        echo json_encode(
        array('message' => 'Order Not updated')
        );
    }


?>