<?php

    # check if product id is set
    if(!isset($_GET['id'])) {
        header("Location: products.php?error=noid");
        exit();
    }

?>

<!-- admin header -->
<?php require "../templates/back-layout/back.header.php"; ?>

<?php

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
    /** =============== end get brand =============== */
    

    /** ====== get category ====== */
    $category_sql = "SELECT * FROM categories WHERE id = '$pro_category'";

    # run the category sql
    $run_category = mysqli_query($conn, $category_sql);

    # get category
    $category = mysqli_fetch_assoc($run_category);
    /** =============== end get category =============== */

    # free up memory
    mysqli_free_result($result);
    mysqli_free_result($run_category);
    mysqli_free_result($run_brand);

    # close connection
    mysqli_close($conn);

    //////////////////////////////////////////////////////

?>

<title>Khan Store &bullet; <?php echo  htmlspecialchars($product['product_title']); ?> </title>

<div class="container-fluid">
    <div class="row">
        
    </div>
</div>

<!-- admin footer -->
<?php require "../templates/back-layout/back.footer.php"; ?>