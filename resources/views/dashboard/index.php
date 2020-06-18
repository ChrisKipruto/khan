<?php

#start session
session_start();
if(!isset($_SESSION['id'])){

    header('Location: ../auth/login.php');
    exit();

} else {

    $msg = '';

    # check noid error
    if(isset($_GET['error'])) {

        # get error msg
        $msg = $_GET['error'];

    }

    /**
     * Get products
    */

    # connect to db
    require '../../config/connect.php';

    # sql get products
    $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 6";

    # store result
    $result = mysqli_query($conn, $sql);

    # fetch the result into in array
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

    # CLOSE THE CONNNECTION AND RELEASE MEMORY
    mysqli_free_result($result);
    mysqli_close($conn);

    /////////////////////////////////////////////////

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

                <h5 class="mb-4 uppercase font-semibold">Categories</h5>

                <div class="text-muted small text-uppercase mb-4 pl-2" id="shopCategories">
                    
                </div>

            </section>

            <section>

                <h5 class="mb-4 uppercase font-semibold">Brands</h5>

                <div class="text-muted small text-uppercase mb-4 pl-2" id="shopBrands">
                    
                </div>

            </section>
        </div>

        <!-- products -->
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 mb-4">
            <div class="row px-4">
                <?php if($msg === "noid"): ?>
                    <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 mb-2">
                        <div class="alert danger-color alert-dismissible fade show" role="alert">
                            <p class="text-white"> <strong>Error!</strong> You cannot access that page as is</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                <?php endif; ?>

                <?php foreach($products as $product): ?>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-3">
                        <div class="view overlay zoom z-depth-1 cursor-pointer rounded">
                            <img src="../../../public/uploads/<?php echo htmlspecialchars($product['front_image']); ?>" class="img-fluid" alt="">
                            <a href="product.php?id=<?php echo htmlspecialchars($product['id'])?>">
                                <div class="mask waves-effect waves-light">
                                    <img class="img-fluid w-100" src="../../../public/uploads/<?php echo htmlspecialchars($product['front_image']); ?>">
                                    <div class="mask rgba-black-slight waves-effect waves-light"></div>
                                </div>
                            </a>
                        </div>

                        <div class="text-center mt-2 text-xl">
                            <h5 class="font-bold text-sm black-text mb-2">
                                <a href="product.php?id=<?php echo htmlspecialchars($product['id']); ?>" class="hover:text-black">
                                    <?php echo htmlspecialchars($product['product_title']); ?>
                                </a>
                            </h5>
                            <p class="font-small">
                                <span class="text-danger mr-1">
                                    <strong>Ksh. <?php echo htmlspecialchars($product['product_price'])?></strong>
                                </span>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<!-- app footer -->
<?php require '../templates/front-layout/app.footer.php'; ?>