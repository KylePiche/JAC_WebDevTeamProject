<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Syntax Shop - Admin Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/adminstyle.css">

</head>

<body id="page-top">

    <?php
    include_once("../../connection-config.php");
    if (isset($_POST['update'])) { // event handler for update button
        $id = $_POST['id'];
        $name = $_POST["name"];
        $desc = $_POST['desc'];
        $type = $_POST["type"];
        $price = $_POST["price"];
        $cpuid = $_POST["cpuid"];
        $gpuid = $_POST["gpuid"];
        $memoryid = $_POST["memoryid"];
        $storageid = $_POST["storageid"];
        $screenid = $_POST["screenid"];
       
        if ($_FILES['file']['name'] == "") {
            // No file was selected for upload 
            $imageurl = $_POST["imageurl"];
        } else {
            $target = "../../assets/img/";
            $file_path = $target.basename($_FILES['file']['name']);
            $file_name = $_FILES['file']['name'];
            $file_tmp =  $_FILES['file']['tmp_name'];
            $file_store = "../../assets/img/".$file_name;

            move_uploaded_file($file_tmp, $file_store);

            $imageurl = $file_path;
        }


        $result = mysqli_query($mysqli, "UPDATE products SET `name`='$name',`desc`='$desc', `type`= '$type', price=$price, CPUid=$cpuid, GPUid=$gpuid, memoryID=$memoryid, storageID=$storageid, screenID=$screenid, `imageUrl`= '$imageurl' WHERE id = $id;");
        //echo $id;           

        // get back to product.php
        header("location:/JAC_WebDevTeamProject/admin/product/product.php");
    }
    ?>

    <?php
    // get record info first
    include_once("../../connection-config.php");
    $id = $_GET['id'];

    $result = mysqli_query($mysqli, "SELECT * FROM products WHERE id = $id");

    while ($user_data = mysqli_fetch_array($result)) {
        $name = $user_data['name'];
        $desc = $user_data['desc'];
        $type = $user_data['type'];
        $price = $user_data['price'];
        $cpuid = $user_data['CPUid'];
        $gpuid = $user_data['GPUid'];
        $memoryid = $user_data['memoryID'];
        $storageid = $user_data['storageID'];
        $screenid = $user_data['screenID'];
        $imageurl = $user_data['imageUrl'];
    }
    ?>

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../adminindex.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Syntax Admin</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="../cpu/cpu.php">CPU</a>
                        <a class="collapse-item" href="../gpu/gpu.php">GPU</a>
                        <a class="collapse-item" href="../memory/memory.php">Memory</a>
                        <a class="collapse-item" href="../screen/screen.php">Screen</a>
                        <a class="collapse-item" href="../storage/storage.php">Storage</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Product -->
            <li class="nav-item">
                <a class="nav-link" href="product.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Products</span></a>
            </li>

            <!-- Nav Item - User -->
            <li class="nav-item">
                <a class="nav-link" href="../user/user.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Users</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-3">
                        <h1 class="h3 mt-3  text-gray-800">Dashboard</h1>
                    </div>
                    <hr class="text-black-800" />

                    <div class="container">
                        <h1>CRUD - EDIT PRODUCT</h1>
                        <div class="frminput">
                            <form name="update_user" method="POST" action="edit.php" enctype="multipart/form-data">

                                <label for="name">Name: </label><br>
                                <input type="text" id="name" name="name" class="finput" value="<?php echo $name; ?>"/> <br>

                                <label for="desc">Description: </label><br>
                                <input type="text" id="desc" name="desc" class="finput" value="<?php echo $desc; ?>"/> <br><br>

                                <label for="type" style='width:80px;'>Type: </label>
                                <select name="type" style='width:250px;'>
                                    <option value="desktop">desktop</option>
                                    <option value="laptop">laptop</option>
                                </select> <br>

                                <label for="price">Price: </label><br>
                                <input type="text" id="price" name="price" class="finput" value="<?php echo $price; ?>"/> <br> <br>

                                <label for="CPUID" style='width:80px;'>CPUID: </label>
                                <?php
                                $resultcpuid = mysqli_query($mysqli, "SELECT * FROM spec_cpu order by id ");

                                echo "<select id=cpuid name=cpuid style='width:250px;'>";

                                while ($row = mysqli_fetch_array($resultcpuid)) {
                                    echo "<option value=$row[id]>$row[desc]</option>";
                                }
                                echo "</select>";
                                ?> <br> <br>

                                <label for="GPUID" style='width:80px;'>GPUID: </label>
                                <?php
                                $resultgpuid = mysqli_query($mysqli, "SELECT * FROM spec_gpu order by id ");

                                echo "<select id=gpuid name=gpuid style='width:250px;'>";

                                while ($row = mysqli_fetch_array($resultgpuid)) {
                                    echo "<option value=$row[id]>$row[desc]</option>";
                                }
                                echo "</select>";
                                ?> <br> <br>

                                <label for="memoryID" style='width:80px;'>Memory ID: </label>
                                <?php
                                $resultmemoryid = mysqli_query($mysqli, "SELECT * FROM spec_memory order by id ");

                                echo "<select id=memoryid name=memoryid style='width:250px;'>";

                                while ($row = mysqli_fetch_array($resultmemoryid)) {
                                    echo "<option value=$row[id]>$row[desc]</option>";
                                }
                                echo "</select>";
                                ?> <br> <br>

                                <label for="storageID" style='width:80px;'>Storage ID: </label>
                                <?php
                                $resultstorageid = mysqli_query($mysqli, "SELECT * FROM spec_storage order by id ");

                                echo "<select id=storageid name=storageid style='width:250px;'>";

                                while ($row = mysqli_fetch_array($resultstorageid)) {
                                    echo "<option value=$row[id]>$row[desc]</option>";
                                }
                                echo "</select>";
                                ?> <br> <br>

                                <label for="screenID" style='width:80px;'>Screen ID: </label>
                                <?php
                                $resultscreenid = mysqli_query($mysqli, "SELECT * FROM spec_screen order by id ");

                                echo "<select id=screenid name=screenid style='width:250px;'>";

                                while ($row = mysqli_fetch_array($resultscreenid)) {
                                    echo "<option value=$row[id]>$row[desc]</option>";
                                }
                                echo "</select>";
                                ?> <br> <br>

                                <label for="imageurl">Image URL: </label> <br>
                                <input type="text" id="imageurl" name="imageurl" class="finput"value="<?php echo $imageurl; ?>"/> <br> <br>

                                <input type="file" id="file" name="file" class="finput" /> <br> <br>

                                <br>
                                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                <input type="Submit" name="update" value="Update" class="btn">

                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span> Copyright &copy; 2022 - Syntax Shop All rights reserved </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>