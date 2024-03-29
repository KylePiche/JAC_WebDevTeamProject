<!--navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container">

        <a href="./admin/adminindex.php"><img src="./assets/img/logo.png" alt="Logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop.php">Shop</a>
                </li>
                <?php if (!isset($_SESSION['email'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">Sign up</a>
                    </li>
                <?php } else { ?>
                    <li id="nav-item">
                        <a href="logout.php" class="nav-link">Log out</a>
                    </li>
                    <li class="nav-item">
                        <a href="cart.php"><i class="bi bi-cart"></i></a>
                        <a href="wishlists.php"><i class="bi bi-suit-heart"></i></a>
                        <a href="user_dashboard.php"><i class="bi bi-person"></i></a>
                    </li>
                <?php } ?>



            </ul>

        </div>
    </div>
</nav>
