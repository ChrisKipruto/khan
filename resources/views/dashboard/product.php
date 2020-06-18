<?php

#start session
session_start();
if(!isset($_SESSION['id'])){

    header('Location: ../auth/login.php');
    exit();

}

# check if product id is set
if(!isset($_GET['id'])) {

    header("Location: index.php?error=noid");
    exit();

} else {

    # connect to db
    require '../../config/connect.php';

    /**
     * Get product
    */

    # get product id
    $product_id = htmlspecialchars($_GET['id']);

    # sql to get specific product
    $sql = "SELECT * FROM products WHERE id = '$product_id'";

    # store result of query
    $result = mysqli_query($conn, $sql);

    # fetch result to an array
    $product = mysqli_fetch_array($result);

    # init product details
    $pro_category = $product['product_category'];
    $pro_brand = $product['product_brand'];

    /** ====== get brand ====== */
    $brand_sql = "SELECT * FROM brands WHERE id = '$pro_brand'";

    # run the brand sql
    $run_brand = mysqli_query($conn, $brand_sql);

    # get brand
    $brand = mysqli_fetch_assoc($run_brand);

    if(!$brand){
        $b = "Hopefully";
    }
    /** =============== end get brand =============== */
    

    /** ====== get category ====== */
    $category_sql = "SELECT * FROM categories WHERE id = '$pro_category'";

    # run the category sql
    $run_category = mysqli_query($conn, $category_sql);

    # get category
    $category = mysqli_fetch_assoc($run_category);

    # get sub cat
    $subcategory_sql = "SELECT * FROM subcategories WHERE category_id = '$pro_category'";

    # run the sub category sql
    $run_subcategory = mysqli_query($conn, $subcategory_sql);

    # get category
    $subcategory = mysqli_fetch_assoc($run_subcategory);

    if(!$subcategory){
        $sc = "Hopefully";
    }
    /** =============== end get category =============== */

    # free up memory
    mysqli_free_result($result);
    mysqli_free_result($run_category);
    mysqli_free_result($run_brand);

    # close connection
    mysqli_close($conn);

    //////////////////////////////////////////////////////

}

?>

<!-- app header -->
<?php require '../templates/front-layout/app.header.php'; ?>

<!-- title -->
<title>Khan Store &bull; <?php echo  htmlspecialchars($product['product_title']); ?> </title>

<div class="container mt-20">
    <!-- product section -->
    <section class="mb-5 pt-3">
        <div class="row d-flex justify-content-center p-3">
            <!-- col img -->
            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 mb-4">
                <div class="view overlay zoom z-depth-1 cursor-pointer rounded mb-3">
                    <a href="../../../public/uploads/<?php echo htmlspecialchars($product['front_image']); ?>" class="test-popup-link">
                        <img src="../../../public/uploads/<?php echo htmlspecialchars($product['front_image']); ?>" class="img-fluid" alt="">
                    </a>
                    <!-- <div class="mask waves-effect waves-light"></div> -->
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="view overlay rounded z-depth-1 gallery-item hoverable">
                            <a href="../../../public/uploads/<?php echo htmlspecialchars($product['side_image']); ?>" class="test-popup-link">
                                <img src="../../../public/uploads/<?php echo htmlspecialchars($product['side_image']); ?>" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="view overlay rounded z-depth-1 gallery-item hoverable">
                            <a href="../../../public/uploads/<?php echo htmlspecialchars($product['back_image']); ?>" class="test-popup-link">
                                <img src="../../../public/uploads/<?php echo htmlspecialchars($product['back_image']); ?>" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- col des -->
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-4">
                <h5 class="text-sm black-text font-bold mb-2">
                    <?php
                        if($brand) {
                            echo htmlspecialchars($brand['brand_title']) . ' ' . htmlspecialchars($subcategory['subcategory_title']);
                        } else {
                            echo htmlspecialchars($subcategory['subcategory_title']);
                        }
                    ?>
                </h5>

                <h5 class="text-xl black-text font-bold mb-2">
                    <?php echo htmlspecialchars($product['product_title']); ?>
                </h5>

                <p class="mb-2 text-muted text-uppercase small">
                    <?php echo htmlspecialchars($category['category_title']); ?>
                </p>

                <p class="font-bold mt-2 green-text pb-2">
                    <span class="mr-1">
                       <span class="green-text"> Retail Price:</span> Ksh
                        <?php echo htmlspecialchars($product['product_price']); ?>
                    </span>
                </p>

                <p class="pt-2 mb-3 text-sm">
                    <?php echo htmlspecialchars($product['product_description']); ?>
                </p>

                <!-- <div class="table-responsive mb-2">
                    <table class="table table-sm table-borderless mb-0">
                        <tbody>
                        <tr>
                            <th class="pl-0 w-25" scope="row"><strong>Model</strong></th>
                            <td>Jacket</td>
                        </tr>
                        <tr>
                            <th class="pl-0 w-25" scope="row"><strong>Color</strong></th>
                            <td>Yellow</td>
                        </tr>
                        </tbody>
                    </table>
                </div> -->

                <hr>

                <div class="table-responsive mb-2">
                    <table class="table table-sm table-borderless">
                        <tbody>
                        <tr>
                            <td class="pl-0 pb-0 w-25">Quantity</td>
                            <!-- <td class="pb-0">Select size</td> -->
                        </tr>
                        <tr>
                            <td class="pl-0">
                                <div class="def-number-input number-input safari_only mb-0">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                    <input class="quantity p-2 shadow-sm outline-none font-bold" min="0" name="quantity" value="1" type="number">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                </div>
                            </td>
                            <!-- <td>
                                <div class="mt-1">
                                    <div class="form-check form-check-inline pl-0">
                                        <input type="radio" class="form-check-input" id="small" name="materialExampleRadios" checked="">
                                        <label class="form-check-label small text-uppercase card-link-secondary" for="small">Small</label>
                                    </div>
                                    
                                    <div class="form-check form-check-inline pl-0">
                                        <input type="radio" class="form-check-input" id="medium" name="materialExampleRadios">
                                        <label class="form-check-label small text-uppercase card-link-secondary" for="medium">Medium</label>
                                    </div>

                                    <div class="form-check form-check-inline pl-0">
                                        <input type="radio" class="form-check-input" id="large" name="materialExampleRadios">
                                        <label class="form-check-label small text-uppercase card-link-secondary" for="large">Large</label>
                                    </div>
                                </div>
                            </td> -->
                        </tr>
                        </tbody>
                    </table>
                </div>

                <button type="button" pid="<?php echo  htmlspecialchars($product['id']); ?>" 
                    class="btn btn-indigo btn-md mr-1 mb-2 tracking-wide font-weight-bold buy-now">
                    <i class="fas fa-shopping-bag pr-2"></i>
                    Buy now
                </button>

                <button type="button" pid="<?php echo  htmlspecialchars($product['id']); ?>" 
                    class="btn btn-light btn-md mr-1 mb-2 tracking-wide font-weight-bold add-to-cart">
                    <i class="fas fa-shopping-cart pr-2"></i>Add to cart
                </button>
            </div>
        </div>
    </section>
</div>

<!-- app footer -->
<?php require '../templates/front-layout/app.footer.php'; ?>