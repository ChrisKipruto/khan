<nav class="navbar navbar-expand-lg navbar-light red lighten-4 fixed-top shadow-md" id="frontNavbar">
    <!-- container -->
    <div class="container">
        <!-- brand logo -->
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="navbar-brand outline-none d-flex align-items-center">
            <img src="../../../public/img/icons/logo3.png" class="h-12 pr-2" alt="Khan Store app Logo">
            <h6 class="font-bold black-text text-xl uppercase">
                Khan
                <span class="red-text">Store</span>
            </h6>
        </a>

        <!-- toggle navigation -->
        <button class="navbar-toggler outline-none" type="button" data-toggle="collapse" data-target="#navbarToggleCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- collapsible content -->
        <div class="collapse navbar-collapse" id="navbarToggleCollapse">
            <!-- left content -->
            <ul class="navbar-nav mr-auto px-2">
                <li class="nav-item">
                    <a href="index.php" class="nav-link outline-none">Home</a>
                </li>

                <li class="nav-item">
                    <a href="services.php" class="nav-link outline-none">Services</a>
                </li>

                <li class="nav-item">
                    <a href="contact.php" class="nav-link outline-none">Contact us</a>
                </li>
            </ul>

            <!-- right content -->
            <ul class="navbar-nav ml-auto px-2">
                <li class="nav-item">
                    <a href="" class="nav-link outline-none">Login</a>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link outline-none px-3 py-2 bg-red-500 shadow-md white-text">Register</a>
                </li>
            </ul>
        </div>
    </div> <!-- end nav container -->
</nav>