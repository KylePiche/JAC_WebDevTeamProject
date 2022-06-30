<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    // Includes
    include_once '../../connection-config.php';
    include_once '../../models/Post.php';


    //connect
    $database = new Database();
    $db = $database->connect();

    //instantiate  post object
    $order = new Order($db);

    //post query
    $result = $order->read();
    //get howmany 
    $num = $result->rowCount();

    //check if there is any

    if($num > 0){

        $order_arr = array();
            //fetch as associate to it
        while($row  = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $order_item =array(
                'id' => $id,
                'userID' => $userID,
                'productID' => $productID,
                'quantity' => $quantity,
                'status' => $status

            );

            array_push($order_arr, $order_item);

        }
        echo json_encode($order_arr);
    }else{
        echo json_encode(array('message'=> 'nothing found'));
    }



?>