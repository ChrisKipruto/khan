<?php
    $path = "/dev/khan/resources/views";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link rel="stylesheet" href="../../../public/css/bootstrap.min.css">
    <!-- mdb  -->
    <link rel="stylesheet" href="../../../public/css/mdb.min.css">
    <!-- style  -->
    <link rel="stylesheet" href="../../../public/css/style.css">
    <!-- tailwindcss -->
    <link rel="stylesheet" href="../../../src/build/tailwind.css">
    <!-- datatables-->
    <link rel="stylesheet" href="../../../public/css/addons/datatables.min.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="../../../public/fontawesome/css/all.min.css">
    <!-- favicon -->
    <link rel="shortcut icon" href="../../../public/img/icons/logo2.png" type="image/x-icon">
    <!-- baguette box css -->
    <link rel="stylesheet" href="../../../public/css/baguetteBox.min.css">
    <!-- magnific -->
    <link rel="stylesheet" href="../../../public/Magnific-Popup/dist/magnific-popup.css">

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Sulphur+Point:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div id="overlay">
        <div id="text">
            <img src="../../../public/img/5.gif" class="" alt="Overlay">
        </div>
    </div>

    <header>

        <!-- admin navbar -->
        <nav class="navbar navbar-expand-lg navbar-light indigo lighten-4 shadow-none">
            <div class="container-fluid">
                <!-- brand logo -->
                <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="navbar-brand outline-none d-flex align-items-center">
                    <h6 class="font-bold black-text text-xl uppercase">
                        Admin
                        <span class="indigo-text">Panel</span>
                    </h6>
                </a>

                <!-- toggle navigation -->
                <button class="navbar-toggler outline-none" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- collapsible content -->
                <div class="collapse navbar-collapse">
                    <!-- left content -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="<?php echo $path . '/admin/index.php'; ?>" class="nav-link outline-none waves-effect waves-ripple tracking-wide font-navbar">
                                Dashboard
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo $path . '/admin/products.php'; ?>" class="nav-link outline-none waves-effect waves-ripple tracking-wide font-navbar">
                                Products
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo $path . '/admin/addBrand.php'; ?>" class="nav-link outline-none waves-effect waves-ripple tracking-wide font-navbar">
                                Brands
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo $path . '/admin/addCategory.php'; ?>" class="nav-link outline-none waves-effect waves-ripple tracking-wide font-navbar">
                                Categories
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle tracking-wide font-navbar" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-tape pr-2"></i>
                                Size Guides
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-info p-2" 
                                aria-labelledby="navbarDropdown">
                                <a href="<?php echo $path . '/admin/measurements.php'; ?>" class="dropdown-item outline-none hover:shadow-md
                                    hover:bg-indigo-500 hover-white hover:text-white">
                                    Measurements
                                </a>

                                <a href="<?php echo $path . '/admin/sizeChart.php'; ?>" class="dropdown-item outline-none hover:shadow-md
                                    hover:bg-indigo-500 hover-white hover:text-white">
                                    Size Charts
                                </a>
                            </div>
                        </li>
                    </ul>

                    <!-- left content -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="<?php echo $path . '/admin/index.php'; ?>" class="nav-link outline-none waves-effect waves-ripple tracking-wide font-navbar">
                                Welcome! Chris Kipruto
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- intro banner -->
        <div class="w-full bg-dark h-20 z-depth-1 d-flex justify-center align-items-center white-text">
            <div class="w-1/2 h-full d-flex align-items-center">
                <h4 class="text-lg font-semibold text-gray-200">
                    <i class="fas fa-tools"></i>
                    Dashboard <small class="text-muted">Manage Your System</small>
                </h4>
            </div>

            <div class="w-2/5 h-full d-flex align-items-center justify-content-end">
                <button class="btn indigo lighten-4 black-text font-semibold dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Create Content
                </button>
                <div class="dropdown-menu p-2">
                    <a href="<?php echo $path . '/admin/addBrand.php'; ?>" class="dropdown-item outline-none hover:shadow-md hover:bg-indigo-200 hover-black">
                        Add Brand
                    </a>
                    <a href="<?php echo $path . '/admin/addCategory.php'; ?>" class="dropdown-item outline-none hover:shadow-md hover:bg-indigo-200 hover-black">
                        Add Category
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="<?php echo $path . '/admin/addProduct.php'; ?>" class="dropdown-item outline-none hover:shadow-md hover:bg-indigo-200 hover-black">
                        Add Product
                    </a>
                </div>
            </div>
        </div>

    </header>

    <main>

        <!-- container section -->