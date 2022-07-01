<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    // Includes
    include_once '../../connection-config.php';
    include_once '../../models/Favorite.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate Favorite object
    $fave = new Favorite($db);

    // Favorite query
    $result = $fave->read();
    $num = $result->rowCount();

    if($num > 0){
        $fave_arr = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $fave_item = array(
                'id' => $id,
                'listID' => $listID,
                'userID' => $userID,
                'username' => $username,
                'productID' => $productID,
                'productName' => $productName,
                'dateAdded' => $dateAdded
            );

            array_push($fave_arr, $fave_item);
        }
        echo json_encode($fave_arr);
    } else {
        echo json_encode(array('message'=> 'nothing found'));
    }
?>