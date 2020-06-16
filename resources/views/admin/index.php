<!-- admin header -->
<?php require "../templates/back-layout/back.header.php"; ?>

<title>Khan Store &bullet; Admin Dashboard</title>

<div class="container-fluid">
    <div class="row mt-3 px-3">
        <!-- Dashboard control -->
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-4">
            <div class="bg-white rounded-sm shadow-md">
                <table class="table table-striped">
                    <thead class="indigo lighten-4 black-text">
                        <tr class="border-b-2 border-red-600">
                            <th scope="col" class="py-3 px-3">
                                <i class="fas fa-cog"></i>
                                <span class="text-lg">Dashboard</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- products -->
                        <tr class="px-3 d-flex justify-between align-items-center">
                            <th class="border-0">
                                <a href="products.php">
                                    <i class="fab fa-product-hunt pr-2"></i>
                                    Products
                                </a>
                            </th>

                            <th class="border-0">
                                <span class="badge badge-pill badge-success" id="product-count"></span>
                            </th>
                        </tr>

                        <!-- orders -->
                        <tr class="px-3 d-flex justify-between align-items-center">
                            <th class="border-0">
                                <a href="">
                                    <i class="fas fa-folder pr-2"></i>
                                    Orders
                                </a>
                            </th>

                            <th class="border-0">
                                <span class="badge badge-pill badge-warning">0</span>
                            </th>
                        </tr>

                        <!-- customers -->
                        <tr class="px-3 d-flex justify-between align-items-center">
                            <th class="border-0">
                                <a href="">
                                    <i class="fas fa-users pr-2"></i>
                                    Customers
                                </a>
                            </th>

                            <th class="border-0">
                                <span class="badge badge-pill badge-danger" id="customer-count"></span>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- tiles: system overview -->
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 mb-4">
            <div class="row">
                <!-- Categories -->
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-4">
                    <div class="bg-gray-300 shadow-md rounded-sm flex-center py-4">
                        <div class="text-center" id="catTile">
                            <a href="addCategory.php">
                                <h2 class="text-gray-700 font-bold mb-1 fa-2x">
                                    <i class="fab fa-cuttlefish"></i>
                                    <span></span>
                                </h2>
                                <h4 class="text-gray-700 font-bold">
                                    Categories
                                </h4>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Brands -->
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-4">
                    <div class="bg-gray-300 shadow-md rounded-sm flex-center py-4">
                        <div class="text-center" id="brandTile">
                            <a href="addBrand.php">
                                <h2 class="text-gray-700 font-bold mb-1 fa-2x">
                                    <i class="fas fa-building"></i>
                                    <span></span>
                                </h2>
                                <h4 class="text-gray-700 font-bold">
                                    Brands
                                </h4>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Products -->
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-4">
                    <div class="bg-gray-300 shadow-md rounded-sm flex-center py-4">
                        <div class="text-center" id="productTile">
                            <a href="products.php">
                                <h2 class="text-gray-700 font-bold mb-1 fa-2x">
                                    <i class="fas fa-folder"></i>
                                    <span></span>
                                </h2>
                                <h4 class="text-gray-700 font-bold">
                                    Products
                                </h4>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Visitors -->
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-4">
                    <div class="bg-gray-300 shadow-md rounded-sm flex-center py-4">
                        <div class="text-center" id="customerTile">
                            <a href="">
                                <h2 class="text-gray-700 font-bold mb-1 fa-2x">
                                    <i class="fas fa-signal"></i>
                                    <span></span>
                                </h2>
                                <h4 class="text-gray-700 font-bold">
                                    Visitors
                                </h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- admin footer -->
<?php require "../templates/back-layout/back.footer.php"; ?>