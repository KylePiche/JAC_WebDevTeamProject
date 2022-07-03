<?php
include_once 'connection-config.php';
session_start();
// if (!isset($_GET['id'])) {
//     header('Location: products.php');
// }
$sql = "SELECT * FROM products WHERE id = {$_GET['id']}";
// var_dump($sql);

$sqlResult = mysqli_query($mysqli, $sql);
// var_dump($sqlResult);
$row = $sqlResult->fetch_assoc();
var_dump($row);
if ($row == NULL) {
    header('Location: products.php');
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
            <h1><?php echo $row['name'] ?></h1>
        </div>
        <div class="row">
            <div class="col"><img src="<?php echo $row['imageUrl'] ?>" alt="Image of <?php echo $row['name'] ?>"></div>
            <div class="col">
                <p><?php echo $row['desc'] ?></p>
            </div>

        </div>

    </div>

</body>

</html>