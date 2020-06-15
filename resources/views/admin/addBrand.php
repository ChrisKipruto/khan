<!-- admin header -->
<?php require "../templates/back-layout/back.header.php"; ?>

<title>Khan Store &bullet; Add Brand</title>

<?php

# connect to db
require '../../config/connect.php';

# sql to get brands
$sql = "SELECT * FROM brands";

# run sql and store the result
$result = mysqli_query($conn, $sql);

# fetch the result into an associative array
$brands = mysqli_fetch_all($result, MYSQLI_ASSOC);

# release memory
mysqli_free_result($result);

# close connection to db
mysqli_close($conn);

?>

<div class="container-fluid">
    <!-- brand success -->
    <div id="brandSuccess" class="w-68 z-40 absolute top-auto -mt-3 right-0 mr-2 position-fixed">
        <div class="success-color z-depth-1 p-3 relative">
            <p class="white-text brandSuccessP"></p>
        </div>
    </div>

    <!-- brand failed -->
    <div id="brandDanger" class="w-68 z-40 absolute top-auto -mt-3 right-0 mr-2 position-fixed">
        <div class="danger-color z-depth-1 p-3 relative">
            <p class="white-text brandDangerP"></p>
        </div>
    </div>

    <div class="row d-flex justify-center mt-3">
        <!-- add brand form -->
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-3">
            <div class="mb-2">
                <input type="text" id="brand" placeholder="Add Product Brand"
                    class="w-full px-3 py-3 outline-none shadow-md rounded-sm grey lighten-2 black-text focus:outline-none font-semibold">
            </div>
            <p class="font-small font-semibold tracking-wide red-text mb-1 brand-help"></p>
            <div class="d-flex justify-start">
                <a href="" class="indigo-text font-semibold tracking-wide outline-none mr-5 addBrandLink">
                    <i class="fas fa-plus pr-2"></i>
                    Add Product Brand
                </a>
                <span id="preload">
                    <img src="../../../public/img/5.gif" class="h-8" alt="">
                </span>
            </div>
        </div>

        <!-- brands table -->
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
            <table id="brandsTable" class="table table-sm shadow-sm">
                <thead class="bg-dark text-indigo-100">
                    <tr class="">
                        <th class="pl-3">Brand Title</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($brands as $brand): ?>
                        <tr class="border-b" id="brand-<?php echo htmlspecialchars($brand['id']); ?>">
                            <td class="pl-3 cursor-pointer brandTd">
                                <span class="font-bold tracking-wide black-text"
                                    bid="<?php echo htmlspecialchars($brand['id']); ?>"><?php echo htmlspecialchars($brand['brand_title']); ?></span>
                            </td>
                            <td class="text-center">
                                <a href="" class="pr-2 outline-none red-text deleteBrand" bid="<?php echo htmlspecialchars($brand['id']); ?>">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- admin footer -->
<?php require "../templates/back-layout/back.footer.php"; ?>