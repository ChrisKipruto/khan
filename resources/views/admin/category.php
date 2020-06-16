<?php

    # check is
    if(!isset($_GET['id'])){

        header("Location: addCategory.php?error=noid");

        exit();

    } else {

        # get category id
        $category_id = htmlspecialchars($_GET['id']);

        # connect to db
        require '../../config/connect.php';

        # get brand sql
        $sql = "SELECT * FROM categories WHERE id = '$category_id'";

        # store result
        $result = mysqli_query($conn, $sql);

        # check of result has category
        if(mysqli_num_rows($result) < 1){

            header("Location: addCategory.php?error=nocat");

            exit();

        } else {

            # fetch result into an array and get category details
            $category = mysqli_fetch_assoc($result);

            # category title
            $category_id = $category['id'];
            $category_title = $category['category_title'];

            # sql to get sub categories
            $sql = "SELECT * FROM `subcategories` WHERE category_id = '$category_id'";

            # store result
            $result = mysqli_query($conn, $sql);

            # fetch result into array
            $subCategories = mysqli_fetch_all($result, MYSQLI_ASSOC);
            
            # free up memory
            mysqli_free_result($result);

            # close db connection
            mysqli_close($conn);

        }

    }

?>

<!-- admin header -->
<?php require "../templates/back-layout/back.header.php"; ?>

<title>Khan Store &bullet; <?php echo htmlspecialchars($category_title); ?></title>

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
        <!-- category tabs -->
        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 mb-3">
            <ul class="nav nav-tabs black md-tabs" id="categoryTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active white-text border-0 font-semibold" id="home-tab" 
                        data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                        Category
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link white-text border-0 font-semibold" id="subCategory-tab" 
                        data-toggle="tab" href="#subCategory" role="tab" aria-controls="subCategory" aria-selected="false">
                        Sub categories
                    </a>
                </li>
            </ul>

            <!-- tab content -->
            <div class="tab-content card pt-3" id="categoryTabContent">

                <!-- home tab -->
                <div class="tab-pane fade show active px-3 py-3" id="home" 
                    role="tabpanel" aria-labelledby="home-tab">
                    <div class="mx-3 my-3">
                        <div class="row d-flex justify-content-start">
                            <div class="col-xl-5">
                                <div class="mb-3">
                                    <label for="categoryInput" class="uppercase text-gray-600 font-bold text-sm">
                                        Category
                                    </label>

                                    <input type="text" value="<?php echo htmlspecialchars($category_title); ?>"
                                        class="w-full px-3 py-3 font-semibold shadow-md bg-gray-200 rounded-sm"
                                        value="" disabled />
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end home tab -->

                <!-- home tab -->
                <div class="tab-pane fade px-3 py-3" id="subCategory" 
                    role="tabpanel" aria-labelledby="subCategory-tab">
                    <div class="mx-3 my-3">
                        <div class="row d-flex justify-center">
                            <?php if(!$subCategories): ?>
                                <div class="col-xl-10 col-lg-10 col-md-12 col-sm-10 flex-center mb-3">
                                    <div>
                                        <p>
                                            This product category does not have sub-categories linked yet.
                                            <button class="btn btn-indigo tracking-wide font-semibold"
                                            data-toggle="modal" data-target="#subCategoryModal">
                                                <i class="fas fa-feather pr-2"></i>
                                                Add Sub Category
                                            </button>

                                            <!-- add subcategory modal -->
                                            <div class="modal fade" id="subCategoryModal" 
                                                tabindex="-1" role="dialog" 
                                                aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-notify modal-success" role="document">
                                                    <div class="modal-content">
                                                        <!--Header-->
                                                        <div class="modal-header">
                                                            <p class="heading lead uppercase font-semibold">Add Subcategory</p>

                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true" class="white-text">&times;</span>
                                                            </button>
                                                        </div>

                                                        <!-- body -->
                                                        <div class="modal-body">
                                                           <div class="row">
                                                               <div class="col-md-12">
                                                                    <div class="mb-2">
                                                                        <label for="categoryInput"
                                                                        class="uppercase text-gray-600 font-bold text-xs">
                                                                            Sub-Category
                                                                        </label>
                                                                        <input type="hidden" id="catId" value="<?php echo htmlspecialchars($category_id); ?>">
                                                                        <input type="text" id="subCatInput"
                                                                            class="w-full px-3 py-3 border-b-2 border-green-300 bg-gray-200 outline-none focus:outline-none">
                                                                        <p class="red-text font-bold font-small subcat-help"></p>
                                                                    </div>

                                                                    <button class="btn btn-success" id="addSubCatBtn">
                                                                        Add Sub Category
                                                                    </button>
                                                               </div>
                                                           </div>
                                                        </div>

                                                        <!--Footer-->
                                                        <div class="modal-footer justify-content-center">
                                                            <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">No, thanks</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </p>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-10">
                                    <div class="row d-flex justify-center">
                                        <!-- add sub cat form -->
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label for="categoryInput"
                                                class="uppercase text-gray-600 font-bold text-xs">
                                                    Sub-Category
                                                </label>
                                                <input type="hidden" id="catId" value="<?php echo htmlspecialchars($category_id); ?>">
                                                <input type="text" id="subCatInput"
                                                class="w-full px-3 py-3 shadow-md border-b-2 border-indigo-300 bg-gray-200 outline-none focus:outline-none">
                                                <p class="red-text font-bold font-small subcat-help"></p>
                                            </div>

                                            <button class="btn btn-sm indigo lighten-4 font-bold tracking-wide"
                                                id="addSubCatBtn">
                                                Add Sub Category
                                            </button>
                                        </div>

                                        <!-- sub cat table -->
                                        <div class="col-md-8">
                                            <table class="table table-sm table-striped" id="subCatTable">
                                                <thead>
                                                    <tr>
                                                        <th>Sub Category Title</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php foreach($subCategories as $subCategory):?>
                                                        <tr class="border-b" id="subcategory-<?php echo htmlspecialchars($subCategory['id']); ?>">
                                                            <td class="pl-3 cursor-pointer">
                                                                <span class="font-bold tracking-wide black-text"
                                                                    sid="<?php echo htmlspecialchars($subCategory['id']); ?>">
                                                                    <a href="subcategory.php?id=<?php echo htmlspecialchars($subCategory['id']); ?>">
                                                                        <?php echo htmlspecialchars($subCategory['subcategory_title']); ?>
                                                                    </a>
                                                                </span>
                                                            </td>

                                                            <td class="text-center">
                                                                <a href="" class="pr-2 outline-none red-text deleteSubCat" 
                                                                sid="<?php echo htmlspecialchars($subCategory['id']); ?>">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach;?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div> <!-- end home tab -->

            </div>
        </div>

    </div>
</div>

<!-- admin footer -->
<?php require "../templates/back-layout/back.footer.php"; ?>