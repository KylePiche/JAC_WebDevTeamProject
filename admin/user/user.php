<?php
include_once("../../connection-config.php");
$result = mysqli_query($mysqli, "SELECT * FROM users order by id ");
?>


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
    $email = $username = $password = $creditcard = "";
    $address = $city = $postal = $blocked = "";
    $emailErr = $userErr = $passErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // verify email
        if (empty($_POST["email"])) {
            $emailErr = "Email cannot be empty";
        } else {
            $email = $_POST["email"];
        }

        // verify username
        if (empty($_POST["username"])) {
            $userErr = "Username cannot be empty";
        } else {
            $username = $_POST["username"];
        }

        // verify password
        if (empty($_POST["password"])) {
            $passErr = "Password cannot be empty";
        } else {
            $password = $_POST["password"];
        }

        $creditcard = $_POST["creditcard"];
        $address = $_POST["address"];
        $city = $_POST["city"];
        $postal = $_POST["postalcode"];
        $blocked = $_POST["blocked"];

        if (($email != "") && ($username != "") && ($password != "")) {

            include_once("../../connection-config.php"); //get connection to db

            $result = mysqli_query($mysqli, "INSERT INTO users (`email`, `userName`, `password`, `creditCard`, `address`, `city`, `postalCode`, isBlocked) VALUES ('$email','$username', '$password', '$creditcard','$address','$city', '$postal', $blocked )");
            // refresh the page  
            echo "<meta http-equiv='refresh' content='0'>";
        }
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
                <a class="nav-link" href="../product/product.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Products</span></a>
            </li>

            <!-- Nav Item - User -->
            <li class="nav-item">
                <a class="nav-link" href="user.php">
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
                        <h1>CRUD - NEW USER</h1>
                        <div class="frminput">
                            <form method="POST" action="<?php echo ($_SERVER["PHP_SELF"]); ?>">

                                <label for="email">Email: </label>
                                <span class="error"><?php echo $emailErr; ?></span><br>
                                <input type="text" id="email" name="email" class="finput" /> <br>

                                <label for="username">Username: </label>
                                <span class="error"><?php echo $userErr; ?></span><br>
                                <input type="text" id="username" name="username" class="finput" /> <br>

                                <label for="password">Password: </label>
                                <span class="error"><?php echo $passErr; ?></span><br>
                                <input type="text" id="password" name="password" class="finput" /> <br>

                                <label for="creditcard">Credit Card: </label><br>
                                <input type="text" id="creditcard" name="creditcard" class="finput" /> <br>

                                <label for="address">Address: </label><br>
                                <input type="text" id="address" name="address" class="finput" /> <br> 

                                <label for="city">City: </label><br>
                                <input type="text" id="city" name="city" class="finput" /> <br>
                                
                                <label for="postalcode">Postal Code: </label><br>
                                <input type="text" id="postalcode" name="postalcode" class="finput" /> <br>

                                <label for="blocked">Blocked: </label> <br>
                                <input type="number" id="blocked" name="blocked" class="finput" /> <br> <br>
                                <br>
                                <input type="submit" class="btn" value="Submit">
                                <input type="reset" class="btn" value="Cancel">

                            </form>
                        </div>
                        <table class="tblindex">
                            <tr>
                                <th>id</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Credit Card</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Postal Code</th>
                                <th>Blocked</th>                                
                                <th>Actions</th>
                            </tr>

                            <?php
                            $result = mysqli_query($mysqli, "SELECT * FROM users order by id ");

                            while ($user_data = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $user_data['id'] . "</td>";
                                echo "<td>" . $user_data['email'] . "</td>";
                                echo "<td>" . $user_data['userName'] . "</td>";
                                echo "<td>" . $user_data['password'] . "</td>";
                                echo "<td>" . $user_data['creditCard'] . "</td>";
                                echo "<td>" . $user_data['address'] . "</td>";
                                echo "<td>" . $user_data['city'] . "</td>";
                                echo "<td>" . $user_data['postalCode'] . "</td>";
                                echo "<td>" . $user_data['isBlocked'] . "</td>";
                                echo "<td><a href = 'edit.php?id=$user_data[id]'><img src='../img/edit.png' class='icon'/></a><a href = 'delete.php?id=$user_data[id]'><img src='../img/delete.png' class='icon' /></a>";
                                echo "</tr>";
                            }
                            ?>
                        </table>
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