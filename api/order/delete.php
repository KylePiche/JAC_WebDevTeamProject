<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    // Includes
    include_once '../../connection-config.php';
    include_once '../../models/Order.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate blog post object
    $order = new Order($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    $order->id = $data->id;//set Id to delete

    if($order->delete()) {
        echo json_encode(
        array('message' => 'Order deleted')
        );
    } else {
        echo json_encode(
        array('message' => 'Order Not deleted')
        );
    }


?>