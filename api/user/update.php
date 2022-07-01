<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    // Includes
    include_once '../../connection-config.php';
    include_once '../../models/User.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate User object
    $user = new User($db);

    // Get raw data
    $data = json_decode(file_get_contents("php://input"));

    // Set properties
    $user->id = $data->id;
    $user->email = $data->email;
    $user->username = $data->username;
    $user->password = $data->password;
    $user->creditcard = $data->creditcard;
    $user->address = $data->address;
    $user->city = $data->city;
    $user->postalCode = $data->postalCode;
    $user->isBlocked = $data->isBlocked;

    // Update User
    if($user->update()) {
        echo json_encode(array('message' => 'User Updated'));
    } else {
        echo json_encode(array('message' => 'User Not Updated'));
    }

?>