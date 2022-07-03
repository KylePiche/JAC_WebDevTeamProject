<?php
include_once 'connection-config.php';
session_start();
// if (!isset($_GET['id'])) {
//     header('Location: products.php');
// }
$sql = "SELECT 
p.id AS product_id, p.name AS product_name, p.desc AS product_desc, p.price AS product_price, p.imageUrl AS product_image, p.type AS product_type,
c.id AS cpu_id, c.desc as cpu_name, c.clockSpeed AS cpu_clock_speed, c.coreCount AS cpu_core_count,
g.id AS gpu_id, g.desc as gpu_name, g.memory AS gpu_memory,
m.id AS memory_id, m.desc as memory_name, m.memory AS memory_memory,
sc.id AS screen_id, sc.desc as screen_name, sc.size AS screen_size,
st.id AS storage_id, st.desc as storage_name, st.capacity AS storage_capacity
FROM products p
LEFT JOIN spec_cpu c on p.CPUid = c.id
LEFT JOIN spec_gpu g on p.GPUid = g.id
LEFT JOIN spec_memory m on p.memoryID = m.id
LEFT JOIN spec_screen sc on p.screenID = sc.id
LEFT JOIN spec_storage st on p.storageID = st.id


WHERE p.id = {$_GET['id']}";
var_dump($sql);

$sqlResult = mysqli_query($mysqli, $sql);
var_dump($sqlResult);
$row = $sqlResult->fetch_assoc();
var_dump($row);
if ($row == NULL) {
    // header('Location: products.php');
}
$count = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <!--cdn bootstrap 5.1.x-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--cdn bootstrap icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <?php require 'header.php'; ?>
    <div class="container">

        <div class="title">
            <h1><?php echo $row['product_name'] ?></h1>
        </div>
        <div class="row">
            <div class="col"><img src="<?php echo $row['product_image'] ?>" alt="Image of <?php echo $row['product_name'] ?>"></div>
            <div class="col">
                <p><?php echo $row['product_desc'] ?></p>
            </div>

        </div>
        <div class="row mt-5">
            <h3>Specs:</h3><br>
            <h4>CPU:</h4>
            <ul>
                <li>Name: <?= $row['cpu_name']?></li>
                <li>Clock Speed: <?= $row['cpu_clock_speed']?> GHz</li>
                <li>Core count: <?= $row['cpu_core_count']?> <?php if($row['cpu_core_count']<2){echo "Core";}else{echo "Cores";}?></li>
            </ul>
        </div>
    </div>

</body>

</html>