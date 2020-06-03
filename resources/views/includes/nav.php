<?php
    $path = "/dev/khan/resources/views";
?>
<nav class="navbar navbar-expand-lg navbar-light red lighten-4 fixed-top shadow-md" id="frontNavbar">
    <!-- container -->
    <div class="container-fluid">
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
                <?php if(!isset($_SESSION['id'])): ?>
                    <li class="nav-item">
                        <a href="<?php echo $path . '/pages/index.php'; ?>" class="nav-link outline-none">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo $path . '/pages/services.php'; ?>" class="nav-link outline-none">Services</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo $path . '/pages/contact.php'; ?>" class="nav-link outline-none">Contact us</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="<?php echo $path . '/pages/index.php'; ?>" class="nav-link outline-none">
                            <?php echo htmlspecialchars($_SESSION['fname']); ?>
                        </a>
                    </li>
                <?php endif; ?>

            </ul>

            <!-- right content -->
            <ul class="navbar-nav ml-auto px-2">
                <?php if(!isset($_SESSION['id'])): ?>
                    <li class="nav-item">
                        <a href="<?php echo $path . '/auth/login.php'; ?>" class="nav-link outline-none">Login</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo $path . '/auth/register.php'; ?>" class="nav-link outline-none px-3 py-2 bg-red-500 shadow-md white-text">Register</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle font-small font-semibold" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-tools mr-1"></i>
                            Dashboard
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-info p-3" aria-labelledby="navbarDropdown">
                            <a href="" class="dropdown-item outline-none hover:shadow-md hover:bg-red-500 hover-white hover:text-white">
                                <i class="fas fa-wrench mr-2"></i>
                                Account Settings
                            </a>

                            <a href="" class="dropdown-item outline-none hover:shadow-md hover:bg-red-500 hover-white hover:text-white">
                                <i class="fas fa-question-circle mr-2"></i>
                                Support
                            </a>

                            <div class="dropdown-divider"></div>

                            <a href="../../config/logout.php" class="dropdown-item outline-none hover:shadow-md hover:bg-red-500 hover-white hover:text-white">
                                <i class="fas fa-sign-out-alt mr-2"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div> <!-- end nav container -->
</nav>