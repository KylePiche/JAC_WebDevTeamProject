<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Syntax Shop - Shopping</title>

  <!--cdn bootstrap 5.1.x-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!--cdn bootstrap icon-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

  <link rel="stylesheet" href="./assets/css/style.css">

</head>

<body>
  <?php require 'header.php'; ?>
  <div class="bg-light py-3 breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0">Home<span class="mx-2 mb-0">/</span> <strong class="text-black">Products</strong></div>
      </div>
    </div>
  </div>

  <!--Products-->
  <section id="section-project" class="bg-light py-3 ">
    <div class="container ">
      <div class="row">
        <div class="col-lg-6 text-lg-right">
          <div class="dropdown product">
            <div class="col-lg-6">
              <h2 class="font-weight-normal py-2">PRODUCTS</h2>
            </div>
            <div>
              <span> FILTER </span><button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"> REFERENCE
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Relevance</a></li>
                <li><a class="dropdown-item" href="#">Name, A to Z</a></li>
                <li><a class="dropdown-item" href="#">Name, Z to A</a></li>
                <div class="dropdown-divider"></div>
                <li><a class="dropdown-item" href="#">Price, low to high</a></li>
                <li><a class="dropdown-item" href="#">Price, high to low</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <hr class="mb-3 text-dark br-dark" />
      <div class="row">

        <?php
        include_once("connection-config.php");
        $result = mysqli_query($mysqli, "SELECT * FROM products order by id ");
        
        while ($row = mysqli_fetch_array($result)) {
         
          $cpuid = $row['CPUid'];
          $gpuid = $row['GPUid'];
          $memoryid = $row['memoryID'];
          $storageid = $row['storageID'];
          $screenid = $row['screenID'];

          $cpu = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM `spec_cpu` WHERE id = $cpuid"));
          $gpu = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM `spec_GPU` WHERE id = $gpuid"));
          $memory = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM `spec_memory` WHERE id = $memoryid"));
          $storage = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM `spec_storage` WHERE id = $storageid"));
          $screen = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM `spec_screen` WHERE id = $screenid"));                         
        ?>

          <div class="col-lg-3 col-md-6 mb-3">
            <div class="card">
              <div class="card-head">
                <img src="<?php echo $row['imageUrl'] ?>" class="img-fluid card-img-top" alt="<?php echo $row['name'] ?>" />
                <div class="card-hover">
                  <p><?php echo $cpu['desc'] ?></p>
                  <p><?php echo $gpu['desc'] ?></p>
                  <p><?php echo $memory['desc'] ?></p>
                  <p><?php echo $storage['desc'] ?></p>
                  <p><?php echo $screen['desc'] ?></p>
                  <p>"Windows 11</p>
                </div>
              </div>
              <div class="card-body text-center">
                <h5 class="card-title text-uppercase"><?php echo $row['name'] ?></h5>
                <p>$<?php echo $row['price'] ?></p>
                <a href="detail.php?id=<?php echo $row['id'] ?>" class="btn btn-sm card-btn">More Info &amp; Buy </a>
              </div>
            </div>    

          </div>

          <?php }
          ?>


      </div>
  </section>

  <!--Footer-->
  <?php require 'footer.php';?>



  <!--cdn bootstrap 5.1.x-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>