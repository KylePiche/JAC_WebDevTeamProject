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

    // User query
    $result = $user->read();
    $num = $result->rowCount();

    if($num > 0){
        $user_arr = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $user_item = array(
                'id' => $id,
                'email' => $email,
                'username' => $username,
                'password' => $password,
                'creditcard' => $creditcard,
                'address' => $address,
                'city' => $city,
                'postalCode' => $postalCode,
                'isBlocked' => $isBlocked
            );

            array_push($user_arr, $user_item);
        }
        echo json_encode($user_arr);
    } else {
        echo json_encode(array('message'=> 'nothing found'));
    }

?>