<!-- admin header -->
<?php require "../templates/back-layout/back.header.php"; ?>

<title>Khan Store &bullet; Products List</title>

<?php

$msg = '';

# check noid error
if(isset($_GET['error'])) {

    # get error msg
    $msg = $_GET['error'];

}

# connect to db
require '../../config/connect.php';

# sql stmt to get and store products
$sql = "SELECT * FROM products";

# run sql stmt and get result
$result = mysqli_query($conn, $sql);

# fetch the result into an associative array
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

# release memory and close connection
mysqli_free_result($result);
mysqli_close($conn);

?>

<div class="container-fluid">
    <div class="row d-flex justify-content-center mt-3">
        <!-- add product btn -->
        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 mb-3">
            <a href="addProduct.php" class="btn btn-md indigo accent-2 font-semibold tracking-wide white-text">
                <i class="fas fa-plus-square pr-2"></i>
                Add Product
            </a>
        </div>

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

        <!-- products table -->
        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 mb-3">
            <div class="table-responsive-sm">
                <table class="table table-striped table-sm" id="productsTable">
                    <thead>
                        <tr>
                            <th>Product Image</th>
                            <th>Product Title</th>
                            <th>Product Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($products as $product): ?>
                            <tr>
                                <td>
                                    <a href="product.php?id=<?php echo htmlspecialchars($product['id']); ?>">
                                        <img src="../../../public/uploads/<?php echo htmlspecialchars($product['product_image']); ?>" 
                                        class="h-16 rounded shadow-md" alt="Product Image">
                                    </a>
                                </td>
                                <td><?php echo htmlspecialchars($product['product_title']); ?></td>
                                <td><?php echo htmlspecialchars($product['product_price']); ?></td>
                                <td>
                                    <a href="product.php?id=<?php echo htmlspecialchars($product['id']); ?>" class="pr-2 outline-none light-blue-text">
                                        <i class="fas fa-info"></i>
                                    </a>

                                    <a href="editProduct.php?id=<?php echo htmlspecialchars($product['id']); ?>" class="pr-2 outline-none light-green-text">
                                        <i class="fas fa-feather"></i>
                                    </a>

                                    <a href="" class="pr-2 outline-none red-text">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>Product Image</th>
                            <th>Product Title</th>
                            <th>Product Description</th>
                            <th>Product Price</th>
                        </tr>
                    </tfoot>
                </table>
            </div>   
        </div>
    </div>
</div>

<!-- admin footer -->
<?php require "../templates/back-layout/back.footer.php"; ?>