<?php



#start session
session_start();
if(!isset($_SESSION['id'])){

    header('Location: ../auth/login.php');
    exit();

}

$loginSuccess = "";

if(isset($_GET['login'])){
    $loginSuccess = htmlspecialchars($_GET['login']);
}

?>

<!-- app header -->
<?php require '../templates/front-layout/app.header.php'; ?>

<!-- title -->
<title>Khan Store &bull; <?php echo htmlspecialchars($_SESSION['fname']); ?> </title>

<div class="container mt-20">
    <!-- login notification -->
    <div id="notification" class="w-68 z-40 absolute top-auto right-0 mr-2 mt-1 position-fixed" login-success="<?php echo $loginSuccess; ?>">
        <div class="indigo accent-1 z-depth-1 p-3 relative">
            <p class="white-text">Hi! You have successfully logged in.</p>
        </div>
    </div>

    <div class="row pt-3">
        <!-- brands -->
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-4 px-4">
            <section>
                <h5 class="pt-2 mb-4 uppercase font-bold">Filter</h5>

                <section class="mb-4">

                    <div class=" mt-0 d-flex justify-content-between align-items-center">
                        <input type="text" id="search12" class="px-3 py-2 w-full rounded-sm shadow-md outline-none transition duration-500 ease-in-out hover:bg-indigo-200 focus:shadow-md focus:bg-indigo-300 mb-0" placeholder="Search...">
                        <a href="#!" class="btn bg-transparent btn-md shadow-none px-3 waves-effect">
                            <i class="fas fa-search fa-lg"></i>
                        </a>
                    </div>

                </section>
            </section>

            <section>

                <h5 class="mb-4 uppercase font-semibold">Brands</h5>

                <div class="text-muted small text-uppercase mb-4 pl-2" id="shopBrands">
                    
                </div>

            </section>

            <section>

                <h5 class="mb-4 uppercase font-semibold">Subcategories</h5>

                <div class="text-muted small text-uppercase mb-4 pl-2" id="shopCategories">
                    
                </div>

            </section>
        </div>

        <!-- products -->
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 mb-4">
            <div class="row px-4">
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-3">
                    <div class="view overlay zoom z-depth-1 cursor-pointer rounded">
                        <img src="../../../public/img/products/5a.jpg" class="img-fluid" alt="">
                        <a href="product.php">
                            <div class="mask waves-effect waves-light">
                                <img class="img-fluid w-100" src="../../../public/img/products/5b.jpg">
                                <div class="mask rgba-black-slight waves-effect waves-light"></div>
                            </div>
                        </a>
                    </div>

                    <div class="text-center mt-2 text-xl">
                        <h5 class="font-bold black-text mb-2">
                            <a href="product.php" class="hover:text-black">
                                Cashmere Sweater
                            </a>
                        </h5>
                        <p class="font-small">
                            <span class="text-danger mr-1"><strong>Ksh 2,100</strong></span>
                            <span class="text-grey"><strong><s>Ksh 3,600</s></strong></span>
                        </p>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-3">
                    <div class="view overlay zoom z-depth-1 cursor-pointer rounded">
                        <img src="../../../public/img/products/15a.jpg" class="img-fluid" alt="">
                        <a href="product.php">
                            <div class="mask waves-effect waves-light">
                                <img class="img-fluid w-100" src="../../../public/img/products/15.jpg">
                                <div class="mask rgba-black-slight waves-effect waves-light"></div>
                            </div>
                        </a>
                    </div>

                    <div class="text-center mt-2 text-xl">
                        <h5 class="font-bold black-text mb-2">
                            <a href="product.php" class="hover:text-black">
                                Black denim jacket
                            </a>
                        </h5>
                        <p class="font-small">
                            <span class="text-danger mr-1"><strong>Ksh 5,500</strong></span>
                        </p>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-3">
                    <div class="view overlay zoom z-depth-1 cursor-pointer rounded">
                        <img src="../../../public/img/products/6a.jpg" class="img-fluid" alt="">
                        <a href="product.php">
                            <div class="mask waves-effect waves-light">
                                <img class="img-fluid w-100" src="../../../public/img/products/6b.jpg">
                                <div class="mask rgba-black-slight waves-effect waves-light"></div>
                            </div>
                        </a>
                    </div>

                    <div class="text-center mt-2 text-xl">
                        <h5 class="font-bold black-text mb-2">
                            <a href="product.php" class="hover:text-black">
                                Yellow Hoodie
                            </a>
                        </h5>
                        <p class="font-small">
                            <span class="text-danger mr-1"><strong>Ksh 4,500</strong></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- app footer -->
<?php require '../templates/front-layout/app.footer.php'; ?>