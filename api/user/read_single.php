<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    // Includes
    include_once '../../connection-config.php';
    include_once '../../models/User.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate User object
    $user = new User($db);

    // Get ID
    $user->id = isset($_GET['id']) ? $_GET['id'] : die();

    // Get Product
    $user->read_single();

    // Create array
    $user_arr = array(
        'id' => $user->id,
        'email' => $user->email,
        'userName' => $user->username,
        'password' => $user->password,
        'creditCard' => $user->creditcard,
        'address' => $user->address,
        'city' => $user->city,
        'postalCode' => $user->postalCode,
        'isBlocked' => $user->isBlocked
    );

    print_r(json_encode($user_arr));

?>