<!-- admin header -->
<?php require "../templates/back-layout/back.header.php"; ?>

<title>Khan Store &bullet; Add Category</title>

<?php

$msg = '';

# check noid error
if(isset($_GET['error'])) {

    # get error msg
    $msg = $_GET['error'];

}

# connect to db
require '../../config/connect.php';

# sql to get category
$sql = "SELECT * FROM categories";

# run sql and store the result
$result = mysqli_query($conn, $sql);

# fetch the result into an associative array
$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

# release memory
mysqli_free_result($result);

# close connection to db
mysqli_close($conn);

?>

<div class="container-fluid">
    <!-- cat success -->
    <div id="catSuccess" class="w-68 z-40 absolute top-auto -mt-3 right-0 mr-2 position-fixed">
        <div class="success-color z-depth-1 p-3 relative">
            <p class="white-text catSuccessP"></p>
        </div>
    </div>

    <!-- cat failed -->
    <div id="catDanger" class="w-68 z-40 absolute top-auto -mt-3 right-0 mr-2 position-fixed">
        <div class="danger-color z-depth-1 p-3 relative">
            <p class="white-text catDangerP"></p>
        </div>
    </div>

    <div class="row d-flex justify-center mt-3">
        <!-- add cat form -->
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-3">
            <div class="mb-2">
                <input type="text" id="category" placeholder="Add Product Category"
                    class="w-full px-3 py-3 outline-none shadow-md rounded-sm grey lighten-2 black-text focus:outline-none font-semibold">
            </div>
            <p class="font-small font-semibold tracking-wide red-text mb-1 cat-help"></p>
            <div class="d-flex justify-start">
                <a href="" class="indigo-text font-semibold tracking-wide outline-none mr-5 addCatLink">
                    <i class="fas fa-plus pr-2"></i>
                    Add Product Category
                </a>
                <span id="preload">
                    <img src="../../../public/img/5.gif" class="h-8" alt="">
                </span>
            </div>
        </div>

        <!-- cats table -->
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
            <?php if($msg === 'noid'):?>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                        <div class="alert danger-color alert-dismissible fade show" role="alert">
                            <p class="text-white"> <strong>Error!</strong> You cannot access that page as is</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if($msg === 'nocat'):?>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                        <div class="alert danger-color alert-dismissible fade show" role="alert">
                            <p class="text-white"> <strong>Error!</strong> Category does not exist exist!</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <table id="catsTable" class="table table-sm shadow-sm">
                <thead class="bg-dark text-indigo-100">
                    <tr class="">
                        <th class="pl-3">Category Title</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($categories as $category): ?>
                        <tr class="border-b" id="category-<?php echo htmlspecialchars($category['id']); ?>">
                            <td class="pl-3 cursor-pointer catTd">
                                <span class="font-bold tracking-wide black-text"
                                    cid="<?php echo htmlspecialchars($category['id']); ?>">
                                    <a href="category.php?id=<?php echo htmlspecialchars($category['id']); ?>">
                                        <?php echo htmlspecialchars($category['category_title']); ?>
                                    </a>
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="" class="pr-2 outline-none red-text deleteCat" cid="<?php echo htmlspecialchars($category['id']); ?>">
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