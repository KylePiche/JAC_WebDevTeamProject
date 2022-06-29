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

    // Product query
    $result = $prod->read();
    $num = $result->rowCount();

    if($num > 0){
        $prod_arr = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $prod_item = array(
                'id' => $id,
                'name' => $name,
                'desc' => $desc,
                'type' => $type,
                'price' => $price,
                'cpu_desc' => $cpu_desc,
                'cpu_speed' => $cpu_speed,
                'cpu_cores' => $cpu_cores,
                'gpu_desc' => $gpu_desc,
                'gpu_memory' => $gpu_memory,
                'memory_desc' => $memory_desc,
                'ram' => $ram,
                'storage_desc' => $storage_desc,
                'storage_capacity' => $storage_capacity,
                'screen_desc' => $screen_desc,
                'screen_size' => $screen_size
            );

            array_push($prod_arr, $prod_item);
        }
        echo json_encode($prod_arr);
    } else {
        echo json_encode(array('message'=> 'nothing found'));
    }
?>